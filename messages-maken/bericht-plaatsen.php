<?php
session_start();
require_once __DIR__ . '/../db.php';

if (isset($_SESSION['username']) && !isset($_SESSION['user_id'])) {
    $username = trim((string)($_SESSION['username'] ?? ''));
    if ($username !== '') {
        $userStmt = $pdo->prepare('SELECT id FROM users WHERE username = ? LIMIT 1');
        $userStmt->execute([$username]);
        $user = $userStmt->fetch(PDO::FETCH_ASSOC);
        if ($user && isset($user['id'])) {
            $_SESSION['user_id'] = (int)$user['id'];
        }
    }
}

if (!isset($_SESSION['username']) || !isset($_SESSION['user_id'])) {
    header('Location: ../inlogen/login.php');
    exit;
}

$error = isset($_GET['error']) ? trim((string)$_GET['error']) : '';
$currentUserProfilePicture = '';
$headerAvatarSrc = '../images/downloads (4).png';
$cssVersion = (string)@filemtime(__DIR__ . '/../styles.css');

try {
    $profileStmt = $pdo->prepare('SELECT `profile-picture` AS profile_picture FROM users WHERE id = ? LIMIT 1');
    $profileStmt->execute([(int)$_SESSION['user_id']]);
    $currentUser = $profileStmt->fetch(PDO::FETCH_ASSOC);
    if ($currentUser && !empty($currentUser['profile_picture'])) {
        $currentUserProfilePicture = (string)$currentUser['profile_picture'];
        $headerAvatarSrc = '../' . $currentUserProfilePicture;
    }
} catch (Throwable $e) {
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bericht plaatsen</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css?v=<?= htmlspecialchars($cssVersion, ENT_QUOTES, 'UTF-8') ?>">
</head>
<body class="create-message-page">
    <header class="site-header">
        <div class="header-bar">
            <a class="header-avatar-link" href="../profile-picture.php" aria-label="Profielfoto aanpassen">
                <img class="header-avatar-image" src="<?= htmlspecialchars($headerAvatarSrc, ENT_QUOTES, 'UTF-8') ?>" alt="Profielfoto">
            </a>
            <nav class="header-nav" aria-label="Hoofdmenu">
                <a href="../logedinhome.php">messages</a>
                <a href="../leaderbord.php">leaderboard</a>
                <a href="../inlogen/logout.php">logout</a>
            </nav>
        </div>
    </header>

    <div class="wrap">
        <?php if ($error !== ''): ?>
            <div class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
        <form method="post" action="upload.php" enctype="multipart/form-data" class="message-form create-message-form">
        <label for="message">Bericht</label>
        <textarea name="message" id="message" maxlength="2000" rows="4" required></textarea>
        <label for="fileToUpload">Afbeelding</label>
        <input name="fileToUpload" id="fileToUpload" type="file" accept="image/*">
        <button type="submit" name="submit">Bericht plaatsen</button>
        </form>
    </div>

</body>
</html>
