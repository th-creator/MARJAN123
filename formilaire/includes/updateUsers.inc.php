<?php
    session_start();
    include '../classes/dbh.classes.php';
    include '../classes/updateUsers.classes.php';
    include '../classes/updateUsers.contr.classes.php';
    if (isset($_POST['submit-name'])) {
        $name = $_POST['value'];
        $id = $_SESSION['user'][0]['users_id'];
        
        $setUser = new UpdateContr($id,$name);

        $setUser->setName();

        header("Location: ../updateUser.php?error=none");
    }
    if (isset($_POST['submit-email'])) {
        $email = $_POST['value'];
        $id = $_SESSION['user'][0]['users_id'];
        
        $setUser1 = new UpdateContr($id,$email);

        $setUser1->setEmail();

        header("Location: ../updateUser.php?error=none");
    }
?>