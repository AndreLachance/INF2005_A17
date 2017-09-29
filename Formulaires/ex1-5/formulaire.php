<!DOCTYPE html>
<html>
<head>
	<title>Soumission Formulaire</title>
	<meta charset="UTF-8">
</head>
<body>

<?php  

	if(verificationDonnees()){
		
		echo "<p> Succès! </p>";
	
	} else {

		echo "<p> Une erreur s'est glissée dans les données envoyées. </p>";

	}

?>

</body>
</html>


<?php  

	function verificationDonnees(){

		if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["age"])) {

			$prenom_valide = (strlen($_POST["prenom"]) <= 50);
			$nom_valide = (strlen($_POST["nom"]) <= 40);
			$age_valide = ( (strlen($_POST["age"]) <= 2 ) && is_numeric($_POST["age"]) );
			
			return $prenom_valide && $nom_valide && $age_valide;

		} else {
			
			return false;
		
		}

	}
?>