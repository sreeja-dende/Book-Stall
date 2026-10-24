<?php
require_once __DIR__ . '/../db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $fullName = trim($_POST['fullName']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $password = $_POST['password'];

    // Validate required fields
    if (empty($fullName) || empty($email) || empty($phone) || empty($address) || empty($password)) {
        die("All fields are required.");
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO bookstall (fullName, email, phone, address, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fullName, $email, $phone, $address, $hashedPassword);

    if ($stmt->execute()) {
        // Redirect to login page
        echo "<script>alert('Registration successful! Redirecting to login page.'); window.location.href='../login/login.html';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>

