<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" jcontent="width=device-width, initial-scale=1.0">
    <title>Sainik Sankalp Coaching Classes</title>
    <link rel="stylesheet" href="Style/teacher_corner/teacher_corner_home.css">
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
    <h2>Welcome to Student Management System </h2>
    <h3>Select what do you want to do:</h3>
    <ul>
        <div class="sub-container" onclick="">
            <li><a href="create_session.php">Create session</a></li>
        </div>
        <div class="sub-container" onclick="openfee_detail()">
            <li><a href="pay_fee.php">Pay Fee</a></li>
        </div>
        <div class="sub-container" onclick="openadd()">
            <li><a href="add.php">Add Student</a></li>
        </div>
        <!-- <div class="sub-container" onclick="openupdate()">
            <li><a href="update.php">Update Student</a></li>
        </div>
        <div class="sub-container" onclick="openretrive()">
            <li><a href="retrive.php">Retrieve Data</a></li>
        </div>
        <div class="sub-container" onclick="opendelete()">
            <li><a href="delete.php">Delete Student</a></li>
        </div> -->
    </ul>
</div>
<footer>
    <p>&copy; Student Management System</p>
</footer>
</body>
</html>