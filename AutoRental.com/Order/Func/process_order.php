<?php
session_start();
include '../../Config/config.php';
$users_id = $_SESSION['users_id'];

if (!isset($_SESSION['users_id'])) {
  die("User not logged in.");
}

$car_id = isset($_POST['car_id']) ? $_POST['car_id'] : null;

if (!$car_id) {
  die("Car ID not provided.");
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$shippingAddress = $_POST['shippingAddress'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$pickupLocation = $_POST['pickupLocation'];
$city = $_POST['city'];
$postalCode = $_POST['postalCode'];
$paymentMethod = $_POST['paymentMethod'];

$stmt = $conn->prepare("INSERT INTO orders (firstName, lastName, shippingAddress, phoneNumber, email, pickupLocation, city, postalCode, paymentMethod, carId, userId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssi", $firstName, $lastName, $shippingAddress, $phoneNumber, $email, $pickupLocation, $city, $postalCode, $paymentMethod, $car_id, $users_id);


$stmt->execute();

header('location: ../../Home/EN/HomeU.php');

$stmt->close();
$conn->close();
?>
