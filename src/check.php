<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$req = $bdd->prepare('SELECT * FROM notification WHERE Etat = 0 ');
$req->execute();
$nombre= $req->rowCount();
if ($nombre>0)
{
	?> <a href="fetch.php" > Notification <?php echo '('.$nombre.')'  ?> </a>
	<?php
}
	else
	{
		?> <a href="fetch.php" > Notification  </a>
	<?php
	}


?>