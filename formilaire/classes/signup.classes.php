<?php
class Signup extends Dbh{ 
    protected function setUser($uid,$pwd,$email,$role) {
        $stmt  = $this->connect()->prepare('INSERT into users(users_uid,users_pwd,users_email,users_role) values( ? , ? , ? , ? );');
        $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT); 
        if (!$stmt->execute(array($uid,$hashedPwd,$email,$role))) {
            $stmt = null;
            header('Location: ../signupForm.php?error=stmtfailed');
            exit();
        }
        $stmt = null;
        
    }

}