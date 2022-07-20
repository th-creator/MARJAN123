<?php
    session_start();
    include '../classes/dbh.classes.php';
    include '../classes/pwd.classes.php';
    include '../classes/pwd.contr.php';
    if (isset($_POST['submit-pwd'])) {
        $oldpwd = $_POST['oldpwd'];
        $newpwd = $_POST['newpwd'];
        $repwd = $_POST['repwd'];
        $id = $_SESSION['user'][0]['users_id'];
        
        $setpwd = new PwdContr($oldpwd,$newpwd,$repwd,$id);

        $setpwd->setPwd();

        header("Location: ../updateUser.php?error=none");
    }
?>