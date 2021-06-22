<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        	<link rel="stylesheet" type="text/css" href="acc.css" />
        <title>Changer Mot De Passe</title>
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
    	        <a class="title  title-link" href="Enseignant.php">
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
    						<a href="fichiers_aide\help_enseignant.php"><img style="width:30px;height:30px;-webkit-border-radius:15px;-moz-border-radius:15px;-o-border-radius:15px;border-radius:15px;" src="help1.png"></a>

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

            <p style="text-align: center;"><span style="color: #002e5b; font-size: 60px;"><strong><span style="font-family: 'Times New Roman',Times,serif;">Nouveau Mot De Passe</span></strong></span></p>
        </div>

					</div>
          <div class="section article">

         <div class="content">



           <?php
                      if(!isset($_SESSION))
                    {
                        session_start();
                    }
                  $oldpass=$_POST['oldpass'];
                 $password= $_POST['newpass'];
                 $repeat_password= $_POST['newpass2'];
                 $id=$_SESSION['compteID'];
               if ( (strcmp($_POST['newpass'], $_POST['oldpass']) != 0)AND (strcmp($_POST['newpass'], $_POST['newpass2']) == 0))//ancient mot de passe==mot de passe==mot de passe repété.
               {
                  try
                {
                  $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

                }
                 catch (Exception $e)
                {
                   die('Erreur : ' . $e->getMessage());
                }
                $req1 = $bdd->prepare('SELECT Password FROM compte WHERE Login = :login') ;
                $req1->execute(array('login' => $_SESSION['Login']));
                $verifie = $req1->fetch();

                 $isPasswordCorrect = password_verify($oldpass, $verifie['Password']);

                 if ($isPasswordCorrect)
                 {

                  if  (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[0-9]).*$#",$_POST['newpass'] ))
                  {


                     $pass_hache = password_hash($_POST['newpass'], PASSWORD_DEFAULT);

                     $req = $bdd->prepare('UPDATE compte SET  Password = :pass WHERE compteID= :ID');
                     $req->execute(array('pass' => $pass_hache,'ID' => $id));


                  }
              }
              else {
                $erreurpass1= 'Le mot de passe introduit est incorrect <br/>';
              }
               }
              if ((strcmp($_POST['newpass'], $_POST['oldpass']) == 0))
               {
                 $erreurpass2= "Le nouveau mot de passe ne doit pas etre le meme que l'ancient <br/>";

               }

              if  (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[0-9]).*$#",$_POST['newpass'] )==0)
              {
                $erreurpass3= ' Le mot de passe doit etre de 8 à 20 caracteres et <br/> contenir des nombres et des letters <br/>';
              }
              if  (strcmp($_POST['newpass'], $_POST['newpass2']) != 0)
              {
              $erreurpass4= 'Il faut saisir le meme mot de passe<br/>';
              }

              if (isset($erreurpass1) || isset($erreurpass2) || isset($erreurpass3) || isset($erreurpass4))
              {
              ?>
              <form  method="post" action="newpassEns.php">
                  <p style="text-align: center; " >

                    <span style="color:#FF0000; font-family: Arial,Helvetica,sans-serif; font-size: 18px;">
                      <label for="oldpass" style="color: #155eab;">Mot de passe courant :  <input type="password" name="oldpass" id="oldpass" maxlength="20"  required /></label>

                      <?php
                      if (isset($erreurpass1))
                      { echo $erreurpass1;}
                        ?>
                          <br />
                   <label for="newpass"  style="color: #155eab;">Nouveau Mot de passe : <input type="password" name="newpass" id="newpass" maxlength="20"  required /> </label>

                   <?php
                   if (isset($erreurpass2))
                   { echo $erreurpass2;}
                   else if (isset($erreurpass3))
                   {
                     echo $erreurpass3;
                   }
                     ?>
                      <br />
                   <label for="newpass2"  style="color: #155eab;">Répéter le mot de passe : <input type="password" name="newpass2" id="newpass2" maxlength="20" required /></label>

                   <?php
                   if (isset($erreurpass4))
                   {echo $erreurpass4;}
                     ?>
                     <br />
                   <input style="color: #155eab; font-family: Arial,Helvetica,sans-serif; font-size: 18px;" type="submit" value="Valider" />
                </form>

               <br />

               <br />
                 </span>
                   </p>
              <?php
              }
              else
              {
                echo 'Mot de passe changé avec succès.';
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
                                     <ol style="list-style-image: url('152433314188167399.png');">
                                       <li><a  style="text-decoration: none" href="Formulaire.php"><span>La Fiche De voeux </span></a></li>




                                 </ol>
                                 </li>




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
