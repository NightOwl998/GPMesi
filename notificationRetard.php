<!DOCTYPE html>
<html>
<head>
	<title> Notification au retardaire </title>
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
$i=0;
$reqnot = $bdd->query('SELECT DISTINCT * FROM enseignant WHERE enseignantID NOT IN (SELECT enseignantID FROM fichevoeux);');
while($donneesnot = $reqnot->fetch())
{
	$email=$donneesnot['EmailEnseignant'];	
	$id=$donneesnot['enseignantID'];
	$reqnot1 = $bdd->prepare('INSERT INTO notification (IDcompte, Titre, Notification, Etat) VALUES(:IDcompte, \'Fiche de voeux \', \'Vous êtes en retard,veuillez remplir votre fiches de voeux au plus tard le 20/04/ 2018 \', 0)');
$reqnot1->execute(array(
'IDcompte'=>$id 

  ));
$to      = $email;
$subject = 'Fiche de voeux';
$message = 'Vous êtes en retard,veuillez remplir votre fiches de voeux au plus tard le 20/04/ 2018.
N.B: Nous excusons  pour le dérangement ce mail est un test de l''application de project 2CPI ,merci pour votre compréhension' ;
$headers = 'From: servicedesstagesesi@gmail.com' . "\r\n" .
    'Reply-To: servicedesstagesesi@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully!';
} else {
    die('Failure: Email was not sent!');
}

    ?>

}
?>
</body>
</html>