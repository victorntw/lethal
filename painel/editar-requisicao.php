<?php include "verifica.php";

if(isset($_GET['id'])){
    if(empty($_GET['id'])){
        header('Location: requisicoes.php');
    }else{
        $id = $_GET['id'];        
    }
}

$especialidades->editarRequisicao();
$editaEspecialidade = $especialidades->rsDadosRequisicoes($id);


$puxaCatSelecionadas = $especialidades->rsDadosRelaciona($id, 'S');

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
    <title>Painel SEDF - Editar Requisição</title>
    <link href="dist/css/style.min.css" rel="stylesheet">
</head>
<body>
        <style>
        h4 {
            font-weight:900 !important;
        }
    </style>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar Especialidade</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="especialidades.php" class="text-muted">Especialidades</a></li>
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
                                    
                                    <h4>Data da Solicitação : <?php echo formataData($editaEspecialidade->data_cadastro); ?></h4>
                                    <h4>Status: <?php echo $editaEspecialidade->status; ?></h4>
                                    <hr>
                                    <h4>Dados do Paciente</h4>
                                    <hr>
                                    <p>Nome: <?php echo $editaEspecialidade->nome; ?></p>
                                    <p>Data de Nascimento: <?php echo formataData($editaEspecialidade->nascimento); ?></p>
                                    <p>Email: <?php echo $editaEspecialidade->email; ?></p>
                                    <p>Telefone: <?php echo $editaEspecialidade->telefone; ?></p>
                                    <p>Celular: <?php echo $editaEspecialidade->celular; ?></p>
                                    <p>CEP: <?php echo $editaEspecialidade->cep; ?></p>
                                    <p>Rua: <?php echo $editaEspecialidade->rua; ?></p>
                                    <p>Número: <?php echo $editaEspecialidade->numero; ?></p>
                                    <p>Complemento: <?php echo $editaEspecialidade->complemento; ?></p>
                                    <p>Bairro: <?php echo $editaEspecialidade->bairro; ?></p>
                                    <p>Cidade: <?php echo $editaEspecialidade->cidade; ?></p>
                                    <p>Estado: <?php echo $editaEspecialidade->estado; ?></p>
                                    <hr>
                                    <h4>Dados do Dentista</h4>
                                    <hr>
                                    <p>Nome do Dentista: <?php echo $editaEspecialidade->nomeDentista; ?></p>
                                    <p>CRO do Dentista: <?php echo $editaEspecialidade->cro; ?></p>
                                    <p>Telefone do Dentista: <?php echo $editaEspecialidade->telefoneDentista; ?></p>
                                    <p>E-Mail do Dentista: <?php echo $editaEspecialidade->emailDentista; ?></p>

                                    <hr>
                                    <h4>Dados do Procedimento</h4>

                                    
                                    <hr>
                                        <?php  
                                         
                                        foreach($puxaCatSelecionadas as $catSelecionada){ 
                                       $especialidadesSelecionadas = $especialidades->rsRequisicoesEspecialidades('','','',$id, $catSelecionada->id_cat_especialidade);
                                        $puxaCat = $categorias->rsDados($catSelecionada->id_cat_especialidade);
                                       
                                        
                                        ?>
                                        <p><strong><?php echo $puxaCat->nome?></strong> 
                                        <?php foreach ($especialidadesSelecionadas as $especialidade) { ?>
                                        <span style="background: #01bea4; color: white; padding: 10px; border-radius: 11px;"><?php echo $especialidade->especialidade; ?></span>
                                        <?php } ?>
                                         </p>
                                        <?php } ?>
                                        
                                   
                                     <p>Data Escolhida: <?php echo formataData($editaEspecialidade->dataPreferencia); ?></p>
                                    <p>Período: <?php echo $editaEspecialidade->periodo; ?></p>
                                    
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Lido">Lido</option>
                                        <option value="Recebido">Recebido</option>
                                    </select>
                                    <div class="form-actions mt-5">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                        </div>
                                    </div>
                                    
                                   
                                    <input type="hidden" name="acao" value="editarRequisicao">
                                    <input type="hidden" name="id" value="<?php if(isset($editaEspecialidade->id) && !empty($editaEspecialidade->id)){ echo $editaEspecialidade->id;}?>">
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