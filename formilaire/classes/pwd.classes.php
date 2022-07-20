<?php 
class Pwd extends Dbh{  
    protected function updatePwd($oldpwd,$newpwd,$id) {
        $stmt  = $this->connect()->prepare('SELECT users_pwd from users where users_id = ? ;');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header('Location: ../pwdModify.php?error=stmtfailed1');
            exit();
        }     
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('Location: ../pwdModify.php?error=usernotfound');
            exit();
        }  
        $hashedpwd = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!password_verify($oldpwd,$hashedpwd[0]['users_pwd'])){
            $stmt = null;
            header('Location: ../pwdModify.php?error=wrongpwd');
            exit();
        }
        $pwdhashed = password_hash($newpwd,PASSWORD_DEFAULT); 
        $stmt = $this->connect()->prepare('UPDATE users set users_pwd = ? where users_id = ? ;');
        if (!$stmt->execute(array($pwdhashed,$id))) {
            $stmt = null;
            header('Location: ../pwdModify.php?error=stmtfailed');
            exit();
        }   
        $this->getUser($id); 
    }
    protected function getUser($id) {
        $stmt = $this->connect()->prepare('SELECT * from users where users_id = ?;');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header('Location: ../pwdModify.php?error=stmtfailed');
            exit();
        }
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('Location: ../pwdModify.php?error=usernotfound');
            exit();
        }
        session_start();
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $user;
    } 
    
}
