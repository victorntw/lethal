<?php include "verifica.php";
// if($dadosUsuarioLogado->perm_cad_usuario != 'S'){
// 	header('Location: index.php');
// 	}
$puxaVisitantes = $visitantes->rsDados();
$permissaoDeletVisitante = $dadosUsuarioLogado->perm_del_visitante;
$visitantes->excluir();
// dd($permissaoDeletVisitante);
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
    <title>Painel SEDF - Visitantes</title>
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
      <?php include "header.php";?>
       <?php include "inc-menu-lateral.php";?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Visitantes</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <a href="add-visitante" class="btn btn-success float-right m-1">Add. Visitante</a>
                        <?php if ($dadosUsuarioLogado->perm_view_config == 1): ?><a href="genero" class="btn btn-primary float-right m-1">Generos</a><?php endif ?>
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
                                                <th>Nome</th>
                                                <th>Município</th>
                                                <th>Cargo</th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(count($puxaVisitantes) > 0):
                                                foreach($puxaVisitantes as $visitate):?>
                                                    <tr>
                                                        <td><?php echo $visitate->nome;?></td>
                                                        <td><?php echo $visitate->municipio;?></td>
                                                        <td><?php echo $visitate->cargo;?></td>
                                                        <td>
                                                            <a href="editar-visitante?id=<?php echo $visitate->id;?>" title="Editar :: <?php echo $visitate->nome;?>" class="btn btn-success btn-circle"><i class="fas fa-pencil-alt"></i></a>
                                                            <?php if ($permissaoDeletVisitante == 's' || $dadosUsuarioLogado->perm_view_config == 1): ?>
                                                            <a href="javascript:;" class="btn btn-warning btn-circle" title="Excluir :: <?php echo $visitate->nome;?>" onclick="excluir('visitantes', <?php echo $visitate->id;?>, 'excluirVisitante')"><i class="fa fa-times"></i></a>
                                                            <?php endif ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Imagem</th>
                                                <th>Nome</th>
                                                <th>E-mail</th>
                                                <th>Opções</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
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
    <script src="assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/pages/datatable/datatable-basic.init.js"></script>
    <script src="dist/js/scripts.js"></script>
</body>
</html>