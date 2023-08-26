<?php
require('session.php');
require('dbconnectpj.php');
//$conn
$idac=$_SESSION['account'];
$idproduct = $_GET["idproduct"];

// echo $idproduct;
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  //Get the posted data
  $nocredit = $_POST['nocredit'];
  $option = $_POST['pay'];
  $date=$_POST['date'];
  $time=$_POST['time'];

  // echo "You submitted: ".$product;

  $sql = 'INSERT INTO order1 (idaccount,idproduct,credit,option,date,time) values (?,?,?,?,?,?)';
  $statement = $conn->prepare($sql);
  $statement->bind_param('iissss', $idac,$idproduct,$nocredit,$option,$date,$time);
  $result = $statement->execute();

  if(!$result){
      die('Execute failed: '.$statement->error);
  }

  //Redirect
  header('Location: profile.php');
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Buy product</title> 
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.w3-bar .w3-button {
  padding: 16px;
}
</style>
</head>

<body>
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="indexpj.php" class="w3-bar-item w3-button w3-large"> iPhone Shop&nbsp;&nbsp;<i class="fas fa-store"></i></a>
    <!-- Right-sided navbar links -->
  
    <div class="w3-right w3-hide-small">
      
    <a href="indexpj.php" class="w3-bar-item w3-button"><i class="fa fa-tablet"></i>&nbsp;Product</a>
      <a href="buyproduct.php" class="w3-bar-item w3-button"><i class="	fas fa-shopping-bag"></i>&nbsp;Buy</a>
      <a href="profile.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-user-circle"></i>&nbsp;Profile</a>
      <a href="loginpj1.php " class="w3-bar-item w3-button"><i class="	glyphicon glyphicon-log-out"></i> &nbsp; LOG OUT</a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="indexpj.php #product" onclick="w3_close()" class="w3-bar-item w3-button">Product</a>
  <a href="buyproduct.php" onclick="w3_close()" class="w3-bar-item w3-button">Buy</a>
  <a href="profile.php" onclick="w3_close()" class="w3-bar-item w3-button">Profile</a>
  <a href="loginpj1.php" onclick="w3_close()" class="w3-bar-item w3-button">LOG OUT</a>
</nav>
</header><br><br><br>
    <center><h2>Confirm Order</h2>
    <div class="w3-container" style="padding:50px 16px" id="product">
      <div class="w3-row-padding w3-center" style="margin-top:64px">
        <div class="w3-quarter">
        <img src="addorder11.jpg" style="width: 290px;"></a><br>
          <p class="w3-large">iPhone 11</p>    
        </div>
        <div class="w3-quarter">
        <img src="addorderse.jpg" style="width: 290px;"></a>
          <p class="w3-large">iPhone SE</p>
        </div>
        <div class="w3-quarter">
        <img src="addorder12.jpeg" style="width: 190px;"></a>
          <p class="w3-large">iPhone 12</p>
        </div>
        <div class="w3-quarter">
        <img src="addorder13.jpg" style="width: 220px;"></a>
          <p class="w3-large">iPhone 13</p>
        </div>
      </div>
    </div>
    <div class="container">
      <form action="" method="POST" role="form">
        <div class="form-group">
            <h2>Payment</h2><br>
              <form class="form-inline" method="post" action="">
                <div class="form-group">
                    <label for="category">Payment Options :</label>
                    <select class="form-control" name="pay" id="pay">
                            <option value="cash">Cash</option>
                            <option value="credit">Credit Card</option>
                            <option value="bank">Mobile Banking</option>
                    </select>
                </div>
                <div class="form-group">
                      <label for="rdate">No. Mobile Banking / No. Credit Card / Cash</label>
                      <input type="text" name="nocredit" class="form-control" require>
                  </div>
                <div class="form-group">
                      <label for="rdate">Date Order</label>
                      <input type="date" name="date" class="form-control" require>
                  </div>
                  <div class="form-group">
                      <label for="rtime">Time Order</label>
                      <input type="time" name="time" class="form-control" require>
                </div>
        </form>
        <p class="w3-large">Your Product will be delivery in 3-7 days. After payment</p> 
          <?php
              $sql = "SELECT productname FROM product WHERE idproduct = '$idproduct'";
              $result = $conn->query($sql);
              $row = $result->fetch_assoc();
              $pdname = $row['productname'];
          ?>
    <h4><B>Are you want to order '&nbsp;&nbsp;<?php echo $pdname; ?>'&nbsp;?</B></h4><br>

        <button type="submit" class="btn btn-success">Sure</button>&nbsp;&nbsp;&nbsp;
        <a class="btn btn-default" href="buyproduct.php" role="button">Cancel</a>
    </form></center>
    
</body>
</html>