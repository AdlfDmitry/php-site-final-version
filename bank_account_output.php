<?php
require_once 'db.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Card_Number,Is_Active,Balance,CustomerID,BankID FROM Bank_Account";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Card_Number"] . "</td><td>" . $row["Is_Active"] . "</td><td>" . $row["Balance"] . "</td><td>" . $row["CustomerID"] .  "</td><td>" . $row["BankID"] ."</td></tr>";
    }
} else {
    echo "0 results";
}
$conn->close();