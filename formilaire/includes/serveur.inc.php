<?php 
    include '../classes/dbh.classes.php';
    include '../classes/serveur.classes.php';
    include '../classes/serveur.contr.php';
    session_start();
    $users_id = $_SESSION['userid']; 
    if (isset($_GET['submit-add'])) {
        $Série = $_GET['Série'];
        $BARRE = $_GET['BARRE'];
        $MONTANT = $_GET['MONTANT'];
        $MODELE = $_GET['MODELE'];
        $DATE = $_GET['DATE'];
        $RAM = $_GET['RAM'];
        $OS = $_GET['OS'];
        $PROCESSEUR = $_GET['PROCESSEUR'];
        $IP = $_GET['IP'];
        $MAC = $_GET['MAC'];
        $VERSION = $_GET['VERSION'];
        $ANTIVIRUS = $_GET['ANTIVIRUS'];
        $C = $_GET['C'];
        $D = $_GET['D'];
        $E = $_GET['E'];
        $F = $_GET['F'];
        $SERVEUR = $_GET['SERVEUR'];
        $AFFECTATION = $_GET['AFFECTATION'];

        $srv = new SrvContr($users_id,$Série,$BARRE,$MONTANT,$MODELE,$DATE,$RAM,$OS,$PROCESSEUR,$IP,$MAC,$VERSION,$ANTIVIRUS,$C,$D,$E,$F,$SERVEUR,$AFFECTATION);

        $srv->check();
    }
    if (isset($_GET['submit-modify'])) {
        $id = $_GET['srv_id'];
        $Série = $_GET['Série'];
        $BARRE = $_GET['BARRE'];
        $MONTANT = $_GET['MONTANT'];
        $MODELE = $_GET['MODELE'];
        $DATE = $_GET['DATE'];
        $RAM = $_GET['RAM'];
        $OS = $_GET['OS'];
        $PROCESSEUR = $_GET['PROCESSEUR'];
        $IP = $_GET['IP'];
        $MAC = $_GET['MAC'];
        $VERSION = $_GET['VERSION'];
        $ANTIVIRUS = $_GET['ANTIVIRUS'];
        $C = $_GET['C'];
        $D = $_GET['D'];
        $E = $_GET['E'];
        $F = $_GET['F'];
        $SERVEUR = $_GET['SERVEUR'];
        $AFFECTATION = $_GET['AFFECTATION'];

        $srv = new SrvContr($id,$Série,$BARRE,$MONTANT,$MODELE,$DATE,$RAM,$OS,$PROCESSEUR,$IP,$MAC,$VERSION,$ANTIVIRUS,$C,$D,$E,$F,$SERVEUR,$AFFECTATION);

        $srv->modify();
    }
    if (isset($_GET['submit-delete'])) {
        $id = $_GET['srv_id'];

        $srv = new SrvContr($id);

        $srv->delete();
    }
    $srv = new SrvContr($users_id);
    $srv->get();
    header("Location: ../serveur.php?error=none");
?>