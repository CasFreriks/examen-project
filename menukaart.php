<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> <!-- Jquery for the mobile nav -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet"/>

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>  <!-- Custom icons from BoxIcons.com CSS -->

    <title>DTV | Login</title>
</head>
<body>
<?php include('shared/nav.php') ?>

<div class="container contentUnder">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-end">
            <div class="btn btn-primary float-right">Menu weergeven op volledig scherm</div>
        </div>
    </div>
  <div class="row">
    <div class="col-md-6">
       <h4>Snacks</h4>
        <hr>

       <p>Frikandel €1,75</p>
       <p>Kroket €2,00</p>
    </div>
    <div class="col-md-6">
        <h4>Drankjes</h4>
        <hr>
        <p>Cola €1,50</p>
        <p>Fanta €1,50</p>
    </div>
  </div>
</div>



<?php include('shared/footer.php') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
<script>
    $(".btn").on("click", function (){
        document.documentElement.requestFullscreen();
    });
</script>
</body>
</html>