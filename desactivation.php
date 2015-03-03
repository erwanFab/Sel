<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author erwanFab
 */

//your code here!



				



// connexion à la base
$Host = "localhost";
$User = "user";
$Password = "pawd";
$Database = "base de donnée";

$idConnect = mysql_connect( $Host, $User, $Password)
             or die( "Connexion impossible.");
$db = mysql_select_db( $Database, $idConnect)
             or die( "Accès base impossible.");


// Requête SQL

$query="SELECT id_adherent,identifiant,actif
FROM `sel_adherent`
where actif ='1'  
ORDER BY `sel_adherent`.`identifiant` ASC "
;
//add "result"
$result = mysql_query( $query, $idConnect)
             or die( "Exécution requête impossible.");

if (!$query) {
die ("Can't Connect :" .mysql_error());
}

echo '<html><body>
<form method="post" action="http://SERVER WEB/wordpress/?page_id=393 ">';
// Construction de la chaîne de caractères qui fait la // liste

echo'</br></br></br>


<fieldset class="wood">';

echo'</br></br>

Recherche de l\'adherent :<SELECT NAME="lstAdh">
$ld .= "<OPTION VALUE=0>Choisissez</OPTION>"
';
echo'</fieldset>';

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


echo'
</br>
</br>

<label>Désactivation: <input type="checkbox" name="actif"/></label>  </br>
<input type="submit" value="Valider"> 
<button onClick="clear()">Annuler</button>';

echo'</fieldset>';

$adherent = htmlspecialchars ($_POST["lstAdh"]);


$check =  htmlspecialchars ($_POST["actif"]);



if(($adherent !=0)and ($check=="on")){


$query = "UPDATE `sel_adherent` SET `actif` = '0' WHERE `id_adherent` = '".$adherent."'";

}

$result = mysql_query( $query, $idConnect)
         							or die( "Exécution requête update impossible.");
						$total = mysql_num_rows($result);

	
						if (!$query) {
											die ("Can't Connect :" .mysql_error());
									}




mysql_free_result($result);

echo 'mise a jour ...';

echo '</form></body></html>';


$query="SELECT id_adherent,identifiant,ville,actif from sel_adherent WHERE actif ='0'";
					   
					   
				   		
						$result = mysql_query( $query, $idConnect)
         							or die( "Exécution requête impossible.");
						$total = mysql_num_rows($result);

	
						if (!$query) {
											die ("Can't Connect :" .mysql_error());
									}
									echo '<html><body><form method="post" action="http://webseltreg.no-ip.org/monsel/monsel/wordpress/?page_id=1133 ">';
	
	
	
					
	
	
	
	
						if($total) {
										// debut du tableau
	
										echo '</br></br>';
										echo '<table bgcolor="#FFFFFF">'."\n";
										// première ligne on affiche les titres prénom et surnom dans 2 colonnes
										echo '<tr>';
	
										echo '</tr>';
	
	
										echo '<tr>';
										echo '<td bgcolor="#669999"><b><u>id_adherent</u></b></td>';
										echo '<td bgcolor="#669999"><b><u>Adhérents</u></b></td>';
										echo '<td bgcolor="#669999"><b><u>Ville</u></b></td>' ;
										echo '<td bgcolor="#669999"><b><u>Actif</u></b></td>';
										echo '</tr>'."\n";
										// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.
										while($row = mysql_fetch_array($result)) 
										{
												echo '<tr>';
												echo '<td bgcolor="#CCCCCC">'.htmlspecialchars ($row["id_adherent"]).'</td>';
												echo '<td bgcolor="#CCCCCC"><a target="_blank" href="http://SERVER WEB/wordpress/?page_id=393  & identifiant='.htmlspecialchars ($row['identifiant']).'  ">'.htmlspecialchars ($row["identifiant"]).'</a></td>';
												echo '<td bgcolor="#CCCCCC">'.htmlspecialchars ($row["ville"]).'</td>';
											    echo '<td bgcolor="#CCCCCC">'.htmlspecialchars ($row["actif"]).'</td>';
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