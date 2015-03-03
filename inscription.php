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



$identifiant=0;


/* Recherche d'un adherent avec petit formulaire */

echo '<form method="post" action=" http://WEBSERVER/wordpress/?page_id=353.php">
<table>
<tr>
<td>
<fieldset>
<label>Adhérent : <input type="text" name="identifiant" maxlength="35" size="35" ></label></br>
<label>Nom  : <input type="text" name="nom" maxlength="34" size="34" ></label></br>
<label>Prénom  : <input type="text" name="prenom" maxlength="34" size="34" ></label></br>
</br>
<label>Genre : <select name="choix">
                         <option value="1" >Monsieur </option>
                         <option value="2">Madame</option>
                         <option value="3">Madame et Monsieur</option>
</select></label></br>
</td>

</fieldset>
<td>
<fieldset>

<label>Rue : <input type="text" name="rue" maxlength="120" size="120" ></label</br>
<label>Ville : <input type="text" name="ville" maxlength="15" size="15" ><label>
<label>Code : <input type="text" name="code_postal" maxlength="05" size="05" ></label>
</fieldset>
</td>
</tr>
</br>
</br>
</br>
<tr>
<td>
<fieldset>
</br>
</br>
<label>Tel (fixe) :<input type="text" name="tel1" maxlength="14" size="14" ></label></br>
</br>

<label>Tel (portable) :<input type="text" name="tel2" maxlength="14" size="14" ></label></br>
</br>
<label>Email :<input type="email" name="email" /></label></br>
</br>

 </br>
</br>
<label>Date Adhésion <input type="date" name="date_adhesion"/></label></br>
</br>
<label>Date Cotisation :<input type="date" name="date_cotisation"></label></br>	
</br>
</br>
<label >Solde: <input type="text" name="der_solde"></label> </br>

</fieldset>
</td>

<td>
<fieldset>
</br>
</br>

 <label>Voiture: <input type="checkbox" name="voiture"/></label> </br>


<label>date-enr:<input type="date" name="date_enr"/></label></br>
</br>

<label>credit:<input type="text" name="credit"/></label></br>

</br>
<label>date de naissance :<input type="date" name="date_naiss"/></label></br>


</fieldset>
</td>



</tr>
</table>
</br>
</br>
<input type="submit" value="Confirmer">
<input type="reset" onClick="clear()" value="Annuler">

</form></body></html>';

$adherent = htmlspecialchars ($_POST['identifiant']);

$sexe=htmlspecialchars ($_POST['choix']);
$nom = htmlspecialchars ($_POST['nom']);
$prenom = htmlspecialchars ($_POST['prenom']);
$tel1 = htmlspecialchars ($_POST['tel1']);
$tel2 = htmlspecialchars ($_POST['tel2']);
$rue = htmlspecialchars ($_POST['rue']);
$code = htmlspecialchars ($_POST['code_postal']);
$ville = htmlspecialchars ($_POST['ville']);
$email = htmlspecialchars ($_POST['email']);
$date_adhesion = htmlspecialchars ($_POST['date_adhesion']);
$date_cotisation = htmlspecialchars ($_POST['date_cotisation']);
$voiture = htmlspecialchars ($_POST['voiture']);
$date_enr= htmlspecialchars ($_POST['date_enr']);
$der_solde=htmlspecialchars ($_POST['der_solde']);

$credit=htmlspecialchars ($_POST['credit']);
$date_naiss=htmlspecialchars ($_POST['date_naiss']);



/* connexion à la BDD */

$db = mysql_connect('localhost', 'user', 'pwd');  // 1
mysql_select_db('base de donnée',$db);                    // 2

// on crée la requête SQL
$sql = "INSERT INTO `sel_adherent`(`id_adherent`, `identifiant`, `nom`, `prenom`,
`rue`, `code_postal`, `ville`, `tel1`, `tel2`, `email`, `date_adhesion`, `date_cotisation`, 
`sexe`, `voiture`, `date_enr`, `der_solde`, `debit`, `credit`, `date_naiss`,actif) VALUES
(' ','$adherent','$nom','$prenom','$rue','$code','$ville','$tel1','$tel2','$email','$date_adhesion',
'$date_cotisation','$sexe','$voiture','$date_enr','$der_solde','0','$credit','$date_naiss','1')";


// on envoie la requête
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());



	
	
	
	









// on fait une boucle qui va faire un tour pour chaque enregistrement
echo' Enregistrement de <b>'. $nom.'</b> est executé;
 </br>Cela correspond à une inscription de la date :'.$date_cotisation.'</br>
 Vous avez un dernier solde de '.$der_solde;

// on ferme la connexion à mysql
mysql_close(); 



?>