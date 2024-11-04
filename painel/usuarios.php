<?php include "verifica.php";
// if($dadosUsuarioLogado->perm_cad_usuario != 'S'){
// 	header('Location: index.php');
// 	}
$puxaUsuarios = $usuarios->rsDados();
// var_dump($puxaUsuarios);die;
$usuarios->excluir();
?>
<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<?php include "head.php";?>


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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Usuários</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <a href="add-usuario.php" class="btn btn-success float-right m-1">Add. Usuário</a>
                        <a href="cargos" class="btn btn-primary float-right m-1">Cargos</a>
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
                                                <th>E-mail</th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(count($puxaUsuarios) > 0){
                                            foreach($puxaUsuarios as $usuario){?>
                                            <tr>
                                                <td>
                                                    <?php if(isset($usuario->foto) && !empty($usuario->foto)){?>
                                                    <img src="../img/<?php echo $usuario->foto;?>" width="50">
                                                    <?php }else{?>
                                                    <img src="<?php echo icone_genero($usuario->sexo);?>" width="50">
                                                    <?php }?>
                                                    </td>
                                                <td><?php echo $usuario->nome;?></td>
                                                <td><?php echo $usuario->email;?></td>
                                                <td>
                                                    <a href="editar-usuario?id=<?php echo $usuario->id;?>" class="btn btn-success btn-circle"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="javascript:;" class="btn btn-warning btn-circle" onclick="excluir('usuarios.php', <?php echo $usuario->id;?>, 'excluirUsuario')"><i class="fa fa-times"></i></a>
                                                   
                                                </td>
                                            </tr>
                                            <?php } }?>
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