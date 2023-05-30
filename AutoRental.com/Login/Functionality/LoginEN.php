<?php
include '../../Config/config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["pass"])) {
            $_SESSION["id"] = $row["id"];
            $_SESSION["firstName"] = $row["firstName"];
            $_SESSION["lastName"] = $row["lastName"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["phoneNumber"] = $row["phoneNumber"];

            header('location: ../../Home/EN/Home.html');
            exit();
        } else {
            header('location: ../EN/Login.html');        
        }
    } else {
        header('location: ../EN/Login.html');    
    }
}
?>