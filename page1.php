<?php
session_start();
?>

<!-- Page 1: Email & Password Form -->
<!-- save as page1.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="page2.php" method="post">
        <h2>Login</h2>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Next</button>
    </form>
</body>
</html>
