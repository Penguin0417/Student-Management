
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable Website Demonstration</title>
    <link rel="stylesheet" href="Style/update.css">
</head>
<body>
<header>
    <h1>Student Management System</h1>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="teacher_corner_home.php">Teacher's Corner</a></li>
            <li><a href="retrive.php">Student info</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href='logout.php'>Logout</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <h1>Update Entry</h1>
    <h3>Enter the student name to update that entry:</h3>
    <form id="myForm" action="" method="post">
                    <p>
                        Student Name: *<input type="text" id="student_name" name="student_name" placeholder="Type Your Name...." required>
                    </p>
                    <button type="submit" onclick="showform()" id="form-button"> Update </button>
    </form>
                    <div class="form-container", id="form-container">
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
                    <hr>
                    <input type="submit" value="Update">
                </div>
    </form>
</div>
<footer>
    <p>&copy; Student Management System</p>
</footer>
</body>
</html>

<?php
// Connect to the database
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if()
    ?>
    <script>
        function showform(){
                    // Get the element you want to modify
            const element = document.getElementById('form-container');
            const button = document.getElementById('form-button');
    
            // Change the CSS property
            element.style.display = 'block';
            button.style.display = 'none';
        }
    </script>
    <?php
}
else{
    ?>
    <script>alert("Enter a valid name...");</script>
    <?php
}
    
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve the roll no from the POST request
    $student_name = $_POST['student_name'];
    $father_name = $_POST['father_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $class = $_POST['class'];
    $school_name = $_POST['school_name'];
    $phoneno = $_POST['phoneno'];
    // Query to retrieve the student data
    $query = "UPDATE studentdetails SET father_name='$father_name', gender='$gender', dob='$dob',class='$class',school_name='$school_name',phoneno='$phoneno'  WHERE student_name = '$student_name'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if (!$result) {
        die("Query failed: ". mysqli_error($conn));
    }
}

// Close the connection
mysqli_close($conn);
?>
