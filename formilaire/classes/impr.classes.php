<?php
class Imprs extends Dbh{   
    protected function setImpr($Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$AFFECTATION,$PRODUCTION) {
        $type = $_SESSION['type'];
        $stmt  = $this->connect()->prepare('INSERT into impr(Série,BARRE,MONTANT,MODELE,IP,MAC,AFFECTATION,PRODUCTION,type) values( ? , ? , ? , ? , ? , ? , ? , ? , ? );');
        if (!$stmt->execute(array($Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$AFFECTATION,$PRODUCTION,$type))) {
            $stmt = null;
            header('Location: ../imprimant.php?error=stmtfailed1');
            exit();
        }
        $this->getImpr();
    }
    protected function modifyImpr($id,$Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$AFFECTATION,$PRODUCTION) {
        $stmt  = $this->connect()->prepare('UPDATE impr set Série = ? ,BARRE = ? ,MONTANT = ? ,MODELE = ? ,IP = ? ,MAC = ? ,AFFECTATION = ? ,PRODUCTION = ? where impr_id = ?;');
        if (!$stmt->execute(array($Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$AFFECTATION,$PRODUCTION,$id))) {
            $stmt = null;
            header('Location: ../imprimant.php?error=stmtfailed1');
            exit();
        }
        $this->getImpr();
    }
    protected function deleteImpr($id) {
        $stmt  = $this->connect()->prepare('DELETE from impr  where impr_id = ?;');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header('Location: ../imprimant.php?error=stmtfailed1');
            exit();
        }
        $this->getImpr();
    }
    protected function getImpr() {
        $type = $_SESSION['type'];
        $stmt  = $this->connect()->prepare('SELECT * from impr where type = ? ;');
        if (!$stmt->execute(array($type))) {
            $stmt = null;
            header('Location: ../imprimant.php?error=stmtfailed');
            exit();
        }
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('Location: ../imprimant.php?error=none');
            exit();
        }
        // session_start();
        $impr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['impr'] = $impr;
            
    }
    
}
