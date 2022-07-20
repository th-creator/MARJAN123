<?php
class Points extends Dbh{   
    protected function setPoint($Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$EMPLACEMENT,$PRODUCTION) {
        $type = $_SESSION['type'];
        $stmt  = $this->connect()->prepare('INSERT into point(Série,BARRE,MONTANT,MODELE,IP,MAC,EMPLACEMENT,PRODUCTION,type) values( ? , ? , ? , ? , ? , ? , ? , ? , ? );');
        if (!$stmt->execute(array($Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$EMPLACEMENT,$PRODUCTION,$type))) {
            $stmt = null;
            header('Location: ../pointage.php?error=stmtfailed1');
            exit();
        }
        $this->getPoint();
    }
    protected function modifyPoint($id,$Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$EMPLACEMENT,$PRODUCTION) {
        $stmt  = $this->connect()->prepare('UPDATE points set Série = ? ,BARRE = ? ,MONTANT = ? ,MODELE = ? ,IP = ? ,MAC = ? ,EMPLACEMENT = ? ,PRODUCTION = ? where point_id = ?;');
        if (!$stmt->execute(array($Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$EMPLACEMENT,$PRODUCTION,$id))) {
            $stmt = null;
            header('Location: ../pointage.php?error=stmtfailed1');
            exit();
        }
        $this->getPoint();
    }
    protected function deletePoint($id) {
        $stmt  = $this->connect()->prepare('DELETE from points  where point_id = ?;');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header('Location: ../pointage.php?error=stmtfailed1');
            exit();
        }
        $this->getPoint();
    }
    protected function getPoint() {
        $type = $_SESSION['type'];
        $stmt  = $this->connect()->prepare('SELECT * from points where type = ? ;');
        if (!$stmt->execute(array($type))) {
            $stmt = null;
            header('Location: ../pointage.php?error=stmtfailed');
            exit();
        }
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('Location: ../pointage.php?error=none');
            exit();
        }
        // session_start();
        $point = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['point'] = $point;
            
    }
    
}
