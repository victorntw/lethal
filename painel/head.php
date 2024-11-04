<?php 
// Obtém a URI da requisição atual
$request_uri = $_SERVER['REQUEST_URI'];

// Remove a barra inicial, se houver
$request_uri = ltrim($request_uri, '/');

// Divide a string em partes usando a barra como delimitador
$parts = explode('/', $request_uri);

// Pega o último elemento do array (que é o primeiro nome antes da primeira barra, contando de trás para frente)
$primeiro_nome = end($parts);

// Transforma a primeira letra em maiúscula
$nome_pagina = ucfirst($primeiro_nome);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="sedf">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/icon-se.png">
    <title>SEDF - <?= $nome_pagina ?></title>
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="assets\css\custom-table.css" rel="stylesheet">
</head>