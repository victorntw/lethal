<?php

include "env-verification.php";


// dump ($_ENV);die;

$_SERVER['dev'] = false; //NOTE - Habilitar em ambiente de desenvolvimento

if ($_SERVER['HTTP_HOST'] == $_ENV["HTTP_HOST_PAINEL"]) {
    $_SERVER['dev'] = false;
} else {
    $_SERVER['dev'] = true;
}

if ($_SERVER['dev'] == true) {
    define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/' . $_ENV['HTTP_HOST_PAINEL']);
    // var_dump (SITE_URL . " | " . 'http://' . $_SERVER['HTTP_HOST'] . $_ENV['HTTP_HOST']);die;
} else {
    define('SITE_URL', 'https://' . $_SERVER['HTTP_HOST']);
}
// var_dump (SITE_URL);die;