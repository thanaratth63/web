<?php
// require('lock.php');
require('dbconnectpj.php');
require('navbar.php');

$models = isset($_GET["model"]) ? $_GET["model"] : "";
// echo "category = ".$category;
$capacity = isset($_GET["capacity"]) ? $_GET["capacity"] : "";
// echo "type = ".$type;
$color = isset($_GET["color"]) ? $_GET["color"] : "";

// ดึงข้อมูลจากฐานข้อมูล
if (!empty($models) && !empty($color) && !empty($capacity)) {
    $sqlTxt = "SELECT * FROM product WHERE idmodel = '$models' AND idcolor = '$color' AND idcapacity = '$capacity';";  
} 
elseif (!empty($models) && !empty($color) && empty($capacity)) {
    $sqlTxt = "SELECT * FROM product WHERE idmodel = '$models' AND idcolor = '$color' ;";  
} 
elseif (empty($models) && !empty($color) && !empty($capacity)) {
    $sqlTxt = "SELECT * FROM product WHERE  idcolor = '$color' AND idcapacity = '$capacity';";  
} 
elseif (!empty($models) && empty($color) && empty($capacity)) {
    $sqlTxt = "SELECT * FROM product WHERE idmodel = '$models';";  
} 
elseif (!empty($models) && empty($color) && !empty($capacity)) {
    $sqlTxt = "SELECT * FROM product WHERE idmodel = '$models' AND idcapacity = '$capacity';";  
} 

elseif (empty($models) && !empty($color) && empty($capacity)) {
    $sqlTxt = "SELECT * FROM product WHERE  idcolor = '$color';";  
} 
elseif (empty($models) && empty($color) && !empty($capacity)) {
    $sqlTxt = "SELECT * FROM product WHERE  idcapacity = '$capacity';";  
} 
else {
    $sqlTxt = "SELECT * FROM product;";
}

// echo $sqlTxt;
$results = $conn->query($sqlTxt);
// echo "rows: ".$results->num_rows;
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
    <title>Home Page</title> 
</head>
<body class="container">

    <h1> Product</h1>
    <a class="btn btn-success pull-right" href="addp.php" role="button">Add Product </a>
    <!-- <a class="btn btn-primary pull-right" href="addproduct.php" role="button">Add product</a> -->

    <?php
    $sqlTxt = "SELECT * FROM model;";
    $resultsModel = $conn->query($sqlTxt);

    $sqlTxt = "SELECT * FROM capacity;";
    $resultsCap = $conn->query($sqlTxt);

    $sqlTxt = "SELECT * FROM color;";
    $resultsColor = $conn->query($sqlTxt);

    ?>

    <form class="form-inline" method="get" action="">
        <div class="form-group">
            <label for="category">Choose Model :</label>
            <select class="form-control" name="model" id="model">
                    <option value="">All</option>
                    <?php
                    while ($row = $resultsModel->fetch_array()) {
                    ?>
                        <option value="<?php echo $row["idmodel"] ?>" 
                        <?php

                            echo $row["idmodel"] == $models ? "selected" : "";

                            ?>>
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
                <option value="">All</option>
                <?php
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
                <option value="">All</option>
                <?php
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

        
        &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary " >Enter</button>
    </form>
    <br>
        <table class="table">
            <tr>
                <th>Model</th>
                <th>Price</th>
                <th>Unit</th>
                <th></th>
            </tr>
            <?php
            while ($row = $results->fetch_array()) {
                // echo '<li>'.$row['detail']." ".$row['unitprice'].' บาท</li>';
            ?>
                <tr>
                    <td><?php echo $row['productname']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo "Bath" ?></td>
                    
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-info btn-default " href="editp.php?idproduct=<?php echo $row['idproduct']; ?>" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>&nbsp;&nbsp;
                        
                        <a class="btn btn-danger btn-default" href="deletep.php?idproduct=<?php echo $row['idproduct']; ?>" role="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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