
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
       
    <title>Document</title>
</head>
<body>
    <style>
        .icon-bar {
        margin-left: -5%;
        position: fixed;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        }

        .icon-bar a {
        display: block;
        text-align: center;
        padding: 16px;
        transition: all 0.3s ease;
        color: white;
        font-size: 20px;
        }

        .icon-bar a:hover {
        background-color: #000;
        }

        .facebook {
        background: #3B5998;
        color: white;
        }

        .twitter {
        background: #55ACEE;
        color: white;
        }

        .google {
        background: #dd4b39;
        color: white;
        }

        .linkedin {
        background: #007bb5;
        color: white;
        }

        .youtube {
        background: #bb0000;
        color: white;
        }
    </style>
    <?php
    include "header.php";
    ?> 
    <section id="container1">
        <div id="sec1">
        <div class="icon-bar">
          <a href="#" class="facebook"><i class="fa fa-facebook"></i></a> 
          <a href="#" class="twitter"><i class="fa fa-twitter"></i></a> 
          <a href="#" class="google"><i class="fa fa-google"></i></a> 
          <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          <a href="#" class="youtube"><i class="fa fa-youtube"></i></a> 
        </div>
                <h1 id="h1">You can find all you're looking for here.</h1>
                <strong class="text">Here's how it works</strong>
                <ul>
                    <li>Sign up to receive all of the offers that you're intrested in without further delay.</li>
                    <li>Marjan to profit in quantity and price</li>
                </ul>
            </div>
            <div id="sec2">
                <div id="form">
                    <div id="txthld"> 
                        <strong class="text">Login</strong>
                    </div>
                    <form  action="includes/login.inc.php" method="post">
                        <input type="text" id="email1" name="uid" placeholder="Username/email..." value="<?php if(isset($_GET['uid'])) echo $_GET['uid']; ?>"><br>
                        <input type="password" name="pwd" id="pwd" placeholder="password..."><br>
                        <input type="checkbox" name="persist" id=""><span id="checkbox"> remember me</span><br>
                        <button id="btn1" type="submit" name="submit">Login</button><br>
                    </form>
                    
                </div>
            </div>
    </section>
    
    
    <?php
        include 'footer.php';
    ?>
</body>
</html>