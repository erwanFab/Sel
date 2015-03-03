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



//your code here!


// connexion à la base
$Host = "localhost";
$User = "user";
$Password = "pwd";
$Database = "base de donnée";

$idConnect = mysql_connect( $Host, $User, $Password)
             or die( "Connexion impossible.");
$db = mysql_select_db( $Database, $idConnect)
             or die( "Accès base impossible.");
// Requête SQL

$query="SELECT id_adherent,identifiant
FROM `sel_adherent`
ORDER BY `sel_adherent`.`identifiant` ASC " ;
//add "result"
$result = mysql_query( $query, $idConnect)
             or die( "Exécution requête impossible.");

if (!$query) {
die ("Can't Connect :" .mysql_error());
}

echo '<html><body>
<form method="post" action="http://WEBSERVER/wordpress/?page_id=515">';
// Construction de la chaîne de caractères qui fait la // liste

echo'<fieldset class="wood">';
echo'
</br>

<input type="submit" name="Vérifer" value="Bilan des echanges"> </br></br>
</tr>Adhérent :<SELECT NAME="lstAdherent">
$ld .= "<OPTION VALUE=0>Choisissez</OPTION>"
';

#<button onClick="clear()">Clear</button></br>


// On boucle sur la table
 while ($row = mysql_fetch_array ($result)) {
	 
	
    // $row est un tableau associatif
    // les éléments sont «indicés» par les noms
    // des colonnes. Je préfère cette technique à celle
    // des indices numériques..on ajoute une colonne..
    $numCat = htmlspecialchars ($row["id_adherent"]);
    $nomCat = htmlspecialchars ($row["identifiant"]);
    $ld .= "<OPTION VALUE='$numCat'>$nomCat</OPTION>";
}
$ld .= "</SELECT>";



mysql_free_result($result);
print $ld;

echo'</br></br></fieldset>';




// Requête SQL permettra de récupérer les informations concernant l'Offreur 

$lstAdherent=htmlspecialchars ($_POST['lstAdherent']);

		   			/* Début d'un affinage avec la liste des adherent selectionné */
				   
 if (($lstAdherent !=0))
				   		{
				   				
	 							$query="SELECT ad1.identifiant as offr, ad2.identifiant as demand, E.`detail` , E.`compte` , E.`Temps_echange`
										FROM sel_echange E
										INNER JOIN sel_adherent ad1 ON ad1.id_adherent = E.offreur
										INNER JOIN sel_adherent ad2 ON ad2.id_adherent = E.`demandeur`
										WHERE E.offreur ='".$lstAdherent."'
										or E.demandeur ='".$lstAdherent."'";
	
 }
elseif (($lstAdherent ==0)){
	
								
								$query="SELECT ad1.identifiant as offr, ad2.identifiant as demand, E.`detail` , E.`compte` , E.`Temps_echange`
										FROM sel_echange E
										INNER JOIN sel_adherent ad1 ON ad1.id_adherent = E.offreur
										INNER JOIN sel_adherent ad2 ON ad2.id_adherent = E.`demandeur`";
}
	 
	
					   
					   
				   		
						$result = mysql_query( $query, $idConnect)
         							or die( "Exécution requête impossible.");
						$total = mysql_num_rows($result);

	
						$result = mysql_query( $query, $idConnect)
         							or die( "Exécution requête impossible.");
						$total = mysql_num_rows($result);

	
						if (!$query) {
											die ("Can't Connect :" .mysql_error());
									}
									echo '<html><body><form method="post" action="http://WEBSERVER/wordpress/?page_id=337">';	
					
						if($total) {
										// debut du tableau
										
										echo '</br></br>';
										echo '<table bgcolor="#FFFFFF">'."\n";
										// première ligne on affiche les titres prénom et surnom dans 2 colonnes
										echo '<tr>';
	
										echo '</tr>';
	
	
										echo '<tr>';
										echo '<td bgcolor="#669999"><b><u>Offreur</u></b></td>';
										echo '<td bgcolor="#669999"><b><u>Demandeur</u></b></td>';
										echo '<td bgcolor="#669999"><b><u>Détail de l\'échange</u></b></td>';
										echo '<td bgcolor="#669999"><b><u>Somme de l\'échange</u></b></td>';
										echo '<td bgcolor="#669999"><b><u>Année de l\'echange</u></b></td>' ;
										echo '</tr>'."\n";
										// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.
										while($row = mysql_fetch_array($result)) 
										{
												echo '<tr>';
																
												echo '<td bgcolor="#CCCCCC"><a target="_blank" href="http://WEBSERVER/wordpress/?page_id=393  & identifiant='.htmlspecialchars ($row['offr']).'  ">'.htmlspecialchars ($row["offr"]).'</a></td>';
												echo '<td bgcolor="#CCCCCC"><a target="_blank" href="http://WEBSERVER/wordpress/?page_id=393  & identifiant='.htmlspecialchars ($row['demand']).'  ">'.htmlspecialchars ($row["demand"]).'</a></td>';
												echo '<td bgcolor="#CCCCCC">'.htmlspecialchars ($row["detail"]).'</td>';
												echo '<td bgcolor="#CCCCCC">'.htmlspecialchars ($row["compte"]).'</td>';
												echo '<td bgcolor="#CCCCCC">'.htmlspecialchars ($row["Temps_echange"]).'</td>';
											
											echo '</tr>'."\n";
											
											
										}
										echo '</table>'."\n";
							
								
										// fin du tableau.
									}
									else echo 'Pas d\'enregistrements dans cette table...';
 
						// on libère le résultat
						mysql_free_result($result);
 
					
	
/* On récupère le table des Echange correspondant à un adhérent selectionné dans la liste déroulante 
l'adherent peut être un Offreur ou un Demandeur 

Lorsque la page s'ouvre on obtiendra l'ensemble de tout les échanges que l'association fait

Cela permettra par la suit de comptabiliser les échanges ...	*/
					




 
echo '</form></body><html>';
 


?>