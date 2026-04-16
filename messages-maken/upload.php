<?php
session_start();
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../xp.php';

function redirect_with_query($query)
{
    header("Location: bericht-plaatsen.php?" . $query);
    exit;
}

if (!isset($_SESSION['user_id'])) {
    $username = trim((string)($_SESSION['username'] ?? ''));
    if ($username !== '') {
        $userStmt = $pdo->prepare('SELECT id FROM users WHERE username = ? LIMIT 1');
        $userStmt->execute([$username]);
        $user = $userStmt->fetch(PDO::FETCH_ASSOC);
        if ($user && isset($user['id'])) {
            $_SESSION['user_id'] = (int)$user['id'];
        }
    }

    if (!isset($_SESSION['user_id'])) {
        header('Location: ../inlogen/login.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_with_query("error=invalid request");
}

$message = trim((string)($_POST["message"] ?? ""));
if ($message === "") {
    redirect_with_query("error=message is required");
}

$userId = (int)$_SESSION['user_id'];

try {
    $dailyLimitStmt = $pdo->prepare('SELECT COUNT(*) FROM messages WHERE `user-id` = ? AND DATE(`post-date`) = CURDATE()');
    $dailyLimitStmt->execute([$userId]);
    $messagesToday = (int)$dailyLimitStmt->fetchColumn();

    if ($messagesToday >= 1) {
        redirect_with_query('error=' . urlencode('Je kunt maar 1 bericht per dag plaatsen.'));
    }
} catch (Throwable $e) {
    redirect_with_query('error=' . urlencode('database error'));
}

$imagePath = null;

$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0755, true);
}

if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] !== UPLOAD_ERR_NO_FILE) {
    $file = $_FILES["fileToUpload"];

    if ($file["error"] !== UPLOAD_ERR_OK) {
        redirect_with_query("error=upload failed");
    }

    if (empty($file["tmp_name"]) || !is_uploaded_file($file["tmp_name"])) {
        redirect_with_query("error=invalid upload");
    }

    $original_name = basename($file["name"]);
    if ($original_name === "") {
        redirect_with_query("error=invalid file name");
    }

    $imageFileType = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));
    if ($file["size"] > 500000) {
        redirect_with_query("error=file too large");
    }

    if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"], true)) {
        redirect_with_query("error=file is not an image");
    }

    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
        redirect_with_query("error=file is not an image");
    }

    $safeName = uniqid('msg_', true) . '.' . $imageFileType;
    $target_file = $target_dir . $safeName;

    if (!move_uploaded_file($file["tmp_name"], $target_file)) {
        redirect_with_query("error=upload failed");
    }

    $imagePath = 'messages-maken/' . $target_file;
}

try {
    $insertStmt = $pdo->prepare('INSERT INTO messages (`user-id`, message, image_path) VALUES (?, ?, ?)');
    $insertStmt->execute([$userId, $message, $imagePath]);
    award_message_xp($pdo, $userId, 25);

    header('Location: ../logedinhome.php');
    exit;
} catch (Throwable $e) {
    redirect_with_query('error=' . urlencode('database error'));
}

