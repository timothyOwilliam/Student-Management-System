<?php
$content = "
<div class='card'>
    <h1>Add New User</h1>
    <form action='index.php?action=add_user_submit' method='POST'>
        <input type='text' name='username' placeholder='Username' required>
        <input type='password' name='password' placeholder='Password' required>
        <select name='role'>
            <option value='staff'>Staff</option>
            <option value='admin'>Admin</option>
        </select>
        <button type='submit'>Save User</button>
    </form>
</div>
";
require_once '../app/views/layout/master.php';
?>
