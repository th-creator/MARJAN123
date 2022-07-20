
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery/jquery-3.6.0.min.js" type="text/javascript"></script>
    <title>Document</title>
</head>
<body>

    <?php
    include 'header.php';
    $_SESSION['type']=2;
    ?>

    <style>
        .container {
            margin-top: 40px;
            display: flex;
            flex-direction: row;
            margin-left: 5%;
            flex-wrap: wrap;
        }
        .backg {
            width: 17.5%;
            max-width: 25%;
            min-width: 175px;
            margin-right: 2.5%;
            margin-bottom: 7.5px;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }
        .title{
            margin-bottom: 8px;
        }
        .button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }
        .button:hover {
            color: grey;
        }
        .qte  {
            width: 40px;
        }
        #table {
            margin: 2% 40% ;
            /* list-style: none; */
            line-height: 45px;
        }
        #table li a {
            color: #000;
            text-decoration: none;
        }
        #table li a:hover {
            opacity: 50%;
        }
    </style>
    
    <ul id="table">
        <li><a href="includes/serveur.inc.php">SERVEURS</a></li>
        <li><a href="pc.php">PC</a></li>
        <li><a href="">IMPRIMANTES</a></li>
        <li><a href="">HORODATEURS DE POINTAGE</a></li>
        <li><a href="">CONTRÔLE D'ACCES</a></li>
        <li><a href="">CAISSES ENREGISTREUSES</a></li>
        <li><a href="">ETIQUETEUSES</a></li>
        <li><a href="">CAISSES</a></li>
    </ul>
    
    <script>
        function charger(clicked) {
            var id = $('#id'+clicked).text();
            console.log(id);
            var name = $('#name'+clicked).text();
            var price = $('#price'+clicked).text();
            var qte = $('#qte'+clicked).val();
            console.log(qte);
            action = "add";
            $.ajax({
                url:"cart.php",
                method:"POST",
                data:{
                        cmd_id:id,
                        cmd_qte:qte,
                        cmd_name:name,
                        cmd_price:price,
                        action:action
                    },
                success:function(data) {
                    alert("item added");
                }
            })
        }
    </script>
    <?php
        include 'footer.php'
    ?>
</body>
</html>
