<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
      <link rel="stylesheet" type="text/css" href="acc.css" />
    <title>Sign Up</title>
</head>
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

                      <p style="text-align: center;"><span style=" color: #002e5b; font-size: 60px;"><strong><span style="font-family: 'Times New Roman',Times,serif;">Sign Up</span></strong></span></p>
                  </div>
                    </div>
                    <div class="section article">

                   <div class="content">

        <?php

    if (isset($_POST['email']) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['session']) )
    {
      $nom=$_POST['nom'];
      $prenom=$_POST['prenom'];
      $email= $_POST['email'];
      $session= $_POST['session'];


      //Connecter a une BDD.
   try
 {
   $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 }
  catch (Exception $e)
 {
    die('Erreur : ' . $e->getMessage());
 }
 $req = $bdd->prepare('SELECT Type, Password ,compteID FROM compte WHERE Login = :login') ;
 $req->execute(array('login' => $email));
 $verifie = $req->fetch();

if (!$verifie) {
       if ($_POST['session']=='Enseignant')
   {  $grade= $_POST['grade'];
     if (!(empty($email))  AND  (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)))// si l'adresse e-mail introduite est valide
     {      $password=bin2hex(random_bytes(5));
                 $pass_hache = password_hash($password, PASSWORD_DEFAULT);
            //recupérer l'ID de la table gestion_table.
            $reponse = $bdd->query('SELECT compteID FROM gestion_table');

             //Afficher le résultat d'une requête
            $donnees = $reponse->fetch();//Pour récupérer une entrée,
            $IDC=$donnees['compteID']+1;
            //mis a jour de la table.
            $req = $bdd->prepare('UPDATE gestion_table SET compteID = :compteID WHERE ID = 1');
            $req->execute(array('compteID' => $IDC));

            $reponse = $bdd->query('SELECT enseignantID FROM gestion_table');

             //Afficher le résultat d'une requête
            $donnees = $reponse->fetch();//Pour récupérer une entrée,
            $IDEN=$donnees['enseignantID']+1;
            //mis a jour de la table.
            $req = $bdd->prepare('UPDATE gestion_table SET enseignantID = :enseignantID WHERE ID = 1');
            $req->execute(array('enseignantID' => $IDEN));

            $req = $bdd->prepare('INSERT INTO compte( Type, Login, Password, compteID) VALUES( :Type,:Login, :Password,:compteID)');
       $req->execute(array(
           'Type' => $session,
           'Login' => $email,
           'Password' => $pass_hache,
           'compteID'=>$IDC
         ));

           $req = $bdd->prepare('INSERT INTO enseignant( NomEnseignant, PrenomEnseignant, GradeEnseigant, EmailEnseignant, AnneeUniversitaire, compteID, enseignantID) VALUES( :NomEnseignant, :PrenomEnseignant, :GradeEnseignant, :EmailEnseignant, :AnneeUniversitaire, :compteID, :enseignantID)');
         $req->execute(array(
           'NomEnseignant'=> $nom,
        'PrenomEnseignant'=> $prenom,
          'GradeEnseignant'=> $grade,
          'EmailEnseignant'=> $email,
          'AnneeUniversitaire'=> date("Y"),
          'compteID'=>$IDC,
          'enseignantID'=> $IDEN
        ));





     }

   }
   if ($_POST['session']=='Employe')
{  $fonction= $_POST['fonction'];
 if (!(empty($email))  AND  (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)))// si l'adresse e-mail introduite est valide
 {
   $password = bin2hex(random_bytes(5));
   $pass_hache = password_hash($password, PASSWORD_DEFAULT);

        //recupérer l'ID de la table gestion_table.
        $reponse = $bdd->query('SELECT compteID FROM gestion_table');

         //Afficher le résultat d'une requête
        $donnees = $reponse->fetch();//Pour récupérer une entrée,
        $IDC=$donnees['compteID']+1;
        //mis a jour de la table.
        $req = $bdd->prepare('UPDATE gestion_table SET compteID = :compteID WHERE ID = 1');
        $req->execute(array('compteID' => $IDC));

        $reponse = $bdd->query('SELECT employeID FROM gestion_table');

         //Afficher le résultat d'une requête
        $donnees = $reponse->fetch();//Pour récupérer une entrée,
        $IDEM=$donnees['employeID']+1;
        //mis a jour de la table.
        $req = $bdd->prepare('UPDATE gestion_table SET employeID = :employeID WHERE ID = 1');
        $req->execute(array('employeID' => $IDEM));

        $req = $bdd->prepare('INSERT INTO compte( Type, Login, Password, compteID) VALUES( :Type,:Login, :Password,:compteID)');
   $req->execute(array(
       'Type' => $session,
       'Login' => $email,
       'Password' => $pass_hache,
       'compteID'=>$IDC
     ));

       $req = $bdd->prepare('INSERT INTO employe( NomEmploye, PrenomEmploye, FontionEmploye, EmailEmploye, compteID, EmployeID) VALUES( :NomEmploye, :PrenomEmploye, :FonctionEmploye, :EmailEmploye, :compteID, :EmployeID)');
     $req->execute(array(
       'NomEmploye'=> $nom,
    'PrenomEmploye'=> $prenom,
      'FonctionEmploye'=> $fonction,
      'EmailEmploye'=> $email,
      'compteID'=>$IDC,
      'EmployeID'=> $IDEM
    ));


 }

}
}
else
{
  $erreurmail='Compte déja existant <br/>';

}
}



  if(isset($erreurmail))
  {

?>

         <form  method="post" action="signuperreur2.php">
           <table align="center">

<tbody style="text-align: center; margin-left:-200px; color: #155eab; font-family: Arial,Helvetica,sans-serif; font-size: 18px;">
  <tr>
     <td>
        Nom:
     </td>
     <td>
        <input type="text" name="nom"  value="<?=$_POST['nom']?>" required>
     </td>
  </tr>
  <tr>
     <td>
       Prenom:
     </td>
     <td>
        <input type="text" name="prenom" value="<?=$_POST['prenom']?>" required>
     </td>
  </tr>
            <?php
            if (isset($erreurmail))
            {
              ?>
              <tr>
                 <td>
                 Email:
                 </td>
                 <td>
                      <input type="email" name="email" required />
                 </td>
              </tr>
<p style="text-align: center; color: #FF0000">
<?php
 echo $erreurmail;
}
else {
?>
</p>
<tr>
   <td>
   Email:
   </td>
   <td>
        <input type="email" name="email"  value="<?=$_POST['email']?>" required />
   </td>
</tr>
          <?php }
  if ($_POST['session']=='Employe')
  {
    ?>

     <input type="hidden" name="session" value="Employe"/>
  <tr>
     <td>
       Fonction:
     </td>
     <td>
<input type="text" name="fonction" value="<?=$_POST['fonction']?>" required/>        </td>
  </tr>
<?php  }?>

   <?php
   if ($_POST['session']=='Enseignant')
   {
     ?>
     <input type="hidden" name="session" value="Enseignant"/>
  <input type="hidden" name="session" value="Enseignant"/>
  <tr>
     <td>
       Grade:
     </td>
     <td>
       <select name="grade">
       <option value="Professeur" > Professeur </option>
       <option value="Maitre de conférence A" > Maitre de conférence A </option>
       <option value="Maitre de conférence B" > Maitre de conférence B </option>
       <option value="Maitre assistant" > Maitre assistant</option>
         </td>
  </tr>
  <?php  }?>
</tbody>
</table>
<p style="text-align: center;" >

              <br/><input style="color: #155eab; font-family: Arial,Helvetica,sans-serif; font-size: 18px;" type="submit" value="Valider" name="envoyer"/>
</p>
       </form>
       <br>
        <br />
        <br />
  <?php
  }
