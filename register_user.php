<?php
header('Content-Type: text/html; charset=utf-8');
include 'connect.php';
if(isset($_POST['sub'])){
    $t=$_POST['text'];
    $u=$_POST['user'];
    $p=$_POST['pass'];
    $c=$_POST['city'];
    $g=$_POST['gen'];

    if($_FILES['f1']['name']){
        move_uploaded_file($_FILES['f1']['tmp_name'], "images/".$_FILES['f1']['name']);
        $img="images/".$_FILES['f1']['name'];
    }
    $i="insert into reg(name,username,password,city,image,gender)value('$t','$u','$p','$c','$img','$g')";
    mysqli_query($con, $i);
}
?>
<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
    <meta charset=”UTF-8”>
        <title></title>
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        Name
                        <input type="text" name="text">
                    </td>
                </tr>
                <tr>
                    <td>
                        Username
                        <input type="text" name="user">
                    </td>
                </tr>
                <tr>
                    <td>
                        password
                        <input type="password" name="pass">
                    </td>
                </tr>
                <tr>
                    <td>
                        city
                        <select name="city">
                            <option value="">-select-</option>
                            <?php
                            $sqlCity= mysqli_query($con, "select * from city");
                                                        
                            while($item = mysqli_fetch_assoc($sqlCity))
                            {
                                $nomeItem = $item['nameCity'];
                                $idCity = $item['idCity'];
                                echo "                                
                                    <option value=$nomeItem>$nomeItem</option>                                
                                ";
                            }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Gender
                        <input type="radio"name="gen" id="gen" value="male">male
                        <input type="radio" name="gen" id="gen" value="female">female
                    </td>
                </tr>
                <tr>
                    <td>
                        Image
                        <input type="file" name="f1">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="submit" name="sub">         
                    </td>
                    <td>
                        <a href="login.php"> Login</a>
                    </td>
                </tr>
            </table>
    </body>
</html>
