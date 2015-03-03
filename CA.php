<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author dew
 */


				/* Enregistrement d'une offre ou d'une demande	*/




// connexion à la base
$Host = "localhost";
$User = "user";
$Password = "pwd";
$Database = "base de donnée";

$idConnect = mysql_connect( $Host, $User, $Password)
             or die( "Connexion impossible.");
$db = mysql_select_db( $Database, $idConnect)
             or die( "Accès base impossible.");

echo '<html><body>
<form method="post" action="http://WEBSERVER/wordpress/?page_id=1048  ">';
// Construction de la chaîne de caractères qui fait la // liste

echo'</br></br></br>


<fieldset class="wood">';

/*	connection membre CA	*/


/* 	Liste des Adhérents .....	*/


$query="SELECT id_adherent,identifiant,ca
FROM `sel_adherent`
WHERE ca='éditor'
ORDER BY `sel_adherent`.`identifiant` ASC " ;
//add "result"
$resultAD = mysql_query( $query, $idConnect)
             or die( "Exécution requête impossible.");

if (!$query) {
die ("Can't Connect :" .mysql_error());
}
echo'
</br>
</br>
</tr>Adhérent :<SELECT NAME="lstAdh">
$ld .= "<OPTION VALUE=0>Choisissez</OPTION>"
';

echo'</fieldset>';



// On boucle sur la table
 while ($donnee = mysql_fetch_array ($resultAD)) {
	 
	
    // $row est un tableau associatif
    // les éléments sont «indicés» par les noms
    // des colonnes. Je préfère cette technique à celle
    // des indices numériques..on ajoute une colonne..
    $numCat = htmlspecialchars ($donnee["id_adherent"]);
    $nomCat = htmlspecialchars ($donnee["identifiant"]);
    $ldD .= "<OPTION VALUE='$numCat'>$nomCat</OPTION>";
}
$ldD .= "</SELECT>";



mysql_free_result($resultAD);
print $ldD;

echo'
	</br>
    Mot de passe: <input type="password" name="password1" placeholder="Mot de passe" /></br>
	</br>
    <input type="submit" value="Valider"/>
	</br>
	</form>
';


/*
 * Redirection vers des pasges si l'identifiant est dans la base et le mot de passe valide
 * 
 */


$def=htmlspecialchars($_POST['password1']);
$Adh=htmlspecialchars($_POST['lstAdh']);
if(isset($def)and isset($Adh)){
	
	if($_POST['password1']=='pwd'){
		echo'</br>';
		echo '<p class="connexion">';
		echo'<h2>';
		echo '<a href="http://WEBSERVER/wordpress/?page_id=1027" target"_blank">Enregistrement d\'une nouvelle offre ou demande</a>';
		echo '</br><a href="http://WEBSERVER/wordpress/?page_id=353" target"_blank">Enregistrement d\'un nouvel adhérent</a>';
		echo '</br></br>';
		echo '</br><a href="http://WEBSERVER/wordpress/?page_id=1133" target"_blank">Désactiver un adhérent</a>';
		echo '</br><a href="http://WEBSERVER/wordpress/?page_id=1135" target"_blank">Réactiver un adhérent</a>';
		
		
		
		
		echo'</h2>';
		echo'</p>';
		
		
	}
	else{
		
	}
}





echo'</body></html>';

?>
