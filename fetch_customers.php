<?php
require_once 'db.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT CustomerID, Full_Name, Phone_Number, Email FROM Customer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["CustomerID"] . "</td><td>" . $row["Full_Name"] . "</td><td>" . $row["Phone_Number"] . "</td><td>" . $row["Email"] . "</td></tr>";
    }
} else {
    echo "0 results";
}
$conn->close();

