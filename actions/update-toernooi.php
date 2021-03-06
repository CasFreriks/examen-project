<?php
session_start();

include('../db/dbconfig.php');

$dbh = new Dbh();
$pdo = $dbh->connect();
$toernooiID = $_GET['toernooi_id'];

if (isset($_POST['wijzigen'])) {
    $nieuwtoernooiNaam = "toernooi_naam=:toernooiNaam";
    $nieuwtoernooiBegintijd = "toernooi_begintijd=:toernooiBegintijd";
    $nieuwtoernooiEindtijd = "toernooi_eindtijd=:toernooiEindtijd";
    $nieuwtoernooiDatum = "toernooi_datum=:toernooiDatum";
    $nieuwtoernooiDeadline = "toernooi_deadline=:toernooiDeadline";

    $query = $pdo->prepare("UPDATE toernooien SET $nieuwtoernooiNaam, $nieuwtoernooiBegintijd, $nieuwtoernooiEindtijd, $nieuwtoernooiDatum, $nieuwtoernooiDeadline WHERE toernooi_id= '$toernooiID' ");

    $query->bindParam(':toernooiNaam', $_POST['toernooi_naam']);
    $query->bindParam(':toernooiBegintijd', $_POST['toernooi_begintijd']);
    $query->bindParam(':toernooiEindtijd', $_POST['toernooi_eindtijd']);
    $query->bindParam(':toernooiDatum', $_POST['toernooi_datum']);
    $query->bindParam(':toernooiDeadline', $_POST['toernooi_deadline']);


    $query_exec = $query->execute();

    if($query_exec) {
            $_SESSION["status"] = "De gegevens zijn ge-update";
            $_SESSION["statusCode"] = "success";
            header("Location: ../dashboard/toernooi-wijzigen.php?toernooi_id=".$toernooiID);
    } else {
        $_SESSION["status"] = "De gegevens zijn niet ge-update";
        $_SESSION["statusCode"] = "error";
        header("Location: ../dashboard/toernooi-wijzigen.php?toernooi_id=".$toernooiID);
    }
}
?>