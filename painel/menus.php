<?php include "verifica.php";

$menus->editar();
$editaMenu = $menus->rsDados(1);
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
    <title>Painel SEDF - Editar Menu</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar Menu</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="menus.php" class="text-muted">Menu</a></li>
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
                                            <div class="col-md-3 col-sm-12">
                                            <div class="card-body">
                                <h4 class="card-title">Home</h4>
                                <select name="home" class="form-control" id="">
                                    <option value="S" <?php if(isset($editaMenu->home) && $editaMenu->home == 'S'){ echo "selected";}?>>Ativo</option>
                                    <option value="N" <?php if(isset($editaMenu->home) && $editaMenu->home == 'N'){ echo "selected";}?>>Inativo</option>
                                </select>
                             
                            </div>

                            </div>
                            <div class="col-md-3 col-sm-12">
                                            <div class="card-body">
                                <h4 class="card-title">Sobre</h4>
                                <select name="sobre" class="form-control" id="">
                                    <option value="S" <?php if(isset($editaMenu->sobre) && $editaMenu->sobre == 'S'){ echo "selected";}?>>Ativo</option>
                                    <option value="N" <?php if(isset($editaMenu->sobre) && $editaMenu->sobre == 'N'){ echo "selected";}?>>Inativo</option>
                                </select>
                               
                            </div>

                            </div>
                            <div class="col-md-3 col-sm-12">
                                            <div class="card-body">
                                <h4 class="card-title">Serviços</h4>
                                <select name="servicos" class="form-control" id="">
                                    <option value="S" <?php if(isset($editaMenu->servicos) && $editaMenu->servicos == 'S'){ echo "selected";}?>>Ativo</option>
                                    <option value="N" <?php if(isset($editaMenu->servicos) && $editaMenu->servicos == 'N'){ echo "selected";}?>>Inativo</option>
                                </select>
                          
                            </div>

                            </div>

                            <div class="col-md-3 col-sm-12">
                                            <div class="card-body">
                                <h4 class="card-title">Blog</h4>
                                <select name="blog" class="form-control" id="">
                                    <option value="S" <?php if(isset($editaMenu->blog) && $editaMenu->blog == 'S'){ echo "selected";}?>>Ativo</option>
                                    <option value="N" <?php if(isset($editaMenu->blog) && $editaMenu->blog == 'N'){ echo "selected";}?>>Inativo</option>
                                </select>
                              
                            </div>

                            </div>

                            <div class="col-md-3 col-sm-12">
                                            <div class="card-body">
                                <h4 class="card-title">Contato</h4>
                                <select name="contato" class="form-control" id="">
                                    <option value="S" <?php if(isset($editaMenu->contato) && $editaMenu->contato == 'S'){ echo "selected";}?>>Ativo</option>
                                    <option value="N" <?php if(isset($editaMenu->contato) && $editaMenu->contato == 'N'){ echo "selected";}?>>Inativo</option>
                                </select>
                             
                            </div>

                            </div>
                             
                                            </div>

                                    </div>
                                    <br>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                            <!-- <button type="reset" class="btn btn-dark">Resetar</button> -->
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="editaMenu">
                                
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
    <script src="vendor/ckeditor/ckeditor.js"></script>
    
</body>
</html>