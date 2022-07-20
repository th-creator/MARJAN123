<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "header.php";
    ?> 
    <style>
        .choice {
            margin: 10% 40% ;
        }
        ol li a {
            color: #000;
            text-decoration: none;
        }
        ol li a:hover{
            opacity: 50%;
        }
    </style>
    <ol class="choice">
        <li><a href="main.php">Marjane</a></li>
        <li><a href="market.php">Marjane Market</a></li>
        <li><a href="electro.php">Electroplanet</a></li>
    </ol>
</body>
</html>