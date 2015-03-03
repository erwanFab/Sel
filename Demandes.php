<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author erwanFab
 * 
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

/* Liste des CATEGORIE PROPOSEES .....     */






// Requête SQL

$query="SELECT *
FROM `sel_cathegories`
ORDER BY `sel_cathegories`.`cathegories` ASC " ;
//add "result"
$result = mysql_query( $query, $idConnect)
             or die( "Exécution requête impossible.");

if (!$query) {
die ("Can't Connect :" .mysql_error());
}

echo '<html><body>
<form method="post" action="http://SERVERWEB/wordpress/?page_id=229 ">';
// Construction de la chaîne de caractères qui fait la // liste

echo'</br></br></br></br></br></br>


<fieldset class="wood">';

echo'</br></br>

Recherche par catégorie :<SELECT NAME="lstCath">
$ld .= "<OPTION VALUE=0>Choisissez</OPTION>"
';
echo'</fieldset>';

// On boucle sur la table
 while ($row = mysql_fetch_array ($result)) {
	 
	
    // $row est un tableau associatif
    // les éléments sont «indicés» par les noms
    // des colonnes. Je préfère cette technique à celle
    // des indices numériques..on ajoute une colonne..
    $numCat = htmlspecialchars ($row["id"]);
    $nomCat = htmlspecialchars ($row["cathegories"]);
    $ld .= "<OPTION VALUE='$numCat'>$nomCat</OPTION>";
}
$ld .= "</SELECT>";



mysql_free_result($result);
print $ld;


echo'
</br>
</br>

<input type="submit" value="Valider"> 
<button onClick="clear()">Annuler</button></br>';

echo'</br></fieldset>';

echo '</form></body></html>';

// Requête SQL

$lst=htmlspecialchars ($_POST['lstCath']);
 $nomCat = htmlspecialchars ($row["cathegories"]);



/* Demandes */
        
	  				if(($lst==0))
		 		{
						
		 					$query ="SELECT sel_cathegories.cathegories, sel_sous_cathegoies.sous_cathegories, 
							sel_demandes.demandes, sel_adherent.identifiant, sel_adherent.ville,sel_adherent.actif,sel_demandes.actif_demande
							FROM sel_demandes
							INNER JOIN sel_cathegories ON sel_cathegories.id = sel_demandes.`categories` 
							INNER JOIN sel_sous_cathegoies ON sel_sous_cathegoies.id = sel_demandes.sous_categories
							INNER JOIN sel_adherent ON sel_adherent.id_adherent = sel_demandes.adherent
							WHERE sel_adherent.actif =  '1'
							AND sel_demandes.actif_demande ='1'
							";
		 
		 		 }
				   
				   /* Début d'un affinage avec la cathégories selectionné */
				   
				 else if (($lst!=0))
				 {
					  
					$query="SELECT sel_cathegories.cathegories, sel_sous_cathegoies.sous_cathegories, sel_demandes.demandes, 
					sel_adherent.identifiant, sel_adherent.ville,sel_adherent.actif,sel_demandes.actif_demande
					FROM sel_demandes
					INNER JOIN sel_cathegories ON sel_cathegories.id = sel_demandes.`categories` 
					INNER JOIN sel_sous_cathegoies ON sel_sous_cathegoies.id = sel_demandes.sous_categories
					INNER JOIN sel_adherent ON sel_adherent.id_adherent = sel_demandes.adherent
					WHERE sel_adherent.actif =  '1'
					AND sel_cathegories.id='".$lst."'
					AND sel_demandes.actif_demande ='1'";
		 
					   
					   
				 }
	  
	  
				$result = mysql_query( $query, $idConnect)
         					or die( "Exécution requête impossible.");
				$total = mysql_num_rows($result);

	
				if (!$query) {
						die ("Can't Connect :" .mysql_error());
					}
				echo '<html><body><form method="post" action="http://SERVERWEB/wordpress/?page_id=387 ">';	
					
				if($total) {
							// debut du tableau
								echo '<br></br>';
	
	
								echo '<table bgcolor="#FFFFFF">'."\n";
							// première ligne on affiche les titres prénom et surnom dans 2 colonnes
								echo '<tr>';
								echo '<td bgcolor="#669999"><b><u>Catégories</u></b></td>';
								echo '<td bgcolor="#669999"><b><u>Sous-Catégories</u></b></td>';
								echo '<td bgcolor="#669999"><b><u>Demandes</u></b></td>';
								echo '<td bgcolor="#669999"><b><u>Adhérents</u></b></td>';
								echo '<td bgcolor="#669999"><b><u>Ville</u></b></td>' ;
								echo '</tr>'."\n";
								// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.
							while($row = mysql_fetch_array($result)) 
							{
									echo '<tr>';
									echo '<td bgcolor="#CCCCCC">'.htmlspecialchars ($row["cathegories"]).'</td>';
									echo '<td bgcolor="#CCCCCC">'.htmlspecialchars ($row["sous_cathegories"]).'</td>';
									echo '<td bgcolor="#CCCCCC">'.htmlspecialchars ($row["demandes"]) .'</td>';
									echo '<td bgcolor="#CCCCCC"><a target="_blank" href="http://SERVERWEB/wordpress/?page_id=393  & identifiant='.htmlspecialchars ($row['identifiant']).'  ">'.htmlspecialchars ($row["identifiant"]).'</a></td>';
									echo '<td bgcolor="#CCCCCC">'.htmlspecialchars ($row["ville"]).'</td>';
									echo '</tr>'."\n";
							}
							echo '</table>'."\n";
						// fin du tableau.
						}
						else echo 'Pas d\'enregistrements dans cette table...';
 
						// on libère le résultat
						mysql_free_result($result);
 
						echo '</form></body></html>';		 
	   
?>