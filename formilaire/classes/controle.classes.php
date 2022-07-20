<?php
class Cntrs extends Dbh{   
    protected function setCntr($Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$EMPLACEMENT,$PRODUCTION) {
        $type = $_SESSION['type'];
        $stmt  = $this->connect()->prepare('INSERT into controle(Série,BARRE,MONTANT,MODELE,IP,MAC,EMPLACEMENT,PRODUCTION,type) values( ? , ? , ? , ? , ? , ? , ? , ? , ? );');
        if (!$stmt->execute(array($Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$EMPLACEMENT,$PRODUCTION,$type))) {
            $stmt = null;
            header('Location: ../controle.php?error=stmtfailed1');
            exit();
        }
        $this->getCntr();
    }
    protected function modifyCntr($id,$Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$EMPLACEMENT,$PRODUCTION) {
        $stmt  = $this->connect()->prepare('UPDATE controle set Série = ? ,BARRE = ? ,MONTANT = ? ,MODELE = ? ,IP = ? ,MAC = ? ,EMPLACEMENT = ? ,PRODUCTION = ? where cntr_id = ?;');
        if (!$stmt->execute(array($Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$EMPLACEMENT,$PRODUCTION,$id))) {
            $stmt = null;
            header('Location: ../controle.php?error=stmtfailed1');
            exit();
        }
        $this->getCntr();
    }
    protected function deleteCntr($id) {
        $stmt  = $this->connect()->prepare('DELETE from controle  where cntr_id = ?;');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header('Location: ../controle.php?error=stmtfailed1');
            exit();
        }
        $this->getCntr();
    }
    protected function getCntr() {
        $type = $_SESSION['type'];
        $stmt  = $this->connect()->prepare('SELECT * from controle where type = ? ;');
        if (!$stmt->execute(array($type))) {
            $stmt = null;
            header('Location: ../controle.php?error=stmtfailed');
            exit();
        }
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('Location: ../controle.php?error=none');
            exit();
        }
        // session_start();
        $Cntr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['Cntr'] = $Cntr;
            
    }
    
}
