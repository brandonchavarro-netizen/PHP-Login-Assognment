<?php
session_start();
if (empty($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    $_SESSION = [];
    session_destroy();
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Success</title>
  <style>body { font-family: Arial, sans-serif; margin: 40px; } button { padding: 9px 25px; cursor: pointer; }</style>
</head>
<body>
  <h1>Login Successful!</h1>
  <p>Welcome! You have successfully logged in.</p>
  <form method="post"><button type="submit" name="logout" value="1">Log Out</button></form>
</body>
</html>
