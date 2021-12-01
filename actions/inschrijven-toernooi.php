<?php 
session_start();

include('../db/dbconfig.php');

$dbh = new Dbh();
$pdo = $dbh->connect();
$toernooiID = $_GET['id'];
$lid_id = $_SESSION["lidID"];

$select2 = $pdo->prepare("SELECT toernooi_id FROM inschrijvingen WHERE toernooi_id = $toernooiID");
$select = $pdo->prepare("SELECT lid_id, toernooi_id FROM inschrijvingen WHERE lid_id = $lid_id AND toernooi_id = $toernooiID");
$select->bindParam(':toernooiID', $toernooiID);
$select->bindParam(':lidID', $lid_id);
$select2->bindParam(':toernooiID', $toernooiID);
$select->execute();
$select2->execute();
$toernooiCount = $select2->rowCount();
$count = $select->rowCount();
$data = $select->fetchAll(PDO::FETCH_ASSOC);

if($count < 1) {
    if($toernooiCount <= 31) {
        $sth = $pdo->prepare("INSERT INTO inschrijvingen (lid_id, toernooi_id)values($lid_id ,$toernooiID)");
        $execute = $sth->execute();
        $_SESSION["status"] = "Je bent ingeschreven voor dit toernooi!";
        $_SESSION["statusCode"] = "success";
        header("Location: ../inschrijven-toernooien.php");
    } else {
        $_SESSION["status"] = "Sorry, dit toernooi is vol.";
        $_SESSION["statusCode"] = "error";
        header("Location: ../inschrijven-toernooien.php");
    }
} else {
    $_SESSION["status"] = "Je bent al ingeschreven voor dit toernooi.";
    $_SESSION["statusCode"] = "error";
    header("Location: ../inschrijven-toernooien.php");
}   
?>