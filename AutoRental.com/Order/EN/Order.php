<?php
$carId = $_GET['carId'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../../GeneralStyling&Media/Photos/Logo.png">
  <link rel="shortcut" href="../../GeneralStyling&Media/Photos/Logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Поръчка | AutoRental</title>
  <link rel="stylesheet" href="../../GeneralStyling&Media/General/General.css">
  <link rel="stylesheet" href="../../GeneralStyling&Media/Header/Header.css">
  <link rel="stylesheet" href="../Styling/Order.css">
  <link rel="stylesheet" href="../../GeneralStyling&Media/Footer/Footer.css">
</head>

<body>
  <div class="all">
    <div class="header">

      <div class="logo">
        <a href="../../Home/EN/HomeN.php"><img id="original-logo" src="../../GeneralStyling&Media/Photos/Logo.png"></a>
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
        <a href="../../Login/EN/Login.html"><img id="hovered-login"
            src="../../GeneralStyling&Media/Photos/HoverLogin.png"></a>
      </div>
    </div>

    <div class="main">
      <h2>ПОРЪЧКА</h2>
      <div class="container">
        <div class="form-container">
          <form action="../Func/process_order.php" method="POST">
            <div class="row">
              <div class="txt_field">
                <input type="text" name="firstName" placeholder="Име" required>
              </div>
              <div class="txt_field">
                <input type="text" name="lastName" placeholder="Фамилия" required>
              </div>
            </div>
            <div class="txt_field">
              <input type="text" name="shippingAddress" placeholder="Адрес" required>
            </div>
            <div class="txt_field">
              <input type="text" name="phoneNumber" placeholder="Телефонен номер" required>
            </div>
            <div class="txt_field">
              <input type="email" name="email" placeholder="Имейл" required>
            </div>
            <div class="txt_field">
              <input type="text" name="pickupLocation" placeholder="Адрес за получаване" required>
            </div>
            <div class="row">
              <div class="txt_field">
                <input type="text" name="city" placeholder="Град" required>
              </div>
              <div class="txt_field">
                <input type="text" name="postalCode" placeholder="Пощенски код" required>
              </div>
            </div>
            <div class="txt_field">
              <select name="c">
                <option value="" selected>- Начин на плащане -</option>
                <option value="option1">Наложен платеж</option>
                <option value="option2">Плащане с карта</option>
              </select>
            </div>
            <div class="txt_field">
              <input type="hidden" name="carId" value="<?php echo $carId; ?>">
            </div>
            <div class="submit">
              <input type="submit" value="ЗАВЪРШИ ПОРЪЧКА" name="submit">
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="footer">
      <h5>| Copyright © 2023 AutoRental | Всички права запазени |</h5>
    </div>


  </div>
</body>

</html>