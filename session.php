<?php
    include 'dbconnectpj.php';
    session_start();

if (isset($_SESSION['account'])) {
    $sql = "SELECT * FROM account WHERE idaccount = '".$_SESSION['account']."'";
	$query = $conn->query($sql);
	$member = $query->fetch_assoc();
}
