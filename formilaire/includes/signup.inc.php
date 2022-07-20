<?php
if (isset($_POST['submit'])) {
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];

    include '../classes/dbh.classes.php';
    include '../classes/signup.classes.php';
    include '../classes/signup.contr.classes.php';
    $signup = new SignupContr($uid,$pwd,$pwdrepeat,$email);

    $signup->signupUser();

    header("Location: ../signupForm.php?error=none");
}
?>