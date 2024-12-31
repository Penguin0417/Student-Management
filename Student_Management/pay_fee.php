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
    <h2>Mark Your Attendance </h2>
    <h3>Enter the name:- </h3>
    <form action="" method="post">
        <p>
            Name: *<input type="text" name="student_name" required>
        </p>
        <p>
            <label for="months">Select a Month:</label>
            <select id="months" name="months">
                <option value="jan">January</option>
                <option value="feb">February</option>
                <option value="march">March</option>
                <option value="april">April</option>
                <option value="may">May</option>
                <option value="june">June</option>
                <option value="july">July</option>
                <option value="aug">August</option>
                <option value="sept">September</option>
                <option value="oct">October</option>
                <option value="nov">November</option>
                <option value="dec">December</option>
            </select>
        </p>
        <hr>
        <input type="submit" value="Pay Fee">
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
    $param_month = $_POST['months'];
    // $sql = "UPDATE fee_detail SET $param_month = 'PAID' WHERE student_name = $param_student_name";
    $sql = "UPDATE `fee_detail` SET $param_month = 'PAID' WHERE `fee_detail`.`student_name` = '$param_student_name'";
    $result = mysqli_query($conn, $sql);    

    if ($result) {
            ?>
            <script>
                alert('Fees Paid Successfully');
                window.location.href = 'pay_fee.php';
            </script>
            <?php
        } else {
            $error = mysqli_stmt_error($result);
            ?>
            <script>
                alert('Fees didn\'t paid Successfully');
                window.location.href = 'pay_fee.php'; 
            </script>
            <?php
            echo "Something went wrong: $error";
        }
     
}

mysqli_close($conn);
?>