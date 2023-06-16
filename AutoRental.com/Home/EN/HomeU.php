<?php
session_start();
$utype = $_SESSION['utype'];
$firstName = $_SESSION['firstName'];

if ($_SESSION['utype'] !== 'user') {
    header('location: ../../Login/EN/Login.html');
    exit();
} elseif (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_destroy();
    header('location: ../../Login/EN/Login.html');
    exit();
}
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
                <a href="../../Catalog/EN/CatalogU.php">KАТАЛОГ</a>
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
            <!-- КОНТЕЙНЕР ЗА ПРИВЕТСТВАЩО СЪОБЩЕНИЕ -->
            <div class="content">
                <h1 id="message">ДОБРЕ ДОШЛИ,
                    <?php echo $firstName; ?>
                </h1>
                <h2 id="description">Отдайте се на луксозно преживяване с водещия сайт за автомобили от висок клас на
                    Балканите.</h2>
            </div>
            <!-- КОНТЕЙНЕР ЗА МАРКИТЕ -->
            <div class="content">
                <h2>Нашите топ марки</h2>
                <div class="images">
                    <img src="../../GeneralStyling&Media/Photos/PorscheLogo.png" alt="">
                    <img src="../../GeneralStyling&Media/Photos/FerrariLogo.png" alt="">
                    <img src="../../GeneralStyling&Media/Photos/LamborghiniLogo.png" alt="">
                </div>
            </div>
            <!-- КОНТЕЙНЕР ЗА КРАТКАТА ИНФОРМАЦИЯ -->
            <div class="content">
                <div class="cards">
                    <div class="card">
                        <h2>КОИ СМЕ НИЕ</h2>
                        <p> Ние сме водеща компания за луксозни коли под наем. Предлагаме висококачествени
                            автомобили, персонализирани услуги и цялостно обслужване. Нашата цел е да предоставим
                            най-доброто изживяване на клиентите си.</p>
                        <a href="../../AboutUs/EN/AboutU.php"><button>ВИЖ ОЩЕ</button></a>
                    </div>
                    <div class="card">
                        <h2>НАШАТА МИСИЯ</h2>
                        <p> Нашата мисия: най-добро изживяване при наемане на коли. Луксозни автомобили - Ferrari,
                            Lamborghini, Porsche и др. Гладък процес, безпроблемно. Персонализирано обслужване,
                            поддръжка от начало до край. Винаги на разположение.</p>
                        <a href="../../AboutUs/EN/AboutU.php"><button>ВИЖ ОЩЕ</button></a>
                    </div>
                    <div class="card">
                        <h2>КАКВО ПРЕДЛАГАМЕ</h2>
                        <p>
                            Нашата компания за коли под наем предлага безпроблемно изживяване и грижи след наемането.
                            Онлайн резервации, удобни услуги за вземане и връщане. Поддръжка, почистване, спешна помощ.
                        </p>
                        <a href="../../AboutUs/EN/AboutU.php"><button>ВИЖ ОЩЕ</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- КОНТЕЙНЕР ЗА SCROLL-TO-TOP СНИМКА -->
        <div class="scroller">
            <a onclick="scrollToTop(); return false;"><img src="../../GeneralStyling&Media/Photos/Logo.png"></a>
        </div>
        <!-- КОНТЕЙНЕР ЗА FOOTER -->
        <div class="footer">
            <h5>| Copyright © 2023 AutoRental | Всички права запазени |</h5>
        </div>


    </div>
</body>

</html>