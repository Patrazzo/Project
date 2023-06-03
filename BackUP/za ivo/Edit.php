<!DOCTYPE html>
<html>

<head>
    <title>CRUD | Edit</title>
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
            width: 300px;
            margin: auto;
            margin-top: 150px;
            padding: 20px;
            background-color: #333333;
            border-radius: 10px;
            box-shadow: 0 0 25px rgba(255, 224, 163, 0.2);
        }

        h1 {
            font-size: 48px;
            text-align: center;
            color: #ffe0a3;
            margin-bottom: 20px;
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


        form label {
            width: 300px;
            position: relative;
            margin-bottom: 25px;
            color: #ffe0a3;
        }

        form input[type="text"],
        form input[type="password"] {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            border: none;
            border-bottom: 1px solid #ffe0a3;
            background-color: transparent;
            color: #ffffff;
        }

        form input[type="text"]:focus,
        form input[type="password"]:focus {
            outline: none;
        }

        form input[type="submit"] {
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

        form input[type="submit"]:hover {
            color: #fff;
            transition: 0.5s;
        }

        .error {
            color: palevioletred;
            font-size: 20px;
            text-align: center;
            margin: 30px;
        }

        .succ {
            color: #ffe0a3;
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
            <a href="Table.php">Users</a>
            <a href="Welcome.php">Log out</a>
        </div>
    </header>
    <main>
        <?php
        $db = mysqli_connect('localhost', 'root', '', '19223');
        $ID = $_GET['ID'];
        $sql = "SELECT * FROM `19223`.data WHERE id = $ID";
        $res = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($res);

        if (isset($_POST['update'])) {
            $username = mysqli_real_escape_string($db, $_POST['username']);
            $password = mysqli_real_escape_string($db, $_POST['password']);

            $errors = []; // Array to store error messages
        
            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $reppassword = $_POST["reppassword"];

                // Name Validation 
                if (strlen($username) < 3) {
                    $errors[] = "The name must be at least 3 characters long.";
                }

                // Password validation - Stage 1: Length check
                if (strlen($password) < 8) {
                    $errors[] = "Password should be at least 8 characters long.";
                }

                if (strlen($password) > 20) {
                    $errors[] = "Password must be maximum 20 characters long.";
                }

                // Password validation - Stage 2: Uppercase, lowercase, digit check
                if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).*$/', $password)) {
                    $errors[] = "Password should contain at least 1 uppercase letter, 1 lowercase letter, and 1 digit.";
                }

                // Password validation - Stage 3: Special symbol check
                if (!preg_match('/^(?=.*[$@$!%*?&]).*$/', $password)) {
                    $errors[] = "Password should contain at least 1 special symbol ($, @, !, %, *, ?, &).";
                }

                // Password validation - Stage 4: Match check
                if ($password != $reppassword) {
                    $errors[] = "Passwords do not match.";
                }

                // Email validation
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Invalid email format.";
                }

                // Check if the email is already registered (excluding the check if the email value remains the same)
                if ($email != $row['email']) {
                    $sql = "SELECT * FROM `19223`.data WHERE email = '$email'";
                    $result = $db->query($sql);

                    if ($result->num_rows > 0) {
                        $errors[] = "Email already registered.";
                    }
                }

                // If there are no errors, update user data in the database
                if (empty($errors)) {
                    $sql = "UPDATE `19223`.data SET username='$username', email='$email', password='$password' WHERE id=$ID";

                    if ($db->query($sql) === TRUE) {
                        echo '<div class="succ">';
                        echo '<h1>Successful Update</h1>';
                        echo '</div>';
                    } else {
                        echo "Error: " . $sql . "<br>" . $db->error;
                    }
                } else if (!empty($errors)) {
                    echo '<div class="error">';
                    foreach ($errors as $error) {
                        echo $error . "<br>";
                    }
                    echo '</div>';
                }
            }
        }
        ?>
        <div class="content">
            <form method='post' action=''>
                <h1>Edit</h1>
                <input type='hidden' name='ID' value='<?php echo $row["ID"]; ?>'>
                <label for='username'>Username:</label>
                <input type='text' id='username' name='username' value='<?php echo $row["username"]; ?>' required>
                <br><br>
                <label for='email'>Email:</label>
                <input type='text' id='email' name='email' value='<?php echo $row["email"]; ?>' required>
                <br><br>
                <label for='password'>Password:</label>
                <input type='password' id='password' name='password' value='<?php echo $row["password"]; ?>' required>
                <br><br>
                <label for='RepPassword'>Password:</label>
                <div class="txt_field">
                    <input type="password" id="reppassword" name="reppassword" placeholder="Repeat Password" required>
                </div> <br><br>
                <input type='submit' name='update' value='Update'>
            </form>
        </div>
    </main>

</body>

</html>