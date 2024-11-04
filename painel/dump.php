<?php
// Inclua o autoloader do Composer
require_once __DIR__ . '/vendor/autoload.php';

// Crie uma função global para chamar dump()
function dump($var) {
    \Symfony\Component\VarDumper\VarDumper::dump($var);
}
?>
