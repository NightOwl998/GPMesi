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
                    <a href="Enseignants_Retardataires.php">Responsable</a>
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
            <p style="text-align: center;"><span style="color: #002e5b; font-size: 60px;"><strong><span style="font-family: 'Times New Roman',Times,serif;">Responsable de Service de Stage</span></strong></span></p><br/>
        </div>
    </div>
<div class="section article">
    
    <div class="content">

<?php
if(isset($_POST['niveau'])  AND isset($_POST['Specialite']) AND isset($_POST['code']) AND isset($_POST['Titre'])  AND isset($_POST['motcle'])  AND $_POST['nombreMotCle'] )
{   
    
// c'est ici qu'on vérifie si au moins un champ est vide avec OR :
    if(  empty($_POST['Specialite']) OR empty($_POST['motcle'])OR empty($_POST['code']) OR empty($_POST['Titre']) OR empty($_POST['nombreMotCle']))
    {
        echo '
        <p>Attention, vous avez aoublié de remplir les champs suivants :</p>
        <ul>';
    }
    else
    {
    
        $AnneeUniversitaire=date('Y');
        $Specialite=htmlspecialchars($_POST['Specialite']);
        $motCle =htmlspecialchars($_POST['motcle']);
        
        $Titre=htmlspecialchars($_POST['Titre']);
        $Code=htmlspecialchars($_POST['code']);
        $niveau=htmlspecialchars($_POST['niveau']);
        $nombreMotCle=htmlspecialchars($_POST['nombreMotCle'] =(int) $_POST['nombreMotCle']);
    }
}
   //Tester les Mots clé. 

$code= $_POST['code'];
try
{
$bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}

if (strcmp($niveau,"master")==0)
{
    $req = $bdd->prepare('SELECT * FROM master WHERE CodeMaster= :code') ;
}
else
{
    $req = $bdd->prepare('SELECT * FROM pfe WHERE CodePFE= :code') ;
}

$req->execute(array('code' => $code));
$verifie = $req->fetch(); //On fait une requete du ligne ou le champs login contient l'email introduit

if (!$verifie)  // si verifie est vide donc l'email n'existe pas deja, on fait le traitment
{

if (substr_count($motCle,',')==$nombreMotCle-1)
{    
        


// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['fichier']) AND $_FILES['fichier']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['fichier']['size'] <= 1000000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['fichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('doc', 'pdf','docx');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['fichier']['tmp_name'], 'C:\wamp64\www\Projet\FicheDescriptive/' . basename($_FILES['fichier']['name']));
                        
                }
        }
}
try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
        
   echo 'Échec lors de la connexion : ' . $e->getMessage();
}

$repertoire="C:\wamp64\www\Projet\FicheDescriptive/";
//recupérer l'ID de la table gestion_table.
     $reponse = $bdd->query('SELECT masterID,PFEID FROM gestion_table');

      //Afficher le résultat d'une requête
     $donnees = $reponse->fetch();//Pour récupérer une entrée,
    
     

