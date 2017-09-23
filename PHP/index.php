<!DOCTYPE html>
<html>
<head>
	<title>Liste de cours</title>
	<meta charset="UTF-8">
</head>
<body>
	<h1>Liste de cours</h1>
	<?php generer_tableau(); ?>
</body>
</html>

<?php  

	function generer_tableau() {
		
		$colonnes = array("Sigle", "Groupe", "Année", "Trimestre", "Titre");
		$liste_cours = file("cours.txt");
		
		$cours_parse = parse_cours($liste_cours);
		
		echo "<table>";
		generer_entetes($colonnes);
		generer_body($cours_parse);
		echo "</table>";
		
		$nb_cours = count($cours_parse);
		
		echo "<p> Il y as {$nb_cours} cours dans le tableau.";
		
	}
	
	function parse_cours($liste_cours) {
		
		$cours_parse = array();
		
		foreach($liste_cours as $cours) {

			$sigle = substr($cours,6,7);
			$groupe = substr($cours,14,2);
			$annee = substr($cours,0,4);
			$trimestre = obtenir_trimestre(substr($cours,4,1));
			$titre = substr($cours,17);
			
			array_push($cours_parse, array($sigle,$groupe,$annee,$trimestre,$titre));
		}
		
		return $cours_parse;
	}
		



	function obtenir_trimestre($trimestre_numerique) {
		
		switch ($trimestre_numerique){
			case "1":
				return "Hiver";
				break;
			case "2":
				return "Été";
				break;
			case "3": 
				return "Automne";
				break;
			default:
				return "";
				break;
		}
	}
	
	function generer_entetes($colonnes) {
		
		echo "<thead>";
		echo "<tr>";
		
		foreach ($colonnes as $colonne) {
			echo "<th>";
			echo "{$colonne}";
			echo "</th>";
		}
		
		echo "</tr>";
		echo "</thead>";
		
	}
	
	
	function generer_body($rangee) {
		echo "<tbody>";
		
		foreach ($rangee as $ligne) {
			echo "<tr>";
			
			foreach ($ligne as $element)
			{
				
				echo "<td>";
				echo "{$element}";
				echo "</td>";
				
			}
		
			echo "</tr>";
		}
		
		echo "</tbody>";
	}
	

?>