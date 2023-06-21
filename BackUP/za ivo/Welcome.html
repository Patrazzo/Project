<!DOCTYPE html>
<html>

<head>
    <title>CRUD | Welcome</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');

        * {
            margin: 0;
            background-color: #333333;
            font-family: 'Playfair Display', serif;
        }

        header {
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
            margin: 0 20px 0 20px;
            font-size: 24px;
        }

        .header-right {
            margin: 0 20px 0 20px;
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
            height: 500px;
            color: #ffe0a3;
        }

        h1 {
            font-size: 48px;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-left">
            <a class="disabled" href="Welcome.php">Home</a>
        </div>
        <div class="header-right">
            <?php
            session_start();
            $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

            if ($email === '') {
                echo '<a href="Login.php">Login</a>';
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
            <h1>Welcome
                <?php
                
                $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

                if ($email === '') {
                    echo "Guest";
                } else {
                    // Connect to the database (replace with your own database connection code)
                    $servername = 'localhost';
                    $username = 'root';
                    $password = 'Mysql1234';
                    $dbname = '19223';
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Prepare and execute the SQL query to retrieve the username
                    $stmt = $conn->prepare("SELECT username FROM data WHERE email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        // Fetch the username from the result set
                        $row = $result->fetch_assoc();
                        $username = $row['username'];

                        echo $username;
                    }

                    // Close the database connection
                    $stmt->close();
                    $conn->close();
                }
                ?>
            </h1>
        </div>

    </main>


</body>

</html>