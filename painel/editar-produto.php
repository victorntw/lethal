<?php include "verifica.php";
$id = '';
if(isset($_GET['id'])){
    if(empty($_GET['id'])){
        header('Location: produtos.php');
    }else{
        $id = $_GET['id'];        
    }
}
$produtos->editar();
$editaProduto = $produtos->rsDados($id);
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
    <title>Painel SEDF - Editar Produto</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar Produto</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="produtos.php" class="text-muted">Produtos</a></li>
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
                                            <div class="col-md-2">
                                                <div class="form-group">
                                               
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Ativo</label>
                                        <select class="custom-select mr-sm-2" name="ativo" id="inlineFormCustomSelect">
                                            <option value="S" <?php if(isset($editaProduto->ativo) && $editaProduto->ativo == 'S'){ echo "selected";}?>>Sim</option>
                                            <option value="N" <?php if(isset($editaProduto->ativo) && $editaProduto->ativo == 'N'){ echo "selected";}?>>Não</option>
                                        </select>                                  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Nome</label>
                                                    <input type="text" class="form-control" name="nome" value="<?php if(isset($editaProduto->nome) && !empty($editaProduto->nome)){ echo $editaProduto->nome;}?>" >
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem Principal</label>
                                                    <input type="file" name="imagem" class="form-control" >
                                                </div>
                                            </div>
                                            <?php if(isset($editaProduto->imagem) && !empty($editaProduto->imagem)){?>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <img src="../img/<?php echo $editaProduto->imagem;?>" width="100">
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem 2</label>
                                                    <input type="file" name="imagem_2" class="form-control" >
                                                </div>
                                            </div>
                                            <?php if(isset($editaProduto->imagem_2) && !empty($editaProduto->imagem_2)){?>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <img src="../img/<?php echo $editaProduto->imagem_2;?>" width="100">
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem 3</label>
                                                    <input type="file" name="imagem_3" class="form-control" >
                                                </div>
                                            </div>
                                            <?php if(isset($editaProduto->imagem_3) && !empty($editaProduto->imagem_3)){?>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <img src="../img/<?php echo $editaProduto->imagem_3;?>" width="100">
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem 4</label>
                                                    <input type="file" name="imagem_4" class="form-control" >
                                                </div>
                                            </div>
                                            <?php if(isset($editaProduto->imagem_4) && !empty($editaProduto->imagem_4)){?>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <img src="../img/<?php echo $editaProduto->imagem_4;?>" width="100">
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem 5</label>
                                                    <input type="file" name="imagem_5" class="form-control" >
                                                </div>
                                            </div>
                                            <?php if(isset($editaProduto->imagem_5) && !empty($editaProduto->imagem_5)){?>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <img src="../img/<?php echo $editaProduto->imagem_5;?>" width="100">
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Tem Variação</label>
                                                    <select name="tem_opcao" class="form-control" onchange="if(this.value == 'S'){document.getElementById('divOpcoes').style.display='';document.getElementById('divDescricao').style.display='none';}if(this.value == 'N'){document.getElementById('divOpcoes').style.display='none';document.getElementById('divDescricao').style.display='';}">
                                                    <option value="S" <?php if(isset($editaProduto->tem_opcao) && $editaProduto->tem_opcao == 'S'){ echo "selected"; }?>>Sim</option>
                                                    <option value="N" <?php if(isset($editaProduto->tem_opcao) && $editaProduto->tem_opcao == 'N'){ echo "selected"; }?>>Não</option>
                                                    </select>
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <div id="divDescricao" <?php if(isset($editaProduto->tem_opcao) && $editaProduto->tem_opcao == 'S'){ echo "style='display: none;'"; }?>>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Breve</label>
                                                   <textarea name="breve" class="form-control" cols="30" rows="4"><?php if(isset($editaProduto->breve) && !empty($editaProduto->breve)){ echo $editaProduto->breve;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                      <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Descrição</label>
                                                   <textarea name="descricao" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaProduto->descricao) && !empty($editaProduto->descricao)){ echo $editaProduto->descricao;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                        </div>
                                          <div id="divOpcoes" <?php if(isset($editaProduto->tem_opcao) && $editaProduto->tem_opcao == 'N'){ echo "style='display: none;'"; }?>>
                                      <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Nome Variação 1</label>
                                                   <input type="text" name="nome_opcao_1" class="form-control" value="<?php if(isset($editaProduto->nome_opcao_1) && !empty($editaProduto->nome_opcao_1)){ echo $editaProduto->nome_opcao_1;}?>">
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Breve Variação 1</label>
                                                   <textarea name="breve_opcao_1" class="form-control" cols="30" rows="4"><?php if(isset($editaProduto->breve_opcao_1) && !empty($editaProduto->breve_opcao_1)){ echo $editaProduto->breve_opcao_1;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Descrição Variação 1</label>
                                                   <textarea name="descricao_opcao_1" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaProduto->descricao_opcao_1) && !empty($editaProduto->descricao_opcao_1)){ echo $editaProduto->descricao_opcao_1;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Nome Variação 2</label>
                                                   <input type="text" name="nome_opcao_2" class="form-control" value="<?php if(isset($editaProduto->nome_opcao_2) && !empty($editaProduto->nome_opcao_2)){ echo $editaProduto->nome_opcao_2;}?>">
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Breve Variação 2</label>
                                                   <textarea name="breve_opcao_2" class="form-control" cols="30" rows="4"><?php if(isset($editaProduto->breve_opcao_2) && !empty($editaProduto->breve_opcao_2)){ echo $editaProduto->breve_opcao_2;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Descrição Variação 2</label>
                                                   <textarea name="descricao_opcao_2" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaProduto->descricao_opcao_2) && !empty($editaProduto->descricao_opcao_2)){ echo $editaProduto->descricao_opcao_2;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                        </div>
                                    
                                        <br>
                                        <h4 class="card-title">Metas Tags</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Meta Title</label>
                                                    <input type="text" class="form-control" name="meta_title" value="<?php if(isset($editaProduto->meta_title) && !empty($editaProduto->meta_title)){ echo $editaProduto->meta_title;}?>">
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Meta Keywords</label>
                                                    <input type="text" class="form-control" name="meta_keywords" value="<?php if(isset($editaProduto->meta_keywords) && !empty($editaProduto->meta_keywords)){ echo $editaProduto->meta_keywords;}?>">
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Meta Description</label>
                                                   <textarea name="meta_description" class="form-control" id="" cols="30" rows="4"><?php if(isset($editaProduto->meta_description) && !empty($editaProduto->meta_description)){ echo $editaProduto->meta_description;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                            <button type="reset" class="btn btn-dark">Resetar</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="editaProduto">
                                    <input type="hidden" name="imagem_Atual" value="<?php echo $editaProduto->imagem;?>">
                                    <input type="hidden" name="id" value="<?php echo $editaProduto->id;?>">
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