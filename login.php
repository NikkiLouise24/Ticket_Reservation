<?php
$conn = mysqli_connect("localhost", "root", "", "allx");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash the password before saving
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user
    $sql = "INSERT INTO her (username, password) VALUES ('$username', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "✅ Registration successful!";
    } else {
        echo "❌ Error: Username already taken or invalid.";
    }
}

mysqli_close($conn);
?>
