<?php 
    require 'vendor/autoload.php';

    // Verificar se o arquivo .env.local existe e carregá-lo
if (file_exists(__DIR__ . '/.env.local')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '.env.local');
    $dotenv->load();
} else {
    // Carregar o arquivo .env padrão
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}
