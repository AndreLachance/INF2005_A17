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

		$champs_formulaire = array("prenom","nom","age","programme","universite","annee_diplome","type_admission");
		
		foreach($champs_formulaire as $champs) {
				
			if (empty($_POST[$champs])) {
				return false;
			}		
		}
			$liste_universite_accepter = array("concordia","uqam","sherbrooke","udm","mcgill","ets","toronto","york");
			$type_admission_accepter = array("regulier","or","observateur","junior");

			$prenom_valide = (strlen($_POST["prenom"]) <= 50);
			$nom_valide = (strlen($_POST["nom"]) <= 40);
			$age_valide = (( strlen($_POST["age"]) <= 2 )  &&  is_numeric($_POST["age"]));
			$annee_diplome_valide = (strlen($_POST["annee_diplome"]) == 4  &&  is_numeric($_POST["annee_diplome"])) ;
			$universite_valide = in_array($_POST["universite"], $liste_universite_accepter, true);
			$programme_valide = (strlen($_POST["programme"]) <= 40);
			$type_admission_valide = in_array($_POST["type_admission"], $type_admission_accepter, true);
			
			return $prenom_valide && $nom_valide 
					   && $age_valide && $annee_diplome_valide
					   && $programme_valide && $universite_valide
					   && $type_admission_valide;
	}
?>