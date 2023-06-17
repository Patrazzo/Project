<?php
session_start();
$utype = $_SESSION['utype'];

if ($_SESSION['utype'] !== 'admin') {
    header('location: ../../Login/EN/Login.html');
    exit();
} elseif (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_destroy();
    exit();
}

include '../../Config/config.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM messages";
$result = mysqli_query($conn, $sql);

if (isset($_GET['delete']) && $_GET['delete'] == 'true' && isset($_GET['message_id'])) {
    $messageId = $_GET['message_id'];
    $deleteSql = "DELETE FROM messages WHERE id = '$messageId'";
    if (mysqli_query($conn, $deleteSql)) {
        header('location: ../Panels/Messages.php');

    } else {
        echo "Error deleting message: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?><?php
$utype = $_SESSION['utype'];

if ($_SESSION['utype'] !== 'admin') {
    header('location: ../../Login/EN/Login.html');
    exit();
} elseif (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_destroy();
    header('location: ../../Login/EN/Login.html');
    exit();
}

include '../../Config/config.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM messages";
$result = mysqli_query($conn, $sql);

if (isset($_GET['delete']) && $_GET['delete'] == 'true' && isset($_GET['message_id'])) {
    $messageId = $_GET['message_id'];
    $deleteSql = "DELETE FROM messages WHERE id = '$messageId'";
    if (mysqli_query($conn, $deleteSql)) {
        header('location: ../Panels/Messages.php');
        exit();
    }
}

mysqli_close($conn);
?>

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
                <a href="../Panels/Products.php">PRODUCTS</a>
                <a href="../Panels/Orders.php">ORDERS</a>
                <a href="../Panels/Account.php">USERS</a>
                <a id="clicked" href="../Panels/Messages.php">MESSAGES</a>
            </div>

            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="menu">
                <a href="../Panels/Dashboard.php">DASHBOARD</a>
                <a href="../Panels/Products.php">PRODUCTS</a>
                <a href="../Panels/Orders.php">ORDERS</a>
                <a href="../Panels/Account.php">USERS</a>
                <a id="clicked" href="../Panels/Messages.php">MESSAGES</a>
                <a href="../../Home/EN/HomeN.php?logout=true">ИЗЛИЗАНЕ</a>

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
                <h1>MESSAGES</h1>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $messageId = $row['id'];
                    $firstName = $row['firstName'];
                    $lastName = $row['lastName'];
                    $topic = $row['topic'];
                    $email = $row['email'];
                    $body = $row['body'];
                ?>
                    <div class="message">
                        <div class="row">
                            <p>Name</p>
                            <h6><?php echo $firstName . " " . $lastName; ?></h6>
                        </div>
                        <div class="row">
                            <p>Number</p>
                            <h6><?php echo $topic; ?></h6>
                        </div>
                        <div class="row">
                            <p>Email</p>
                            <h6><?php echo $email; ?></h6>
                        </div>
                        <div class="row">
                            <p>Message</p>
                            <h6><?php echo $body; ?></h6>
                        </div>
                        <div class="row">
                            <a href="?delete=true&message_id=<?php echo $messageId; ?>" class="delete">Delete</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="footer">
            <h5>AutoRental | AdminPanel</h5>
        </div>
    </div>
</body>

</html>