<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email and password from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query the database to get the hashed password for the given email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // Check if any row is returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data from the query result
        $row = mysqli_fetch_assoc($result);

        // Verify the password using password_verify() function
        if (password_verify($password, $row["password"])) {
            // Start a session and store the user data
            session_start();
            $_SESSION["id"] = $row["id"];
            $_SESSION["fname"] = $row["fname"];
            $_SESSION["lname"] = $row["lname"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["tel"] = $row["tel"];
            $_SESSION["egn"] = $row["egn"];

            // Redirect to the home page or any other page you want after successful login
            echo '<script>alert("Login successful!"); window.location="../Home/home.html";</script>';
            exit();
        } else {
            // Invalid password, show an error message
            echo '<script>alert("Invalid email or password. Please try again."); window.location="../Login/Login.html";</script>';
        }
    } else {
        // Invalid email, show an error message
        echo '<script>alert("Invalid email or password. Please try again."); window.location="../Login/Login.html";</script>';
    }
}
?>