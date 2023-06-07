<?php
session_start();

echo "Hello, stranger";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../GeneralStyling&Media/Photos/Logo.png">
    <link rel="shortcut" href="../../GeneralStyling&Media/Photos/Logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Начало | AutoRental</title>
    <script src="../Functionality/Home.js"></script>
    <link rel="stylesheet" href="../../GeneralStyling&Media/General/General.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Header/Header.css">
    <link rel="stylesheet" href="../Styling/Home.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Footer/Footer.css">
</head>

<body>
    <div class="all">

        <div class="header">
            <div class="logo">
                <a href="../../Home/EN/HomeN.php"><img id="original-logo"
                        src="../../GeneralStyling&Media/Photos/Logo.png"></a>
                <a href="../../Home/EN/HomeN.php"><img id="hovered-logo"
                        src="../../GeneralStyling&Media/Photos/HoverLogo.png"></a>
            </div>

            <div class="links">
                <a href="../../Catalog/EN/CatalogN.php">КАТАЛОГ</a>
                <a href="../../AboutUs/EN/AboutN.php">ЗА НАС</a>
                <a href="../../Contact/EN/ContactN.php">КОНТАКТ</a>
            </div>

            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="menu">
                <a href="../../Catalog/EN/CatalogN.php">КАТАЛОГ</a>
                <a href="../../AboutUs/EN/AboutN.php">ЗА НАС</a>
                <a href="../../Contact/EN/ContactN.php">КОНТАКТ</a>
                <a href="../../Login/EN/Login.html">ВЛИЗАНЕ</a>
            </div>

            <script src="../../GeneralStyling&Media/Header/Header.js"></script>

            <div class="login">
                <a href="../../Login/EN/Login.html"><img id="original-login"
                        src="../../GeneralStyling&Media/Photos/Login.png"></a>
                <a href="../../Login/EN/Login.html"><img id="hovered-login"
                        src="../../GeneralStyling&Media/Photos/HoverLogin.png"></a>
            </div>
        </div>


        <div class="main">

            <div class="content">
                <h1 id="message">ДОБРЕ ДОШЛИ В AUTORENTAL</h1>
                <h2 id="description">Отдайте се на луксозно преживяване с водещия сайт за автомобили от висок клас на
                    Балканите.</h2>
            </div>

            <div class="content">
                <h2>Нашите топ марки</h2>
                <div class="images">
                    <img src="../../GeneralStyling&Media/Photos/PorscheLogo.png" alt="">
                    <img src="../../GeneralStyling&Media/Photos/FerrariLogo.png" alt="">
                    <img src="../../GeneralStyling&Media/Photos/LamborghiniLogo.png" alt="">
                </div>
            </div>

            <div class="content">
                <div class="cards">
                    <div class="card">
                        <h2>КОИ СМЕ НИЕ</h2>
                        <p> Ние сме водеща компания за луксозни коли под наем. Предлагаме висококачествени
                            автомобили, персонализирани услуги и цялостно обслужване. Нашата цел е да предоставим
                            най-доброто изживяване на клиентите си.</p>
                            <button onclick="location.href = '../../AboutUs/EN/AboutN.php';">ВИЖ ОЩЕ</button>
                    </div>
                    <div class="card">
                        <h2>НАШАТА МИСИЯ</h2>
                        <p> Нашата мисия: най-добро изживяване при наемане на коли. Луксозни автомобили - Ferrari,
                            Lamborghini, Porsche и др. Гладък процес, безпроблемно. Персонализирано обслужване,
                            поддръжка от начало до край. Винаги на разположение.</p>
                            <button onclick="location.href = '../../AboutUs/EN/AboutN.php';">ВИЖ ОЩЕ</button>
                    </div>
                    <div class="card">
                        <h2>КАКВО ПРЕДЛАГАМЕ</h2>
                        <p>
                            Нашата компания за коли под наем предлага безпроблемно изживяване и грижи след наемането.
                            Онлайн резервации, удобни услуги за вземане и връщане. Поддръжка, почистване, спешна помощ.
                        </p>
                        <button onclick="location.href = '../../AboutUs/EN/AboutN.php';">ВИЖ ОЩЕ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="scroller">
        <a onclick="scrollToTop(); return false;"><img src="../../GeneralStyling&Media/Photos/Logo.png"></a>
    </div>
    <div class="footer">
        <h5>| Copyright © 2023 AutoRental | Всички права запазени |</h5>
    </div>



    </div>
</body>

</html>