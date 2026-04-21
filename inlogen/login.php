<?php
session_start();
require_once __DIR__ . '/../db.php';

if (isset($_SESSION['username'])) {
  header('Location: ../logedinhome.php');
  exit;
}

$error = '';
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['uname'] ?? '');
  $password = $_POST['psw'] ?? '';

  if ($username === '' || $password === '') {
    $error = 'Vul gebruikersnaam en wachtwoord in.';
  } else {
    try {
    $stmt = $pdo->prepare('SELECT id, username, password FROM users WHERE username = ? LIMIT 1');
      $stmt->execute([$username]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($user) {
      $storedPassword = (string)$user['password'];
			$valid = password_verify($password, $storedPassword) || hash_equals($storedPassword, $password);

			if ($valid) {
        $_SESSION['username'] = (string)$user['username'];
        $_SESSION['user_id'] = (int)$user['id'];
				header('Location: ../logedinhome.php');
				exit;
			}
		}

      $error = 'Onjuiste login.';
    } catch (Throwable $e) {
      $error = 'Database fout.';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../styles.css">
</head>
<body>
<div class="wrap">
  <form action="" method="post" class="message-form">
    <?php if ($error !== ''): ?>
      <div class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
    <?php endif; ?>

    <label for="uname"><b>Username</b></label>
    <input type="text" id="uname" placeholder="Enter Username" name="uname" value="<?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?>" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" id="psw" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    <p>Nog geen account? <a href="../registreren/reg.php">Maak er een</a>.</p>
    <p><a href="../index.php">Terug naar berichten</a></p>
  </form>
</div>
</body>
</html>
