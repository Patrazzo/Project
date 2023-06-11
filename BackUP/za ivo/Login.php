<!DOCTYPE html>
<html>

<head>
    <title>CRUD | Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');

        * {
            margin: 0;
            background-color: #333333;
            font-family: 'Playfair Display', serif;
        }

        header {
            margin: 0 20px 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333333;
            color: #ffe0a3;
            padding: 10px;
        }

        header a {
            margin: 0 20px 0 20px;
            text-decoration: none;
            color: #ffe0a3;
        }

        header h4 {
            font-size: 24px;
            color: #fff
        }

        .header-left {
            font-size: 24px;
        }

        .header-right {
            font-size: 24px;
        }

        .disabled {
            color: currentColor;
            cursor: not-allowed;
            opacity: 0.5;
            text-decoration: none;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 300px;
            width: 300px;
            color: #ffe0a3;
        }

        h1 {
            font-size: 48px;
            text-align: center;
        }

        .disabled {
            color: currentColor;
            cursor: not-allowed;
            opacity: 0.5;
            text-decoration: none;
        }

        .content {
            width: fit-content;
            margin: auto;
            margin-top: 150px;
            padding: 20px;
            background-color: #333333;
            border-radius: 10px;
            box-shadow: 0 0 25px rgba(255, 224, 163, 0.2);
        }

        .content h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffe0a3;
        }

        .txt_field {
            width: 300px;
            position: relative;
            margin-bottom: 25px;
        }

        .txt_field input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            border: none;
            border-bottom: 1px solid #ffe0a3;
            background-color: transparent;
            color: #ffffff;
        }

        .txt_field input:focus {
            outline: none;
        }

        .submit input {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            background-color: #ffe0a3;
            color: #333333;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.5s;
        }

        .submit input:hover {
            color: #fff;
            transition: 0.5s;
        }

        .error {
            color: palevioletred;
            font-size: 20px;
            text-align: center;
            margin: 30px;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-left">
            <a href="Welcome.php">Home</a>
        </div>
        <div class="header-right">
            <?php
            session_start();
            $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

            if ($email === '') {
                echo '<a class="disabled" href="Login.php">Login</a>';
                echo '<a href="Register.php">Register</a>';
            } else {
                echo '<a href="Table.php">Users</a>';
                echo '<a href="Logout.php">Logout</a>';
            }
            ?>
        </div>
    </header>

    <main>
        <div class="content">
            <form method="POST">
                <h1>Login</h1>
                <div class="txt_field">
                    <input type="text" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="txt_field">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="submit">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </main>
    <?php

    $servername = 'localhost';
    $username = 'root';
    $password = 'Mysql1234';
    $dbname = '19223';

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $errors = []; // Array to store error messages
    
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Retrieve user data from the database
        $sql = "SELECT * FROM `19223`.data WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Valid credentials, set session variable
            $_SESSION["email"] = $email;
            header("Location: Welcome.php");
            exit;
        } else {
            $errors[] = "Invalid email or password.";
        }

        if (!empty($errors)) {
            echo '<div class="error">';
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
            echo '</div>';
        }
    }

    // Close the connection
    $conn->close();

    ?>


</body>

</html>