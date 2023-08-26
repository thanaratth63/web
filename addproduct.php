<?php
require ('dbconnect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Get the posted data
    $itemid = $_POST['itemid'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];

    echo "You submitted: ".$itemid.", ".$name.", ".$category.", ".$type.", ".$price.", ".$detail;

    $sql = 'INSERT INTO tbproduct (itemid, itemname, tbcategory_catid, tbtype_typeid, unitprice, detail) values (?, ?, ?, ?, ?, ?)';
    $statement = $conn->prepare($sql);
    $statement->bind_param('ssssis', $itemid, $name, $category, $type, $price, $detail);
    $result = $statement->execute();

    if(!$result){
        die('Execute failed: '.$statement->error);
    }

    //Redirect
    header('Location: index.php');
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
    <h1>My Coffee Shop: Add product</h1>
   
    <form action="" method="POST" role="form">
        <div class="form-group">
            <label for="">Item ID</label>
            <input type="text" class="form-control" id="itemid" name="itemid" placeholder="รหัสสินค้า">
        </div>

        <div class="form-group">
            <label for="">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อสินค้า">
        </div>

        <div class="form-group">
            <label for="">Category</label>
            <select class="form-control" name="category" id="category">
                <?php
                $sqlTxt = "SELECT * FROM tbcategory;";
                $resultsCat = $conn->query($sqlTxt);            
                while ($row = $resultsCat->fetch_array()) {
                ?>
                    <option value="<?php echo $row["catid"] ?>">
                    <?php echo $row["catname"]; ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="">Type</label>
            <select class="form-control" name="type" id="type">
                <?php
                $sqlTxt = "SELECT * FROM tbtype;";
                $resultsType = $conn->query($sqlTxt);            
                while ($row = $resultsType->fetch_array()) {
                ?>
                    <option value="<?php echo $row["typeid"] ?>">
                    <?php echo $row["typename"]; ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="">Unitprice</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="ราคา">
        </div>

        <div class="form-group">
            <label for="">Detial</label>
            <input type="text" class="form-control" id="detail" name="detail" placeholder="รายละเอียดสินค้า">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        
        <a class="btn btn-default" href="index.php" role="button">Cancel</a>
        

    </form>
    
</body>
</html>

<?php
$conn->close();
?>