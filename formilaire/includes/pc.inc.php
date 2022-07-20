<?php 
    include '../classes/dbh.classes.php';
    include '../classes/pc.classes.php';
    include '../classes/pc.contr.php';
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
        $CAPACITE = $_GET['CAPACITE'];
        $PC = $_GET['PC'];
        $AFFECTATION = $_GET['AFFECTATION'];

        $pc = new PcContr($users_id,$Série,$BARRE,$MONTANT,$MODELE,$DATE,$RAM,$OS,$PROCESSEUR,$IP,$MAC,$VERSION,$ANTIVIRUS,$CAPACITE,$PC,$AFFECTATION);

        $pc->check();
    }
    if (isset($_GET['submit-modify'])) {
        $id = $_GET['pc_id'];
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
        $CAPACITE = $_GET['CAPACITE'];
        $PC = $_GET['PC'];
        $AFFECTATION = $_GET['AFFECTATION'];

        $pc = new PcContr($id,$Série,$BARRE,$MONTANT,$MODELE,$DATE,$RAM,$OS,$PROCESSEUR,$IP,$MAC,$VERSION,$ANTIVIRUS,$CAPACITE,$PC,$AFFECTATION);

        $pc->modify();
    }
    if (isset($_GET['submit-delete'])) {
        $id = $_GET['pc_id'];

        $pc = new PcContr($id);

        $pc->delete();
    }
    $pc1 = new PcContr($users_id);
    $pc1->get();
    header("Location: ../serveur.php?error=none");
?>