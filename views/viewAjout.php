<!DOCTYPE html>
<html lang="fr_FR">
<head>
<style type="text/css">
        .footer {
            margin-top: 5cm;
            background-color: #f5f5f5;
            text-align: center;
        }
        #bg {
            background-image: url("images/image_de_fond.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ajouter materiel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link href="../libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>‌​
    <script>
        $(document).ready(function () {
            toggleFields(); // call this first so we start out with the correct visibility depending on the selected form values
            // this will call our toggleFields function every time the selection value of our other field changes
            $("#categorie").change(function () {
                toggleFields();
            });
        });
        // this toggles the visibility of other server
        function toggleFields() {
            if ($("#categorie").val() == "Ordi")
                $("#num_serie").show();
            else
                $("#num_serie").hide();
            if($("#categorie").val() == "else")
                $("#quantite").show();
            else
                $("#quantite").hide();
        }
    </script>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">L'outil Inventaire</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?url=materiel">Materiel</a>
                </li>
                <?php if (isset($_SESSION['pwd'])) {?> 
                <li class="nav-item">
                    <a class="nav-link" href="views/viewAdmin.php">Admin</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<body class="panel-group" id="bg">
  <div class="container" style="margin-top: 3cm;">
  <h1 class="display-4" style="margin-bottom: 2cm; text-align: center;">Ajout d'un matériel</h1>
  <a href="index.php?url=ajoutEm" class="btn btn-info">Ajout Emprunteur</a>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">ajouter objet</div>
      <div class="card-body">
          <form action="index.php?url=ajout" method="POST">
              <div class="row form-group">
                <div class="col-5">
                  <label for="nom_objet">nom objet</label>
                  <input type="text" class="form-control"  placeholder="nom objet" name="nom_objet" required>
                </div>
              
              <div class="col-5">
              <label for="categorie">categorie</label>
                        <select class="form-control" name="categorie" id ="categorie">
                            <option value="else">autres</option>
                            <option value="Ordi">ordinateur</option>
                </select>
                    
                    
              </div>
                  <div class="col-5"  id="num_serie">
                    <label for="num_serie">numero de serie</label>
                    <input type="text" class="form-control"  placeholder="numero de serie" name="num_serie">
                  </div>
              </div>
              <div>
                  <div class="col-5"  id="quantite">
                    <label for="quantite">quantite</label>
                    <input type="text" class="form-control"  placeholder="quantite" name="quantite" >
                  </div>
              </div>
              <input type="hidden" name="size" value="1000000">
                <div>
                <input type="file" name="image">
                </div>
              <div>
                  <div class="col-10">
                      <label for="code_barre">code barre</label>
                      <input type="text" class="form-control"  placeholder="code barre" name="code_barre" required>
                  </div>
              </div>
              <div class="form-group">
                  <input type="submit" class="btn btn-primary form-control" value="Submit" name="submit" />
              </div>
          </form>
      </div>
    </div>
  </div>
</body>
<footer class="footer">
    <div class="container">
        <div class="container">
            <div class="navbar-header">
                <span class="navbar-brand">Université de Cergy Pontoise </span>
            </div>
            <p class="navbar-text navbar-right">L'outil Inventaire de UCP</p>
        </div>
    </div>
</footer>
</html>
    