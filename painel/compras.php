<?php include "verifica.php";
$puxaCompras = $compras->rsDados();
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
    <title>Painel SEDF - Compras</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Compras</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
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
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Compra</th>
                                                <th>Data Compra</th>
                                                <th>Cliente</th>
                                                <th>Valor</th>
                                                <th>Status Compra</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(count($puxaCompras) > 0){
                                            foreach($puxaCompras as $compra){
                                                $nomeCliente = $clientes->rsDados($compra->id_cliente);
                                                $puxaItensCompras = $compras->rsDadosItens('', '', '', $compra->id);
                                                
                                                ?>
                                            <tr>
                                                <td>#<?php echo $compra->id;?></td>
                                                <td>
                                                    <?php 
                                                    if(count($puxaItensCompras) > 0){
                                                        $itens = '';
                                                    foreach($puxaItensCompras as $item){
                                                        if($item->id_produto == '252525'){
                                                            $itens .= "Ingresso Inteira(".$item->quantidade_produto."), ";
                                                        }else if($item->id_produto == '252526'){
                                                            $itens .= "Ingresso Meia(".$item->quantidade_produto."), ";
                                                        }else{
                                                            $nomeProduto = $produtos->rsDados($item->id_produto);
                                                            $itens .= $nomeProduto->nome."(".$item->quantidade_produto."), ";
                                                        }
                                                        
                                                    }
                                                    }
                                                    if(isset($itens) && !empty($itens)){
                                                    echo "<small>".substr($itens,0,-2)."</small>";
                                                    }
                                                        ?>
                                                </td>
                                                <td><small><?php echo formataData($compra->data_transacao);?> - <?php echo substr($compra->hora_transacao,0,5);?></small></td>
                                                <td><small><?php echo $nomeCliente->nome;?> - <?php echo $nomeCliente->telefone;?> - <?php echo $nomeCliente->cpf;?></small></td>
                                                <td>R$ <?php echo number_format($compra->valor,2,',','.');?></td>
                                                <td><?php echo exibe_status_compra($compra->status_compra);?></td>
                                              
                                            </tr>
                                            <?php } }?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Código</th>
                                                <th>Compra</th>
                                                <th>Data Compra</th>
                                                <th>Cliente</th>
                                                <th>Valor</th>
                                                <th>Status Compra</th>
                                             
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
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
    <script src="assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/pages/datatable/datatable-basic.init.js"></script>
</body>
</html>