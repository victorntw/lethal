<?php
include "verifica.php";

// Função para processar a alteração de senha
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senhaAtual = $_POST['senha_atual'];
    $novaSenha = $_POST['nova_senha'];
    $confirmarNovaSenha = $_POST['confirmar_nova_senha'];

    // Lógica de validação e alteração de senha
    if ($novaSenha === $confirmarNovaSenha) {
        // Código para verificar a senha atual e atualizar a nova senha no banco de dados
        $resultado = $verificaRestrito->atualizarSenha($senhaAtual, $novaSenha);
        if ($resultado) {
            $mensagem = "Senha alterada com sucesso!";
            $alertClass = "alert-success"; // Classe Bootstrap para alerta de sucesso
        } else {
            $mensagem = "Erro ao alterar a senha. Verifique sua senha atual.";
            $alertClass = "alert-danger"; // Classe Bootstrap para alerta de erro
        }
    } else {
        $mensagem = "As novas senhas não coincidem.";
        $alertClass = "alert-danger"; // Classe Bootstrap para alerta de erro
    }
}
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
    <title>Painel SEDF - Alterar Senha</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Alterar Senha</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Alterar Senha</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if (isset($mensagem)): ?>
                                    <div class="alert <?php echo $alertClass; ?>" role="alert">
                                        <?php echo $mensagem; ?>
                                    </div>
                                <?php endif; ?>
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label for="senha_atual">Senha Atual</label>
                                        <input type="password" class="form-control" id="senha_atual" name="senha_atual" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nova_senha">Nova Senha</label>
                                        <input type="password" class="form-control" id="nova_senha" name="nova_senha" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmar_nova_senha">Confirmar Nova Senha</label>
                                        <input type="password" class="form-control" id="confirmar_nova_senha" name="confirmar_nova_senha" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Alterar Senha</button>
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
