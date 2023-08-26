<?php
// require('lock.php');
require('session.php');
require('dbconnectpj.php');
require('navbar.php');


$idorder = isset($_GET['idorder']) ? $_GET['idorder'] : "";

// if ($idorder != "") {
//     $sql = "SELECT * FROM order1 INNER JOIN account ON order1.idaccount=account.idaccount INNER JOIN product ON order1.idproduct=product.idproduct where order1.idaccount = '$idaccount' AND order1.idorder = '$idorder' ";
// }
// else {
//     $sql = "SELECT * FROM order1 INNER JOIN account ON order1.idaccount=account.idaccount INNER JOIN product ON order1.idproduct=product.idproduct where order1.idaccount = '$idaccount'";
// }
// $results = $conn->query($sql);
if ($idorder != "") {
    $sql = "SELECT * FROM order1 INNER JOIN account ON order1.idaccount=account.idaccount INNER JOIN product ON order1.idproduct=product.idproduct";
}
else {
    $sql = "SELECT * FROM order1 INNER JOIN account ON order1.idaccount=account.idaccount INNER JOIN product ON order1.idproduct=product.idproduct ";
}
$results = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <title>Order</title> 
</head>
<body class="container">

    <h1>All Order</h1>
    <form method="post" class="form-inline">
        No. Order 
        <input type="text" name="idorder" class="form-control" placeholder="">
        <input class="btn btn-primary" type="submit" value="Search">
    </form>
    <!-- <a class="btn btn-danger pull-right" href="indexpj.php" role="button">Back to Home </a> -->
    <!-- <a class="btn btn-primary pull-right" href="addproduct.php" role="button">Add product</a> -->

    <br>
        <table class="table">
            <tr>
                <th>No.Order</th>
                <th>Customer Name</th>
                <th>Order</th>
                <th>payment</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
            <?php
            while ($row = $results->fetch_assoc()) {
                // echo '<li>'.$row['detail']." ".$row['unitprice'].' บาท</li>';
            ?>
                <tr>
                    <td><?php echo $row['idorder']; ?></td>
                    <td><?php echo $row['name'];  ?></td>
                    <td><?php echo $row['productname']; ?></td>
                    <td><?php echo $row['option']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['time']; ?></td>

                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        
                        <a class="btn btn-danger btn-default" href="deleteordera.php?idorder=<?php echo $row['idorder']; ?>" role="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
</body>

</html>

<?php 
$conn->close()
?>