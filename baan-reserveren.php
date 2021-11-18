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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> <!-- Jquery for the mobile nav -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet"/>

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>  <!-- Custom icons from BoxIcons.com CSS -->

    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet"> <!-- Datatables bootstrapp 5 theme-->

    <title>DTV | Baan reserveren</title>
</head>
<body>

<?php include('shared/nav.php') ?>


<div class="container-fluid">
    <div class="container contentUnder">
        <div class="row">
            <div class="col-md-6">
                <p>Je kan maar 1 uur per dag reserveren en maar 7 dagen vooruit kijken.</p>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <form>
                    <select class="form-select">
                        <option>Baan 1 | Buiten tennis</option>
                        <option>Baan 2 | Buiten tennis</option>
                        <option>Baan 3 | Buiten tennis</option>
                        <option>Baan 4 | Buiten tennis</option>
                        <option>Baan 5 | Buiten tennis</option>
                        <option>Baan 6 | binnen squash</option>
                        <option>Baan 7 | binnen squash</option>
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
                    <th class="text-uppercase">Maandag</th>
                    <th class="text-uppercase">Dinsdag</th>
                    <th class="text-uppercase">Woensdag</th>
                    <th class="text-uppercase">Donderdag</th>
                    <th class="text-uppercase">Vrijdag</th>
                    <th class="text-uppercase">Zaterdag</th>
                    <th class="text-uppercase">Zondag</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="align-middle">12:00</td>
                    <td>
                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                        <div class="margin-10px-top font-size14">12:00-13:00</div>
                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                    </td>
                    <td>
                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                        <div class="margin-10px-top font-size14">12:00-13:00</div>
                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                    </td>

                    <td>
                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                        <div class="margin-10px-top font-size14">12:00-13:00</div>
                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                    </td>
                    <td>
                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                        <div class="margin-10px-top font-size14">12:00-13:00</div>
                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                    </td>
                    <td>
                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                        <div class="margin-10px-top font-size14">12:00-13:00</div>
                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                    </td>
                    <td>
                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                        <div class="margin-10px-top font-size14">12:00-13:00</div>
                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                    </td>
                    <td>
                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                        <div class="margin-10px-top font-size14">12:00-13:00</div>
                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                    </td>
                </tr>

                <tr>
                    <td class="align-middle">13:00</td>
                    <td>
                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                        <div class="margin-10px-top font-size14">13:00-14:00</div>
                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                    </td>
                    <td>
                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                        <div class="margin-10px-top font-size14">13:00-14:00</div>
                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                    </td>
                    <td>
                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                        <div class="margin-10px-top font-size14">13:00-14:00</div>
                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                    </td>
                    <td>
                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                        <div class="margin-10px-top font-size14">13:00-14:00</div>
                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                    </td>
                    <td>
                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                        <div class="margin-10px-top font-size14">13:00-14:00</div>
                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                    </td>
                    <td>
                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                        <div class="margin-10px-top font-size14">13:00-14:00</div>
                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                    </td>
                    <td>
                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                        <div class="margin-10px-top font-size14">13:00-14:00</div>
                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                    </td>
                </tr>

                <tr>
                    <td class="align-middle">14:00</td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>

                <tr>
                    <td class="align-middle">15:00</td>
                    <td class="bg-light-gray">

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td class="bg-light-gray">

                    </td>
                    <td>

                    </td>
                </tr>

                <tr>
                    <td class="align-middle">16:00</td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td class="bg-light-gray">

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td class="align-middle">17:00</td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td class="bg-light-gray">

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td class="align-middle">18:00</td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td class="bg-light-gray">

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td class="align-middle">19:00</td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td class="bg-light-gray">

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td class="align-middle">20:00</td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td class="bg-light-gray">

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td class="align-middle">21:00</td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td class="bg-light-gray">

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td class="align-middle">22:00</td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td class="bg-light-gray">

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
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