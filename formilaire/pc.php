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
    <form action='includes/pc.inc.php' method='get'>
    <table class="styled-table" style="margin: 10% 0%;">
    <caption style="background-color: yellow;">PC</caption>
        <thead>
            <tr>
                <td>id</td>
                <td>Numéro de Série</td>
                <td>CODE A BARRE</td>
                <td >MONTANT PRIX D'ACHAT</td>
                <td>MODELE du Matériel</td>
                <td>DATE DE MISE EN PRODUCTION</td>
                <td>RAM</td>
                <td >OS</td>
                <td>PROCESSEUR</td>
                <td>ADRESSE IP</td>
                <td>ADRESSE MAC</td>
                <td>VERSION ANTIVIRUS</td>
                <td >DATE MAJ ANTIVIRUS</td>
                <td>CAPACITE DISQUE DUR</td>
                <td>NOM DU PC</td>
                <td >AFFECTATION</td>
                <td colspan='2'></td>
            </tr>
        </thead>
        <tbody>
            <?php
                if (isset($_SESSION['pc'])) {
                    for ($i=0 ; $i < count($_SESSION['pc']) ; $i++ ) {
                        echo "<tr id='tr".$i."'>";
                        echo "<td ><p id='id".$i."'>".$_SESSION['pc'][$i]['pc_id']."</p></td>";
                        echo "<td id='Série".$i."'>".$_SESSION['pc'][$i]['Série']."</td>";
                        echo "<td id='BARRE".$i."'>".$_SESSION['pc'][$i]['BARRE']."</td>";
                        echo "<td id='MONTANT".$i."'>".$_SESSION['pc'][$i]['MONTANT']."</td>";
                        echo "<td id='MODELE".$i."'>".$_SESSION['pc'][$i]['MODELE']."</td>";
                        echo "<td id='DATE".$i."'>".$_SESSION['pc'][$i]['DATE']."</td>";
                        echo "<td id='RAM".$i."'>".$_SESSION['pc'][$i]['RAM']."</td>";
                        echo "<td id='OS".$i."'>".$_SESSION['pc'][$i]['OS']."</td>";
                        echo "<td id='PROCESSEUR".$i."'>".$_SESSION['pc'][$i]['PROCESSEUR']."</td>";
                        echo "<td id='IP".$i."'>".$_SESSION['pc'][$i]['IP']."</td>";
                        echo "<td id='MAC".$i."'>".$_SESSION['pc'][$i]['MAC']."</td>";
                        echo "<td id='VERSION".$i."'>".$_SESSION['pc'][$i]['VERSION']."</td>";
                        echo "<td id='ANTIVIRUS".$i."'>".$_SESSION['pc'][$i]['ANTIVIRUS']."</td>";
                        echo "<td id='CAPACITE".$i."'>".$_SESSION['pc'][$i]['CAPACITE']."</td>";
                        echo "<td id='PC".$i."'>".$_SESSION['pc'][$i]['pc']."</td>";
                        echo "<td id='AFFECTATION".$i."'>".$_SESSION['pc'][$i]['AFFECTATION']."</td>";
                        echo "<td id='save".$i."'><input type='button' class='btn' id='".$i."' onClick='modify(this.id)' name='submit-save' value='modify'></td>";
                        echo "<td id='delete".$i."'><input type='text' name='pc_id' value='".$_SESSION['pc'][$i]['pc_id']."' style='display : none;'><button class='btn' type='submit' name='submit-delete'>delete</button></td>";
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
                <td id="DATE-1"></td>
                <td id="RAM-1"></td>
                <td id="OS-1"></td>
                <td id="PROCESSEUR-1"></td>
                <td id="IP-1"></td>
                <td id="MAC-1"></td>
                <td id="VERSION-1"></td>
                <td id="ANTIVIRUS-1"></td>
                <td id="CAPACITE-1"></td>
                <td id="PC-1"></td>
                <td id="AFFECTATION-1"></td>
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
        var DATE = document.getElementById('DATE'+clicked);
        var RAM = document.getElementById('RAM'+clicked);
        var OS = document.getElementById('OS'+clicked);
        var PROCESSEUR = document.getElementById('PROCESSEUR'+clicked);
        var IP = document.getElementById('IP'+clicked);
        var MAC = document.getElementById('MAC'+clicked);
        var VERSION = document.getElementById('VERSION'+clicked);
        var ANTIVIRUS = document.getElementById('ANTIVIRUS'+clicked);
        var CAPACITE = document.getElementById('CAPACITE'+clicked);
        var PC = document.getElementById('PC'+clicked);
        var aff = document.getElementById('AFFECTATION'+clicked);
        var modify = document.getElementById('save'+clicked);
        var remove = document.getElementById('delete'+clicked);
        var btn = document.getElementById(clicked);
        var id = document.getElementById('id'+clicked);
        if (btn.value != 'save'){
            Série.innerHTML = "<input class='inp' type='text' name='Série' value='"+Série.textContent+"' id='btn"+clicked+"' >";
            BARRE.innerHTML = "<input class='inp' type='text' name='BARRE' value='"+BARRE.textContent+"' id='btn"+clicked+"' >";
            MONTANT.innerHTML = "<input class='inp' type='text' name='MONTANT' value='"+MONTANT.textContent+"' id='btn"+clicked+"' >";
            MODELE.innerHTML = "<input class='inp' type='text' name='MODELE' value='"+MODELE.textContent+"' id='btn"+clicked+"' >";
            DATE.innerHTML = "<input class='inp' type='text' name='DATE' value='"+DATE.textContent+"' id='btn"+clicked+"' >";
            RAM.innerHTML = "<input class='inp' type='text' name='RAM' value='"+RAM.textContent+"' id='btn"+clicked+"' >";
            OS.innerHTML = "<input class='inp' type='text' name='OS' value='"+OS.textContent+"' id='btn"+clicked+"' >";
            PROCESSEUR.innerHTML = "<input class='inp' type='text' name='PROCESSEUR' value='"+PROCESSEUR.textContent+"' id='btn"+clicked+"' >";
            IP.innerHTML = "<input class='inp' type='text' name='IP' value='"+IP.textContent+"' id='btn"+clicked+"' >";
            MAC.innerHTML = "<input class='inp' type='text' name='MAC' value='"+MAC.textContent+"' id='btn"+clicked+"' >";
            VERSION.innerHTML = "<input class='inp' type='text' name='VERSION' value='"+VERSION.textContent+"' id='btn"+clicked+"' >";
            ANTIVIRUS.innerHTML = "<input class='inp' type='text' name='ANTIVIRUS' value='"+ANTIVIRUS.textContent+"' id='btn"+clicked+"' >";
            CAPACITE.innerHTML = "<input class='inp' type='text' name='CAPACITE' value='"+CAPACITE.textContent+"' id='btn"+clicked+"' >";
            PC.innerHTML = "<input class='inp' type='text' name='PC' value='"+PC.textContent+"' id='btn"+clicked+"' >";
            aff.innerHTML = "<input class='inp' type='text' name='AFFECTATION' value='"+aff.textContent+"' id='btn"+clicked+"' ><input type='text' name='cmd_id' value='"+id.textContent+"' style='display : none;'>";
            modify.innerHTML = "<button type='submit' class='btn' name='submit-modify'>save</button>"
        }
    }
    function add(clicked) {
        var Série = document.getElementById('Série'+clicked);
        var BARRE = document.getElementById('BARRE'+clicked);
        var MONTANT = document.getElementById('MONTANT'+clicked);
        var MODELE = document.getElementById('MODELE'+clicked);
        var DATE = document.getElementById('DATE'+clicked);
        var RAM = document.getElementById('RAM'+clicked);
        var OS = document.getElementById('OS'+clicked);
        var PROCESSEUR = document.getElementById('PROCESSEUR'+clicked);
        var IP = document.getElementById('IP'+clicked);
        var MAC = document.getElementById('MAC'+clicked);
        var VERSION = document.getElementById('VERSION'+clicked);
        var ANTIVIRUS = document.getElementById('ANTIVIRUS'+clicked);
        var CAPACITE = document.getElementById('CAPACITE'+clicked);
        var PC = document.getElementById('PC'+clicked);
        var aff = document.getElementById('AFFECTATION'+clicked);
        var modify = document.getElementById('save'+clicked);
        var btn = document.getElementById(clicked);
        var id = document.getElementById('id'+clicked);
        if (btn.value != 'save'){
            Série.innerHTML = "<input class='inp' type='text' name='Série' value='' id='btn"+clicked+"' >";
            BARRE.innerHTML = "<input class='inp' type='text' name='BARRE' value='' id='btn"+clicked+"' >";
            MONTANT.innerHTML = "<input class='inp' type='text' name='MONTANT' value='' id='btn"+clicked+"' >";
            MODELE.innerHTML = "<input class='inp' type='text' name='MODELE' value='' id='btn"+clicked+"' >";
            DATE.innerHTML = "<input class='inp' type='text' name='DATE' value='' id='btn"+clicked+"' >";
            RAM.innerHTML = "<input class='inp' type='text' name='RAM' value='' id='btn"+clicked+"' >";
            OS.innerHTML = "<input class='inp' type='text' name='OS' value='' id='btn"+clicked+"' >";
            PROCESSEUR.innerHTML = "<input class='inp' type='text' name='PROCESSEUR' value='' id='btn"+clicked+"' >";
            IP.innerHTML = "<input class='inp' type='text' name='IP' value='' id='btn"+clicked+"' >";
            MAC.innerHTML = "<input class='inp' type='text' name='MAC' value='' id='btn"+clicked+"' >";
            VERSION.innerHTML = "<input class='inp' type='text' name='VERSION' value='' id='btn"+clicked+"' >";
            ANTIVIRUS.innerHTML = "<input class='inp' type='text' name='ANTIVIRUS' value='' id='btn"+clicked+"' >";
            CAPACITE.innerHTML = "<input class='inp' type='text' name='CAPACITE' value='' id='btn"+clicked+"' >";
            PC.innerHTML = "<input class='inp' type='text' name='PC' value='' id='btn"+clicked+"' >";
            aff.innerHTML = "<input class='inp' type='text' name='AFFECTATION' value='' id='btn"+clicked+"' >";
            modify.innerHTML = "<button type='submit' class='btn' name='submit-add'>save</button>"
        }
    }
</script>
</body>
</html>