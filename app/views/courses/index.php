<?php
$content = "
<div class='card'>
    <h1>Available Courses</h1>
    <table>
        <tr><th>Code</th><th>Title</th><th>Department</th></tr>";
        foreach ($courses as $c) {
            $content .= "<tr><td>{$c['course_code']}</td><td>{$c['title']}</td><td>{$c['department']}</td></tr>";
        }
$content .= "</table>
</div>
";
require_once '../app/views/layout/master.php';
?>
