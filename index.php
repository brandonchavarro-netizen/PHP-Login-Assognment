<?php
session_start();
$username = 'user';
$password = 'password';
$error = '';

if (!empty($_SESSION['loggedin'])) {
    header('Location: loginsuccess.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username'], $_POST['password']) &&
        hash_equals($username, $_POST['username']) &&
        hash_equals($password, $_POST['password'])) {
        session_regenerate_id(true);
        $_SESSION['loggedin'] = true;
        header('Location: loginsuccess.php');
        exit;
    }
    $error = 'Username or password is incorrect';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 40px; }
    label { display: block; margin: 14px 0 5px; }
    input { padding: 8px; width: min(280px, 90%); box-sizing: border-box; }
    button { display: block; margin-top: 20px; padding: 9px 35px; cursor: pointer; }
    .error { color: #b00020; }
  </style>
</head>
<body>
  <h1>Login Page</h1>
  <?php if ($error): ?><p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
  <form method="post" action="index.php">
    <label for="username">username:</label>
    <input id="username" type="text" name="username" required>
    <label for="password">password:</label>
    <input id="password" type="password" name="password" required>
    <button type="submit">Login</button>
  </form>
</body>
</html>
