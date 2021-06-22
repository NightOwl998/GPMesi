<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	//connexio a la bdd.
	try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (PDOException $e) {
        
   echo 'Échec lors de la connexion : ' . $e->getMessage();
   }
?>

<?php

	 $annee=date("Y");
	 $a="$annee";
$date=date("Y-m-d");
if(!isset($_SESSION))
{session_start();}
$IDSS= $_SESSION['compteID'] ;

$IDreq=$bdd->prepare('SELECT * FROM enseignant WHERE compteID=:compteID');
$IDreq->execute(array(
	'compteID' => $IDSS
	));
$donneesIDSS = $IDreq->fetch();


$enseignantID=$donneesIDSS ['enseignantID'];
$fich_exist=$bdd->query('SELECT * FROM fichevoeux WHERE enseignantID="'.$enseignantID.'"');
			$fich_ext=$fich_exist->fetch();
if ($fich_ext==NULL){
$i=$bdd->query('SELECT * FROM gestion_table WHERE ID=1');
			$idg=$i->fetch();
$f_ID=$idg[1]+1;
$bdd->exec('UPDATE gestion_table SET ficheVoeuxID = "'.$f_ID.'" WHERE ID=1');	
$bdd->exec('INSERT INTO fichevoeux (AnneeUniversitaire,DateRemise,enseignantID,ficheVoeuxID) VALUES("'.$annee.'","'.$date.'","'.$enseignantID.'","'.$f_ID.'")');	
}
else
{
$f_ID=$fich_ext[3];	
$supprimer_choix_master=$bdd->query('DELETE  FROM choixmaster WHERE ficheVoeuxID="'.$f_ID.'"');
$supprimer_choix_pfe=$bdd->query('DELETE  FROM choixpfe WHERE ficheVoeuxID="'.$f_ID.'"');
}
$cpt=1;
$boolean=1;
?>
<head>
	<title> Remplissage de la fiche de voeux des choix Pfe/Master de l'enseignant </title>
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
					<a href="Enseignant.php">Enseignant</a>
					</li>
					<li style="float :right">
						
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
         <p style="text-align: center;"><span style="color: #002e5b; font-size: 60px;"><strong><span style="font-family: 'Times New Roman',Times,serif;">Remplissage de la fiche de voeux </strong></span></p>
 </div>
    </div>
<div class="section article">
    
    <div class="content">

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
<h4> Enseignant </h4>
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
         <!-- the controller has determined which view to be shown in the content -->
		 <?php
foreach($_POST['MASTER'] as $mst)
{$master[$cpt]=$mst;
$find_mstID=$bdd->query('SELECT * FROM master WHERE CodeMaster="'.$master[$cpt].'"');
 $mstID=$find_mstID->fetch();
 if($mstID==NULL){
	 ?>
            </div>

	<p style="text-align: center;"><span style="color: black; font-size: 25px;"><strong><span style="font-family: 'Times New Roman',Times,serif;"><br> Vous avez tapez un code 	MASTER inexistant <br>
</span></strong></span>
	</p>
<?php
$boolean=0;
}
else
{$bdd->exec('INSERT INTO choixmaster (ordre, ficheVoeuxID, masterID) VALUES("'.$cpt.'","'.$f_ID.'","'.$mstID[4].'")');}
$cpt++;}
		  $cpt=1;

 foreach($_POST['PFESIT'] as $SIT ){
	 $PFESIT[$cpt]=$SIT;
		 $cpt++;	 }
		  $cpt=1;
		  foreach($_POST['PFESIQ'] as $SIQ ){
	 $PFESIQ[$cpt]=$SIQ;
	 $cpt++;			  }
	 $cpt=1;
		  foreach($_POST['PFESIL'] as $SIL ){
	 $PFESIL[$cpt]=$SIL;
		 $cpt++;	 }
		 $cpt=1;
		  foreach($_POST['PFEMIXTE'] as $MIXTE ){
	 $PFEMIXTE[$cpt]=$MIXTE;
		 $cpt++;	 }
		  $cpt=1;
