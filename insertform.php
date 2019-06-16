<?php
$connect = mysqli_connect("localhost", "root", "", "inventaireucp");  
 $len= $_POST['numberinput'];
 $email= $_POST['email'];
 $date_debut = $_POST['date_debut'];
 $date_fin = $_POST['date_fin'];

            
         
            for($i=1;$i<=$len;$i++){
                $objet= $_POST['nom_objet'.$i];
                $imp = "select no_emp_util from utilisateurs where mail ='".$email."'";
                $result = mysqli_query($connect, $imp); 
                    while($row = mysqli_fetch_assoc($result)) {
                    $imp2 = $row["no_emp_util"];
                    }
                $query1= "INSERT INTO pret(no_emp_pr,date_debut,date_prevu) VALUES ($imp2, '".$date_debut."','".$date_fin."')";
            $result2 = mysqli_query($connect, $query1); 
                $query2 = "INSERT INTO contenir (no_pret,no_mat) VALUES(LAST_INSERT_ID(),
                    (SELECT no_mat from materiel where nom_materiel = '".$objet."')
                    )"; 
                $result3 = mysqli_query($connect, $query2); }

?>