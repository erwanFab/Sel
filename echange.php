<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author ErwanFab
 */



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

$query="SELECT id_adherent,identifiant,actif
FROM `sel_adherent`
WHERE actif='1'
ORDER BY `sel_adherent`.`identifiant` ASC " ;
//add "result"
$result = mysql_query( $query, $idConnect)
             or die( "Exécution requête impossible.");

if (!$query) {
die ("Can't Connect :" .mysql_error());
}

echo '<html><body>
<form method="post" action="http://WEBSERVER/wordpress/?page_id=428">';
// Construction de la chaîne de caractères qui fait la // liste

echo'<fieldset class="Fenetre_Echange ">';
echo'
</br>
</br>
<input type="submit" name="Verifer" value="Vérifier les comptes des Echangeur"> </br></br>
</tr>Offreur :<SELECT NAME="lstOffreur" >
$ld .= "<OPTION VALUE=0 >Choisissez</OPTION>"
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

$query="SELECT id_adherent,identifiant,actif
FROM `sel_adherent`
WHERE actif='1'
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
</tr>Demandeur :<SELECT NAME="lstDemand">
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










// Requête SQL permettra de récupérer les informations concernant l'Offreur 

$lstOffreur=htmlspecialchars ($_POST['lstOffreur']);

		   			/* Début d'un affinage avec la liste des adherent selectionné */
	

if (($lstOffreur !=0))
				   		{
				   
	 
	 
	 $listTempOff=$lstOffreur;
								$query="SELECT `id_adherent`,`identifiant`,`der_solde`,`debit`,`credit` FROM `sel_adherent` WHERE `id_adherent`=".$lstOffreur;
									 
		 
					   
					   
				   		
						$result = mysql_query( $query, $idConnect)
         							or die( "Exécution requête impossible.");
						$total = mysql_num_rows($result);

	
						if (!$query) {
											die ("Can't Connect :" .mysql_error());
									}
										
					
						if($total) {
										
										// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.
										while($row = mysql_fetch_array($result)) 
										{
												echo '<fieldset class = "adhercompt">';
												echo 'ID :<b>'.htmlspecialchars ($_POST[$row["id_adherent"]]).'</b></br>';
													
												echo 'L\'OFFREUR :<b>'.htmlspecialchars ($row["identifiant"]).'</b></br>';
												echo 'Dernier Solde :<b>'.htmlspecialchars ($row["der_solde"]).'</b></br>';
												echo 'Crédit :<b>'.htmlspecialchars ($row["credit"]) .'</b></br>';
												echo 'Débit :<b>'.htmlspecialchars ($row["debit"]).'</b></br>';
																			
											
										}
										
										echo '</fieldset>';
									}
									else echo 'Pas d\'enregistrements ';
 
						// on libère le résultat
						mysql_free_result($result);
	 
	 
	/* On donne un nom pour le solde et crédit et dépit pour l'Offreur ce qui facilitera par la suite le code */ 
	 
 }






/* On se penche maintenant su l'étiquette du Demandeur */


$lstDemandeur=htmlspecialchars ($_POST['lstDemand']);
  			/* Début d'un affinage avec la cathégories selectionné */


				   
 if (($lstDemandeur!=0))
				   		{
	 
$listTempDem =	 $lstDemandeur;
	
	 
					   
								$query="SELECT `id_adherent`,`identifiant`,`der_solde`,`debit`,`credit` FROM `sel_adherent` WHERE `id_adherent`=".$lstDemandeur;
									 
		 
					   
					   
				   		
						$request = mysql_query( $query, $idConnect)
         							or die( "Exécution requête impossible.");
						$total = mysql_num_rows($request);

	
						if (!$query) {
											die ("Can't Connect :" .mysql_error());
									}
									
					
						if($total) {
										
										// lecture et affichage des résultats dans un autre petit cadre pour bien distingué.
										while($data = mysql_fetch_array($request)) 
										{
												echo '<fieldset class = "adhercompt2">';
											 	echo 'ID :<b>'.htmlspecialchars ($_POST[$data["id_adherent"]]).'</b></br>';
											
												echo 'Le DEMANDEUR :<b>'.htmlspecialchars ($data["identifiant"]).'</b></br>';
												echo 'Dernier Solde :<b>'.htmlspecialchars ($data["der_solde"]).'</b></br>';
												echo 'Crédit :<b>'.htmlspecialchars ($data["credit"]) .'</b></br>';
												echo 'Débit :<b>'.htmlspecialchars ($data["debit"]).'</b></br>';	
										}
												echo '</fieldset>';							
											
									}
									else echo 'Pas d\'enregistrements ';
 
						// on libère le résultat
						mysql_free_result($request);
	 
	 
	 
 }





echo'<fieldset class="adherChamp">';



echo'
</br>
</br>
<label><b> Entrer la somme de votre échange </br> </label></br>
<input type="number" name="somme"/> 
</br>

<labe>Entrer le détail de l\'offre pour effectuer la tansaction...</label></br>
<textarea name="detail" id="Detail" ></textarea>
</br>
</br>
<input type="submit" name="confirmation" Value="Confirmer notre échange"/>
</br>
</br>

';
        	
echo '</fieldset>';	



/* On récupère les diférentes information affin de procédé au transfert vers une base sel_echanges */


$somme = htmlspecialchars ($_POST["somme"]);
$detail = htmlspecialchars ($_POST["detail"]);







echo $somme. '</br>';
echo $detail. '</br>';

$id_off=htmlspecialchars ($_POST[$row["id_adherent"]]);
$id_dem=htmlspecialchars ($_POST[$data["id_adherent"]]);

if($id_off!=0)
{
	$TPid_off=$id_off;
}

