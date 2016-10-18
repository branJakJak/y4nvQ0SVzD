<?php

$dbConfig = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=cut8_records',
    'username' => 'cut8_records',
    'password' => 'g9SYxWmIUoQzeM2sBTiR',
    'charset' => 'utf8',
];
if (YII_DEBUG) {
	$dbConfig = [
	    'class' => 'yii\db\Connection',
	    'dsn' => 'mysql:host=localhost;dbname=records_check',
	    'username' => 'root',
	    'password' => 'root',
	    'charset' => 'utf8',
	];
}

return $dbConfig;