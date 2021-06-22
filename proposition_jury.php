<!DOCTYPE html>
<html>
<head>
	<title> Proposition de Jurys PFE </title>
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
            <p style="text-align: center;"><span style="color: #002e5b; font-size: 60px;"><strong><span style="font-family: 'Times New Roman',Times,serif;">Proposition de Jurys PFE </span></strong></span></p>
        </div>
    </div>
<div class="section article">
    
    <div class="content">

	
	<?php
	error_reporting(0);

	//connexion a la bdd.
	try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (PDOException $e) {
        
   echo 'Échec lors de la connexion : ' . $e->getMessage();
   }
$n=0;
$req = $bdd->query('SELECT DISTINCT S.IDS, S.nombreChoix, ENS.enseignantID
FROM statistique S, enseignant ENS
WHERE S.Type="pfe" AND S.nombreChoix>=4
AND S.IDS IN (SELECT DISTINCT PFEID FROM choixpfe
              WHERE ficheVoeuxID IN (SELECT DISTINCT fichevoeuxID FROM fichevoeux WHERE enseignantID=ENS.enseignantID))
AND ENS.enseignantID NOT IN (SELECT DISTINCT enseignantID FROM encadrementpfe WHERE S.IDS=PFEID)
ORDER BY S.IDS;');
while($donnees = $req->fetch())
{
	$n++;
}
?>
<div style="overflow-x:auto;">
	<table>
	<tr>
		<th style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;"> <strong> Code PFE </strong></th>
		<th style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;width:50%;"> <strong> Thème </strong></th>
		<th style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;width:90%;"> <strong> Jury </strong></th>
	</tr>
<?php
$req = $bdd->query('SELECT DISTINCT S.IDS, S.nombreChoix, ENS.enseignantID
FROM statistique S, enseignant ENS
WHERE S.Type="pfe" AND S.nombreChoix>=4
AND S.IDS IN (SELECT DISTINCT PFEID FROM choixpfe
              WHERE ficheVoeuxID IN (SELECT DISTINCT fichevoeuxID FROM fichevoeux WHERE enseignantID=ENS.enseignantID))
AND ENS.enseignantID NOT IN (SELECT DISTINCT enseignantID FROM encadrementpfe WHERE S.IDS=PFEID)
ORDER BY S.IDS;');

$tab=array();
$i=0;
while($i<$n)
{
	$row=$req->fetch();
	$tab[$i][0]=$row['IDS'];
	$tab[$i][1]=$row['enseignantID'];
	$i++;
}

$req2=$bdd->query('SELECT DISTINCT S.IDS, S.nombreChoix, EPFE.enseignantID FROM statistique S, encadrementpfe EPFE WHERE S.Type="pfe" AND S.nombreChoix>=4 AND S.IDS = EPFE.PFEID ORDER BY S.IDS;');
$m=0;
while($donnees = $req2->fetch())
{
	$m++;
}

$req2=$bdd->query('SELECT DISTINCT S.IDS, S.nombreChoix, EPFE.enseignantID FROM statistique S, encadrementpfe EPFE WHERE S.Type="pfe" AND S.nombreChoix>=4 AND S.IDS = EPFE.PFEID ORDER BY S.IDS;');

$tab2=array();
$j=0;
while($j<$m)
{
	$row=$req2->fetch();
	$tab2[$j][0]=$row['IDS'];
	$tab2[$j][1]=$row['enseignantID'];
	//echo $tab2[$j][0]."______".$tab2[$j][1];
	$j++;
}
$bdd->exec('DELETE FROM jurypfe;');
$j=0;
$i=0;
while($i<=($n-2))
{
	$k=1;
	
	while($tab[$i][0]==$tab[($i+1)][0] && $k<3 && $i<=($n-2))
	{
		$k++;$i++;
		if($i>($n-2)) break;
	}
	
	if($k==3)
	{
		//echo "Le sujet PFE ".$tab[$i][0]."-------".$tab[$i][1]." , ".$tab[$i-1][1]." , ".$tab[$i-2][1];
		if($tab2[$j][0]==$tab[$i][0])
		{
			//echo "===".$tab2[$j][1];
			$bdd->exec('INSERT INTO jurypfe (enseignantID, PFEID) VALUES ("'.$tab2[$j][1].'","'.$tab[$i][0].'");');
		}
		$bdd->exec('INSERT INTO jurypfe (enseignantID, PFEID) VALUES ("'.$tab[$i][1].'","'.$tab[$i][0].'");');
		$bdd->exec('INSERT INTO jurypfe (enseignantID, PFEID) VALUES ("'.$tab[$i-1][1].'","'.$tab[$i][0].'");');
		$bdd->exec('INSERT INTO jurypfe (enseignantID, PFEID) VALUES ("'.$tab[$i-2][1].'","'.$tab[$i][0].'");');
		
		if($i <= $n-2){
		while($tab[$i][0]==$tab[$i+1][0])
		{
			$i++;
		}}
	}
	$i++;
	$j++;
}

$req->closeCursor();
$req2->closeCursor();

$req3=$bdd->query('SELECT DISTINCT ENS.NomEnseignant, ENS.PrenomEnseignant, ENS.EmailEnseignant, SUJET.PFEID, SUJET.CodePFE, SUJET.TitrePFE, SUJET.SpecialitePFE
FROM enseignant ENS, pfe SUJET, jurypfe JPFE
WHERE ENS.enseignantID=JPFE.enseignantID
AND JPFE.PFEID = SUJET.PFEID
AND ENS.enseignantID NOT IN (SELECT DISTINCT enseignantID
                             FROM encadrementpfe
                             WHERE encadrementpfe.PFEID=SUJET.PFEID)
ORDER BY SUJET.CodePFE;');
$n=0;
while($donnees = $req3->fetch())
{
	$n++;
}
$req3=$bdd->query('SELECT DISTINCT ENS.NomEnseignant, ENS.PrenomEnseignant, ENS.EmailEnseignant, SUJET.PFEID, SUJET.CodePFE, SUJET.TitrePFE, SUJET.SpecialitePFE
FROM enseignant ENS, pfe SUJET, jurypfe JPFE
WHERE ENS.enseignantID=JPFE.enseignantID
AND JPFE.PFEID = SUJET.PFEID
AND ENS.enseignantID NOT IN (SELECT DISTINCT enseignantID
                             FROM encadrementpfe
                             WHERE encadrementpfe.PFEID=SUJET.PFEID)
ORDER BY SUJET.CodePFE;');
$tab3=array();
$i=0;
while($i<$n)
{
	$row=$req3->fetch();
	$tab3[$i][0]=$row['NomEnseignant'];
	$tab3[$i][1]=$row['PrenomEnseignant'];
	$tab3[$i][2]=$row['EmailEnseignant'];
	$tab3[$i][3]=$row['PFEID'];
	$tab3[$i][4]=$row['CodePFE'];
	$tab3[$i][5]=$row['TitrePFE'];
	$tab3[$i][6]=$row['SpecialitePFE'];
	$i++;
}

$req4=$bdd->query('SELECT DISTINCT ENS.NomEnseignant, ENS.PrenomEnseignant, ENS.EmailEnseignant, SUJET.PFEID, SUJET.CodePFE, SUJET.TitrePFE, SUJET.SpecialitePFE
FROM enseignant ENS, pfe SUJET, jurypfe JPFE
WHERE ENS.enseignantID=JPFE.enseignantID
AND JPFE.PFEID = SUJET.PFEID
AND ENS.enseignantID IN (SELECT DISTINCT enseignantID
                             FROM encadrementpfe
                             WHERE encadrementpfe.PFEID=SUJET.PFEID)
ORDER BY SUJET.CodePFE;');


$m=0;
while($donnees = $req4->fetch())
{
	$m++;
}
$req4=$bdd->query('SELECT DISTINCT ENS.NomEnseignant, ENS.PrenomEnseignant, ENS.EmailEnseignant, SUJET.PFEID, SUJET.CodePFE, SUJET.TitrePFE, SUJET.SpecialitePFE
FROM enseignant ENS, pfe SUJET, jurypfe JPFE
WHERE ENS.enseignantID=JPFE.enseignantID
AND JPFE.PFEID = SUJET.PFEID
AND ENS.enseignantID IN (SELECT DISTINCT enseignantID
                             FROM encadrementpfe
                             WHERE encadrementpfe.PFEID=SUJET.PFEID)
ORDER BY SUJET.CodePFE;');

$tab4=array();
$j=0;
while($j<$m)
{
	$row=$req4->fetch();
	$tab4[$j][0]=$row['NomEnseignant'];
	$tab4[$j][1]=$row['PrenomEnseignant'];
	$tab4[$j][2]=$row['EmailEnseignant'];
	$tab4[$j][3]=$row['PFEID'];
	$tab4[$j][4]=$row['CodePFE'];
	$tab4[$j][5]=$row['TitrePFE'];
	$tab4[$j][6]=$row['SpecialitePFE'];
	$j++;
}


$j=0;
$i=0;
while($i<=($n-2))
{
	$k=1;
	
	while($tab3[$i][3]==$tab3[($i+1)][3] && $k<3 && $i<=($n-2))
	{
		$k++;$i++;
		if($i>($n-2)) break;
	}
	
	if($k==3)
	{
		?>
		<tr>
		<td style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;"><?php	echo $tab3[$i][4];?></td>
		<td style="border-bottom: 1px solid #ddd;padding:15px;text-align: center;height: 30px;"><?php	echo $tab3[$i][5];?></td>
		<td style="border-bottom: 1px solid #ddd;padding:15px;text-align: left;height: 30px;vertical-align: bottom;">
		
		<?php
		if($tab4[$j][3]==$tab3[$i][3])
		{
			echo $tab4[$j][0]."  ".$tab4[$j][1]."   ".$tab4[$j][2]." (Encadreur)";?></br><?php
		}
		
		echo " 1. ".$tab3[$i][0]."  ".$tab3[$i][1]."  ".$tab3[$i][2];?></br><?php
		echo " 2. ".$tab3[$i-1][0]."  ".$tab3[$i-1][1]."  ".$tab3[$i-1][2];?></br><?php
		echo " 3. ".$tab3[$i-2][0]."  ".$tab3[$i-2][1]."  ".$tab3[$i-2][2];?></br></td><?php
		
		if($i <= $n-2){
		while($tab3[$i][3]==$tab3[$i+1][3])
		{
			$i++;
		}}
	}
	$i++;
	$j++;
}

$req3->closeCursor();
$req4->closeCursor();




?>
	
	</table>
	</div>
</div>

<div class="heading">
            <p style="text-align: center;"><span style="color: #002e5b; font-size: 60px;"><strong><span style="font-family: 'Times New Roman',Times,serif;">Proposition de Jurys MASTER </span></strong></span></p>
        </div>
		    <div class="content">

	<?php
	//connexion a la bdd.
	try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (PDOException $e) {
        
   echo 'Échec lors de la connexion : ' . $e->getMessage();
   }
$n=0;
$req = $bdd->query('SELECT DISTINCT S.IDS, S.nombreChoix, ENS.enseignantID
FROM statistique S, enseignant ENS
WHERE S.Type="master" AND S.nombreChoix>=3
AND S.IDS IN (SELECT DISTINCT masterID FROM choixmaster
              WHERE ficheVoeuxID IN (SELECT DISTINCT fichevoeuxID FROM fichevoeux
                                     WHERE enseignantID=ENS.enseignantID))
AND ENS.enseignantID NOT IN (SELECT DISTINCT enseigantID FROM encadrementmaster WHERE S.IDS=masterID)
ORDER BY S.IDS;');
while($donnees = $req->fetch())
{
	$n++;
}
?>

<div style="overflow-x:auto;">
	<table>
	<tr>
		<th style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;"> <strong> Code MASTER </strong></th>
		<th style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;width:50%;"> <strong> Thème </strong></th>
		<th style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;vertical-align: bottom;width:90%;"> <strong> Jury </strong></th>
	</tr>


<?php
$req = $bdd->query('SELECT DISTINCT S.IDS, S.nombreChoix, ENS.enseignantID
FROM statistique S, enseignant ENS
WHERE S.Type="master" AND S.nombreChoix>=2
AND S.IDS IN (SELECT DISTINCT masterID FROM choixmaster
              WHERE ficheVoeuxID IN (SELECT DISTINCT fichevoeuxID FROM fichevoeux
                                     WHERE enseignantID=ENS.enseignantID))
AND ENS.enseignantID NOT IN (SELECT DISTINCT enseigantID FROM encadrementmaster WHERE S.IDS=masterID)
ORDER BY S.IDS;');

$tab=array();
$i=0;
while($i<$n)
{
	$row=$req->fetch();
	$tab[$i][0]=$row['IDS'];
	$tab[$i][1]=$row['enseignantID'];
	$i++;
}

$bdd->exec('DELETE FROM jurymaster;');

$i=0;
while($i<=($n-2))
{
	$k=1;
	
	while($tab[$i][0]==$tab[($i+1)][0] && $k<2 && $i<=($n-2))
	{
		$k++;$i++;
		if($i>($n-2)) break;
	}
	
	if($k==2)
	{
		
		
		$bdd->exec('INSERT INTO jurymaster (enseigantID, masterID) VALUES ("'.$tab[$i][1].'","'.$tab[$i][0].'");');
		$bdd->exec('INSERT INTO jurymaster (enseigantID, masterID) VALUES ("'.$tab[$i-1][1].'","'.$tab[$i][0].'");');
		
		
		if($i < $n-2){
		while($tab[$i][0]==$tab[$i+1][0])
		{
			$i++;
			if($i>=$n-2) break;
		}
		}
	}
	$i++;
	
}

$req->closeCursor();
$req2->closeCursor();

$req3=$bdd->query('SELECT DISTINCT ENS.NomEnseignant, ENS.PrenomEnseignant, ENS.EmailEnseignant, SUJET.masterID, SUJET.CodeMaster, SUJET.TitreMaster, SUJET.SpecialiteMaster
FROM enseignant ENS, master SUJET, jurymaster JMASTER
WHERE ENS.enseignantID=JMASTER.enseigantID
AND JMASTER.masterID = SUJET.masterID
AND ENS.enseignantID NOT IN (SELECT DISTINCT enseigantID
                             FROM encadrementmaster
                             WHERE encadrementmaster.masterID=SUJET.masterID)
ORDER BY SUJET.CodeMaster;');
$n=0;
while($donnees = $req3->fetch())
{
	$n++;
}
$req3=$bdd->query('SELECT DISTINCT ENS.NomEnseignant, ENS.PrenomEnseignant, ENS.EmailEnseignant, SUJET.masterID, SUJET.CodeMaster, SUJET.TitreMaster, SUJET.SpecialiteMaster
FROM enseignant ENS, master SUJET, jurymaster JMASTER
WHERE ENS.enseignantID=JMASTER.enseigantID
AND JMASTER.masterID = SUJET.masterID
AND ENS.enseignantID NOT IN (SELECT DISTINCT enseigantID
                             FROM encadrementmaster
                             WHERE encadrementmaster.masterID=SUJET.masterID)
ORDER BY SUJET.CodeMaster;');
$tab3=array();
$i=0;
while($i<$n)
{
	$row=$req3->fetch();
	$tab3[$i][0]=$row['NomEnseignant'];
	$tab3[$i][1]=$row['PrenomEnseignant'];
	$tab3[$i][2]=$row['EmailEnseignant'];
	$tab3[$i][3]=$row['masterID'];
	$tab3[$i][4]=$row['CodeMaster'];
	$tab3[$i][5]=$row['TitreMaster'];
	$tab3[$i][6]=$row['SpecialiteMaster'];
	$i++;
}

$i=0;
while($i<=($n-2))
{
	$k=1;
	
	while($tab3[$i][3]==$tab3[($i+1)][3] && $k<2 && $i<=($n-2))
	{
		$k++;$i++;
		if($i>($n-2)) break;
	}
	
	if($k==2)
	{
		?>
		<tr>
		<td style="border-bottom: 1px solid #ddd;padding: 15px;text-align: center;height: 30px;"><?php	echo $tab3[$i][4];?></td>
		<td style="border-bottom: 1px solid #ddd;padding:15px;text-align: center;height: 30px;"><?php	echo $tab3[$i][5];?></td>
		<td style="border-bottom: 1px solid #ddd;padding:15px;text-align: left;height: 30px;vertical-align: bottom;">
		
		<?php
		
		echo " 1. ".$tab3[$i][0]."  ".$tab3[$i][1]."  ".$tab3[$i][2];?></br><?php
		echo " 2. ".$tab3[$i-1][0]."  ".$tab3[$i-1][1]."  ".$tab3[$i-1][2];?></br></td><?php
		
		if($i <= $n-2){
		while($tab3[$i][3]==$tab3[$i+1][3])
		{
			$i++;
		}}
	}
	$i++;
	
}

$req3->closeCursor();






?>
	
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
        <h4>Responsable</h4>
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