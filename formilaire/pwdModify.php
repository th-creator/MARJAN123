<?php
    include 'header.php';
    include 'style.php';
?>
<main>
    <style>
        form {
            background-color: white;
            width: 400px;
            padding: 1.5% 1.5% 1.5% 3%;
            margin: 33px 33%;
        }
        input {
            margin-bottom: 10px;
        }
    </style>
    <form action="includes/pwd.inc.php" method="post">
        Old  password : <input style="margin-left: 22px;" type="password" name="oldpwd" placeholder="current password"><br>
        New password : <input style="margin-left: 15px;" type="password" name="newpwd" placeholder="new password"><br>
        repeat password : <input type="password" name="repwd" placeholder="new password"><br>
        <button type="submit" name="submit-pwd" class="btn">save</button>
    </form>
</main>