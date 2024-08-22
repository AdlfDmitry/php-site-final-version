<?php
function sanitizeInput($data) {
    $data = htmlspecialchars($data);
    $data = strip_tags($data);
    $data = trim($data);
    return $data;
}

function validateEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

if (isset($_POST['submit'])) {
    require_once 'db.php';
    $full_name = sanitizeInput($_POST['full_name']);
    $phone_number = sanitizeInput($_POST['phone_number']);
    $email = sanitizeInput($_POST['email']);
    if (!validateEmail($email)) {
        exit("Incorrect email");
    }
    $query = $conn->prepare("INSERT INTO Customer (Full_Name, Phone_Number, Email) VALUES (?, ?, ?)");
    $query->bind_param("sss", $full_name, $phone_number, $email);
    $result = $query->execute();

    $conn->close();
    header("Location: index.html");
    exit();

} elseif (isset($_POST['back'])) {
    header("Location: index.html");
    exit();
}
?>
