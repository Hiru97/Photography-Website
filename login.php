<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $conn = mysqli_connect("localhost", "root", "", "malcolm");

 
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        mysqli_close($conn);

        echo '<script>alert("Login successful"); window.location.href = "index.php";</script>';
        exit();
    } else {

        echo '<script>alert("Login unsuccessful. Please use the correct User Name or Password"); window.location.href = "login.html";</script>';
    }

    mysqli_close($conn);
}
?>
