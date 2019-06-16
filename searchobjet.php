<?php  
 $connect = mysqli_connect("localhost", "root", "", "inventaireucp");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT nom_materiel FROM materiel WHERE nom_materiel LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li class="'.$_POST['id'].'">'.$row["nom_materiel"].'</li>';  
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