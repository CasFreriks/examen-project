<?php
session_start();
require_once ("../db/dbconfig.php");
require_once ("email-lid-toevoegen.php");
$con = new Dbh();
$con = $con->connect(); //hier zorg ik ervoor dat mijn object connect

if (isset($_POST["email"]) && isset($_POST["ledenNmr"]) && isset($_POST["rolKeuze"])) {
    $email = $_POST["email"];
    $ledenNmr = $_POST["ledenNmr"];
    $rolKeuze = $_POST["rolKeuze"];

    //checkt of er niet al iemand is met dezelfde E-mailadres, zo ja? Dan keurt hij dat niet goed omdat die uniek moet zijn.
    $emailCheckSql = $con->prepare("SELECT lid_email FROM lid WHERE lid_email = :email");
    $emailCheckSql->bindParam(":email", $email);
    $emailCheckSql->execute();

    $emailCheck = $emailCheckSql->rowCount();

    //checkt of er niet al iemand is met deze ledennummer, zo ja? Dan keurt hij dat niet goed omdat die uniek moet zijn.
    $ledenNmrCheckSql = $con->prepare("SELECT lid_nr FROM lid WHERE lid_nr = :ledenNmr");
    $ledenNmrCheckSql->bindParam(":ledenNmr", $ledenNmr);
    $ledenNmrCheckSql->execute();

    $ledenNmrCheck = $ledenNmrCheckSql->rowCount();

    if ($emailCheck === 0) {
        if ($ledenNmrCheck === 0) {
            $sql = $con->prepare("INSERT INTO lid (lid_email, lid_rol, lid_sinds, lid_nr) VALUES (:email, :rolKeuze, current_timestamp, :ledenNmr)");
            $sql->bindParam(":email", $email);
            $sql->bindParam(":rolKeuze", $rolKeuze);
            $sql->bindParam(":ledenNmr", $ledenNmr);
            $sql->execute();

            lidToevoegenMail($ledenNmr, $email);

            header ("Location: ../dashboard/lid-toevoegen.php");

            $_SESSION["status"] = "Lid is aangemaakt en de mail is verstuurd!";
            $_SESSION["statusCode"] = "success";
        } else {
            $_SESSION["status"] = "Dit leden nummer is al ingebruik!";
            $_SESSION["statusCode"] = "error";

            header ("Location: ../dashboard/lid-toevoegen.php");
        }
    } else {
        $_SESSION["status"] = "Deze email is al ingebruik!";
        $_SESSION["statusCode"] = "error";

        header ("Location: ../dashboard/lid-toevoegen.php");
    }
} else {
    $_SESSION["status"] = "Er zijn geen gegevens ingevuld.";
    $_SESSION["statusCode"] = "error";

    header ("Location: ../dashboard/lid-toevoegen.php");
}