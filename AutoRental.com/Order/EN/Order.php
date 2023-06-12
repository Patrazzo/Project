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
  <!-- OБЩ КОНТЕЙНЕР -->
  <div class="all">
    <!-- КОНТЕЙНЕР ЗА ХЕДЪР -->
    <div class="header">
      <!-- КОНТЕЙНЕР ЗА ЛОГО -->
      <div class="logo">
        <a href="../../Home/EN/HomeU.php"><img id="original-logo" src="../../GeneralStyling&Media/Photos/Logo.png"></a>
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
      <h2>ПОРЪЧКА</h2>
      <!-- КОНТЕЙНЕР ЗА ФОРМАТА -->
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
              <input type="hidden" name="carId" value="<?php echo $_GET['carId']; ?>">
            <div class="submit">
              <input type="submit" value="ЗАВЪРШИ ПОРЪЧКА" name="submit">
            </div>
          </form>
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