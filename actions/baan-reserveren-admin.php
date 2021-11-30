<?php
session_start();
require_once ("../db/dbconfig.php");

$con = new Dbh();
$con = $con->connect(); //hier zorg ik ervoor dat mijn object connect

$tijd =  $_GET["tijd"];
$datum =  $_GET["datum"];
$baan = $_GET["baan"];

$sql = $con->prepare("INSERT INTO reservering (reserveer_datum, reserveer_tijd, baan_id) VALUES ( :datum, :tijd, :baanID)");
$sql->bindParam(":datum", $datum);
$sql->bindParam(":tijd", $tijd);
$sql->bindParam(":baanID", $baan);
$sql->execute();

$selectBaanGegevens = $con->prepare("SELECT * FROM baan WHERE baan_id = :baanID"); //haalt alle gegevens van de baan op
$selectBaanGegevens->bindParam(":baanID", $baan);
$selectBaanGegevens->execute();
$baanGegevens = $selectBaanGegevens->fetch();

$_SESSION["status1"] = "Je hebt een reservering aangemaakt! Kijk in je mail of bij je reserveringen overzicht voor je reservering.";
$_SESSION["statusCode"] = "success";

header ("Location: ../baan-reserveren.php?baan=" . $_GET["baan"]);



