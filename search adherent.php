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

echo '<html>

 



<body>
<form method="post" action="http://webseltreg.no-ip.org/monsel/monsel/wordpress/?page_id=387">
<fieldset class="searchadherent2">
<b>Identifiant :</b> <input type="text" name="identifiant"  maxlength="35" size="35"></br>




<input type="submit" value="Valider"> </tr>
 
<button onClick="clear()">Clear</button>
</br>
<h4>copier l\'adherent </br>placer le ci-dessus </br> puis cliquer sur <b>"valider"</b></h4>
  
</br>
</br>
';
echo '</fieldset >';

$ident = $_POST['identifiant'];


// Paramétres de connexion


$query="select * from sel_adherent " ;
//add "result"
$result = mysql_query($query);

if (!$query) {
die ("Can't Connect :" .mysql_error());
}

while ($donnees = mysql_fetch_array($result)) // On boucle pour afficher toutes les donnÃ©es et on met toutes donnÃ©es dans un tableau
 {
	
	
	
	if($ident == $donnees['identifiant'])
	{
 echo' <fieldset class="searchadherent2">';
 echo '<b>Identifiant :</b>'.$donnees['identifiant'].'</br>'; 
 echo '<b>Nom :</b>'.$donnees['nom'].'</br>';
 echo '<b>Prénom :</b>'.$donnees['prenom'].'</br>';
 
	$sexe='';	
		if($donnees['sexe']==1){
			$sexe='Monsieur';
			echo '<b>Sexe :</b>'. $sexe .'</br>';
		}elseif ($donnees['sexe']==2){
		
			$sexe='Madame';
			echo '<b>Sexe :</b>'. $sexe .'</br>';
		
		}else{
			$sexe='Monsieur et Madame';
			echo '<b>Sexe :</b>'. $sexe .'</br>';
		}
	
		
		
 echo '<b>N°,Rue :</b>'.$donnees['rue'].'</br>';
 echo '<b>Code Postale :</b>'.$donnees['code_postal'].'</br>';
		
		
		 echo '<b>Ville :</b>'.$donnees['ville'].'</br>'; 
 echo '<b>Email :</b>'.$donnees['email'].'</br>';
 echo '<b>Téléphone fixe :</b>'.$donnees['tel1'].'</br>';
 echo '<b>Téléphone portable :</b>'.$donnees['tel2'].'</br>';

		$argent=$donnees['der_solde'];	
		
		if($donnees['der_solde']<0){
			
			echo '<div id="argentneg"><b>dernier solde :</b>'.$argent.'</div></br>';
		}else if($donnees['der_solde']==0){
			echo '<div id="argentegl"><b>dernier solde :</b>'.$argent.'</div></br>';
		}else{
		echo '<div id="argentpos"><b>dernier solde :</b>'.$argent.'</div></br>';
		}
		
		
 
 echo ' ' .'</br>';

	}
	

 echo '</fieldset></form></body></html>';	
 } 
		
 mysql_close(); // On oubli pas de dÃ©connecter la base de donnees

?>