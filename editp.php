<?php
require('dbconnectpj.php');
$idproduct = $_GET["idproduct"];
// echo $idproduct;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Get the posted data
    $idmodel = $_POST['model'];
    $idcolor = $_POST['color'];
    $idcapacity = $_POST['capacity'];
    $productname = $_POST['productname'];
    $price = $_POST['price'];
   

    // echo "You submitted: " . $itemid . ", " . $name . ", " . $category . ", " . $type . ", " . $price . ", " . $detail;

    $sql = 'UPDATE product SET idmodel = ?, idcolor = ?, idcapacity = ?,productname = ?, price = ?  WHERE idproduct = ? ';
    $statement = $conn->prepare($sql);
    $statement->bind_param('iiisss', $idmodel, $idcolor, $idcapacity,  $productname,$price, $idproduct);
    $result = $statement->execute();

    if (!$result) {
        die('Execute failed: ' . $statement->error);
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
    <h1>My Coffee Shop: Edit product</h1>
    <?php 
     $models = isset($_GET["model"]) ? $_GET["model"] : "";
     // echo "category = ".$category;
     $capacity = isset($_GET["capacity"]) ? $_GET["capacity"] : "";
     // echo "type = ".$type;
     $color = isset($_GET["color"]) ? $_GET["color"] : "";
     // ดึงข้อมูลจากฐานข้อมูล
     $product = isset($_GET["productname"]) ? $_GET["productname"] : "";
     
     $price = isset($_GET["price"]) ? $_GET["price"] : "";
    ?>
    <?php
        $sql = "SELECT * FROM product WHERE idproduct = '$idproduct'";
        // echo $sql;
        $result = $conn->query($sql);
        $rowItem = $result->fetch_assoc();
    ?>

    
<form class="" method="post" action="">
        <div class="form-group">
            <label for="category">Choose Model :</label>
            <select class="form-control" name="model" id="model">
            <?php
                $sqlTxt = "SELECT * FROM model;";
                $resultsModel = $conn->query($sqlTxt);        
                while ($row = $resultsModel->fetch_array()) {
                ?>
                   <option value="<?php echo $row["idmodel"] ?>" 
                        <?php  echo $row["idmodel"] == $rowItem["idmodel"] ? "selected" : ""; ?>>
                            <?php echo $row["modelname"]; ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="type">Choose Color:</label>
            <select class="form-control" name="color" id="color">
                <?php
                    $sqlTxt = "SELECT * FROM color;";
                    $resultsColor = $conn->query($sqlTxt);
                while ($row = $resultsColor->fetch_array()) {
                ?>
                   <option value="<?php echo $row["idcolor"] ?>" <?php

                    echo $row["idcolor"] == $rowItem["idcolor"] ? "selected" : "";

                    ?>>
                    <?php echo $row["colorname"]; ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="type">Choose Capacity :</label>
            <select class="form-control" name="capacity" id="capacity">
                
                <?php
                    $sqlTxt = "SELECT * FROM capacity;";
                    $resultsCap = $conn->query($sqlTxt);
                while ($row = $resultsCap->fetch_array()) {
                ?>
                    <option value="<?php echo $row["idcapacity"] ?>" <?php

                    echo $row["idcapacity"] == $rowItem["idcapacity"]  ? "selected" : "";

                    ?>>
                    <?php echo $row["capacityname"]; ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Product Name</label>
            <input type="text" class="form-control" id="productname" name="productname" placeholder=""value="<?php echo $rowItem["productname"]; ?>">
        </div>

        <div class="form-group">
            <label for="">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="" value="<?php echo $rowItem["price"]; ?>">
        </div>
        &nbsp;&nbsp;&nbsp;
        <button type="submit" class="btn btn-primary ">Edit Product</button>
        
        <a class="btn btn-default" href="indexa.php" role="button">Cancel</a>
        
    </form>

</body>

</html>

<?php
$conn->close();
?>