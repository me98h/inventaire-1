<?php
$connect = mysqli_connect("localhost", "root", "", "inventaireucp");  
 $len= $_POST['numberinput'];
 $emp= $_POST['country'];
 $date_debut = $_POST['date_debut'];
 $date_fin = $_POST['date_fin'];
 preg_match_all('!\d+!', $emp, $matches);
 $var = implode(' ', $matches[0]);
            
         
            for($i=1;$i<=$len;$i++){
                $objet= $_POST['nom_objet'.$i];
                $query1= "INSERT INTO pret(no_emp_pr,date_debut,date_prevu) VALUES ($var, '".$date_debut."','".$date_fin."')";
            $result2 = mysqli_query($connect, $query1); 
                $query2 = "INSERT INTO contenir (no_pret,no_mat) VALUES(LAST_INSERT_ID(),
                    (SELECT no_mat from materiel where nom_materiel = '".$objet."')
                    )"; 
                $result3 = mysqli_query($connect, $query2); }

?>