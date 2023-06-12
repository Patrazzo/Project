<?php
session_start();
$utype = $_SESSION['utype'];

if ($_SESSION['utype'] !== 'admin') {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../GeneralStyling&Media/Photos/Logo.png">
    <link rel="shortcut" href="../../GeneralStyling&Media/Photos/Logo.png">
    <title>Orders | AutoRental | Admin</title>
    <link rel="stylesheet" href="../../GeneralStyling&Media/General/General.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Header/Header.css">
    <link rel="stylesheet" href="../Styling/Order.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Footer/Footer.css">
</head>

<body>
    <div class="all">
        <div class="header">
            <div class="logo">
                <a href="../Panels/Dashboard.php"><img id="original-logo"
                        src="../../GeneralStyling&Media/Photos/Logo.png"></a>
                <a href="../Panels/Dashboard.php"><img id="hovered-logo"
                        src="../../GeneralStyling&Media/Photos/HoverLogo.png"></a>
            </div>

            <div class="links">
                <a href="../Panels/Products.php">Products</a>
                <a id="clicked" href="../Panels/Orders.php">Orders</a>
                <a href="../Panels/Account.php">Users</a>
                <a href="../Panels/Messages.php">Messages</a>
            </div>

            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="menu">
                <a href="../Panels/Dashboard.html">Dashboard</a>
                <a href="../Panels/Products.html">Products</a>
                <a id="clicked" href="../Panels/Orders.html">Orders</a>
                <a href="../Panels/Account.html">Users</a>
                <a href="../Panels/Messages.html">Messages</a>
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
            <div class="container">
                <h1>ORDERS</h1>
                <div class="order">
                    <div class="row">
                        <p>UserID</p>
                        <h6>1</h6>
                    </div>
                    <div class="row">
                        <p>placed on</p>
                        <h6>1</h6>
                    </div>
                    <div class="row">
                        <p>Name</p>
                        <h6>Ivoslav</h6>
                    </div>
                    <div class="row">
                        <p>Number</p>
                        <h6>0882029658</h6>
                    </div>
                    <div class="row">
                        <p>email</p>
                        <h6>19213@uktc-bg.com</h6>
                    </div>
                    <div class="row">
                        <p>Address</p>
                        <h6>
                            Димитър Стойчев
                        </h6>
                    </div>
                    <div class="row">
                        <p>Total products</p>
                        <h6>
                            Димитър Стойчев
                        </h6>
                    </div>
                    <div class="row">
                        <p>Total price</p>
                        <h6>
                            Димитър Стойчев
                        </h6>
                    </div>
                    <div class="row">
                        <p>payment method</p>
                        <h6>
                            Димитър Стойчев
                        </h6>
                    </div>
                    <div id="center" class="row">
                        <select>
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                        </select>
                    </div>
                    <div id="center" class="row">
                        <div class="options">
                            <button>Delete</button>
                            <button>Update</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer">
            <h5>AutoRental | AdminPanel</h5>
        </div>
    </div>
</body>

</html>