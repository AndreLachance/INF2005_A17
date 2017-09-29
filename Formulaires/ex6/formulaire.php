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
	} 
?>
</body>
</html>
<?php  

	function verificationDonnees(){

			$champs_formulaire = array("prenom","nom","age","programme","universite","annee_diplome","type_admission","parcours");
			
			$champ_presents = verificationChampsVide($champs_formulaire);


			$prenom_valide = (isset($_POST["prenom"])) ? prenomValide($_POST["prenom"]) : false;
			$nom_valide = (isset($_POST["nom"])) ? nomValide($_POST["nom"]) : false;
			$age_valide = (isset($_POST["age"])) ? ageValide($_POST["age"]) : false;
			$annee_diplome_valide = (isset($_POST["annee_diplome"])) ? anneeDiplomeValide($_POST["annee_diplome"]) : false;;
			$universite_valide = (isset($_POST["universite"])) ? universiteValide($_POST["universite"]) : false;;
			$programme_valide = (isset($_POST["programme"])) ? programmeValide($_POST["programme"]) : false;;
			$type_admission_valide = (isset($_POST["type_admission"])) ? typeAdmissionValide($_POST["type_admission"]) : false;;
			
			return $champ_presents && $prenom_valide && $nom_valide 
					   && $age_valide && $annee_diplome_valide
					   && $programme_valide && $universite_valide
					   && $type_admission_valide;
	}
		
	function verificationChampsVide($liste_champs) {
			
		$champs_present = true;
		foreach($liste_champs as $champs) {
			if (empty($_POST[$champs])) {
				echo " <p> le champ {$champs} est obligatoire.</p>";
				$champs_present = false;
			} 		
		}
		return $champs_present;
		
	}
				
	function prenomValide($prenom) {
		
		if(strlen($prenom) <= 50) {
			return true;
		} else {
			echo "<p> Le champ Prénom ne doit pas dépasser 50 caractères.</p>";
			return false;
		}
		
	}
	
	function nomValide($nom) {
		
		if(strlen($nom) <= 50) {
			return true;
		} else {
			echo "<p> Le champ Nom ne doit pas dépasser 40 caractères.</p>";
			return false;
		}
	}
	
	function ageValide($age) {
		$age_valide = true;
		if(!is_numeric($age)) {
			echo "<p> Le champ Âge doit être un nombre.</p>";
			$age_valide = false;
		}
		if(strlen($age) > 2) {
			echo "<p> Le champ Âge ne doit pas dépasser 2 chiffres.</p>";
			$age_valide = false;
		}
		return $age_valide;
	}
	
	function anneeDiplomeValide($annee) {
		$annee_diplome_valide = true;
		if(!is_numeric($annee)) {
			echo "<p> Le champ Année doit être un nombre.</p>";
			$annee_diplome_valide = false;
		}
		if(!strlen($annee) == 4) {
			echo "<p> Le champ Année doit avoir une longeur de 4 chiffres.</p>";
			$annee_diplome_valide = false;
		}
		return $annee_diplome_valide;
	}
	
	function universiteValide($universite) {
		
		$liste_universite_accepter = array("concordia","uqam","sherbrooke","udm","mcgill","ets","toronto","york");
		
		if(in_array($universite, $liste_universite_accepter, true)) {
			return true;
		} else {
			echo "<p> Veuillez choisir une université parmi la liste fournie.</p>";
			return false;
		}
	}
	
	function programmeValide($programme) {
		if(strlen($programme) <= 40) {
			return true;
		} else {
			echo "<p> Le champ Programme ne doit pas dépasser 40 caractères</p>";
			return false;
		}
	}
	
	function typeAdmissionValide($type_admission) {
		
		$type_admission_accepter = array("regulier","or","observateur","junior");
		
		if(in_array($type_admission, $type_admission_accepter, true)) {
			return true;
		} else {
			echo "<p> Veuillez choisir un type d'admission valide.</p>";
			return false;
		}
	}
	
?>