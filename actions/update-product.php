<?php
require '../db/dbConfig.php';
$con = new Dbh();
$con = $con->connect(); //hier zorg ik ervoor dat mijn object connect

$productID = $_GET['product_id'];
$productNaam = $_POST["product_naam"];
$productSoort = $_POST["product_soort"];
$productPrijs = $_POST["product_prijs"];

$sql = $con->prepare("UPDATE assortiment SET product_naam = :productNaam, product_prijs = :productPrijs, productSoort, :productSoort WHERE product_id = :productID");
$sql->bindParam(":productNaam", $productNaam);
$sql->bindParam(":productID", $productID);
$sql->bindParam(":productSoort", $productSoort);
$sql->bindParam(":productPrijs", $productPrijs);
$sql->execute();
header ("Location: ../dashboard/product-wijzigen.php");
?>