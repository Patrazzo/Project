<?php
// Start the session and include the necessary files
session_start();
include '../../Config/config.php';
$utype = $_SESSION['utype'];

// Check if the user is logged in, else redirect to the login page
if ($_SESSION['utype'] !== 'admin') {
    header('location: ../../Login/EN/Login.html');
    exit();
}

// Check if the form is submitted to add a new product
if (isset($_POST['add_product'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // Insert the new product into the catalog table
    $insertQuery = "INSERT INTO catalog (name, description, image, price, created_at) VALUES ('$name', '$description', '$image', '$price', NOW())";
    mysqli_query($conn, $insertQuery);
}

// Check if the form is submitted to update a product
if (isset($_POST['update_product'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // Update the product in the catalog table
    $updateQuery = "UPDATE catalog SET name='$name', description='$description', image='$image', price='$price' WHERE id=$id";
    mysqli_query($conn, $updateQuery);
}

// Check if the form is submitted to delete a product
if (isset($_POST['delete_product'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    // Delete the product from the catalog table
    $deleteQuery = "DELETE FROM catalog WHERE id=$id";
    mysqli_query($conn, $deleteQuery);
}

// Retrieve the products from the catalog table
$query = "SELECT * FROM catalog";
$result = mysqli_query($conn, $query);
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
    <!-- HTML content goes here -->
    <div class="main">
        <div class="container">
            <h1>Products</h1>
                <!-- Display the existing products -->
<?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <div class="product">
        <div class="row">
            <p>Name</p>
            <h6><?php echo $row['name']; ?></h6>
        </div>
        <div class="row">
            <p>Description</p>
            <h6><?php echo $row['description']; ?></h6>
        </div>
        <div class="row">
            <p>Image</p>
            <img src="../../GeneralStyling&Media/Photos/cars/<?php echo $row['image']; ?>" alt="Product Image">
        </div>
        <div class="row">
            <p>Price</p>
            <h6><?php echo $row['price']; ?></h6>
        </div>

        <!-- Edit and delete options for each product -->
        <div class="row">
            <div class="options">
                <!-- Edit Form -->
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="name" value="<?php echo $row['name']; ?>">
                    <input type="text" name="description" value="<?php echo $row['description']; ?>">
                    <input type="text" name="image" value="<?php echo $row['image']; ?>">
                    <input type="text" name="price" value="<?php echo $row['price']; ?>">
                    <button type="submit" name="update_product">Update</button>
                </form>

                <!-- Delete Form -->
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="delete_product">Delete</button>
                </form>
            </div>
        </div>
    </div>
<?php endwhile; ?>


            <!-- Add new product form -->
            <div class="addPrProduct">
                <h3>Add New Product</h3>
                <form method="POST" action="">
                    <input type="text" name="name" placeholder="Product Name" required>
                    <input type="text" name="description" placeholder="Product Description" required>
                    <input type="text" name="image" placeholder="Product Image" required>
                    <input type="text" name="price" placeholder="Product Price" required>
                    <button type="submit" name="add_product">Add Product</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer content goes here -->
</body>

</html>
