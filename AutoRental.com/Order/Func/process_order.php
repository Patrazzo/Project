<?php
echo 'ivan';
session_start();
include '../../Config/config.php';
$users_id = $_SESSION['users_id'];

if (!isset($_SESSION['users_id'])) {
  die("User not logged in.");
}

$carId = isset($_POST['carId']) ? $_POST['carId'] : null;

if (!$carId) {
  die("Car ID not provided.");
}

$updateStmt = $conn->prepare("UPDATE catalog SET reservedBy = ? WHERE id = ?");
$updateStmt->bind_param("ii", $users_id, $carId);
$updateStmt->execute();

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$shippingAddress = $_POST['shippingAddress'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$pickupLocation = $_POST['pickupLocation'];
$city = $_POST['city'];
$postalCode = $_POST['postalCode'];

if ($_POST['paymentMethod'] === 'option1') {
  $paymentMethod = 'delivery';
} elseif ($_POST['paymentMethod'] === 'option2') {
  $paymentMethod = 'card';
} else {
  die("Invalid payment option selected.");
}

$stmt = $conn->prepare("INSERT INTO orders (firstName, lastName, shippingAddress, phoneNumber, email, pickupLocation, city, postalCode, paymentMethod, carId, userId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssiii", $firstName, $lastName, $shippingAddress, $phoneNumber, $email, $pickupLocation, $city, $postalCode, $paymentMethod, $carId, $users_id);

// Debug statements
echo "users_id: " . $users_id . "<br>";
echo "carId: " . $carId . "<br>";
echo "firstName: " . $firstName . "<br>";
echo "lastName: " . $lastName . "<br>";
echo "shippingAddress: " . $shippingAddress . "<br>";
echo "phoneNumber: " . $phoneNumber . "<br>";
echo "email: " . $email . "<br>";
echo "pickupLocation: " . $pickupLocation . "<br>";
echo "city: " . $city . "<br>";
echo "postalCode: " . $postalCode . "<br>";
echo "paymentMethod: " . $paymentMethod . "<br>";

$stmt->execute();

header('location: ../../Home/EN/HomeU.php');

$stmt->close();
$updateStmt->close();
$conn->close();
?>
