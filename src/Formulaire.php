<!DOCTYPE html>
<html>
<head>
	<title> Fiche de voeux </title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="acc2.css" />
	 <link  rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>

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
	        <a class="title  title-link" href="Acc.html">
                GPMesi
            </a> 
	    </div>
	    <div class="subtitle">
	        Gestion de soutenances de PFE/MASTER de l&#39;esi
	    </div>
	</div>
</div>  <!-- these are the titles -->


<div class="navvbar navvbar-compact">
    <div class="navvbar-inner">
        <div class="container">
            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <a class="btnn btnn-navvbar" data-toggle="collapsee" data-target=".navv-collapse" title="Togglee menu">
                
            </a>
            
			<!-- Everything you want hidden at 940px or less, place within here -->
            <div class="navv-collapse collapsee" >
                <ul class="navv" id="topMenu" data-submenu="horizontal">
					<li class=" activee " >
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
            <p style="text-align: center;"><span style="color: #002e5b; font-size: 60px;"><strong><span style="font-family: 'Times New Roman',Times,serif;">Fiche de Voeux <br> </span></strong></span></p>
        </div>
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
</div>

<form method="post" action="traitement_fiche_voeux.php" id="insert_form">


<div>
<span id="error"></span>
<table  class="table table-hover small-text" id="tb">
<tr class="tr-header" >
<th style="position:relative;left:20px;border-bottom: 1px solid #ddd;text-align: center;"><strong>Ordre de priorité</strong></th>
<th style="position:relative;left:30px;border-bottom: 1px solid #ddd;text-align: center;"><strong>PFE SIT</strong></th>
<th style="position:relative;left:30px;border-bottom: 1px solid #ddd;text-align: center;"><strong>PFE SIQ</strong></th>
<th style="position:relative;left:30px;border-bottom: 1px solid #ddd;text-align: center;"><strong>PFE SIL</strong></th>
<th style="position:relative;left:30px;border-bottom: 1px solid #ddd;text-align: center;"><strong>PFE MIXTE</strong></th>
<th style="position:relative;left:30px;border-bottom: 1px solid #ddd;text-align: center;"><strong>MASTER</strong></th>
<th style="position:relative;left:30px;border-bottom: 1px solid #ddd;text-align: center;"></th>
<th style="position:relative;left:30px;border-bottom: 1px solid #ddd;text-align: center;"></th>


</tr>

<tr>
<td style="position:relative;left:20px;border-bottom: 1px solid #ddd;text-align: center;"><input type="text" name="OP[]" id="OP" placeholder="Ordre de priorit&eacute;" maxlength="2" class="form-control OP" /></td>
<td style="position:relative;left:30px;border-bottom: 1px solid #ddd;text-align: center;"><input type="text" name="PFESIT[]" placeholder="Code" maxlength="10" class="form-control PFESIT" style="width:100px;" /></td>
<td style="position:relative;left:30px;border-bottom: 1px solid #ddd;text-align: center;"><input type="text" name="PFESIQ[]" placeholder="Code" maxlength="10" class="form-control PFESIQ" style="width:100px;"/></td>
<td style="position:relative;left:30px;border-bottom: 1px solid #ddd;text-align: center;"><input type="text" name="PFESIL[]" placeholder="Code" maxlength="10" class="form-control PFESIL" style="width:100px;"/></td>
<td style="position:relative;left:30px;border-bottom: 1px solid #ddd;text-align: center;"><input type="text" name="PFEMIXTE[]" placeholder="Code" maxlength="10" class="form-control PFEMIXTE" style="width:100px;"/></td>
<td style="position:relative;left:30px;border-bottom: 1px solid #ddd;text-align: center;"><input type="text" name="MASTER[]" placeholder="Code" maxlength="10" class="form-control MASTER" style="width:100px;"/></td>
<td style="position:relative;left:30px;border-bottom: 1px solid #ddd;text-align: center;""><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span class="glyphicon glyphicon-plus"></span></a></td>
<td style="position:relative;left:30px;border-bottom: 1px solid #ddd;text-align: center;""><a href="javascript:void(0);"  class="remove" name="remove"><span class="glyphicon glyphicon-remove" style="position:relative;left:-80px;"></span></a></td></tr>
</tr>

