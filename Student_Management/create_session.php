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
            <li><a href="logout.php">Home</a></li>
            <li><a href="retrive.php">Student info</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href='logout.php'>Logout</a></li>
        </ul>
    </nav>
</header>
<div class="container">
    <h2>CREATE SESSION </h2>
    <h3>Enter the date:- </h3>
    <form action="" method="post">
        <p>
            Date: *<input type="date" name="session_date" required>
        </p>
        <hr>
        <input type="submit" value="Create Session">
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
    $sql = "INSERT INTO student_attendance (date) VALUES (?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s",$param_session_date);

        // Set these parameters
        $param_session_date = trim($_POST['session_date']);
        

        // Try to execute the query
        if (mysqli_stmt_execute($stmt)) {
            // No output before the header()
            ?>
            <script>
                alert('Session Added Successfully');
                window.location.href = 'home.php'; // redirect to delete.html
            </script>
            <?php
        } else {
            $error = mysqli_stmt_error($stmt);
            echo "Something went wrong: $error";
        }
    }
    mysqli_stmt_close($stmt);   
}

mysqli_close($conn);
?>