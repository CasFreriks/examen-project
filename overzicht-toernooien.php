<?php 
include('db/dbconfig.php');

$db = new Dbh();
$pdo = $db->connect();

$queryToernooi = "SELECT * FROM toernooien";
$sth = $pdo->prepare($queryToernooi);
$sth->execute();
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/profiel.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> <!-- Jquery for the mobile nav -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet"/>

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>  <!-- Custom icons from BoxIcons.com CSS -->

    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet"> <!-- Datatables bootstrapp 5 theme-->
    <title>DTV | Overzicht toernooien</title>
</head>
<body>
    <?php include('shared/nav.php') ?>

    <div class="container">
        <form class="editGegevens">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="menu-lijst">
                        <div>
                            <ul>
                                <li><a href="profiel-gegevens.php">Profielgegevens</a></li>
                                <li><a href="overzicht-toernooien.php">Overzicht toernooien</a></li>
                                <li><a href="gereserveerd-door-mij.php">Gereserveerd door mij</a></li>
                                <li><a href="index.php">Uitloggen</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Toernooien overzicht</h5>
                        </div>

                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="dataUserTable" class="table table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Toernooi naam</th>
                                <th>Aantal deelnemers (max 32)</th>
                                <th>Van / tot</th>
                                <th>Toernooi datum</th>
                                <th>Toernooi deadline</th>
                                <th>Wijzigen</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            <?php
                            foreach ($data as $toernooiRow) {

                            $toernooiDatum = $toernooiRow["toernooi_datum"];
                            $changeToernooiDatum = date("d-m-Y", strtotime($toernooiDatum));

                            $toernooiDeadline = $toernooiRow["toernooi_deadline"];
                            $ChangeToernooiDeadline = date("d-m-Y", strtotime($toernooiDeadline));
                                ?>


                                <td><?php echo $toernooiRow['toernooi_id'] ?></td>
                                <td><?php echo $toernooiRow['toernooi_naam'] ?></td>
                                <td><?php echo $toernooiRow['toernooi_deelnemers'] ?> / 32</td>
                                <td><?php echo $toernooiRow['toernooi_begintijd'] ?> : <?php echo $toernooiRow['toernooi_eindtijd'] ?></td>
                                <td><?php echo $changeToernooiDatum ?></td>
                                <td style="color:red"><?php echo $ChangeToernooiDeadline ?></td>
                                <td><a href="#" class="btn btn-danger">Verlaten</a></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
<?php include('shared/footer.php') ?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(function (){
        $('#dataUserTable').DataTable();
    });
</script>

</body>