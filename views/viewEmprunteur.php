<?php
  function getLink($no_pret, $no_emp_pr, $nom){
    $link = "'index.php?url=info_pret&pret".$no_pret."=&no_emp_pr=".$no_emp_pr."&nom_emp=".$nom."'";
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
        		float: right;
        		margin-top: 0.5cm;
            height: 5cm;
            overflow: auto;
            margin-right: 4cm;
        	}

            table tr[data-href] {
                cursor: pointer;
            }
            table th{
            	font-size: 14px;
            }
            #bg { 
  
              background-image: url("images/image_de_fond.jpg");
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
            }
           .gou_enc{
                text-align: center;
                width: 8cm;
                margin: auto;
                margin-top: 2cm;
            }
           .gou_enc_g{
                text-align: center;
                width: 8cm;
                float: left;
                margin-top: 0.5cm;
                margin-bottom: 2cm;
                margin-left: 4cm;
            }
          .table_etu{
            width: 30cm;
            margin: auto;
          }
        </style>
        <script type="text/javascript">
			$(document).ready( function () {
				$('#tab_mat').DataTable();
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
                    <a class="nav-link" href="index.php?url=ajout">Admin</a>
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
        <p style="text-align: center; color: black; margin-left: 3cm; margin-right: 5cm;"><strong>Ce tableau permet d'afficher tout les prets effectués par l'emprunteur séléctionnée tout en précisant les dates représentent le pret. Ainsi toutes les informations de l'encadrant quand il s'agit d'un groupe, Informations de l'enseigant ou l'étudiant. Enfin les information des membres du groupe. Tour cela est affiché en dessous du tableau.</strong></p>
        <div class='table_pret'>
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
                        <tr class='table-white' data-href=<?= getLink($pret->no_pr(), $emprunteur->no_emp(), $nom) ?>>
                            <td><?= $pret->no_pr() ?></td>
                            <td><?= $pret->date_debut() ?></td>
                            <td><?= $pret->date_prevue() ?></td>
                            <td><?= $pret->date_fin() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php if($emprunteur->type_emp()->is_etu() || $emprunteur->type_emp()->is_ens()){ ?>
          <div class='gou_enc'>
            <ul class='list-group'>
              <li class='list-group-item active'>Nom: <?= $emprunteur->type_emp()->nom() ?></li>
              <li class='list-group-item'>Prénom: <?= $emprunteur->type_emp()->prenom() ?></li>
              <li class='list-group-item'>Mail: <?= $emprunteur->type_emp()->mail() ?></li>
              <?php if($emprunteur->type_emp()->is_etu()){ ?>
                <li class='list-group-item'>Niveau: <?= $emprunteur->type_emp()->niveau() ?></li>
                <li class='list-group-item'>N° étudiant: <?= $emprunteur->type_emp()->num_etu() ?></li>
              <?php }else{ ?>
                <li class='list-group-item'>Fonction: <?= $emprunteur->type_emp()->_function() ?></li>
              <?php } ?>
            </ul>
          </div>
        <?php }else{ ?>
          <div class='gou_enc_g'>
            <ul class='list-group'>
              <li class='list-group-item active'>Nom: <?= $emprunteur->type_emp()->encadrant()->nom() ?></li>
              <li class='list-group-item'>Prénom: <?= $emprunteur->type_emp()->encadrant()->prenom() ?></li>
              <li class='list-group-item'>Mail: <?= $emprunteur->type_emp()->encadrant()->mail() ?></li>
              <li class='list-group-item'>Fonction: <?= $emprunteur->type_emp()->encadrant()->_function() ?></li>
            </ul>
          </div>

       <div class='table_etu'>
            <table id='tab_mat' class='table table-hover' class='display'>
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
                        <tr <?= getColor($etu->is_chef()) ?>>
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
	  </body>
</html>