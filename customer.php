<?php
// require('lock.php');
require('dbconnectpj.php');
require('navbar.php');

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
    <title>Customer</title> 
</head>
<body class="container" >
<?php
$mname = isset($_GET['mname']) ? $_GET['mname'] : "";
if ($mname != "") {
    $sql = "SELECT * FROM account where name = '$mname'";
}
else {
    $sql = "SELECT * FROM account";
}
    $results = $conn->query($sql);
?>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
    <h2>Customer Information</h2><br>
    
    <a href="addcus.php" class="btn btn-success pull-right" style="margin-left: 10px">Create Customer Account</a>
    <form method="get" class="form-inline">
        Search Name: 
        <input type="text" name="mname" class="form-control" placeholder="Customer Name" >
        <input class="btn btn-primary" type="submit" value="Search">
    </form>
    
    </div>
</div>
<div class="container-fluid">
    
    <table class="table" style="margin-top: 20px">
        <thead>
            <tr>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while($row = $results->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['idcustomer'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['password'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td class="text-center">
                    <a href="editc.php?idaccount=<?php echo $row['idaccount'] ?>" class="btn btn-default btn-info">
                        <span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;
                    <a href="deletec.php?idaccount=<?php echo $row['idaccount'] ?>" class="btn btn-default btn-danger">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

<?php
$conn->close();

?>
<script type="text/javascript" src="js/bootstrap/bootstrap-dropdown.js"></script>
<script>
$('.dropdown-toggle').dropdown()
</script>
</body>
</html>

