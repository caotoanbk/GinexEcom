<?php
return array(
    'fetch' => PDO::FETCH_CLASS,
    'default' => 'mysql',
	'migrations' => 'migrations',
    'connections' => array(
        'mysql' => array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'ginexecom',
            'username'  => 'root',
            'password'  => 'root',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ),
    ),
);
?>
