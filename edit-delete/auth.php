<?php
session_start();
require_once __DIR__ . '/../db.php';

function resolve_current_user_id(PDO $pdo): ?int
{
    if (isset($_SESSION['user_id'])) {
        return (int)$_SESSION['user_id'];
    }

    $username = trim((string)($_SESSION['username'] ?? ''));
    if ($username === '') {
        return null;
    }

    $userStmt = $pdo->prepare('SELECT id FROM users WHERE username = ? LIMIT 1');
    $userStmt->execute([$username]);
    $user = $userStmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !isset($user['id'])) {
        return null;
    }

    $_SESSION['user_id'] = (int)$user['id'];
    return (int)$user['id'];
}

function normalize_return_to($value): string
{
    $allowed = ['index.php', 'logedinhome.php'];
    $target = trim((string)$value);

    if ($target === '' || !in_array($target, $allowed, true)) {
        return 'logedinhome.php';
    }

    return $target;
}

function redirect_back(string $returnTo, string $type, string $message): void
{
    $query = http_build_query([$type => $message]);
    header('Location: ../' . $returnTo . ($query !== '' ? '?' . $query : ''));
    exit;
}

function get_owned_message(PDO $pdo, int $messageId, int $userId): ?array
{
    $stmt = $pdo->prepare('SELECT id, `user-id` AS user_id, message, image_path FROM messages WHERE id = ? AND `user-id` = ? LIMIT 1');
    $stmt->execute([$messageId, $userId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row ?: null;
}

function remove_message_image_if_local(?string $imagePath): void
{
    if ($imagePath === null) {
        return;
    }

    $cleanPath = trim($imagePath);
    if ($cleanPath === '' || str_starts_with($cleanPath, 'messages-maken/uploads/') === false) {
        return;
    }

    $fullPath = __DIR__ . '/../' . $cleanPath;
    if (is_file($fullPath)) {
        @unlink($fullPath);
    }
}
