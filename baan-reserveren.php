<?php
session_start();
require_once ("db/dbconfig.php");

$con = new Dbh();
$con = $con->connect(); //hier zorg ik ervoor dat mijn object connect

if (isset($_GET["baan"]) ) {
    $baan = $_SESSION["baan"] = $_GET["baan"];
} elseif (isset($_SESSION["baan"])){
    $baan = $_SESSION["baan"];
} else {
    $baan = 1;
}

if (isset($_GET["datum"]) ) {
    $oneDate = $_SESSION["datum"] = $_GET["datum"];
} elseif (isset($_SESSION["datum"])){
    $oneDate = $_SESSION["datum"];
} else {
    $oneDate = date("Y-m-d");
}

$selectBaanGegevens = $con->prepare("SELECT * FROM baan WHERE baan_id = :baanID"); //haalt alle gegevens van de baan op
$selectBaanGegevens->bindParam(":baanID", $baan);
$selectBaanGegevens->execute();
$baanGegevens = $selectBaanGegevens->fetch();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/baan-reserveren.css">
    <link rel="stylesheet" href="css/melding.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> <!-- Jquery for the mobile nav -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet"/>

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>  <!-- Custom icons from BoxIcons.com CSS -->

    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet"> <!-- Datatables bootstrapp 5 theme-->

    <title>DTV | Baan reserveren</title>
</head>
<body>

