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

function create_image_resource(string $sourcePath, string $mime)
{
	switch ($mime) {
		case 'image/jpeg':
			return imagecreatefromjpeg($sourcePath);
		case 'image/png':
			return imagecreatefrompng($sourcePath);
		case 'image/gif':
			return imagecreatefromgif($sourcePath);
		case 'image/webp':
			if (function_exists('imagecreatefromwebp')) {
				return imagecreatefromwebp($sourcePath);
			}
			return false;
		default:
			return false;
	}
}

function save_square_avatar(string $sourcePath, string $targetPath, string $mime): bool
{
	$source = create_image_resource($sourcePath, $mime);
	if ($source === false) {
		return false;
	}

	$width = (int)imagesx($source);
	$height = (int)imagesy($source);
	if ($width <= 0 || $height <= 0) {
		imagedestroy($source);
		return false;
	}

	$side = min($width, $height);
	$srcX = (int)(($width - $side) / 2);
	$srcY = (int)(($height - $side) / 2);
	$targetSize = 256;

	$target = imagecreatetruecolor($targetSize, $targetSize);
	if ($target === false) {
		imagedestroy($source);
		return false;
	}

	imagealphablending($target, false);
	imagesavealpha($target, true);
	$transparent = imagecolorallocatealpha($target, 0, 0, 0, 127);
	imagefill($target, 0, 0, $transparent);

	$copied = imagecopyresampled($target, $source, 0, 0, $srcX, $srcY, $targetSize, $targetSize, $side, $side);
	if (!$copied) {
		imagedestroy($source);
		imagedestroy($target);
		return false;
	}

	$saved = imagepng($target, $targetPath, 6);
	imagedestroy($source);
	imagedestroy($target);

	return $saved;
}

$errors = [];
$currentUserId = (int)$_SESSION['user_id'];
$currentUserProfilePicture = '';
$currentAvatarSrc = 'images/downloads (4).png';
$cssVersion = (string)@filemtime(__DIR__ . '/styles.css');

try {
	$profileStmt = $pdo->prepare('SELECT `profile-picture` AS profile_picture FROM users WHERE id = ? LIMIT 1');
	$profileStmt->execute([$currentUserId]);
	$currentUser = $profileStmt->fetch(PDO::FETCH_ASSOC);
	if ($currentUser && !empty($currentUser['profile_picture'])) {
		$currentUserProfilePicture = (string)$currentUser['profile_picture'];
		$currentAvatarSrc = $currentUserProfilePicture;
	}
} catch (Throwable $e) {
	$errors[] = 'Databasefout: ' . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (!isset($_FILES['profile_picture'])) {
		$errors[] = 'Kies een afbeelding om op te slaan.';
	} else {
		$file = $_FILES['profile_picture'];

		if ($file['error'] !== UPLOAD_ERR_OK) {
			$errors[] = 'Upload mislukt.';
		} elseif (empty($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
			$errors[] = 'Ongeldige upload.';
		} else {
			$originalName = basename((string)$file['name']);
			$imageInfo = getimagesize($file['tmp_name']);
			$mime = is_array($imageInfo) && isset($imageInfo['mime']) ? (string)$imageInfo['mime'] : '';
			$allowedMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

			if ($originalName === '' || !in_array($mime, $allowedMimes, true)) {
				$errors[] = 'Kies een geldige afbeelding.';
			} elseif ((int)$file['size'] > 1000000) {
				$errors[] = 'Afbeelding is te groot.';
			} elseif ($imageInfo === false) {
				$errors[] = 'Bestand is geen geldige afbeelding.';
			} else {
				$uploadDir = __DIR__ . '/profile-pictures';
				if (!is_dir($uploadDir)) {
					mkdir($uploadDir, 0755, true);
				}

				$safeName = 'profile_' . $currentUserId . '_' . uniqid('', true) . '.png';
				$targetPath = $uploadDir . '/' . $safeName;
				$storedPath = 'profile-pictures/' . $safeName;

				if (!save_square_avatar($file['tmp_name'], $targetPath, $mime)) {
					$errors[] = 'Upload mislukt.';
				} else {
					if ($currentUserProfilePicture !== '' && str_starts_with($currentUserProfilePicture, 'profile-pictures/')) {
						$oldPath = __DIR__ . '/' . $currentUserProfilePicture;
						if (is_file($oldPath)) {
							@unlink($oldPath);
						}
					}

					$updateStmt = $pdo->prepare('UPDATE users SET `profile-picture` = ? WHERE id = ?');
					$updateStmt->execute([$storedPath, $currentUserId]);
					header('Location: logedinhome.php?success=' . urlencode('Profielfoto opgeslagen.'));
					exit;
				}
			}
		}
	}
}

$avatarSrcForPage = $currentAvatarSrc;
?>
<!DOCTYPE html>
<html lang="nl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profielfoto</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styles.css?v=<?= htmlspecialchars($cssVersion, ENT_QUOTES, 'UTF-8') ?>">
</head>
<body class="profile-picture-page">
<header class="site-header">
	<div class="header-bar">
		<a class="header-avatar-link" href="profile-picture.php" aria-label="Profielfoto aanpassen">
			<img class="header-avatar-image" src="<?= htmlspecialchars($avatarSrcForPage, ENT_QUOTES, 'UTF-8') ?>" alt="Profielfoto">
		</a>
		<nav class="header-nav" aria-label="Hoofdmenu">
			<a href="logedinhome.php">messages</a>
			<a href="leaderbord.php">leaderboard</a>
			<a href="inlogen/logout.php">logout</a>
		</nav>
	</div>
</header>

<div class="wrap">
	<?php if ($errors !== []): ?>
		<?php foreach ($errors as $error): ?>
			<div class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
		<?php endforeach; ?>
	<?php endif; ?>

	<form class="message-form profile-editor-form" method="post" enctype="multipart/form-data">
		<div class="profile-preview-wrap">
			<img class="profile-preview-avatar" src="<?= htmlspecialchars($avatarSrcForPage, ENT_QUOTES, 'UTF-8') ?>" alt="Profielfoto voorbeeld">
		</div>
		<label for="profile_picture">Kies profielfoto</label>
		<input type="file" id="profile_picture" name="profile_picture" accept="image/*" required>
		<button type="submit">Opslaan</button>
	</form>
</div>
</body>
</html>