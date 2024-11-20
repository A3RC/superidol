<?php
include "conn.php";

$fullname = $_POST["name"];
$rollno = $_POST["rollno"];
$email = $_POST["email"];
$attendence = $_POST["attendence"];

$sql = "CREATE DATABASE IF NOT EXISTS databaseapple";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully <br>";
} else {
    echo "Error creating database: " . $conn->error;
}

mysqli_select_db($conn, "databaseapple");

$sql2 = "CREATE TABLE IF NOT EXISTS supertable (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    rollno VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    attendence VARCHAR(50)
)";

if ($conn->query($sql2) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql3 = "INSERT INTO supertable(name, rollno, email, attendence)
    VALUES ('$fullname', '$rollno', '$email', '$attendence')";

if ($conn->query($sql3) === TRUE) {
    echo "Data has been inserted";
} else {
    echo "Not inserted: " . $conn->error;
}

echo "<br>";

$display = "SELECT * FROM supertable";

$result = $conn->query($display);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " Name: " . $row["name"] . " Roll No: " . $row["rollno"] . " Email: " . $row["email"] . " Attendence: " . $row["attendence"] . "<br>";
    }
} else {
    echo "Zero results";
}
?>
