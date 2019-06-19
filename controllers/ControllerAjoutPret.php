<?php
  
class ControllerAjoutPret
{
    private $_ajoutPretManager;

    public function __construct($url, $arr_arg = null){
        if(isset($url) && count($url) > 1)
            throw new Exception("Page introuvable");
        else
            $this->ajoutPrets();	

    }

    public function ajoutPrets(){
        $ajout = false;
        $done = false;
        require_once('views/viewAjoutPret.php');

        if (isset($_POST['submit'])){
            $emp = $_POST['country'];
            $len= $_POST['numberinput'];
            $email= $_POST['email'];
            for($i=1;$i<$len;$i++){
                $nom = $_POST['nom_emprunteur'.$i];
                $prenom = $_POST['prenom_emprunteur'.$i];
                $mail = $_POST['email_emprunteur'.$i];
                if(isset( $_POST['est_chef'.$i]))
                $chef =$_POST['est_chef'.$i];
                $this->_ajoutManager = new AjoutManager();
                $ajout = $this->_ajoutManager->ajoutPret($emp, $list, $email, $date_debut, $date_fin);
                $done = true;
                  }

           
        }
       
        }
        
    
    }


?>



   <!--  $no_emp ="select no_emp_util from utilisateurs where mail ='".$email."'";
    $res=$db->query($no_emp);
    $result = $res->fetch(PDO::FETCH_ASSOC);

    $imp=implode($result);
    echo $list;
    
    $stmt1 = "INSERT INTO contenir (no_mat) VALUES(
     (SELECT no_mat from materiel where nom_materiel = '".$list."')
     )"; 
    $stmt2 = "INSERT INTO pret (no_pret,no_emp_pr,date_debut,date_prevu) VALUES(LAST_INSERT_ID(),
     $imp, '".$date_debut."','".$date_fin."')";
    
    $sth1 = $db->prepare($stmt1);
    $sth2 = $db->prepare($stmt2);
    
    $db->beginTransaction();
    $sth1->execute (array ('".$list."'));
    $sth2->execute (array (".$imp.",'".$date_debut."','".$date_fin."'));
    $db->commit();   -->