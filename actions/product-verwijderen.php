<?php
include('../db/dbconfig.php');

$con = new Dbh();
$con = $con->connect(); //hier zorg ik ervoor dat mijn object connect

$productID = $_GET['product_id'];

$deleteQuery = $con->prepare("DELETE FROM assortiment WHERE product_id = :product_id");
$deleteQuery->bindParam(":product_id", $productID);
$deleteQuery->execute();

header ("Location: ../dashboard/menukaart-overzicht.php")
?>