<?php
require_once("include_path_inc.php");

include ("src/jpgraph.php");
include ("src/jpgraph_bar.php");

//connexion a la bdd.
	try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (PDOException $e) {
        
   echo 'Échec lors de la connexion : ' . $e->getMessage();
   }

   $req = $bdd->query('select P.CodePFE, S.nombreChoix from pfe P, statistique S where P.PFEID = S.IDS AND S.Type="pfe";');

$tableauSujets = array();
$tableauNombreChoix = array();
// **********************************************
// Extraction des données dans la base de données
// *************************************************

while($row=$req->fetch()) {
$tableauSujets[] = $row['CodePFE'];
$tableauNombreChoix[] = $row['nombreChoix'];
}

// *******************
// Création du graphique
// *******************
// Construction du conteneur
// Spécification largeur et hauteur
$graph = new Graph(600,500);
 $graph->ClearTheme(); 
 $graph->SetFrame(false);
// Réprésentation linéaire
$graph->SetScale("textlin");

// Création du graphique histogramme
$bplot = new BarPlot($tableauNombreChoix);
// Spécification des couleurs des barres
$bplot->SetFillColor(array('#263c52'));
$bplot->SetWeight(1);
// Une ombre pour chaque barre
$bplot->SetShadow();

// Fixer l'aspect de la police
$bplot->value->SetFont(FF_ARIAL,FS_NORMAL,9);

// Ajouter les barres au conteneur
$graph->Add($bplot);

// Titre pour l'axe horizontal(axe x) et vertical (axe y)
$graph->xaxis->title->Set("Sujets PFE");
$graph->yaxis->title->Set("Nombre de choix");
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

// Légende pour l'axe horizontal
$graph->xaxis->SetTickLabels($tableauSujets);

// Afficher le graphique
$graph->img->SetImgFormat("png");
$graph->Stroke();
?>