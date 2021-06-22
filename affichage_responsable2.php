<!DOCTYPE html>
<html>
<head>
	<title> Affichage des choix Pfe/Master de l'enseignant </title>
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
	        <a class="title  title-link" href="Acc.html">
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
        <div class="heading">
            <p style="text-align: center;"><span style="color: #002e5b; font-size: 60px;"><strong><span style="font-family: 'Times New Roman',Times,serif;">Affichage des choix Pfe/Master de l'enseignant </span></strong></span></p>
        </div>
    </div>
<div class="section article">
    
    <div class="content">


	<?php
try
     {			 				 
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
     	 		
}
catch (Exception $e)
     {   		 			
        die('Erreur : ' . $e->getMessage());
     }
$date=date("Y-m-d");
$enseignant=$_GET['$nom'];
$i=$bdd->query('SELECT * FROM enseignant WHERE NomEnseignant="'.$enseignant.'"');
$r1=$i->fetch();
?>
	<p color=black><strong> 
	<?php
	echo"Nom et Prenom: $enseignant $r1[1]"
	?>
  </strong></p>

 <?php
$j=$bdd->query('SELECT * FROM fichevoeux WHERE enseignantID="'.$r1[6].'"');
$r2=$j->fetch();
$k=$bdd->query('SELECT * FROM choixpfe WHERE ficheVoeuxID="'.$r2[3].'"');
$l=$bdd->query('SELECT * FROM choixmaster WHERE ficheVoeuxID="'.$r2[3].'"');
?>
 <?php
$cptp=0;
foreach($k as $pfe)
{
$cptp++;
$find_pfe=$bdd->query('SELECT * FROM pfe WHERE PFEID="'.$pfe[2].'"');
$search_pfe=$find_pfe->fetch();
$pfecode[$cptp]=$search_pfe[0];
$pfespecialité[$cptp]=$search_pfe[3];
$pfetitre[$cptp]=$search_pfe[2];
$pfeOrdre[$cptp]=$pfe[0];

}
$cptm=0;
foreach($l as $mst)
{
$cptm++;
$find_mst=$bdd->query('SELECT * FROM master WHERE masterID="'.$mst[2].'"');
$search_mst=$find_mst->fetch();
$mstcode[$cptm]=$search_mst[0];
$mstspecialité[$cptm]=$search_mst[3];
$msttitre[$cptm]=$search_mst[2];
$mstOrdre[$cptm]=$mst[0];
}
if (($cptm==0)AND($cptp==0))
{?>
	<p color=black><strong> Cet enseignant n'a pas encore rempli sa fiche de voeuxx! <br> </strong></p>
	<?php

}
else
{
?>
<br>
<p color=black><strong> Les choix sont: </strong></p>
<div style="overflow-x:auto;">
	<table>
	<tr>
		<th style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;"> <strong> Type </strong></th>
				<th style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;"> <strong> Ordre de priorité </strong></th>
		<th style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;"> <strong> Spécialité </strong></th>
		<th style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;"> <strong> Code </strong></th>
				<th style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;"> <strong> Titre </strong></th>

	</tr>
	<?php
	$cpt=1;
	while($cpt<=$cptp)
	{
	?>
	<tr>
	<td style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;"><?php	echo "PFE";?></td>
		<td style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;"><?php	echo "$pfeOrdre[$cpt]";?></td>
	<td style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;"><?php	echo "$pfespecialité[$cpt]";?></td>
	<td style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;"><?php	echo "$pfecode[$cpt]";?></td>
	<td style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;"><?php	echo "$pfetitre[$cpt]";?></td>

	</tr>
		<?php
		$cpt++;
}
?>
<?php
	$cpt=1;
	while($cpt<=$cptm)
	{
	?>
	<tr>
	<td style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;"><?php	echo "MASTER";?></td>
			<td style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;"><?php	echo "$mstOrdre[$cpt]";?></td>
<td style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;"><?php	echo "$mstspecialité[$cpt]";?></td>
	<td style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;"><?php	echo "$mstcode[$cpt]";?></td>
	<td style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;"><?php	echo "$msttitre[$cpt]";?></td>

	</tr>
		<?php
		$cpt++;
}
?>
</table>	
</div>
		<?php
}
?>
<div style="overflow-x:auto;">
	</table>
	</div>

	
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
<h4> Responsable </h4>
</div>

        <div class="content" style="padding: 10px 10px 10px 25px; ">
                
                    <ul style="list-style-image: url('15243331418816739911.png'); ">
                    <li> <b> <a  style="text-decoration: none;color: #002e5b;" href="Responsable.php">Ajouter </a></b>
                    <ol style="list-style-image: url('152433314188167399.png');  ">
                      <li><a style="text-decoration: none" href="signup1.php"><span>Un Compte</a></li>
                      <li><a  style="text-decoration: none" href="inscription_soutenance .php"><span>Une Fiche Descriptive</a></li>
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


