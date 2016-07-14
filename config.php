<?php return array (
    #false
  'debug' =>$_ENV['WEB_DEBUG'],
  'database' => 
  array (
    'driver' => 'mysql',
    'host' => '$_ENV['MYSQL_IP']',
    'database' => '$_ENV['MYSQL_INSTANCE_NAME']',
    'username' => '$_ENV['MYSQL_USERNAME']',
    'password' => '$_ENV['MYSQL_PASSWORD']',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
    'strict' => false,
  ),
  'url' => '$_ENV['WEB_URL']',
  'paths' => 
  array (
    'api' => 'api',
    'admin' => 'admin',
  ),
);
