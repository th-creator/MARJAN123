<?php
    include 'header.php';
    include 'style.php';
?>
<main>
    <style>
        form {
            background-color: white;
            width: 450px;
            padding: 1.5% 0% 1.5% 5%;
            margin: 33px 33%;
        }
        .btn {
            padding-bottom: 12px;
        }
    </style>
    
    <form action="includes/updateUsers.inc.php" method="post">
        <table>
            <tbody>
                <tr>
                    <td>name : </td>               
                    <td id="val0"><?= $_SESSION['user'][0]['users_uid']?></td>
                    <td id="save0"><input class="btn" type='button' id='0' onClick='modify(this.id)' name="submit-name" value='modify'></td>
                </tr>
                <tr>
                    <td>email : </td>
                    <td id="val1"><?= $_SESSION['user'][0]['users_email']?></td>
                    <td id="save1"><input class="btn" type='button' id='1' onClick='modify(this.id)' name="submit-email" value='modify'></td>
                </tr>
                <tr>
                    <td>password : </td>
                    <td >********</td>
                    <td><a id="btn" class="btn" href="pwdModify.php">modify</a></td>
                </tr>
            </tbody>
        </table>
    </form>
</main>
<script>
    function modify(clicked) {
        var val = document.getElementById('val'+clicked);
        var td = document.getElementById('save'+clicked);
        var btn = document.getElementById(clicked);
        if (btn.value != 'save'){
            val.innerHTML = "<input type='text'  name='value' value='"+val.textContent+"' id='btn"+clicked+"' placeholder='role'>";
            // role.innerHTML = "<select name='role'><option value='user' >User</option><option value='admin'>Admin</option></select><input type='text' name='id' value='"+(id.textContent)+"' style='display : none;'>";
            td.innerHTML = "<button class='btn' type='submit' name='"+btn.name+"'>save</button>"
        }
    }
    
    
</script>