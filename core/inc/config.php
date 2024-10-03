<?php
$env = parse_ini_file('../.env');

$host =$env['DB_HOST'];
$username = $env["DB_USERNAME"];
$password = $env["DB_PASSWORD"];
$database = $env["DB_DATABASE_NAME"];


define("DB_HOST", $host);
define("DB_USERNAME", $username);
define("DB_PASSWORD", $password);
define("DB_DATABASE_NAME", $database);

