<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../GeneralStyling&Media/Photos/Logo.png">
    <link rel="shortcut" href="../../GeneralStyling&Media/Photos/Logo.png">
    <title>Messages | AutoRental | Admin</title>
    <link rel="stylesheet" href="../../GeneralStyling&Media/General/General.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Header/Header.css">
    <link rel="stylesheet" href="../Styling/Messages.css">
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
                <a id="clicked" href="../Panels/Messages.php">Messages</a>
            </div>

            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="menu">
                <a href="../Panels/Dashboard.html">Dashboard</a>
                <a href="../Panels/Products.html">Products</a>
                <a href="../Panels/Orders.html">Orders</a>
                <a href="../Panels/Account.html">Users</a>
                <a id="clicked" href="../Panels/Messages.html">Messages</a>

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
                <h1>Messages</h1>
                <div class="message">
                    <div class="row">
                        <p>UserID</p>
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
                        <p>Message</p>
                        <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem error aut pariatur totam
                            reiciendis, alias quis culpa nihil in expedita enim doloribus, recusandae inventore tenetur
                            harum consectetur et fuga sunt. Lorem ipsum, dolor sit amet consectetur adipisicing elit. At
                            sunt molestias eligendi aut veritatis laborum iure consectetur nemo, dicta excepturi quod
                            illo recusandae repellendus harum vitae ratione libero rerum ipsam.
                        </h6>
                    </div>
                </div>
                <div class="message">
                    <div class="row">
                        <p>UserID</p>
                        <h6>2</h6>
                    </div>
                    <div class="row">
                        <p>Name</p>
                        <h6>Petercho</h6>
                    </div>
                    <div class="row">
                        <p>Number</p>
                        <h6>0882029658</h6>
                    </div>
                    <div class="row">
                        <p>email</p>
                        <h6>19223@uktc-bg.com</h6>
                    </div>
                    <div class="row">
                        <p>Message</p>
                        <h6>
                            Как беше рожденият ден?
                        </h6>
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