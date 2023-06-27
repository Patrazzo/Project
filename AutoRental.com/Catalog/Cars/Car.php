<?php
session_start();
include '../../Config/config.php';
$utype = $_SESSION['utype'];

if ($_SESSION['utype'] !== 'user') {
    header('location: ../../Login/EN/Login.php');
    exit();
} elseif (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_destroy();
    header('location: ../../Login/EN/Login.php');
    exit();
}

$car_id = $_GET['car_id'];

$sql = "SELECT * FROM catalog WHERE car_id = $car_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $car = $result->fetch_assoc();
} else {
    header('location: ../../Catalog/EN/Catalog.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../GeneralStyling&Media/Photos/Logo.png">
    <link rel="shortcut" href="../../GeneralStyling&Media/Photos/Logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koла | AutoRental</title>
    <link rel="stylesheet" href="../../GeneralStyling&Media/General/General.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Header/Header.css">
    <link rel="stylesheet" href="Styling/Example.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Footer/Footer.css">
    <script src="../Functionality/Home.js"></script>
    <script src="Styling/script.js"></script>
</head>

<body>

    <!-- OБЩ КОНТЕЙНЕР -->
    <div class="all">

        <!-- КОНТЕЙНЕР ЗА ХЕДЪР -->
        <div class="header">

            <!-- КОНТЕЙНЕР ЗА ЛОГО -->
            <div class="logo">
                <a href="../../Home/EN/HomeU.php"><img id="original-logo"
                        src="../../GeneralStyling&Media/Photos/Logo.png"></a>
                <a href="../../Home/EN/HomeU.php"><img id="hovered-logo"
                        src="../../GeneralStyling&Media/Photos/HoverLogo.png"></a>
            </div>
            <!-- КОНТЕЙНЕР ЗА ЛИНКОВЕ -->
            <div class="links">
                <a href="../../Catalog/EN/CatalogU.php">КАТАЛОГ</a>
                <a href="../../AboutUs/EN/AboutU.php">ЗА НАС</a>
                <a href="../../Contact/EN/ContactU.php">КОНТАКТ</a>
            </div>
            <!-- КОНТЕЙНЕР ЗА БУРГЕР МЕНЮ -->
            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!-- КОНТЕЙНЕР ЗА ДРОПДАУН -->
            <div class="menu">
                <a href="../../Catalog/EN/CatalogU.php">КАТАЛОГ</a>
                <a href="../../AboutUs/EN/AboutU.php">ЗА НАС</a>
                <a href="../../Contact/EN/ContactU.php">КОНТАКТ</a>

                <?php if (isset($_GET['logout']) && $_GET['logout'] == 'true'): ?>
                    <a href="../../Login/EN/Login.html">ВЛИЗАНЕ</a>
                <?php else: ?>
                    <a href="../../Home/EN/HomeN.php?logout=true">ИЗЛИЗАНЕ</a>
                <?php endif; ?>

            </div>
            <!-- ИМПЛЕМЕНТАЦИЯ НA JS ЗА РАБОТА НА ДРОПДАУНА -->
            <script src="../../GeneralStyling&Media/Header/Header.js"></script>

            <!-- КОНТЕЙНЕР ЗА ЛОГИН -->
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

        <!-- КОНТЕЙНЕР ЗА МЕЙН -->
        <div class="main">
            <!-- КОНТЕЙНЕР ЗА СЪДЪРЖАНИЕТО -->
            <div class="container">
                <div class="images">
                    <img src="../../GeneralStyling&Media/Photos/cars/<?php echo $car['image']; ?>" alt="Car Image"
                        width="500">
                </div>
                <div class="info">
                    <div class="text">
                        <h1>
                            <?php echo $car['name']; ?>
                        </h1>
                        <br>
                        <h3>
                            <?php echo $car['description']; ?>
                        </h3>
                        <br>
                        <h2>
                            <?php echo $car['price']; ?>
                        </h2>
                    </div>
                    <a class="buy" href="../../Order/EN/Order.php?car_id=<?php echo $car['car_id']; ?>">Buy now</a>
                </div>
            </div>

        </div>
        <!-- КОНТЕЙНЕР ЗА FOOTER -->
        <div class="footer">
            <h5>| Copyright © 2023 AutoRental | Всички права запазени |</h5>
        </div>
</body>

</html>