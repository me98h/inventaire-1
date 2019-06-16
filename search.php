<?php  
 $connect = mysqli_connect("localhost", "root", "", "inventaireucp");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT nom,prenom FROM utilisateurs WHERE nom LIKE '%".$_POST["query"]."%' or prenom LIKE '%".$_POST["query"]."%' ";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li class="country">'.$row["nom"].' '.$row["prenom"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>emprunteur non trouve</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  