if (strcmp($niveau,"master")==0)
{
    $comp=0;
    if (isset ($_POST['encadreureNom1']) && isset($_POST['encadreurepreNom1']))
{
    //echo 'le premier';
$req2 = $bdd->prepare('SELECT * FROM enseignant WHERE NomEnseignant =:NomEnseignant AND PrenomEnseignant=:PrenomEnseignant');
     
$req2->execute(array('NomEnseignant' =>$_POST['encadreureNom1'] ,
                   'PrenomEnseignant' => $_POST['encadreurepreNom1']));
$donnees2 = $req2->fetch();
if (!($donnees2))
{
    $comp=$comp+1;
}
}
if (!(empty($_POST['encadreureNom2'])) && !(empty($_POST['encadreurepreNom2']))) {
    $req23 = $bdd->prepare('SELECT * FROM enseignant WHERE NomEnseignant =:NomEnseignant AND  PrenomEnseignant=:PrenomEnseignant ');
$req23->execute(array('NomEnseignant' =>$_POST['encadreureNom2'] , 'PrenomEnseignant' => $_POST['encadreurepreNom2']));
$donnees23 = $req23->fetch();
if (!($donnees23))
{
    $comp=$comp+1;
}
}
if ($comp==0)
{



    $IDmaster=$donnees['masterID']+1;
     //mis a jour de la table.
     $req = $bdd->prepare('UPDATE gestion_table SET masterID = :masterID WHERE ID = 1');
     $req->execute(array(
    'masterID' => $IDmaster
    
    
    ));

    

$req=$bdd->prepare('INSERT INTO master (CodeMaster, AnneeUniversitaire,TitreMaster,SpecialiteMaster,masterID,chemin_fichier,motCle) VALUES(:CodeMaster, :AnneeUniversitaire,:TitreMaster,:SpecialiteMaster,:masterID,:chemin_fichier,:motCle)');
$req->execute(array(
    'CodeMaster' => $Code,
    'AnneeUniversitaire' => $AnneeUniversitaire,
    'TitreMaster' => $Titre,
    'SpecialiteMaster' => $Specialite,
    'masterID'=> $IDmaster,
    'chemin_fichier'=>$repertoire.$_FILES['fichier']['name'],
    
    'motCle'=>$motCle
    )); 
?>
<script type="text/javascript">
    alert('Sujet ajouté avec succés');
    window.location = 'inscription_soutenance .php';


</script>
<?php
}
else
{
    ?>
    <script type="text/javascript">
        alert('enseignant encadreure non inscris');

        window.location = 'inscription_soutenance .php';
            
            </script>
            <?php
}
//sauvgarde des encadreures 
if (isset ($_POST['encadreureNom1']) && isset($_POST['encadreurepreNom1']))
{
    //echo 'le premier';

$req2 = $bdd->prepare('SELECT * FROM enseignant WHERE NomEnseignant =:NomEnseignant AND PrenomEnseignant=:PrenomEnseignant');
     
$req2->execute(array('NomEnseignant' =>$_POST['encadreureNom1'] ,
                   'PrenomEnseignant' => $_POST['encadreurepreNom1']));
$donnees2 = $req2->fetch();
if ($donnees2)
{
    $req1=$bdd->prepare('INSERT INTO encadrementmaster (enseigantID,masterID) VALUES(:enseigantID,:masterID)');

$req1->execute(array(
    'enseigantID' => $donnees2['enseignantID'],
    'masterID' => $IDmaster
    
    )); 
}

}
if (!(empty($_POST['encadreureNom2'])) && !(empty($_POST['encadreurepreNom2']))) {
    //echo 'le deuxiemme';
    $req23 = $bdd->prepare('SELECT * FROM enseignant WHERE NomEnseignant =:NomEnseignant AND  PrenomEnseignant=:PrenomEnseignant ');
$req23->execute(array('NomEnseignant' =>$_POST['encadreureNom2'] , 'PrenomEnseignant' => $_POST['encadreurepreNom2']));
$donnees23 = $req23->fetch();
if ($donnees23)
{
    $req13=$bdd->prepare('INSERT INTO encadrementmaster (enseigantID,masterID

) VALUES(:enseigantID,:masterID)');
$req13->execute(array(
    'enseigantID' => $donnees23['enseignantID'],
    'masterID' => $IDmaster
    
    )); 

}
}


}
if (strcmp($niveau,"pfe")==0)
{
    $comp=0;
    if (isset ($_POST['encadreureNom1']) && isset($_POST['encadreurepreNom1']))
{
    //echo 'le premier';
$req2 = $bdd->prepare('SELECT * FROM enseignant WHERE NomEnseignant =:NomEnseignant AND PrenomEnseignant=:PrenomEnseignant');
     
$req2->execute(array('NomEnseignant' =>$_POST['encadreureNom1'] ,
                   'PrenomEnseignant' => $_POST['encadreurepreNom1']));
$donnees2 = $req2->fetch();
if (!($donnees2))
{
    $comp=$comp+1;
}
}
if (!(empty($_POST['encadreureNom2'])) && !(empty($_POST['encadreurepreNom2']))) {
    $req23 = $bdd->prepare('SELECT * FROM enseignant WHERE NomEnseignant =:NomEnseignant AND  PrenomEnseignant=:PrenomEnseignant ');
$req23->execute(array('NomEnseignant' =>$_POST['encadreureNom2'] , 'PrenomEnseignant' => $_POST['encadreurepreNom2']));
$donnees23 = $req23->fetch();
if (!($donnees23))
{
    $comp=$comp+1;
}
}
if ($comp==0)
{
    
          $IDPfe=$donnees['PFEID']+1;
          $req = $bdd->prepare('UPDATE gestion_table SET PFEID = :PFEID WHERE ID = 1');
     $req->execute(array(
    'PFEID' => $IDPfe
    )); 

$req=$bdd->prepare('INSERT INTO pfe (CodePFE, AnneeUniversitaire,TitrePFE ,SpecialitePFE ,PFEID ,chemin_fichier,motCle) VALUES(:CodePfe, :AnneeUniversitaire,:TitrePfe,:SpecialitePfe,:PFEID ,:chemin_fichier,:motCle)');
$req->execute(array(
    'CodePfe' => $Code,
    'AnneeUniversitaire' => $AnneeUniversitaire,
    'TitrePfe' => $Titre,
    'SpecialitePfe' => $Specialite,
    'PFEID'=>$IDPfe,
    'chemin_fichier'=>$repertoire.$_FILES['fichier']['name'],    
    'motCle'=>$motCle

    ));
?>
<script type="text/javascript">
    alert('Sujet ajouté avec succés');
      window.location = 'inscription_soutenance .php';

</script>
<?php
    } 
    else
    {
        ?>
    <script type="text/javascript">
        alert('enseignant encadreure non inscris');

        window.location = 'inscription_soutenance .php';
            
            </script>
            <?php

    }
//sauvgarde des encadreures 
//sauvgarde des encadreures 
if (isset ($_POST['encadreureNom1']) && isset($_POST['encadreurepreNom1']))
{
    //echo 'le premier';
$req2 = $bdd->prepare('SELECT * FROM enseignant WHERE NomEnseignant =:NomEnseignant AND PrenomEnseignant=:PrenomEnseignant');
     
$req2->execute(array('NomEnseignant' =>$_POST['encadreureNom1'] ,
                   'PrenomEnseignant' => $_POST['encadreurepreNom1']));
$donnees2 = $req2->fetch();
if ($donnees2)
{

    $req1=$bdd->prepare('INSERT INTO encadrementpfe (enseignantID,PFEID) VALUES(:enseignantID,:PFEID)');
$req1->execute(array(
    'enseignantID' => $donnees2['enseignantID'],
    'PFEID' => $IDPfe
    
    )); 
}

}
if (isset($_POST['encadreureNom2']) && isset($_POST['encadreurepreNom2'])) {
    //echo 'le deuxiemme';
    $req23 = $bdd->prepare('SELECT * FROM enseignant WHERE NomEnseignant =:NomEnseignant AND  PrenomEnseignant=:PrenomEnseignant ');
$req23->execute(array('NomEnseignant' =>$_POST['encadreureNom2'] , 'PrenomEnseignant' => $_POST['encadreurepreNom2']));
$donnees23 = $req23->fetch();
if ($donnees23)
{
    $req13=$bdd->prepare('INSERT INTO encadrementpfe (enseignantID,PFEID

) VALUES(:enseignantID,:PFEID)');
$req13->execute(array(
    'enseignantID' => $donnees23['enseignantID'],
    'PFEID' => $IDPfe
    
    )); 

}
}


}
}
else 
   { 
    ?>
    <script type="text/javascript">
        alert('Erreur dans le nombres des mots clés introduit');
        
        window.location = 'inscription_soutenance .php';
    </script>
    <?php

    
}
}
else //Sinon, on affiche un erreur, un utilisateur ne peut pas avoir deux comptes
{
        
      
      
      ?> 
        <script type="text/javascript">
        alert('sujet existe déja');
        window.location = 'inscription_soutenance .php';
            
            
        </script>
 <?php     
  exit();

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





