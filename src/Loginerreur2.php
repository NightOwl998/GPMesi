<!DOCTYPE html>
<html>

<?php

try
{
$bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['email']) AND isset($_POST['pass']))
{

    if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {

     $req1 = $bdd->prepare('SELECT Type, Password ,compteID FROM compte WHERE Login = :login') ;
     $req1->execute(array('login' => $_POST['email']));
     $resultat1 = $req1->fetch();

     $isPasswordCorrect = password_verify($_POST['pass'], $resultat1['Password']);

if (!$resultat1)
{
    $erreuremail='Email introduit faux <br/>';

}
else
{
    if ($isPasswordCorrect) {
      if(!isset($_SESSION))
    {
        session_start();
    }
        $_SESSION['compteID'] = $resultat1['compteID'];
        $_SESSION['Login'] = $_POST['email'];
        $_SESSION['Type'] = $resultat1['Type'];

        if  ( strcmp($resultat1['Type'],'enseignant')==0)
        {
          $req = $bdd->prepare('SELECT NomEnseignant, PrenomEnseignant FROM enseignant WHERE EmailEnseignant = :login') ;
          $req->execute(array('login' => $_POST['email']));
          $resultat = $req->fetch();
          $_SESSION['nom']=$resultat['NomEnseignant'];
          $_SESSION['prenom']=$resultat['PrenomEnseignant'];
          $_SESSION['grade']=$resultat['GradeEnseignant'];
          $_SESSION['ID']=$resultat['enseignantID'];

          header('Location: Enseignant.php');
        }
else {
  $req = $bdd->prepare('SELECT NomEmploye, PrenomEmploye FROM employe WHERE EmailEmploye = :login') ;
  $req->execute(array('login' => $_POST['email']));
  $resultat = $req->fetch();
  $_SESSION['nom']=$resultat['NomEmploye'];
  $_SESSION['prenom']=$resultat['PrenomEmploye'];
  $_SESSION['fonction']=$resultat['FontionEmploye'];
  $_SESSION['ID']=$resultat['employeID'];
    if (strcmp($resultat1['Type'], 'responsable')==0)
    {
      header('Location: Responsable.php');
    }
    else
    {
      header('Location: Employe.php');
    }

}


    }
    else {
        $erreurpass="Mot de passe incorrecte <br/>";

    }
}

     }
   }

           if(isset($erreuremail) ||isset($erreurpass))
           { ?>
             <head>
               <meta charset="utf-8" />
               	<link rel="stylesheet" type="text/css" href="acc.css" />
                 <title>Login</title>
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
             					<a href="index.php">Accueil</a>
             					</li>
             					<li style="float :right">

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
                                 <div class="content">
                 <div class="section article">
                     <div class="heading">
                         <p style="text-align: center;"><span style="color: #002e5b; font-size: 60px;"><strong><span style="font-family: 'Times New Roman',Times,serif; ">Login</span></strong></span></p>
                     </div>
                 </div>
             <div class="section article">


                 <div class="content">
                 <form  method="post" action="loginerreur2.php">
                   <p style="text-align:center;">



                     <span style="color: #FF0000; font-family: Arial,Helvetica,sans-serif; font-size: 18px;">

                      <?php
                       if (isset($erreuremail))
                       {
                         ?>


                         <label for="email" style="color: #155eab"> Email : </label> <input type="email" name="email"  required/>
                         <br>
                       <?php
                     echo  $erreuremail; }
                       else { ?>
                         <label for="email" style="color: #155eab"> Email : </label> <input type="email" name="email"   value="<?=$_POST['email']?>" required/>
                         <br>

                     <?php } ?>
                      <br />
                      <label for="pass" style="color: #155eab">Mot de passe :</label> <input type="password" name="pass"  maxlength="20"  required />
                      <br />

                      <?php
                      if (isset($erreurpass))
                      { echo  $erreurpass; }
                        ?>

                      <input type="submit" value="Connecter" />
                    </form>



                   </span><br> </p>    </div>
                </div>

                <div class="section article">
                    <div class="content">
                		</div>

                    </div>
                </div>

                            </div>
                		</div>
                	</div>
                </div>

                <!-- the controller has determined which view to be shown in the content -->


                        <div id="css_simplesite_com_fallback" class="hide"></div>
                    </div>
                </div>
                </div>





 </body>

                 <?php } ?>

               </html>
