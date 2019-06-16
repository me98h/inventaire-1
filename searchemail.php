<?php  
 $connect = mysqli_connect("localhost", "root", "", "inventaireucp");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT mail FROM utilisateurs WHERE mail LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li class="email">'.$row["mail"].'</li>';  
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