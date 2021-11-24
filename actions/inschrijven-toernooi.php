<?php 
session_start();

include('../db/dbconfig.php');

$dbh = new Dbh();
$pdo = $dbh->connect();
$toernooiID = $_GET['id'];
$lid_id = $_SESSION["lidID"];

$sth = $pdo->prepare("INSERT INTO inschrijvingen (lid_id, toernooi_id)values($lid_id ,$toernooiID)");

$execute = $sth->execute();

if($execute) {
    $_SESSION["status"] = "Je bent ingeschreven voor het toernooi!";
    $_SESSION["statusCode"] = "success";
    header("Location: ../inschrijven-toernooien.php");
} else {
$_SESSION["status"] = "Er ging wat fout, je bent niet ingeschreven.";
$_SESSION["statusCode"] = "error";
header("Location: ../inschrijven-toernooien.php");
}

?>