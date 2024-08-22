<?php
require_once 'db.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT EmployeeID, Full_Name, Specialty FROM Tech_Support";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["EmployeeID"] . "</td><td>" . $row["Full_Name"] . "</td><td>" . $row["Specialty"] .  "</td></tr>";
    }
} else {
    echo "0 results";
}