<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/login.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> <!-- Jquery for the mobile nav -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet"/>

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>  <!-- Custom icons from BoxIcons.com CSS -->

    <title>DTV | Login en registreren</title>
</head>
<body>
<?php include('shared/nav.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="loginEnRegistreerPaneel">
                <h5>Login</h5>
                <form>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <input type="email" placeholder="E-mailadres" class="form-control">
                        </div>
                        <div class="col-md-8">
                            <input type="password" placeholder="Wachtwoord" class="form-control">
                            <a href="wachtwoord-vergeten.php">Wachtwoord vergeten?</a>
                        </div>
                    </div>
                    <button class="btn btn-primary"><a href="profiel-gegevens.php">Login</a></button>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="loginEnRegistreerPaneel">
                <h5>Registreer</h5>
                <form>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <input type="text" placeholder="Achternaam" class="form-control">
                        </div>
                        <div class="col-md-8">
                            <input type="email" placeholder="E-mailadres" class="form-control">
                        </div>
                        <div class="col-md-8">
                            <input type="password" placeholder="Wachtwoord" class="form-control">
                        </div>
                        <div class="col-md-8">
                            <input type="number" placeholder="Leden nummer" class="form-control">
                        </div>
                    </div>

                    <button class="btn btn-primary">Registreer</button>

            </div>
        </div>
    </div>
</div>


<?php include('shared/footer.php') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
</body>
</html>
