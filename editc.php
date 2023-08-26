<?php
require('dbconnectpj.php');

$idaccount = $_GET["idaccount"];
// echo $idproduct;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    // echo "You submitted: " . $itemid . ", " . $name . ", " . $category . ", " . $type . ", " . $price . ", " . $detail;

    $sql = 'UPDATE account SET name = ?, email = ?,password = ?, phone = ?, address = ?  WHERE idaccount = ? ';
    $statement = $conn->prepare($sql);
    $statement->bind_param('ssssss', $name, $email,  $password,$phone, $address,$idaccount);
    $result = $statement->execute();

    if (!$result) {
        die('Execute failed:'. $statement->error);
    }

    //Redirect
    header('Location: customer.php');
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
    <title>edit customer</title>
</head>

<body class="container">
    <h1>Admin: Edit Customer</h1>
    <?php
         $idcus = isset($_GET["idcustomer"]) ? $_GET["idcustomer"] : "";
         $name = isset($_GET["name"]) ? $_GET["name"] : "";
         $email = isset($_GET["email"]) ? $_GET["email"] : "";
         $password = isset($_GET["password"]) ? $_GET["password"] : "";
         $phone = isset($_GET["phone"]) ? $_GET["phone"] : "";
         $address = isset($_GET["address"]) ? $_GET["address"] : "";

        $sql = "SELECT * FROM account WHERE idaccount = '$idaccount'";
        // echo $sql;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>
<form class="" method="post" action="">
        <div class="form-group">
            <label for="">ID Customer</label>
            <input type="text" class="form-control" id="idcus" name="idcus" placeholder=""value="<?php echo $row["idcustomer"]; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder=""value="<?php echo $row["name"]; ?>">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder=""value="<?php echo $row["email"]; ?>">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="" value="<?php echo $row["password"]; ?>">
        </div>
        <div class="form-group">
            <label for="">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder=""value="<?php echo $row["phone"]; ?>" >
        </div>
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder=""value="<?php echo $row["address"]; ?>" >
        </div>
        <button type="submit" class="btn btn-success ">Edit</button>
        
        <a class="btn btn-default" href="customer.php" role="button">Cancel</a>
        
    </form>

</body>

</html>

<?php
$conn->close();
?>