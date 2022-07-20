<?php
class Pcs extends Dbh{   
    protected function setPc($Série,$BARRE,$MONTANT,$MODELE,$DATE,$RAM,$OS,$PROCESSEUR,$IP,$MAC,$VERSION,$ANTIVIRUS,$CAPACITE,$PC,$AFFECTATION) {
        $type = $_SESSION['type'];
        $stmt  = $this->connect()->prepare('INSERT into pc(Série,BARRE,MONTANT,MODELE,DATE,RAM,OS,PROCESSEUR,IP,MAC,VERSION,ANTIVIRUS,CAPACITE,PC,AFFECTATION,type) values( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? );');
        if (!$stmt->execute(array($Série,$BARRE,$MONTANT,$MODELE,$DATE,$RAM,$OS,$PROCESSEUR,$IP,$MAC,$VERSION,$ANTIVIRUS,$CAPACITE,$PC,$AFFECTATION,$type))) {
            $stmt = null;
            header('Location: ../pc.php?error=stmtfailed1');
            exit();
        }
        $this->getPc();
    }
    protected function modifyPc($id,$Série,$BARRE,$MONTANT,$MODELE,$DATE,$RAM,$OS,$PROCESSEUR,$IP,$MAC,$VERSION,$ANTIVIRUS,$CAPACITE,$PC,$AFFECTATION) {
        $stmt  = $this->connect()->prepare('UPDATE pc set Série = ? ,BARRE = ? ,MONTANT = ? ,MODELE = ? ,DATE = ? ,RAM = ? ,OS = ? ,PROCESSEUR = ? ,IP = ? ,MAC = ? ,VERSION = ? ,ANTIVIRUS = ? ,CAPACITE = ? ,PC = ? ,AFFECTATION = ? where pc_id = ?;');
        if (!$stmt->execute(array($Série,$BARRE,$MONTANT,$MODELE,$DATE,$RAM,$OS,$PROCESSEUR,$IP,$MAC,$VERSION,$ANTIVIRUS,$CAPACITE,$PC,$AFFECTATION,$id))) {
            $stmt = null;
            header('Location: ../pc.php?error=stmtfailed1');
            exit();
        }
        $this->getPc();
    }
    protected function deletePc($id) {
        $stmt  = $this->connect()->prepare('DELETE from pc  where pc_id = ?;');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header('Location: ../pc.php?error=stmtfailed1');
            exit();
        }
        $this->getPc();
    }
    protected function getPc() {
        $type = $_SESSION['type'];
        $stmt  = $this->connect()->prepare('SELECT * from pc where type = ? ;');
        if (!$stmt->execute(array($type))) {
            $stmt = null;
            header('Location: ../pc.php?error=stmtfailed');
            exit();
        }
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('Location: ../pc.php?error=none');
            exit();
        }
        // session_start();
        $pc = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['pc'] = $pc;
            
    }
    
}
