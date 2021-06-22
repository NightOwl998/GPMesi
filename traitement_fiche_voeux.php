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


$i=$bdd->query('SELECT * FROM gestion_table WHERE ID=1');
			$idg=$i->fetch();
$f_ID=$idg[1]+1;
$bdd->exec('UPDATE gestion_table SET ficheVoeuxID = "'.$f_ID.'" WHERE ID=1');	
$bdd->exec('INSERT INTO fichevoeux (AnneeUniversitaire,DateRemise,enseignantID,ficheVoeuxID) VALUES("'.$annee.'","'.$date.'","'.$enseignantID.'","'.$f_ID.'")');
$cpt=1;
foreach($_POST['MASTER'] as $mst)
{$master[$cpt]=$mst;
$find_mstID=$bdd->query('SELECT * FROM master WHERE CodeMaster="'.$master[$cpt].'"');
$mstID=$find_mstID->fetch();
$bdd->exec('INSERT INTO choixmaster (ordre, ficheVoeuxID, masterID) VALUES("'.$cpt.'","'.$f_ID.'","'.$mstID[4].'")');
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
		$bdd->exec('INSERT INTO choixpfe (ordre, ficheVoeuxID,PFEID) VALUES("'.$op[$cpt].'","'.$f_ID.'","'.$pfeID[4].'")');
	}
	if ($PFESIL[$cpt]!= NULL){
		$find_pfeID=$bdd->query('SELECT * FROM pfe WHERE CodePFE="'.$PFESIL[$cpt].'"');
		$pfeID=$find_pfeID->fetch();
        $bdd->exec('INSERT INTO choixpfe (ordre, ficheVoeuxID, PFEID) VALUES("'.$op[$cpt].'","'.$f_ID.'","'.$pfeID[4].'")');
		}
	if ($PFESIT[$cpt]!= NULL){
		$find_pfeID=$bdd->query('SELECT * FROM pfe WHERE CodePFE="'.$PFESIT[$cpt].'"');
		$pfeID=$find_pfeID->fetch();
		$bdd->exec('INSERT INTO choixpfe (ordre, ficheVoeuxID, PFEID) VALUES("'.$op[$cpt].'","'.$f_ID.'","'.$pfeID[4].'")');
		}
	if ($PFESIQ[$cpt]!= NULL){
		$find_pfeID=$bdd->query('SELECT * FROM pfe WHERE CodePFE="'.$PFESIQ[$cpt].'"');
		$pfeID=$find_pfeID->fetch();
		$bdd->exec('INSERT INTO choixpfe (ordre, ficheVoeuxID,PFEID) VALUES("'.$op[$cpt].'","'.$f_ID.'","'.$pfeID[4].'")');
		}
		$cpt++;
		}

		header('Location: Enseignant.php');
     ?>
</body>
</html>

