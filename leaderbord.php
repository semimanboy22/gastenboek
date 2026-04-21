try {
	$allUsersStmt = $pdo->query('SELECT username, xp FROM users ORDER BY xp DESC, username ASC');
	$allUsers = $allUsersStmt->fetchAll(PDO::FETCH_ASSOC);
	$users = array_slice($allUsers, 0, 10);
} catch (Throwable $e) {
	if ($currentUsername !== '') {
		$userIdStmt = $pdo->prepare('SELECT id FROM users WHERE username = ? LIMIT 1');
		$userIdStmt->execute([$currentUsername]);
		$currentUser = $userIdStmt->fetch(PDO::FETCH_ASSOC);
		if ($currentUser && isset($currentUser['id'])) {
			$_SESSION['user_id'] = (int)$currentUser['id'];
		}
	}
}

$isLoggedIn = isset($_SESSION['username']) && isset($_SESSION['user_id']);

if ($isLoggedIn && isset($_SESSION['user_id'])) {
	try {
		$profileStmt = $pdo->prepare('SELECT `profile-picture` AS profile_picture FROM users WHERE id = ? LIMIT 1');
		$profileStmt->execute([(int)$_SESSION['user_id']]);
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
	$pdo->exec(
		"CREATE TABLE IF NOT EXISTS users (
			id INT AUTO_INCREMENT PRIMARY KEY,
			username VARCHAR(255) NOT NULL,
			password VARCHAR(255) NOT NULL,
			xp INT NOT NULL,
			`profile-picture` VARCHAR(255) NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
	);

	$allUsersStmt = $pdo->query('SELECT username, xp FROM users ORDER BY xp DESC, username ASC');
	$allUsers = $allUsersStmt->fetchAll(PDO::FETCH_ASSOC);
	$users = array_slice($allUsers, 0, 10);

	if ($isLoggedIn) {
		$currentUsername = (string)($_SESSION['username'] ?? '');
		foreach ($allUsers as $index => $user) {
			if ((string)$user['username'] === $currentUsername) {
				$myPlace = $index + 1;
				$myXp = (int)$user['xp'];
				break;
			}
		}
	}
} catch (Throwable $e) {
	$errors[] = 'Databasefout: ' . $e->getMessage();
}

$topUsers = array_slice($users, 0, 3);
$otherUsers = array_slice($users, 3);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Leaderboard</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styles.css?v=<?= htmlspecialchars($cssVersion, ENT_QUOTES, 'UTF-8') ?>">
</head>
<body class="leaderboard-page">
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
			<?php if ($isLoggedIn): ?>
				<a href="logedinhome.php">messages</a>
				<a href="leaderbord.php">leaderboard</a>
				<a href="messages-maken/bericht-plaatsen.php">bericht plaatsen</a>
				<a href="inlogen/logout.php">uitloggen</a>
			<?php else: ?>
				<a href="index.php">messages</a>
				<a href="leaderbord.php">leaderboard</a>
				<a href="messages-maken/bericht-plaatsen.php">bericht plaatsen</a>
				<a href="inlogen/login.php">login</a>
			<?php endif; ?>
		</nav>
	</div>
</header>

<main class="leaderboard-layout">
	<?php if ($errors !== []): ?>
		<?php foreach ($errors as $error): ?>
			<div class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
		<?php endforeach; ?>
	<?php endif; ?>

	<section class="leaderboard-stage">
		<?php if ($users === []): ?>
			<div class="leaderboard-empty">
				<p>Er zijn nog geen gebruikers met XP.</p>
			</div>
		<?php else: ?>
			<div class="podium-wrap">
				<div class="podium-card podium-second">
					<?php if (isset($topUsers[1])): ?>
						<img class="podium-medal podium-medal-second" src="images/beker2.png" alt="Tweede plaats">
						<div class="leaderboard-top-user"><?= htmlspecialchars((string)$topUsers[1]['username'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars((string)$topUsers[1]['xp'], ENT_QUOTES, 'UTF-8') ?> XP</div>
					<?php else: ?>
						<div class="podium-empty-slot">2</div>
					<?php endif; ?>
				</div>

				<div class="podium-card podium-first">
					<?php if (isset($topUsers[0])): ?>
						<img class="podium-medal podium-medal-first" src="images/beker1.png" alt="Eerste plaats">
						<div class="leaderboard-top-user"><?= htmlspecialchars((string)$topUsers[0]['username'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars((string)$topUsers[0]['xp'], ENT_QUOTES, 'UTF-8') ?> XP</div>
					<?php else: ?>
						<div class="podium-empty-slot">1</div>
					<?php endif; ?>
				</div>

				<div class="podium-card podium-third">
					<?php if (isset($topUsers[2])): ?>
						<img class="podium-medal podium-medal-third" src="images/beker3.png" alt="Derde plaats">
						<div class="leaderboard-top-user"><?= htmlspecialchars((string)$topUsers[2]['username'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars((string)$topUsers[2]['xp'], ENT_QUOTES, 'UTF-8') ?> XP</div>
					<?php else: ?>
						<div class="podium-empty-slot">3</div>
					<?php endif; ?>
				</div>
			</div>

			<?php if ($otherUsers !== []): ?>
				<div class="leaderboard-list">
					<?php foreach ($otherUsers as $index => $user): ?>
						<div class="leaderboard-row">
							<div class="leaderboard-row-dot" aria-hidden="true"></div>
							<div class="leaderboard-row-name"><?= htmlspecialchars((string)$user['username'], ENT_QUOTES, 'UTF-8') ?></div>
							<div class="leaderboard-row-place">place <?= htmlspecialchars((string)($index + 4), ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars((string)$user['xp'], ENT_QUOTES, 'UTF-8') ?> XP</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php if ($isLoggedIn && $myPlace !== null): ?>
				<div class="leaderboard-self-row">
					<div class="leaderboard-self-dot" aria-hidden="true"></div>
					<div class="leaderboard-self-name"><?= htmlspecialchars((string)$_SESSION['username'], ENT_QUOTES, 'UTF-8') ?></div>
					<div class="leaderboard-self-place">your place <?= htmlspecialchars((string)$myPlace, ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars((string)($myXp ?? 0), ENT_QUOTES, 'UTF-8') ?> XP</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</section>
</main>
</body>
</html>
