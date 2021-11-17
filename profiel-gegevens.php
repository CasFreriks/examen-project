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
    <link rel="stylesheet" href="css/profiel.css">

    <link rel="stylesheet" href="https://mdbootstrap.com/snippets/styles.0839c4d26bba6648d360.css">
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
            rel="stylesheet"
    />
    <title>Document</title>
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
                  <li><a href="#">Profielgegevens</a></li>
                  <li><a href="#">Banen reservatie</a></li>
                  <li><a href="#">Inschrijven toernooien</a></li>
                  <li><a href="#">Uitloggen</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <h4>Profiel info</h4>
                <input type="text" placeholder="Voornaam..." value="" name="edit-naam" class="form-control">
                <input type="text" placeholder="Tussenvoegsel..." value="" name="edit-tusv" class="form-control">
                <input type="text" placeholder="Achternaam..." value="" name="edit-achternaam" class="form-control">
                <input type="email" placeholder="Email..." value="" name="edit-email" class="form-control">
                <input type="password" placeholder="Wachtwoord..." value="" name="edit-password" class="form-control">
                 <button class="btn btn-primary">Bijwerken</button>
          </div>
        </div>
      </form>
    </div>
 

    <?php include('shared/footer.php') ?>
</body>
</html>