</table>

</br>

<div align="center">
<input type="submit" name="submit" id="submit" value="Valider" />

</div>
</br></br>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type='text/javascript'>
$(document).ready(function(){
	
	var count=1;
	var nbPFE=0;
	var nbMASTER=0;
	var nbSIT=0, nbSIQ=0, nbSIL=0, nbMixte=0;
	var videSIL, videSIQ, videSIT, videMaster, videMixte;
	
	
	
	$(document).on('click', '#addMore', function(){
		
		var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
              data.find("input").val('');
		
		count=count+1;
	});
	
	$(document).on('click', '.remove', function(){
		var trIndex = $(this).closest("tr").index();
            if(trIndex>1) {
             $(this).closest("tr").remove();
           } else {
             alert("Sorry!! Can't remove first row!");
           }
		count=count-1;
	});
	
	
	$("#addMore").click(function(){
			if(count==50){
				alert("Il faut saisir aux maximum 50 choix !!");
				return false;}
			
	});
	
            
            $("#insert_form").submit(function(e){
				
				nbPFE=0;
				nbSIL=0,nbSIQ=0,nbSIT=0,nbMixte=0,nbMASTER=0;
				var ligne=1;
				videSIT=0;
				var err='';
				
				tabForm=new Array(count);	
				
				
				var i;
				for(i=0;i<tabForm.length;i++)
				{
					tabForm[i]=new Array(6);
					
				}
				
				
				i=0;
				var valeur;
				$('.OP').each(function(){
					valeur=document.getElementsByName('OP[]')[i].value;
				if($(this).val() == '')
					{
						
						$('#error').html('<div class="alert alert-danger">Champ Ordre de priorité vide à la ligne '+ligne+'</div>');
						e.preventDefault(e);
					}
					else
					{	
						tabForm[i]["OP"] = valeur;
						i=i+1;
					}
					ligne=ligne+1;
					});	
					
					i=0;
				$('.PFESIT').each(function(){
					valeur=document.getElementsByName('PFESIT[]')[i].value;
					if($(this).val() == '')
					{
						videSIT=1;
						tabForm[i]["PFESIT"] = -1;
						i=i+1;
					}
					else
					{
						nbSIT=nbSIT+1;
						nbPFE=nbPFE+1;
						tabForm[i]["PFESIT"] = valeur;
						i=i+1;
						
					}
					
					if((videSIT==1)&&(videSIQ==1)&&(videSIL==1)&&(videMixte==1)&&(videMaster==1))
					{
						error = '<p> Vous devez saisir au moins 1 PFE ou MASTER dans la ligne '+ligne+'</p>';
						$('#error').html('<div class="alert alert-danger">'+error+'</div>');
					}
					});
					
					
					
				videSIQ=0;	
				i=0;
				$('.PFESIQ').each(function(){
					valeur=document.getElementsByName('PFESIQ[]')[i].value;
				if($(this).val() == '')
					{
						videSIQ=1;
						tabForm[i]["PFESIQ"] = -1;
						i=i+1;
					}
					else
					{
						nbSIQ=nbSIQ+1;
						nbPFE=nbPFE+1;
						tabForm[i]["PFESIQ"] = valeur;
						i=i+1;
						
					}
					
					
					if((videSIT==1)&&(videSIQ==1)&&(videSIL==1)&&(videMixte==1)&&(videMaster==1))
					{
						error = '<p> Vous devez saisir au moins 1 PFE ou MASTER dans la ligne '+ligne+'</p>';
						$('#error').html('<div class="alert alert-danger">'+error+'</div>');
					}
					});
					
					
			
				
				videSIL=0;	
				i=0;
				$('.PFESIL').each(function(){
					valeur=document.getElementsByName('PFESIL[]')[i].value;
				if($(this).val() == '')
					{
						videSIL=1;
						tabForm[i]["PFESIL"] = -1;
						i=i+1;
					}
					else
					{
						nbSIL=nbSIL+1;
						nbPFE=nbPFE+1;
						tabForm[i]["PFESIL"] = valeur;
						i=i+1;
						
						
					}
					
					
					
					
					if((videSIT==1)&&(videSIQ==1)&&(videSIL==1)&&(videMixte==1)&&(videMaster==1))
					{
						error = '<p> Vous devez saisir au moins 1 PFE ou MASTER dans la ligne '+ligne+'</p>';
						$('#error').html('<div class="alert alert-danger">'+error+'</div>');
					}
					});
					
					
				videMixte=0;	
				i=0;
				$('.PFEMIXTE').each(function(){
					valeur=document.getElementsByName('PFEMIXTE[]')[i].value;
				if($(this).val() == '')
					{
						videMixte=1;
						tabForm[i]["PFEMIXTE"] = -1;
						i=i+1;
					}
					else
					{
						nbMixte=nbMixte+1;
						nbPFE=nbPFE+1;
						tabForm[i]["PFEMIXTE"] = valeur;
						i=i+1;
						
					}
					
					
					
					
					if((videSIT==1)&&(videSIQ==1)&&(videSIL==1)&&(videMixte==1)&&(videMaster==1))
					{
						error = '<p> Vous devez saisir au moins 1 PFE ou MASTER dans la ligne '+ligne+'</p>';
						$('#error').html('<div class="alert alert-danger">'+error+'</div>');
					}
					});
				
				videMaster=0;	
				
				i=0;
				$('.MASTER').each(function(){
					valeur=document.getElementsByName('MASTER[]')[i].value;
				if($(this).val() == '')
					{
						videMaster=1;
						tabForm[i]["MASTER"] = -1;
						i=i+1;
					}
					else
					{
						nbMASTER=nbMASTER+1;
						tabForm[i]["MASTER"] = valeur;
						i=i+1;
						
					}
					
					
					
					
					if((videSIT==1)&&(videSIQ==1)&&(videSIL==1)&&(videMixte==1)&&(videMaster==1))
					{
						error = '<p> Vous devez saisir au moins 1 PFE ou MASTER dans la ligne '+ligne+'</p>';
						$('#error').html('<div class="alert alert-danger">'+error+'</div>');
					}
				});
					
					
					
            });
			
			$("#insert_form").submit(function(e){
				
				
				
				
				error = '';	
					if(nbSIT>10)
					{
						error += '<p> Vous avez le droit aux maximum à 10 PFE SIT !</p>';
						$('#error').html('<div class="alert alert-danger">'+error+'</div>');
						e.preventDefault(e);
					}
					
					if(nbSIQ>10)
					{
						error += '<p> Vous avez le droit aux maximum à 10 PFE SIQ !</p>';
						$('#error').html('<div class="alert alert-danger">'+error+'</div>');
						e.preventDefault(e);
					}
					
					if(nbSIL>10)
					{
						error += '<p> Vous avez le droit aux maximum à 10 PFE SIL !</p>';
						$('#error').html('<div class="alert alert-danger">'+error+'</div>');
						e.preventDefault(e);
					}
					
					if(nbMixte>10)
					{
						error += '<p> Vous avez le droit aux maximum à 10 PFE MIXTE !</p>';
						$('#error').html('<div class="alert alert-danger">'+error+'</div>');
						
						e.preventDefault(e);
					}
					
					var som=nbMASTER+nbPFE;
					if((som>10)||(som<6))
					{
						error += '<p> Vous avez le droit 6 MASTER/PFE au minumum et 10 au maximum !</p>';
						$('#error').html('<div class="alert alert-danger">'+error+'</div>');
						e.preventDefault(e);
					}
					
					if(som>50)
					{
						error += '<p> Vous avez le droit 6 MASTER/PFE au minumum et 10 au maximum !</p>';
						$('#error').html('<div class="alert alert-danger">'+error+'</div>');
						e.preventDefault(e);
					}
			
					
					
					
			});
			
			
});


	
</script>

</form>
	




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