<?php include "verifica.php";
$id = '';
if(isset($_GET['id'])){
    if(empty($_GET['id'])){
        header('Location: reservas.php');
    }else{
        $id = $_GET['id'];        
    }
}
$compras->editar();
$editaReserva = $compras->rsDados($id);
//$puxaCategorias = $categorias->rsDados();
$nomeCliente = $clientes->rsDados($editaReserva->id_cliente);
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
    <title>Painel SEDF - Editar Reserva</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar Reserva</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="reservas.php" class="text-muted">Reservas</a></li>
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
                                               
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Tipo Compra</label>
                                        <select class="custom-select mr-sm-2" name="tipo_compra" id="inlineFormCustomSelect">
                                            <option value="CHA" <?php if(isset($editaReserva->tipo_compra) && $editaReserva->tipo_compra == 'CHA'){ echo "selected";}?>>Chalé</option>
                                            <option value="CAM" <?php if(isset($editaReserva->tipo_compra) && $editaReserva->tipo_compra == 'CAM'){ echo "selected";}?>>Camping</option>
                                            <option value="USE" <?php if(isset($editaReserva->tipo_compra) && $editaReserva->tipo_compra == 'USE'){ echo "selected";}?>>Day User</option>
                                        </select>                                  
                                                </div>
                                            </div>
                                             <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Entrada</label>
                                                    <input type="date" class="form-control" disabled value="<?php if(isset($editaReserva->entrada) && !empty($editaReserva->entrada)){ echo $editaReserva->entrada;}?>" >
                                                    <input type="hidden" class="form-control" name="entrada" value="<?php if(isset($editaReserva->entrada) && !empty($editaReserva->entrada)){ echo $editaReserva->entrada;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Saida</label>
                                                    <input type="date" class="form-control" disabled value="<?php if(isset($editaReserva->saida) && !empty($editaReserva->saida)){ echo $editaReserva->saida;}?>" >
                                                    <input type="hidden" class="form-control" name="saida" value="<?php if(isset($editaReserva->saida) && !empty($editaReserva->saida)){ echo $editaReserva->saida;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                               
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Status Compra</label>
                                        <select class="custom-select mr-sm-2" name="status_compra" id="inlineFormCustomSelect">
                                            <option value="1" <?php if(isset($editaReserva->status_compra) && $editaReserva->status_compra == '1'){ echo "selected";}?>>Autorizado</option>
                                            <option value="2" <?php if(isset($editaReserva->status_compra) && $editaReserva->status_compra == '2'){ echo "selected";}?>>Pagamento Pendente</option>
                                            <option value="3" <?php if(isset($editaReserva->status_compra) && $editaReserva->status_compra == '3'){ echo "selected";}?>>Pagamento Recusado</option>
                                        </select>                                  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Cliente</label>
                                                    <input type="text" class="form-control" disabled value="<?php if(isset($nomeCliente->nome) && !empty($nomeCliente->nome)){ echo $nomeCliente->nome;}?>" >
                                                    <input type="hidden" name="id_cliente"  value="<?php if(isset($nomeCliente->id) && !empty($nomeCliente->id)){ echo $nomeCliente->id;}?>" >
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Valor</label>
                                                    <input type="text" class="form-control" disabled value="R$ <?php if(isset($editaReserva->valor) && !empty($editaReserva->valor)){ echo number_format($editaReserva->valor,2,',','.');}?>">
                                                    <input type="hidden" class="form-control" name="valor" value="<?php if(isset($editaReserva->valor) && !empty($editaReserva->valor)){ echo $editaReserva->valor;}?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Qnt. Adultos</label>
                                                    <input type="text" class="form-control" disabled value="<?php if(isset($editaReserva->quantidade_adulto) && !empty($editaReserva->quantidade_adulto)){ echo $editaReserva->quantidade_adulto;}?>" >
                                                    <input type="hidden" class="form-control" name="quantidade_adulto" value="<?php if(isset($editaReserva->quantidade_adulto) && !empty($editaReserva->quantidade_adulto)){ echo $editaReserva->quantidade_adulto;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Qnt. Crianças até 5</label>
                                                    <input type="text" class="form-control" disabled value="<?php if(isset($editaReserva->quantidade_crianca_ate_5) && !empty($editaReserva->quantidade_crianca_ate_5)){ echo $editaReserva->quantidade_crianca_ate_5;}?>" >
                                                    <input type="hidden" class="form-control" name="quantidade_crianca_ate_5" value="<?php if(isset($editaReserva->quantidade_crianca_ate_5) && !empty($editaReserva->quantidade_crianca_ate_5)){ echo $editaReserva->quantidade_crianca_ate_5;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Qnt. Crianças até 9</label>
                                                    <input type="text" class="form-control" disabled value="<?php if(isset($editaReserva->quantidade_crianca_ate_9) && !empty($editaReserva->quantidade_crianca_ate_9)){ echo $editaReserva->quantidade_crianca_ate_9;}?>" >
                                                    <input type="hidden" class="form-control" name="quantidade_crianca_ate_9" value="<?php if(isset($editaReserva->quantidade_crianca_ate_9) && !empty($editaReserva->quantidade_crianca_ate_9)){ echo $editaReserva->quantidade_crianca_ate_9;}?>" >
                                                </div>
                                            </div>
                                          
                                        </div>
                                     
                                     
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                        
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="editaCompra">
                                    <input type="hidden" name="id" value="<?php echo $editaReserva->id;?>">
                                    <input type="hidden" name="id_chale" value="<?php echo $editaReserva->id_chale;?>">
                                    <input type="hidden" name="data_transacao" value="<?php echo $editaReserva->data_transacao;?>">
                                    <input type="hidden" name="hora_transacao" value="<?php echo $editaReserva->hora_transacao;?>">
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