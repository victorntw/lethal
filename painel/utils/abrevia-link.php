<?php 

function abreviarLink($link, $comprimento = 30) {
    // Verifica se o comprimento do link é maior que o comprimento especificado
    if (strlen($link) > $comprimento) {
        // Retorna o link abreviado com "..." no final e o link completo como dica
        return '<a href="' . htmlspecialchars($link) . '" title="' . htmlspecialchars($link) . '">' . htmlspecialchars(substr($link, 0, $comprimento)) . '...</a>';
    }
    // Retorna o link original se ele for menor ou igual ao comprimento especificado
    return '<a href="' . htmlspecialchars($link) . '" title="' . htmlspecialchars($link) . '">' . htmlspecialchars($link) . '</a>';
}