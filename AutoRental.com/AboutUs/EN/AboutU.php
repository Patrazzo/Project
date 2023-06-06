<?php
session_start();
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../GeneralStyling&Media/Photos/Logo.png">
    <link rel="shortcut" href="../../GeneralStyling&Media/Photos/Logo.png">
    <script src="../Functionality/About.js"></script>
    <title>За нас | AutoRental</title>
    <link rel="stylesheet" href="../../GeneralStyling&Media/General/General.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Header/Header.css">
    <link rel="stylesheet" href="../Styling/About.css">
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
                <a href="../../Catalog/EN/CatalogU.php">КАТАЛОГ</a>
                <a id="clicked" href="../../AboutUs/EN/AboutU.php">ЗА НАС</a>
                <a href="../../Contact/EN/ContactU.php">КОНТАКТ</a>
            </div>

            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

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
            <div class="TextContainer">
                <div>
                    <h2>КОИ СМЕ НИЕ</h2>
                </div>
                <div class="Row">
                    <div class="text">
                        <p>
                            Добре дошли в нашата компания за луксозни коли под наем, където предлагаме разнообразна гама
                            от висококачествени коли под наем автомобили, които да отговарят на всички ваши нужди. Ние
                            служим на обществеността от години и спечелихме a репутация на най-добрия доставчик на коли
                            под
                            наем на Балканите. Нашият ангажимент към съвършенство, обслужване на клиенти, а
                            най-изключителният
                            автопарк е несравним в региона. Нашият фокус върху удовлетвореността на клиентите е от
                            първостепенно
                            значение. Ние разбираме, че всеки клиент е уникален и имат своите специфични нужди и
                            желания. Затова
                            предлагаме персонализирани препоръки и услуги, съобразени с всеки клиент. Ние се гордеем с
                            предоставянето на изключителна услуга, която надхвърля очакванията, от момента, в който се
                            свържете
                            с нас до края на вашия наем.
                        </p>
                    </div>
                    <div class="image">
                        <img src="../../GeneralStyling&Media/Photos/Dealership.jpg">
                    </div>
                </div>


                <div>
                    <h2>НАШАТА МИСИЯ</h2>
                </div>
                <div class="Row">

                    <div class="image">
                        <img src="../../GeneralStyling&Media/Photos/Dealership.jpg">
                    </div>
                    <div class="text">
                        <p>
                            Нашата мисия е проста - да предоставим на нашите клиенти възможно най-доброто изживяване при
                            наемане на коли под наем. Ние предлагаме голямо разнообразие от луксозни, висококачествени и
                            бързи автомобили от марки като Ferrari, Lamborghini, Porsche и др. Нашата цел е да направим
                            процеса на наемане на автомобил максимално гладък и възможно най-безпроблемно, така че
                            нашите
                            клиенти да могат
                            да се съсредоточат върху удоволствието от шофирането. Ние се гордеем с нашето изключително
                            обслужване
                            на клиентите. Нашият екип е посветен на това всеки клиент получава персонализирано внимание
                            и поддръжка
                            от момента на първия контакт ни до края на периода им под наем. Винаги сме на разположение
                            да отговорим на
                            въпроси, да предоставим препоръки и предлагаме всякаква помощ, от която нашите клиенти може
                            да се нуждаят.
                        </p>
                    </div>
                </div>



                <div>
                    <h2>КАКВО ПРЕДЛАГАМЕ</h2>
                </div>
                <div class="Row">
                    <div class="text">
                        <p>
                            В нашата компания за коли под наем разбираме, че наемането на кола е повече от транзакция -
                            това
                            е опит. Ето защо ние предлагаме набор от услуги, за да направим цялото изживяване при
                            наемане възможно
                            най-безпроблемно приятно като възможно, от онлайн резервация до услуги за вземане и връщане.
                            Предлагаме
                            и пълна гама от след наемане услуги, за да гарантирате, че изживяването ви под наем е
                            възможно най-без стрес,
                            включително редовно почистване и поддръжка, спешна пътна помощ и експертни техници, обучени
                            да се справят дори с
                            повечето комплекс ремонти.
                        </p>
                    </div>
                    <div class="image">
                        <img src="../../GeneralStyling&Media/Photos/Dealership.jpg">
                    </div>
                </div>
            </div>
            <div class="scroller">
                <a onclick="scrollToTop(); return false;"><img src="../../GeneralStyling&Media/Photos/Logo.png"
                        width="300"></a>
            </div>
        </div>

        <div class="footer">
            <h5>| Copyright © 2023 AutoRental | Всички права запазени |</h5>
        </div>



    </div>
</body>

</html>