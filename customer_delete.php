<?php
if (isset($_POST['submit'])) {
    require_once 'db.php';
    if (!empty($_POST['CustomerID'])) {
        $CustomerID = $_POST['CustomerID'];
        $query = $conn->prepare("DELETE FROM Customer WHERE CustomerID = ?");
        $query->bind_param("i", $CustomerID);
        $result = $query->execute();
        if ($result) {
            $resetAutoIncrementQuery = "ALTER TABLE Customer AUTO_INCREMENT = 1";
            if ($conn->query($resetAutoIncrementQuery) !== TRUE) {
                echo "Error resetting AUTO_INCREMENT: " . $conn->error;
            }
        } else {
            echo "Error deleting record: " . $query->error;
        }
        $query->close();
        $conn->close();
        header("Location: index.html");
        exit();
    } else {
        echo "CustomerID is required";
    }
} elseif (isset($_POST['back'])) {
    header("Location: index.html");
    exit();
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
            var CustomerID = document.getElementById("CustomerID").value;
            var submitButton = document.getElementById("submit_button");

            if (CustomerID.trim() !== "") {
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
 
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2>Fill the form:</h2>
        <label for="CustomerID">Enter customer's ID you want to delete:</label><br>
        <input type="text" id="CustomerID" name="CustomerID" onkeyup="checkForm()"><br> 
        <button class="btn" id="submit_button" type="submit" name="submit" disabled>Submit</button><br>
        <button class="btn" type="submit" name="back">Back</button>
    </form>

    <footer>
        <p>2024 Simple Bank. All rights reserved.</p>
    </footer>
</body>
</html>
