<?php
session_start();

    echo "Hello, stranger";
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
				<a id="clicked" href="../../Contact/EN/ContactN.php">КОНТАКТ</a>
			</div>

			<div class="menu-toggle">
				<span></span>
				<span></span>
				<span></span>
			</div>

			<div class="menu">
				<a href="../../Catalog/EN/CatalogN.php">КАТАЛОГ</a>
				<a href="../../AboutUs/EN/AboutN.php">ЗА НАС</a>
				<a id="clicked" href="../../Contact/EN/ContactN.php">КОНТАКТ</a>
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
			<h2>СВЪРЖИ СЕ С НАС</h2>
			<div class="container">
				<div class="form-container">

					<form action="../Functionality/ContactEN.php" class="contact-form">
						<input type="text" id="fname" name="fname" placeholder="Име" required>
						<input type="text" id="lname" name="lname" placeholder="Фамилия" required>
						<input type="text" id="subject" name="subject" placeholder="Тема" required>
						<input type="text" id="email" name="email" placeholder="Имейл" required>
						<textarea id="body" name="body" rows="10" cols="50" placeholder="Съобщение"></textarea>
						<div class="submit">
							<input type="submit" value="ИЗПРАТИ">
						</div>
					</form>
				</div>

				<!-- Map -->
				<div class="map">
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2922.958894452646!2d23.908034299999997!3d42.894814000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40aa501bf6a08c81%3A0xe4f50f5955f4a188!2z0J3Qn9CTINC_0L4g0LrQvtC80L_RjtGC0YrRgNC90Lgg0YLQtdGF0L3QvtC70L7Qs9C40Lgg0Lgg0YHQuNGB0YLQtdC80Lg!5e0!3m2!1sbg!2sbg!4v1684692207029!5m2!1sbg!2sbg"
						style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
					</iframe>
				</div>
			</div>
		</div>
		<div class="footer">
            <h5>| Copyright © 2023 AutoRental | Всички права запазени |</h5>
        </div>
	</div>
</body>

</html>