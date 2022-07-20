<?php
class Dbh {
    public function connect()
    {
        try {
            $user = "th_creator";
            $pwd = "password.1";
            $dbh = new PDO('mysql:host=localhost;dbname=marjan',$user,$pwd);
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            return $dbh;
        } catch(PDOException $e) {
            print "Error: " . $e->getMessage() . "! <br>";
            die();
        }
        
    }
}
?>