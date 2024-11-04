<?php
include "verifica.php";
include "utils/abrevia-link.php";
$puxaProjetos = $projetos->rsDados();
$puxaRepresentante = $projetos->Representante();
$usuarioLogin = $_SESSION['dadosLogado']->id;
$projetos->excluir();
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
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Projetos</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <a href="add-projeto" class="btn btn-success float-right m-1">Add. Projeto</a>
                        <a href="representantes" class="btn btn-primary float-right m-1">Representantes</a>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Projeto</th>
                                                <th>Status</th>
                                                <th>Prazo</th>
                                                <th>Sei</th>
                                                <th>Link</th>
                                                <th>Representante</th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (count($puxaProjetos) > 0) : ?>
                                                <?php foreach ($puxaProjetos as $projeto) : ?>
                                                    <tr>
                                                        <td data-label="Projeto" class="fw-600"><?php echo $projeto->nome; ?></td>
                                                        <td data-label="Status" class="text-info fw-500"><?php echo $projeto->status; ?></td>
                                                        <td data-label="Prazo"><?php echo date_format(new DateTime($projeto->executar_ate), 'd/m/Y'); ?></td>
                                                        <td data-label="Sei"><?php echo $projeto->numero_sei; ?></td>
                                                        <td data-label="Link">
                                                            <a href="<?= $projeto->sei_link; ?>" target="_blank" rel="noreferrer">
                                                                <?php echo abreviarLink($projeto->sei_link); ?>
                                                            </a>
                                                        </td>
                                                        <td data-label="Representante" class="fw-600">
                                                            <?php 
                                                                $representantes = array();
                                                                $representantes_id = array();
                                                                foreach ($puxaRepresentante as $representante) :
                                                                    if ($projeto->representante1 == $representante->id || $projeto->representante2 == $representante->id) :
                                                                        $representantes[] = $representante->representante;
                                                                        $representantes_id[] = $representante->id_representante;
                                                                    endif;
                                                                endforeach;
                                                                echo implode(" e ", $representantes);
                                                            ?>
                                                        </td>

                                                        <td data-label="Opções">
                                                            <?php if (in_array($usuarioLogin, $representantes_id) || $verConfig == 1) : ?>
                                                                <a  href="editar-projeto?id=<?php echo $projeto->id; ?>" class="btn btn-success btn-circle" 
                                                                    title="[Editar] :: <?php echo htmlspecialchars($projeto->nome); ?>">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            <?php endif ?>

                                                            <?php if ($verConfig == 1) : ?>
                                                                <a href="javascript:;" class="btn btn-warning btn-circle" title="[Excluir] :: <?php echo htmlspecialchars($projeto->nome); ?>" onclick="excluir('projetos', <?php echo $projeto->id; ?>, 'excluirUsuario')"><i class="fa fa-times"></i></a>
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
