<?php
require('dbconnectpj.php');

$idadmin = $_GET["idadmin"];
// echo $idproduct;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //
    $adname  = $_POST['adname'];
    $ademail = $_POST['ademail'];
    $adpassword = $_POST['adpassword'];
    // echo "You submitted: " . $itemid . ", " . $adname . ", " . $category . ", " . $type . ", " . $price . ", " . $detail;

    $sql = 'UPDATE admin SET adname = ?, ademail = ?,adpassword = ? WHERE idadmin = ? ';
    $statement = $conn->prepare($sql);
    $statement->bind_param('ssss', $adname, $ademail,  $adpassword,$idadmin);
    $result = $statement->execute();

    if (!$result) {
        die('Execute failed:'. $statement->error);
    }

    //Redirect
    header('Location: admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>edit admin</title>
</head>

<body class="container">
    <h1>Admin: Edit Admin</h1>
    <?php
         $idad = isset($_GET["idadmin"]) ? $_GET["idadmin"] : "";
         $adname = isset($_GET["adname"]) ? $_GET["adname"] : "";
         $ademail = isset($_GET["ademail"]) ? $_GET["ademail"] : "";
         $adpassword = isset($_GET["adpassword"]) ? $_GET["adpassword"] : "";

        $sql = "SELECT * FROM admin WHERE idadmin = '$idadmin'";
        // echo $sql;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>
<form class="" method="post" action="">
        <div class="form-group">
            <label for="">ID Admin</label>
            <input type="text" class="form-control" id="idadmin" name="idadmin" placeholder=""value="<?php echo $row["idadmin"]; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" id="adname" name="adname" placeholder=""value="<?php echo $row["adname"]; ?>">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" id="ademail" name="ademail" placeholder=""value="<?php echo $row["ademail"]; ?>">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="text" class="form-control" id="adpassword" name="adpassword" placeholder="" value="<?php echo $row["adpassword"]; ?>">
        </div>
        <button type="submit" class="btn btn-success ">Edit</button>
        
        <a class="btn btn-default" href="admin.php" role="button">Cancel</a>
        
    </form>

</body>

</html>

<?php
$conn->close();
?>