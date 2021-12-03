<?php
session_start();

include('../db/dbconfig.php');

$dbh = new Dbh();
$pdo = $dbh->connect();
$productID = $_GET['product_id'];

if (isset($_POST['wijzigen'])) {
    $nieuwProductNaam = "product_naam=:productNaam";
    $nieuwProductPrijs = "product_prijs=:productPrijs";
    $nieuwProductSoort = "product_soort=:productSoort";

    $query = $pdo->prepare("UPDATE assortiment SET $nieuwProductNaam,$nieuwProductSoort, $nieuwProductPrijs WHERE product_id= '$productID' ");

    $query->bindParam(':productNaam', $_POST['product_naam']);
    $query->bindParam(':productPrijs', $_POST['product_prijs']);
    $query->bindParam(':productSoort', $_POST['product_soort']);

    $query_exec = $query->execute();

    if($query_exec) {
            $_SESSION["status"] = "De gegevens zijn ge-update";
            $_SESSION["statusCode"] = "success";
            header("Location: ../dashboard/product-wijzigen.php?product_id=".$productID);
    } else {
        $_SESSION["status"] = "De gegevens zijn niet ge-update";
        $_SESSION["statusCode"] = "error";
        header("Location: ../dashboard/product-wijzigen.php?product_id=".$productID);
    }
}
?>