<?php
    include "verifica.php";
    $infoSistema->editarPopup();
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
    <title>Painel SEDF - Configurações do Pop-Up</title>
    <link href="dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <?php include "header.php";?>
        <?php include "inc-menu-lateral.php";?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Configurações do Pop-Up
                        </h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a
                                            href="configuracoes.php" class="text-muted">Configurações do Pop-Up</a></li>
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
                                            <div class="col-md-12">
                                                <h5 class="card-title">Configurações do Pop-Up</h5>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">Ativo</label>
                                                <select class="custom-select mr-sm-2" name="popup_ativo"
                                                    id="inlineFormCustomSelect">
                                                    <option value="Sim" <?php if(isset($editaConfig->popup_temBotao) && $editaConfig->popup_ativo == 'Sim') { echo 'selected';}?>>Sim</option>
                                                    <option value="Não" <?php if(isset($editaConfig->popup_temBotao) && $editaConfig->popup_ativo == 'Não') { echo 'selected';}?>>Não</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label">Título</label>
                                                <input class="form-control" type="text" name="popup_titulo"
                                                    value="<?php if(isset($editaConfig->popup_titulo) && !empty($editaConfig->popup_titulo)){ echo $editaConfig->popup_titulo;}?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label">Texto</label>
                                                <textarea name="popup_texto" class="form-control" id="" cols="30"
                                                    rows="4"><?php if(isset($editaConfig->popup_texto) && !empty($editaConfig->popup_texto)){ echo $editaConfig->popup_texto;}?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">Tem botão?</label>
                                                <select class="custom-select mr-sm-2" name="popup_temBotao"
                                                    id="inlineFormCustomSelect" onchange="temBotao(this.value)">
                                                    <option value="Sim" <?php if(isset($editaConfig->popup_temBotao) && $editaConfig->popup_temBotao == 'Sim') { echo 'selected';}?>>Sim</option>
                                                    <option value="Não" <?php if(isset($editaConfig->popup_temBotao) && $editaConfig->popup_temBotao == 'Não') { echo 'selected';}?>>Não</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row" id="opcoesBotao" <?php if(isset($editaConfig->popup_temBotao) && $editaConfig->popup_temBotao == 'Sim'){ echo 'style="display:block"'; } else { echo 'style="display:none"'; }?>>
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Link do Botão</label>
                                                <input class="form-control" type="text" name="popup_linkBotao"
                                                    value="<?php if(isset($editaConfig->popup_linkBotao) && !empty($editaConfig->popup_linkBotao)){ echo $editaConfig->popup_linkBotao;}?>" />
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Texto do Botão</label>
                                                <input class="form-control" type="text" name="popup_textoBotao"
                                                    value="<?php if(isset($editaConfig->popup_textoBotao) && !empty($editaConfig->popup_textoBotao)){ echo $editaConfig->popup_textoBotao;}?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Imagem do Popup</label>
                                                <input class="form-control" type="file" name="popup_imagem" />
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <?php if(isset($editaConfig->popup_imagem) && !empty($editaConfig->popup_imagem)){?>
                                                <label class="col-form-label">&nbsp;</label>
                                                <img src="../img/<?php echo $editaConfig->popup_imagem;?>" width="200"
                                                    height="200">
                                                <?php }?>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="text-right">
                                                <input type="hidden" name="acao" value="editarPopup">
                                                <button type="submit" class="btn btn-info">Salvar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
    <script>
        function temBotao (opcao) {
            if (opcao == 'Sim') {
                $('#opcoesBotao').show();
            }else{
                $('#opcoesBotao').hide();
            }
        }
    </script>

</body>

</html>