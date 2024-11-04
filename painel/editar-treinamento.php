<?php include "verifica.php";
if(isset($_GET['id'])){
    if(empty($_GET['id'])){
        header('Location: treinamentos.php');
    }else{
        $id = $_GET['id'];        
    }
}
$treinamentos->editar();
$editaTreinamento = $treinamentos->rsDados($id);
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
    <title>Painel SEDF - Editar Preparo de Exames</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar Preparo de Exames</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="treinamentos.php" class="text-muted">Preparo de Exames</a></li>
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
                                      
                                     <div class="form-group row">
    
    <div class="col-md-6 col-sm-12">
    <label  class="col-form-label">Título</label>
     <input class="form-control" type="text" name="titulo" value="<?php if(isset($editaTreinamento->titulo) && !empty($editaTreinamento->titulo)){ echo $editaTreinamento->titulo;}?>" />
    </div>
 
   </div>
    <div class="form-group row">
    <div class="col-md-6 col-sm-12">
    <label  class="col-form-label">Imagem </label>
     <input class="form-control" type="file" name="foto"  />
    </div>
    <div class="col-md-6 col-sm-12">
    <label  class="col-form-label">Legenda Imagem</label>
     <input class="form-control" type="text" name="legenda_imagem" value="<?php if(isset($editaTreinamento->legenda_imagem) && !empty($editaTreinamento->legenda_imagem)){ echo $editaTreinamento->legenda_imagem;}?>" />
    </div>
   </div>
   <?php if(isset($editaTreinamento->foto) && !empty($editaTreinamento->foto)){?>
   <div class="form-group row">
    <div class="col-md-6 col-sm-12">
   <img src="../img/<?php echo $editaTreinamento->foto;?>" width="150">
    </div>
   </div>
   <?php }?>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Descrição Imagem</label>
     <input class="form-control" type="text" name="descricao_imagem" value="<?php if(isset($editaTreinamento->descricao_imagem) && !empty($editaTreinamento->descricao_imagem)){ echo $editaTreinamento->descricao_imagem;}?>" />
    </div>
   </div>
   <div class="form-group row">
    
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Breve</label>
     <input class="form-control" type="text" name="breve" value="<?php if(isset($editaTreinamento->breve) && !empty($editaTreinamento->breve)){ echo $editaTreinamento->breve;}?>" />
    </div>
    
   </div>
   <div class="form-group row">
    
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Conteúdo</label>
     <textarea name="conteudo" class="ckeditor" id="ckeditor" cols="30" rows="10"><?php if(isset($editaTreinamento->conteudo) && !empty($editaTreinamento->conteudo)){ echo $editaTreinamento->conteudo;}?></textarea>
    </div>
    
   </div>
                                      <div class="clearfix"></div>
    <div class="form-group row">
<div class="col-md-12">	   
   <h5>Informaçåo SEO</h5>
</div>
</div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Title</label>
     <input class="form-control" type="text" name="meta_title" value="<?php if(isset($editaTreinamento->meta_title) && !empty($editaTreinamento->meta_title)){ echo $editaTreinamento->meta_title;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Keywords</label>
     <input class="form-control" type="text" name="meta_keywords" value="<?php if(isset($editaTreinamento->meta_keywords) && !empty($editaTreinamento->meta_keywords)){ echo $editaTreinamento->meta_keywords;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Description</label>
	<textarea name="meta_description" class="form-control" id="" cols="30" rows="10"><?php if(isset($editaTreinamento->meta_description) && !empty($editaTreinamento->meta_description)){ echo $editaTreinamento->meta_description;}?></textarea> 
    </div>   
   </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                           
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="editaTreinamento">
                                    <input type="hidden" name="id" value="<?php if(isset($editaTreinamento->id) && !empty($editaTreinamento->id)){ echo $editaTreinamento->id;}?>">
                                    <input type="hidden" name="foto_Atual" value="<?php if(isset($editaTreinamento->foto) && !empty($editaTreinamento->foto)){ echo $editaTreinamento->foto;}?>">
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