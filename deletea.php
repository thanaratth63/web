<?php
require ('dbconnectpj.php');

// $models = isset($_GET["model"]) ? $_GET["model"] : "";
// // echo "category = ".$category;
// $capacity = isset($_GET["capacity"]) ? $_GET["capacity"] : "";
// // echo "type = ".$type;
// $color = isset($_GET["color"]) ? $_GET["color"] : "";
// // ดึงข้อมูลจากฐานข้อมูล
$idadmin = isset($_GET["idadmin"]) ? $_GET["idadmin"] : "";
// $productname = isset($_GET["productname"]) ? $_GET["productname"] : "";

// $price = isset($_GET["price"]) ? $_GET["price"] : "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = 'DELETE FROM admin WHERE idadmin = ?';
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $idadmin);
    $result = $statement->execute();

    if(!$result){
        die('Execute failed: '.$statement->error);
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
    <title>deletecus</title>
</head>

<body class="container">
    <h1>Admin : Delete Admin</h1>

    <?php
        $sql = "SELECT adname FROM admin WHERE idadmin = '$idadmin'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $adname = $row['adname'];
    ?><br>
    <h4>Are  you want to delete  '<?php echo $adname; ?>' ?</h4><br>
    
    <form action="" method="POST" role="form">
        <button type="submit" class="btn btn-danger">Delete</button>
        <a class="btn btn-default" href="admin.php" role="button">Cancel</a>
        
    </form>
    

</body>

</html>
<?php 
$conn->close();
?>