<?php
class Login extends Dbh{  
    protected function getUser($uid,$pwd) {
        $stmt  = $this->connect()->prepare('SELECT users_pwd from users where users_uid = ? or users_email=? ;');
        $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT); 
        if (!$stmt->execute(array($uid,$uid))) {
            $stmt = null;
            header('Location: ../index.php?error=stmtfailed1');
            exit();
        }        

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('Location: ../index.php?error=usernotfound&uid='.$uid);
            exit();
        }
        $pwdhashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkpwd =password_verify($pwd,$pwdhashed[0]['users_pwd']);
        if ($checkpwd == false) {
            $stmt = null;
            header('Location: ../index.php?error=wrongpwd&uid='.$uid);
            exit();
        } elseif ($checkpwd == true) {
            $stmt = $this->connect()->prepare('SELECT * from users where users_uid = ? or users_email=? and users_pwd=?;');
            if (!$stmt->execute(array($uid,$uid,$pwd))) {
                $stmt = null;
                header('Location: ../index.php?error=stmtfailed');
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header('Location: ../index.php?error=usernotfound&uid='.$uid);
                exit();
            }
            session_start();
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['user'] = $user;
            $_SESSION['useruid'] = $user[0]['users_uid'];
            $_SESSION['userrole'] = $user[0]['users_role'];
            $_SESSION['userid'] = $user[0]['users_id'];
            $stmt = $this->connect()->prepare('SELECT * from users where users_role != ?;');
            if (!$stmt->execute(array('admin'))) {
                $stmt = null;
                header('Location: ../index.php?error=stmtfailed');
                exit();
            }
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['users'] = $users;
            $stmt=null;
            
        }

        $stmt=null;
    }
    
}
