<?php
session_start();
$utype = $_SESSION['utype'];

if ($_SESSION['utype'] !== 'admin') {
    header('location: ../../Login/EN/Login.html');
    exit();
} elseif (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_destroy();
    header('location: ../../Login/EN/Login.html');
    exit();
}

include '../../Config/config.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);

if (isset($_GET['delete']) && $_GET['delete'] == 'true' && isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];
    $deleteSql = "DELETE FROM orders WHERE id = '$orderId'";
    if (mysqli_query($conn, $deleteSql)) {
        header('location: ../Panels/Orders.php');
    } else {
        echo "Error deleting order: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../GeneralStyling&Media/Photos/Logo.png">
    <link rel="shortcut" href="../../GeneralStyling&Media/Photos/Logo.png">
    <title>Orders | AutoRental | Admin</title>
    <link rel="stylesheet" href="../../GeneralStyling&Media/General/General.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Header/Header.css">
    <link rel="stylesheet" href="../Styling/Order.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Footer/Footer.css">
</head>

<body>
    <div class="all">
        <div class="header">
            <div class="logo">
                <a href="../Panels/Dashboard.php"><img id="original-logo"
                        src="../../GeneralStyling&Media/Photos/Logo.png"></a>
                <a href="../Panels/Dashboard.php"><img id="hovered-logo"
                        src="../../GeneralStyling&Media/Photos/HoverLogo.png"></a>
            </div>

            <div class="links">
                <a href="../Panels/Products.php">Products</a>
                <a id="clicked" href="../Panels/Orders.php">Orders</a>
                <a href="../Panels/Account.php">Users</a>
                <a href="../Panels/Messages.php">Messages</a>
            </div>

            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="menu">
                <a href="../Panels/Dashboard.html">Dashboard</a>
                <a href="../Panels/Products.html">Products</a>
                <a id="clicked" href="../Panels/Orders.html">Orders</a>
                <a href="../Panels/Account.html">Users</a>
                <a href="../Panels/Messages.html">Messages</a>
            </div>

            <script src="../../GeneralStyling&Media/Header/Header.js"></script>

            <div class="login">
                <?php if (isset($_GET['logout']) && $_GET['logout'] == 'true'): ?>
                    <a href="../../Home/EN/HomeN.php?logout=true"><img id="original-login"
                            src="../../GeneralStyling&Media/Photos/Login.png"></a>
                    <a href="../../Home/EN/HomeN.php?logout=true"><img id="hovered-login"
                            src="../../GeneralStyling&Media/Photos/HoverLogin.png"></a>
                <?php else: ?>
                    <a href="../../Home/EN/HomeN.php?logout=true"><img id="original-login"
                            src="../../GeneralStyling&Media/Photos/Login.png"></a>
                    <a href="../../Home/EN/HomeN.php?logout=true"><img id="hovered-login"
                            src="../../GeneralStyling&Media/Photos/HoverLogin.png"></a>
                <?php endif; ?>
            </div>
        </div>

        <div class="main">
            <div class="container">
                <h1>Orders</h1>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $orderId = $row['id'];
                    $firstName = $row['firstName'];
                    $lastName = $row['lastName'];
                    $shippingAddress = $row['shippingAddress'];
                    $phoneNumber = $row['phoneNumber'];
                    $email = $row['email'];
                    $pickupLocation = $row['pickupLocation'];
                    $city = $row['city'];
                    $postalCode = $row['postalCode'];
                    $paymentMethod = $row['paymentMethod'];
                    $createdAt = $row['createdAt'];
                    $carId = $row['carId'];
                    $userId = $row['userId'];
                ?>
                            <div class="order">
            <div class="row">
                <p>Order ID</p>
                <h6><?php echo $orderId; ?></h6>
            </div>
            <div class="row">
                <p>Name</p>
                <h6><?php echo $firstName . ' ' . $lastName; ?></h6>
            </div>
            <div class="row">
                <p>Shipping Address</p>
                <h6><?php echo $shippingAddress; ?></h6>
            </div>
            <div class="row">
                <p>Phone Number</p>
                <h6><?php echo $phoneNumber; ?></h6>
            </div>
            <div class="row">
                <p>Email</p>
                <h6><?php echo $email; ?></h6>
            </div>
            <div class="row">
                <p>Pickup Location</p>
                <h6><?php echo $pickupLocation; ?></h6>
            </div>
            <div class="row">
                <p>City</p>
                <h6><?php echo $city; ?></h6>
            </div>
            <div class="row">
                <p>Postal Code</p>
                <h6><?php echo $postalCode; ?></h6>
            </div>
            <div class="row">
                <p>Payment Method</p>
                <h6>
                    <?php
                    if ($paymentMethod == 0) {
                        echo 'On Delivery';
                    } elseif ($paymentMethod == 1) {
                        echo 'By Card';
                    }
                    ?>
                </h6>
            </div>
            <div class="row">
                <p>Placed on</p>
                <h6><?php echo $createdAt; ?></h6>
            </div>
            <div class="row">
                <p>Car ID</p>
                <h6><?php echo $carId; ?></h6>
            </div>
            <div class="row">
                <p>User ID</p>
                <h6><?php echo $userId; ?></h6>
            </div>
            <div class="row">
                <a class="delete" href="?delete=true&order_id=<?php echo $orderId; ?>">Delete</a>
            </div>
        </div>

                <?php
                }
                ?>

            </div>
        </div>

        <div class="footer">
            <h5>AutoRental | AdminPanel</h5>
        </div>
    </div>
</body>

</html>