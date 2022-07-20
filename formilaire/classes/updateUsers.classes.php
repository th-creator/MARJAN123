<?php
class Update extends Dbh{  
    protected function updateName($name,$id) {
        $stmt  = $this->connect()->prepare('UPDATE users set users_uid = ? where users_id = ? ;');
        if (!$stmt->execute(array($name,$id))) {
            $stmt = null;
            header('Location: ../updateUser.php?error=stmtfailed1');
            exit();
        }       
        $this->getUser($id); 
    }
    protected function updateEmail($email,$id) {
        $stmt  = $this->connect()->prepare('UPDATE users set users_email = ? where users_id = ? ;');
        if (!$stmt->execute(array($email,$id))) {
            $stmt = null;
            header('Location: ../updateUser.php?error=stmtfailed1');
            exit();
        }    
        $this->getUser($id);     
    }
    protected function getUser($id) {
        $stmt = $this->connect()->prepare('SELECT * from users where users_id = ?;');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header('Location: ../updateUser.php?error=stmtfailed');
            exit();
        }
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('Location: ../updateUser.php?error=usernotfound');
            exit();
        }
        session_start();
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $user;
    } 
    
}
