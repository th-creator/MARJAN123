<?php 
    include '../classes/dbh.classes.php';
    include '../classes/controle.classes.php';
    include '../classes/controle.contr.php';
    session_start();
    $users_id = $_SESSION['userid']; 
    if (isset($_GET['submit-add'])) {
        $Série = $_GET['Série'];
        $BARRE = $_GET['BARRE'];
        $MONTANT = $_GET['MONTANT'];
        $MODELE = $_GET['MODELE'];
        $IP = $_GET['IP'];
        $MAC = $_GET['MAC'];
        $EMPLACEMENT = $_GET['EMPLACEMENT'];
        $PRODUCTION = $_GET['PRODUCTION'];

        $pnt = new CntrContr($users_id,$Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$EMPLACEMENT,$PRODUCTION);

        $pnt->check();
    }
    if (isset($_GET['submit-modify'])) {
        $id = $_GET['cntr_id'];
        $Série = $_GET['Série'];
        $BARRE = $_GET['BARRE'];
        $MONTANT = $_GET['MONTANT'];
        $MODELE = $_GET['MODELE'];
        $IP = $_GET['IP'];
        $MAC = $_GET['MAC'];
        $EMPLACEMENT = $_GET['EMPLACEMENT'];
        $PRODUCTION = $_GET['PRODUCTION'];

        $pnt = new CntrContr($id,$Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$EMPLACEMENT,$PRODUCTION);

        $pnt->modify();
    }
    if (isset($_GET['submit-delete'])) {
        $id = $_GET['cntr_id'];

        $pnt = new CntrContr($id);

        $pnt->delete();
    }
    $pnt1 = new CntrContr($users_id);
    $pnt1->get();
    header("Location: ../controle.php?error=none");
?>