<?php include('shared/nav.php');
?>
<div class="container-fluid">
    <div class="container contentUnder">
        <div class="row">
            <div class="col-md-12">
                <?php
                if(isset($_SESSION["status1"]) && $_SESSION["status1"] != "") {
                    ?>
                    <div class="melding  <?php echo $_SESSION["statusCode"]; ?>" style="width: 100%;">
                        <h6><?php echo $_SESSION["status1"]; ?></h6>
                    </div>

                    <?php
                    unset($_SESSION["status1"]);
                }
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <p style="text-decoration: underline">Je kan maar 1 uur per dag reserveren en maar 7 dagen vooruit kijken.</p>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <form class="mobileSelectDay" method="get">
                    <select class="form-select" onchange="this.form.submit();" name="datum">
                        <?php if (isset($_SESSION["datum"])) {
                            echo "<option value='" . $_SESSION["datum"] . "'>" . $_SESSION["datum"] . "</option>";
                            echo "<option disabled>-----------------------</option>";
                        } ?>
                        <option value="<?php echo date("Y-m-d");?>"><?php echo date("Y-m-d");?></option>
                        <option value="<?php $datetime = new DateTime('+1 day'); echo $datetime->format('Y-m-d');?>"><?php $datetime = new DateTime('+1 day'); echo $datetime->format('Y-m-d');?></option>
                        <option value="<?php $datetime = new DateTime('+2 day'); echo $datetime->format('Y-m-d');?>"><?php $datetime = new DateTime('+2 day'); echo $datetime->format('Y-m-d');?></option>
                        <option value="<?php $datetime = new DateTime('+3 day'); echo $datetime->format('Y-m-d');?>"><?php $datetime = new DateTime('+3 day'); echo $datetime->format('Y-m-d');?></option>
                        <option value="<?php $datetime = new DateTime('+4 day'); echo $datetime->format('Y-m-d');?>"><?php $datetime = new DateTime('+4 day'); echo $datetime->format('Y-m-d');?></option>
                        <option value="<?php $datetime = new DateTime('+5 day'); echo $datetime->format('Y-m-d');?>"><?php $datetime = new DateTime('+5 day'); echo $datetime->format('Y-m-d');?></option>
                        <option value="<?php $datetime = new DateTime('+6 day'); echo $datetime->format('Y-m-d');?>"><?php $datetime = new DateTime('+6 day'); echo $datetime->format('Y-m-d');?></option>
                    </select>
                </form>

                <form class="banenSelectie" method="get">
                    <select class="form-select" onchange="this.form.submit();" name="baan">
                        <?php if (isset($_SESSION["baan"])) {
                            echo "<option value='" . $_SESSION["baan"] . "'>Baan " . $_SESSION["baan"] . " | " . ucfirst($baanGegevens["baan_naam"]) . " </option>";
                            echo "<option disabled>-----------------------</option>";
                        } ?>
                        <option value="1">Baan 1 | Buiten tennis</option>
                        <option value="2">Baan 2 | Buiten tennis</option>
                        <option value="3">Baan 3 | Buiten tennis</option>
                        <option value="4">Baan 4 | Buiten tennis</option>
                        <option value="5">Baan 5 | Buiten tennis</option>
                        <option value="6">Baan 6 | Binnen squash</option>
                        <option value="7">Baan 7 | Binnen squash</option>
                    </select>
                </form>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered text-center overflow-auto">
                <thead>
                <tr class="bg-light-gray">
                    <th class="text-uppercase">Tijd
                    </th>
                    <?php
                        if (isset($_SESSION["datum"])) {
                            echo "<th class='text-uppercase'>" .  $_SESSION["datum"] . "</th>";
                        } else {
                            echo "<th class='text-uppercase'>" .  date("d-m-y") . "</th>";
                        }
                    ?>
                    <th class="text-uppercase bigScreenTableOnly"><?php $datetime = new DateTime('+1 day'); echo $datetime->format('d-m-y');?></th>
                    <th class="text-uppercase bigScreenTableOnly"><?php $datetime = new DateTime('+2 day'); echo $datetime->format('d-m-y');?></th>
                    <th class="text-uppercase bigScreenTableOnly"><?php $datetime = new DateTime('+3 day'); echo $datetime->format('d-m-y');?></th>
                    <th class="text-uppercase bigScreenTableOnly"><?php $datetime = new DateTime('+4 day'); echo $datetime->format('d-m-y');?></th>
                    <th class="text-uppercase bigScreenTableOnly"><?php $datetime = new DateTime('+5 day'); echo $datetime->format('d-m-y');?></th>
                    <th class="text-uppercase bigScreenTableOnly"><?php $datetime = new DateTime('+6 day'); echo $datetime->format('d-m-y');?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="align-middle">12:00</td>
                    <td>
                        <?php
                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '12%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $oneDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $oneDate && $reserveringenResult["reserveer_tijd"] == "12:00:00" || $reserveringenResult["reserveer_tijd"] == "12:30:00") {
                                ?>
                                <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                <div class="margin-10px-top font-size14">12:00-13:00</div>
                                <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                            <?php } else { ?>
                                <a href="actions/baan-reserveren.php?tijd=12:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">12:00-13:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            <?php } ?>

                        <?php } else { ?>
                            <a href="actions/baan-reserveren.php?tijd=12:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                            <div class="margin-10px-top font-size14">12:00-13:00</div>
                            <div class="font-size13 text-light-gray">Reserveerbaar</div>
                        <?php } ?>
                    </td>
                    <?php
                    $day = 1; //dag is standaard al een dag vooruit

                    for ($i = 0; $i <= 5; $i++) {
                        $days = $day++;
                        $date = new DateTime('+ ' .  $days . ' day');
                        $newDate = $date->format('Y-m-d');

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '12%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $newDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $newDate && $reserveringenResult["reserveer_tijd"] == "12:00:00" || $reserveringenResult["reserveer_tijd"] == "12:30:00") { ?>
                            <td class="bigScreenTableOnly">
                                <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                <div class="margin-10px-top font-size14">12:00-13:00</div>
                                <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                            </td>
                        <?php } else { ?>
                            <td class="bigScreenTableOnly">
                                <a href="actions/baan-reserveren.php?tijd=12:00&&datum=<?php $datetime = new DateTime('+ ' .  $days . ' day');
                                echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">12:00-13:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            </td>
                            <?php  }  ?>
                        <?php  } else { ?>
                        <td class="bigScreenTableOnly">
                            <a href="actions/baan-reserveren.php?tijd=12:00&&datum=<?php $datetime = new DateTime('+ ' . $days. ' day');
                            echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                            <div class="margin-10px-top font-size14">12:00-13:00</div>
                            <div class="font-size13 text-light-gray">Reserveerbaar</div>
                        </td>
                    <?php }} ?>
                </tr>
                <tr>
                    <td class="align-middle">13:00</td>
                    <td>
                        <?php

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '13%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $oneDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $oneDate && $reserveringenResult["reserveer_tijd"] == "13:00:00" || $reserveringenResult["reserveer_tijd"] == "13:30:00") {
                                ?>
                                <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                <div class="margin-10px-top font-size14">13:00-14:00</div>
                                <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                            <?php } else { ?>
                                <a href="actions/baan-reserveren.php?tijd=13:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">13:00-14:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            <?php } ?>

                        <?php } else { ?>
                            <a href="actions/baan-reserveren.php?tijd=13:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                            <div class="margin-10px-top font-size14">13:00-14:00</div>
                            <div class="font-size13 text-light-gray">Reserveerbaar</div>
                        <?php } ?>
                    </td>
                    <?php
                    $day = 1; //dag is standaard al een dag vooruit

                    for ($i = 0; $i <= 5; $i++) {
                        $days = $day++;
                        $date = new DateTime('+ ' .  $days . ' day');
                        $newDate = $date->format('Y-m-d');

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '13%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $newDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $newDate && $reserveringenResult["reserveer_tijd"] == "13:00:00" || $reserveringenResult["reserveer_tijd"] == "13:30:00") { ?>
                                <td class="bigScreenTableOnly">
                                    <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                    <div class="margin-10px-top font-size14">13:00-14:00</div>
                                    <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                                </td>
                            <?php } else { ?>
                                <td class="bigScreenTableOnly">
                                    <a href="actions/baan-reserveren.php?tijd=13:00&&datum=<?php $datetime = new DateTime('+ ' .  $days . ' day');
                                    echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                    <div class="margin-10px-top font-size14">13:00-14:00</div>
                                    <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                </td>
                            <?php  }  ?>
                        <?php  } else { ?>
                            <td class="bigScreenTableOnly">
                                <a href="actions/baan-reserveren.php?tijd=13:00&&datum=<?php $datetime = new DateTime('+ ' . $days. ' day');
                                echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">13:00-14:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            </td>
                        <?php }} ?>
                </tr>
                <tr>
                    <td class="align-middle">14:00</td>
                    <td>
                        <?php

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '14%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $oneDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $oneDate && $reserveringenResult["reserveer_tijd"] == "14:00:00" || $reserveringenResult["reserveer_tijd"] == "14:30:00") {
                                ?>
                                <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                <div class="margin-10px-top font-size14">14:00-15:00</div>
                                <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                            <?php } else { ?>
                                <a href="actions/baan-reserveren.php?tijd=14:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">14:00-15:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            <?php } ?>

                        <?php } else { ?>
                            <a href="actions/baan-reserveren.php?tijd=14:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                            <div class="margin-10px-top font-size14">14:00-15:00</div>
                            <div class="font-size13 text-light-gray">Reserveerbaar</div>
                        <?php } ?>
                    </td>
                    <?php
                    $day = 1; //dag is standaard al een dag vooruit

                    for ($i = 0; $i <= 5; $i++) {
                        $days = $day++;
                        $date = new DateTime('+ ' .  $days . ' day');
                        $newDate = $date->format('Y-m-d');

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '14%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $newDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $newDate && $reserveringenResult["reserveer_tijd"] == "14:00:00" || $reserveringenResult["reserveer_tijd"] == "14:30:00") { ?>
                                <td class="bigScreenTableOnly">
                                    <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                    <div class="margin-10px-top font-size14">14:00-15:00</div>
                                    <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                                </td>
                            <?php } else { ?>
                                <td class="bigScreenTableOnly">
                                    <a href="actions/baan-reserveren.php?tijd=14:00&&datum=<?php $datetime = new DateTime('+ ' .  $days . ' day');
                                    echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                    <div class="margin-10px-top font-size14">14:00-15:00</div>
                                    <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                </td>
                            <?php  }  ?>
                        <?php  } else { ?>
                            <td class="bigScreenTableOnly">
                                <a href="actions/baan-reserveren.php?tijd=14:00&&datum=<?php $datetime = new DateTime('+ ' . $days. ' day');
                                echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">14:00-15:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            </td>
                        <?php }} ?>
                </tr>
                <tr>
                    <td class="align-middle">15:00</td>
                    <td>
                        <?php

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '15%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $oneDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $oneDate && $reserveringenResult["reserveer_tijd"] == "15:00:00" || $reserveringenResult["reserveer_tijd"] == "15:30:00") {
                                ?>
                                <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                <div class="margin-10px-top font-size14">15:00-16:00</div>
                                <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                            <?php } else { ?>
                                <a href="actions/baan-reserveren.php?tijd=15:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">15:00-16:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            <?php } ?>

                        <?php } else { ?>
                            <a href="actions/baan-reserveren.php?tijd=15:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                            <div class="margin-10px-top font-size14">15:00-16:00</div>
                            <div class="font-size13 text-light-gray">Reserveerbaar</div>
                        <?php } ?>
                    </td>
                    <?php
                    $day = 1; //dag is standaard al een dag vooruit

                    for ($i = 0; $i <= 5; $i++) {
                        $days = $day++;
                        $date = new DateTime('+ ' .  $days . ' day');
                        $newDate = $date->format('Y-m-d');

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '15%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $newDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $newDate && $reserveringenResult["reserveer_tijd"] == "15:00:00" || $reserveringenResult["reserveer_tijd"] == "15:30:00") {
                                ?>
                                <td class="bigScreenTableOnly">
                                    <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                    <div class="margin-10px-top font-size14">15:00-16:00</div>
                                    <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                                </td>
                            <?php } else { ?>
                                <td class="bigScreenTableOnly">
                                    <a href="actions/baan-reserveren.php?tijd=15:00&&datum=<?php $datetime = new DateTime('+ ' .  $days . ' day');
                                    echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                    <div class="margin-10px-top font-size14">15:00-16:00</div>
                                    <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                </td>
                            <?php  }  ?>
                        <?php  } else { ?>
                            <td class="bigScreenTableOnly">
                                <a href="actions/baan-reserveren.php?tijd=15:00&&datum=<?php $datetime = new DateTime('+ ' . $days. ' day');
                                echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">15:00-16:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            </td>
                        <?php }} ?>
                </tr>
                <tr>
                    <td class="align-middle">16:00</td>
                    <td>
                        <?php

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '16%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $oneDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $oneDate && $reserveringenResult["reserveer_tijd"] == "16:00:00" || $reserveringenResult["reserveer_tijd"] == "16:30:00") {
                                ?>
                                <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                <div class="margin-10px-top font-size14">16:00-17:00</div>
                                <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                            <?php } else { ?>
                                <a href="actions/baan-reserveren.php?tijd=16:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">16:00-17:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            <?php } ?>

                        <?php } else { ?>
                            <a href="actions/baan-reserveren.php?tijd=16:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                            <div class="margin-10px-top font-size14">16:00-17:00</div>
                            <div class="font-size13 text-light-gray">Reserveerbaar</div>
                        <?php } ?>
                    </td>
                    <?php
                    $day = 1; //dag is standaard al een dag vooruit

                    for ($i = 0; $i <= 5; $i++) {
                        $days = $day++;
                        $date = new DateTime('+ ' .  $days . ' day');
                        $newDate = $date->format('Y-m-d');

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '16%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $newDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $newDate && $reserveringenResult["reserveer_tijd"] == "16:00:00" || $reserveringenResult["reserveer_tijd"] == "16:30:00") { ?>
                                <td class="bigScreenTableOnly">
                                    <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                    <div class="margin-10px-top font-size14">16:00-17:00</div>
                                    <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                                </td>
                            <?php } else { ?>
                                <td class="bigScreenTableOnly">
                                    <a href="actions/baan-reserveren.php?tijd=16:00&&datum=<?php $datetime = new DateTime('+ ' .  $days . ' day');
                                    echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                    <div class="margin-10px-top font-size14">16:00-17:00</div>
                                    <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                </td>
                            <?php  }  ?>
                        <?php  } else { ?>
                            <td class="bigScreenTableOnly">
                                <a href="actions/baan-reserveren.php?tijd=16:00&&datum=<?php $datetime = new DateTime('+ ' . $days. ' day');
                                echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">16:00-17:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            </td>
                        <?php }} ?>
                </tr>
                <tr>
                    <td class="align-middle">17:00</td>
                    <td>
                        <?php

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '17%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $oneDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $oneDate && $reserveringenResult["reserveer_tijd"] == "17:00:00" || $reserveringenResult["reserveer_tijd"] == "17:30:00") {
                                ?>
                                <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                <div class="margin-10px-top font-size14">17:00-18:00</div>
                                <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                            <?php } else { ?>
                                <a href="actions/baan-reserveren.php?tijd=17:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">17:00-18:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            <?php } ?>

                        <?php } else { ?>
                            <a href="actions/baan-reserveren.php?tijd=17:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                            <div class="margin-10px-top font-size14">17:00-18:00</div>
                            <div class="font-size13 text-light-gray">Reserveerbaar</div>
                        <?php } ?>
                    </td>
                    <?php
                    $day = 1; //dag is standaard al een dag vooruit

                    for ($i = 0; $i <= 5; $i++) {
                        $days = $day++;
                        $date = new DateTime('+ ' .  $days . ' day');
                        $newDate = $date->format('Y-m-d');

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '17%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $newDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $newDate && $reserveringenResult["reserveer_tijd"] == "17:00:00" || $reserveringenResult["reserveer_tijd"] == "17:30:00") { ?>
                                <td class="bigScreenTableOnly">
                                    <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                    <div class="margin-10px-top font-size14">17:00-18:00</div>
                                    <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                                </td>
                            <?php } else { ?>
                                <td class="bigScreenTableOnly">
                                    <a href="actions/baan-reserveren.php?tijd=17:00&&datum=<?php $datetime = new DateTime('+ ' .  $days . ' day');
                                    echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                    <div class="margin-10px-top font-size14">17:00-18:00</div>
                                    <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                </td>
                            <?php  }  ?>
                        <?php  } else { ?>
                            <td class="bigScreenTableOnly">
                                <a href="actions/baan-reserveren.php?tijd=17:00&&datum=<?php $datetime = new DateTime('+ ' . $days. ' day');
                                echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">17:00-18:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            </td>
                        <?php }} ?>
                </tr>
                <tr>
                    <td class="align-middle">18:00</td>
                    <td>
                        <?php
                        $date = $_GET["datum"] ?? date("Y-m-d");

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '18%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $oneDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $oneDate && $reserveringenResult["reserveer_tijd"] == "18:00:00" || $reserveringenResult["reserveer_tijd"] == "18:30:00") {
                                ?>
                                <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                <div class="margin-10px-top font-size14">18:00-19:00</div>
                                <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                            <?php } else { ?>
                                <a href="actions/baan-reserveren.php?tijd=18:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">18:00-19:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            <?php } ?>

                        <?php } else { ?>
                            <a href="actions/baan-reserveren.php?tijd=18:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                            <div class="margin-10px-top font-size14">18:00-19:00</div>
                            <div class="font-size13 text-light-gray">Reserveerbaar</div>
                        <?php } ?>
                    </td>
                    <?php
                    $day = 1; //dag is standaard al een dag vooruit

                    for ($i = 0; $i <= 5; $i++) {
                        $days = $day++;
                        $date = new DateTime('+ ' .  $days . ' day');
                        $newDate = $date->format('Y-m-d');

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '18%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $newDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $newDate && $reserveringenResult["reserveer_tijd"] == "18:00:00" || $reserveringenResult["reserveer_tijd"] == "18:30:00") { ?>
                                <td class="bigScreenTableOnly">
                                    <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                    <div class="margin-10px-top font-size14">18:00-19:00</div>
                                    <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                                </td>
                            <?php } else { ?>
                                <td class="bigScreenTableOnly">
                                    <a href="actions/baan-reserveren.php?tijd=18:00&&datum=<?php $datetime = new DateTime('+ ' .  $days . ' day');
                                    echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                    <div class="margin-10px-top font-size14">18:00-19:00</div>
                                    <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                </td>
                            <?php  }  ?>
                        <?php  } else { ?>
                            <td class="bigScreenTableOnly">
                                <a href="actions/baan-reserveren.php?tijd=18:00&&datum=<?php $datetime = new DateTime('+ ' . $days. ' day');
                                echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">18:00-19:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            </td>
                        <?php }} ?>
                </tr>
                <tr>
                    <td class="align-middle">19:00</td>
                    <td>
                        <?php
                        $date = $_GET["datum"] ?? date("Y-m-d");

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '19%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $oneDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $date && $reserveringenResult["reserveer_tijd"] == "19:00:00" || $reserveringenResult["reserveer_tijd"] == "19:30:00") {
                                ?>
                                <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                <div class="margin-10px-top font-size14">19:00-20:00</div>
                                <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                            <?php } else { ?>
                                <a href="actions/baan-reserveren.php?tijd=19:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">19:00-20:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            <?php } ?>

                        <?php } else { ?>
                            <a href="actions/baan-reserveren.php?tijd=19:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                            <div class="margin-10px-top font-size14">19:00-20:00</div>
                            <div class="font-size13 text-light-gray">Reserveerbaar</div>
                        <?php } ?>
                    </td>
                    <?php
                    $day = 1; //dag is standaard al een dag vooruit

                    for ($i = 0; $i <= 5; $i++) {
                        $days = $day++;
                        $date = new DateTime('+ ' .  $days . ' day');
                        $newDate = $date->format('Y-m-d');

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '19%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $newDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $newDate && $reserveringenResult["reserveer_tijd"] == "19:00:00" || $reserveringenResult["reserveer_tijd"] == "19:30:00") { ?>
                                <td class="bigScreenTableOnly">
                                    <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                    <div class="margin-10px-top font-size14">19:00-20:00</div>
                                    <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                                </td>
                            <?php } else { ?>
                                <td class="bigScreenTableOnly">
                                    <a href="actions/baan-reserveren.php?tijd=19:00&&datum=<?php $datetime = new DateTime('+ ' .  $days . ' day');
                                    echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                    <div class="margin-10px-top font-size14">19:00-20:00</div>
                                    <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                </td>
                            <?php  }  ?>
                        <?php  } else { ?>
                            <td class="bigScreenTableOnly">
                                <a href="actions/baan-reserveren.php?tijd=19:00&&datum=<?php $datetime = new DateTime('+ ' . $days. ' day');
                                echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">19:00-20:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            </td>
                        <?php }} ?>
                </tr>
                <tr>
                    <td class="align-middle">20:00</td>
                    <td>
                        <?php

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '20%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $oneDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $date && $reserveringenResult["reserveer_tijd"] == "20:00:00" || $reserveringenResult["reserveer_tijd"] == "20:30:00") {
                                ?>
                                <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                <div class="margin-10px-top font-size14">20:00-21:00</div>
                                <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                            <?php } else { ?>
                                <a href="actions/baan-reserveren.php?tijd=20:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">20:00-21:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            <?php } ?>

                        <?php } else { ?>
                            <a href="actions/baan-reserveren.php?tijd=20:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                            <div class="margin-10px-top font-size14">20:00-21:00</div>
                            <div class="font-size13 text-light-gray">Reserveerbaar</div>
                        <?php } ?>
                    </td>
                    <?php
                    $day = 1; //dag is standaard al een dag vooruit

                    for ($i = 0; $i <= 5; $i++) {
                        $days = $day++;
                        $date = new DateTime('+ ' .  $days . ' day');
                        $newDate = $date->format('Y-m-d');

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '20%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $newDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $newDate && $reserveringenResult["reserveer_tijd"] == "20:00:00" || $reserveringenResult["reserveer_tijd"] == "20:30:00") { ?>
                                <td class="bigScreenTableOnly">
                                    <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                    <div class="margin-10px-top font-size14">20:00-21:00</div>
                                    <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                                </td>
                            <?php } else { ?>
                                <td class="bigScreenTableOnly">
                                    <a href="actions/baan-reserveren.php?tijd=20:00&&datum=<?php $datetime = new DateTime('+ ' .  $days . ' day');
                                    echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                    <div class="margin-10px-top font-size14">20:00-21:00</div>
                                    <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                </td>
                            <?php  }  ?>
                        <?php  } else { ?>
                            <td class="bigScreenTableOnly">
                                <a href="actions/baan-reserveren.php?tijd=20:00&&datum=<?php $datetime = new DateTime('+ ' . $days. ' day');
                                echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">20:00-21:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            </td>
                        <?php }} ?>
                </tr>
                <tr>
                    <td class="align-middle">21:00</td>
                    <td>
                        <?php

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '21%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $oneDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $oneDate && $reserveringenResult["reserveer_tijd"] == "21:00:00" || $reserveringenResult["reserveer_tijd"] == "21:30:00") {
                                ?>
                                <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                <div class="margin-10px-top font-size14">21:00-22:00</div>
                                <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                            <?php } else { ?>
                                <a href="actions/baan-reserveren.php?tijd=21:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">21:00-22:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            <?php } ?>

                        <?php } else { ?>
                            <a href="actions/baan-reserveren.php?tijd=21:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                            <div class="margin-10px-top font-size14">21:00-22:00</div>
                            <div class="font-size13 text-light-gray">Reserveerbaar</div>
                        <?php } ?>
                    </td>
                    <?php
                    $day = 1; //dag is standaard al een dag vooruit

                    for ($i = 0; $i <= 5; $i++) {
                        $days = $day++;
                        $date = new DateTime('+ ' .  $days . ' day');
                        $newDate = $date->format('Y-m-d');

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '21%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $newDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $newDate && $reserveringenResult["reserveer_tijd"] == "21:00:00" || $reserveringenResult["reserveer_tijd"] == "21:30:00") { ?>
                                <td class="bigScreenTableOnly">
                                    <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                    <div class="margin-10px-top font-size14">21:00-22:00</div>
                                    <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                                </td>
                            <?php } else { ?>
                                <td class="bigScreenTableOnly">
                                    <a href="actions/baan-reserveren.php?tijd=21:00&&datum=<?php $datetime = new DateTime('+ ' .  $days . ' day');
                                    echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                    <div class="margin-10px-top font-size14">21:00-22:00</div>
                                    <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                </td>
                            <?php  }  ?>
                        <?php  } else { ?>
                            <td class="bigScreenTableOnly">
                                <a href="actions/baan-reserveren.php?tijd=21:00&&datum=<?php $datetime = new DateTime('+ ' . $days. ' day');
                                echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">21:00-22:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            </td>
                        <?php }} ?>
                </tr>
                <tr>
                    <td class="align-middle">22:00</td>
                    <td>
                        <?php

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '22%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $oneDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }


                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $oneDate && $reserveringenResult["reserveer_tijd"] == "22:00:00" || $reserveringenResult["reserveer_tijd"] == "22:30:00") {
                                ?>
                                <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                <div class="margin-10px-top font-size14">22:00-23:00</div>
                                <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                            <?php } else { ?>
                                <a href="actions/baan-reserveren.php?tijd=22:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">22:00-23:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            <?php } ?>

                        <?php } else { ?>
                            <a href="actions/baan-reserveren.php?tijd=22:00&&datum=<?php echo $oneDate; ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                            <div class="margin-10px-top font-size14">22:00-23:00</div>
                            <div class="font-size13 text-light-gray">Reserveerbaar</div>
                        <?php } ?>
                    </td>
                    <?php
                    $day = 1; //dag is standaard al een dag vooruit

                    for ($i = 0; $i <= 5; $i++) {
                        $days = $day++;
                        $date = new DateTime('+ ' .  $days . ' day');
                        $newDate = $date->format('Y-m-d');

                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_datum = :reserveerDatum AND reserveer_tijd like '22%' AND baan_id = :baanID");
                        $reserveringenSql->bindParam(":reserveerDatum", $newDate);
                        $reserveringenSql->bindParam(":baanID", $baan);
                        $reserveringenSql->execute();
                        $reserveringenResult = $reserveringenSql->fetch();
                        $reserveringenNum = $reserveringenSql->rowCount();

                        if ($reserveringenNum > 0) {
                            if ($reserveringenResult["lid_id"] == 0) {
                                $doel = "voor " . $reserveringenResult["reserveer_doel"];
                            } else {
                                $doel = "door lid";
                            }
                        }

                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                            if ($reserveringenResult["reserveer_datum"] == $newDate && $reserveringenResult["reserveer_tijd"] == "22:00:00" || $reserveringenResult["reserveer_tijd"] == "22:30:00") { ?>
                                <td class="bigScreenTableOnly">
                                    <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                    <div class="margin-10px-top font-size14">22:00-23:00</div>
                                    <div class="font-size13 text-light-gray">Gereserveerd <?php echo $doel; ?></div>
                                </td>
                            <?php } else { ?>
                                <td class="bigScreenTableOnly">
                                    <a href="actions/baan-reserveren.php?tijd=22:00&&datum=<?php $datetime = new DateTime('+ ' .  $days . ' day');
                                    echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                    <div class="margin-10px-top font-size14">22:00-23:00</div>
                                    <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                </td>
                            <?php  }  ?>
                        <?php  } else { ?>
                            <td class="bigScreenTableOnly">
                                <a href="actions/baan-reserveren.php?tijd=22:00&&datum=<?php $datetime = new DateTime('+ ' . $days. ' day');
                                echo $datetime->format('Y-m-d');  ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                <div class="margin-10px-top font-size14">22:00-23:00</div>
                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                            </td>
                        <?php }} ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


</div>

<?php include('shared/footer.php') ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

</body>
</html>