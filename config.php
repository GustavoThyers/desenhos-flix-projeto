<?php

//conexao com o banco de dados e a url armazenada na variavel $base

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$db_name = 'th_filmes';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);


?>