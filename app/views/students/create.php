<?php
$dropdown = "<select name='course_id' required><option value=''>Select Course</option>";
foreach ($courses as $c) {
    $dropdown .= "<option value='{$c['id']}'>{$c['course_code']} - {$c['title']}</option>";
}
$dropdown .= "</select>";

$content = "
<div class='card'>
    <h1>Add New Student</h1>
    <form action='index.php?action=add_student_submit' method='POST'>
        {$dropdown}
        <input type='text' name='admission_number' placeholder='Admission Number' required>
        <input type='text' name='first_name' placeholder='First Name' required>
        <input type='text' name='last_name' placeholder='Last Name' required>
        <input type='email' name='email' placeholder='Email' required>
        <button type='submit'>Save Student</button>
    </form>
</div>
";
require_once '../app/views/layout/master.php';
?>
