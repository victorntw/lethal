<?php
include "verifica.php";

$puxaProcessos = $processos->rsDados();
$puxaRepresentante = $processos->Representante();
$usuarioLogin = $_SESSION['dadosLogado']->id;
$processos->excluir();

function abreviarLink($link, $comprimento = 30) {
    // Verifica se o comprimento do link é maior que o comprimento especificado
    if (strlen($link) > $comprimento) {
        // Retorna o link abreviado com "..." no final e o link completo como dica
        return '<a href="' . htmlspecialchars($link) . '" title="' . htmlspecialchars($link) . '">' . htmlspecialchars(substr($link, 0, $comprimento)) . '...</a>';
    }
    // Retorna o link original se ele for menor ou igual ao comprimento especificado
    return '<a href="' . htmlspecialchars($link) . '" title="' . htmlspecialchars($link) . '">' . htmlspecialchars($link) . '</a>';
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<head>
    <?php include "head.php"; ?>
    <style>
        .fw-500 {
            font-weight: 500;
        }
        .fw-600 {
            font-weight: 600;
        }

        /* Melhorias de responsividade para a tabela */
        .table-responsive {
            overflow-x: auto;
        }

        /* Tabela com colunas adaptáveis */
        .table th, .table td {
            white-space: nowrap; /* Mantém o texto em uma única linha por padrão */
        }

        /* Ajustes para dispositivos menores */
        @media (max-width: 768px) {
            .table thead {
                display: none; /* Oculta o cabeçalho da tabela em dispositivos menores */
            }

            .table tr {
                display: block;
                margin-bottom: 1em;
                border: 1px solid #ddd;
                border-radius: 4px;
                overflow: hidden;
            }

            .table td {
                display: block;
                text-align: right;
                position: relative;
                padding-left: 50%;
                border-bottom: 1px solid #ddd;
                white-space: normal; /* Permite que o texto quebre linhas */
                word-wrap: break-word; /* Quebra palavras longas para evitar sobreposição */
                overflow-wrap: break-word; /* Quebra palavras longas para evitar sobreposição */
            }

            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 45%;
                padding-left: 1em;
                font-weight: bold;
                white-space: nowrap; /* Mantém o rótulo em uma linha */
            }

            .table td:last-child {
                border-bottom: 0;
            }

            /* Quebra de linha para links */
            .table td a {
                word-wrap: break-word;
                overflow-wrap: break-word;
            }
        }
    </style>
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <?php include "header.php"; ?>
        <?php include "inc-menu-lateral.php"; ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Processos</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <a href="add-processo" class="btn btn-success float-right m-1">Add. Processo</a>
                        <a href="representantes" class="btn btn-primary float-right m-1">Representantes</a>
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
                                                <th>Processo</th>
                                                <th>Andamento</th>
                                                <th>Última Atualização</th>
                                                <th>Sei</th>
                                                <th>Link</th>
                                                <th>Representante</th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (count($puxaProcessos) > 0) : ?>
                                                <?php foreach ($puxaProcessos as $processo) : ?>
                                                    <tr>
                                                        <!-- <?php dump($processo); ?> -->
                                                        <td data-label="Processo" class="fw-600"><?php echo abreviarLink($processo->nome); ?></td>
                                                        <td data-label="Andamento" class="text-info fw-500"><?php echo $processo->andamento; ?></td>
                                                        <td data-label="Última Atualização"><?php echo date_format(new DateTime($processo->ultima_atualizacao), 'd/m/Y'); ?></td>
                                                        <td data-label="Sei"><?php echo $processo->numero_sei; ?></td>
                                                        <td data-label="Link">
                                                            <a href="<?= $processo->sei_link; ?>" target="_blank" rel="noreferrer">
                                                                <?php echo abreviarLink($processo->sei_link); ?>
                                                            </a>
                                                        </td>
                                                        <td data-label="Representante" class="fw-600">
                                                            <?php 
                                                                $representantes = array();
                                                                $representantes_id = array();
                                                                foreach ($puxaRepresentante as $representante) :
                                                                    if ($processo->representante1 == $representante->id || $processo->representante2 == $representante->id) :
                                                                        $representantes[] = $representante->representante;
                                                                        $representantes_id[] = $representante->id_representante;
                                                                    endif;
                                                                endforeach;
                                                                echo implode(" e ", $representantes);
                                                            ?>
                                                        </td>

                                                        <td data-label="Opções">
                                                            <?php if (in_array($usuarioLogin, $representantes_id) || $verConfig == 1) : ?>
                                                                <a href="editar-processo?id=<?php echo $processo->id; ?>" title="[Editar] :: <?php echo htmlspecialchars($processo->nome); ?>"  class="btn btn-success btn-circle"><i class="fas fa-pencil-alt"></i></a>
                                                            <?php endif ?>

                                                            <?php if ($verConfig == 1) : ?>
                                                                <a href="javascript:;" class="btn btn-warning btn-circle" title="[Excluir] :: <?php echo htmlspecialchars($processo->nome); ?>" onclick="excluir('processo', <?php echo $processo->id; ?>, 'excluirProcesso')"><i class="fa fa-times"></i></a>
                                                            <?php endif ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "footer.php"; ?>
        </div>
    </div>
    <?php include "scripts-js.php"; ?>
</body>

</html>
