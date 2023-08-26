<?php
require('dbconnectpj.php');
require('session.php');
// //$conn

// $category = isset($_GET["category"]) ? $_GET["category"] : "";
// // echo "category = ".$category;
// $type = isset($_GET["type"]) ? $_GET["type"] : "";
// // echo "type = ".$type;

// // ดึงข้อมูลจากฐานข้อมูล
// if (!empty($category) && !empty($type)) {
//     //เลือก กาแฟ หรืออื่นๆ และประเภท
//     $sqlTxt = "SELECT * FROM tbproduct WHERE tbcategory_catid = '$category' AND tbtype_typeid = '$type';";
// } elseif (!empty($category)) {
//     $sqlTxt = "SELECT * FROM tbproduct WHERE tbcategory_catid = '$category'";
// } elseif (!empty($type)) {
//     $sqlTxt = "SELECT * FROM tbproduct WHERE tbtype_typeid = '$type'";
// } else {
//     //กรณีเลือก ALL
//     $sqlTxt = "SELECT * FROM tbproduct;";
// }

// // echo $sqlTxt;
// $results = $conn->query($sqlTxt);
// // echo "rows: ".$results->num_rows;

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
    <title>Home Page</title> 
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("index1.jpg");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}

</style>
</head>
<body>

<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-large"> iPhone Shop&nbsp;&nbsp;<i class="fas fa-store"></i></a>
    <!-- Right-sided navbar links -->
  
    <div class="w3-right w3-hide-small">
      
    <a href="#product" class="w3-bar-item w3-button"><i class="fa fa-tablet"></i>&nbsp;Product</a>
      <a href="buyproduct.php" class="w3-bar-item w3-button"><i class="	fas fa-shopping-bag"></i>&nbsp;Buy</a>
      <a href="profile.php" class="w3-bar-item w3-button"><i class="fa fa-user-circle"></i>&nbsp;Profile</a>
      <a href="logoutc.php" class="w3-bar-item w3-button"><i class="	glyphicon glyphicon-log-out"></i> &nbsp; LOG OUT</a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close×</a>
  <a href="#product" onclick="w3_close()" class="w3-bar-item w3-button">Product</a>
  <a href="buyproduct.php" onclick="w3_close()" class="w3-bar-item w3-button">Buy</a>
  <a href="profile.php" onclick="w3_close()" class="w3-bar-item w3-button">Profile</a>
  <a href="logoutc.php" onclick="w3_close()" class="w3-bar-item w3-button">LOG OUT</a>
</nav>
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-left w3-text-white" style="padding:48px">
    <span class="w3-jumbo w3-hide-small ">Which iPhone is right for you?</span><br>
    <span class="w3-xxlarge w3-hide-large w3-hide-medium">Start something that matters</span><br>
    <span class="w3-large ">What makes an iPhone an iPhone?</span>
  </div> 
  </div>
</header>
<div class="w3-container" style="padding:120px 16px" id="product">
  <h3 class="w3-center">Product in My Shop</h3>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
    <img src="index11.jpg" style="width: 150px;"></a><br>
      <p class="w3-large">iPhone 11</p>    
    </div>
    <div class="w3-quarter">
    <img src="indexse.jpg" style="width: 155px;"></a>
      <p class="w3-large">iPhone SE</p>
    </div>
    <div class="w3-quarter">
    <img src="index12.jpg" style="width: 160px;"></a>
      <p class="w3-large">iPhone 12</p>
    </div>
    <div class="w3-quarter">
    <img src="index13.jpg" style="width: 160px;"></a>
      <p class="w3-large">iPhone 13</p>
    </div>
  </div>
</div>
 <center><a href="buyproduct.php" class="bn7 btn-lg">Buy now</a></center><br><br><br>

</body>
</html>

<?php 
$conn->close()
?>