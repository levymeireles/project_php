<?php
include 'connect.php';
if (isset($_POST['submit_button'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];

    if ($_FILES['file']['name']) {
        move_uploaded_file($_FILES['file']['tmp_name'], "images/" . $_FILES['file']['name']);
        $image = "images/" . $_FILES['file']['name'];
    } else {
        $image = $_POST['image'];
    }

    $query_update = "UPDATE USERS SET NAME = '$name', USERNAME = '$username', PASSWORD = '$password', CITY = '$city', GENDER = '$gender', IMAGE = '$image' WHERE ID = '$_SESSION[ID]'";

    mysqli_query($con, $query_update);
    header('location:home.php');
}

$query_select = "SELECT * FROM USERS WHERE ID = '$_SESSION[ID]'";

$res = mysqli_query($con, $query_select);
$row = mysqli_fetch_assoc($res);

?>
<form method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                Name
                <input type="text" name="name" value="<?php echo $row['NAME'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                Username
                <input type="text" name="username" value="<?php echo $row['USERNAME'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                password
                <input type="password" name="password" value="<?php echo $row['PASSWORD'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                city
                <select name="city">
                    <option value="">-select-</option>
                    <option value="knp" <?php if ($row['CITY'] == 'knp') {
                                            echo "selected='selected'";
                                        } ?>>kanpur</option>
                    <option value="lko" <?php if ($row['CITY'] == 'lko') {
                                            echo "selected='selected'";
                                        } ?>>lucknow</option>
            </td>
        </tr>
        <tr>
            <td>
                Gender
                <?php if ($row['GENDER'] == 'male') {
                ?>
                    <input type="radio" name="gender" id="gen" value="male" checked>
                <?php
                } else {
                ?>
                    <input type="radio" name="gender" id="gen" value="male">
                    <?php } ?>male
                    <?php if ($row['gender'] == 'female') {
                    ?>
                        <input type="radio" name="gender" id="gen" value="female" checked>
                    <?php
                    } else {
                    ?>
                        <input type="radio" name="gender" id="gen" value="female">
                        <?php } ?>female
            </td>
        </tr>
        <tr>
            <td>
                Image
                <img src="<?php echo $row['IMAGE'] ?>" width="100px" height="100px">
                <input type="file" name="file"/>
                <input type="hidden" name="image" value="<?php echo $row['IMAGE'] ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="submit" name="submit_button">

            </td>
        </tr>
    </table>
</form>