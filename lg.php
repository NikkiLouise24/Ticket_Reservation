<?php
$conn = mysqli_connect("localhost", "root", "", "allx");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Get user by username
    $sql = "SELECT * FROM her WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
if (mysqli_num_rows($result)>0){
     header("Location:lp"); exit();}
            // Login success — redirect
            header("Location: lp");
            exit();
    } else {
        echo "❌ Username not found!";
    }
}

mysqli_close($conn);
?>