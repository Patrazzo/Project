<?php
session_start();
include '../../Config/config.php';
$users_id = $_SESSION['users_id'];

if (!isset($_SESSION['users_id'])) {
  die("User not logged in.");
}

// Retrieve the selected car details from the catalog
$selectedCarId = isset($_POST['carId']) ? $_POST['carId'] : null; // Проверете дали сте получили carId от формата

// Retrieve the catalog entry for the selected car
$stmt = $conn->prepare("SELECT id FROM catalog WHERE id = ?");
$stmt->bind_param("i", $selectedCarId);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the car ID from the catalog result
$row = $result->fetch_assoc();
$carId = $row['id'];

// Retrieve form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$shippingAddress = $_POST['shippingAddress'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$pickupLocation = $_POST['pickupLocation'];
$city = $_POST['city'];
$postalCode = $_POST['postalCode'];
$paymentMethod = $_POST['paymentMethod'];

// Prepare and execute the INSERT statement
$stmt = $conn->prepare("INSERT INTO orders (firstName, lastName, shippingAddress, phoneNumber, email, pickupLocation, city, postalCode, paymentMethod, carId, userId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssiii", $firstName, $lastName, $shippingAddress, $phoneNumber, $email, $pickupLocation, $city, $postalCode, $paymentMethod, $carId, $users_id);
$stmt->execute();

echo "Order submitted successfully.";

$stmt->close();
$conn->close();
?>
