<?php
session_start();
include '../../Config/config.php';

$utype = $_SESSION['utype'];

if ($utype !== 'admin') {
    header('location: ../../Login/EN/Login.html');
    exit();
} elseif (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_destroy();
    header('location: ../../Login/EN/Login.html');
    exit();
}

if (isset($_GET['delete']) && $_GET['delete'] == 'true' && isset($_GET['id'])) {
    $car_id = $_GET['id'];
    $deleteSql = "DELETE FROM catalog WHERE car_id = '$car_id'";
    if (mysqli_query($conn, $deleteSql)) {
        header('location: ../Panels/Products.php');
        exit();
    }
}

if (isset($_POST['update'])) {
    $car_id = $_POST['car_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $updateSql = "UPDATE catalog SET name='$name', description='$description', price='$price', image='$image' WHERE car_id='$car_id'";
    if (mysqli_query($conn, $updateSql)) {
        header('location: ../Panels/Products.php');
        exit();
    }
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $insertSql = "INSERT INTO catalog (name, description, price, image, created_at, available) VALUES ('$name', '$description', '$price', '$image', NOW(), 1)";
    if (mysqli_query($conn, $insertSql)) {
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
                <a id="clicked" href="../Panels/Products.php">PRODUCTS</a>
                <a href="../Panels/Orders.php">ORDERS</a>
                <a href="../Panels/Account.php">USERS</a>
                <a href="../Panels/Messages.php">MESSAGES</a>
            </div>

            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="menu">
                <a href="../Panels/Dashboard.html">DASHBOARD</a>
                <a id="clicked" href="../Panels/Products.php">PRODUCTS</a>
                <a href="../Panels/Orders.php">ORDERS</a>
                <a href="../Panels/Account.php">USERS</a>
                <a href="../Panels/Messages.php">MESSAGES</a>
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
            <form class="add-form" method="post">
                <h2>ADD NEW PRODUCT</h2>
                <input type="text" name="name" placeholder="Name" required>
                <input type="text" name="description" placeholder="Description" required>
                <input type="text" name="price" placeholder="Price" required>
                <input type="text" name="image" placeholder="Image" required>
                <input id="submit" type="submit" name="add" value="Add">
            </form>

            <div class="listContainer">
                <table class="listTable">
                    <h1>PRODUCTS</h1>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $car_id = $row['car_id'];
                        $name = $row['name'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image = $row['image'];

                        if (isset($_GET['edit']) && $_GET['edit'] == $car_id) {
                            echo '<form class="edit-form" method="post">';
                            echo '<input type="hidden" name="car_id" value="' . $car_id . '">';
                            echo '<tr>';
                            echo '<td><input id="edit" type="text" name="name" value="' . $name . '"></td>';
                            echo '<td><input id="edit" type="text" name="description" value="' . $description . '"></td>';
                            echo '<td><input id="edit" type="text" name="price" value="' . $price . '"></td>';
                            echo '<td><input id="edit" type="text" name="image" value="' . $image . '"></td>';
                            echo '<td><input id="edit" class="button" type="submit" name="update" value="Update">';
                            echo '<a href="?delete=true&id=' . $car_id . '" class="button">Delete</a></td>';
                            echo '</tr>';
                            echo '</form>';
                        } else {
                            echo '<tr>';
                            echo '<td>' . $name . '</td>';
                            echo '<td>' . $description . '</td>';
                            echo '<td>' . $price . '</td>';
                            echo '<td><img width="50" src="../../GeneralStyling&Media/Photos/cars/' . $image . '"></td>';
                            echo '<td><a href="?edit=' . $car_id . '" class="button">Edit</a>';
                            echo '<a href="?delete=true&id=' . $car_id . '" class="button">Delete</a></td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </table>
            </div>


        </div>

        <div class="footer">
            <h5>AutoRental | AdminPanel</h5>
        </div>
    </div>
</body>

</html>