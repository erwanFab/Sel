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
<form method="post" action="http://WEBSERVER/wordpress/?page_id=1027 ">';
// Construction de la chaîne de caractères qui fait la // liste

echo'</br></br></br>


<fieldset class="wood">';
echo'</br></br>
Offres et demandes :<SELECT NAME="Offre">
<OPTION VALUE=0></OPTION>
<OPTION VALUE=1>Offres</OPTION>
<OPTION VALUE=2>Demandes</OPTION>
</SELECT>


</br>
</br>Recherche par catégorie :<SELECT NAME="lstCath">
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

/* -----    Liste des Sous-catégories proposées ......      */


$query="SELECT * 
FROM  `sel_sous_cathegoies`
ORDER BY  `sel_sous_cathegoies`.`sous_cathegories` ASC " ;
//add "result"
$resultSC = mysql_query( $query, $idConnect)
             or die( "Exécution requête impossible.");

if (!$query) {
die ("Can't Connect :" .mysql_error());
}
echo'
</br>
</br>
</tr>Sous-catégorie :<SELECT NAME="lstSousCat">
$ld .= "<OPTION VALUE=0>Choisissez</OPTION>"
';

echo'</fieldset>';



// On boucle sur la table
 while ($donnee = mysql_fetch_array ($resultSC)) {
	 
	
    // $row est un tableau associatif
    // les éléments sont «indicés» par les noms
    // des colonnes. Je préfère cette technique à celle
    // des indices numériques..on ajoute une colonne..
    $numCat = htmlspecialchars ($donnee["id"]);
    $nomCat = htmlspecialchars ($donnee["sous_cathegories"]);
    $ldSC .= "<OPTION VALUE='$numCat'>$nomCat</OPTION>";
}
$ldSC .= "</SELECT>";



mysql_free_result($resultSC);
print $ldSC;

/* 	Liste des Adhérents .....	*/


$query="SELECT id_adherent,identifiant
FROM `sel_adherent`
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
</br>
</tr>Entrer la description :</br><textarea name="detail" id="Detail" ></textarea>
</br></br>
<input type="submit" value="Valider"> 
<button onClick="clear()">Annuler</button>';

echo'</fieldset>';


$i=htmlspecialchars ($_POST['Offre']);
$lstCath=htmlspecialchars ($_POST['lstCath']);
$lstSousCat=htmlspecialchars ($_POST['lstSousCat']);
$lstAdh=htmlspecialchars ($_POST['lstAdh']);
$detail = htmlspecialchars ($_POST['detail']);






switch ($i) {
    			case 0:					
	  
	  
	  
	  
	  
       					 break;
    			case 1:						/* Offres */
	  
	  /* On fais un enregistrement d' offres  */
	
	if(($i==1)and ($lstCath!=0)and ($lstSousCat!=0)and ($lstAdh!=0) and ($detail!=NULL)){
		
		if (mysql_errno()) {
  $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>When executing:<br>\n$query\n<br>";
 
} 
		$sql="INSERT INTO `sel_offres`(`id_offres`, `cath`, `sous_cat`, `offres`, `adherent`, `actif_offre`) VALUES ('','".$lstCath."','".$lstSousCat."','".$detail."','".$lstAdh."','1')";

			$result = mysql_query( $sql, $idConnect)
											or die( "Exécution requête INSERT INTO  `sel_offres` impossible.");
	
	
	
	
	
	
	if (!$sql) {
											die ("Can't Connect :" .mysql_error());
									}
	
	
	if(!$result){
						
	}
									
	
	echo 'L\'offre est enregistrée ......';
	
	
		
	}
	else{
			echo'l\'enregistrement a échoué';	
	}
 
						echo '</form></body></html>';		 
	 
		
				   
	  
	  
        
        break;
case 2:					/* Demandes */
        
	  				if(($i==2)and ($lstCath!=0)and ($lstSousCat!=0)and ($lstAdh!=0) and ($detail!=NULL))
		 		{
						
		 			
		if (mysql_errno()) {
  $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>When executing:<br>\n$query\n<br>";
 
} 
		$sql="INSERT INTO `sel_demandes`(`id_demandes`, `categories`, `sous_categories`, `demandes`, `adherent`, `actif_demande`) VALUES ('','".$lstCath."','".$lstSousCat."','".$detail."','".$lstAdh."','1')";

			$result = mysql_query( $sql, $idConnect)
											or die( "Exécution requête INSERT INTO  `sel_demandes` impossible.");
	
	
	
	
	
	
	if (!$sql) {
											die ("Can't Connect :" .mysql_error());
									}
	
	
	if(!$result){
						
	}
									
	
	echo 'La demande est enregistrée ......';
	
	
		
	}
	else{
			echo'l\'enregistrement a échoué';	
	}	
	
	echo '</form></body></html>';
	  
break;
	  
     
}

  	 
?>