else {
  /*$req1 = $bdd->prepare('INSERT INTO notification (IDcompte, Titre, Notification, Etat) VALUES(:IDcompte, \'Compte crée\', \'Votre Compte dans GspmESI a été crée vous pouvez connecter  en utilisant votre adresse email et le mot de passe:'.$password.' \', 0)');
  $req1->execute(array(
    'IDcompte' => $IDC

    ));*/
  $to      = $email;
  $subject = 'Compte GSPMesi crée';
  $message = 'Votre Compte de GspmESI a été crée vous pouvez connecter  en utilisant votre adresse email et le mot de passe: '.$password.'. Remarque:C est un test ,merci pour votre compréhension et désolé pour le dérangement' ;
  $headers = 'From: servicedesstagesesi@gmail.com' . "\r\n" .
      'Reply-To: servicedesstagesesi@gmail.com' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();

  if(mail($to, $subject, $message, $headers)) {
      
  } else {
      die('Failure: Email was not sent!');
  }



echo 'Inscription validée.';



}

    ?>
  </div>
 </div>

       </div>
   </div>

 <div id="right" class="span3" style="position : relative; left:-50px;">
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
             <ol style="list-style-image: url('152433314188167399.png');">
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

 </div>
   </div>
 <!-- the controller has determined which view to be shown in the content -->



 </div>
 </div>
 </div>





 <footer>
 <p>
 </p>
 </footer>

   <div id="css_simplesite_com_fallback" class="hide"></div>
 </div>





 </body>

</html>
