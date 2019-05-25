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
        
	</body>
</html>