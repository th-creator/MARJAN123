<?php
class Srvs extends Dbh{   
    protected function setSrv($Série,$BARRE,$MONTANT,$MODELE,$DATE,$RAM,$OS,$PROCESSEUR,$IP,$MAC,$VERSION,$ANTIVIRUS,$C,$D,$E,$F,$SERVEUR,$AFFECTATION) {
        $type = $_SESSION['type'];
        $dispo = "le site ne dispose pas de rack";
        $stmt  = $this->connect()->prepare('INSERT into serveur(Série,BARRE,MONTANT,MODELE,disponibilite,DATE,RAM,OS,PROCESSEUR,IP,MAC,VERSION,ANTIVIRUS,C,D,E,F,SERVEUR,AFFECTATION,type) values( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? );');
        if (!$stmt->execute(array($Série,$BARRE,$MONTANT,$MODELE,$dispo,$DATE,$RAM,$OS,$PROCESSEUR,$IP,$MAC,$VERSION,$ANTIVIRUS,$C,$D,$E,$F,$SERVEUR,$AFFECTATION,$type))) {
            $stmt = null;
            header('Location: ../serveur.php?error=stmtfailed1');
            exit();
        }
        $this->getSrv();
    }
    protected function modifySrv($id,$Série,$BARRE,$MONTANT,$MODELE,$DATE,$RAM,$OS,$PROCESSEUR,$IP,$MAC,$VERSION,$ANTIVIRUS,$C,$D,$E,$F,$SERVEUR,$AFFECTATION) {
        $stmt  = $this->connect()->prepare('UPDATE serveur set Série = ? ,BARRE = ? ,MONTANT = ? ,MODELE = ? ,DATE = ? ,RAM = ? ,OS = ? ,PROCESSEUR = ? ,IP = ? ,MAC = ? ,VERSION = ? ,ANTIVIRUS = ? ,C = ? ,D = ? ,E = ? ,F = ? ,SERVEUR = ? ,AFFECTATION = ? where srv_id = ?;');
        if (!$stmt->execute(array($Série,$BARRE,$MONTANT,$MODELE,$DATE,$RAM,$OS,$PROCESSEUR,$IP,$MAC,$VERSION,$ANTIVIRUS,$C,$D,$E,$F,$SERVEUR,$AFFECTATION,$id))) {
            $stmt = null;
            header('Location: ../serveur.php?error=stmtfailed1');
            exit();
        }
        $this->getSrv();
    }
    protected function deleteSrv($id) {
        $stmt  = $this->connect()->prepare('DELETE from serveur  where srv_id = ?;');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header('Location: ../serveur.php?error=stmtfailed1');
            exit();
        }
        $this->getSrv();
    }
    protected function getSrv() {
        $type = $_SESSION['type'];
        $stmt  = $this->connect()->prepare('SELECT * from serveur where type = ? ;');
        if (!$stmt->execute(array($type))) {
            $stmt = null;
            header('Location: ../serveur.php?error=stmtfailed');
            exit();
        }
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('Location: ../serveur.php?error=none');
            exit();
        }
        // session_start();
        $srv = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['srv'] = $srv;
            
    }
    
}
