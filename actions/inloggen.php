<?php
session_start();
require_once ("../db/dbconfig.php");
$con = new Dbh();
$con = $con->connect(); //hier zorg ik ervoor dat mijn object connect

if (!empty($_POST["email"]) && !empty($_POST["wachtwoord"])) { //als de formulieren ingevuld zijn komt alles bij de querys
    //doormiddel van bindParam voorkom je SQL Injections
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];

//if (!empty($_POST["email"]) && !empty($_POST["wachtwoord"])) {
//
//
//
//} else {
//    echo "sorry, je moet al je gegevens invullen";
//}