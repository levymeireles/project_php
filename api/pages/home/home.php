<?php
include '../../services/connect.php';
include '../../services/checkLogin.php';

$query = "SELECT * FROM USERS WHERE ID = $_SESSION[ID]";
$res = mysqli_query($con, $query);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplicação Pessoal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">Visualizar Perfil</h1>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">City</th>
                    <th scope="col">Gender</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "
                        <tr>
                        <td  scope='row'> <img src=../../" . $row['IMAGE'] . "  width='100px' height='100px'></td>
                        <td  scope='row'>" . $row['NAME'] . "</td>
                        <td  scope='row'>" . $row['USERNAME'] . "</td>
                        <td  scope='row'>" . $row['CITY'] . "</td>
                        <td  scope='row'>" . $row['GENDER'] . "</td>
                        </tr>
                        ";
                    }
                } else {
                    echo "Sem resultados para  exibir";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div>
        <a href="../user/edit.php">Edit</a>
        <a href="../user/delete.php">Delete</a>
        <a href="../../services/logout.php">Logout</a> <br><br>
        <a href="../city/viewall_city.php">City</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>