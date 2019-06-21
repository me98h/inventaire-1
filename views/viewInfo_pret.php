<?php
    require_once('fpdf/MyPDF.php');

    if(isset($_POST['generate'])){
        $pdf = new MyPDF('L');
        $pdf->AliasnbPages();
        $pdf->AddPage('L', 'A4', 0);
        $pdf->headerTable2($nom, $prenom);
        $pdf->viewTable2($pret);
        $pdf->Output();
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
        		width: 30cm;
        		margin: auto;
        		height: 10cm;
        		overflow: auto;
        		margin-top: 0.5cm;
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
        <h1 class="display-4" style="margin-top: 3cm; margin-bottom: 1cm; text-align: center;">Informations du prêt</h1>
        <div style='margin-left: 5cm;' class='text-left'>
            <h2 class='font-weight-bold' style="text-decoration:underline black;"><a style="text-decoration: none; color: inherit;" href=<?= $link ?>><?= $nom ?></a></h2>
        </div>
        <form action="#" method="post" style="position: absolute; margin-left: 18cm;">
              <button type="submit" class="btn btn-primary" name="generate">Génerer en PDF</button>
        </form>
        <div class='table_pret' style="margin-top: 2cm;">
            <table id='tab_mat' class='table table-hover' class='display'>
                <thead>
                    <tr>
                        <th>Numero du matériel</th>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Code barre</th>
                        <th>Numéro de série</th>
                        <th>Quantité</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($information_pret as $info): ?>
                        <tr>
                            <td><?= $info->no_mat() ?></td>
                            <td><?= $info->nom() ?></td>
                            <td><?= $info->categorie() ?></td>
                            <td><?= $info->code_barre() ?></td>
                            <td><?= $info->num_serie() ?></td>
                            <td><?= $info->quantite() ?></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
	</body>
</html>