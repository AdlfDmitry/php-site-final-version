<?php
require_once 'db.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT BankID,Place,TerminalID FROM Terminal";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["BankID"] . "</td><td>" . $row["Place"] . "</td><td>" . $row["TerminalID"] .  "</td></tr>";
    }
} else {
    echo "0 results";
}
$conn->close();