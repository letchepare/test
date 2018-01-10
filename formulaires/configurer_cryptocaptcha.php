<?php

if (!defined('_ECRIRE_INC_VERSION')) return;

function formulaires_configurer_cryptocaptcha_charger_dist(){
	$valeurs = array('cleSite'=>"",'clePrivee'=>"");
	
	return $valeurs;
}

function formulaires_configurer_cryptocaptcha_verifier_dist(){
	$erreurs = array();
	// verifier que les champs obligatoires sont bien la :

	if (count($erreurs))
		$erreurs['message_erreur'] = 'Votre saisie contient des erreurs !';
	return $erreurs;
}


function getReponseCaptcha($tokenUtilisateur){

	// Clé privée

	$secret = "6LfwyD8UAAAAAFomWftmUBMj8e7d1B--ATGZ8PBl";

    // On récupère l'IP de l'utilisateur

	$remoteip = $_SERVER['REMOTE_ADDR'];


	$api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 

	. $secret

	. "&response=" . $tokenUtilisateur

	. "&remoteip=" . $remoteip ;

	$decode = json_decode(file_get_contents($api_url), true);

	return $decode["success"];
}

function formulaires_configurer_cryptocaptcha_traiter_dist(){

	$clePrivee=$_REQUEST['saisieClePrivee'];
	$cleSite=$_REQUEST['saisieCleSite'];
	sql_updateq('spip_captcha', array('cleprivee' => "$clePrivee",'clesite'=>"$cleSite"), "id=1");

	return array(
        'message_ok' => 'Enregistrement effectué !'
    );

}

?>