<?php
require ('dbconnectpj.php');

// $models = isset($_GET["model"]) ? $_GET["model"] : "";
// // echo "category = ".$category;
// $capacity = isset($_GET["capacity"]) ? $_GET["capacity"] : "";
// // echo "type = ".$type;
// $color = isset($_GET["color"]) ? $_GET["color"] : "";
// // ดึงข้อมูลจากฐานข้อมูล
$idproduct = isset($_GET["idproduct"]) ? $_GET["idproduct"] : "";
// $productname = isset($_GET["productname"]) ? $_GET["productname"] : "";

// $price = isset($_GET["price"]) ? $_GET["price"] : "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = 'DELETE FROM product WHERE idproduct = ?';
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $idproduct);
    $result = $statement->execute();

    if(!$result){
        die('Execute failed: '.$statement->error);
    }

    //Redirect
    header('Location: indexa.php');
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
    <title>Coffee Shop</title>
</head>

<body class="container">
    <h1>Admin : Delete product</h1>

    <?php
        $sql = "SELECT productname FROM product WHERE idproduct = '$idproduct'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $productname = $row['productname'];
    ?><br>
    <h4>Are you want to delete  '<?php echo $productname; ?>' ?</h4><br>
    
    <form action="" method="POST" role="form">
        <button type="submit" class="btn btn-danger">Delete</button>
        <a class="btn btn-default" href="indexa.php" role="button">Cancel</a>
        
    </form>
    

</body>

</html>
<?php 
$conn->close();
?>