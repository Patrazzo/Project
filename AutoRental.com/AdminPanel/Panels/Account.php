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

include '../../Config/config.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (isset($_GET['update']) && $_GET['update'] == 'true' && isset($_GET['user_id']) && isset($_GET['utype'])) {
    $userId = $_GET['user_id'];
    $userType = $_GET['utype'];
    $updateSql = "UPDATE users SET utype = '$userType' WHERE users_id = '$userId'";
    if (mysqli_query($conn, $updateSql)) {
        header('location: ../Panels/Account.php');
    } else {
        echo "Error updating user type: " . mysqli_error($conn);
    }
}

if (isset($_GET['delete']) && $_GET['delete'] == 'true' && isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
    $deleteSql = "DELETE FROM users WHERE users_id = '$userId'";
    if (mysqli_query($conn, $deleteSql)) {
        header('location: ../Panels/Account.php');
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
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
    <title>Account | AutoRental | Admin</title>
    <link rel="stylesheet" href="../../GeneralStyling&Media/General/General.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Header/Header.css">
    <link rel="stylesheet" href="../Styling/Account.css">
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
                <a id="clicked" href="../Panels/Account.php">Users</a>
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
                <a href="../Panels/Orders.html">Orders</a>
                <a id="clicked" href="../Panels/Account.html">Users</a>
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
            <h1>ACCOUNTS</h1>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $userId = $row['users_id'];
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                $email = $row['email'];
                $userType = $row['utype'];
            ?>
                <div class="message">
                    <div class="row">
                        <p>UserID</p>
                        <h6><?php echo $userId; ?></h6>
                    </div>
                    <div class="row">
                        <p>Username</p>
                        <h6><?php echo $firstName . ' ' . $lastName; ?></h6>
                    </div>
                    <div class="row">
                        <p>Email</p>
                        <h6><?php echo $email; ?></h6>
                    </div>
                    <div class="row">
                        <p>Type</p>
                        <h6><?php echo $userType; ?></h6>
                    </div>
                    <div class="row">
                        <form action="" method="GET">
                            <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
                            <select name="utype">
                                <option value="admin" <?php echo ($userType === 'admin') ? 'selected' : ''; ?>>Admin</option>
                                <option value="user" <?php echo ($userType === 'user') ? 'selected' : ''; ?>>User</option>
                            </select>
                            <button type="submit" name="update" value="true">Update Type</button>
                        </form>
                        <form action="" method="GET">
                            <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
                            <button type="submit" name="delete" value="true">Delete User</button>
                        </form>
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