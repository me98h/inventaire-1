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
        		width: 20cm;
        		margin: auto;
        		height: 10cm;
        		overflow: auto;
        		margin-top: 7cm;
        	}

            table tr[data-href] {
                cursor: pointer;
            }
        </style>
        <script type="text/javascript">
			$(document).ready( function () {
				$('#tab_pr').DataTable();
			} );
            
            $(document).ready(function(){
                $('*[data-href]').click(function(){
                    window.location = $(this).data('href');
                    return false;
                });
            });            
        </script>
    </head>
    <body class="panel-group">
		<div class='table_pret'>
            <table id='tab_pr' class='table table-hover' class='display'>
            <thead>
                <tr>
                    <th>numero du pret</th>
                    <th>nom</th>
                    <th>date debut</th>
                    <th>statut</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($prets as $pret): ?>
                <tr class=<?= $pret->couleur() ?> data-href=<?= $pret->getURL() ?>>
                    <td><?= $pret->no_pret() ?></td>
                    <td><?= $pret->nom() ?></td>
                    <td><?= $pret->date_debut() ?></td>
                    <td><?= $pret->statut() ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
        </div>
	</body>
</html>