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


if (isset($_GET['identifiant'])){
	
	
	
	
echo '<html><body>
<form method="post" action="http://WEBSERVER/wordpress/?page_id=393">

</br>
</br>
';

	
	// connexion à la base
$Host = "localhost";
$User = "user";
$Password = "pdw";
$Database = "base de donnée";

$idConnect = mysql_connect( $Host, $User, $Password)
             or die( "Connexion impossible.");
$db = mysql_select_db( $Database, $idConnect)
             or die( "Accès base impossible.");

$ident = htmlspecialchars($_GET['identifiant']);


// Paramètres de connexion


$query="SELECT identifiant,sexe,nom,prenom,ville,email,tel1,tel2, der_solde,actif FROM `sel_adherent`ORDER BY identifiant ASC " ;
//add "result"
$result = mysql_query($query);

if (!$query) {
die ("Can't Connect :" .mysql_error());
}

while ($donnees = mysql_fetch_array($result)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
 {
	if($ident == htmlspecialchars($donnees['identifiant']))
	{

		$actif=htmlspecialchars($donnees['actif']);
		echo '<fieldset class="adher">';
		 
 echo '<b>Identifiant :</b>'.htmlspecialchars($donnees['identifiant']).'</br>'; 
		$sexe='';	
		if($donnees['sexe']==1){
			$sexe='Monsieur';
			 echo '<p class="avatarH">';
			 if($actif==0){
			
						echo'';
					}
					
			 
			 
			 
			echo' </p>';
			echo '<p style="line-hight:65px"><b>Genre :</b>'. $sexe .'</br></p>';
		}elseif ($donnees['sexe']==2){
			 echo '<p class="avatarF">';
			 
			 if($actif==0){
			
						
					echo'';
					}

				 
			echo' </p>';
		
			$sexe='Madame';
			echo '<p style="line-hight:65px"><b>Genre :</b>'. $sexe .'</br></p>';
		
		}else{
			
			echo '<p class="avatarM"></p>';
			$sexe='Madame et Monsieur';
			echo '<p style="line-hight:65px"><b>Genre :</b>'. $sexe .'</br></p>';
			
			if($actif==0){
			
						
					echo'';
					}
			
			
			
			
		}
	 
 echo '<b>Nom :</b>'.htmlspecialchars($donnees['nom']).'</br>'; 
 echo '<b>Prénom :</b>'.htmlspecialchars($donnees['prenom']).'</br>'; 		
 echo '<b>Ville :</b>'.htmlspecialchars($donnees['ville']).'</br>'; 
 echo '<b>Email :</b>'.htmlspecialchars($donnees['email']).'</br>';
 echo '<b>Tél. fixe :</b>'.htmlspecialchars($donnees['tel1']).'</br>';
 echo '<b>Tél. portable :</b>'.htmlspecialchars($donnees['tel2']).'</br>';
 $argent=htmlspecialchars($donnees['der_solde']);	
		
		if(htmlspecialchars($donnees['der_solde'])<-2000){
			
			echo '<div class="argentneg"><b>dernier solde :</b>'.$argent.'</div></br>';
		}else if(htmlspecialchars($donnees['der_solde'])==0){
			echo '<div class="argentegl"><b>dernier solde :</b>'.$argent.'</div></br>';
		}else{
		echo '<div class="argentpos"><b>dernier solde :</b>'.$argent.'</div></br>';
		}
		
		
		
 #echo ' ' .'</br>';

	}


 echo '</fieldset></form></body></html>';	
 } 
		

mysql_free_result($result);	






	
	
	
	
	
}
else
{
	echo '';
}

?>