<?php
$content = "
<div class='card'>
    <h1>Add New Course</h1>
    <form action='index.php?action=add_course_submit' method='POST'>
        <input type='text' name='course_code' placeholder='Course Code (e.g. BSCS)' required>
        <input type='text' name='title' placeholder='Course Title (e.g. BSc Computer Science)' required>
        <input type='text' name='department' placeholder='Department' required>
        <button type='submit'>Save Course</button>
    </form>
</div>
";
require_once '../app/views/layout/master.php';
?>
