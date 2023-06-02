<?php
session_start();

$users_id = $_SESSION['users_id'];
$firstName = $_SESSION['firstName'];


if(!isset($users_id)){
   header('location:../../Login/EN/Login.html');
}
else{
    echo "Hello, admin $firstName";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../GeneralStyling&Media/Photos/Logo.png">
    <link rel="shortcut" href="../../GeneralStyling&Media/Photos/Logo.png">
    <script src="../Functionality/About.js"></script>
    <title>About Us | AutoRental</title>
    <link rel="stylesheet" href="../../GeneralStyling&Media/General/General.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Header/Header.css">
    <link rel="stylesheet" href="../Styling/About.css">
    <link rel="stylesheet" href="../../GeneralStyling&Media/Footer/Footer.css">


</head>

<body>
    <div class="all">
        <div class="header">

            <div class="logo">
                <a href="../../Home/EN/Home.html"><img id="original-logo"
                        src="../../GeneralStyling&Media/Photos/Logo.png"></a>
                <a href="../../Home/EN/Home.html"><img id="hovered-logo"
                        src="../../GeneralStyling&Media/Photos/HoverLogo.png"></a>
            </div>

            <div class="links">
                <a href="../../Catalog/EN/Catalog.html">CATALOG</a>
                <a id="clicked" href="../../AboutUs/EN/AboutA.php">ABOUT US</a>
                <a href="../../Contact/EN/Contact.html">CONTACT</a>
            </div>

            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="menu">
                <a href="../../Catalog/EN/Catalog.html">CATALOG</a>
                <a id="clicked" href="../../AboutUs/EN/AboutA.php">ABOUT US</a>
                <a href="../../Contact/EN/Contact.html">CONTACT</a>
                <a href="../../Login/EN/Login.html">LOGIN</a>
            </div>

            <script src="../../GeneralStyling&Media/Header/Header.js"></script>

            <div class="login">
                <a href="../../Login/EN/Login.html"><img id="original-login"
                        src="../../GeneralStyling&Media/Photos/Login.png"></a>
                <a href="../../Login/EN/Login.html"><img id="hovered-login"
                        src="../../GeneralStyling&Media/Photos/HoverLogin.png"></a>
            </div>
        </div>

        <div class="main">
            <div class="TextContainer">
                <div>
                    <h2>WHO WE ARE</h2>
                </div>
                <div class="Row">
                    <div class="text">
                        <p>
                            Welcome to our luxury car rental company, where we offer a diverse range of high-quality
                            rental
                            cars to meet all your needs. We have been serving the public for years and have earned a
                            reputation as the best car rental provider in the Balkans. Our commitment to excellence,
                            customer service, and the most exceptional fleet of cars is unmatched in the region.

                            Our focus on customer satisfaction is paramount. We understand that every customer is unique
                            and
                            has their specific needs and desires. Therefore, we offer personalized recommendations and
                            services tailored to each customer. We pride ourselves on providing exceptional service that
                            goes above and beyond expectations, from the moment you contact us to the end of your rental
                            period.
                        </p>
                    </div>
                    <div class="image">
                        <img src="../../GeneralStyling&Media/Photos/Dealership.jpg">
                    </div>
                </div>


                <div>
                    <h2>OUR MISSION</h2>
                </div>
                <div class="Row">

                    <div class="image">
                        <img src="../../GeneralStyling&Media/Photos/Dealership.jpg">
                    </div>
                    <div class="text">
                        <p>
                            Our mission is simple - to provide our customers with the best possible car rental
                            experience.
                            We offer a wide variety of luxury, high quality, and fast cars from brands such as Ferrari,
                            Lamborghini, Porsche, and more. Our goal is to make the process of renting a car as smooth
                            and
                            seamless as possible, so that our customers can focus on enjoying the drive.

                            We pride ourselves on our exceptional customer service. Our team is dedicated to ensuring
                            that
                            every customer receives personalized attention and support, from the moment they first
                            contact
                            us to the end of their rental period. We are always available to answer questions, provide
                            recommendations, and offer any assistance that our customers may need.
                        </p>
                    </div>
                </div>



                <div>
                    <h2>WHAT WE OFFER</h2>
                </div>
                <div class="Row">
                    <div class="text">
                        <p>
                            At our car rental company, we understand that renting a car is more than a transaction -
                            it's an
                            experience.
                            That's why we offer a range of services to make the entire rental experience as seamless and
                            enjoyable
                            as
                            possible, from online booking to pick-up and drop-off services. We also offer a full range
                            of
                            post-rental
                            services to ensure your rental experience is as stress-free as possible, including regular
                            cleaning
                            and
                            maintenance, emergency roadside assistance and expert technicians trained to handle even the
                            most
                            complex
                            repairs .
                        </p>
                    </div>
                    <div class="image">
                        <img src="../../GeneralStyling&Media/Photos/Dealership.jpg">
                    </div>
                </div>
            </div>
            <div class="scroller">
                <a onclick="scrollToTop(); return false;"><img src="../../GeneralStyling&Media/Photos/Logo.png"
                        width="300"></a>
            </div>
        </div>

        <div class="footer">
            <h5>Copyright © 2023 AutoRental | All Rights reserved |
                <a href="../../AboutUs/BG/AboutA.php"><img src="../../GeneralStyling&Media/Photos/BG.jpg" height="10"
                        width="15" alt="bg"></a>
                <a href="../../AboutUs/EN/AboutA.php"><img src="../../GeneralStyling&Media/Photos/EN.jpg" height="10"
                        width="15" alt="en"></a>
            </h5>
        </div>


    </div>
</body>

</html>