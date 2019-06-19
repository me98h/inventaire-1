<?php  
 $connect = mysqli_connect("localhost", "root", "", "inventaireucp");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT no_emp_util,nom,prenom FROM utilisateurs WHERE nom LIKE '%".$_POST["query"]."%' or prenom LIKE '%".$_POST["query"]."%'";  
      $query2 = "SELECT no_emp_grou,nom_groupe FROM groupe WHERE nom_groupe LIKE '%".$_POST["query"]."%'"; 
      $result = mysqli_query($connect, $query);  
      $result2 = mysqli_query($connect, $query2);  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0 && mysqli_num_rows($result2) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li class="country">'.$row["nom"].' '.$row["prenom"].' '.$row["no_emp_util"].'</li>';  
           }  
           while($row2 = mysqli_fetch_array($result2))  
           {  
                $output .= '<li class="country">'.$row2["nom_groupe"].' '.$row2["no_emp_grou"].'</li>';  
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