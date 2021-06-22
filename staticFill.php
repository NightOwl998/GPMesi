<!DOCTYPE html>
<html>
<head>
	<title> </title>
</head>
<body>
<?php
//connexio a la bdd.

//ALTER TABLE statistique AUTO_INCREMENT=0 pour remettre le ID a 0.

try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
        
   echo 'Échec lors de la connexion : ' . $e->getMessage();
}
//recuperer les CODES pfe/master.
$tableauPFE = array();
$tableauMASTER = array();

$reponsePFE = $bdd->query('SELECT PFEID FROM pfe');
$reponseMASTER = $bdd->query('SELECT masterID FROM master');
while ($donneesPFE = $reponsePFE->fetch())
{
$tableauPFE[]=$donneesPFE['PFEID'];
}
while ($donneesMASTER = $reponseMASTER->fetch())
{
$tableauMASTER[]=$donneesMASTER['masterID'];
}
/*$comma_separated = implode(",", $tableauPFE);
$comma_separated2 = implode(",", $tableauMASTER);
echo 'pfe'.$comma_separated;
echo 'master'.$comma_separated2 ;*/
foreach($tableauPFE as $elementPFE)

{

   $reqPFE = $bdd->prepare('SELECT ficheVoeuxID FROM choixpfe WHERE  PFEID= :PFEID ');
$reqPFE->execute(array('PFEID' => $elementPFE));
$comptPfe=0;
while ($donneepfe = $reqPFE->fetch())
{
      $comptPfe++;
}
$req = $bdd->prepare('INSERT INTO statistique(IDS,Type,nombreChoix) VALUES(:IDS, :Type,:nombreChoix)');
$req->execute(array(
	
	'IDS' => $elementPFE,
	'Type' => 'pfe',
	'nombreChoix'=>$comptPfe++
	));
}

foreach($tableauMASTER as $elementMASTER)

{


   $reqmaster = $bdd->prepare('SELECT ficheVoeuxID FROM choixmaster WHERE  masterID= :masterID');
$reqmaster->execute(array('masterID' => $elementMASTER));
$comptmaster=0;
while ($donneemaster = $reqmaster->fetch())
{
      $comptmaster++;
}
$req = $bdd->prepare('INSERT INTO statistique(IDS, Type,nombreChoix) VALUES(:IDS, :Type,:nombreChoix)');
$req->execute(array(
	
	'IDS' => $elementMASTER,
	'Type' => 'master',
	'nombreChoix'=>$comptmaster++
	));
}


?>

</body>
</html>