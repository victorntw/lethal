<?php 
include "../env-verification.php";

$hostname_conexao = 'localhost' ; 
// $_ENV['HOSTNAME_CONEXAO'];
$database_conexao = 'sedf'; 
// $_ENV["DATABASE_CONEXAO"];
$username_conexao = 'victorntw'; 
// $_ENV["USERNAME_CONEXAO"];
$password_conexao = 'ntw'; 
// $_ENV["PASSWORD_CONEXAO"];


global $conn;

try {
    $conn = new PDO("mysql:host=$hostname_conexao;dbname=$database_conexao", $username_conexao, $password_conexao);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "ERRO: ".$e->getMessage();
}