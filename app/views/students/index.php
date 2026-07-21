<?php
$content = "
<div class='card'>
    <h1>Student List</h1>
    <table>
        <tr><th>ID</th><th>Name</th><th>Email</th></tr>";
        foreach ($students as $s) {
            $content .= "<tr><td>{$s['id']}</td><td>{$s['first_name']} {$s['last_name']}</td><td>{$s['email']}</td></tr>";
        }
$content .= "</table>
</div>
";
require_once '../app/views/layout/master.php';
?>
