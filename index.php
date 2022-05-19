<?php
// hier start een session
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> <!-- Jquery for the mobile nav -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet"/>

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>  <!-- Custom icons from BoxIcons.com CSS -->

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>DTV | Home</title>
</head>
<body>
<?php include('shared/nav.php') ?>

<div class="container">
    <section class="hero-img">
        <div class="hero-content">
            <h1>Doetinchemse tennisvereniging</h1>

            <p>tennisvereniging in doetinchem. supermooi en hier kan je erg fijn tennissen</p>

            <?php if(isset($_SESSION["lidID"]) && $_SESSION["lidID"] != "") { ?>
                <a href="actions/uitloggen.php">Log uit</a>
            <?php } else { ?>
                <a class="#" href="login.php">Log in</a>
            <?php } ?>
        </div>
    </section>

    <div class="row">
        <div class="col-md-4">
            <section class="info-box">
                <img src="img/tennis.jpg" draggable="false" alt="tennis">

                <h2>Tennis</h2>

                <p>Bij de Doetinchemse tennisvereniging kunt u op 5 buiten banen tennisen.</p>
            </section>
        </div>
        <div class="col-md-4">
            <section class="info-box">
                <img src="img/squashen.jpg" draggable="false" alt="squashen">

                <h2>Squashen</h2>

                <p>Bij de Doetinchemse tennisvereniging kunt u ook squashen en heeft u toegang tot 2 squashbanen.</p>
            </section>
        </div>
        <div class="col-md-4">
            <section class="info-box">
                <img src="img/cafe.jpg" draggable="false" alt="cafe">

                <h2>Restaurant</h2>

                <p>Bij ons kan je na het sporten ook een hapje en een drankje doen.</p>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <section class="about-us">
                <h2>Over ons</h2>

                <p>
                    Doetinchemse tennisvereniging is een grote gezellige tennis / squash vereniging met leuke toernooien
                    waar je je op kan geven als je lid bent en een restaurant waar je ná of vóór het sporten even langs kan voor een
                    gezellige sfeer en een lekker hapje en drankje.

                    Doetinchemse tennisvereniging is zeer actief in het jeugdtennis en faciliteert hierin waar mogelijk.
                    Ook organiseert DTV jaarlijks terugkerende evenementen met als hoogtepunt het bekende Doetinchemse
                    Dubbel Open toernooi wat traditiegetrouw de laatste week van augustus wordt gehouden.
                </p>

            </section>
        </div>
    </div>
</div>


<?php include('shared/footer.php') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
</body>
</html>