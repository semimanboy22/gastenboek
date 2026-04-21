<?php
session_start();
require_once __DIR__ . '/db.php';

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
	header('Location: inlogen/login.php');
	exit;
}

$errors = [];
$messages = [];
$successMessage = trim((string)($_GET['success'] ?? ''));
$errorMessage = trim((string)($_GET['error'] ?? ''));
$currentUserId = (int)$_SESSION['user_id'];
$currentUserProfilePicture = '';
$headerAvatarSrc = 'images/downloads (4).png';
$cssVersion = (string)@filemtime(__DIR__ . '/styles.css');

try {
	$profileStmt = $pdo->prepare('SELECT `profile-picture` AS profile_picture FROM users WHERE id = ? LIMIT 1');
	$profileStmt->execute([$currentUserId]);
	$currentUser = $profileStmt->fetch(PDO::FETCH_ASSOC);
	if ($currentUser && !empty($currentUser['profile_picture'])) {
		$currentUserProfilePicture = (string)$currentUser['profile_picture'];
		$headerAvatarSrc = $currentUserProfilePicture;
	}
} catch (Throwable $e) {
	
}

try {
	$messagesStmt = $pdo->query('SELECT messages.id, messages.`user-id` AS user_id, users.username AS name, users.`profile-picture` AS profile_picture, messages.message, messages.image, messages.image_path, messages.`post-date` AS created_at FROM messages LEFT JOIN users ON users.id = messages.`user-id` ORDER BY messages.id DESC LIMIT 100');
	$messages = $messagesStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) {
	$errors[] = 'Databasefout: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Logged In Home</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styles.css?v=<?= htmlspecialchars($cssVersion, ENT_QUOTES, 'UTF-8') ?>">
</head>
<body>
<header class="site-header">
	<div class="header-bar">
		<a class="header-avatar-link" href="profile-picture.php" aria-label="Profielfoto aanpassen">
			<img class="header-avatar-image" src="<?= htmlspecialchars($headerAvatarSrc, ENT_QUOTES, 'UTF-8') ?>" alt="Profielfoto">
		</a>
		<nav class="header-nav" aria-label="Hoofdmenu">
			<a href="logedinhome.php">messages</a>
			<a href="leaderbord.php">leaderboard</a>
			<a href="messages-maken/bericht-plaatsen.php">bericht plaatsen</a>
			<a href="inlogen/logout.php">logout</a>
		</nav>
	</div>
</header>

<div class="wrap">
	<?php if ($successMessage !== ''): ?>
		<div class="info"><?= htmlspecialchars($successMessage, ENT_QUOTES, 'UTF-8') ?></div>
	<?php endif; ?>

	<?php if ($errorMessage !== ''): ?>
		<div class="error"><?= htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') ?></div>
	<?php endif; ?>

	<?php if ($errors !== []): ?>
		<?php foreach ($errors as $error): ?>
			<div class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
		<?php endforeach; ?>
	<?php endif; ?>

	<?php foreach ($messages as $row): ?>
		<div class="message">
			<?php $messageAvatarSrc = !empty($row['profile_picture']) ? (string)$row['profile_picture'] : 'images/downloads (4).png'; ?>
			<?php $messageImageSrc = !empty($row['image_path']) ? (string)$row['image_path'] : (!empty($row['image']) ? (string)$row['image'] : ''); ?>
			<?php $isOwner = (int)($row['user_id'] ?? 0) === $currentUserId; ?>
			<div class="message-layout">
				<div class="message-left">
					<div class="message-meta-row">
						<img class="message-user-avatar" src="<?= htmlspecialchars($messageAvatarSrc, ENT_QUOTES, 'UTF-8') ?>" alt="Profielfoto gebruiker">
						<div class="message-meta"><?= htmlspecialchars((string)$row['name'], ENT_QUOTES, 'UTF-8') ?></div>
					</div>
					<div class="message-text"><?= htmlspecialchars((string)$row['message'], ENT_QUOTES, 'UTF-8') ?></div>

					<?php if ($isOwner): ?>
						<div class="message-actions">
							<a class="message-action-link" href="edit-delete/edit.php?id=<?= (int)$row['id'] ?>&return_to=logedinhome.php">Wijzigen</a>
							<form method="post" action="edit-delete/delete.php" onsubmit="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?');">
								<input type="hidden" name="message_id" value="<?= (int)$row['id'] ?>">
								<input type="hidden" name="return_to" value="logedinhome.php">
								<button class="message-action-delete" type="submit">Verwijderen</button>
							</form>
						</div>
					<?php endif; ?>
				</div>

				<div class="message-right">
					<?php if ($messageImageSrc !== ''): ?>
						<img class="message-image" src="<?= htmlspecialchars($messageImageSrc, ENT_QUOTES, 'UTF-8') ?>" alt="Bericht afbeelding">
					<?php endif; ?>

					<?php if (!empty($row['created_at'])): ?>
						<div class="message-date-time"><?= htmlspecialchars((string)$row['created_at'], ENT_QUOTES, 'UTF-8') ?></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
</body>
</html>
