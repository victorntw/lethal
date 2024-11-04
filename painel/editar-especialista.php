<?php
include "verifica.php";
$id = '';
if(isset($_GET['id'])){
    if(empty($_GET['id'])){
        header('Location: especialistas.php');
    }else{
        $id = $_GET['id'];
        
    }
}
$doutores->editar();
$puxaDoutor = $doutores->rsDados($id);
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
    <title>Painel SEDF - Editar Integrante</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar Integrante</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="especialistas.php" class="text-muted">Integrantes</a></li>
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
                                    
                                    <!-- <div class="row">
    
                                            <div class="col-md-4 col-sm-12">
                                            <label  class="col-form-label">Região</label>
                                                <select name="id_categoria" class="form-control" id="">
                                                    <?php foreach($puxaCategorias as $regiao){?>
                                                    <option value="<?php echo $regiao->id;?>" <?php if(isset($puxaDoutor->id_categoria) && $puxaDoutor->id_categoria == $regiao->id){ echo "selected";}?>><?php echo $regiao->nome;?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label  class="col-form-label">Cargo</label>
                                                <input class="form-control" type="text" name="cargo" value="<?php if(isset($puxaDoutor->cargo) && !empty($puxaDoutor->cargo)){ echo $puxaDoutor->cargo;}?>" />
                                            </div>
                                            
                                            </div>   -->
                                            
                                        <div class="row">
    
                                            <div class="col-md-4 col-sm-12">
                                            <label  class="col-form-label">Foto</label>
                                                <input class="form-control" type="file" name="foto"  />
                                            </div>
                                            <?php if(isset($puxaDoutor->foto) && !empty($puxaDoutor->foto)){?>
                                            <div class="col-md-4 col-sm-12">
                                            <img src="../img/<?php echo $puxaDoutor->foto;?>" width="100">
                                            </div>
                                            <?php }?>
                                           
                                            </div>
                                            
                                            <div class="row">
    
                                            <div class="col-md-4 col-sm-12">
                                            <label  class="col-form-label">Hierarquia</label>
                                                <select class="form-control" name="id_hierarquia">
                                                    <?php foreach($puxaHierarquias as $hierarquia){?>
                                                    <option value="<?php echo $hierarquia->id;?>" <?php if(isset($puxaDoutor->id_hierarquia) && $puxaDoutor->id_hierarquia == $hierarquia->id){ echo "selected";}?>><?php echo $hierarquia->numero;?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                            <label  class="col-form-label">Ordem</label>
                                             <input class="form-control" type="numb" name="ordem" value="<?php if(isset($puxaDoutor->ordem) && !empty($puxaDoutor->ordem)){ echo $puxaDoutor->ordem;}?>" />
                                            </div>
                                            </div>
                                     <div class="form-group row">
    
    <div class="col-md-6 col-sm-12">
    <label  class="col-form-label">Nome</label>
     <input class="form-control" type="text" name="nome" value="<?php if(isset($puxaDoutor->nome) && !empty($puxaDoutor->nome)){ echo $puxaDoutor->nome;}?>" />
    </div>
	<div class="col-md-6 col-sm-12">
    <label  class="col-form-label">Especialidade</label>
     <input class="form-control" type="text" name="especialidade" value="<?php if(isset($puxaDoutor->especialidade) && !empty($puxaDoutor->especialidade)){ echo $puxaDoutor->especialidade;}?>" />
    </div>
    <!-- <div class="col-md-3 col-sm-12">
    <label  class="col-form-label">Entidade</label>
     <input class="form-control" type="text" name="graduacao" value="<?php if(isset($puxaDoutor->graduacao) && !empty($puxaDoutor->graduacao)){ echo $puxaDoutor->graduacao;}?>" />
    </div> -->
   <!-- <div class="col-md-3 col-sm-12">
    <label  class="col-form-label">Sexo</label>
     <select name="sexo" id="" class="form-control">
       <option value="M" <?php if(isset($puxaDoutor->sexo) && $puxaDoutor->sexo == 'M'){echo "selected";}?>>Masculino</option>
       <option value="F" <?php if(isset($puxaDoutor->sexo) && $puxaDoutor->sexo == 'S'){echo "selected";}?>>Feminino</option>
     </select>
    </div> -->
   </div>

   <!-- <div class="form-group row">
    
    <div class="col-md-6 col-sm-12">
    <label  class="col-form-label">Dias de Trabalho</label>
     <input class="form-control" type="text" name="dias_trabalho" value="<?php if(isset($puxaDoutor->dias_trabalho) && !empty($puxaDoutor->dias_trabalho)){ echo $puxaDoutor->dias_trabalho;}?>" />
    </div> 
	<div class="col-md-3 col-sm-12">
    <label  class="col-form-label">Linguagem</label>
     <input class="form-control" type="text" name="linguagem" value="<?php if(isset($puxaDoutor->linguagem) && !empty($puxaDoutor->linguagem)){ echo $puxaDoutor->linguagem;}?>" />
    </div>
	<div class="col-md-3 col-sm-12">
    <label  class="col-form-label">Graduação</label>
     <input class="form-control" type="text" name="graduacao" value="<?php if(isset($puxaDoutor->graduacao) && !empty($puxaDoutor->graduacao)){ echo $puxaDoutor->graduacao;}?>" />
    </div>
  
   </div> -->
   <div class="form-group row">
      <div class="col-md-3 col-sm-12">
        <label  class="col-form-label">Graduação</label>
        <input class="form-control" type="text" name="graduacao" value="<?php if(isset($puxaDoutor->graduacao) && !empty($puxaDoutor->graduacao)){ echo $puxaDoutor->graduacao;}?>" />
      </div>
   </div>
   <div class="form-group row">
    <div class="col-md-6 col-sm-12">
    <label  class="col-form-label">E-mail</label>
     <input class="form-control" type="email" name="email" value="<?php if(isset($puxaDoutor->email) && !empty($puxaDoutor->email)){ echo $puxaDoutor->email;}?>" />
    </div>
	<div class="col-md-3 col-sm-12">
    <label  class="col-form-label">Telefone</label>
     <input class="form-control" type="text" name="telefone" id="kt_inputmask_3"  value="<?php if(isset($puxaDoutor->telefone) && !empty($puxaDoutor->telefone)){ echo $puxaDoutor->telefone;}?>"/>
    </div>
	
   </div>

     <div class="form-group row">
    <div class="col-md-6 col-sm-12">
    <label  class="col-form-label">Instagram</label>
     <input class="form-control" type="text" name="instagram" value="<?php if(isset($puxaDoutor->instagram) && !empty($puxaDoutor->instagram)){ echo $puxaDoutor->instagram;}?>" />
    </div>
	<div class="col-md-6 col-sm-12">
    <label  class="col-form-label">Facebook</label>
     <input class="form-control" type="text" name="facebook" value="<?php if(isset($puxaDoutor->facebook) && !empty($puxaDoutor->facebook)){ echo $puxaDoutor->facebook;}?>" />
    </div>
   </div>
   <div class="form-group row">
    <div class="col-md-6 col-sm-12">
    <label  class="col-form-label">Linkedin</label>
     <input class="form-control" type="text" name="linkedin" value="<?php if(isset($puxaDoutor->linkedin) && !empty($puxaDoutor->linkedin)){ echo $puxaDoutor->linkedin;}?>" />
    </div>
	<div class="col-md-6 col-sm-12">
    <label  class="col-form-label">Twitter</label>
     <input class="form-control" type="text" name="twitter" value="<?php if(isset($puxaDoutor->twitter) && !empty($puxaDoutor->twitter)){ echo $puxaDoutor->twitter;}?>" />
    </div>
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Breve</label>
     <input class="form-control" type="text" name="breve" value="<?php if(isset($puxaDoutor->breve) && !empty($puxaDoutor->breve)){ echo $puxaDoutor->breve;}?>" />
    </div>   
   </div>

   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Currículo</label>
     <textarea name="curriculo" class="ckeditor" id="ckeditor" cols="30" rows="10"><?php if(isset($puxaDoutor->curriculo) && !empty($puxaDoutor->curriculo)){ echo $puxaDoutor->curriculo;}?></textarea>
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
     <input class="form-control" type="text" name="meta_title" value="<?php if(isset($puxaDoutor->meta_title) && !empty($puxaDoutor->meta_title)){ echo $puxaDoutor->meta_title;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Keywords</label>
     <input class="form-control" type="text" name="meta_keywords" value="<?php if(isset($puxaDoutor->meta_keywords) && !empty($puxaDoutor->meta_keywords)){ echo $puxaDoutor->meta_keywords;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Description</label>
	<textarea name="meta_description" class="form-control" id="" cols="30" rows="10"><?php if(isset($puxaDoutor->meta_description) && !empty($puxaDoutor->meta_description)){ echo $puxaDoutor->meta_description;}?></textarea> 
    </div>   
   </div>                                       
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                            <!-- <button type="reset" class="btn btn-dark">Resetar</button> -->
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="editaDoutor">
                                    <input type="hidden" name="foto_Atual" value="<?php echo $puxaDoutor->foto;?>">
                                    <input type="hidden" name="id" value="<?php echo $puxaDoutor->id;?>">
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