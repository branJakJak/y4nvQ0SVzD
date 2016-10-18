<?php

$dbConfig = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=site8_records',
    'username' => 'site8_records',
    'password' => 'PqDt6YiwaWG847m',
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