if($id_dem!=0)
{
	$TPid_dem = $id_dem;
}


$Confirmation =htmlspecialchars ($_POST["confirmation"]);






	
if($Confirmation){
	
	

/* si vous confirmer la certification alors on insert les différent champ dans la base sel_echange	*/
/* cela permettra de vérifier la compabilité des crédit et débit ultérieurement pour chaque adherents */

if (mysql_errno()) {
  $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>When executing:<br>\n$query\n<br>";
 
} 
	
	
	
			$sql="INSERT INTO  `sel_echange`(`id_echange`, `offreur`, `demandeur`, `detail`, `compte`,Temps_echange) VALUES ('','".$listTempOff."','".$listTempDem."','".$detail."','".$somme."',CURDATE())";
	
	
	$result = mysql_query( $sql, $idConnect)
         							or die( "Exécution requête INSERT INTO  `sel_echange` impossible.");
	
	
	
	
	
	
	if (!$sql) {
											die ("Can't Connect :" .mysql_error());
									}
	
	
	if(!$result){
						
	}
									
	
	echo 'UpDATE Adherent OFFREUR et DEMANDEUR ......';
	
	

	
								$query="SELECT `id_adherent`,`identifiant`,`der_solde`,`debit`,`credit` FROM `sel_adherent` WHERE `id_adherent`=".$listTempOff;
									 
		 
					   
					   
				   		
						$result = mysql_query( $query, $idConnect)
         							or die( "Exécution requête SELECT impossible.");
						$total = mysql_num_rows($result);

	
						if (!$query) {
											die ("Can't Connect :" .mysql_error());
									}
									
					
						if($total) {
										
										// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.
										while($row = mysql_fetch_array($result)) 
										{
											/*
												echo '<fieldset class = "adhercompt">';
												echo 'ID :<b>'.htmlspecialchars ($row["id_adherent"]).'</b></br>';
												echo 'L\'OFFREUR :<b>'.htmlspecialchars ($row["identifiant"]).'</b></br>';
												echo 'Dernier Solde :<b>'.htmlspecialchars ($row["der_solde"]).'</b></br>';
											*/
													$anciensolde = htmlspecialchars ($row["der_solde"]);
											
											
											//	echo 'Crédit :<b>'.htmlspecialchars ($row["credits"]) .'</b></br>';
											
														$ancienCredit = htmlspecialchars ($row["credit"]);
											//	echo 'Débit :<b>'.htmlspecialchars ($row["debit"]).'</b></br>';
																			
														$ancienDebit = htmlspecialchars ($row["debit"]);
										}
										
										echo '</fieldset>';
									}
									else echo 'Pas d\'enregistrements ';
 
						// on libère le résultat
						mysql_free_result($result);

	#$anciensolde=htmlspecialchars ($row["der_solde"]);
	
	//echo 'anciensolde :'.$anciensolde;
	
	$nvsolde = $anciensolde + $somme ;
	
	//echo $nvsolde;
	
	$nvcredit = $ancienCredit +1;
		
		
		$query="UPDATE sel_adherent SET der_solde = ".$nvsolde.", credit = ".$nvcredit." WHERE id_adherent = ".$listTempOff;

	
		$result = mysql_query( $query, $idConnect)
         							or die( "Exécution requête impossible.");
	
	if($result){
					echo "Mise à jour Réussie !!!";
	}
	
	
	
	

	
								$query="SELECT `id_adherent`,`identifiant`,`der_solde`,`debit`,`credit` FROM `sel_adherent` WHERE `id_adherent`=".$listTempDem;
									 
		 
					   
					   
				   		
						$result = mysql_query( $query, $idConnect)
         							or die( "Exécution requête impossible.");
						$total = mysql_num_rows($result);

	
						if (!$query) {
											die ("Can't Connect :" .mysql_error());
									}
									#echo '<html><body><form method="post" action="http://WEBSERVER/wordpress/?page_id=428">';	
					
						if($total) {
										
										// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.
										while($row = mysql_fetch_array($result)) 
										{
											
											/*
												#echo '<fieldset class = "adhercompt2">';
												echo 'ID :<b>'.htmlspecialchars ($row["id_adherent"]).'</b></br>';
												echo 'LE DEMANDEUR :<b>'.htmlspecialchars ($row["identifiant"]).'</b></br>';
												echo 'Dernier Solde :<b>'.htmlspecialchars ($row["der_solde"]).'</b></br>';*/
											
													$anciensoldeD = htmlspecialchars ($row["der_solde"]);
											
											
											//	echo 'Crédit :<b>'.htmlspecialchars ($row["credits"]) .'</b></br>';
											
														$ancienCreditD = htmlspecialchars ($row["credit"]);
											//	echo 'Débit :<b>'.htmlspecialchars ($row["debits"]).'</b></br>';
																			
														$ancienDebit = htmlspecialchars ($row["debit"]);
										}
										
										echo '</fieldset>';
									}
								//	else echo 'Pas d\'enregistrements ';
 
						// on libère le résultat
						mysql_free_result($result);

	#$anciensolde=htmlspecialchars ($row["der_solde"]);
	
	//echo 'anciensolde :'.$anciensoldeD;
	
	$nvsoldeD = $anciensoldeD - $somme ;
	
//	echo $nvsolde;
	
	$nvDebit = $ancienDebit +1;
		
		
		$query="UPDATE sel_adherent SET der_solde = ".$nvsoldeD.", debit = ".$nvDebit." WHERE id_adherent = ".$listTempDem;

	
		$result = mysql_query( $query, $idConnect)
         							or die( "Exécution requête impossible.");
	

	
	
	
	mysql_free_result($result);
	





}


echo '</form>';	

echo '</body></html>';
?>