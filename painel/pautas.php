<?php
include "verifica.php";
include "./utils/abrevia-link.php";

// Verifica se a variável $verConfig está definida
$verConfig = isset($verConfig) ? $verConfig : 0;

// BreadCrumb
$page = "Pauta";
$voltarpara="Home";

// Puxa Dados
$puxaPauta = $pautas->rsDados();
$puxaRepresentante = $pautas->Representante();
$usuarioLogin = $_SESSION['dadosLogado']->id;
$pautas->excluir();
?>

<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<?php include "head.php"; ?>

<body>
<?php include "./utils/preloader.php"; ?>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <?php include "header.php"; ?>
        <?php include "inc-menu-lateral.php"; ?>
        <div class="page-wrapper">
            <?php include "./utils/breadcrumb.php"; ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Nome da Pauta</th>
                                                <th>Análise requerida</th>
                                                <th>Última Atualização</th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (count($puxaPauta) > 0) : ?>
                                                <?php foreach ($puxaPauta as $pauta) : ?>
                                                    <tr>
                                                        <td data-label="Nome da Pauta" class="fw-600"><?php echo abreviarLink($pauta->nome); ?></td>
                                                        <td data-label="Status" class="text-info fw-500"><?php echo $pauta->flag; ?></td>
                                                        <td data-label="Última Atualização"><?php echo date_format(new DateTime($pauta->updated_at), 'd/m/Y'); ?></td>
                                                        <td data-label="Opções">
                                                            <!-- < ?php 
                                                            // Defina a variável $representantes_id se não estiver definida
                                                            $representantes_id = [];
                                                            foreach ($puxaRepresentante as $representante) {
                                                                if ($pauta->representante1 == $representante->id || $pauta->representante2 == $representante->id) {
                                                                    $representantes_id[] = $representante->id_representante;
                                                                }
                                                            }
                                                            ?> -->
                                                            <?php if ($verConfig == 1) : ?>
                                                                <a href="editar-processo?id=<?php echo $pauta->id; ?>" title="[Editar] :: <?php echo htmlspecialchars($pauta->nome); ?>" class="btn btn-success btn-circle"><i class="fas fa-pencil-alt"></i></a>
                                                            <?php endif ?>

                                                            <?php if ($verConfig == 1) : ?>
                                                                <a href="javascript:;" class="btn btn-warning btn-circle" title="[Excluir] :: <?php echo htmlspecialchars($pauta->nome); ?>" onclick="excluir('processo', <?php echo $pauta->id; ?>, 'excluirProcesso')"><i class="fa fa-times"></i></a>
                                                            <?php endif ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "footer.php"; ?>
        </div>
    </div>
    <?php include "scripts-js.php"; ?>
</body>

</html>
