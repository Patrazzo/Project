<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


include '../../Config/config.php';

if(isset($_POST['submit'])){

    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $pass = $_POST['pass'];
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
 
    $stmt = mysqli_prepare($conn, "SELECT * FROM `users` WHERE email = ?") or die('query preparation failed');
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
 
    if(mysqli_num_rows($result) > 0){
       $message[] = 'User already exists!';
    }else{
        $stmt = mysqli_prepare($conn, "INSERT INTO `users`(firstName, lastName, pass, email, phoneNumber) VALUES(?, ?, ?, ?, ?)") or die('query preparation failed');
        mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $hashedPass, $email, $phoneNumber);
        mysqli_stmt_execute($stmt);
        $message[] = 'Registered successfully!';
        header('location: ../../Home/EN/Home.html');
    }
}
?>
