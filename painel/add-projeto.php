<?php include "verifica.php"; ?>
<?php
$projetos->add();
$puxaRepresentante = $projetos->Representante();
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
    <title>Painel SEDF - Adicionar Projeto</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Adicionar Projeto</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="projeto.php" class="text-muted">Projetos</a></li>
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
                                <form id="formRepresentantes" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">

                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Nome</label>
                                                <input class="form-control" type="text" name="nome" />
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label" for="">Representante</label>
                                                <div class="input-group" id="representanteGroup">
                                                    <select type="text" name="representante1" class="form-control">
                                                        <option selected>Selecione...</option>
                                                        <?php foreach ($puxaRepresentante as $infor_rp) : ?>
                                                        <option value="<?= $infor_rp->id; ?>"><?php echo $infor_rp->representante; ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                    <button type="button" class="btn btn-success ml-1" id="addRepresentante"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="maxRepresentantesAlert" class="alert alert-warning mt-3 d-none" role="alert">
                                            Você atingiu o limite máximo de 2 representantes por projeto.
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">N° SEI</label>
                                                <input class="form-control" type="text" name="numero_sei" />
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">SEI (Link)</label>
                                                <input class="form-control text-info" type="text" name="sei_link" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Andamento</label>
                                                <textarea name="status" class="form-control" cols="30" rows="3"></textarea>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label">Executar até :</label>
                                                <input class="form-control" type="date" name="executar_ate" id="executar_ate" />
                                                <small id="executar_ate_error" class="form-text text-danger d-none">Este campo não pode ficar vazio.</small>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label">Última Atualização :</label>
                                                <input class="form-control" type="date" name="ultima_atualizacao" id="ultima_atualizacao" />
                                                <small id="ultima_atualizacao_error" class="form-text text-danger d-none">Este campo não pode ficar vazio.</small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label">Tipo</label>
                                                <input class="form-control" type="text" name="tipo" />
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label">Valor</label>
                                                <input class="form-control" type="text" name="valor" />
                                            </div>
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
                                            <a href="projetos" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    </div>

                                    <input type="hidden" name="acao" value="addProjeto">
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
        var maxRepresentantes = 2;
        var contador = 1;

        // Adicionar novo input de representante
        $('#addRepresentante').click(function() {
            if (contador < maxRepresentantes) {
                contador++;

                var html = '<div class="row">' +
                    '<div class="col-md-6 col-sm-12">' +
                        '<label class="col-form-label" for="">Representante ' + contador + '</label>' +
                        '<div class="input-group">' +
                            '<select type="text" name="representante' + contador + '" class="form-control">' +
                                '<option selected>Selecione...</option>' +
                                '<?php foreach ($puxaRepresentante as $infor_rp) : ?>' +
                                    '<option value="<?= $infor_rp->id; ?>"><?= $infor_rp->representante; ?></option>' +
                                '<?php endforeach ?>' +
                            '</select>' +
                            '<button type="button" class="btn btn-danger ml-1 removeRepresentante"><i class="fas fa-minus"></i></button>' +
                        '</div>' +
                    '</div>' +
                '</div>';

                // Adiciona o novo campo logo após o grupo de representantes
                $('#representanteGroup').closest('.form-group').after(html);
            } else {
                $('#maxRepresentantesAlert').removeClass('d-none');
            }
        });

        // Remover input de representante
        $('#formRepresentantes').on('click', '.removeRepresentante', function() {
            $(this).closest('.row').remove();
            contador--;

            // Verifica se o alerta deve ser ocultado
            if (contador < maxRepresentantes) {
                $('#maxRepresentantesAlert').addClass('d-none');
            }
        });

        // Validação do formulário
        $('#formRepresentantes').submit(function(event) {
            // Remove qualquer mensagem de erro anterior e remove a classe de erro
            $('#executar_ate_error').addClass('d-none');
            $('#ultima_atualizacao_error').addClass('d-none');
            $('#executar_ate').removeClass('input-error');
            $('#ultima_atualizacao').removeClass('input-error');
            
            var isValid = true;
            
            // Verifica se os campos estão vazios
            if ($('#executar_ate').val() === '') {
                $('#executar_ate_error').removeClass('d-none');
                $('#executar_ate').addClass('input-error');
                isValid = false;
            }
            
            if ($('#ultima_atualizacao').val() === '') {
                $('#ultima_atualizacao_error').removeClass('d-none');
                $('#ultima_atualizacao').addClass('input-error');
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
