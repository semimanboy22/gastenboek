<?php
require_once __DIR__ . '/auth.php';

$userId = resolve_current_user_id($pdo);
if ($userId === null) {
    header('Location: ../inlogen/login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_back('logedinhome.php', 'error', 'Ongeldig verzoek.');
}

$returnTo = normalize_return_to($_POST['return_to'] ?? 'logedinhome.php');
$messageId = (int)($_POST['message_id'] ?? 0);

if ($messageId <= 0) {
    redirect_back($returnTo, 'error', 'Ongeldig bericht.');
}

try {
    $ownedMessage = get_owned_message($pdo, $messageId, $userId);
    if ($ownedMessage === null) {
        redirect_back($returnTo, 'error', 'Je mag dit bericht niet verwijderen.');
    }

    $deleteStmt = $pdo->prepare('DELETE FROM messages WHERE id = ? AND `user-id` = ? LIMIT 1');
    $deleteStmt->execute([$messageId, $userId]);

    remove_message_image_if_local($ownedMessage['image_path'] ?? null);

    header('Location: ../' . $returnTo);
    exit;
} catch (Throwable $e) {
    redirect_back($returnTo, 'error', 'Databasefout bij verwijderen.');
}
