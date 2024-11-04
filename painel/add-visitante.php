<?php
include "verifica.php";

// Variáveis para a mensagem e a classe de alerta
$mensagem = '';
$alertClass = '';

// Inicializa variáveis de erro
$erro_nome = $erro_telefone = $erro_municipio = $erro_cargo = $erro_dtn = $erro_genero = '';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário e remove espaços em branco
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $municipio = trim($_POST['municipio']);
    $cargo = trim($_POST['cargo']);
    $dtn = trim($_POST['dtn']);
    $id_genero = trim($_POST['id_genero']);

    // Validação
    $isValid = true;

    // Verifica se os campos estão vazios
    if (empty($nome)) {
        $erro_nome = 'Este campo não pode ficar vazio.';
        $isValid = false;
    }

    if (empty($telefone)) {
        $erro_telefone = 'Este campo não pode ficar vazio.';
        $isValid = false;
    }

    if (empty($municipio)) {
        $erro_municipio = 'Este campo não pode ficar vazio.';
        $isValid = false;
    }

    if (empty($cargo)) {
        $erro_cargo = 'Este campo não pode ficar vazio.';
        $isValid = false;
    }

    if (empty($dtn)) {
        $erro_dtn = 'Este campo não pode ficar vazio.';
        $isValid = false;
    }

    if (empty($id_genero)) {
        $erro_genero = 'Este campo não pode ficar vazio.';
        $isValid = false;
    }

    // Se não houver erros, chama a função para adicionar o visitante
    if ($isValid) {
        $resultado = $visitantes->add(); // Supondo que a função add() está definida corretamente
        if ($resultado) {
            $mensagem = "Visitante adicionado com sucesso!";
            $alertClass = "alert-success";
        } else {
            $mensagem = "Erro ao adicionar o visitante. Tente novamente.";
            $alertClass = "alert-danger";
        }
    }
}

// Obtém os dados necessários para o formulário
$objetoGenero = $visitantes->Genero();
$puxaPauta = $visitantes->Pauta();
$href_cancelar_btn = 'visitantes';
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
    <title>Painel SEDF - Adicionar Visitante</title>
    <link href="dist/css/style.min.css" rel="stylesheet">
    <style>
        .input-error {
            border-color: red;
            background-color: #fdd;
        }
        .form-text.text-danger {
            color: red;
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Adicionar Visitante</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="visitantes" class="text-muted">Visitantes</a></li>
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
                                <?php if (!empty($mensagem)): ?>
                                    <div class="alert <?php echo $alertClass; ?>" role="alert">
                                        <?php echo $mensagem; ?>
                                    </div>
                                <?php endif; ?>
                                <form id="formVisitante" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Nome</label>
                                                <input class="form-control <?php echo !empty($erro_nome) ? 'input-error' : ''; ?>" type="text" name="nome" value="<?php echo isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : ''; ?>" />
                                                <?php if (!empty($erro_nome)): ?>
                                                    <small class="form-text text-danger"><?php echo $erro_nome; ?></small>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">E-mail</label>
                                                <input class="form-control" type="text" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label">Telefone</label>
                                                <input class="form-control <?php echo !empty($erro_telefone) ? 'input-error' : ''; ?>" type="text" name="telefone" id="kt_inputmask_3" value="<?php echo isset($_POST['telefone']) ? htmlspecialchars($_POST['telefone']) : ''; ?>" />
                                                <?php if (!empty($erro_telefone)): ?>
                                                    <small class="form-text text-danger"><?php echo $erro_telefone; ?></small>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label">Município</label>
                                                <input class="form-control <?php echo !empty($erro_municipio) ? 'input-error' : ''; ?>" type="text" name="municipio" value="<?php echo isset($_POST['municipio']) ? htmlspecialchars($_POST['municipio']) : ''; ?>" />
                                                <?php if (!empty($erro_municipio)): ?>
                                                    <small class="form-text text-danger"><?php echo $erro_municipio; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <label class="col-form-label">Cargo</label>
                                                <input class="form-control <?php echo !empty($erro_cargo) ? 'input-error' : ''; ?>" type="text" name="cargo" value="<?php echo isset($_POST['cargo']) ? htmlspecialchars($_POST['cargo']) : ''; ?>" />
                                                <?php if (!empty($erro_cargo)): ?>
                                                    <small class="form-text text-danger"><?php echo $erro_cargo; ?></small>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label">Data de Nascimento</label>
                                                <input class="form-control <?php echo !empty($erro_dtn) ? 'input-error' : ''; ?>" type="date" name="dtn" value="<?php echo isset($_POST['dtn']) ? htmlspecialchars($_POST['dtn']) : ''; ?>" />
                                                <?php if (!empty($erro_dtn)): ?>
                                                    <small class="form-text text-danger"><?php echo $erro_dtn; ?></small>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label">Gênero</label>
                                                <select name="id_genero" class="form-control <?php echo !empty($erro_genero) ? 'input-error' : ''; ?>">
                                                    <option value="">Selecione...</option>
                                                    <?php foreach ($objetoGenero as $infor_genero): ?>
                                                        <option value="<?= $infor_genero->id; ?>" <?php echo (isset($_POST['id_genero']) && $_POST['id_genero'] == $infor_genero->id) ? 'selected' : ''; ?>>
                                                            <?php echo $infor_genero->genero; ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                                <?php if (!empty($erro_genero)): ?>
                                                    <small class="form-text text-danger"><?php echo $erro_genero; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <hr class="mt-5 mb-5">

                                    </div>
                                    <?php include "./utils/botoes-acao.php"; ?>
                                    <input type="hidden" name="acao" value="addVisitante">
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
    <!-- Inputmask plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script>
        var KTInputmask = function() {
            var demos = function() {
                $("#kt_inputmask_3").inputmask("mask", {
                    "mask": "(99) 99999-9999"
                });
            }

            return {
                init: function() {
                    demos();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTInputmask.init();
        });
    </script>
</body>
</html>
