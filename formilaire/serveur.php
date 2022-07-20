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
    <form action='includes/serveur.inc.php' method='get'>
    <table class="styled-table" style="margin: 10% 0%;">
    <caption style="background-color: yellow;">SERVEURS</caption>
        <thead>
            <tr>
                <td>id</td>
                <td>Numéro de Série</td>
                <td>CODE A BARRE</td>
                <td >MONTANT PRIX D'ACHAT</td>
                <td>MODELE du Matériel</td>
                <td>Disponibilité du rack</td>
                <td>DATE DE MISE EN PRODUCTION</td>
                <td>RAM</td>
                <td >OS</td>
                <td>PROCESSEUR</td>
                <td>ADRESSE IP</td>
                <td>ADRESSE MAC</td>
                <td>VERSION ANTIVIRUS</td>
                <td >DATE MAJ ANTIVIRUS</td>
                <td>C</td>
                <td>D</td>
                <td>E</td>
                <td>F</td>
                <td>NOM DU SERVEUR</td>
                <td >AFFECTATION</td>
                <td colspan='2'></td>
            </tr>
        </thead>
        <tbody>
            <?php
                if (isset($_SESSION['srv'])) {
                    for ($i=0 ; $i < count($_SESSION['srv']) ; $i++ ) {
                        echo "<tr id='tr".$i."'>";
                        echo "<td ><p id='id".$i."'>".$_SESSION['srv'][$i]['srv_id']."</p></td>";
                        echo "<td id='Série".$i."'>".$_SESSION['srv'][$i]['Série']."</td>";
                        echo "<td id='BARRE".$i."'>".$_SESSION['srv'][$i]['BARRE']."</td>";
                        echo "<td id='MONTANT".$i."'>".$_SESSION['srv'][$i]['MONTANT']."</td>";
                        echo "<td id='MODELE".$i."'>".$_SESSION['srv'][$i]['MODELE']."</td>";
                        echo "<td id='Disponibilité".$i."'>".$_SESSION['srv'][$i]['disponibilite']."</td>";
                        echo "<td id='DATE".$i."'>".$_SESSION['srv'][$i]['DATE']."</td>";
                        echo "<td id='RAM".$i."'>".$_SESSION['srv'][$i]['RAM']."</td>";
                        echo "<td id='OS".$i."'>".$_SESSION['srv'][$i]['OS']."</td>";
                        echo "<td id='PROCESSEUR".$i."'>".$_SESSION['srv'][$i]['PROCESSEUR']."</td>";
                        echo "<td id='IP".$i."'>".$_SESSION['srv'][$i]['IP']."</td>";
                        echo "<td id='MAC".$i."'>".$_SESSION['srv'][$i]['MAC']."</td>";
                        echo "<td id='VERSION".$i."'>".$_SESSION['srv'][$i]['VERSION']."</td>";
                        echo "<td id='ANTIVIRUS".$i."'>".$_SESSION['srv'][$i]['ANTIVIRUS']."</td>";
                        echo "<td id='C".$i."'>".$_SESSION['srv'][$i]['C']."</td>";
                        echo "<td id='D".$i."'>".$_SESSION['srv'][$i]['D']."</td>";
                        echo "<td id='E".$i."'>".$_SESSION['srv'][$i]['E']."</td>";
                        echo "<td id='F".$i."'>".$_SESSION['srv'][$i]['F']."</td>";
                        echo "<td id='SERVEUR".$i."'>".$_SESSION['srv'][$i]['SERVEUR']."</td>";
                        echo "<td id='AFFECTATION".$i."'>".$_SESSION['srv'][$i]['AFFECTATION']."</td>";
                        echo "<td id='save".$i."'><input type='button' class='btn' id='".$i."' onClick='modify(this.id)' name='submit-save' value='modify'></td>";
                        echo "<td id='delete".$i."'><input type='text' name='srv_id' value='".$_SESSION['srv'][$i]['srv_id']."' style='display : none;'><button class='btn' type='submit' name='submit-delete'>delete</button></td>";
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
                <td id="Disponibilité-1"></td>
                <td id="DATE-1"></td>
                <td id="RAM-1"></td>
                <td id="OS-1"></td>
                <td id="PROCESSEUR-1"></td>
                <td id="IP-1"></td>
                <td id="MAC-1"></td>
                <td id="VERSION-1"></td>
                <td id="ANTIVIRUS-1"></td>
                <td id="C-1"></td>
                <td id="D-1"></td>
                <td id="E-1"></td>
                <td id="F-1"></td>
                <td id="SERVEUR-1"></td>
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
        var Disponibilité = document.getElementById('Disponibilité'+clicked);
        var DATE = document.getElementById('DATE'+clicked);
        var RAM = document.getElementById('RAM'+clicked);
        var OS = document.getElementById('OS'+clicked);
        var PROCESSEUR = document.getElementById('PROCESSEUR'+clicked);
        var IP = document.getElementById('IP'+clicked);
        var MAC = document.getElementById('MAC'+clicked);
        var VERSION = document.getElementById('VERSION'+clicked);
        var ANTIVIRUS = document.getElementById('ANTIVIRUS'+clicked);
        var C = document.getElementById('C'+clicked);
        var D = document.getElementById('D'+clicked);
        var E = document.getElementById('E'+clicked);
        var F = document.getElementById('F'+clicked);
        var SERVEUR = document.getElementById('SERVEUR'+clicked);
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
            Disponibilité.innerHTML = "le site ne dispose pas de rack";
            DATE.innerHTML = "<input class='inp' type='text' name='DATE' value='"+DATE.textContent+"' id='btn"+clicked+"' >";
            RAM.innerHTML = "<input class='inp' type='text' name='RAM' value='"+RAM.textContent+"' id='btn"+clicked+"' >";
            OS.innerHTML = "<input class='inp' type='text' name='OS' value='"+OS.textContent+"' id='btn"+clicked+"' >";
            PROCESSEUR.innerHTML = "<input class='inp' type='text' name='PROCESSEUR' value='"+PROCESSEUR.textContent+"' id='btn"+clicked+"' >";
            IP.innerHTML = "<input class='inp' type='text' name='IP' value='"+IP.textContent+"' id='btn"+clicked+"' >";
            MAC.innerHTML = "<input class='inp' type='text' name='MAC' value='"+MAC.textContent+"' id='btn"+clicked+"' >";
            VERSION.innerHTML = "<input class='inp' type='text' name='VERSION' value='"+VERSION.textContent+"' id='btn"+clicked+"' >";
            ANTIVIRUS.innerHTML = "<input class='inp' type='text' name='ANTIVIRUS' value='"+ANTIVIRUS.textContent+"' id='btn"+clicked+"' >";
            C.innerHTML = "<input class='inp' type='text' name='C' value='"+C.textContent+"' id='btn"+clicked+"' >";
            D.innerHTML = "<input class='inp' type='text' name='D' value='"+D.textContent+"' id='btn"+clicked+"' >";
            E.innerHTML = "<input class='inp' type='text' name='E' value='"+E.textContent+"' id='btn"+clicked+"' >";
            F.innerHTML = "<input class='inp' type='text' name='F' value='"+F.textContent+"' id='btn"+clicked+"' >";
            SERVEUR.innerHTML = "<input class='inp' type='text' name='SERVEUR' value='"+SERVEUR.textContent+"' id='btn"+clicked+"' >";
            aff.innerHTML = "<input class='inp' type='text' name='AFFECTATION' value='"+aff.textContent+"' id='btn"+clicked+"' ><input type='text' name='cmd_id' value='"+id.textContent+"' style='display : none;'>";
            modify.innerHTML = "<button type='submit' class='btn' name='submit-modify'>save</button>"
        }
    }
    function add(clicked) {
        var Série = document.getElementById('Série'+clicked);
        var BARRE = document.getElementById('BARRE'+clicked);
        var MONTANT = document.getElementById('MONTANT'+clicked);
        var MODELE = document.getElementById('MODELE'+clicked);
        var Disponibilité = document.getElementById('Disponibilité'+clicked);
        var DATE = document.getElementById('DATE'+clicked);
        var RAM = document.getElementById('RAM'+clicked);
        var OS = document.getElementById('OS'+clicked);
        var PROCESSEUR = document.getElementById('PROCESSEUR'+clicked);
        var IP = document.getElementById('IP'+clicked);
        var MAC = document.getElementById('MAC'+clicked);
        var VERSION = document.getElementById('VERSION'+clicked);
        var ANTIVIRUS = document.getElementById('ANTIVIRUS'+clicked);
        var C = document.getElementById('C'+clicked);
        var D = document.getElementById('D'+clicked);
        var E = document.getElementById('E'+clicked);
        var F = document.getElementById('F'+clicked);
        var SERVEUR = document.getElementById('SERVEUR'+clicked);
        var aff = document.getElementById('AFFECTATION'+clicked);
        var modify = document.getElementById('save'+clicked);
        var btn = document.getElementById(clicked);
        var id = document.getElementById('id'+clicked);
        if (btn.value != 'save'){
            Série.innerHTML = "<input class='inp' type='text' name='Série' value='' id='btn"+clicked+"' >";
            BARRE.innerHTML = "<input class='inp' type='text' name='BARRE' value='' id='btn"+clicked+"' >";
            MONTANT.innerHTML = "<input class='inp' type='text' name='MONTANT' value='' id='btn"+clicked+"' >";
            MODELE.innerHTML = "<input class='inp' type='text' name='MODELE' value='' id='btn"+clicked+"' >";
            Disponibilité.innerHTML = "le site ne dispose pas de rack";
            DATE.innerHTML = "<input class='inp' type='text' name='DATE' value='' id='btn"+clicked+"' >";
            RAM.innerHTML = "<input class='inp' type='text' name='RAM' value='' id='btn"+clicked+"' >";
            OS.innerHTML = "<input class='inp' type='text' name='OS' value='' id='btn"+clicked+"' >";
            PROCESSEUR.innerHTML = "<input class='inp' type='text' name='PROCESSEUR' value='' id='btn"+clicked+"' >";
            IP.innerHTML = "<input class='inp' type='text' name='IP' value='' id='btn"+clicked+"' >";
            MAC.innerHTML = "<input class='inp' type='text' name='MAC' value='' id='btn"+clicked+"' >";
            VERSION.innerHTML = "<input class='inp' type='text' name='VERSION' value='' id='btn"+clicked+"' >";
            ANTIVIRUS.innerHTML = "<input class='inp' type='text' name='ANTIVIRUS' value='' id='btn"+clicked+"' >";
            C.innerHTML = "<input class='inp' type='text' name='C' value='' id='btn"+clicked+"' >";
            D.innerHTML = "<input class='inp' type='text' name='D' value='' id='btn"+clicked+"' >";
            E.innerHTML = "<input class='inp' type='text' name='E' value='' id='btn"+clicked+"' >";
            F.innerHTML = "<input class='inp' type='text' name='F' value='' id='btn"+clicked+"' >";
            SERVEUR.innerHTML = "<input class='inp' type='text' name='SERVEUR' value='' id='btn"+clicked+"' >";
            aff.innerHTML = "<input class='inp' type='text' name='AFFECTATION' value='' id='btn"+clicked+"' >";
            modify.innerHTML = "<button type='submit' class='btn' name='submit-add'>save</button>"
        }
    }
</script>
</body>
</html>