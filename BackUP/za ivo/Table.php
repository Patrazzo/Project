<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');

        * {
            margin: 0;
            background-color: #333333;
            font-family: 'Playfair Display', serif;

        }

        html {
            scrollbar-width: none;
            scrollbar-color: red green;
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
            transition: 0.5s;
        }

        header a:hover {
            color: #555;
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

        table {
            width: 70%;
            border-collapse: collapse;
            margin: auto;
            border: 5px double #ffe0a3;
            color: #fff;
        }

        th,
        td {
            text-align: center;
            padding: 10px;
        }

        th {
            background-color: #222222;
            color: #ffe0a3;
        }

        .btn {
            border-radius: 4px;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
        }

        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-thumb {
            background: #ddaf54;
            border-radius: 6px;
        }
    </style>
    <title>CRUD | Users</title>
</head>

<?php
$serv = 'localhost';
$user = 'root';
$pass = 'Mysql1234';
$dbName = '19223';
$db = new mysqli($serv, $user, $pass, $dbName) or die("Unable to connect");

if (isset($_POST['edit'])) {
    $id = $_POST['ID'];
    header("Location: Edit.php?ID=" . $id);
    exit();
}

if (isset($_POST['delete'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM `$dbName`.data WHERE id = $id";
    if ($db->query($sql) === TRUE) {
        echo '<meta http-equiv="refresh" content="0">';
    } else {
        echo "Error deleting record: " . $db->error;
    }
}

?>

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
                echo '<a href="Login.php">Login</a>';
                echo '<a href="Register.php">Register</a>';
            } else {
                echo '<a class="disabled" href="Table.php">Users</a>';
                echo '<a href="Logout.php">Logout</a>';
            }
            ?>
        </div>
    </header>

    <div class="content">
        <table>
            <tr>
                <th>-ID-</th>
                <th>-Username-</th>
                <th>-Password-</th>
                <th>-Email-</th>
                <th>-Deletion-</th>
                <th>-Edit-</th>
            </tr>
            <?php
            $res = $db->query("SELECT * FROM `$dbName`.data");
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["password"] . "</td>
                    <td>" . $row["email"] . "</td>
                    
                    <td>
                        <form class='fix' method='post'>
                            <input type='hidden' name='ID' value='" . $row["id"] . "'>
                            <button class='btn btn-danger' type='submit' name='delete' ID='delete_" . $row["id"] . "'>Delete</button>
                        </form>
                    </td>
                    <td>
                        <form class='fix' method='post'>
                            <input type='hidden' name='ID' value='" . $row["id"] . "'>
                            <button class='btn btn-warning'' type='submit' name='edit' ID='edit_" . $row["id"] . "'>Edit</button>
                        </form>
                    </td>
                    </tr>";
                }
            }
            ?>
        </table>
    </div>
</body>

</html>