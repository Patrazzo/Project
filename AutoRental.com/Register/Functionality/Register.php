<?php
// Establishing connection to MySQL server
$servername = "localhost"; // Change this to your MySQL server name
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "project"; // Change this to the name of your MySQL database

$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching data from the registration form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hashing password
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $egn = $_POST["egn"];

    // Input validation for fname and lname
    $fname_regex = "/^[A-Za-zА-Яа-я]+$/u";
    $lname_regex = "/^[A-Za-zА-Яа-я]+$/u";
    if (!preg_match($fname_regex, $fname) || !preg_match($lname_regex, $lname)) {
        echo "<script>alert('Error: First Name and Last Name should only contain English and Bulgarian alphabets.'); window.location.href='../../Register/EN/Register.php';</script>";
        exit;
    }

    // Input validation for password
    if (strlen($password) < 8) {
        echo "<script>alert('Error: Password should be at least 8 characters.'); window.location.href='../../Register/EN/Register.php';</script>";
        exit;
    }

    // Input validation for email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Error: Email is not valid.'); window.location.href='../../Register/EN/Register.php';</script>";
        exit;
    }

    // Input validation for tel
    $tel_regex = "/^\+359\d{9}$/";
    if (!preg_match($tel_regex, $tel)) {
        echo "<script>alert('Error: Phone Number is not valid.'); window.location.href='../../Register/EN/Register.php';</script>";
        exit;
    }

    

    // Check if any input field is empty
    if (empty($fname) || empty($lname) || empty($password) || empty($email) || empty($tel)) {
        echo "<script>alert('Error: Please fill in all the required fields.'); window.location.href='../../Register/EN/Register.php';</script>";
    } else {
        // Checking if email, EGN, or phone number already exists in the database
        $check_query = "SELECT * FROM users WHERE email='$email' OR egn='$egn' OR tel='$tel'";
        $check_result = $conn->query($check_query);
        if ($check_result->num_rows > 0) {
            echo "<script>alert('Error: Email, EGN, or Phone Number already exists.'); window.location.href='../../Register/EN/Register.php';</script>";
        } else {
            // Inserting data into MySQL database
            $sql = "INSERT INTO users (fname, lname, password, email, tel, egn) VALUES ('$fname', '$lname', '$hashed_password', '$email', '$tel', '$egn')";

            if ($conn->query($sql) === TRUE) {
                // Redirect to another page after successful registration
                header("Location: ../Home/home.html");
            } else {
                // Log the error on the server
                error_log("Error inserting data into MySQL: " . $conn->error);
                // Display a generic error message to the user
                echo "<script>alert('Error: There was a problem with your registration. Please try again later.'); window.location.href='../../Register/EN/Register.php';</script>";
            }
        }
    }
}
$conn->close();
?>