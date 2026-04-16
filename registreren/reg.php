<?php
session_start();
require_once __DIR__ . '/../db.php';

if (isset($_SESSION['username'])) {
	header('Location: ../logedinhome.php');
	exit;
}

$error = '';
$success = '';
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!empty($_SESSION['account_created_this_session'])) {
    $error = 'In deze browsersessie is al een account aangemaakt. Sluit je browser en probeer later opnieuw.';
  } else {
    $username = trim($_POST['uname'] ?? '');
    $password = $_POST['psw'] ?? '';
    $passwordConfirm = $_POST['psw_confirm'] ?? '';

    if ($username === '' || $password === '' || $passwordConfirm === '') {
      $error = 'Vul gebruikersnaam en wachtwoord in.';
    } elseif (strlen($username) < 1) {
      $error = 'Gebruikersnaam moet minimaal 1 teken hebben.';
    } elseif (strlen($username) > 21) {
      $error = 'Gebruikersnaam mag maximaal 21 tekens hebben.';
    } elseif (strlen($password) < 1) {
      $error = 'Wachtwoord moet minimaal 1 teken hebben.';
    } elseif (strlen($password) > 255) {
      $error = 'Wachtwoord mag maximaal 255 tekens hebben.';
    } elseif ($password !== $passwordConfirm) {
      $error = 'De wachtwoorden komen niet overeen.';
    } else {
      try {
        $checkStmt = $pdo->prepare('SELECT id FROM users WHERE username = ? LIMIT 1');
        $checkStmt->execute([$username]);

        if ($checkStmt->fetch(PDO::FETCH_ASSOC)) {
          $error = 'Deze gebruikersnaam bestaat al.';
        } else {
          $passwordCheckStmt = $pdo->query('SELECT password FROM users');
          $passwordAlreadyUsed = false;
          while ($existingUser = $passwordCheckStmt->fetch(PDO::FETCH_ASSOC)) {
            $storedPassword = (string)($existingUser['password'] ?? '');
            if ($storedPassword !== '' && (password_verify($password, $storedPassword) || hash_equals($storedPassword, $password))) {
              $passwordAlreadyUsed = true;
              break;
            }
          }

          if ($passwordAlreadyUsed) {
            $error = 'Dit wachtwoord wordt al gebruikt door een ander account.';
          } else {
          $passwordHash = password_hash($password, PASSWORD_DEFAULT);
          $insertStmt = $pdo->prepare('INSERT INTO users (username, password, xp, `profile-picture`) VALUES (?, ?, 0, NULL)');
          $insertStmt->execute([$username, $passwordHash]);

          $_SESSION['account_created_this_session'] = true;
          $success = 'Account aangemaakt. Je kunt nu inloggen.';
          $username = '';
          }
        }
      } catch (Throwable $e) {
        $error = 'Database fout.';
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registreren</title>
  <link rel="stylesheet" href="../styles.css">
</head>
<body>
<div class="wrap">
  <form action="" method="post" class="message-form">
    <h1>Registreren</h1>

    <?php if ($success !== ''): ?>
      <div class="info"><?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?></div>
    <?php endif; ?>

    <label for="uname"><b>Username</b></label>
    <input type="text" id="uname" placeholder="Enter Username" name="uname" value="<?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?>" maxlength="255" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" id="psw" placeholder="Enter Password" name="psw" maxlength="255" required>

    <label for="psw_confirm"><b>Confirm Password</b></label>
    <input type="password" id="psw_confirm" placeholder="Confirm Password" name="psw_confirm" maxlength="255" required>

    <button type="submit">Account maken</button>
    <p><a href="../inlogen/login.php">Terug naar login</a></p>
  </form>
</div>
</body>
</html>
