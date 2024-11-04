<?php
include "verifica.php";

$puxaAgendas = $agenda->rsDados();
$puxaAreas = $agenda->Area();
$usuarioLogin = $_SESSION['dadosLogado']->id;
$agenda->excluir();

// Verifica se há registros e move o último para o topo
if (count($puxaAgendas) > 1) {
    $ultimoRegistro = array_pop($puxaAgendas); // Remove o último registro do array
    array_unshift($puxaAgendas, $ultimoRegistro); // Adiciona o último registro no início
}

// Inicialização das variáveis
$areas = array(); 
$areas_id = array();

// BreadCrumb
$page = "Agenda";
$voltarpara = "Home";
$txtFirstBTN = "Áreas";
$hrefFirstBTN = "areas";

function abreviarLink($link, $comprimento = 30) {
    if (strlen($link) > $comprimento) {
        return '<a href="' . htmlspecialchars($link) . '" title="' . htmlspecialchars($link) . '">' . htmlspecialchars(substr($link, 0, $comprimento)) . '...</a>';
    }
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

        .search-box {
            margin-top: 20px;
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
            <?php include "./utils/breadcrumb.php"; ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <!-- <th>Assunto</th> -->
                                                <!-- <th>Local</th> -->
                                                <th>Data</th>
                                                <th>Tipo</th>
                                                <th>Orgão</th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (count($puxaAgendas) > 0) : ?>
                                                <?php foreach ($puxaAgendas as $agenda) : ?>
                                                    <tr>
                                                        <td data-label="Nome" class="fw-600"><?php echo abreviarLink($agenda->nome); ?></td>
                                                        <!-- <td data-label="Assunto" class="text-info fw-500"><?php echo $agenda->assunto; ?></td> -->
                                                        <!-- <td data-label="Local"><?php echo $agenda->local; ?></td> -->
                                                        <td data-label="Data"><?php echo date_format(new DateTime($agenda->data), 'd/m/Y'); ?></td>
                                                        <td data-label="Area" class="fw-600">
                                                            <?php 
                                                                foreach ($puxaAreas as $area) :
                                                                    if ($area->id == $agenda->area) :
                                                                        echo $area->nome;
                                                                    endif;
                                                                endforeach;
                                                            ?>
                                                        </td>
                                                        <td data-label="Orgão">
                                                            <a href="<?= $agenda->orgao; ?>" target="_blank" rel="noreferrer">
                                                                <?php if (!empty($agenda->orgao)): ?>
                                                                    <?php echo abreviarLink($agenda->orgao); ?>
                                                                <?php else : echo "Nenhum órgão informado!" ?>
                                                                <?php endif; ?>
                                                            </a>
                                                        </td>

                                                        <td data-label="Opções">
                                                            <?php if (in_array($usuarioLogin, $areas_id) || $verConfig == 1 || $configs->perm_crud_agenda == 1) : ?>
                                                                <a href="visualizar-agenda?id=<?php echo $agenda->id; ?>" title="[Visualizar Detalhes]  <?php echo "\n"; ?>  :: <?php echo htmlspecialchars($agenda->nome); ?>" class="btn btn-warning btn-circle"><i class="fas fa-solid fa-eye"></i></a>
                                                            <?php endif ?>

                                                            <?php if (in_array($usuarioLogin, $areas_id) || $verConfig == 1 || $configs->perm_crud_agenda == 1) : ?>
                                                                <a href="editar-agenda?id=<?php echo $agenda->id; ?>" title="[Editar] :: <?php echo htmlspecialchars($agenda->nome); ?>" class="btn btn-success btn-circle"><i class="fas fa-pencil-alt"></i></a>
                                                            <?php endif ?>

                                                            <?php if ($verConfig == 1 || $configs->perm_crud_agenda == 1) : ?>
                                                                <a href="javascript:;" class="btn btn-danger btn-circle" title="[Excluir] :: <?php echo htmlspecialchars($agenda->nome); ?>" onclick="excluir('agenda', <?php echo $agenda->id; ?>, 'excluirAgenda')"><i class="fa fa-times"></i></a>
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
