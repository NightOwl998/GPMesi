<!DOCTYPE html>
<html>
<head>
	<title> Traitement consulter </title>
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
	        <a class="title  title-link" href="index.php">
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
					<a href="Enseignant.php">Enseignant</a>
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
    ?> <a href="fetchens.php"><img style="width:30px;height:30px;-webkit-border-radius:15px;-moz-border-radius:15px;-o-border-radius:15px;border-radius:15px;" src="index33.png"></a></a> </a>
    <?php
}
    else
    {
        ?> <a href="fetchens.php"><img style="width:30px;height:30px;-webkit-border-radius:15px;-moz-border-radius:15px;-o-border-radius:15px;border-radius:15px;" src="index.png"></a></a>
    <?php
    }


?>
                         
            <a href="profileEns.php"><img style="width:30px;height:30px;-webkit-border-radius:15px;-moz-border-radius:15px;-o-border-radius:15px;border-radius:15px;" src="login1.png"></a>
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
    
    <div class="content">


<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

echo 'Échec lors de la connexion : ' . $e->getMessage();}
if (isset($_POST['pfn'])AND (strcmp('master',$_POST['pfn'])==0))

{
  
     if (isset ($_POST['specialite'])  AND (strcmp($_POST['specialite'],'aucun') !=0 ))
       {

    
      
               if ( empty($_POST['motcle']))
           {
            $reponse = $bdd->prepare(' SELECT * FROM master WHERE  SpecialiteMaster  = :Specialite ');
             $reponse->execute(array('Specialite'=>$_POST['specialite']));
            //Parcourir les résultats .
             
                        
            
                   while ($donnees = $reponse->fetch())
                   {
                    
                        
                    ?>
                    <div style="padding: 15px;text-align: center;height: 110px; border: 2px solid #ddd;
    border-radius: 5px;"> 
               Le Code:<?php echo $donnees['CodeMaster'];?>  <br> 
            
            Le Titre:<?php echo $donnees['TitreMaster']; ?> <br>
            <?php  
      $char1='/';
            $char2='\\';
            $char3=$donnees['chemin_fichier'];
            $temp=str_replace ( $char1, $char2, $char3) ;
            $chemin = substr($temp, 21); 
            ?>

             La fiche discriptive:<?php  echo "<a href= ".$chemin.">  cliquez ici   </a>"; ?><br>    
             </div>
<?php
                    }

                    }

          
           else 
           {
            $lu=array();
                $compt=0;    
            $motcle_array  =  explode(",", $_POST['motcle']);;
            
            
               foreach($motcle_array as $mot)
                   {
                    if (($mot!=null) && ($mot!=','))
                    {

                    

                    
                    $reponse = $bdd->prepare(' SELECT * FROM master WHERE motCle LIKE  :critere AND  SpecialiteMaster  = :Specialite '); 
             $reponse->execute(array('Specialite'=>$_POST['specialite'],
              'critere'=>'%'.$mot.'%'
              ));
             
                        

             while ($donnees = $reponse->fetch())
                   {
                    if (!(in_array($donnees['CodeMaster'],$lu)))
                    {
                      ?>
                      <div style="padding: 15px;text-align: center;height: 110px; border: 2px solid #ddd;
    border-radius: 5px;">

                      Le Code  : <?php echo $donnees['CodeMaster'];?>  <br/>
                      L'année   : <?php echo $donnees['AnneeUniversitaire']; ?> <br/>
                        Le titre :  <?php echo $donnees['TitreMaster']; ?> <br />
                    <?php  
                   $char1='/';
                         $char2='\\';
                          $char3=$donnees['chemin_fichier'];
                         $temp=str_replace ( $char1, $char2, $char3) ;
                          $chemin = substr($temp, 21); ?>
                          La fiche discriptive: <?php  echo "<a href= ".$chemin.">  cliquez ici   </a>"; ?>
                          </div>
                          <?php

                 

                    }

                    $lu[] = $donnees['CodeMaster'];
                   
               }
              ?>

             
             <?php
         }

                  
                   
            



                   

        }
        
        }

           }
          
    
    else if ((isset ($_POST['specialite'])  AND (strcmp($_POST['specialite'],'aucun') ==0 )))
    {
      
         
         if ( empty($_POST['motcle']))
           {
            
            $reponse = $bdd->query('SELECT * FROM master');
            
                        
            
            //Parcourir les résultats .
           
                   while ($donnees = $reponse->fetch())
                   {
                    
                    ?>
                   <div style="padding: 15px;text-align: center;height: 110px; border: 2px solid #ddd;
    border-radius: 5px;">
                    Le code  est: <?php echo $donnees['CodeMaster'];?>  <br/>
                    L'année  est : <?php echo $donnees['AnneeUniversitaire']; ?> <br/>
                    Le titre est  <?php echo $donnees['TitreMaster']; ?> <br />
            <?php  
      $char1='/';
            $char2='\\';
            $char3=$donnees['chemin_fichier'];
            $temp=str_replace ( $char1, $char2, $char3) ;
            $chemin = substr($temp, 21); ?>
            La fiche discriptive: <?php  echo "<a href= ".$chemin.">  cliquez ici   </a>"; ?>    
             </div>
<?php
                    }
                


           }
           else 
           {                
                    //Recherche mot Clé.
            $compt=0;
            $lu=array();
                    
            $motcle_array  = explode(",", $_POST['motcle']);
            
               foreach($motcle_array as $mot)
                   {
                    if (($mot!=null) && ($mot!=','))
                    {
                    
                    $reponse = $bdd->prepare(' SELECT * FROM master WHERE motCle LIKE  :critere    ');
             $reponse->execute(array(
              'critere'=> '%'.$mot. '%'
              ));
             
                        
                        
             while ($donnees = $reponse->fetch())
                   {
                    if (!(in_array($donnees['CodeMaster'],$lu)))
                    {
                      ?>
                        <div style="padding: 15px;text-align: center;height: 110px; border: 2px solid #ddd;
    border-radius: 5px;">
                      Le Code: <?php echo $donnees['CodeMaster'];?>  <br/>
                      L'année: <?php echo $donnees['AnneeUniversitaire']; ?> <br/>
                        Le Titre:  <?php echo $donnees['TitreMaster']; ?> <br />
                    <?php  
                   $char1='/';
                         $char2='\\';
                          $char3=$donnees['chemin_fichier'];
                         $temp=str_replace ( $char1, $char2, $char3) ;
                          $chemin = substr($temp, 21); ?>
                          La fiche discriptive: <?php  echo "<a href= ".$chemin.">  cliquez ici   </a>"; ?>
                          </div>
                          <?php

                 

                    }

                    $lu[] = $donnees['CodeMaster'];
                   }
               }
              ?>

             
             <?php
         }

            
               
            



                   }

        }
                   }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                   /* Cette partie de Table pfe*/
                   if (isset($_POST['pfm'])AND (strcmp('pfe',$_POST['pfm'])==0))

