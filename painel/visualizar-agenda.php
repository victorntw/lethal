<?php
include "verifica.php";

// Inicializa a variável de ID
$id = '';

// Verifica se o parâmetro 'id' está presente na URL e não está vazio
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: agenda');
    exit();
}

// Supondo que o método editar() seja responsável por inicializar a edição
$agenda->editar();
$editarAgenda = $agenda->rsDados($id);
$puxaRepresentante = $agenda->area();
$puxaAreas = $agenda->Area();

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
    <title>Painel SEDF - Editar Agenda</title>
    <link href="dist/css/style.min.css" rel="stylesheet">
    <style>
        .input-error {
            border-color: #dc3545;
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar Agenda</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="agenda" class="text-muted">Agendas</a></li>
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
                                <form id="formAgenda" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="nome">Nome</label>
                                                    <p class="fw-bold"><?php echo htmlspecialchars(trim($editarAgenda->nome ?? '')); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="assunto">Assunto</label>
                                                    <p><?php echo htmlspecialchars(trim($editarAgenda->nome ?? '')); ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label" for="local">Local</label>
                                                <p><?= !empty($editarAgenda->local) ? $editarAgenda->local : 'Nenhum Local Informado!' ?></p>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label" for="data">Data</label>
                                                <p><?php echo htmlspecialchars(trim($editarAgenda->data ?? '')); ?></p>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label">Área</label>
                                                <p >
                                                    <?php foreach ($puxaAreas as $area) : ?>
                                                        <?php if ($editarAgenda->area == $area->id) echo "$area->nome"; ?>
                                                    <?php endforeach ?>
                                                </p>

                                                <!-- Campo oculto para o nome do representante -->
                                                <!-- <input type="hidden" id="representanteNome" name="representante"> -->
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label" for="orgao">Órgão</label>
                                                <p><?= !empty($editarAgenda->orgao) ? $editarAgenda->orgao : 'Nenhum Órgão Informado!' ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label">Descrição</label>
                                                <p><?php echo $editarAgenda->descricao; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-5 mb-5">
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <a href="editar-agenda?id=<?php echo $editarAgenda->id; ?>" title="[Editar] :: <?php echo htmlspecialchars($editarAgenda->nome); ?>"  class="btn btn-warning"><i class="fas fa-pencil-alt"> Editar</i></a>

                                            <a href="agenda" class="btn btn-primary">Voltar</a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="editaAgenda">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars(trim($editarAgenda->id ?? '')); ?>">
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

                // Validação do formulário
            $('#formAgenda').submit(function(event) {
            // Remove qualquer mensagem de erro anterior e remove a classe de erro
            $('#ultima_atualizacao_error').addClass('d-none');
            $('#ultima_atualizacao').removeClass('input-error');
            
            var isValid = true;
            
            // Verifica se os campos estão vazios
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
