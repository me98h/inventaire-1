<!DOCTYPE html>
<html lang="fr_FR">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ajouter materiel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link href="../libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

  <div class="container">
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
                        <select class="form-control" name="categorie">
                        <option value="Ordi">ordinateur</option>
                        <option value="else">autres</option>
                </select>

                    
                    
              </div>
                  <div class="col-5">
                    <label for="num_serie">numero de serie</label>
                    <input type="text" class="form-control"  placeholder="numero de serie" name="num_serie" required>
                  </div>
                  </div>
                  <div class="col-5">
                    <label for="num_serie">quantite</label>
                    <input type="text" class="form-control"  placeholder="quantite" name="quantite" required>
                  </div>
              </div>
              <div class="form-group">
                  <input type="submit" class="btn btn-primary form-control" value="Submit" name="submit" />
              </div>
          </form>
      </div>
    </div>
  </div>

  <script src="libs/jquery/jquery.min.js"></script>
  <script src="libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="libs/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
    
    

