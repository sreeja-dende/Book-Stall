<?php
session_start();

require_once __DIR__ . '/../db.php';

// Get POST data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $inputUsername = $_POST['user'] ?? '';
    $inputPassword = $_POST['secret'] ?? '';

    // Look up user in DB
    $sql = "SELECT * FROM bookstall WHERE fullName = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // If password matches
        if (password_verify($inputPassword, $user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: ../catalogue/catalogue.html");
            exit();
        } else {
            echo "<script>alert('Incorrect password'); window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('User not found'); window.location.href='login.html';</script>";
    }
}
$conn->close();
?>

