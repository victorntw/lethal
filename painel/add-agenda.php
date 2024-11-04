<?php include "verifica.php"; ?>
<?php
$agenda->add();
$puxaAreas = $agenda->Area();

// BreadCrumb
$page = "Agenda";
$pageLower = strtolower($page);
$voltarpara="Home";

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
    <title>Adicionar <?=$page?> </title>
    <link href="dist/css/style.min.css" rel="stylesheet">
    <style>
            .input-error {
                border-color: red;
                /* Adiciona uma borda vermelha ao campo de input com erro */
                background-color: #fdd;
                /* Adiciona um fundo vermelho claro para destacar o erro */
            }

            .form-text.text-danger {
                color: red;
                /* Garante que a mensagem de erro também seja exibida em vermelho */
            }
    </style>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Adicionar <?=$page?></h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="<?=$pageLower?>" class="text-muted"><?=$page?></a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="formAgenda" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">

                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Nome</label>
                                                <input class="form-control" type="text" name="nome" id="nome" />
                                                <small id="nome_error" class="form-text text-danger d-none">Este campo não pode ficar vazio.</small>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Assunto</label>
                                                <input class="form-control" type="text" name="assunto" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Local</label>
                                                <input class="form-control" type="text" name="local" />
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label">Data:</label>
                                                <input class="form-control" type="date" name="data" id="data" />
                                                <small id="data_error" class="form-text text-danger d-none">Este campo não pode ficar vazio.</small>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label">Área</label>
                                                <select id="areaSelect" name="area" class="form-control">
                                                    <option value="" selected>Selecione...</option>
                                                    <?php foreach ($puxaAreas as $area) : ?>
                                                        <!-- < ?php if ($area->id_cargo == 5): ?> -->
                                                            <option value="<?= $area->id; ?>">
                                                                <?php echo $area->nome; ?>
                                                            </option>
                                                        <!-- < ?php endif; ?> -->
                                                    <?php endforeach ?>
                                                </select>
                                                <small id="areaSelect_error" class="form-text text-danger d-none">Este campo não pode ficar vazio.</small>

                                                <!-- Campo oculto para o nome do representante -->
                                                <!-- <input type="hidden" id="representanteNome" name="representante"> -->
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                    <label class="col-form-label">Órgão</label>
                                                    <input class="form-control" type="text" name="orgao" />
                                                </div>
                                            <!-- <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label">Última Atualização :</label>
                                                <input class="form-control" type="date" name="ultima_atualizacao" id="ultima_atualizacao" />
                                                <small id="ultima_atualizacao_error" class="form-text text-danger d-none">Este campo não pode ficar vazio.</small>
                                            </div> -->
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label">Descrição</label>
                                                <textarea name="descricao" class="ckeditor" id="ckeditor" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                    <hr class="mt-5 mb-5">

                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="reset" class="btn btn-light">Limpar Dados</button>
                                            <button type="submit" class="btn btn-success">Salvar</button>
                                            <a href="<?=$pageLower?>" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    </div>

                                    <input type="hidden" name="acao" value="add<?=$page?>">
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

    <script>
    $(document).ready(function() {

        // Validação do formulário
        $('#formAgenda').submit(function(event) {
            // Remove qualquer mensagem de erro anterior e remove a classe de erro
            $('#data').removeClass('input-error');
            $('#data_error').addClass('d-none');

            $('#ultima_atualizacao').removeClass('input-error');
            $('#ultima_atualizacao_error').addClass('d-none');

            $('#nome').removeClass('input-error');
            $('#nome_error').addClass('d-none');
            
            var isValid = true;
            
            // Verifica se os campos estão vazios
            if ($('#data').val() === '') {
                $('#data_error').removeClass('d-none');
                $('#data').addClass('input-error');
                isValid = false;
            }

            if ($('#nome').val() === '') {
                $('#nome_error').removeClass('d-none');
                $('#nome').addClass('input-error');
                isValid = false;
            }
            
            if ($('#areaSelect').val() === '') {
                $('#areaSelect_error').removeClass('d-none');
                $('#areaSelect').addClass('input-error');
                isValid = false;
            }
            
            // Se algum campo estiver vazio, impede o envio do formulário
            if (!isValid) {
                event.preventDefault();
            }
        });
    });
    </script>

</body>

</html>
