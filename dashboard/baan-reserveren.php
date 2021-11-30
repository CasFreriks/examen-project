<?php
    session_start();
    require_once ("../db/dbconfig.php");

    $con = new Dbh();
    $con = $con->connect(); //hier zorg ik ervoor dat mijn object connect

    $date1 = new DateTime("29-11-2021");
    $date2 = new DateTime("+7 days");
    $date3 = new DateTime("+14 days");
    $week1 = $date1->format("W");
    $week2 = $date2->format("W");
    $week3 = $date3->format("W");

    $baan = $_GET["baan"] ?? 1; //als get baan niet gezet is dan is die standaard baan 1, de ?? is een korte if statement

    $selectBaanGegevens = $con->prepare("SELECT * FROM baan WHERE baan_id = :baanID"); //haalt alle gegevens van de baan op
    $selectBaanGegevens->bindParam(":baanID", $baan);
    $selectBaanGegevens->execute();
    $baanGegevens = $selectBaanGegevens->fetch();


if (isset($_GET["week"])) {
    if ($_GET["week"] == $week1) {
        $dag1 = new DateTime('now');
        $dag2 = new DateTime('+1 day');
        $dag3 = new DateTime('+2 day');
        $dag4 = new DateTime('+3 day');
        $dag5 = new DateTime('+4 day');
        $dag6 = new DateTime('+5 day');
        $dag7 = new DateTime('+6 day');

    } elseif ($_GET["week"] == $week2) {
        $dag1 = new DateTime('+7 day');
        $dag2 = new DateTime('+8 day');
        $dag3 = new DateTime('+9 day');
        $dag4 = new DateTime('+10 day');
        $dag5 = new DateTime('+11 day');
        $dag6 = new DateTime('+12 day');
        $dag7 = new DateTime('+13 day');
    } elseif ($_GET["week"] == $week3) {
        $dag1 = new DateTime('+14 day');
        $dag2 = new DateTime('+15 day');
        $dag3 = new DateTime('+16 day');
        $dag4 = new DateTime('+17 day');
        $dag5 = new DateTime('+18 day');
        $dag6 = new DateTime('+19 day');
        $dag7 = new DateTime('+20 day');
    }
} else {
    $dag1 = new DateTime('now');
    $dag2 = new DateTime('+1 day');
    $dag3 = new DateTime('+2 day');
    $dag4 = new DateTime('+3 day');
    $dag5 = new DateTime('+4 day');
    $dag6 = new DateTime('+5 day');
    $dag7 = new DateTime('+6 day');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#4285f4"> <!-- Theme color for Google Chrome -->
    <title>DTV | Dashboard</title>
    <link rel="icon" href="http://example.com/favicon.png"> <!-- Favicon for your site -->

    <!-- Bootstrapp css and js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="css/dashboard.css" type="text/css"> <!-- Dashboard CSS -->
    <link rel="stylesheet" href="../css/baan-reserveren.css" type="text/css"> <!-- Dashboard CSS -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>  <!-- Custom icons from BoxIcons.com CSS -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> <!-- Jquery for the mobile nav -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> <!-- Datatables bootstrapp 5-->
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet"> <!-- Datatables bootstrapp 5 theme-->

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> <!-- Google font Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet"> <!-- Google font Poppins -->
</head>
<body>
<header class="bg-light">
    <a href="index.php" class="link-dark text-decoration-none float-start">
        <span class="fs-4 nameDashboard">Admin dashboard</span>
    </a>

    <div class="mobileHamburgerMenu float-start">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div class="float-end">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownBtn" data-bs-toggle="dropdown" aria-expanded="false">
            <?php if (isset($_SESSION["lidRol"]) && $_SESSION["lidRol"] != "") { ?>
              <?php if ($_SESSION["lidRol"] == "Admin") { ?>
                  Hoi, <?php echo ucfirst($_SESSION["lidName"]);?>
          <?php }}?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownBtn">
                <li><a class="dropdown-item" href="../profiel-gegevens.php">Profiel</a></li>
                <li><a class="dropdown-item" href="../index.php">terug naar leden site</a></li>
            </ul>
        </div>
    </div>

</header>
<main>
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light sidebar">
        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="index.php" class="nav-link link-dark" aria-current="page">
                    <i class='bx bxs-group me-2'></i>
                    <span>Leden overzicht</span>
                </a>
            </li>
            <li>
                <a href="menukaart-overzicht.php" class="nav-link link-dark">
                    <i class='bx bxs-food-menu me-2'></i>
                    <span>Menukaart overzicht</span>
                </a>
            </li>
            <li>
                <a href="toernooi-overzicht.php" class="nav-link link-dark">
                    <i class='bx bx-table me-2'></i>
                    <span>Toernooien overzicht</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="baan-reserveren.php" class="nav-link active" style="width:100%">
                    <i class='bx bxs-calendar-alt me-2'></i>
                    <span>Baan reserveren</span>
                </a>
            </li>
        </ul>
        <span>
            <hr>
           Version 1.0
        </span>
    </div>

    <div class="line">
    </div>

    <div class="content">
        <section class="contentSection">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" style="margin:40px auto;">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Baan Reserveren</h5>
                            </div>
                            <div class="col-md-3 d-flex justify-content-end">
                                <form>
                                    <select class="form-select" name="week" onchange="this.form.submit();">
                                        <?php if (isset($_GET["week"])) {
                                            echo "<option value='" . $_GET["week"] . "'>Week " . $_GET["week"] . "</option>";
                                            echo "<option disabled>-----------------------</option>";
                                        } ?>
                                        <option value="<?php echo $week1 ?>">Week <?php echo $week1 ?></option>
                                        <option value="<?php echo $week2 ?>">Week <?php echo $week2 ?></option>
                                        <option value="<?php echo $week3 ?>">Week <?php echo $week3 ?></option>
                                    </select>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <form>
                                    <select class="form-select" name="baan" onchange="this.form.submit();">
                                        <?php if (isset($_GET["baan"])) {
                                            echo "<option value='" . $_GET["baan"] . "'>Baan " . $_GET["baan"] . " | " . ucfirst($baanGegevens["baan_naam"]) . " </option>";
                                            echo "<option disabled>-----------------------</option>";
                                        } ?>
                                        <option value="1">Baan 1 | Buiten tennis</option>
                                        <option value="2">Baan 2 | Buiten tennis</option>
                                        <option value="3">Baan 3 | Buiten tennis</option>
                                        <option value="4">Baan 4 | Buiten tennis</option>
                                        <option value="5">Baan 5 | Buiten tennis</option>
                                        <option value="6">Baan 6 | binnen squash</option>
                                        <option value="7">Baan 7 | binnen squash</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <hr>

                        <div class="table-responsive">
                            <table class="table table-bordered text-center overflow-auto">
                                <thead>
                                <tr class="bg-light-gray">
                                    <th class="text-uppercase">Tijd</th>

                                    <th class="text-uppercase "><?php echo $dag1->format('Y-m-d'); ?></th>
                                    <th class="text-uppercase "><?php echo $dag2->format('Y-m-d'); ?></th>
                                    <th class="text-uppercase "><?php echo $dag3->format('Y-m-d'); ?></th>
                                    <th class="text-uppercase "><?php echo $dag4->format('Y-m-d'); ?></th>
                                    <th class="text-uppercase "><?php echo $dag5->format('Y-m-d'); ?></th>
                                    <th class="text-uppercase "><?php echo $dag6->format('Y-m-d'); ?></th>
                                    <th class="text-uppercase "><?php echo $dag7->format('Y-m-d'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="align-middle">12:00</td>
                                    <?php

                                    $dagLoop = 0;
                                    for ($i = 0; $i <= 6; $i++) {
                                        $dagLoop++;

                                        $newDate = ${"dag$dagLoop"}->format('Y-m-d');

                                        $reserveringenSql = $con->prepare("SELECT * FROM reservering WHERE reserveer_tijd = '12:00:00' AND baan_id = :baanID");
                                        $reserveringenSql->bindParam(":baanID", $baan);
                                        $reserveringenSql->execute();
                                        $reserveringenResult = $reserveringenSql->fetch();

                                        if (isset($reserveringenResult["reserveer_datum"]) && isset($reserveringenResult["reserveer_tijd"])) {
                                            if ($reserveringenResult["reserveer_datum"] == $newDate && $reserveringenResult["reserveer_tijd"] == "12:00:00") { ?>
                                                <td>
                                                    <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                                    <div class="margin-10px-top font-size14">12:00-12:30</div>
                                                    <div class="font-size13 text-light-gray">Gereserveerd door lid</div>
                                                </td>
                                            <?php } else { ?>
                                                <td>
                                                    <a style="cursor:pointer; text-decoration: none" data-bs-toggle="modal" data-bs-target="#adminReserveerModal" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                                    <div class="margin-10px-top font-size14">12:00-12:30</div>
                                                    <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                                </td>
                                            <?php  }  ?>
                                        <?php  } else { ?>
                                            <td>
                                                <a href="actions/baan-reserveren.php?tijd=12:00&&datum=<?php echo ${"dag$dagLoop"}->format('Y-m-d'); ?>&&baan=<?php echo $baan ?>" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</a>
                                                <div class="margin-10px-top font-size14">12:00-12:30</div>
                                                <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                            </td>
                                        <?php } } ?>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


</main>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="js/mobileNav.js"></script>
<script>
    $(function (){
        $('#dataUserTable').DataTable();
    });

</script>

</body>
</html>