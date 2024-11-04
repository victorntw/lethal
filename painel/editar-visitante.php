<?php include "verifica.php";
$id = '';
if (isset($_GET['id'])) {
    if (empty($_GET['id'])) {
        header('Location: categorias.php');
    } else {
        $id = $_GET['id'];
    }
}
$visitantes->editar();
$editarVisitante = $visitantes->rsDados($id);
$puxaPauta = $visitantes->Pauta();
$puxaGeneros = $visitantes->Genero();
$objetoGenero = $puxaGeneros;
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
    <title>Painel SEDF - Editar Visitante</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar Visitante</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="visitantes.php" class="text-muted">Visitantes</a></li>
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
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-body">

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Nome</label>
                                                    <input type="text" class="form-control" name="nome" 
                                                           value="<?php if (isset($editarVisitante->nome) && !empty($editarVisitante->nome)) {echo $editarVisitante->nome;} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">E-mail</label>
                                                    <input type="text" class="form-control" name="email" 
                                                           value="<?php if (isset($editarVisitante->email) && !empty($editarVisitante->email)) {echo $editarVisitante->email;} ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Telefone</label>
                                                    <input type="text" id="kt_inputmask_3" class="form-control" name="telefone" 
                                                    value="<?php if (isset($editarVisitante->telefone) && !empty($editarVisitante->telefone)) {echo $editarVisitante->telefone;} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Município</label>
                                                    <input type="text" class="form-control" name="municipio" 
                                                           value="<?php if (isset($editarVisitante->municipio) && !empty($editarVisitante->municipio)) {echo $editarVisitante->municipio;} ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Cargo</label>
                                                    <input type="text" class="form-control" name="cargo" 
                                                           value="<?php if (isset($editarVisitante->cargo) && !empty($editarVisitante->cargo)) {echo $editarVisitante->cargo;} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Data de Nascimento</label>
                                                    <input type="date" class="form-control" name="dtn" 
                                                           value="<?php if (isset($editarVisitante->dtn) && !empty($editarVisitante->dtn)) {echo $editarVisitante->dtn;} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label class="col-form-label">Genero</label>
                                                <select name="id_genero" class="form-control">
                                                    <?php foreach ($objetoGenero as $pessoa) : ?>
                                                        <option value="<?= $pessoa->id; ?>"<?php if (isset($editarVisitante->id_genero) && $editarVisitante->id_genero == $pessoa->id) {echo "selected";} ?>>
                                                                <?php echo $pessoa->genero; ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-5 mb-5">
                                   <?php include "./utils/botoes-acao.php"; ?>
                                    <input type="hidden" name="acao" value="editaVisitante">
                                    <input type="hidden" name="id" value="<?php if (isset($editarVisitante->id) && !empty($editarVisitante->id)) {echo $editarVisitante->id;} ?>">
                                    <input type="hidden" name="foto_Atual" value="<?php if (isset($editarVisitante->foto) && !empty($editarVisitante->foto)) {echo $editarVisitante->foto;} ?>">
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
        var KTInputmask = function () {

        // Private functions
        var demos = function () {
        
        // phone number format
        $("#kt_inputmask_3").inputmask("mask", {
        "mask": "(99) 99999-9999"
        });

        // empty placeholder
        $("#kt_inputmask_4").inputmask({
        "mask": "999.999.999-99"
        });

        }

        return {
        // public functions
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