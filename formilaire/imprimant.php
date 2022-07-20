<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>serveur</title>
</head>
<body>
<?php
    include 'header.php';
    include 'style.php';
?>
<main>
    <form action='includes/impr.inc.php' method='get'>
    <table class="styled-table" style="margin: 10% 0%;">
    <caption style="background-color: yellow;">IMPRIMANTES</caption>
        <thead>
            <tr>
                <td>id</td>
                <td>Numéro de Série</td>
                <td>CODE A BARRE</td>
                <td >MONTANT PRIX D'ACHAT</td>
                <td>MODELE du Matériel</td>
                <td>ADRESSE IP</td>
                <td>ADRESSE MAC</td>
                <td >AFFECTATION</td>
                <td>DATE DE MISE EN PRODUCTION</td>
                <td colspan='2'></td>
            </tr>
        </thead>
        <tbody>
            <?php
                if (isset($_SESSION['impr'])) {
                    for ($i=0 ; $i < count($_SESSION['impr']) ; $i++ ) {
                        echo "<tr id='tr".$i."'>";
                        echo "<td ><p id='id".$i."'>".$_SESSION['impr'][$i]['impr_id']."</p></td>";
                        echo "<td id='Série".$i."'>".$_SESSION['impr'][$i]['Série']."</td>";
                        echo "<td id='BARRE".$i."'>".$_SESSION['impr'][$i]['BARRE']."</td>";
                        echo "<td id='MONTANT".$i."'>".$_SESSION['impr'][$i]['MONTANT']."</td>";
                        echo "<td id='MODELE".$i."'>".$_SESSION['impr'][$i]['MODELE']."</td>";
                        echo "<td id='IP".$i."'>".$_SESSION['impr'][$i]['IP']."</td>";
                        echo "<td id='MAC".$i."'>".$_SESSION['impr'][$i]['MAC']."</td>";
                        echo "<td id='AFFECTATION".$i."'>".$_SESSION['impr'][$i]['AFFECTATION']."</td>";
                        echo "<td id='PRODUCTION".$i."'>".$_SESSION['impr'][$i]['PRODUCTION']."</td>";
                        echo "<td id='save".$i."'><input type='button' class='btn' id='".$i."' onClick='modify(this.id)' name='submit-save' value='modify'></td>";
                        echo "<td id='delete".$i."'><input type='text' name='impr_id' value='".$_SESSION['impr'][$i]['impr_id']."' style='display : none;'><button class='btn' type='submit' name='submit-delete'>delete</button></td>";
                        echo "</tr>";
                    }    
                }
            
            ?>
            <tr>
                <td></td>
                <td id="Série-1"></td>
                <td id="BARRE-1"></td>
                <td colspan="1" id="MONTANT-1"></td>
                <td id="MODELE-1"></td>
                <td id="IP-1"></td>
                <td id="MAC-1"></td>
                <td id="AFFECTATION-1"></td>
                <td id="PRODUCTION-1"></td>
                <td id="save-1"><input type="button" class="btn" value="add" onClick='add(this.id)' name="submit-add" id="-1"></td>
            </tr>
        </tbody>
    </table>
    </form>
</main>
<script>
    function modify(clicked) {
        var Série = document.getElementById('Série'+clicked);
        var BARRE = document.getElementById('BARRE'+clicked);
        var MONTANT = document.getElementById('MONTANT'+clicked);
        var MODELE = document.getElementById('MODELE'+clicked);
        var IP = document.getElementById('IP'+clicked);
        var MAC = document.getElementById('MAC'+clicked);
        var aff = document.getElementById('AFFECTATION'+clicked);
        var PRODUCTION = document.getElementById('PRODUCTION'+clicked);
        var modify = document.getElementById('save'+clicked);
        var remove = document.getElementById('delete'+clicked);
        var btn = document.getElementById(clicked);
        var id = document.getElementById('id'+clicked);
        if (btn.value != 'save'){
            Série.innerHTML = "<input class='inp' type='text' name='Série' value='"+Série.textContent+"' id='btn"+clicked+"' >";
            BARRE.innerHTML = "<input class='inp' type='text' name='BARRE' value='"+BARRE.textContent+"' id='btn"+clicked+"' >";
            MONTANT.innerHTML = "<input class='inp' type='text' name='MONTANT' value='"+MONTANT.textContent+"' id='btn"+clicked+"' >";
            MODELE.innerHTML = "<input class='inp' type='text' name='MODELE' value='"+MODELE.textContent+"' id='btn"+clicked+"' >";
            IP.innerHTML = "<input class='inp' type='text' name='IP' value='"+IP.textContent+"' id='btn"+clicked+"' >";
            MAC.innerHTML = "<input class='inp' type='text' name='MAC' value='"+MAC.textContent+"' id='btn"+clicked+"' >";
            aff.innerHTML = "<input class='inp' type='text' name='AFFECTATION' value='"+aff.textContent+"' id='btn"+clicked+"' ><input type='text' name='cmd_id' value='"+id.textContent+"' style='display : none;'>";
            PRODUCTION.innerHTML = "<input class='inp' type='text' name='PRODUCTION' value='"+PRODUCTION.textContent+"' id='btn"+clicked+"' >";
            modify.innerHTML = "<button type='submit' class='btn' name='submit-modify'>save</button>"
        }
    }
    function add(clicked) {
        var Série = document.getElementById('Série'+clicked);
        var BARRE = document.getElementById('BARRE'+clicked);
        var MONTANT = document.getElementById('MONTANT'+clicked);
        var MODELE = document.getElementById('MODELE'+clicked);
        var IP = document.getElementById('IP'+clicked);
        var MAC = document.getElementById('MAC'+clicked);
        var aff = document.getElementById('AFFECTATION'+clicked);
        var PRODUCTION = document.getElementById('PRODUCTION'+clicked);
        var modify = document.getElementById('save'+clicked);
        var btn = document.getElementById(clicked);
        var id = document.getElementById('id'+clicked);
        if (btn.value != 'save'){
            Série.innerHTML = "<input class='inp' type='text' name='Série' value='' id='btn"+clicked+"' >";
            BARRE.innerHTML = "<input class='inp' type='text' name='BARRE' value='' id='btn"+clicked+"' >";
            MONTANT.innerHTML = "<input class='inp' type='text' name='MONTANT' value='' id='btn"+clicked+"' >";
            MODELE.innerHTML = "<input class='inp' type='text' name='MODELE' value='' id='btn"+clicked+"' >";
            IP.innerHTML = "<input class='inp' type='text' name='IP' value='' id='btn"+clicked+"' >";
            MAC.innerHTML = "<input class='inp' type='text' name='MAC' value='' id='btn"+clicked+"' >";
            aff.innerHTML = "<input class='inp' type='text' name='AFFECTATION' value='' id='btn"+clicked+"' >";
            PRODUCTION.innerHTML = "<input class='inp' type='text' name='PRODUCTION' value='' id='btn"+clicked+"' >";
            modify.innerHTML = "<button type='submit' class='btn' name='submit-add'>save</button>"
        }
    }
</script>
</body>
</html>