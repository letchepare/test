<?php
function traiterCaptcha($tokenUtilisateur){
		$captchaValide = getReponseCaptcha($tokenUtilisateur);
	return $captchaValide;
}

function getReponseCaptcha($tokenUtilisateur){

	// Récupération de la clé privée dans la base
if ($r = sql_select('cleprivee','spip_captcha')) {
    while ($ligne = sql_fetch($r)) {
        $secret = $ligne['cleprivee']; 
    }
}

    // On récupère l'IP de l'utilisateur

	$remoteip = $_SERVER['REMOTE_ADDR'];


	$api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 

	. $secret

	. "&response=" . $tokenUtilisateur

	. "&remoteip=" . $remoteip ;

	$decode = json_decode(file_get_contents($api_url), true);

	return $decode["success"];
}

