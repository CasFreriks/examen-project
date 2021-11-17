<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/login.css">

    <link rel="stylesheet" href="https://mdbootstrap.com/snippets/styles.0839c4d26bba6648d360.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"  rel="stylesheet"   />
    <title>DTV | Login</title>
</head>
<body>
<?php include('shared/nav.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="loginEnRegistreerPaneel">
                <h5>Wachtwoord resetten</h5>
                <p>Hier kunt u een nieuw wachtwoord invullen</p>
                <form>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <input type="password" placeholder="Nieuw wachtwoord" class="form-control" required>
                            <input type="password" placeholder="Wachtwoord herhalen" class="form-control" required>
                        </div>
                    </div>
                    <button class="btn btn-primary">Wachtwoord veranderen</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('shared/footer.php') ?>
</body>
</html>
