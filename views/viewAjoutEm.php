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
  <title>ajouter emprunteur</title>
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
            toggleFields();
            toggleForm(); // call this first so we start out with the correct visibility depending on the selected form values
            // this will call our toggleFields function every time the selection value of our other field changes
            $("#nbr_membre").change(function () {
                toggleFields();
            });
            $("#tform").change(function () {
                toggleForm();
            });
        });
        // this toggles the visibility of other server
        function toggleFields() {
             if ($("#nbr_membre").val() == "1"){
                $("#util1").show();
                $("#util2").hide();
                $("#util3").hide();
            }
            else if($("#nbr_membre").val() == "2"){
                $("#util1").show();
                $("#util2").show();
                $("#util3").hide();
            }
            else if($("#nbr_membre").val() == "3"){
                $("#util1").show();
                $("#util2").show();
                $("#util3").show();
            } 
        }
        function toggleForm() {
            if ($("#tform").val() == "personne")
                $("#personne").show();

            else
                $("#personne").hide();

            if($("#tform").val() == "groupe")
                $("#groupe").show();

            else
                $("#groupe").hide();
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
                <li class="nav-item">
                    <a class="nav-link" href="index.php?url=ajout">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<body class="panel-group" id="bg">
  <div class="container" style="margin-top: 3cm;">
  <h1 class="display-4" style="margin-bottom: 2cm; text-align: center;">Ajout d'un emprunteur</h1>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">ajouter emprunteur</div>
      <div class="card-body">
          <form action="index.php?url=ajoutEm" method="POST">
              <div class="row form-group">
              <div class="col-5">
                        <select class="form-control" name="tfrom" id ="tform">
                            <option value="personne">personne</option>
                            <option value="groupe">groupe</option>
                        </select>
              </div>
              <div class="col-5">
                        <select class="form-control" name="est" id ="est">
                            <option value="etudiant">etudiant</option>
                            <option value="prof">enseignant</option>
                        </select>
              </div>
              <div class="form-group" id="personne">
                            <div class="col-10"  id="nom_personne">
                                    <label for="nom_personne"> nom personne</label>
                                    <input type="text" class="form-control"  placeholder="nom_personne" name="nom_personne">
                            </div>
                        <div class="col-10"  id="prenom_personne">
                            <label for="prenom_enseignant"> prenom personne</label>
                            <input type="text" class="form-control"  placeholder="prenom_personne" name="prenom_personne">
                        </div>
                        <div class="col-10"  id="email_personne">
                            <label for="prenom_personne"> email personne</label>
                            <input type="text" class="form-control"  placeholder="email_personne" name="email_personne">
                        </div>
              </div>

              <div id="groupe" class="form_groupe">

                        <div class="col-10">
                            <label for="nom_groupe">nom groupe</label>
                            <input type="text" class="form-control"  placeholder="nom_groupe" name="nom_groupe">
                            </div>
                            <div class="col-10">
                        <label for="categorie">nombre de membres du groupe</label>
                                    <select class="form-control" name="nbr_membre" id ="nbr_membre">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                        </div>
                        <div id="util1" class="col-10">
                                <div class="col-10">
                                    <label for="nom_emprunteur">nom personne</label>
                                    <input type="text" class="form-control"  placeholder="nom_emprunteur1" name="nom_emprunteur1">
                                </div>
                                <div class="col-10">
                                    <label for="prenom_emprunteur"> prenom personne</label>
                                    <input type="text" class="form-control"  placeholder="prenom_emprunteur1" name="prenom_emprunteur1">
                                </div>
                                <div class="form-check">
                                        <input type="checkbox" name="est_chef1" class="form-check-input" id="est_chef" value="Yes">
                                        <label class="form-check-label" for="est_chef">est chef</label>
                                </div>
                        </div>
                            <div id="util2" class="col-10">
                                <div class="col-10">
                                    <label for="nom_emprunteur">nom personne</label>
                                    <input type="text" class="form-control"  placeholder="nom_emprunteur2" name="nom_emprunteur2">
                                </div>
                                <div class="col-10">
                                    <label for="prenom_emprunteur"> prenom personne</label>
                                    <input type="text" class="form-control"  placeholder="prenom_emprunteur2" name="prenom_emprunteur2">
                                </div>
                                <div class="form-check">
                                        <input type="checkbox" name="est_chef2" class="form-check-input" id="est_chef" value="Yes">
                                        <label class="form-check-label" for="est_chef">est chef</label>
                                </div>
                            </div>
                            <div id="util3" class="col-10">
                                <div class="col-10">
                                    <label for="nom_emprunteur">nom personne</label>
                                    <input type="text" class="form-control"  placeholder="nom_emprunteur3" name="nom_emprunteur3">
                                </div>
                                <div class="col-10">
                                    <label for="prenom_emprunteur"> prenom personne</label>
                                    <input type="text" class="form-control"  placeholder="prenom_emprunteur3" name="prenom_emprunteur3">
                                </div>
                                <div class="form-check">
                                        <input type="checkbox" name="est_chef3" class="form-check-input" id="est_chef" value="Yes">
                                        <label class="form-check-label" for="est_chef">est chef</label>
                                </div>
                            </div>
                        
                            <div class="col-10">
                                <label for="encadrant">nom encadrant</label>
                                <input type="text" class="form-control"  placeholder="nom_encadrant" id="encadrant" name="nom_encadrant">
                            </div>
                            <div class="col-10">
                                <label for="encadrant"> prenom encadrant</label>
                                <input type="text" class="form-control"  placeholder="prenom_encadrant" id="encadrant" name="prenom_encadrant">
                            </div>
              </div>
              
              
              
                  <div class="form-groupe" class="col-10">
                      <label for="code_barre">code barre</label>
                      <input type="text" class="form-control"  placeholder="code barre" name="code_barre" required>
                  </div>
              <div  class="form-groupe" class="col-10">
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
    
    

