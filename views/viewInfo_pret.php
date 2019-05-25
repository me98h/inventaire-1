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
    <body>
        <div style='margin-top: 5cm; margin-left: 5.3cm;' class='text-left'>
            <p class='font-weight-bold'>Ce pret a été éffectué par <a href=<?= $link ?>><?= $nom ?></a> , veuillez cliquer sur le nom pour afficher les details de cet emprunteur  </p>
        </div>
        <div class='table_pret'>
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
                        <tr class=<?= $info->getCouleur() ?>>
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