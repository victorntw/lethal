<?php
include "verifica.php";
$infoSistema->editarAparencia();
$editaConfig = $infoSistema->rsDados(1);
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
    <title>Painel SEDF - Configurações Aparência</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Configurações Aparência</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="configuracoes.php" class="text-muted">Configurações Aparência</a></li>
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
                                    <div class="form-group">
                                            <div class="col-md-12">
                                                <h3>Imagens</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                            <label  class="col-form-label">Favicon</label>
                                            <input class="form-control" type="file" name="favicon"/>
                                            </div> 
                                            <div class="col-md-6 col-sm-12" style="background: #669ab3;">
                                        <?php if(isset($editaConfig->favicon) && !empty($editaConfig->favicon)){?>
                                            <label  class="col-form-label">&nbsp;</label>
                                            <img src="../img/<?php echo $editaConfig->favicon;?>" width="100" alt="">
                                            <?php }?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                            <label  class="col-form-label">Logo Principal</label>
                                            <input class="form-control" type="file" name="logo_principal"/>
                                            </div> 
                                            <div class="col-md-6 col-sm-12" style="background: #669ab3;">
                                        <?php if(isset($editaConfig->logo_principal) && !empty($editaConfig->logo_principal)){?>
                                            <label  class="col-form-label">&nbsp;</label>
                                            <img src="../img/<?php echo $editaConfig->logo_principal;?>" width="100" alt="">
                                            <?php }?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                            <label  class="col-form-label">Logo Rodapé</label>
                                            <input class="form-control" type="file" name="logo_rodape"/>
                                            </div> 
                                            <div class="col-md-6 col-sm-12" style="background: #669ab3;">
                                        <?php if(isset($editaConfig->logo_rodape) && !empty($editaConfig->logo_rodape)){?>
                                            <label  class="col-form-label">&nbsp;</label>
                                            <img src="../img/<?php echo $editaConfig->logo_rodape;?>" width="100" alt="">
                                            <?php }?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                            <label  class="col-form-label">Logo Mobile</label>
                                            <input class="form-control" type="file" name="logo_mobile"/>
                                            </div> 
                                            <div class="col-md-6 col-sm-12" style="background: #669ab3;">
                                        <?php if(isset($editaConfig->logo_mobile) && !empty($editaConfig->logo_mobile)){?>
                                            <label  class="col-form-label">&nbsp;</label>
                                            <img src="../img/<?php echo $editaConfig->logo_mobile;?>" width="100" alt="">
                                            <?php }?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <h3>Fontes</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                            <label  class="col-form-label">Link Fonte Títulos <small>- Ex:https://fonts.googleapis.com/css2?family=Jost:wght@400&display=swap</small></label>
                                            <input class="form-control" type="text" name="link_fonte_titulo" value="<?php if(isset($editaConfig->link_fonte_titulo) && !empty($editaConfig->link_fonte_titulo)){ echo $editaConfig->link_fonte_titulo;}?>" />
                                            </div> 
                                            <div class="col-md-4 col-sm-12">
                                            <label  class="col-form-label">Font-Family <small>- Ex: 'Jost', sans-serif</small></label>
                                            <input class="form-control" type="text" name="font_family_titulo" value="<?php if(isset($editaConfig->font_family_titulo) && !empty($editaConfig->font_family_titulo)){ echo $editaConfig->font_family_titulo;}?>" />
                                            </div> 
                                            <div class="col-md-2 col-sm-12">
                                            <label  class="col-form-label">Font-Weight <small>- Ex: 600</small></label>
                                            <input class="form-control" type="text" name="font_weight_titulo" value="<?php if(isset($editaConfig->font_weight_titulo) && !empty($editaConfig->font_weight_titulo)){ echo $editaConfig->font_weight_titulo;}?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                            <label  class="col-form-label">Link Fonte Textos Apoio <small>- Ex: https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap</small></label>
                                            <input class="form-control" type="text" name="link_fonte_texto_apoio" value="<?php if(isset($editaConfig->link_fonte_texto_apoio) && !empty($editaConfig->link_fonte_texto_apoio)){ echo $editaConfig->link_fonte_texto_apoio;}?>" />
                                            </div> 
                                            <div class="col-md-4 col-sm-12">
                                            <label  class="col-form-label">Font-Family <small>- Ex: 'Jost', sans-serif</small></label>
                                            <input class="form-control" type="text" name="font_family_texto_apoio" value="<?php if(isset($editaConfig->font_family_texto_apoio) && !empty($editaConfig->font_family_texto_apoio)){ echo $editaConfig->font_family_texto_apoio;}?>" />
                                            </div> 
                                            <div class="col-md-2 col-sm-12">
                                            <label  class="col-form-label">Font-Weight <small>- Ex: 400</small></label>
                                            <input class="form-control" type="text" name="font_weight_texto_apoio" value="<?php if(isset($editaConfig->font_weight_texto_apoio) && !empty($editaConfig->font_weight_texto_apoio)){ echo $editaConfig->font_weight_texto_apoio;}?>" />
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <h3>Cores</h3>
                                            </div>
                                        </div>

                                       
                                        <div class="form-group row">
                                            <div class="col-md-3 col-sm-12">
                                            <label  class="col-form-label">Body</label>
                                            <input class="form-control" type="color" name="cor_primaria" value="<?php if(isset($editaConfig->cor_primaria) && !empty($editaConfig->cor_primaria)){ echo $editaConfig->cor_primaria;}?>" />
                                            </div> 
                                            <div class="col-md-3 col-sm-12">
                                            <label  class="col-form-label">Menu</label>
                                            <input class="form-control" type="color" name="cor_menu" value="<?php if(isset($editaConfig->cor_menu) && !empty($editaConfig->cor_menu)){ echo $editaConfig->cor_menu;}?>" />
                                            </div> 
                                            <div class="col-md-3 col-sm-12">
                                            <label  class="col-form-label">Background</label>
                                            <input class="form-control" type="color" name="cor_background" value="<?php if(isset($editaConfig->cor_background) && !empty($editaConfig->cor_background)){ echo $editaConfig->cor_background;}?>" />
                                            </div>
                                            
                                            <div class="col-md-3 col-sm-12">
                                            <label  class="col-form-label">Titulo</label>
                                            <input class="form-control" type="color" name="cor_titulo" value="<?php if(isset($editaConfig->cor_titulo) && !empty($editaConfig->cor_titulo)){ echo $editaConfig->cor_titulo;}?>" />
                                            </div>
                                            
                                        </div>
                                     
                                        <div class="form-group row">
                                            <div class="col-md-3 col-sm-12">
                                            <label  class="col-form-label">Extra</label>
                                            <input class="form-control" type="color" name="cor_secundaria" value="<?php if(isset($editaConfig->cor_secundaria) && !empty($editaConfig->cor_secundaria)){ echo $editaConfig->cor_secundaria;}?>" />
                                            </div> 
                                            <div class="col-md-3 col-sm-12">
                                            <label  class="col-form-label">Botão</label>
                                            <input class="form-control" type="color" name="cor_botao" value="<?php if(isset($editaConfig->cor_botao) && !empty($editaConfig->cor_botao)){ echo $editaConfig->cor_botao;}?>" />
                                            </div> 
                                            <div class="col-md-3 col-sm-12">
                                            <label  class="col-form-label">Botão <small>Hover</small></label>
                                            <input class="form-control" type="color" name="cor_botao_hover" value="<?php if(isset($editaConfig->cor_botao_hover) && !empty($editaConfig->cor_botao_hover)){ echo $editaConfig->cor_botao_hover;}?>" />
                                            </div> 
                                            
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                           <!--  <button type="reset" class="btn btn-dark">Resetar</button> -->
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="editarConfigAparencia">
	                                <input type="hidden" name="favicon_Atual" value="<?php echo $editaConfig->favicon;?>">
	                                <input type="hidden" name="logo_principal_Atual" value="<?php echo $editaConfig->logo_principal;?>">
	                                <input type="hidden" name="logo_rodape_Atual" value="<?php echo $editaConfig->logo_rodape;?>">
	                                <input type="hidden" name="logo_mobile_Atual" value="<?php echo $editaConfig->logo_mobile;?>">
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
</body>
</html>