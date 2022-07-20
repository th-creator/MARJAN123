<?php 
    include '../classes/dbh.classes.php';
    include '../classes/impr.classes.php';
    include '../classes/impr.contr.php';
    session_start();
    $users_id = $_SESSION['userid']; 
    if (isset($_GET['submit-add'])) {
        $Série = $_GET['Série'];
        $BARRE = $_GET['BARRE'];
        $MONTANT = $_GET['MONTANT'];
        $MODELE = $_GET['MODELE'];
        $IP = $_GET['IP'];
        $MAC = $_GET['MAC'];
        $AFFECTATION = $_GET['AFFECTATION'];
        $PRODUCTION = $_GET['PRODUCTION'];

        $impr = new ImprContr($users_id,$Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$AFFECTATION,$PRODUCTION);

        $impr->check();
    }
    if (isset($_GET['submit-modify'])) {
        $id = $_GET['impr_id'];
        $Série = $_GET['Série'];
        $BARRE = $_GET['BARRE'];
        $MONTANT = $_GET['MONTANT'];
        $MODELE = $_GET['MODELE'];
        $IP = $_GET['IP'];
        $MAC = $_GET['MAC'];
        $AFFECTATION = $_GET['AFFECTATION'];
        $PRODUCTION = $_GET['PRODUCTION'];

        $impr = new ImprContr($id,$Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$AFFECTATION,$PRODUCTION);

        $impr->modify();
    }
    if (isset($_GET['submit-delete'])) {
        $id = $_GET['impr_id'];

        $impr = new ImprContr($id);

        $impr->delete();
    }
    $impr1 = new ImprContr($users_id);
    $impr1->get();
    header("Location: ../imprimant.php?error=none");
?>