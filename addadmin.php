<?php
require ('dbconnectpj.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adname = $_POST['adname'];
    $ademail = $_POST['ademail'];
    $adpassword = $_POST['adpassword'];

    // echo "You submitted: ".$adname.", ".$ademail.", ".$adpassword.", ".$productname.", ".$price;

    $sql = 'INSERT INTO admin (adname, ademail, adpassword) values (?, ?, ?)';
    $statement = $conn->prepare($sql);
    $statement->bind_param('sss', $adname, $ademail, $adpassword);
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
    <title>Add member</title>
</head>
<body class="container">
    <h1> Admin : Add member</h1>
    <?php 
    $adname = isset($_GET["adname"]) ? $_GET["adname"] : "";
    // echo "category = ".$category;
    $ademail = isset($_GET["ademail"]) ? $_GET["ademail"] : "";
    // echo "type = ".$type;
    $adpassword = isset($_GET["adpassword"]) ? $_GET["adpassword"] : "";
    // ดึงข้อมูลจากฐานข้อมูล

    ?>
    
    <form class="" method="post" action="">
        <div class="form-group">
            <label for=""> Name</label>
            <input type="text" class="form-control" id="adname" name="adname" placeholder="" required>
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" id="ademail" name="ademail" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="text" class="form-control" id="adpassword" name="adpassword" placeholder="" required>
        </div>
        &nbsp;&nbsp;&nbsp;
        <button type="submit" class="btn btn-success">Save</button>
        
        <a class="btn btn-default" href="admin.php" role="button">Cancel</a>
        
    </form>
      
    
</body>
</html>

<?php
$conn->close();
?>