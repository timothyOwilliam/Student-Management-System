<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>System Login</h2>
    <?php if (isset($_GET['error'])): ?>
        <p style="color: red;">Invalid username or password.</p>
    <?php endif; ?>
    
    <form action="index.php?action=login" method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>
