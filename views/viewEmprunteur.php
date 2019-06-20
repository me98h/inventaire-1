<?php
  function getLink($no_emp_pr, $nom){
    $link = "'./index.php?url=emprunteur&no_emp=".$no_emp_pr."&nom=".$nom."'";
    return $link;
  }

  function getColor($is_chef){
    $color = "";
    if($is_chef == 1){
      $color = "class='table-primary'";
    }
    return $color;
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <title>Inventaire_UCP</title>
        <style type="text/css">
        	table{
        		text-align: center;
        		border:2px solid black;
        	}
        	.table_pret{
        		width: 15cm;
            height: 10cm;
            overflow: auto;
            margin-left: 12.5cm;
            margin-top: 1cm;
        	}

            table tr[data-href] {
                cursor: pointer;
            }
            table th{
            	font-size: 14px;
            }
            .footer {
              margin-top: 1%;
              background-color: #f5f5f5;
              text-align: center;
            }
            #bg { 
  
              background-image: url("images/image_de_fond.jpg");
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
            }
           .gou_enc{
                width: 15cm;
                margin: auto;
                margin-top: 0.5cm;
                margin-bottom: 2cm;
            }
           .gou_enc_g{
                width: 15cm;
                float: left;
                margin-top: 0.5cm;
                margin-bottom: 2cm;
                margin-left: 1cm;
            }
          .table_etu{
            float: right;
            height: 10cm;
            margin-top: 0.5cm;
            overflow: auto;
            margin-right: 1cm;
          }
        </style>
        <script type="text/javascript">
			$(document).ready( function () {
				$('#tab_mat').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        });
			} );
            
            $(document).ready(function(){
                $('*[data-href]').click(function(){
                    window.location = $(this).data('href');
                    return false;
                });
            });            
        </script>
    </head>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">L'outil Inventaire</a>
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
              <a class="nav-link" href="models/contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>    
    <body class="panel-group" id="bg">
        <h1 class="display-4" style="margin-top: 3cm; margin-bottom: 1cm; text-align: center;">Emptunteur <?= $nom ?></h1>
        <h2 style="text-decoration:underline black ;font-family: sans-serif; padding: 0.5cm;">Informations : </h2>
        <?php if($emprunteur->type_emp()->is_etu() || $emprunteur->type_emp()->is_ens()){ ?>
          <div class='gou_enc'>
            <?php if($emprunteur->type_emp()->is_etu()){ ?>
                <h2 style="margin-bottom: 1cm;">Informations sur l'etudiant :</h2>
            <?php }else{ ?>
                <h2 style="margin-bottom: 1cm;">Informations sur l'enseignant :</h2>
            <?php } ?>
            <table class='table table-hover' class='display'>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Mail</th>
                        <?php if($emprunteur->type_emp()->is_etu()){ ?>
                          <th>Niveau</th>
                          <th>N° étudiant</th>
                        <?php }else{ ?>
                          <th>Fonction</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                  <tr class='table-secondary'>
                      <td><?= $emprunteur->type_emp()->nom() ?></td>
                      <td><?= $emprunteur->type_emp()->prenom() ?></td>
                      <td><?= $emprunteur->type_emp()->mail() ?></td>
                      <?php if($emprunteur->type_emp()->is_etu()){ ?>
                        <td><?= $emprunteur->type_emp()->niveau() ?></td>
                        <td><?= $emprunteur->type_emp()->num_etu() ?></td>
                      <?php }else{ ?>
                        <td><?= $emprunteur->type_emp()->_function() ?></td>
                      <?php } ?>
                  </tr>
              </tbody>
            </table>
          </div>
        <?php }else{ ?>
          <div class='gou_enc_g'>
            <h2 style="margin-bottom: 1cm;">Informations sur l'encadrant :</h2>
            <table class='table table-hover' class='display'>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Mail</th>
                        <th>Fonction</th>
                    </tr>
                </thead>
                <tbody>
                  <tr class='table-secondary'>
                      <td><?= $emprunteur->type_emp()->encadrant()->nom() ?></td>
                      <td><?= $emprunteur->type_emp()->encadrant()->prenom() ?></td>
                      <td><?= $emprunteur->type_emp()->encadrant()->mail() ?></td>
                      <td><?= $emprunteur->type_emp()->encadrant()->_function() ?></td>
                  </tr>
              </tbody>
            </table>
          </div>

       <div class='table_etu'>
            <h2 style="margin-bottom: 1cm;">Membres du groupe :</h2>
            <table class='table table-hover' class='display'>
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Mail</th>
                    <th>Niveau</th>
                    <th>N° d'étudiant</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($emprunteur->type_emp()->goupe_etu() as $etu): ?>
                        <tr <?= getColor($etu->is_chef()) ?> data-href=<?= getLink($etu->no_emp(), $etu->nom()) ?>>
                            <td><?= $etu->nom() ?></td>
                            <td><?= $etu->prenom() ?></td>
                            <td><?= $etu->mail() ?></td>
                            <td><?= $etu->niveau() ?></td>
                            <td><?= $etu->num_etu() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php } ?>
        <div class='table_pret'>
            <h2 style="margin-bottom: 1cm;">Liste des prêts effectués :</h2>
            <table id='tab_mat' class='table table-hover' class='display'>
                <thead>
                    <tr>
                        <th>Numero du pret</th>
                        <th>Date debut</th>
                        <th>Date prevue</th>
                        <th>Date fin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($emprunteur->prets() as $pret): ?>
                        <tr class='table-white'>
                            <td><?= $pret->no_pr() ?></td>
                            <td><?= $pret->date_debut() ?></td>
                            <td><?= $pret->date_prevue() ?></td>
                            <td><?= $pret->date_fin() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php if($emprunteur->type_emp()->is_etu()){ ?>
          <?php if (empty($emprunteur->type_emp()->groupes())) { ?>
            <h1 style="text-align: center;" class="display-4">Cet étudiant n'appartient à aucun groupe.</h1>
          <?php }else{ ?>
          <div style="width: 7cm; text-align: center; margin: auto;">
            <ul class="list-group">
              <li class="list-group-item list-group-item-dark">Liste de groupes :</li>
              <?php foreach ($emprunteur->type_emp()->groupes() as $groupes): ?>
                  <li class="list-group-item list-group-item-light"><?= $groupes ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <?php } ?>
        <?php } ?>
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