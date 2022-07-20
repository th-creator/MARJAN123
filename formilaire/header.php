<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <script src="jquery/jquery-3.6.0.min.js" type="text/javascript"></script>
    <title>E-commerce</title>
</head>
<body>
    <main>
        <script>
            $(document).ready(function(){
                $('#menuicon').click(function() {
                    $('ul').toggleClass('show');
                })
            })
        </script>

        <nav id="header">
            <?php
            if (isset($_SESSION['type'])) {
                if ($_SESSION['type']==2) {
                    echo '<img src="pics/elctro.jfif" height="50px" id="logo1" alt="">';
                }
                elseif ($_SESSION['type']==3) {
                    echo '<img src="pics/market.jfif" height="50px" id="logo1" alt="">';
                }
                else {
                    echo '<img src="pics/WhatsApp Image 2022-07-14 at 5.13.34 PM.jpeg" height="50px" id="logo1" alt="">';
                }
            } else {
                echo '<img src="pics/WhatsApp Image 2022-07-14 at 5.13.34 PM.jpeg" height="50px" id="logo1" alt="">';
            }
            
            ?>
            
            <ul id="ul">
                
                <?php
                $uri = $_SERVER['REQUEST_URI'];
                $uri=='/exercise/form_oop.php/formilaire/index.php?error=none';
                if (isset($_SESSION['userrole']) && !preg_match("/\/exercise\/form_oop.php\/formilaire\/index.php*/",$uri)) {
                    if ($_SESSION['userrole']=='admin') {
                        echo'<ul >';
                        echo '<li id="active"><a href="main.php">Home</a></li>';
                        echo '<li><a href="updateUser.php">Profil</a></li>';
                        echo '<li><a href="includes/logout.inc.php">logout</a></li>';
                        echo '</ul>';
                    }
                ?>
                
                <?php
                    } else {

                ?>
                <li id="active"><a href="index.php">Home</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="signupForm.php">signup</a></li>
                <li><a href="#">about</a></li>
                <?php
                }
                ?>
            </ul>
            
            <label id="menuicon">

            <i><img width="100px" id="baricon" height="90px" src="pics/barsIcon.webp" alt=""></i>
            </label>
        </nav>
    </main>    
</body>
</html>
<script>
    var navbar = document.getElementById("header");
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
        document.getElementById('ul').classList.remove('show');
        navbar.style.position = "relative";
        } else {
        navbar.style.position = "fixed";
        }
        
    }
</script>