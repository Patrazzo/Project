<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../GeneralStyling&Media/Photos/Logo.png">
    <link rel="shortcut" href="../../GeneralStyling&Media/Photos/Logo.png">
    <title>Dashboard | AutoRental | Admin</title>
    <link rel="stylesheet" href="../../GeneralStyling&Media/General/General.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Header/Header.css">
    <link rel="stylesheet" href="../Styling/Dashboard.css">
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
                <a href="../Panels/Orders.php">Orders</a>
                <a href="../Panels/Account.php">Users</a>
                <a href="../Panels/Messages.php">Messages</a>
            </div>

            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="menu">
                <a id="clicked" href="../Panels/Dashboard.html">Dashboard</a>
                <a href="../Panels/Products.html">Products</a>
                <a href="../Panels/Orders.html">Orders</a>
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
                <h1>Dashboard</h1>
                <div class="total">
                    <h2>TEST</h2>
                    <p>TEST TEXT</p>
                </div>
                <div class="completed">
                    <h2>TEST</h2>
                    <p>TEST TEXT</p>
                </div>
                <div class="orders">
                    <h2>TEST</h2>
                    <p>TEST TEXT</p>
                </div>
                <div class="products">
                    <h2>TEST</h2>
                    <p>TEST TEXT</p>
                </div>
                <div class="users">
                    <h2>TEST</h2>
                    <p>TEST TEXT</p>
                </div>
                <div class="admins">
                    <h2>TEST</h2>
                    <p>TEST TEXT</p>
                </div>
                <div class="accounts">
                    <h2>TEST</h2>
                    <p>TEST TEXT</p>
                </div>
                <div class="messages">
                    <h2>TEST</h2>
                    <p>TEST TEXT</p>
                </div>
            </div>
        </div>

        <div class="footer">
            <h5>AutoRental | AdminPanel</h5>
        </div>
    </div>
</body>
</html>