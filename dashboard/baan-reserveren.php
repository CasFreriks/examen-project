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
                            <div class="col-md-8">
                                <h5>Baan Reserveren</h5>
                            </div>
                            <div class="col-md-2 d-flex justify-content-end">
                                <form>
                                    <button class="btn btn-primary">De hele dag reserveren</button>
                                </form>
                            </div>
                            <div class="col-md-2">
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
                        <hr>

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
                                        <div class="margin-10px-top font-size14">12:00-12:30</div>
                                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                                    </td>
                                    <td>
                                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                        <div class="margin-10px-top font-size14">12:00-12:30</div>
                                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                                    </td>

                                    <td>
                                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                        <div class="margin-10px-top font-size14">12:00-12:30</div>
                                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                                    </td>
                                    <td>
                                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                        <div class="margin-10px-top font-size14">12:00-12:30</div>
                                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                                    </td>
                                    <td>
                                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                        <div class="margin-10px-top font-size14">12:00-12:30</div>
                                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                                    </td>
                                    <td>
                                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                        <div class="margin-10px-top font-size14">12:00-12:30</div>
                                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                                    </td>
                                    <td>
                                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                        <div class="margin-10px-top font-size14">12:00-12:30</div>
                                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="align-middle">12:30</td>
                                    <td>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                                        <div class="margin-10px-top font-size14">12:30-13:00</div>
                                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                    </td>
                                    <td>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                                        <div class="margin-10px-top font-size14">12:30-13:00</div>
                                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                    </td>
                                    <td>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                                        <div class="margin-10px-top font-size14">12:30-13:00</div>
                                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                    </td>
                                    <td>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                                        <div class="margin-10px-top font-size14">12:30-13:00</div>
                                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                    </td>
                                    <td>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                                        <div class="margin-10px-top font-size14">12:30-13:00</div>
                                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                    </td>
                                    <td>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                                        <div class="margin-10px-top font-size14">12:30-13:00</div>
                                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                    </td>
                                    <td>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                                        <div class="margin-10px-top font-size14">12:30-13:00</div>
                                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="align-middle">13:00</td>
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
                                    <td class="align-middle">13:30</td>
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
                                    <td class="align-middle">14:00</td>
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
                                    <td class="align-middle">14:30</td>
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
                                    <td class="align-middle">15:00</td>
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
                                    <td class="align-middle">15:30</td>
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
                                    <td class="align-middle">16:30</td>
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
                                    <td class="align-middle">17:30</td>
                                    <td>
                                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                        <div class="margin-10px-top font-size14">17:00-17:30</div>
                                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                                    </td>
                                    <td>
                                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                        <div class="margin-10px-top font-size14">17:00-17:30</div>
                                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                                    </td>

                                    <td>
                                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                        <div class="margin-10px-top font-size14">17:00-17:30</div>
                                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                                    </td>
                                    <td>
                                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                        <div class="margin-10px-top font-size14">17:00-17:30</div>
                                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                                    </td>
                                    <td>
                                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                        <div class="margin-10px-top font-size14">17:00-17:30</div>
                                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                                    </td>
                                    <td>
                                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                        <div class="margin-10px-top font-size14">17:00-17:30</div>
                                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                                    </td>
                                    <td>
                                        <span class="bg-warning padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Gereserveerd</span>
                                        <div class="margin-10px-top font-size14">17:00-17:30</div>
                                        <div class="font-size13 text-light-gray">De heer Freriks</div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="align-middle">18:00</td>
                                    <td>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                                        <div class="margin-10px-top font-size14">18:00-18:30</div>
                                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                    </td>
                                    <td>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                                        <div class="margin-10px-top font-size14">18:00-18:30</div>
                                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                    </td>
                                    <td>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                                        <div class="margin-10px-top font-size14">18:00-18:30</div>
                                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                    </td>
                                    <td>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                                        <div class="margin-10px-top font-size14">18:00-18:30</div>
                                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                    </td>
                                    <td>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                                        <div class="margin-10px-top font-size14">18:00-18:30</div>
                                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                    </td>
                                    <td>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                                        <div class="margin-10px-top font-size14">18:00-18:30</div>
                                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                    </td>
                                    <td>
                                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Reserveer</span>
                                        <div class="margin-10px-top font-size14">18:00-18:30</div>
                                        <div class="font-size13 text-light-gray">Reserveerbaar</div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="align-middle">18:30</td>
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
                                    <td class="align-middle">19:00</td>
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
                                    <td class="align-middle">19:30</td>
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
                                    <td class="align-middle">20:30</td>
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
                                    <td class="align-middle">21:30</td>
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
                                <tr>
                                    <td class="align-middle">22:30</td>
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