<!DOCTYPE html>
<html>
<head>
	<title> Responsable </title>
	<meta charset="utf-8" />
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
	        <a class="title  title-link" href="Responsable.php">
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
					<a href="Responsable.php">Responsable</a>
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
    ?> <a href="fetch.php"><img style="width:30px;height:30px;-webkit-border-radius:15px;-moz-border-radius:15px;-o-border-radius:15px;border-radius:15px;" src="index33.png"></a></a> </a>
    <?php
}
    else
    {
        ?> <a href="fetch.php"><img style="width:30px;height:30px;-webkit-border-radius:15px;-moz-border-radius:15px;-o-border-radius:15px;border-radius:15px;" src="index.png"></a></a>
    <?php
    }


?>
                         
            <a href="profile.php"><img style="width:30px;height:30px;-webkit-border-radius:15px;-moz-border-radius:15px;-o-border-radius:15px;border-radius:15px;" src="login1.png"></a>
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

<?php
if (isset($_POST['type']) AND isset($_POST['nombre']))
{
	//connexio a la bdd.
try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
        
   echo '??chec lors de la connexion : ' . $e->getMessage();
}
if (strcmp($_POST['type'],"moins de")==0)
{
	$req = $bdd->prepare('SELECT * FROM statistique WHERE nombreChoix <:nombre');
$req->execute(array(
	'nombre' =>(int) $_POST['nombre']
	
	));
}
elseif (strcmp($_POST['type'],"plus de")==0) {
	$req = $bdd->prepare('SELECT * FROM statistique WHERE nombreChoix >:nombre');
$req->execute(array(
	'nombre' => (int)$_POST['nombre']
	
	));
	
	}
	else
	{
		$req = $bdd->prepare('SELECT * FROM statistique WHERE nombreChoix =:nombre');
$req->execute(array(
	'nombre' => (int)$_POST['nombre']
	
	));
	}
	?>
	
	<?php
	while ($donnees= $req->fetch())
	{
		if (strcmp($donnees['Type'],"pfe")==0)
		{
			$req1 = $bdd->prepare('SELECT * FROM pfe WHERE PFEID=:nombre');
               $req1->execute(array(
	            'nombre' => $donnees['IDS']
	
	));
               $donnees1 = $req1->fetch();
               $char1='/';
               $char2='\\';

               $char3=$donnees1['chemin_fichier'];
              $temp=str_replace ( $char1, $char2, $char3) ;
               $chemin = substr($temp, 21);
               ?>
               <!--<div style="border:3px solid  #002e5b; height:150px ">-->
               
               <div style="padding: 15px;text-align: center;height: 110px; border: 2px solid #ddd;
    border-radius: 5px;">
    <?php	echo 'Le Code:'. $donnees1['CodePFE'];?>
    <br>
    <?php	echo 'La Sp??cialit??:'.$donnees1['SpecialitePFE'] ;?>
    <br>
    <?php echo  'Le Titre:'.$donnees1['TitrePFE'];?>
    <br>
    <?php echo "Pour visualiser la Fiche :<a href=".$chemin." target='_blank'> Cliquer ici  </a>";?>

</div>

		

               <?php
              
              //////////////CHOISIS////////////////
               if ($_POST['nombre']>0)
              {
                echo ' Choisis par: ';
                $reqpfe = $bdd->prepare('SELECT * FROM choixpfe WHERE PFEID=:nombre');
               $reqpfe->execute(array('nombre' => $donnees['IDS']));
               while($donneespfe = $reqpfe->fetch())
               {

                $reqpfe1 = $bdd->prepare('SELECT * FROM fichevoeux WHERE ficheVoeuxID=:nombre');
               $reqpfe1->execute(array('nombre' => ($donneespfe['ficheVoeuxID'])));
               while($donneesens = $reqpfe1->fetch())
               {
                  $reqpfe2 = $bdd->prepare('SELECT * FROM enseignant WHERE enseignantID=:nombre');
               
               $reqpfe2->execute(array(
              'nombre' => ($donneesens['enseignantID'])
  
  ));
               while($donneesens1 = $reqpfe2->fetch())
               {
                echo $donneesens1['NomEnseignant'].' '.$donneesens1['PrenomEnseignant'].',';


               }


              }
          }

             


    }
              
             /* echo '<br />';
              echo  "Titre:". $donnees1['TitrePFE'] ;
              echo '<br />';
              echo "CODE:".$donnees1['CodePFE'] ;
              echo '<br />';
              echo "Sp??cialit??:".$donnees1['SpecialitePFE'];
              echo '<br />';
             
              
               echo "<a href=".$chemin." target='_blank'> fichier  </a>";
               ?>
               </div>
               <?php*/
              

             


		}
		else
		{
			$req2= $bdd->prepare('SELECT * FROM master WHERE masterID=:nombre');
               $req2->execute(array(
	        'nombre' => $donnees['IDS']
	
	));
                while ($donnees2 = $req2->fetch())
                {
                $char1='/';
               $char2='\\';
               $char3=$donnees2['chemin_fichier'];
               $temp=str_replace ( $char1, $char2, $char3) ;
               $chemin = substr($temp, 21);
               ?>
              <!-- <div style="border:3px solid  #002e5b; height:150px ">-->
              <div style="padding: 15px;text-align: center;height: 110px; border: 2px solid #ddd;
    border-radius: 5px;">
    <?php	echo 'Le Code:'. $donnees2['CodeMaster'];?>
    <br>
    <?php	echo 'La Sp??cialit??:'.$donnees2['SpecialiteMaster'] ;?>
    <br>
    <?php echo  'Le Titre:'.$donnees2['TitreMaster'];?>
    <br>
    <?php echo "Pour visualiser la Fiche :<a href=".$chemin." target='_blank'> Cliquer ici  </a>";?>

</div>
               <?php

               
               if ($_POST['nombre']>0)
              {
               echo ' Choisis par: ';
                $reqpfe = $bdd->prepare('SELECT * FROM choixmaster WHERE masterID=:nombre');
               $reqpfe->execute(array('nombre' => $donnees['IDS']));
               while($donneespfe = $reqpfe->fetch())
               {

                $reqpfe1 = $bdd->prepare('SELECT * FROM fichevoeux WHERE ficheVoeuxID=:nombre');
               $reqpfe1->execute(array('nombre' => ($donneespfe['ficheVoeuxID'])));
               while($donneesens = $reqpfe1->fetch())
               {
                  $reqpfe2 = $bdd->prepare('SELECT * FROM enseignant WHERE enseignantID=:nombre');
               
               $reqpfe2->execute(array(
              'nombre' => ($donneesens['enseignantID'])
  
  ));
               while($donneesens1 = $reqpfe2->fetch())
               {
                echo $donneesens1['NomEnseignant'].' '.$donneesens1['PrenomEnseignant'].',';


               }


              }
          }

             


    }
}

             


    
              
              
              /*echo '<br />';
              echo  "Titre:". $donnees2['TitreMaster'] ;
              echo '<br />';
              echo "CODE:".$donnees2['CodeMaster'] ;
              echo '<br />';
              echo "Sp??cialit??:".$donnees2['SpecialiteMaster'];
              echo '<br />';
              echo "<a href=".$chemin." target='_blank'> fichier  </a>";
              ?>
              </div>
              <?php*/



		}
  }
}


       

	



