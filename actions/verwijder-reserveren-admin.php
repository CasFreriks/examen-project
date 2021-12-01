<?php
session_start();
require_once ("../db/dbconfig.php");

$con = new Dbh();
$con = $con->connect(); //hier zorg ik ervoor dat mijn object connect

$reserveringID = $_GET["id"];

$sql = $con->prepare("DELETE FROM reservering WHERE reserveer_id = :reserveringID");
$sql->bindParam(":reserveringID", $reserveringID);
$sql->execute();

$_SESSION["status1"] = "Je hebt je reservering succesvol verwijderd.";
$_SESSION["statusCode"] = "success";

header ("Location: ../dashboard/baan-reserveren.php");