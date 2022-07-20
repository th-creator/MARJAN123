<?php 
    include '../classes/dbh.classes.php';
    include '../classes/login.classes.php';
    include '../classes/login.contr.classes.php';
if (isset($_POST['submit'])) {
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    $signup = new LoginContr($uid,$pwd);

    $signup->loginUser();

    header("Location: ../choice.php?error=none");
}
?>