<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sainik Sankalp Coaching Classes</title>
    <link rel="stylesheet" href="Style/fee_detail.css">
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
    <h2>Fee Detail</h2>
    <p>Write name of student to show it details: </p>
    <form id="myForm" action="" method="post">
        <p>
            Name: *<input type="text" id="student_name" name="student_name" placeholder="Type Your Name...">
        </p>
        <input type="submit" value="Retrive">
    </form>
    <br>
    <div id="table-container"></div>
</div>
<footer>
    <p>&copy; Student Management System</p>
</footer>
</body>
</html>

<script>
    // Get the form element
    var form = document.getElementById("myForm");

    // Add an event listener to the form submission
    form.addEventListener("submit", function(event) {
        event.preventDefault(); // prevent default form submission behavior

        // Check if the form is valid
        if (document.getElementById("student_name").value !== "") {
            fetchData();
        } else {
            alert("Please enter correct name...");
        }
    });

    // Create a function to fetch the data from the PHP server
    function fetchData() {
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Set the request method and URL
        xhr.open("POST", "fee_data.php", true);

        // Set the request headers
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Send the request with the roll no as a parameter
        xhr.send("student_name=" + document.getElementById("student_name").value);

        // Handle the response
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Parse the JSON data
                var data = JSON.parse(xhr.responseText);

                // Create a table element
                var table = document.createElement("table");
                table.border = "1";

                // Create a table header row
                var headerRow = document.createElement("tr");
                headerRow.innerHTML = "<th>Student Name</th><th>Apr</th><th>May</th><th>June</th><th>July</th><th>Aug</th><th>Sept</th><th>Oct</th><th>Nov</th><th>Dec</th><th>Jan</th><th>Feb</th><th>Mar</th>";
                table.appendChild(headerRow);

                // Create table rows and cells
                if (data) {
                    var row = document.createElement("tr");
                    row.innerHTML = "<td>" + data.student_name + "</td><td>" + data.april + "</td><td>" + data.may + "</td><td>" + data.june + "</td><td>" + data.july + "</td><td>" + data.aug + "</td><td>" + data.sept + "</td><td>" + data.oct + "</td><td>" + data.nov + "</td><td>" + data.dec + "</td><td>" + data.jan + "</td><td>" + data.feb + "</td><td>" + data.march +"</td>";
                    table.appendChild(row);
                } else {
                    var row = document.createElement("tr");
                    row.innerHTML = "<td colspan='7'>No student found with this roll no.</td>";
                    table.appendChild(row);
                }

                // Add the table to the HTML page
                document.getElementById("table-container").innerHTML = ""; // clear the container
                document.getElementById("table-container").appendChild(table);
            } else {
                console.error("Error fetching data:", xhr.statusText);
            }
        }
    }
</script>