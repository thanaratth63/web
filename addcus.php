<?php
require ('dbconnectpj.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Get the posted data
    $idcus = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    

    //echo "You submitted: ".$name.", ".$username.", ".$password;

    $sql = 'INSERT INTO account (idcustomer,name,email,password,phone,address) values (?,?, ?, ?,?,?)';
    $statement = $conn->prepare($sql);
    $statement->bind_param('isssss',$idcus, $name,$email,$password,$phone,$address);
    $results = $statement->execute();

    if(!$results){
        die('Execute failed: '.$statement->error);
    }

    //Redirect
    header('Location: customer.php');
    exit();

}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'><link rel="stylesheet" href="./style.css">
</head>

<body class="container"><br>
<h1> Admin : Add member</h1>
            <form class="" method="post" action="">
                <div class="form-group">
                    <label for="Fullname">ID Customer</label>
                    <input type="text" name="id" id="id" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="Fullname">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="" required> 
                </div>
                <div class="form-group">
                    <label for="Fullname">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Fullname">Address</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
                &nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-success">Save</button>
                
                <a class="btn btn-default" href="customer.php" role="button">Cancel</a>
            </form>
                    
</body>
</html>
 <?php
 $conn->close();
 ?>
 