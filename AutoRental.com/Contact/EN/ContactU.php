<?php
session_start();
$utype = $_SESSION['utype'];

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
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="../../GeneralStyling&Media/Photos/Logo.png">
	<link rel="shortcut" href="../../GeneralStyling&Media/Photos/Logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Контакт | AutoRental</title>
	<link rel="stylesheet" href="../../GeneralStyling&Media/General/General.css">
	<link rel="stylesheet" href="../../GeneralStyling&Media/Header/Header.css">
	<link rel="stylesheet" href="../Styling/Contact.css">
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
				<a id="clicked" href="../../Contact/EN/ContactU.php">КОНТАКТ</a>
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
                <a id="clicked" href="../../Contact/EN/ContactU.php">КОНТАКТ</a>
                <?php if (isset($_GET['logout']) && $_GET['logout'] == 'true') : ?>
                    <a href="../../Login/EN/Login.html">ВЛИЗАНЕ</a>
                <?php else : ?>
                    <a href="../../Home/EN/HomeN.php?logout=true">ИЗЛИЗАНЕ</a>
                <?php endif; ?>
            </div>
            <!-- ИМПЛЕМЕНТАЦИЯ НA JS ЗА РАБОТА НА ДРОПДАУНА -->
			<script src="../../GeneralStyling&Media/Header/Header.js"></script>

			<!-- КОНТЕЙНЕР ЗА ЛОГИН -->
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

		<!-- КОНТЕЙНЕР ЗА МЕЙН -->
		<div class="main">
			<h2>CONTACT US</h2>
			<!-- КОНТЕЙНЕР ЗА СЪДЪРЖАНИЕТО -->
			<div class="container">
				<div class="form-container">
					<form action="../Functionality/ContactU.php" class="contact-form" method="post">
						<input type="text" id="firstName" name="firstName" placeholder="Име" required>
						<input type="text" id="lastName" name="lastName" placeholder="Фамилия" required>
						<input type="text" id="topic" name="topic" placeholder="Тема" required>
						<input type="text" id="email" name="email" placeholder="Имейл" required>
						<textarea id="body" name="body" rows="10" cols="50" placeholder="Съобщение"></textarea>
						<div class="submit">
							<input type="submit" name="submit" value="ИЗПРАТИ">
						</div>
					</form>
				</div>

				<!-- КОНТЕЙНЕР ЗА КАРТАТА -->
				<div class="map">
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2922.958894452646!2d23.908034299999997!3d42.894814000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40aa501bf6a08c81%3A0xe4f50f5955f4a188!2z0J3Qn9CTINC_0L4g0LrQvtC80L_RjtGC0YrRgNC90Lgg0YLQtdGF0L3QvtC70L7Qs9C40Lgg0Lgg0YHQuNGB0YLQtdC80Lg!5e0!3m2!1sbg!2sbg!4v1684692207029!5m2!1sbg!2sbg"
						style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
					</iframe>
				</div>
			</div>
		</div>
		<!-- КОНТЕЙНЕР ЗА FOOTER -->
		<div class="footer">
            <h5>| Copyright © 2023 AutoRental | Всички права запазени |</h5>
        </div>
	</div>
</body>

</html>