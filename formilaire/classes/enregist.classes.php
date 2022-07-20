<?php
class Enrgs extends Dbh{   
    protected function setEnrg($Série,$BARRE,$MONTANT,$MODELE,$EMPLACEMENT,$PRODUCTION) {
        $type = $_SESSION['type'];
        $stmt  = $this->connect()->prepare('INSERT into enregist(Série,BARRE,MONTANT,MODELE,AFFECTATION,PRODUCTION,type) values( ? , ? , ? , ? , ? , ? , ? );');
        if (!$stmt->execute(array($Série,$BARRE,$MONTANT,$MODELE,$EMPLACEMENT,$PRODUCTION,$type))) {
            $stmt = null;
            header('Location: ../enregist.php?error=stmtfailed1');
            exit();
        }
        $this->getEnrg();
    }
    protected function modifyEnrg($id,$Série,$BARRE,$MONTANT,$MODELE,$EMPLACEMENT,$PRODUCTION) {
        $stmt  = $this->connect()->prepare('UPDATE enregist set Série = ? ,BARRE = ? ,MONTANT = ? ,MODELE = ? ,AFFECTATION = ? ,PRODUCTION = ? where enrg_id = ?;');
        if (!$stmt->execute(array($Série,$BARRE,$MONTANT,$MODELE,$EMPLACEMENT,$PRODUCTION,$id))) {
            $stmt = null;
            header('Location: ../enregist.php?error=stmtfailed1');
            exit();
        }
        $this->getEnrg();
    }
    protected function deleteEnrg($id) {
        $stmt  = $this->connect()->prepare('DELETE from enregist  where enrg_id = ?;');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header('Location: ../enregist.php?error=stmtfailed1');
            exit();
        }
        $this->getEnrg();
    }
    protected function getEnrg() {
        $type = $_SESSION['type'];
        $stmt  = $this->connect()->prepare('SELECT * from enregist where type = ? ;');
        if (!$stmt->execute(array($type))) {
            $stmt = null;
            header('Location: ../enregist.php?error=stmtfailed');
            exit();
        }
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('Location: ../enregist.php?error=none');
            exit();
        }
        // session_start();
        $enrg = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['enrg'] = $enrg;
            
    }
    
}
