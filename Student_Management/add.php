<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable Website Demonstration</title>
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
    <h2>ADD STUDENT </h2>
    <h3>Fill the details to add student: </h3>
    <form action="" method="post">
        <p>
            Name: *<input type="text" name="realname" placeholder="Type Your Name.." required>
        </p>
        <p>
            Father Name: *<input type="text" name="father_name" placeholder="Enter your father name..." required>
        </p>
        <p>
            DOB: *<input type="date" id="dob" name="dob" required>
        </p>
        <fieldset>
            <legend>Gender *</legend>
            <p>
                <input type="radio" name="gender" id="male" value="Male" required> Male 
                <input type="radio" name="gender" id="female" value="Female" required>Female
            </p>
        </fieldset>
        <p>
            Class: *<input type="number" name="class" id="class" placeholder="Enter your class..." required>
        </p>
        <p>
            School Name: *<input type="text" name="school_name" id="school_name" placeholder="Enter your school name...." required>
        </p>
        <p>
            Mobile No: *<input type="number" name="phoneno" placeholder="Type Your Phone number" required>
        </p>
        <p>
            Registeration Date: *<input type="date" name="reg_date" placeholder="Enter your registeration date..." required>
        </p>
        <hr>
        <input type="submit" value="Add Student">
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
    $sql = "INSERT INTO studentdetails (student_name, father_name, gender, dob, class, school_name, phoneno, reg_date) VALUES (?,?,?,?,?,?,?,?)";
    $sql2 = "INSERT INTO fee_detail (student_name) VALUES (?)";
    $stmt = mysqli_prepare($conn, $sql);
    $stmt2 = mysqli_prepare($conn, $sql2);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssisis", $param_student_name, $param_father_name, $param_gender, $param_dob, $param_class, $param_school_name, $param_phoneno, $param_reg_date);
        mysqli_stmt_bind_param($stmt2, "s", $param_student_name);
        
        
        // Set these parameters
        $param_father_name = trim($_POST['father_name']);
        $param_student_name = trim($_POST['realname']);
        $param_gender = $_POST['gender'];
        $param_dob = trim($_POST['dob']);
        $param_class = trim($_POST["class"]);
        $param_school_name = trim($_POST["school_name"]);
        $param_phoneno = trim($_POST["phoneno"]);
        $param_reg_date = trim($_POST["reg_date"]);

        $sql3 = "ALTER TABLE student_attendance ADD $param_student_name VARCHAR(100) DEFAULT 'ABSENT'";
        $result = mysqli_query($conn, $sql3);
        if(!$result){
            ?>
            <script>alert("Column Cannot be created this way you fool!");</script>
            <?php
        }

        // Try to execute the query
        if (mysqli_stmt_execute($stmt)) {
            // No output before the header()
            mysqli_stmt_execute($stmt2);
            ?>
            <script>
                alert('Entry Added Successfully');
                window.location.href = 'add.php'; // redirect to delete.html
            </script>
            <?php
        } else {
            $error = mysqli_stmt_error($stmt);
            echo "Something went wrong: $error";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt2);
    
}

mysqli_close($conn);
?>