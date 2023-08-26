<?php
require ('dbconnectpj.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idmodel = $_POST['model'];
    $idcolor = $_POST['color'];
    $idcapacity = $_POST['capacity'];
    $productname = $_POST['product'];
    $price = $_POST['price'];

    echo "You submitted: ".$idmodel.", ".$idcolor.", ".$idcapacity.", ".$productname.", ".$price;

    $sql = 'INSERT INTO product (idmodel, idcolor, idcapacity, productname, price) values (?, ?, ?, ?, ?)';
    $statement = $conn->prepare($sql);
    $statement->bind_param('iiiss', $idmodel, $idcolor, $idcapacity, $productname, $price);
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
    <title>Add Product</title>
</head>
<body class="container">
    <h1> Admin : Add product</h1>
    <?php 
    $models = isset($_GET["model"]) ? $_GET["model"] : "";
    // echo "category = ".$category;
    $capacity = isset($_GET["capacity"]) ? $_GET["capacity"] : "";
    // echo "type = ".$type;
    $color = isset($_GET["color"]) ? $_GET["color"] : "";
    // ดึงข้อมูลจากฐานข้อมูล
    $product = isset($_GET["productname"]) ? $_GET["cproductname"] : "";
    
    $price = isset($_GET["price"]) ? $_GET["price"] : "";
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
                    <option value="<?php echo $row["idmodel"] ?>">
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

                        echo $row["idcolor"] == $color ? "selected" : "";

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

                        echo $row["idcapacity"] == $capacity ? "selected" : "";

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
            <input type="text" class="form-control" id="product" name="product" placeholder="" required>
        </div>

        <div class="form-group">
            <label for="">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        
        <a class="btn btn-default" href="indexa.php" role="button">Cancel</a>
        
    </form>
      
    
</body>
</html>

<?php
$conn->close();
?>