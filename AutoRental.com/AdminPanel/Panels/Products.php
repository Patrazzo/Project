<?php
session_start();
include '../../Config/config.php';
$utype = $_SESSION['utype'];

if ($_SESSION['utype'] !== 'admin') {
    header('location: ../../Login/EN/Login.html');
    exit();
} elseif (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_destroy();
    header('location: ../../Login/EN/Login.html');
    exit();
}

if (isset($_GET['delete']) && $_GET['delete'] == 'true' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteSql = "DELETE FROM catalog WHERE id = '$id'";
    if (mysqli_query($conn, $deleteSql)) {
        header('location: ../Panels/Products.php');
        exit();
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $updateSql = "UPDATE catalog SET name='$name', description='$description', price='$price', image='$image' WHERE id='$id'";
    if (mysqli_query($conn, $updateSql)) {
        header('location: ../Panels/Products.php');
        exit();
    }
}

$sql = "SELECT * FROM catalog";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../GeneralStyling&Media/Photos/Logo.png">
    <link rel="shortcut" href="../../GeneralStyling&Media/Photos/Logo.png">
    <title>Products | AutoRental | Admin</title>
    <link rel="stylesheet" href="../../GeneralStyling&Media/General/General.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Header/Header.css">
    <link rel="stylesheet" href="../Styling/Products.css">
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
                <a id="clicked" href="../Panels/Products.php">Products</a>
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
                <a href="../Panels/Dashboard.html">Dashboard</a>
                <a id="clicked" href="../Panels/Products.html">Products</a>
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
                <h1>Products</h1>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image = $row['image'];

                    if (isset($_GET['edit']) && $_GET['edit'] == $id) {
                        echo '<form class="edit-form" method="post">';
                        echo '<input type="hidden" name="id" value="' . $id . '">';
                        echo '<div class="row">';
                        echo '<p>Name</p>';
                        echo '<input type="text" name="name" value="' . $name . '">';
                        echo '</div>';
                        echo '<div class="row">';
                        echo '<p>Description</p>';
                        echo '<input type="text" name="description" value="' . $description . '">';
                        echo '</div>';
                        echo '<div class="row">';
                        echo '<p>Price</p>';
                        echo '<input type="text" name="price" value="' . $price . '">';
                        echo '</div>';
                        echo '<p>Image</p>';
                        echo '<input type="text" name="image" value="' . $image . '">';
                        echo '</div>';
                        echo '<div class="row">';
                        echo '<input type="submit" name="update" value="Update">';
                        echo '<a href="?delete=true&id=' . $id . '" class="delete">Delete</a>';
                        echo '</div>';
                        echo '</form>';
                    } else {
                        echo '<div class="message">';
                        echo '<div class="row">';
                        echo '<p>Name</p>';
                        echo '<h6>' . $name . '</h6>';
                        echo '</div>';
                        echo '<div class="row">';
                        echo '<p>Description</p>';
                        echo '<h6>' . $description . '</h6>';
                        echo '</div>';
                        echo '<div class="row">';
                        echo '<p>Price</p>';
                        echo '<h6>' . $price . '</h6>';
                        echo '</div>';
                        echo '<div class="row">';
                        $imagePath = "../../GeneralStyling&Media/Photos/cars/" . $image;
                        if (file_exists($imagePath)) {
                            echo '<img width="100" src="' . $imagePath . '" alt="' . $name . '" class="product-image">';
                        } else {
                            echo '<p>Image not available</p>';
                        }
                        echo '</div>';
                        echo '<div class="row">';
                        echo '<a href="?edit=' . $id . '" class="edit">Edit</a>';
                        echo '<a href="?delete=true&id=' . $id . '" class="delete">Delete</a>';
                        echo '</div>';
                        echo '</div>';
                    }
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