{
  
     if (isset ($_POST['specialite'])  AND (strcmp($_POST['specialite'],'aucun') !=0 ))
       {

    
      
               if ( empty($_POST['motcle']))
           {
            $reponse1 = $bdd->prepare(' SELECT * FROM pfe WHERE  SpecialitePFE  = :Specialite ');
             $reponse1->execute(array('Specialite'=>$_POST['specialite']));
            //Parcourir les résultats .
             
                        
            
                   while ($donnees1 = $reponse1->fetch())
                   {
                    ?>
                    <div style="padding: 15px;text-align: center;height: 110px; border: 2px solid #ddd;
    border-radius: 5px;">
                    Le Code : <?php echo $donnees1['CodePFE'];?>  <br/>
            L'Année: <?php echo $donnees1['AnneeUniversitaire']; ?> <br/>
            Le titre:  <?php echo $donnees1['TitrePFE']; ?> <br />
            <?php  
      $char1='/';
            $char2='\\';
            $char3=$donnees1['chemin_fichier'];
            $temp=str_replace ( $char1, $char2, $char3) ;
            $chemin = substr($temp, 21); 
            ?>

            La fiche discriptive: <?php  echo "<a href= ".$chemin.">  cliquez ici   </a>"; ?>    
             </div>
<?php
                    }
                


           }
           else 
           {
            $lu=array();
                $compt=0;    
            $motcle_array  =  explode(",", $_POST['motcle']);;
            
            
               foreach($motcle_array as $mot)
                   {
                    if (($mot!=null) && ($mot!=','))
                    {

                    

                    
                    $reponse1 = $bdd->prepare(' SELECT * FROM pfe WHERE motCle LIKE  :critere AND  SpecialitePFE  = :Specialite '); 
             $reponse1->execute(array('Specialite'=>$_POST['specialite'],
              'critere'=>'%'.$mot.'%'
              ));
                             

             while ($donnees1 = $reponse1->fetch())
                   {
                    if (!(in_array($donnees1['CodePFE'],$lu)))
                    {
                      ?>
                      <div style="padding: 15px;text-align: center;height: 110px; border: 2px solid #ddd;
    border-radius: 5px;">
                      Le Code: <?php echo $donnees1['CodePFE'];?>  <br/>
                      L'Année: <?php echo $donnees1['AnneeUniversitaire']; ?> <br/>
                        Le Titre:  <?php echo $donnees1['TitrePFE']; ?> <br />
                    <?php  
                   $char1='/';
                         $char2='\\';
                          $char3=$donnees1['chemin_fichier'];
                         $temp=str_replace ( $char1, $char2, $char3) ;
                          $chemin = substr($temp, 21); ?>
                          La fiche discriptive: <?php  echo "<a href= ".$chemin.">  cliquez ici   </a>"; ?>
                          </div>
                          <?php

                 

                    }

                    $lu[] = $donnees1['CodePFE'];
                   }
              ?>

             
             <?php
         }
             
                  
                   
            



                   

        }
                   }

           }
          
    
    else if ((isset ($_POST['specialite'])  AND (strcmp($_POST['specialite'],'aucun') ==0 )))
    {
      
         
         if ( empty($_POST['motcle']))
           {
            
            $reponse1 = $bdd->query('SELECT * FROM pfe');
            
            
            //Parcourir les résultats .
           
                   while ($donnees1 = $reponse1->fetch())
                   {
                    
                    ?>
                    <div style="padding: 15px;text-align: center;height: 110px; border: 2px solid #ddd;
    border-radius: 5px;">
                    Le Code : <?php echo $donnees1['CodePFE'];?>  <br/>
                    L'Année: <?php echo $donnees1['AnneeUniversitaire']; ?> <br/>
                    Le Titre:  <?php echo $donnees1['TitrePFE']; ?> <br />
            <?php  
      $char1='/';
            $char2='\\';
            $char3=$donnees1['chemin_fichier'];
            $temp=str_replace ( $char1, $char2, $char3) ;
            $chemin = substr($temp, 21); ?>
            La fiche discriptive: <?php  echo "<a href= ".$chemin.">  cliquez ici   </a>"; ?>    
             </div>
<?php
                    }


           }
           else 
           {                
                    //Recherche mot Clé.
            $lu=array();
                    $compt=0;
            $motcle_array  = explode(",", $_POST['motcle']);
            
               foreach($motcle_array as $mot)
                   {
                    if (($mot!=null) && ($mot!=','))
                    {
                    
                    $reponse1 = $bdd->prepare(' SELECT * FROM pfe WHERE motCle LIKE  :critere    ');
             $reponse1->execute(array(
              'critere'=> '%'.$mot. '%'
              ));
             
             while ($donnees1 = $reponse1->fetch())
                   {
                    if (!(in_array($donnees1['CodePFE'],$lu)))
                    {
                      ?>
                     <div style="padding: 15px;text-align: center;height: 110px; border: 2px solid #ddd;
    border-radius: 5px;">
                      Le Code : <?php echo $donnees1['CodePFE'];?>  <br/>
                      L'Année: <?php echo $donnees1['AnneeUniversitaire']; ?> <br/>
                        Le Titre:  <?php echo $donnees1['TitrePFE']; ?> <br />
                    <?php  
                   $char1='/';
                         $char2='\\';
                          $char3=$donnees1['chemin_fichier'];
                         $temp=str_replace ( $char1, $char2, $char3) ;
                          $chemin = substr($temp, 21); ?>
                          La fiche discriptive: <?php  echo "<a href= ".$chemin.">  cliquez ici   </a>"; ?>
                          </div>
                          <?php

                 

                    }

                    $lu[] = $donnees1['CodePFE'];
                   }
              ?>

             
             <?php
         }

            

            



                   }

        }
      }
    }
    if (isset($_POST['pfn']) && !(isset($_POST['pfm'])))//(strcmp('master',$_POST['pfn'])==0) && (strcmp('pfe',$_POST['pfm'])!=0))
    {
      $nombre= $reponse->rowCount();
      if ($nombre==0)
{
  echo 'Aucune resultat coresspond a votre Recherche';
}

    }
    if (isset($_POST['pfm']) && !(isset($_POST['pfn'])))//((strcmp('master',$_POST['pfn'])!=0) && (strcmp('pfe',$_POST['pfm'])==0))
{
  $nombre1= $reponse1->rowCount();
  if ($nombre1==0)
{
  echo 'Aucune resultat coresspond a votre Recherche';
}


}
if (isset($_POST['pfn']) && isset($_POST['pfm']))/*((strcmp('master',$_POST['pfn'])==0) && (strcmp('pfe',$_POST['pfm'])==0))*/
{
$nombre= $reponse->rowCount();   
$nombre1= $reponse1->rowCount();                 
if (($nombre==0)&&($nombre1==0))
{
  echo 'Aucune resultat coresspond a votre Recherche';
}
}

?>


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
        <h4>Enseignant</h4>
</div>

                <div class="content" style="padding: 10px 10px 10px 25px; ">
                
                    <ul style="list-style-image: url('15243331418816739911.png'); ">
                    <li> <b> <a  style="text-decoration: none;color: #002e5b;" href="Enseignant.php">Consulter </a></b>
                    <ol style="list-style-image: url('152433314188167399.png');  ">
                      <li><a  style="text-decoration: none" href="rechercheparspecialiteEns.php"><span>Les Fiches Descriptives</a></li>
                      <li><a  style="text-decoration: none" href="afficher_ens.php"><span>La Fiche De voeux</a></li>
                    </ol>
                    </li>
                    <li>  <b> <a  style="text-decoration: none;color: #002e5b;" href="Enseignant.php"> Remplir </a> </b>
                    <ol style="list-style-image: url('152433314188167399.png');"">
                      <li><a  style="text-decoration: none" href="Formulaire.php"><span>La Fiche De voeux </span></a></li>
                      


                    </ol>
                    </li>                   

    

    
</ul>
                </div>
            </div>

</div>
            </div>
         
		 
		 
		 
		</div>
	</div>
</div>

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