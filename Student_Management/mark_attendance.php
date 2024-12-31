<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sainik Sankalp Coaching Classes</title>
    <link rel="stylesheet" href="Style/add.css">
</head>
<body>
<header>
    <h1>Student Management System</h1>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="login.php">Teacher's Corner</a></li>
            <li><a href="retrive.php">Student info</a></li>
            <li><a href="aboutus.php">About Us</a></li>
        </ul>
    </nav>
</header>
<div class="container">
    <h2>Mark Your Attendance </h2>
    <h3>Enter the name:- </h3>
    <form action="" method="post">
        <p>
            Name: *<input type="text" name="student_name" required>
        </p>
        <hr>
        <input type="submit" value="Mark my Attendance">
    </form>
</div>
<footer>
    <p>&copy; Student Management System</p>
</footer>
</body>
</html>

<?php
require_once "config.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $param_student_name = trim($_POST['student_name']);
    $sql = "UPDATE student_attendance SET $param_student_name = 'PRESENT' WHERE date = (SELECT CURDATE())";
    $result = mysqli_query($conn, $sql);    

    if ($result) {
            ?>
            <script>
                alert('Attendance Added Successfully');
                window.location.href = 'mark_attendance.php';
            </script>
            <?php
        } else {
            $error = mysqli_stmt_error($result);
            ?>
            <script>
                alert('Attendance Added Successfully');
                window.location.href = 'mark_attendance.php'; 
            </script>
            <?php
            echo "Something went wrong: $error";
        }
     
}

mysqli_close($conn);
?>