else
{
	echo 'Veuillez vous remplir tout les champs.';
}
?>



	
</div>


</div>


					</div>
                </div>
            </div>
			
			<div id="right" class="span3">
                <div class="sidebar" float=right>
            <div class="wrapper share-box">
                <style>    .wordwrapfix {
        word-wrap:break-word;
    }
</style>
<div class="heading wordwrapfix">
        <h4>Responsable</h4>
</div>

                <div class="content" style="padding: 10px 10px 10px 25px; ">
                
                    <ul style="list-style-image: url('15243331418816739911.png'); ">
                    <li> <b> <a  style="text-decoration: none;color: #002e5b;" href="Responsable.php">Ajouter </a></b>
                    <ol style="list-style-image: url('152433314188167399.png');  ">
                      <li><a style="text-decoration: none" href="signup1.php"><span>Un Compte</a></li>
                      <li><a  style="text-decoration: none" href="inscription_soutenance .php"><span>Une Fiche Descriptive </a></li>
                    </ol>
                    </li>
                    <li>  <b> <a  style="text-decoration: none;color: #002e5b;" href="Responsable.php"> Consulter </a> </b>
                    <ol style="list-style-image: url('152433314188167399.png');"">
                      <li><a  style="text-decoration: none" href="rechercheparspecialiteresponsable.php"><span>Les Fiches Descriptives </span></a></li>
                      <li><a  style="text-decoration: none" href="affichage_responsable.php"><span>Les Fiches De voeux</span></a></li>
                      <li><a  style="text-decoration: none" href="proposition_jury.php"><span>La Proposition de Jurys</span></a></li>
                      <li><a style="text-decoration: none" href="Enseignants_Retardataires.php"><span>Enseignants en retard</span></a></li>


                    </ol>
                    </li>                   

    <li>  <b> <a  style="text-decoration: none;color: #002e5b;" href="staticform.php"> Statistiques </a> </b>
                    <ol style="list-style-image: url('152433314188167399.png');  ">
                    <li><a  style="text-decoration: none" href="staticform.php"><span>Recherche</a></li>
                    <li><a  style="text-decoration: none" href="graphres.php"><span>Graphs</a></li>
                    
                    </li>   
                    </ol> 
    
  <li><a style="text-decoration: none;color: #002e5b;" href="diffuser.php"><span><b>Diffuser les fiches</b></span></a></li>

  
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