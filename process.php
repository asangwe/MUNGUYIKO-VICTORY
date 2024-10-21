<?php
// Database connection
$servername = "localhost";
$username = "root";  // Replace with your MySQL username
$password = "";  // Replace with your MySQL password
$dbname = "victoryplatform";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize form data
$firstname = $conn->real_escape_string($_POST['firstname']);
$lastname = $conn->real_escape_string($_POST['lastname']);
$gender = $conn->real_escape_string($_POST['gender']);
$age = $conn->real_escape_string($_POST['age']);
$location = $conn->real_escape_string($_POST['location']);
$position = $conn->real_escape_string($_POST['position']);
$amount = $conn->real_escape_string($_POST['amount']);
$signature = $conn->real_escape_string($_POST['signature']);

// Insert data into database
$sql = "INSERT INTO victoryrecords (firstname, lastname, gender, age, location, position, amount, signature)
        VALUES ('$firstname', '$lastname', '$gender', '$age', '$location', '$position', '$amount', '$signature')";

if ($conn->query($sql) === TRUE) {
    echo " Th Records added successfully "."<br>";
    echo " in MUNGUYIKO VICTORY's Platform! "."<br>";
    echo "Thank you if there is any other we can Help you let's us know!"."<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
