<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="signupForm.css"> -->
    <title>Document</title>
</head>
<body>
<div>
    <?php
        include "header.php";
    ?>
    <style>
        section h1{
        text-align: center;
        margin-bottom:5% ; 
        }
        #contain{
        border: 1px solid blanchedalmond;
        background-color: blanchedalmond;
        width: 50%;
        margin: 10% 25%;
        }
        input {
        width: 80%;
        height: 30px;
        margin: 5px 10%;
        }
        button {
        width: 80%;
        height: 30px;
        margin: 5px 10%;
        color: burlywood;
        }

        .signuperror {
        text-align: center;
        color: red;
        margin-bottom: 20px;
        }
        .signupsuccess {
        text-align: center;
        color : green;
        margin-bottom: 20px;
        }
    </style>
        <section id="contain">
            <br>
            <h1>signup</h1>
            <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyinput") {
                        echo '<p class="signuperror">fill in all fields</p>';
                    } elseif ($_GET['error'] == "invalidemail") {
                        echo '<p class="signuperror">invalid email</p>';
                    } elseif ($_GET['error'] == "invaliduid") {
                        echo '<p class="signuperror">invalid username</p>';
                    } elseif ($_GET['error'] == "invalidpassword") {
                        echo '<p class="signuperror">invalid password</p>';
                    } elseif ($_GET['error'] == "shortpassword") {
                        echo '<p class="signuperror">short password</p>';
                    } elseif ($_GET['error'] == "takenuid&takenemail") {
                        echo '<p class="signuperror">user name is already taken</p>';
                    } elseif ($_GET['error'] == "none" ) {
                        echo '<p class="signupsuccess">signup successfully</p>';
                    }
                }
                
            ?>
            <form action="includes/signup.inc.php" method="post">
                <br>
                <input type="text" name="uid" placeholder="username" value="<?php if(isset($_GET['name'])) echo $_GET['name']; ?>">
                <input type="email" name="email" placeholder="email" value="<?php if(isset($_GET['email'])) echo $_GET['email']; ?>">
                <input type="password" name="pwd" placeholder="password">
                <input type="password" name="pwdrepeat" placeholder="repeat password">
                <button type="submit" name="submit">Signup</button><br><br>
            </form>
        </section>
    </div>
    
</body>
</html>