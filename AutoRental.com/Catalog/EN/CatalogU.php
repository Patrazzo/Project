<?php
session_start();
include '../../Config/config.php';

$firstName = $_SESSION['firstName'];
$utype = $_SESSION['utype'];

if ($_SESSION['utype'] !== 'user') {
    header('location: ../../Login/EN/Login.html');
    exit();
} elseif (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_destroy();
    header('location: ../../Login/EN/Login.html');
    exit();
} else {
    echo "Hello, user $firstName";
}

$sql = "SELECT * FROM catalog";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../GeneralStyling&Media/Photos/Logo.png">
    <link rel="shortcut" href="../../GeneralStyling&Media/Photos/Logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog | AutoRental</title>
    <link rel="stylesheet" href="../../GeneralStyling&Media/General/General.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Header/Header.css">
    <link rel="stylesheet" href="../Styling/Catalog.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Footer/Footer.css">
</head>

<body>
    <div class="all">

        <div class="header">

            <div class="logo">
                <a href="../../Home/EN/HomeU.php"><img id="original-logo"
                        src="../../GeneralStyling&Media/Photos/Logo.png"></a>
                <a href="../../Home/EN/HomeU.php"><img id="hovered-logo"
                        src="../../GeneralStyling&Media/Photos/HoverLogo.png"></a>
            </div>

            <div class="links">
                <a id="clicked" href="../../Catalog/EN/CatalogU.php">CATALOG</a>
                <a href="../../AboutUs/EN/AboutU.php">ABOUT US</a>
                <a href="../../Contact/EN/ContactU.php">CONTACT</a>
            </div>

            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="menu">
                <a href="../../Catalog/EN/CatalogU.php">CATALOG</a>
                <a href="../../AboutUs/EN/AboutU.php">ABOUT US</a>
                <a href="../../Contact/EN/ContactU.php">CONTACT</a>
                <?php if (isset($_GET['logout']) && $_GET['logout'] == 'true') : ?>
                    <a href="../../Login/EN/Login.html">LOGIN</a>
                <?php else : ?>
                    <a href="../../Home/EN/HomeN.php?logout=true">LOGOUT</a>
                <?php endif; ?>
            </div>

            <script src="../../GeneralStyling&Media/Header/Header.js"></script>

            <div class="login">
            <?php if (isset($_GET['logout']) && $_GET['logout'] == 'true') : ?>
                <a href="../../Home/EN/HomeN.php?logout=true"><img id="original-login" src="../../GeneralStyling&Media/Photos/Login.png"></a>
                <a href="../../Home/EN/HomeN.php?logout=true"><img id="hovered-login" src="../../GeneralStyling&Media/Photos/HoverLogin.png"></a>
            <?php else : ?>
                <a href="../../Home/EN/HomeN.php?logout=true"><img id="original-login" src="../../GeneralStyling&Media/Photos/Login.png"></a>
                <a href="../../Home/EN/HomeN.php?logout=true"><img id="hovered-login" src="../../GeneralStyling&Media/Photos/HoverLogin.png"></a>
            <?php endif; ?>
            </div>
        </div>

        <div class="main">
        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="content">';
                    echo '<img src="../../GeneralStyling&Media/Photos/cars/' . $row["image"] . '">';
                    echo '<h3>' . $row["name"] . '</h3>';
                    echo '<p>' . $row["description"] . '</p>';
                    echo '<h6>' . $row["price"] . '</h6>';
                    echo '<br>';
                    echo '<a href="../Cars/car.html" class="buy">Виж повече</a>';
                    echo '<br>';
                    echo '</div>';
                }
            } else {
                echo "Няма налични елементи в каталога.";
            }
            ?>

        </div>

        <div class="footer">
            <h5>Copyright © 2023 AutoRental | All rights reserved |
                <a href="../../Catalog/BG/CatalogU.php"><img src="../../GeneralStyling&Media/Photos/BG.jpg" height="10" width="15"
                        alt="bg"></a>
                <a href="../../Catalog/EN/CatalogU.php"><img src="../../GeneralStyling&Media/Photos/EN.jpg" height="10" width="15"
                        alt="en"></a>
            </h5>
        </div>


    </div>
</body>

</html>

<?php
$conn->close();
?>