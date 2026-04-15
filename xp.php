<?php

function award_message_xp(PDO $pdo, int $userId, int $xpAmount = 25): void
{
    if ($userId <= 0 || $xpAmount <= 0) {
        return;
    }

    $xpStmt = $pdo->prepare('UPDATE users SET xp = COALESCE(xp, 0) + ? WHERE id = ?');
    $xpStmt->execute([$xpAmount, $userId]);
}
