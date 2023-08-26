<?php
require ('dbconnectpj.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Get the posted data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //  echo "You submitted: ".$name.", ".$username.", ".$password;

    $sqlTxt = 'INSERT INTO account (name,email,password) values (?, ?, ?)';
    $statement = $conn->prepare($sqlTxt);
    $statement->bind_param('sss',  $name, $email,$password);
    $result = $statement->execute();

    if(!$result){
        die('Execute failed: '.$statement->error);
    }

    //Redirect
    header('Location: loginpj.php');
    exit();

}
?>
