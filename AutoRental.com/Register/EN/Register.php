<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../../Config/config.php';

$message = '';

if (isset($_POST['submit'])) {

    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    if (!preg_match("/^[a-zA-Zа-яА-Я]{3,}$/u", $firstName) || !preg_match("/^[a-zA-Zа-яА-Я]{3,}$/u", $lastName)) {
        $message = 'невалидно име';
    } else {
        $pass = $_POST['pass'];
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
        $utype = 'user';

        if (!preg_match("/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $pass)) {
            $message = 'невалидна парола';
        } else {
            if (!preg_match("/^(\\+359|0[8])[0-9]{8,10}$/", $phoneNumber)) {
                $message = 'невалиден телефон';
            } else {
                $stmt = mysqli_prepare($conn, "SELECT * FROM `users` WHERE email = ?");
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) > 0) {
                    $message = 'вече има такъв потребител';
                } else {
                    $stmt = mysqli_prepare($conn, "INSERT INTO `users`(firstName, lastName, pass, email, phoneNumber, utype) VALUES(?, ?, ?, ?, ?, ?)");
                    mysqli_stmt_bind_param($stmt, "ssssss", $firstName, $lastName, $hashedPass, $email, $phoneNumber, $utype);
                    mysqli_stmt_execute($stmt);
                    header('Location: ../../Login/EN/Login.html');
                    exit;
                }
            }
        }
    }
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
    <title>Регистрация | AutoRental</title>
    <link rel="stylesheet" href="../../GeneralStyling&Media/General/General.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Header/Header.css">
    <link rel="stylesheet" href="../Styling/Register.css">
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
                <a href="../../Catalog/EN/CatalogN.php">КАТАЛОГ</a>
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
                <a href="../../Catalog/EN/CatalogN.php">КАТАЛОГ</a>
                <a href="../../AboutUs/EN/AboutN.php">ЗА НАС</a>
                <a href="../../Contact/EN/ContactN.php">КОНТАКТ</a>
                <a href="../../Login/EN/Login.html">ВЛИЗАНЕ</a>
            </div>
            <!-- ИМПЛЕМЕНТАЦИЯ НA JS ЗА РАБОТА НА ДРОПДАУНА -->
            <script src="../../GeneralStyling&Media/Header/Header.js"></script>
            <!-- КОНТЕЙНЕР ЗА ЛОГИН -->
            <div class="login">
                <a href="../../Login/EN/Login.html"><img id="hovered-login"
                        src="../../GeneralStyling&Media/Photos/HoverLogin.png"></a>
            </div>
        </div>
        <!-- КОНТЕЙНЕР ЗА МЕЙН -->
        <div class="main">
            <h2>РЕГИСТРАЦИЯ</h2>
            <!-- КОНТЕЙНЕР ЗА ФОРМАТА -->
            <div class="container">
                <!--ФОРМАТА -->
                <div class="form-container">
                    <form action="" method="post">

                        <div class="txt_field">
                            <input type="text" id="firstName" name="firstName" placeholder="Име" required>
                        </div>
                        <div class="txt_field">
                            <input type="text" id="lastName" name="lastName" placeholder="Фамилия" required>
                        </div>
                        <div class="txt_field">
                            <input type="password" id="pass" name="pass" placeholder="Парола" required>
                        </div>
                        <div class="txt_field">
                            <input type="email" id="email" name="email" placeholder="Имейл" required>
                        </div>
                        <div class="txt_field">
                            <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Телефонен номер"
                                required>
                        </div>
                        <div class="sure">
                            <input type="checkbox" id="sure" name="sure" value="Sure" required>
                            <label for="sure">Съгласен съм с <a
                                    href="../../Terms&Conds/EN/Terms&Conds.html">условията.</a></label>
                        </div>
                        <?php if (!empty($message)): ?>
                            <h3>
                                <?php echo $message; ?>
                            </h3>
                        <?php endif; ?>
                        <div class="submit">
                            <input type="submit" value="СЪЗДАЙ" name="submit">
                        </div>
                        <div class="loginl">
                            <label for="login">Вече имате акаунт?</label>
                            <a href="../../Login/EN/Login.html" name="login">Влезте<a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- КОНТЕЙНЕР ЗА ФУУТЪР -->
        <div class="footer">
            <h5>| Copyright © 2023 AutoRental | Всички права запазени |</h5>
        </div>
    </div>
</body>

</html>