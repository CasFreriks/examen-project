<?php
require_once ("../db/dbconfig.php");
$con = new Dbh();
$con = $con->connect(); //hier zorg ik ervoor dat mijn object connect

$test = $con->prepare("SELECT * FROM assortiment");
$test->execute();
$result = $test->fetch();
echo $result["product_naam"];

//if (!empty($_POST["email"]) && !empty($_POST["wachtwoord"])) {
//
//
//
//} else {
//    echo "sorry, je moet al je gegevens invullen";
//}