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

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>  <!-- Custom icons from BoxIcons.com CSS -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> <!-- Jquery for the mobile nav -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> <!-- Datatables bootstrapp 5-->
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet"> <!-- Datatables bootstrapp 5 theme-->

    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">

    <link rel="stylesheet" href="https://mdbootstrap.com/snippets/styles.0839c4d26bba6648d360.css">

</head>
<body>

<?php include('shared/nav.php') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10" style="margin:100px auto;">
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
                        <td>1</td>
                        <td><a href="toernooi-deelnemers.php">Herfst toernooi</a></td>
                        <td>15 / 32</td>
                        <td>15:00 tot 18:00</td>
                        <td>20-11-2021</td>
                        <td style="color:red">25-11-2021</td>
                        <td><a href="#" class="btn btn-primary">Deelnemen</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('shared/footer.php') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(function (){
        $('#dataUserTable').DataTable();
    });

</script>

</body>
</html>