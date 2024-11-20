<?php

include "form.php";

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