<?php
include('../db/dbconfig.php');

$con = new Dbh();
$con = $con->connect(); //hier zorg ik ervoor dat mijn object connect

$toernooiID = $_GET['toernooi_id'];

$deleteQuery = $con->prepare("DELETE FROM toernooien WHERE toernooi_id = :toernooi_id");
$deleteQuery->bindParam(":toernooi_id", $toernooiID);
$deleteQuery->execute();

header ("Location: ../dashboard/toernooi-overzicht.php")
?>