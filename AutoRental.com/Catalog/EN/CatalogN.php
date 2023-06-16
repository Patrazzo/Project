<?php
session_start();
include '../../Config/config.php';

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
    <title>Каталог | AutoRental</title>
    <script src="../Functionality/Catalog.js"></script>
    <link rel="stylesheet" href="../../GeneralStyling&Media/General/General.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Header/Header.css">
    <link rel="stylesheet" href="../Styling/Catalog.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Footer/Footer.css">
</head>

<body>
    <!-- OБЩ КОНТЕЙНЕР -->
    <div class="all">

        <!-- КОНТЕЙНЕР ЗА ХЕДЪР -->
        <div class="header">

            <!-- КОНТЕЙНЕР ЗА ЛОГО -->
            <div class="logo">
                <a href="../../Home/EN/HomeN.php"><img id="original-logo"
                        src="../../GeneralStyling&Media/Photos/Logo.png"></a>
                <a href="../../Home/EN/HomeN.php"><img id="hovered-logo"
                        src="../../GeneralStyling&Media/Photos/HoverLogo.png"></a>
            </div>
            <!-- КОНТЕЙНЕР ЗА ЛИНКОВЕ -->
            <div class="links">
                <a id="clicked" href="../../Catalog/EN/CatalogN.php">КАТАЛОГ</a>
                <a href="../../AboutUs/EN/AboutN.php">ЗА НАС</a>
                <a href="../../Contact/EN/ContactN.php">КОНТАКТ</a>
            </div>
            <!-- КОНТЕЙНЕР ЗА БУРГЕР МЕНЮ -->
            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!-- КОНТЕЙНЕР ЗА ДРОПДАУН -->
            <div class="menu">
                <a id="clicked" href="../../Catalog/EN/CatalogN.php">КАТАЛОГ</a>
                <a href="../../AboutUs/EN/AboutN.php">ЗА НАС</a>
                <a href="../../Contact/EN/ContactN.php">КОНТАКТ</a>
                <a href="../../Login/EN/Login.html">ВЛИЗАНЕ</a>
            </div>
            <!-- ИМПЛЕМЕНТАЦИЯ НA JS ЗА РАБОТА НА ДРОПДАУНА -->
            <script src="../../GeneralStyling&Media/Header/Header.js"></script>
            <!-- КОНТЕЙНЕР ЗА ЛОГИН -->
            <div class="login">
                <a href="../../Login/EN/Login.html"><img id="original-login"
                        src="../../GeneralStyling&Media/Photos/Login.png"></a>
                <a href="../../Login/EN/Login.html"><img id="hovered-login"
                        src="../../GeneralStyling&Media/Photos/HoverLogin.png"></a>
            </div>
        </div>

        <!-- КОНТЕЙНЕР ЗА МЕЙН -->
        <div class="main">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="content">';
                    echo '<br>';
                    echo '<img src="../../GeneralStyling&Media/Photos/cars/' . $row["image"] . '">';
                    echo '<h3>' . $row["name"] . '</h3>';
                    echo '<p>' . $row["description"] . '</p>';
                    echo '<br>';
                    echo '<h6>' . $row["price"] . '</h6>';
                    echo '<a href="../../Login/EN/Login.html" class="buy">Влез</a>';
                    echo '<br>';
                    echo '</div>';
                }
            } else {
                echo "<div style='color: var(--accent-color); font-size: 10px;'>";
                echo "<h2>Няма налични елементи в каталога.</h2>";
                echo "</div>";
            }
            ?>

        </div>
        <!-- КОНТЕЙНЕР ЗА SCROLL-TO-TOP СНИМКА -->
        <div class="scroller">
            <a onclick="scrollToTop(); return false;"><img src="../../GeneralStyling&Media/Photos/Logo.png" width="300"></a>
        </div>
        <!-- КОНТЕЙНЕР ЗА FOOTER -->
        <div class="footer">
            <h5>| Copyright © 2023 AutoRental | Всички права запазени |</h5>
        </div>
    </div>
</body>

</html>

<?php
$conn->close();
?>