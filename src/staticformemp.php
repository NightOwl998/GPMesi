
<!DOCTYPE html>
<html>
<head>
  <title> Employe </title>
  <meta charset="utf-8" />
  <meta http-equiv="Content-Type" content="text/html";  charset="utf-8">
  
  <link rel="stylesheet" type="text/css" href="acc.css" />
</head>
<body>
<body data-pid="439319477" data-iid="" style="line-height: normal;">

            <video id="videoBackground" autoplay muted preload="auto" loop poster="snowflakes.jpg" 
                style="position: fixed;min-width: 100%;min-height: 100%;width: auto;height: auto;z-index: -1;background-size: cover;">
                <source src="snowflakes.mp4" />
        <source src="snowflakes.webm" />
            </video>
      <div class="container-fluid site-wrapper"> <!-- this is the Sheet -->
            <div class="container-fluid header-wrapper " id="header"> <!-- this is the Header Wrapper -->
    <div class="container">
<div class="title-wrapper">
  <div class="title-wrapper-inner">
      <a class="logo " href="http://esi.dz/">
              <img class="logo-img" src="EsiLogo.jpg" />
      </a>
      <div class="title ">
          <a class="title  title-link" href="Employe.php">
                GPMesi
            </a> 
      </div>
      <div class="subtitle">
          Gestion de soutenances de PFE/MASTER de l&#39;esi
      </div>
  </div>
</div>  <!-- these are the titles -->


<div class="navbar navbar-compact">
    <div class="navbar-inner">
        <div class="container">
            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse" title="Toggle menu">
                <span class="menu-name">Menu</span>
                <span class="menu-bars">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </span>
            </a>
            
      <!-- Everything you want hidden at 940px or less, place within here -->
            <div class="nav-collapse collapse">
                <ul class="nav" id="topMenu" data-submenu="horizontal">
          <li class=" active ">
          <a href="Employe.php">Employe</a>
          </li>
          <li style="float :right">
            <?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
if(!isset($_SESSION))
    {
        session_start();
    }

$req = $bdd->prepare('SELECT * FROM notification WHERE Etat = 0  AND IDcompte=:IDcompte');
$req->execute(array('IDcompte' => $_SESSION['compteID']));
$nombre= $req->rowCount();
if ($nombre>0)
{
    ?> <a href="fetchemp.php"><img style="width:30px;height:30px;-webkit-border-radius:15px;-moz-border-radius:15px;-o-border-radius:15px;border-radius:15px;" src="index33.png"></a></a> </a>
    <?php
}
    else
    {
        ?> <a href="fetchemp.php"><img style="width:30px;height:30px;-webkit-border-radius:15px;-moz-border-radius:15px;-o-border-radius:15px;border-radius:15px;" src="index.png"></a></a>
    <?php
    }


?>
                         
            <a href="profileEmp.php"><img style="width:30px;height:30px;-webkit-border-radius:15px;-moz-border-radius:15px;-o-border-radius:15px;border-radius:15px;" src="login1.png"></a>
            <a href="help.html"><img style="width:30px;height:30px;-webkit-border-radius:15px;-moz-border-radius:15px;-o-border-radius:15px;border-radius:15px;" src="help1.png"></a>
            
          </li>
                </ul>       
        
            </div>
        </div>
    </div>
</div>
  <!-- this is the Menu content -->
    </div>
</div>  <!-- this is the Header content -->

<div class="container-fluid content-wrapper" id="content"> <!-- this is the Content Wrapper -->
    <div class="container">
        <div class="row-fluid content-inner">
            <div id="left" class="span9"> <!-- ADD "span12" if no sidebar, or "span9" with sidebar -->
                <div class="wrapper ">
                    <div class="content">
    <div class="section article">
        <div class="heading">
            <p style="text-align: center;"><span style="color: #002e5b; font-size: 60px;"><strong><span style="font-family: 'Times New Roman',Times,serif;">Statistiques</span></strong></span></p><br/>
        </div>
    </div>
<div class="section article">
    
    <div class="content">
<script>
  function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}
  function verifAge(champ)
{
   var age = parseInt(champ.value);
   if(isNaN(age)  || age<0)
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}
function verifForm(f)
{
   
   var ageOk = verifAge(f.nombre);
   
   if( ageOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement  les champs");
      return false;
   }
}


    /*var text = document.getElementById('text');
  
    text.addEventListener('focus', function(e) {
        e.target.value = "Vous avez le focus !";
    });

    text.addEventListener('blur', function(e) {
        e.target.value = "Vous n'avez pas le focus !";
    });*/
   
</script>
<form  method="post" action="staticemp.php" onsubmit="return verifForm(this)">
<p> Visualiser les Sujets Master/Pfe choisis par 
<select name="type">
<option value="moins de" > moins de </option>
<option value="plus de" >  plus de </option>
<option value="exactement" > exactement </option>
</select> 
 
<input id="text type="number" name="nombre" onblur="verifAge(this)">
enseignants 
<input type="submit" value="Recherche" /> 
</p>

</form>



  
</div>


</div>


          </div>
                </div>
            </div>
      
      <div id="right" class="span3">
                <div class="sidebar">
            <div class="wrapper share-box">
                <style>    .wordwrapfix {
        word-wrap:break-word;
    }
</style>
<div class="heading wordwrapfix">
        <h4>Employe</h4>
</div>

                <div class="content" style="padding: 10px 10px 10px 25px; ">
                
                    <ul style="list-style-image: url('15243331418816739911.png'); ">
                    <li> <b> <a  style="text-decoration: none;color: #002e5b;" href="Employe.php">Consulter </a></b>
                    <ol style="list-style-image: url('152433314188167399.png');  ">
                      <li><a  style="text-decoration: none" href="rechercheparspecialiteEmp.php"><span>Les Fiches Descriptives</a></li>
                      
                    </ol>
                    </li>
                    <li>  <b> <a  style="text-decoration: none;color: #002e5b;" href="staticformemp.php"> Statistiques </a> </b>
                    <ol style="list-style-image: url('152433314188167399.png');  ">
                    <li><a  style="text-decoration: none" href="staticformemp.php"><span>Recherche</a></li>
                    <li><a  style="text-decoration: none" href="graph.php"><span>Graphs</a></li>
                    
                    </li>                       

    

    
</ul>
                </div>
            </div>

</div>
            </div>
         <!-- the controller has determined which view to be shown in the content -->
     
     
     
    </div>
  </div>
</div>

<!-- the controller has determined which view to be shown in the content -->

<div class="container-fluid footer-wrapper" id="footer">
    <!-- this is the Footer Wrapper -->
    <div class="container">
        <div class="footer-info">
               <!-- <div class="footer-info-text">
                    Ce site a &#233;t&#233; cr&#233;&#233; avec SimpleSite
               
        </div>-->
            
        <div id="css_simplesite_com_fallback" class="hide"></div>
    </div>
</div>
</div>
</div>




</body>
</html>
