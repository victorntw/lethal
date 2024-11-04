<?php include "verifica.php";
$doutores->add();
$puxaCategorias = $categorias->rsDados();
$puxaHierarquias = $categorias->rsDadosHierarquia();
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
    <title>Painel SEDF - Adicionar Integrante</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Adicionar Integrante</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="especialidades.php" class="text-muted">Integrantes</a></li>
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
    
                                            <div class="col-md-4 col-sm-12">
                                            <label  class="col-form-label">Foto</label>
                                                <input class="form-control" type="file" name="foto"  />
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                            <label  class="col-form-label">Hierarquia</label>
                                                <select class="form-control" name="id_hierarquia">
                                                    <?php foreach($puxaHierarquias as $hierarquia){?>
                                                    <option value="<?php echo $hierarquia->id;?>"><?php echo $hierarquia->numero;?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                            <label  class="col-form-label">Ordem</label>
                                                <input class="form-control" type="numb" name="ordem"  />
                                            </div>
                                            
                                            </div>
                                     <div class="form-group row">
    
    <div class="col-md-6 col-sm-12">
    <label  class="col-form-label">Nome</label>
     <input class="form-control" type="text" name="nome"  />
    </div>
	<div class="col-md-3 col-sm-12">
    <label  class="col-form-label">Função</label>
     <input class="form-control" type="text" name="especialidade"  />
    </div>
    <div class="col-md-3 col-sm-12">
    <label  class="col-form-label">Entidade</label>
     <input class="form-control" type="text" name="graduacao"  />
    </div>
   <!-- <div class="col-md-3 col-sm-12">
    <label  class="col-form-label">Sexo</label>
     <select name="sexo" id="" class="form-control">
       <option value="M">Masculino</option>
       <option value="F">Feminino</option>
     </select>
    </div> -->
   </div>
   <!-- <div class="form-group row">
    
    <div class="col-md-6 col-sm-12">
    <label  class="col-form-label">Dias de Trabalho</label>
     <input class="form-control" type="text" name="dias_trabalho"  />
    </div> 
	<div class="col-md-3 col-sm-12">
    <label  class="col-form-label">Linguagem</label>
     <input class="form-control" type="text" name="linguagem"  />
    </div>
	<div class="col-md-3 col-sm-12">
    <label  class="col-form-label">Entidade</label>
     <input class="form-control" type="text" name="graduacao"  />
    </div>
  
   </div> -->

   <div class="form-group row">
    <div class="col-md-6 col-sm-12">
    <label  class="col-form-label">E-mail</label>
     <input class="form-control" type="email" name="email"  />
    </div>
	<div class="col-md-3 col-sm-12">
    <label  class="col-form-label">Telefone</label>
     <input class="form-control" type="text" name="telefone" id="kt_inputmask_3" />
    </div>
	
   </div>
   <div class="form-group row">
    <div class="col-md-6 col-sm-12">
    <label  class="col-form-label">Instagram</label>
     <input class="form-control" type="text" name="instagram"  />
    </div>
	<div class="col-md-6 col-sm-12">
    <label  class="col-form-label">Facebook</label>
     <input class="form-control" type="text" name="facebook" />
    </div>
   </div>
   <div class="form-group row">
    <div class="col-md-6 col-sm-12">
    <label  class="col-form-label">Linkedin</label>
     <input class="form-control" type="text" name="linkedin" />
    </div>
	<div class="col-md-6 col-sm-12">
    <label  class="col-form-label">Twitter</label>
     <input class="form-control" type="text" name="twitter" />
    </div>
   </div>
    <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Breve</label>
     <input class="form-control" type="text" name="breve" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Currículo</label>
     <textarea name="curriculo" class="ckeditor" id="ckeditor" cols="30" rows="10"></textarea>
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
     <input class="form-control" type="text" name="meta_title"  />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Keywords</label>
     <input class="form-control" type="text" name="meta_keywords"  />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Description</label>
	<textarea name="meta_description" class="form-control" id="" cols="30" rows="3"></textarea> 
    </div>   
   </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                            <button type="reset" class="btn btn-dark">Resetar</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="addDoutor">
                                    
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