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
              <a class="nav-link" href="#">A propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>    
    <body class="panel-group" id="bg">
        
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