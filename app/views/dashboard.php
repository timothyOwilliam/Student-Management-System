<?php
$content = "
<div class='card'>
    <h1>Welcome, " . htmlspecialchars($_SESSION['username']) . "!</h1>
    <p>Your Role: " . htmlspecialchars($_SESSION['role']) . "</p>
    <p>Use the navigation menu to manage students and courses.</p>
</div>
";
require_once '../app/views/layout/master.php';
?>