foreach($_POST['OP'] as $ORDRE){
	  	$op[$cpt]=$ORDRE;
	if ($PFEMIXTE[$cpt]!= NULL){
		$find_pfeID=$bdd->query('SELECT * FROM pfe WHERE CodePFE="'.$PFEMIXTE[$cpt].'"');
		$pfeID=$find_pfeID->fetch();
		 if($pfeID==NULL){
 ?>
            </div>

	<p style="text-align: center;"><span style="color: black; font-size: 25px;"><strong><span style="font-family: 'Times New Roman',Times,serif;"><br> Vous avez tapez un code MIXTE inexistant <br>";
</span></strong></span>
	</p>
<?php
$boolean=0;
}else
{
	$bdd->exec('INSERT INTO choixpfe (ordre, ficheVoeuxID,PFEID) VALUES("'.$op[$cpt].'","'.$f_ID.'","'.$pfeID[4].'")');
	}
	}
	if ($PFESIL[$cpt]!= NULL){
		$find_pfeID=$bdd->query('SELECT * FROM pfe WHERE CodePFE="'.$PFESIL[$cpt].'"');
		$pfeID=$find_pfeID->fetch();
         if($pfeID==NULL){
 ?>
            </div>

	<p style="text-align: center;"><span style="color: black; font-size: 25px;"><strong><span style="font-family: 'Times New Roman',Times,serif;"><br> Vous avez tapez un code SIL inexistant <br>
</span></strong></span>
	</p>
<?php
$boolean=0;
}else
{
		$bdd->exec('INSERT INTO choixpfe (ordre, ficheVoeuxID,PFEID) VALUES("'.$op[$cpt].'","'.$f_ID.'","'.$pfeID[4].'")');
	}
	}
	if ($PFESIT[$cpt]!= NULL){
		$find_pfeID=$bdd->query('SELECT * FROM pfe WHERE CodePFE="'.$PFESIT[$cpt].'"');
		$pfeID=$find_pfeID->fetch();
		 if($pfeID==NULL){
 ?>
            </div>

	<p style="text-align: center;"><span style="color: black; font-size: 25px;"><strong><span style="font-family: 'Times New Roman',Times,serif;"><br> Vous avez tapez un code SIT inexistant <br>
</span></strong></span>
	</p>
<?php
$boolean=0;
}else
{
		$bdd->exec('INSERT INTO choixpfe (ordre, ficheVoeuxID,PFEID) VALUES("'.$op[$cpt].'","'.$f_ID.'","'.$pfeID[4].'")');
	}
		}
	if ($PFESIQ[$cpt]!= NULL){
		$find_pfeID=$bdd->query('SELECT * FROM pfe WHERE CodePFE="'.$PFESIQ[$cpt].'"');
		$pfeID=$find_pfeID->fetch();
			 if($pfeID==NULL){
 ?>
            </div>

	<p style="text-align: center;"><span style="color: black; font-size: 25px;"><strong><span style="font-family: 'Times New Roman',Times,serif;"><br> Vous avez tapez un code SIQ inexistant <br>
</span></strong></span>
	</p>
<?php
$boolean=0;
}else
{
	$bdd->exec('INSERT INTO choixpfe (ordre, ficheVoeuxID,PFEID) VALUES("'.$op[$cpt].'","'.$f_ID.'","'.$pfeID[4].'")');
	}
	}
		$cpt++;
		}

	?>
	
	<?php
	 if ($boolean==0){?>
            </div>

	<p style="text-align: center;"><span style="color: black; font-size: 25px;"><strong><span style="font-family: 'Times New Roman',Times,serif;"> Veuillez remplire votre fiche de voeux à nouveaux!<br></span></strong></span>
	<br><br><br></p>
<?php
}
else
{
	?>
            </div>

	<p style="text-align: center;"><span style="color: black; font-size: 25px;"><strong><span style="font-family: 'Times New Roman',Times,serif;"> La fiche de voeux a été rempli avec succès!<br></span></strong></span></p>
	<br><br><br></p>
<?php
	
}
    ?>
</body>
</html>

