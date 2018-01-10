<?php

sql_create("spip_captcha",
    array(
		"id" => "INT(1) NOT NULL",
		"cleprivee" => "VARCHAR(256) DEFAULT 'clé privée'",
		"clesite"=> "VARCHAR(256) DEFAULT 'clé de site",
		);,
    array(
        'PRIMARY KEY' => "id"
    )
);




?>
