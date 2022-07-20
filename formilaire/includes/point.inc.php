<?php 
    include '../classes/dbh.classes.php';
    include '../classes/point.classes.php';
    include '../classes/point.contr.php';
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

        $pnt = new PointContr($users_id,$Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$EMPLACEMENT,$PRODUCTION);

        $pnt->check();
    }
    if (isset($_GET['submit-modify'])) {
        $id = $_GET['point_id'];
        $Série = $_GET['Série'];
        $BARRE = $_GET['BARRE'];
        $MONTANT = $_GET['MONTANT'];
        $MODELE = $_GET['MODELE'];
        $IP = $_GET['IP'];
        $MAC = $_GET['MAC'];
        $EMPLACEMENT = $_GET['EMPLACEMENT'];
        $PRODUCTION = $_GET['PRODUCTION'];

        $pnt = new PointContr($id,$Série,$BARRE,$MONTANT,$MODELE,$IP,$MAC,$EMPLACEMENT,$PRODUCTION);

        $pnt->modify();
    }
    if (isset($_GET['submit-delete'])) {
        $id = $_GET['point_id'];

        $pnt = new PointContr($id);

        $pnt->delete();
    }
    $pnt1 = new PointContr($users_id);
    $pnt1->get();
    header("Location: ../pointage.php?error=none");
?>