<?php
if (isset($_POST['submit'])) {
    require_once 'db.php';
    $bank_id = sanitizeInput($_POST['bank_id']);
    $place = sanitizeInput($_POST['place']);
    $query = $conn->prepare("INSERT INTO Terminals (Bank_ID, Place) VALUES (?, ?)");
    $query->bind_param("ss", $bank_id, $place);
    $result = $query->execute();
    $conn->close();
    header("Location: index.html");
    exit();
} elseif (isset($_POST['back'])) {
    header("Location: index.html");
    exit();
}
function sanitizeInput($data) {
    $data = htmlspecialchars($data);
    $data = strip_tags($data);
    $data = trim($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ad_data.css">
    <title>Form</title>
    <script>
        function checkForm() {
            var bankID = document.getElementById("bank_id").value;
            var place = document.getElementById("place").value;
            var submitButton = document.getElementById("submit_button");

            if (bankID.trim() !== "" && place.trim() !== "") {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }
    </script>
</head>
<body>
<header>
    <div class="logo">
        <img src="img/log 1.png" alt="Simple Bank Logo">
    </div>
    <h1>Simple Bank</h1>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</header>

<form action="" method="post">
    <h2>Fill the form:</h2>
    <label for="bank_id">Bank ID:</label><br>
    <input type="text" id="bank_id" name="bank_id" onkeyup="checkForm()"><br>
    <label for="place">Place: </label><br>
    <input type="text" id="place" name="place" onkeyup="checkForm()"><br>
    <button class="btn" id="submit_button" type="submit" name="submit" disabled>Submit</button>
   <button class="btn" onclick="window.location.href = 'admin_panel.php'; return false;">Back</button>
</form>

<footer>
    <p>2024 Simple Bank. All rights reserved.</p>
</footer>
</body>
</html>
