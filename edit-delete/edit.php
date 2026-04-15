<?php
require_once __DIR__ . '/auth.php';

$userId = resolve_current_user_id($pdo);
if ($userId === null) {
    header('Location: ../inlogen/login.php');
    exit;
}

$returnTo = normalize_return_to($_REQUEST['return_to'] ?? 'logedinhome.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $messageId = (int)($_POST['message_id'] ?? 0);
    $newMessage = trim((string)($_POST['message'] ?? ''));
    $removeImage = isset($_POST['remove_image']) && (string)$_POST['remove_image'] === '1';

    if ($messageId <= 0) {
        redirect_back($returnTo, 'error', 'Ongeldig bericht.');
    }

    if ($newMessage === '') {
        redirect_back($returnTo, 'error', 'Bericht mag niet leeg zijn.');
    }

    try {
        $ownedMessage = get_owned_message($pdo, $messageId, $userId);
        if ($ownedMessage === null) {
            redirect_back($returnTo, 'error', 'Je mag dit bericht niet wijzigen.');
        }

        $oldImagePath = isset($ownedMessage['image_path']) ? trim((string)$ownedMessage['image_path']) : '';
        $newImagePath = $oldImagePath;

        if ($removeImage) {
            $newImagePath = '';
        }

        $hasNewUpload = isset($_FILES['fileToUpload']) && (int)($_FILES['fileToUpload']['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE;
        if ($hasNewUpload) {
            $file = $_FILES['fileToUpload'];

            if ((int)$file['error'] !== UPLOAD_ERR_OK) {
                redirect_back($returnTo, 'error', 'Upload mislukt.');
            }

            if (empty($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
                redirect_back($returnTo, 'error', 'Ongeldige upload.');
            }

            $originalName = basename((string)$file['name']);
            $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

            if ($originalName === '' || !in_array($extension, $allowedExtensions, true)) {
                redirect_back($returnTo, 'error', 'Kies een geldige afbeelding.');
            }

            if ((int)$file['size'] > 500000) {
                redirect_back($returnTo, 'error', 'Afbeelding is te groot.');
            }

            if (getimagesize($file['tmp_name']) === false) {
                redirect_back($returnTo, 'error', 'Bestand is geen geldige afbeelding.');
            }

            $uploadDir = __DIR__ . '/../messages-maken/uploads';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $safeName = uniqid('msg_', true) . '.' . $extension;
            $targetPath = $uploadDir . '/' . $safeName;
            if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
                redirect_back($returnTo, 'error', 'Upload mislukt.');
            }

            $newImagePath = 'messages-maken/uploads/' . $safeName;
        }

        $updateStmt = $pdo->prepare('UPDATE messages SET message = ?, image_path = ? WHERE id = ? AND `user-id` = ?');
        $updateStmt->execute([$newMessage, $newImagePath !== '' ? $newImagePath : null, $messageId, $userId]);

        if ($oldImagePath !== '' && $oldImagePath !== $newImagePath) {
            remove_message_image_if_local($oldImagePath);
        }

        header('Location: ../' . $returnTo);
        exit;
    } catch (Throwable $e) {
        redirect_back($returnTo, 'error', 'Databasefout bij wijzigen.');
    }
}

$messageId = (int)($_GET['id'] ?? 0);
if ($messageId <= 0) {
    redirect_back($returnTo, 'error', 'Ongeldig bericht.');
}

try {
    $messageRow = get_owned_message($pdo, $messageId, $userId);
    if ($messageRow === null) {
        redirect_back($returnTo, 'error', 'Je mag dit bericht niet wijzigen.');
    }
} catch (Throwable $e) {
    redirect_back($returnTo, 'error', 'Databasefout bij laden.');
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bericht wijzigen</title>
    <?php $cssVersion = (string)@filemtime(__DIR__ . '/../styles.css'); ?>
    <link rel="stylesheet" href="../styles.css?v=<?= htmlspecialchars($cssVersion, ENT_QUOTES, 'UTF-8') ?>">
</head>
<body>
<div class="wrap">
    <div class="edit-card">
        <h1 class="edit-title">Bericht wijzigen</h1>
        <form method="post" action="edit.php" class="message-form" enctype="multipart/form-data">
            <input type="hidden" name="message_id" value="<?= (int)$messageRow['id'] ?>">
            <input type="hidden" name="return_to" value="<?= htmlspecialchars($returnTo, ENT_QUOTES, 'UTF-8') ?>">
            <label for="message">Bericht</label>
            <textarea name="message" id="message" maxlength="2000" rows="5" required><?= htmlspecialchars((string)$messageRow['message'], ENT_QUOTES, 'UTF-8') ?></textarea>

            <?php if (!empty($messageRow['image_path'])): ?>
                <div class="message-meta">Huidige afbeelding</div>
                <img class="message-image" src="../<?= htmlspecialchars((string)$messageRow['image_path'], ENT_QUOTES, 'UTF-8') ?>" alt="Huidige bericht afbeelding">
                <label>
                    <input type="checkbox" name="remove_image" value="1"> Verwijder huidige afbeelding
                </label>
            <?php endif; ?>

            <label for="fileToUpload">Nieuwe afbeelding</label>
            <input type="file" id="fileToUpload" name="fileToUpload" accept="image/*">
            <button type="submit">Opslaan</button>
        </form>
        <div class="edit-links">
            <a href="../<?= htmlspecialchars($returnTo, ENT_QUOTES, 'UTF-8') ?>">Terug</a>
        </div>
    </div>
</div>
</body>
</html>
