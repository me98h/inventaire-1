<!DOCTYPE html>
<html>
<head>
<style type="text/css">
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
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ajouter pret</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="../libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <script>
     $(document).ready(function () {
           var i=1;
            $("#createinput").click( function (){
                  var inputLobjets = '<input type="text" class="form-control objet" id="o'+i+'"  placeholder="nom_objet'+i+'" name="nom_objet'+i+'">';
                  var inputdiv=  '<div id="objetListo'+i+'"></div>'  
              
                  var div = inputLobjets+inputdiv;
                  $("#inputdiv").append(div);
                  $("#numberinput").val(i);
                  i++;

                  $('.objet').keyup(function(){
                     //alert(this.id);
                    // $("#objetList"+this.id).html("hatim");
                     //$('#'+this.id).keyup(function(){  
                                    //var query = $(this).val();  
                                    var query = $('#'+this.id).val(); 
                                    var self = this; 
                                    if(query != '')  
                                    {  
                                            $.ajax({  
                                                url:"searchobjet.php",  
                                                method:"POST",  
                                                data:{query:query,id:this.id},  
                                                success:function(data)  
                                                {  
                                                    console.log(data);
                                                    $('#objetList'+self.id).fadeIn();  
                                                    $('#objetList'+self.id).html(data);  
                                                }  
                                            });  
                                    }  
                                //});  
                                $(document).on('click', '.'+this.id, function(){  
                                    $('#'+self.id).val($(this).text());  
                                    $('#objetList'+self.id).fadeOut();  
                                });  

                               /*  $('.'+this.id).click(function()
                                    {
                                        $('#'+self.id).val($(this).text());  
                                    $('#objetList'+self.id).fadeOut();  
                                    }) */
                });
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
                    <a class="nav-link" href="index.php?url=materiel">Materiel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?url=ajout">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<body class="panel-group" id="bg">
  <div class="container" style="margin-top: 3cm;">
  <h1 class="display-4" style="margin-bottom: 2cm; text-align: center;">Ajout d'un pret</h1>
    <div class="card card-login mx-auto mt-5" >
      <div class="card-header">ajouter pret</div>
      <div class="card-body">
          <form action="index.php?url=ajoutPret" method="POST" name="ajout_pret" id="form1">
          <input type ="hidden" id="numberinput" name="numberinput">
          <div class="form-group">
                <label for="list_obj">Emprunteurs</label>
                <input type="text" name="country" id="country" class="form-control" placeholder="Entrer le nom de l'emprunteur"/>  
                <div id="countryList"></div>  
                </div>



                    <div id="inputdiv" class="col-10">
                        
                     </div>
                    <button type="button" id="createinput"> ajouter objet</button>
                        
              <div class="col-5">
              <label for="date_debut">date debut</label>
                  <input type="date" class="form-control"  placeholder="date debut du pret" name="date_debut" required>
                    </div>
                  <div class="col-5">
                    <label for="date_fin">date de fin prevue</label>
                    <input type="date" class="form-control"  placeholder="date de fin prevue" name="date_fin" required>
                  </div>
              </div>
              <div class="form-group">
                  <input type="button" id="submit1" class="btn btn-primary form-control" value="ajouter" name="submit" />
              </div>
          </form>
      </div>
    </div>
  </div>
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
 <script>  
 $(document).ready(function(){  
      $('#country').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"search.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#countryList').fadeIn();  
                          $('#countryList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.country', function(){  
           $('#country').val($(this).text());  
           $('#countryList').fadeOut();  
      });  
      $('#submit1').click(function(){
          console.log($('#form1').serialize());
          
          $.ajax({  
                     url:"insertform.php",  
                     method:"POST",  
                     data:$('#form1').serialize(),  
                     success:function(data)  
                     {  
                         console.log(data);
                     }  
                });  
      })

      
 });  
 </script>   