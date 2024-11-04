<?php include "verifica.php";
$id = '';
if(isset($_GET['id'])){
    if(empty($_GET['id'])){
        header('Location: exames.php');
    }else{
        $id = $_GET['id'];        
    }
}
$exames->editar();
$editaExame = $exames->rsDados($id);
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
    <title>Painel SEDF - Editar Exame</title>
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
                    <div class="col-7 align-self-center">Editar Exame</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="exames.php" class="text-muted">Exames</a></li>
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
                                        <h4 class="card-title">Título Exame</h4>
                                        <div class="row">
                                          
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título</label>
                                                    <input type="text" class="form-control" name="titulo" value="<?php if(isset($editaExame->titulo) && !empty($editaExame->titulo)){ echo $editaExame->titulo;}?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <h4 class="card-title">Banner</h4>
                                        <div class="row">
                                          
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título 1</label>
                                                    <input type="text" class="form-control" name="banner_titulo" value="<?php if(isset($editaExame->banner_titulo) && !empty($editaExame->banner_titulo)){ echo $editaExame->banner_titulo;}?>">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título 2</label>
                                                    <input type="text" class="form-control" name="banner_titulo2" value="<?php if(isset($editaExame->banner_titulo2) && !empty($editaExame->banner_titulo2)){ echo $editaExame->banner_titulo2;}?>">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título 3</label>
                                                    <input type="text" class="form-control" name="banner_titulo3" value="<?php if(isset($editaExame->banner_titulo3) && !empty($editaExame->banner_titulo3)){ echo $editaExame->banner_titulo3;}?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem</label>
                                                    <input type="file" class="form-control" name="banner_foto" >
                                                </div>
                                            </div>
                                            <?php if(isset($editaExame->banner_foto) && !empty($editaExame->banner_foto)){ ?>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                               <img src="../img/<?php echo $editaExame->banner_foto;?>" width="150" alt="">
                                                </div>
                                            </div>
                                            <?php }?>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem Mobile</label>
                                                    <input type="file" class="form-control" name="imagem_mobile_final" >
                                                </div>
                                            </div>
                                            <?php if(isset($editaExame->imagem_mobile_final) && !empty($editaExame->imagem_mobile_final)){ ?>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                               <img src="../img/<?php echo $editaExame->imagem_mobile_final;?>" width="150" alt="">
                                                </div>
                                            </div>
                                            <?php }?>
                                            
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Botão</label>
                                                    <input type="text" class="form-control" name="banner_botao" value="<?php if(isset($editaExame->banner_botao) && !empty($editaExame->banner_botao)){ echo $editaExame->banner_botao;}?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Texto</label>
                                                   <textarea name="banner_texto" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaExame->banner_texto) && !empty($editaExame->banner_texto)){ echo $editaExame->banner_texto;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>

                                        <h4 class="card-title">Video</h4>
                                        <div class="row">
                                          
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título</label>
                                                    <input type="text" class="form-control" name="sessao1_video_titulo" value="<?php if(isset($editaExame->sessao1_video_titulo) && !empty($editaExame->sessao1_video_titulo)){ echo $editaExame->sessao1_video_titulo;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Embed</label>
                                                    <input type="text" class="form-control" name="sessao1_embed" value="<?php if(isset($editaExame->sessao1_embed) && !empty($editaExame->sessao1_embed)){ echo $editaExame->sessao1_embed;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem</label>
                                                    <input type="file" class="form-control" name="sessao1_thumb" >
                                                </div>
                                            </div>
                                            <?php if(isset($editaExame->sessao1_thumb) && !empty($editaExame->sessao1_thumb)){ ?>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                               <img src="../img/<?php echo $editaExame->sessao1_thumb;?>" width="150" alt="">
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Texto</label>
                                                   <textarea name="sessao1_video_descricao" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaExame->sessao1_video_descricao) && !empty($editaExame->sessao1_video_descricao)){ echo $editaExame->sessao1_video_descricao;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <hr>

                                        <hr>
                                        <h4 class="card-title">Sessão 1</h4>
                                        <div class="row">
                                          
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título</label>
                                                    <input type="text" class="form-control" name="sessao1_titulo" value="<?php if(isset($editaExame->sessao1_titulo) && !empty($editaExame->sessao1_titulo)){ echo $editaExame->sessao1_titulo;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem</label>
                                                    <input type="file" class="form-control" name="sessao1_foto" >
                                                </div>
                                            </div>
                                            <?php if(isset($editaExame->sessao1_foto) && !empty($editaExame->sessao1_foto)){ ?>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                               <img src="../img/<?php echo $editaExame->sessao1_foto;?>" width="150" alt="">
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Texto</label>
                                                   <textarea name="sessao1_texto" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaExame->sessao1_texto) && !empty($editaExame->sessao1_texto)){ echo $editaExame->sessao1_texto;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <hr>

                                        <h4 class="card-title">Sessão 2</h4>
                                        <div class="row">
                                          
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título</label>
                                                    <input type="text" class="form-control" name="sessao2_titulo" value="<?php if(isset($editaExame->sessao2_titulo) && !empty($editaExame->sessao2_titulo)){ echo $editaExame->sessao2_titulo;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem</label>
                                                    <input type="file" class="form-control" name="sessao2_foto" >
                                                </div>
                                            </div>
                                            <?php if(isset($editaExame->sessao2_foto) && !empty($editaExame->sessao2_foto)){ ?>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                               <img src="../img/<?php echo $editaExame->sessao2_foto;?>" width="150" alt="">
                                                </div>
                                            </div>
                                            <?php }?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Botão</label>
                                                    <input type="text" class="form-control" name="sessao2_botao" value="<?php if(isset($editaExame->sessao2_botao) && !empty($editaExame->sessao2_botao)){ echo $editaExame->sessao2_botao;}?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Texto</label>
                                                   <textarea name="sessao2_texto" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaExame->sessao2_texto) && !empty($editaExame->sessao2_texto)){ echo $editaExame->sessao2_texto;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título 2</label>
                                                    <input type="text" class="form-control" name="sessao2_titulo2" value="<?php if(isset($editaExame->sessao2_titulo2) && !empty($editaExame->sessao2_titulo2)){ echo $editaExame->sessao2_titulo2;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem 2</label>
                                                    <input type="file" class="form-control" name="sessao2_foto2" >
                                                </div>
                                            </div>
                                            <?php if(isset($editaExame->sessao2_foto2) && !empty($editaExame->sessao2_foto2)){ ?>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                               <img src="../img/<?php echo $editaExame->sessao2_foto2;?>" width="150" alt="">
                                                </div>
                                            </div>
                                            <?php }?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Botão 2</label>
                                                    <input type="text" class="form-control" name="sessao2_botao2" value="<?php if(isset($editaExame->sessao2_botao2) && !empty($editaExame->sessao2_botao2)){ echo $editaExame->sessao2_botao2;}?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Texto 2</label>
                                                   <textarea name="sessao2_texto2" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaExame->sessao2_texto2) && !empty($editaExame->sessao2_texto2)){ echo $editaExame->sessao2_texto2;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <hr>

                                        <h4 class="card-title" style="display:none;">Sessão 3</h4>
                                        <div class="row" style="display:none;">
                                          
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título</label>
                                                    <input type="text" class="form-control" name="sessao3_titulo" value="<?php if(isset($editaExame->sessao3_titulo) && !empty($editaExame->sessao3_titulo)){ echo $editaExame->sessao3_titulo;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título 2</label>
                                                    <input type="text" class="form-control" name="sessao3_titulo2" value="<?php if(isset($editaExame->sessao3_titulo2) && !empty($editaExame->sessao3_titulo2)){ echo $editaExame->sessao3_titulo2;}?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="display:none;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Texto</label>
                                                   <textarea name="sessao3_texto" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaExame->sessao3_texto) && !empty($editaExame->sessao3_texto)){ echo $editaExame->sessao3_texto;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <hr>
                                        
                                        
                                        <h4 class="card-title">Sessão 4</h4>
                                        <div class="row">
                                          
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título</label>
                                                    <input type="text" class="form-control" name="sessao4_titulo" value="<?php if(isset($editaExame->sessao4_titulo) && !empty($editaExame->sessao4_titulo)){ echo $editaExame->sessao4_titulo;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título 2</label>
                                                    <input type="text" class="form-control" name="sessao4_titulo2" value="<?php if(isset($editaExame->sessao4_titulo2) && !empty($editaExame->sessao4_titulo2)){ echo $editaExame->sessao4_titulo2;}?>" >
                                                </div>
                                            </div>
                                            <!--<div class="col-md-4">-->
                                            <!--    <div class="form-group">-->
                                            <!--    <label class="mr-sm-2" for="">Imagem</label>-->
                                            <!--        <input type="file" class="form-control" name="sessao4_foto" >-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <?php //if(isset($editaExame->sessao4_foto) && !empty($editaExame->sessao4_foto)){ ?>
                                            <!--<div class="col-md-3">-->
                                            <!--    <div class="form-group">-->
                                            <!--   <img src="../img/<?php echo $editaExame->sessao4_foto;?>" width="150" alt="">-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <?php //}?>
                                        </div>
                                        <!--<div class="row">-->
                                        <!--    <div class="col-md-4">-->
                                        <!--        <div class="form-group">-->
                                        <!--        <label class="mr-sm-2" for="">Icone</label>-->
                                        <!--            <input type="file" class="form-control" name="sessao4_icone" >-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                            <?php //if(isset($editaExame->sessao4_icone) && !empty($editaExame->sessao4_icone)){ ?>
                                        <!--    <div class="col-md-3">-->
                                        <!--        <div class="form-group">-->
                                        <!--       <img src="../img/<?php echo $editaExame->sessao4_icone;?>" width="150" alt="">-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                            <?php //}?>
                                        <!--</div>-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Texto</label>
                                                   <textarea name="sessao4_texto" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaExame->sessao4_texto) && !empty($editaExame->sessao4_texto)){ echo $editaExame->sessao4_texto;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <hr>


                                        <h4 class="card-title">Sessão 5</h4>
                                        <div class="row">
                                          
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título</label>
                                                    <input type="text" class="form-control" name="sessao5_titulo" value="<?php if(isset($editaExame->sessao5_titulo) && !empty($editaExame->sessao5_titulo)){ echo $editaExame->sessao5_titulo;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem</label>
                                                    <input type="file" class="form-control" name="sessao4_foto" >
                                                </div>
                                            </div>
                                            <?php if(isset($editaExame->sessao4_foto) && !empty($editaExame->sessao4_foto)){ ?>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                               <img src="../img/<?php echo $editaExame->sessao4_foto;?>" width="150" alt="">
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Texto</label>
                                                   <textarea name="sessao5_texto" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaExame->sessao5_texto) && !empty($editaExame->sessao5_texto)){ echo $editaExame->sessao5_texto;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <hr>
                                        
                                        <h4 class="card-title">Sessão 6</h4>
                                        <div class="row">
                                          
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título</label>
                                                    <input type="text" class="form-control" name="sessao6_titulo" value="<?php if(isset($editaExame->sessao6_titulo) && !empty($editaExame->sessao6_titulo)){ echo $editaExame->sessao6_titulo;}?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="display:none;">
                                            <div class="col-md-4" >
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Foto</label>
                                                    <input type="file" class="form-control" name="sessao6_foto" >
                                                </div>
                                            </div>
                                            <?php if(isset($editaExame->sessao6_foto) && !empty($editaExame->sessao6_foto)){ ?>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                               <img src="../img/<?php echo $editaExame->sessao6_foto;?>" width="150" alt="">
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Texto</label>
                                                   <textarea name="sessao6_texto" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaExame->sessao6_texto) && !empty($editaExame->sessao6_texto)){ echo $editaExame->sessao6_texto;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <hr>
                                        
                                        <h4 class="card-title" style="display:none;">Tópicos</h4>
                                        <div class="row" style="display:none;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Título 1</label>
                                                    <input type="text" class="form-control" name="topico1_titulo" value="<?php if(isset($editaExame->topico1_titulo) && !empty($editaExame->topico1_titulo)){ echo $editaExame->topico1_titulo;}?>" >
                                                </div>
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Imagem</label>
                                                    <input type="file" class="form-control" name="topico1_foto" >
                                                </div>
                                                <?php if(isset($editaExame->topico1_foto) && !empty($editaExame->topico1_foto)){ ?>
                                         
                                                    <div class="form-group">
                                                        <img src="../img/<?php echo $editaExame->topico1_foto;?>" width="150" alt="">
                                                    </div>
                                                <?php }?>
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Texto</label>
                                                    <textarea name="topico1_texto" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaExame->topico1_texto) && !empty($editaExame->topico1_texto)){ echo $editaExame->topico1_texto;}?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Título 2</label>
                                                        <input type="text" class="form-control" name="topico2_titulo" value="<?php if(isset($editaExame->topico2_titulo) && !empty($editaExame->topico2_titulo)){ echo $editaExame->topico2_titulo;}?>" >
                                                    </div>
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Imagem</label>
                                                        <input type="file" class="form-control" name="topico2_foto" >
                                                    </div>
                                                <?php if(isset($editaExame->topico2_foto) && !empty($editaExame->topico2_foto)){ ?>
                                         
                                                    <div class="form-group">
                                                        <img src="../img/<?php echo $editaExame->topico2_foto;?>" width="150" alt="">
                                                    </div>
                                                <?php }?>
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Texto</label>
                                                    <textarea name="topico2_texto" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaExame->topico2_texto) && !empty($editaExame->topico2_texto)){ echo $editaExame->topico2_texto;}?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="display:none;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título 3</label>
                                                    <input type="text" class="form-control" name="topico3_titulo" value="<?php if(isset($editaExame->topico3_titulo) && !empty($editaExame->topico3_titulo)){ echo $editaExame->topico3_titulo;}?>" >
                                                </div>
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem</label>
                                                    <input type="file" class="form-control" name="topico3_foto" >
                                                </div>
                                                <?php if(isset($editaExame->topico3_foto) && !empty($editaExame->topico3_foto)){ ?>
                                         
                                                    <div class="form-group">
                                                        <img src="../img/<?php echo $editaExame->topico3_foto;?>" width="150" alt="">
                                                    </div>
                                                <?php }?>
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Texto</label>
                                                   <textarea name="topico3_texto" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaExame->topico3_texto) && !empty($editaExame->topico3_texto)){ echo $editaExame->topico3_texto;}?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Título 4</label>
                                                    <input type="text" class="form-control" name="topico4_titulo" value="<?php if(isset($editaExame->topico4_titulo) && !empty($editaExame->topico4_titulo)){ echo $editaExame->topico4_titulo;}?>" >
                                                </div>
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Imagem</label>
                                                    <input type="file" class="form-control" name="topico4_foto" >
                                                </div>
                                                <?php if(isset($editaExame->topico4_foto) && !empty($editaExame->topico4_foto)){ ?>
                                         
                                                    <div class="form-group">
                                                    <img src="../img/<?php echo $editaExame->topico4_foto;?>" width="150" alt="">
                                                    </div>
                                                <?php }?>
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Texto</label>
                                                    <textarea name="topico4_texto" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaExame->topico4_texto) && !empty($editaExame->topico4_texto)){ echo $editaExame->topico4_texto;}?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <hr>        

                                        <h4 class="card-title" style="display:none;">Diferenciais</h4>
                                        <div class="row" style="display:none;">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título 1</label>
                                                    <input type="text" class="form-control" name="diferenca1_titulo" value="<?php if(isset($editaExame->diferenca1_titulo) && !empty($editaExame->diferenca1_titulo)){ echo $editaExame->diferenca1_titulo;}?>" >
                                                </div>
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem</label>
                                                    <input type="file" class="form-control" name="diferenca1_foto" >
                                                </div>
                                                <?php if(isset($editaExame->diferenca1_foto) && !empty($editaExame->diferenca1_foto)){ ?>
                                                    <div class="form-group">
                                                    <img src="../img/<?php echo $editaExame->diferenca1_foto;?>" width="150" alt="">
                                                    </div>
                                                <?php }?>
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Texto</label>
                                                   <textarea name="diferenca1_texto" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaExame->diferenca1_texto) && !empty($editaExame->diferenca1_texto)){ echo $editaExame->diferenca1_texto;}?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título 2</label>
                                                    <input type="text" class="form-control" name="diferenca2_titulo" value="<?php if(isset($editaExame->diferenca2_titulo) && !empty($editaExame->diferenca2_titulo)){ echo $editaExame->diferenca2_titulo;}?>" >
                                                </div>
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem</label>
                                                    <input type="file" class="form-control" name="diferenca2_foto" >
                                                </div>
                                                <?php if(isset($editaExame->diferenca2_foto) && !empty($editaExame->diferenca2_foto)){ ?>
                                                    <div class="form-group">
                                                    <img src="../img/<?php echo $editaExame->diferenca2_foto;?>" width="150" alt="">
                                                    </div>
                                                <?php }?>
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Texto</label>
                                                   <textarea name="diferenca2_texto" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaExame->diferenca2_texto) && !empty($editaExame->diferenca2_texto)){ echo $editaExame->diferenca2_texto;}?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título 3</label>
                                                    <input type="text" class="form-control" name="diferenca3_titulo" value="<?php if(isset($editaExame->diferenca3_titulo) && !empty($editaExame->diferenca3_titulo)){ echo $editaExame->diferenca3_titulo;}?>" >
                                                </div>
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem</label>
                                                    <input type="file" class="form-control" name="diferenca3_foto" >
                                                </div>
                                                <?php if(isset($editaExame->diferenca3_foto) && !empty($editaExame->diferenca3_foto)){ ?>
                                         
                                                    <div class="form-group">
                                                    <img src="../img/<?php echo $editaExame->diferenca3_foto;?>" width="150" alt="">
                                                    </div>
                                                <?php }?>
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Texto</label>
                                                   <textarea name="diferenca3_texto" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaExame->diferenca3_texto) && !empty($editaExame->diferenca3_texto)){ echo $editaExame->diferenca3_texto;}?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                         <hr>

                                        <h4 class="card-title">Sessão Contato</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título</label>
                                                    <input type="text" class="form-control" name="contato_titulo" value="<?php if(isset($editaExame->contato_titulo) && !empty($editaExame->contato_titulo)){ echo $editaExame->contato_titulo;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Foto</label>
                                                    <input type="file" class="form-control" name="contato_foto" >
                                                </div>
                                            </div>
                                        
                                            <?php if(isset($editaExame->contato_foto) && !empty($editaExame->contato_foto)){ ?>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <img src="../img/<?php echo $editaExame->contato_foto;?>" width="150" alt="">
                                                    </div>
                                                </div>
                                            <?php }?>  
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Botão</label>
                                                    <input type="text" class="form-control" name="contato_botao" value="<?php if(isset($editaExame->contato_botao) && !empty($editaExame->contato_botao)){ echo $editaExame->contato_botao;}?>" >
                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Texto</label>
                                                   <textarea name="contato_texto" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaExame->contato_texto) && !empty($editaExame->contato_texto)){ echo $editaExame->contato_texto;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <hr>

                                        <h4 class="card-title">Imagem Final</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem</label>
                                                    <input type="file" class="form-control" name="imagem_final" >
                                                </div>
                                            </div>
                                            <?php if(isset($editaExame->imagem_final) && !empty($editaExame->imagem_final)){ ?>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                <img src="../img/<?php echo $editaExame->imagem_final;?>" width="150" alt="">
                                                    </div>
                                                </div>
                                            <?php }?>
                                            <!--<div class="col-md-4">-->
                                            <!--    <div class="form-group">-->
                                            <!--    <label class="mr-sm-2" for="">Imagem mobile</label>-->
                                            <!--        <input type="file" class="form-control" name="imagem_mobile_final" >-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <?php //if(isset($editaExame->imagem_mobile_final) && !empty($editaExame->imagem_mobile_final)){ ?>
                                                <!--<div class="col-md-2">-->
                                                <!--    <div class="form-group">-->
                                                <!--<img src="../img/<?php //echo $editaExame->imagem_mobile_final;?>" width="150" alt="">-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                            <?php //}?>
                                        </div>
                                        <h4 class="card-title">Icone</h4>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Icone</label>
                                                    <input type="file" class="form-control" name="icone" >
                                                </div>
                                            </div>
                                        
                                            <?php if(isset($editaExame->icone) && !empty($editaExame->icone)){ ?>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                <img src="../img/<?php echo $editaExame->icone;?>" width="150" alt="">
                                                    </div>
                                                </div>
                                            <?php }?>                                       
                                        </div> 
                                        <h4 class="card-title">Botão</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Titulo</label>
                                                    <input type="text" class="form-control" name="botao" value="<?php if(isset($editaExame->botao) && !empty($editaExame->botao)){ echo $editaExame->botao;}?>">
                                                </div>
                                            </div>                                        
                                        </div>
                                        <hr>

                                        <br>
                                        
                                        <h4 class="card-title">Metas Tags</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Meta Title</label>
                                                    <input type="text" class="form-control" name="meta_title" value="<?php if(isset($editaExame->meta_title) && !empty($editaExame->meta_title)){ echo $editaExame->meta_title;}?>">
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Meta Keywords</label>
                                                    <input type="text" class="form-control" name="meta_keywords" value="<?php if(isset($editaExame->meta_keywords) && !empty($editaExame->meta_keywords)){ echo $editaExame->meta_keywords;}?>">
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Meta Description</label>
                                                   <textarea name="meta_description" class="form-control" id="" cols="30" rows="4"><?php if(isset($editaExame->meta_description) && !empty($editaExame->meta_description)){ echo $editaExame->meta_description;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">URL Amigavel</label>
                                                    <input type="text" class="form-control" name="url_amigavel" value="<?php if(isset($editaExame->url_amigavel) && !empty($editaExame->url_amigavel)){ echo $editaExame->url_amigavel;}?>">
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
                                    <input type="hidden" name="acao" value="editaExames">
                                    <input type="hidden" name="id" value="<?php echo $editaExame->id;?>">
                                    <input type="hidden" name="banner_foto_Atual" value="<?php if(isset($editaExame->banner_foto) && !empty($editaExame->banner_foto)){ echo $editaExame->banner_foto;}?>">
                                    <input type="hidden" name="sessao1_foto_Atual" value="<?php if(isset($editaExame->sessao1_foto) && !empty($editaExame->sessao1_foto)){ echo $editaExame->sessao1_foto;}?>">
                                    <input type="hidden" name="sessao2_foto_Atual" value="<?php if(isset($editaExame->sessao2_foto) && !empty($editaExame->sessao2_foto)){ echo $editaExame->sessao2_foto;}?>">
                                    <input type="hidden" name="sessao4_foto_Atual" value="<?php if(isset($editaExame->sessao4_foto) && !empty($editaExame->sessao4_foto)){ echo $editaExame->sessao4_foto;}?>">
                                    <input type="hidden" name="topico1_foto_Atual" value="<?php if(isset($editaExame->topico1_foto) && !empty($editaExame->topico1_foto)){ echo $editaExame->topico1_foto;}?>">
                                    <input type="hidden" name="topico2_foto_Atual" value="<?php if(isset($editaExame->topico2_foto) && !empty($editaExame->topico2_foto)){ echo $editaExame->topico2_foto;}?>">
                                    <input type="hidden" name="topico3_foto_Atual" value="<?php if(isset($editaExame->topico3_foto) && !empty($editaExame->topico3_foto)){ echo $editaExame->topico3_foto;}?>">
                                    <input type="hidden" name="topico4_foto_Atual" value="<?php if(isset($editaExame->topico4_foto) && !empty($editaExame->topico4_foto)){ echo $editaExame->topico4_foto;}?>">
                                    <input type="hidden" name="diferenca1_foto_Atual" value="<?php if(isset($editaExame->diferenca1_foto) && !empty($editaExame->diferenca1_foto)){ echo $editaExame->diferenca1_foto;}?>">
                                    <input type="hidden" name="diferenca2_foto_Atual" value="<?php if(isset($editaExame->diferenca2_foto) && !empty($editaExame->diferenca2_foto)){ echo $editaExame->diferenca2_foto;}?>">
                                    <input type="hidden" name="diferenca3_foto_Atual" value="<?php if(isset($editaExame->diferenca3_foto) && !empty($editaExame->diferenca3_foto)){ echo $editaExame->diferenca3_foto;}?>">
                                    <input type="hidden" name="imagem_final_Atual" value="<?php if(isset($editaExame->imagem_final) && !empty($editaExame->imagem_final)){ echo $editaExame->imagem_final;}?>">
                                    <input type="hidden" name="imagem_mobile_final_Atual" value="<?php if(isset($editaExame->imagem_mobile_final) && !empty($editaExame->imagem_mobile_final)){ echo $editaExame->imagem_mobile_final;}?>">
                                    <input type="hidden" name="icone_Atual" value="<?php if(isset($editaExame->icone) && !empty($editaExame->icone)){ echo $editaExame->icone;}?>">
                                    <input type="hidden" name="sessao2_foto2_Atual" value="<?php if(isset($editaExame->sessao2_foto2) && !empty($editaExame->sessao2_foto2)){ echo $editaExame->sessao2_foto2;}?>">
                                    <input type="hidden" name="sessao4_icone_Atual" value="<?php if(isset($editaExame->sessao4_icone) && !empty($editaExame->sessao4_icone)){ echo $editaExame->sessao4_icone;}?>">
                                    <input type="hidden" name="contato_foto_Atual" value="<?php if(isset($editaExame->contato_foto) && !empty($editaExame->contato_foto)){ echo $editaExame->contato_foto;}?>">
                                    <input type="hidden" name="sessao1_thumb_Atual" value="<?php if(isset($editaExame->sessao1_thumb) && !empty($editaExame->sessao1_thumb)){ echo $editaExame->sessao1_thumb;}?>">
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