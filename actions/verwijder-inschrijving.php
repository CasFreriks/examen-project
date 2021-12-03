<?php 
session_start();
include('../db/dbconfig.php');

$conn = new Dbh();
$conn = $conn->connect();

$lidID = $_SESSION['lidID'];
$toernooi_id = $_GET['toernooi_id'];
$huidigeDatum = date("d-m-Y");

$selectQuery = $conn->prepare("SELECT * FROM inschrijvingen LEFT JOIN toernooien ON inschrijvingen.toernooi_id = toernooien.toernooi_id 
WHERE toernooien.toernooi_id = :toernooiID");
$selectQuery->bindParam(':toernooiID', $toernooi_id);
$selectQuery->execute();
$data = $selectQuery->fetch(PDO::FETCH_ASSOC);

$toernooiDeadline = $data["toernooi_deadline"];
$deelnemersDecrease = $data["toernooi_deelnemers"] -=1;

if(strtotime($huidigeDatum) == strtotime($toernooiDeadline)) {
    $_SESSION["status"] = "Oeps, er ging iets fout. Je inschrijving is niet verwijderd.";
    $_SESSION["statusCode"] = "error";
    header("Location: ../overzicht-toernooien.php");
} else {
    $deleteQuery = $conn->prepare("DELETE FROM inschrijvingen WHERE toernooi_id = :toernooiID AND lid_id = :lidID");
    $deleteQuery->bindParam(':toernooiID', $toernooi_id);
    $deleteQuery->bindParam(':lidID', $lidID);
    $deleteQuery->execute();

    $updateQuery = $conn->prepare("UPDATE toernooien SET toernooi_deelnemers = :toernooiDeelnemers WHERE toernooi_id = :toernooiID");
    $updateQuery->bindParam(':toernooiID', $toernooi_id);
    $updateQuery->bindParam(':toernooiDeelnemers', $deelnemersDecrease);
    $updateQuery->execute();

    $_SESSION["status"] = "Je inschrijving is succesvol verwijderd.";
    $_SESSION["statusCode"] = "success";
    header("Location: ../overzicht-toernooien.php");
}

?>