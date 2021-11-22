<?php
include('../db/dbconfig.php');

$db = new Dbh();
$pdo = $db->connect();

$queryLid = "SELECT * FROM lid";

$queryLidDone = $pdo->query($queryLid);

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
                John Doe
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownBtn">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Log out</a></li>
            </ul>
        </div>
    </div>

</header>
<main>
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light sidebar">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="index.php" class="nav-link active" style="width:100%" aria-current="page">
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
            <li>
                <a href="baan-reserveren.php" class="nav-link link-dark">
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
                                <h5>Leden overzicht</h5>
                            </div>
                            <div class="col-md-6">
                                <a href="lid-toevoegen.php" class="btn btn-primary" style="float:right;">Lid toevoegen</a>
                            </div>
                        </div>
                        <hr>

                        <div class="table-responsive">
                            <table id="dataUserTable" class="table table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Voornaam</th>
                                    <th>Tussenvoegsel</th>
                                    <th>Achternaam</th>
                                    <th>E-mail</th>
                                    <th>Leden nummer</th>
                                    <th>Rol</th>
                                    <th>Wijzigen</th>
                                    <th>Verwijderen</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                <?php foreach($queryLidDone as $lidRow) { ?>
                                <tr>
                                    <td><?php echo $lidRow['lid_id'] ?></td>
                                    <td><?php echo $lidRow['lid_vnaam'] ?></td>
                                    <td><?php echo $lidRow['lid_tvoegsel'] ?></td>
                                    <td><?php echo $lidRow['lid_anaam'] ?></td>
                                    <td><?php echo $lidRow['lid_email'] ?></td>
                                    <td><?php echo $lidRow['lid_nr'] ?></td>
                                    <td><?php echo $lidRow['lid_rol'] ?></td>
                                    <td><a href="leden-wijzigen.php?id=<?php echo $lidRow['lid_id'] ?>" class="btn btn-secondary">Wijzigen</a></td>
                                    <td><a href="../actions/lid-verwijderen.php?lid_id=<?php echo $lidRow['lid_id'];?>" class="btn btn-danger">Verwijderen</a></td>
                                    <?php } ?>
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