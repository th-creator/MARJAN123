<?php 
    include '../classes/dbh.classes.php';
    include '../classes/enregist.classes.php';
    include '../classes/enregist.contr.php';
    session_start();
    $users_id = $_SESSION['userid']; 
    if (isset($_GET['submit-add'])) {
        $Série = $_GET['Série'];
        $BARRE = $_GET['BARRE'];
        $MONTANT = $_GET['MONTANT'];
        $MODELE = $_GET['MODELE'];
        $AFFECTATION = $_GET['AFFECTATION'];
        $PRODUCTION = $_GET['PRODUCTION'];

        $pnt = new EnrgContr($users_id,$Série,$BARRE,$MONTANT,$MODELE,$AFFECTATION,$PRODUCTION);

        $pnt->check();
    }
    if (isset($_GET['submit-modify'])) {
        $id = $_GET['enrg_id'];
        $Série = $_GET['Série'];
        $BARRE = $_GET['BARRE'];
        $MONTANT = $_GET['MONTANT'];
        $MODELE = $_GET['MODELE'];
        $AFFECTATION = $_GET['AFFECTATION'];
        $PRODUCTION = $_GET['PRODUCTION'];

        $pnt = new EnrgContr($id,$Série,$BARRE,$MONTANT,$MODELE,$AFFECTATION,$PRODUCTION);

        $pnt->modify();
    }
    if (isset($_GET['submit-delete'])) {
        $id = $_GET['enrg_id'];

        $pnt = new EnrgContr($id);

        $pnt->delete();
    }
    $pnt1 = new EnrgContr($users_id);
    $pnt1->get();
    header("Location: ../enregist.php?error=none");
?>