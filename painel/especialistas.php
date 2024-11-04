<?php include "verifica.php";
$pertence = '';
if(isset($_GET['pertence'])){
    if(empty($_GET['pertence'])){
        header('Location: index.php');
    }else{
        $pertence = $_GET['pertence'];
    }
}
$puxaDoutores = $doutores->rsDados('', 'ordem DESC');
$doutores->excluir();

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
    <title>Painel SEDF - Integrantes</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Integrantes</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <a href="add-especialista.php" class="btn btn-success float-right m-1">Add. Integrante</a>
                            
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
                                                <th>Imagem</th>
                                                <th>Nome</th>
                                                <th>Ordem</th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(count($puxaDoutores) > 0){
                                            foreach($puxaDoutores as $doutor){?>
                                            <tr>
                                                <td>
                                                    <?php if(isset($doutor->foto) && !empty($doutor->foto)){?>
                                                    <img src="../img/<?php echo $doutor->foto;?>" width="50">
                                                    <?php }else{?>
                                                    <img src="<?php echo icone_genero($doutor->sexo);?>" width="50">
                                                    <?php }?>
                                                    </td>
                                                <td><?php echo $doutor->nome;?></td>
                                                <td><?php echo $doutor->ordem;?></td>
                                                <td>
                                                    <a href="editar-especialista.php?id=<?php echo $doutor->id;?>" class="btn btn-success btn-circle">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="javascript:;" class="btn btn-warning btn-circle" onclick="excluir('especialistas.php', <?php echo $doutor->id;?>, 'excluirDoutor')"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                            <?php } }?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Imagem</th>
                                                <th>Nome</th>
                                                <th>Ordem</th>
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