<?php
session_start();

// Block access if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>Your Role: <?php echo htmlspecialchars($_SESSION['role']); ?></p>
    <p>You have successfully logged in.</p>
    <br>
    <a href="index.php?action=logout">Logout</a>
</body>
</html>
