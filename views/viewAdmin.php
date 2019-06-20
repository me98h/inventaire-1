<?php
        ob_start();
        system('ipconfig /all');
        $mycom=ob_get_contents();
        ob_clean();
            
        $findme = 'physique';
        $pmac = strpos($mycom, $findme);
        $mac=substr($mycom,($pmac+32),20);
        $mac = trim($mac);

        $handle = fopen('../controllers/mac.txt', 'r');
        if ($handle)
        {
          $fin = false;
          while (!feof($handle) && !$fin)
          {
            $buffer = fgets($handle);
            
            if( strcmp($buffer, $mac) == 0 ){
              session_start();
              $_SESSION["pwd"]="OK";
              $fin = true;
            }
          }
          fclose($handle);
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
        <title>Contact us </title>
        <style type="text/css">
        	 .footer {
                  margin-top: 1%;
                  background-color: #f5f5f5;
                  text-align: center;
               }
            #bg { 
                 background-image: url("../images/image_de_fond.jpg");
                 background-position: center;
                 background-repeat: no-repeat;
                 background-size: cover;
                  }
        </style>
    </head>
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
                  <div class="container">
                    <a class="navbar-brand" href="../index.php">L'outil Inventaire</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                      <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="../index.php">Home
                                <span class="sr-only">(current)</span>
                              </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="../index.php?url=materiel">Materiel</a>
                        </li>
                        <?php if (isset($_SESSION['pwd'])) {?> 
                        <li class="nav-item">
                            <a class="nav-link" href="#">Admin</a>
                        </li>
                        <?php } ?>
                        <li class="nav-item">
                          <a class="nav-link" href="../models/contact.php">Contact</a>
                        </li>
                      </ul>
                    </div>
                  </div>
             </nav>

         <body class="panel-group" id="bg" style="margin-top: 3cm;">
            <h1 class="display-4" style="text-align: center;">Administration</h1>
            <div style="float: right; margin-right: 2cm;">
              <a href="../index.php?url=ajoutEm" class="btn btn-info">Ajout d'un emprunteur</a>
              <a href="../index.php?url=ajoutPret" class="btn btn-info">Ajout d'un prêt</a>
              <a href="../index.php?url=ajout" class="btn btn-info">Ajout d'un matériel</a>
            </div>
          <div style="margin-left: 12cm;">
              <img src="../images/admin.png">
          </div>
        </body>
<footer class="footer">
   <div class="container">
        <div class="navbar-header">
            <span class="navbar-brand">Université de Cergy Pontoise </span>
        </div>

        <p class="navbar-text navbar-right">L'outil Inventaire de UCP</p>
    </div>
</footer>
</html>