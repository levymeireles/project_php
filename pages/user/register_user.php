<?php
header('Content-Type: text/html; charset=utf-8');
include '../../services/connect.php';

if (isset($_POST['submit_button'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];

    if ($_FILES['file']['name']) {
        move_uploaded_file($_FILES['file']['tmp_name'], "../../images/" . $_FILES['file']['name']);
        $image = "images/" . $_FILES['file']['name'];
    }

    $query_insert = "INSERT INTO USERS (NAME, USERNAME, PASSWORD, CITY, GENDER, IMAGE ) VALUES('$name','$username','$password','$city','$gender','$image')";

    mysqli_query($con, $query_insert);
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
                    <input type="text" name="name">
                </td>
            </tr>
            <tr>
                <td>
                    Username
                    <input type="text" name="username">
                </td>
            </tr>
            <tr>
                <td>
                    password
                    <input type="password" name="password">
                </td>
            </tr>
            <tr>
                <td>
                    city
                    <select name="city">
                        <option value="">-select-</option>
                        <?php
                        $sqlCity = mysqli_query($con, "SELECT * FROM CITY");

                        while ($city = mysqli_fetch_assoc($sqlCity)) {
                            $nameCity = $city['NAME'];
                            $idCity = $city['ID'];
                            echo "                                
                                    <option value=$idCity>$nameCity</option>                                
                                ";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td>
                    Gender
                    <input type="radio" name="gender" id="gen" value="male">male
                    <input type="radio" name="gender" id="gen" value="female">female
                </td>
            </tr>
            <tr>
                <td>
                    Image
                    <input type="file" name="file">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Cadastrar" name="submit_button">
                </td>
                <td>
                    <a href="login.php"> Login</a>
                </td>
            </tr>
        </table>
</body>

</html>