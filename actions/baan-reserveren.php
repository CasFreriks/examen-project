<?php
session_start();
require_once ("../db/dbconfig.php");

$con = new Dbh();
$con = $con->connect(); //hier zorg ik ervoor dat mijn object connect

$lidID = $_SESSION["lidID"];
$tijd =  $_GET["tijd"];
$datum =  $_GET["datum"];

$sql = $con->prepare("INSERT INTO reservering (lid_id, reserveer_datum, reserveer_tijd) VALUES (:lidID, :datum, :tijd)");
$sql->bindParam(":lidID",  $lidID);
$sql->bindParam(":datum", $datum);
$sql->bindParam(":tijd", $tijd);
$sql->execute();
