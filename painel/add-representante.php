<?php 
include "verifica.php"; 
$projetos->addRepresentante();
$puxaUsuarios = $usuarios->rsDados();
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
    <title>Painel SEDF - Adicionar Representantes</title>
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-gf5P8fB89wFBoKGWFPXnxe1m1dNSW5g1vM8Iymx2mj2vN8sg09NG7FGxQYKpyLV2l0jxdNCh1rYYx+NfQK7g2g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <?php include "header.php";?>
        <?php include "inc-menu-lateral.php";?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Adicionar Representante</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="representantes" class="text-muted">Representante</a></li>
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
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label">Representante</label>
                                                <select id="representanteSelect" name="id_representante" class="form-control">
                                                    <option value="" selected>Selecione...</option>
                                                    <?php foreach ($puxaUsuarios as $info_representante) : ?>
                                                        <!-- < ?php if ($info_representante->id_cargo == 5): ?> -->
                                                            <option value="<?= $info_representante->id; ?>">
                                                                <?php echo $info_representante->nome; ?>
                                                            </option>
                                                        <!-- < ?php endif; ?> -->
                                                    <?php endforeach ?>
                                                </select>
                                                <!-- Campo oculto para o nome do representante -->
                                                <input type="hidden" id="representanteNome" name="representante">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="reset" class="btn btn-light">Limpar Dados</button>
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                            <a href="projetos" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="addRepresentantes">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "footer.php";?>
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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectElement = document.getElementById('representanteSelect');
        var nomeHiddenField = document.getElementById('representanteNome');

        selectElement.addEventListener('change', function() {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            nomeHiddenField.value = selectedOption.text;
        });
    });
    </script>
</body>
</html>
