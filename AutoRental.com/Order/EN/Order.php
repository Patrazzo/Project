<?php
$carId = $_GET['carId'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Order Form</title>
</head>
<body>
  <h2>Order Form</h2>
  <form action="../Func/process_order.php" method="POST">
    <label for="firstName">First Name:</label>
    <input type="text" name="firstName" required><br><br>

    <label for="lastName">Last Name:</label>
    <input type="text" name="lastName" required><br><br>

    <label for="shippingAddress">Shipping Address:</label>
    <input type="text" name="shippingAddress" required><br><br>

    <label for="phoneNumber">Phone Number:</label>
    <input type="text" name="phoneNumber" required><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br><br>

    <label for="pickupLocation">Pickup Location:</label>
    <input type="text" name="pickupLocation" required><br><br>

    <label for="city">City:</label>
    <input type="text" name="city" required><br><br>

    <label for="postalCode">Postal Code:</label>
    <input type="text" name="postalCode" required><br><br>

    <label for="paymentMethod">Payment Method:</label>
    <input type="text" name="paymentMethod" required><br><br>

    <input type="hidden" name="carId" value="<?php echo $carId; ?>">

    <input type="submit" value="Submit">
  </form>
</body>
</html>