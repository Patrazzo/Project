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
            <a class="disabled" href="">Users</a>
            <a href="Register.php">Register</a>
            <a href="Login.php">Login</a>
        </div>
    </header>
    <main>
        <div class="content">
            <h1>Welcome</h1>
        </div>
    </main>
</body>

</html>