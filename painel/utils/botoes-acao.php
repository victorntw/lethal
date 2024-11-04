<?php 

$script_name = $_SERVER['SCRIPT_NAME'];

// Extrair o nome do arquivo
$filename = basename($script_name); // basename() retorna "editar-visitante.php"

$verifica_limpa_dados = '';
// Verificar se o nome do arquivo começa com 'editar-'
if (strpos($filename, 'editar-') === 0) {
    $verifica_limpa_dados = 's';
} else {
    $verifica_limpa_dados = 'n';
}
// echo $verifica_limpa_dados;
?>
<div class="form-actions">
    <div class="text-right">
        <?php if ($verifica_limpa_dados == 'n'): ?>
            <button type="reset" class="btn btn-light">Limpar Dados</button>
        <?php endif;?>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="<?=$href_cancelar_btn?>" class="btn btn-danger">Cancelar</a>
    </div>
</div>