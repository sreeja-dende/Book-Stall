<?php
// Database connection shared by login.php and register.php.
// Set DB_HOST / DB_USER / DB_PASS / DB_NAME as environment variables, or edit the defaults for local XAMPP.
$conn = mysqli_connect(
    getenv('DB_HOST') ?: '127.0.0.1',
    getenv('DB_USER') ?: 'root',
    getenv('DB_PASS') ?: '',
    getenv('DB_NAME') ?: 'dbms'
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
