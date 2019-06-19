<?php  
 $connect = mysqli_connect("localhost", "root", "", "inventaireucp");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT nom,prenom FROM utilisateurs INNER JOIN enseignant ON utilisateurs.no_emp_util=enseignant.no_util_ens WHERE nom LIKE '%".$_POST["query"]."%' or prenom LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li class="encadrant">'.$row["nom"].' '.$row["prenom"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>materiel non trouve</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  