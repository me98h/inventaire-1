<?php
    require_once('fpdf/MyPDF.php');

    if(isset($_POST['generate'])){
        $pdf = new MyPDF();
        $pdf->AliasnbPages();
        $pdf->AddPage('L', 'A4', 0);
        $pdf->headerTable1();
        $pdf->viewTable1();
        $pdf->Output();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
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
        		margin-top: 3cm;
        	}

            table tr[data-href] {
                cursor: pointer;
            }
            .footer {
				  margin-top: 30%;
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
        <script type="text/javascript">
			$(document).ready( function () {
				$('#tab_pr').DataTable({
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
		<div class='table_pret'>
		<h1 class="display-4" style="margin-bottom: 1cm; text-align: center;">Les prêts</h1>
        <form action="#" method="post">
              <button type="submit" class="btn btn-primary" style="margin-bottom: 1cm;" name="generate">Génerer en PDF</button>
        </form>
            <table id='tab_pr' class='table table-hover' class='display'>
            <thead>
                <tr>
                    <th>numero du pret</th>
                    <th>nom</th>
                    <th>date debut</th>
                    <th>date prevu</th>
                    <th>date fin</th>
                    <th>statut</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($prets as $pret): ?>
                <tr class=<?= $pret->couleur() ?> data-href=<?= $pret->getURL() ?>>
                    <td><?= $pret->no_pret() ?></td>
                    <td><img style="margin-right: 10pt;" src=<?= $pret->getIMG() ?> width='30' height='30' alt='grou'><?= $pret->nom() ?></td>
                    <td><?= $pret->date_debut() ?></td>
                    <td><?= $pret->date_prevu() ?></td>
                    <td><?= $pret->date_fin() ?></td>
                    <td><?= $pret->statut() ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
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