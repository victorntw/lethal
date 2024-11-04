<?php
include "verifica.php";

// Inicializa a variável de ID
$id = '';

// Verifica se o parâmetro 'id' está presente na URL e não está vazio
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: projetos');
    exit();
}

// Supondo que o método editar() seja responsável por inicializar a edição
$projetos->editar();
$editarProjeto = $projetos->rsDados($id);
$puxaRepresentante = $projetos->representante();
?>
<!DOCTYPE html>
<html dir="ltr" lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="sedf">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/fav.png">
    <title>Painel SEDF - Editar Projeto</title>
    <link href="dist/css/style.min.css" rel="stylesheet">
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <?php include "header.php"; ?>
        <?php include "inc-menu-lateral.php"; ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar Projeto</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="projetos.php" class="text-muted">Projetos</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center"></div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="nome">Nome</label>
                                                    <input type="text" class="form-control" name="nome" id="nome" 
                                                           value="<?php echo htmlspecialchars(trim($editarProjeto->nome ?? '')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label" for="representante1">Representante</label>
                                                <div class="input-group" id="representanteGroup">
                                                    <select name="representante1" class="form-control" id="representante1">
                                                        <?php foreach ($puxaRepresentante as $infor_rp) : ?>
                                                            <option value="<?= htmlspecialchars($infor_rp->id); ?>" 
                                                                <?php if ($editarProjeto->representante1 == $infor_rp->id) echo "selected"; ?>>
                                                                <?= htmlspecialchars($infor_rp->representante); ?>
                                                            </option>
                                                        <?php endforeach ?>
                                                    </select>
                                                    <button type="button" class="btn btn-success ml-1" id="addRepresentante"><i class="fas fa-plus"></i></button>
                                                </div>
                                                <div id="maxRepresentantesAlert" class="alert alert-warning mt-3 d-none" role="alert">
                                                    Você atingiu o limite máximo de 2 representantes por projeto.
                                                </div>
                                                <div id="representantesAdicionais">
                                                    <?php if (isset($editarProjeto->representante2)) : ?>
                                                        <div class="row representative-row" data-representante-id="2">
                                                            <div class="col-md-12 col-sm-12">
                                                                <label class="col-form-label" for="representante2">Representante 2</label>
                                                                <div class="input-group">
                                                                    <select name="representante2" class="form-control" id="representante2">
                                                                        <option selected>Selecione...</option>
                                                                        <?php foreach ($puxaRepresentante as $infor_rp) : ?>
                                                                            <option value="<?= htmlspecialchars($infor_rp->id); ?>" 
                                                                                <?php if ($editarProjeto->representante2 == $infor_rp->id) echo "selected"; ?>>
                                                                                <?= htmlspecialchars($infor_rp->representante); ?>
                                                                            </option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                    <button type="button" class="btn btn-danger ml-1 removeRepresentante"><i class="fas fa-minus"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label" for="numero_sei">N° SEI</label>
                                                <input class="form-control" type="text" name="numero_sei" id="numero_sei" 
                                                       value="<?php echo htmlspecialchars(trim($editarProjeto->numero_sei ?? '')); ?>" />
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label" for="sei_link">SEI (Link)</label>
                                                <input class="form-control text-info" type="text" name="sei_link" id="sei_link" 
                                                       value="<?php echo htmlspecialchars(trim($editarProjeto->sei_link ?? '')); ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label" for="status">Andamento</label>
                                                <textarea name="status" id="status" class="form-control" cols="30" rows="3"><?php echo htmlspecialchars(trim($editarProjeto->status ?? '')); ?></textarea>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label" for="executar_ate">Executar até :</label>
                                                <input class="form-control" type="date" name="executar_ate" id="executar_ate" 
                                                       value="<?php echo htmlspecialchars(trim($editarProjeto->executar_ate ?? '')); ?>" />
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label" for="ultima_atualizacao">Última Atualização :</label>
                                                <input class="form-control" type="date" name="ultima_atualizacao" id="ultima_atualizacao" 
                                                       value="<?php echo htmlspecialchars(trim($editarProjeto->ultima_atualizacao ?? '')); ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label" for="tipo">Tipo</label>
                                                <input class="form-control" type="text" name="tipo" id="tipo" 
                                                       value="<?php echo htmlspecialchars($editarProjeto->tipo ?? ''); ?>" />
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label" for="valor">Valor</label>
                                                <input class="form-control" type="text" name="valor" id="valor" 
                                                       value="<?php echo htmlspecialchars($editarProjeto->valor ?? ''); ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label" for="descricao">Descrição</label>
                                                <textarea name="descricao" id="descricao" class="ckeditor" cols="30" rows="10">
                                                    <?php echo htmlspecialchars(trim($editarProjeto->descricao ?? '')); ?>
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-5 mb-5">
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="reset" class="btn btn-light">Limpar Dados</button>
                                            <button type="submit" class="btn btn-success">Salvar</button>
                                            <a href="projetos" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="editaProjeto">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars(trim($editarProjeto->id ?? '')); ?>">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "footer.php"; ?>
        </div>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <script src="vendor/ckeditor/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script>
    $(document).ready(function() {
        var maxRepresentantes = 2;
        var contador = $('#representantesAdicionais .representative-row').length + 1;

        $('#addRepresentante').click(function() {
            if (contador < maxRepresentantes) {
                contador++;

                var html = '<div class="row representative-row" data-representante-id="' + contador + '">' +
                   '<div class="col-md-12 col-sm-12">' +
                       '<label class="col-form-label" for="representante' + contador + '">Representante ' + contador + '</label>' +
                       '<div class="input-group">' +
                           '<select name="representante' + contador + '" class="form-control" id="representante' + contador + '">' +
                               '<option selected>Selecione...</option>' +
                               '<?php foreach ($puxaRepresentante as $infor_rp) : ?>' +
                                   '<option value="<?= htmlspecialchars($infor_rp->id); ?>"><?= htmlspecialchars($infor_rp->representante); ?></option>' +
                               '<?php endforeach ?>' +
                           '</select>' +
                           '<button type="button" class="btn btn-danger ml-1 removeRepresentante"><i class="fas fa-minus"></i></button>' +
                       '</div>' +
                   '</div>' +
               '</div>';

                $('#representantesAdicionais').append(html);
            } else {
                $('#maxRepresentantesAlert').removeClass('d-none');
            }
        });

        $('#representantesAdicionais').on('click', '.removeRepresentante', function() {
            $(this).closest('.representative-row').remove();
            contador--;

            if (contador < maxRepresentantes) {
                $('#maxRepresentantesAlert').addClass('d-none');
            }
        });
    });
    </script>
</body>
</html>
