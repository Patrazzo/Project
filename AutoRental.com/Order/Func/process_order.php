<?php
session_start();
include '../../Config/config.php';
$users_id = $_SESSION['users_id'];

if (!isset($_SESSION['users_id'])) {
  die("User not logged in.");
}

$selectedCarId = isset($_POST['carId']) ? $_POST['carId'] : null;

$stmt = $conn->prepare("SELECT id FROM catalog WHERE id = ?");
$stmt->bind_param("i", $selectedCarId);
$stmt->execute();
$result = $stmt->get_result();

$row = $result->fetch_assoc();
$carId = $row['id'];

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$shippingAddress = $_POST['shippingAddress'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$pickupLocation = $_POST['pickupLocation'];
$city = $_POST['city'];
$postalCode = $_POST['postalCode'];

$paymentMethod = $_POST['c'];

if ($paymentMethod === "option1") {
  $paymentMethod = 1;
} elseif ($paymentMethod === "option2") {
  $paymentMethod = 2;
}

$stmt = $conn->prepare("INSERT INTO orders (firstName, lastName, shippingAddress, phoneNumber, email, pickupLocation, city, postalCode, paymentMethod, carId, userId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssiii", $firstName, $lastName, $shippingAddress, $phoneNumber, $email, $pickupLocation, $city, $postalCode, $paymentMethod, $carId, $users_id);
$stmt->execute();

header('location: ../../Home/EN/HomeU.php');

$stmt->close();
$conn->close();
?>
