<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php if (isset($_SESSION['user_id'])): ?>
    <nav>
        <a href="index.php?action=dashboard">Dashboard</a>
        <a href="index.php?action=view_students">Students</a>
        <a href="index.php?action=add_student">Add Student</a>
        <a href="index.php?action=view_courses">Courses</a>
        <a href="index.php?action=add_course">Add Course</a>
        <a href="index.php?action=add_user">Add User</a>
        <a href="index.php?action=help">Help</a>
        <a href="index.php?action=logout">Logout</a>
    </nav>
    <?php endif; ?>
    <div class="container">
        <?php echo $content; ?>
    </div>
</body>
</html>
