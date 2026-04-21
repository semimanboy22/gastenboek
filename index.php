<?php
session_start();
require_once __DIR__ . '/db.php';

$errors = [];
$messages = [];
$isLoggedIn = isset($_SESSION['username']);

if ($isLoggedIn && !isset($_SESSION['user_id'])) {
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

$currentUserId = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;
$currentUserProfilePicture = '';
$headerAvatarSrc = $isLoggedIn ? 'images/downloads (4).png' : 'images/logo-gastenboek.png';
$headerMessagesHref = $isLoggedIn ? 'logedinhome.php' : 'index.php';
$cssVersion = (string)@filemtime(__DIR__ . '/styles.css');

if ($isLoggedIn && $currentUserId > 0) {
	try {
		$profileStmt = $pdo->prepare('SELECT `profile-picture` AS profile_picture FROM users WHERE id = ? LIMIT 1');
		$profileStmt->execute([$currentUserId]);
		$currentUser = $profileStmt->fetch(PDO::FETCH_ASSOC);
		if ($currentUser && !empty($currentUser['profile_picture'])) {
			$currentUserProfilePicture = (string)$currentUser['profile_picture'];
			$headerAvatarSrc = $currentUserProfilePicture;
		}
	} catch (Throwable $e) {
		// Keep the default logo if the avatar lookup fails.
	}
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
	<title>Gastenboek</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styles.css?v=<?= htmlspecialchars($cssVersion, ENT_QUOTES, 'UTF-8') ?>">
</head>
<body>
<header class="site-header">
	<div class="header-bar">
		<?php if ($isLoggedIn): ?>
			<a class="header-avatar-link" href="profile-picture.php" aria-label="Profielfoto aanpassen">
				<img class="header-avatar-image" src="<?= htmlspecialchars($headerAvatarSrc, ENT_QUOTES, 'UTF-8') ?>" alt="Profielfoto">
			</a>
		<?php else: ?>
			<a class="logo-wrap" href="index.php" aria-label="Gastenboek home">
				<img src="images/logo-gastenboek.png" alt="Gastenboek logo">
			</a>
		<?php endif; ?>
		<nav class="header-nav" aria-label="Hoofdmenu">
			<a href="<?= htmlspecialchars($headerMessagesHref, ENT_QUOTES, 'UTF-8') ?>">messages</a>
			<a href="leaderbord.php">leaderboard</a>			
			<a href="messages-maken/bericht-plaatsen.php">bericht plaatsen</a>
			<?php if ($isLoggedIn): ?>
				<a href="inlogen/logout.php">logout</a>
			<?php else: ?>
				<a href="inlogen/login.php">login</a>
			<?php endif; ?>
		</nav>
	</div>
</header>

<div class="wrap">
	<?php if ($errors !== []): ?>
		<?php foreach ($errors as $error): ?>
			<div class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
		<?php endforeach; ?>
	<?php endif; ?>

	<?php foreach ($messages as $row): ?>
		<div class="message">
			<?php $messageAvatarSrc = !empty($row['profile_picture']) ? (string)$row['profile_picture'] : 'images/downloads (4).png'; ?>
			<?php $messageImageSrc = !empty($row['image_path']) ? (string)$row['image_path'] : (!empty($row['image']) ? (string)$row['image'] : ''); ?>
			<?php $isOwner = $currentUserId > 0 && (int)($row['user_id'] ?? 0) === $currentUserId; ?>
			<div class="message-layout">
				<div class="message-left">
					<?php if (!empty($row['name'])): ?>
						<div class="message-meta-row">
							<img class="message-user-avatar" src="<?= htmlspecialchars($messageAvatarSrc, ENT_QUOTES, 'UTF-8') ?>" alt="Profielfoto gebruiker">
							<div class="message-meta"><?= htmlspecialchars((string)$row['name'], ENT_QUOTES, 'UTF-8') ?></div>
						</div>
					<?php endif; ?>

					<div class="message-text"><?= htmlspecialchars((string)($row['message'] ?? ''), ENT_QUOTES, 'UTF-8') ?></div>

					<?php if ($isOwner): ?>
						<div class="message-actions">
							<a class="message-action-link" href="edit-delete/edit.php?id=<?= (int)$row['id'] ?>&return_to=index.php">Wijzigen</a>
							<form method="post" action="edit-delete/delete.php" onsubmit="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?');">
								<input type="hidden" name="message_id" value="<?= (int)$row['id'] ?>">
								<input type="hidden" name="return_to" value="index.php">
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
