<?php
@session_start();
$EspecialidadesInstanciada = '';
if (empty($EspecialidadesInstanciada)) {
    if (file_exists('Connection/conexao.php')) {
        require_once('Connection/con-pdo.php');
        require_once('Class/funcoes.php');
    } else {
        require_once('../Connection/con-pdo.php');
        require_once('../Class/funcoes.php');
    }

    class Especialidades
    {

        private $pdo = null;

        private static $Especialidades = null;

        private function __construct($conexao)
        {
            $this->pdo = $conexao;
        }

        public static function getInstance($conexao)
        {
            if (!isset(self::$Especialidades)) :
                self::$Especialidades = new Especialidades($conexao);
            endif;
            return self::$Especialidades;
        }


        function rsDados($id = '', $orderBy = '', $limite = '', $id_categoria = '')
        {

            /// FILTROS
            $nCampos = 0;
            $sql = '';
            $sqlOrdem = '';
            $sqlLimite = '';
            if (!empty($id)) {
                $sql .= " and id = ?";
                $nCampos++;
                $campo[$nCampos] = $id;
            }
            if (!empty($id_categoria)) {
                $sql .= " and id_categoria = ?";
                $nCampos++;
                $campo[$nCampos] = $id_categoria;
            }

            /// ORDEM		
            if (!empty($orderBy)) {
                $sqlOrdem = " order by {$orderBy}";
            }

            if (!empty($limite)) {
                $sqlLimite = " limit 0,{$limite}";
            }

            try {
                $sql = "SELECT * FROM tbl_especialidades where 1=1 $sql $sqlOrdem $sqlLimite";
                $stm = $this->pdo->prepare($sql);

                for ($i = 1; $i <= $nCampos; $i++) {
                    $stm->bindValue($i, $campo[$i]);
                }

                $stm->execute();
                $rsDados = $stm->fetchAll(PDO::FETCH_OBJ);
                //print_r($rsDados);
                if ($id <> '' or $limite == 1) {
                    return ($rsDados[0]);
                } else {
                    return ($rsDados);
                }
            } catch (PDOException $erro) {
                echo $erro->getMessage();
            }
        }
        
          function rsDadosRelaciona($id_form='', $temGroup='')
        {

            /// FILTROS
            $nCampos = 0;
            $sql = '';
            $sqlOrdem = '';
            $sqlLimite = '';
            $groupBy = '';
            if (!empty($id_form)) {
                $sql .= " and id_form = ?";
                $nCampos++;
                $campo[$nCampos] = $id_form;
            }

            if (!empty($temGroup) && $temGroup == 'S') {
                $groupBy = " GROUP BY id_cat_especialidade";
            }

            /// ORDEM		
            if (!empty($orderBy)) {
                $sqlOrdem = " order by {$orderBy}";
            }

            if (!empty($limite)) {
                $sqlLimite = " limit 0,{$limite}";
            }

            try {
                $sql = "SELECT * FROM tbl_requisicao_especialidades where 1=1 $sql $sqlOrdem $sqlLimite $groupBy";
                $stm = $this->pdo->prepare($sql);

                for ($i = 1; $i <= $nCampos; $i++) {
                    $stm->bindValue($i, $campo[$i]);
                }

                $stm->execute();
                $rsDados = $stm->fetchAll(PDO::FETCH_OBJ);
                // print_r($rsDados);
                // if ($id_form <> '') {
                //     return ($rsDados[0]);
                // } else {
                    return ($rsDados);
               // }
            } catch (PDOException $erro) {
                echo $erro->getMessage();
            }
        }

        function add($redireciona = '')
        {
            if (isset($_POST['acao']) && $_POST['acao'] == 'addEspecialidade') {

                $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
                //$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
                $descricao = $_POST['descricao'];
                $meta_title = filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
                $meta_keywords = filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
                $meta_description = filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
                $breve = filter_input(INPUT_POST, 'breve', FILTER_SANITIZE_STRING);
                $id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_SANITIZE_STRING);
                $descricao_imagem = filter_input(INPUT_POST, 'descricao_imagem', FILTER_SANITIZE_STRING);
                $legenda_imagem = filter_input(INPUT_POST, 'legenda_imagem', FILTER_SANITIZE_STRING);
                $urlAmigavel = gerarTituloSEO($titulo);


                try {

                    if (file_exists('Connection/conexao.php')) {
                        $pastaArquivos = 'img';
                    } else {
                        $pastaArquivos = '../img';
                    }

                    $sql = "INSERT INTO tbl_especialidades (foto, titulo, descricao, meta_title, meta_keywords, meta_description, breve, id_categoria, url_amigavel, descricao_imagem, legenda_imagem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stm = $this->pdo->prepare($sql);
                    $stm->bindValue(1, upload('foto', $pastaArquivos, 'N'));
                    $stm->bindValue(2, $titulo);
                    $stm->bindValue(3, $descricao);
                    $stm->bindValue(4, $meta_title);
                    $stm->bindValue(5, $meta_keywords);
                    $stm->bindValue(6, $meta_description);
                    $stm->bindValue(7, $breve);
                    $stm->bindValue(8, $id_categoria);
                    $stm->bindValue(9, $urlAmigavel);
                    $stm->bindValue(10, $descricao_imagem);
                    $stm->bindValue(11, $legenda_imagem);
                    $stm->execute();
                    $idBanner = $this->pdo->lastInsertId();

                    if ($redireciona == '') {
                        $redireciona = '.';
                    }
                } catch (PDOException $erro) {
                    echo $erro->getMessage();
                }

                echo "	<script>
								window.location='especialidades.php';
								</script>";
                exit;
            }
        }

        function editar($redireciona = 'especialidades.php')
        {
            if (isset($_POST['acao']) && $_POST['acao'] == 'editaEspecialidade') {



                $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
                //$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
                $descricao = $_POST['descricao'];
                $meta_title = filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
                $meta_keywords = filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
                $meta_description = filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
                $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
                $breve = filter_input(INPUT_POST, 'breve', FILTER_SANITIZE_STRING);
                $id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_SANITIZE_STRING);
                $urlAmigavel = gerarTituloSEO($titulo);
                $descricao_imagem = filter_input(INPUT_POST, 'descricao_imagem', FILTER_SANITIZE_STRING);
                $legenda_imagem = filter_input(INPUT_POST, 'legenda_imagem', FILTER_SANITIZE_STRING);


                try {

                    if (file_exists('Connection/conexao.php')) {
                        $pastaArquivos = 'img';
                    } else {
                        $pastaArquivos = '../img';
                    }

                    $sql = "UPDATE tbl_especialidades SET foto=?, titulo=?, descricao=?, meta_title=?, meta_keywords=?, meta_description=?, breve=?, id_categoria=?, url_amigavel=?, descricao_imagem=?, legenda_imagem=? WHERE id=?";
                    $stm = $this->pdo->prepare($sql);
                    $stm->bindValue(1, upload('foto', $pastaArquivos, 'N'));
                    $stm->bindValue(2, $titulo);
                    $stm->bindValue(3, $descricao);
                    $stm->bindValue(4, $meta_title);
                    $stm->bindValue(5, $meta_keywords);
                    $stm->bindValue(6, $meta_description);
                    $stm->bindValue(7, $breve);
                    $stm->bindValue(8, $id_categoria);
                    $stm->bindValue(9, $urlAmigavel);
                    $stm->bindValue(10, $descricao_imagem);
                    $stm->bindValue(11, $legenda_imagem);
                    $stm->bindValue(12, $id);
                    $stm->execute();
                } catch (PDOException $erro) {
                    echo $erro->getMessage();
                }
              
                echo "	<script>
							window.location='{$redireciona}';
							</script>";
                exit;
            }
        }

        function excluir()
        {
            if (isset($_GET['acao']) && $_GET['acao'] == 'excluirEspecialidade') {

                try {
                    $sql = "DELETE FROM tbl_especialidades WHERE id=? ";
                    $stm = $this->pdo->prepare($sql);
                    $stm->bindValue(1, $_GET['id']);
                    $stm->execute();
                } catch (PDOException $erro) {
                    echo $erro->getMessage();
                }

                echo "	<script>
								window.location='especialidades.php';
								</script>";
                exit;
            }
        }

        // Cadastrar requisicao pelo site
        function addRequisicao($redireciona = '')
        {
            if (isset($_POST['acao']) && $_POST['acao'] == 'addRequisicao') {




                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                $nascimento = $_POST['nascimento'];
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
                $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
                $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
                $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
                $rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
                $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
                $complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
                $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
                $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
                $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
                $nomeDentista = filter_input(INPUT_POST, 'nomeDentista', FILTER_SANITIZE_STRING);
                $cro = filter_input(INPUT_POST, 'cro', FILTER_SANITIZE_STRING);
                $telefoneDentista = filter_input(INPUT_POST, 'telefoneDentista', FILTER_SANITIZE_STRING);
                $emailDentista = filter_input(INPUT_POST, 'emailDentista', FILTER_SANITIZE_STRING);
                $dataPreferencia = $_POST['dataPreferencia'];
                $periodo = filter_input(INPUT_POST, 'periodo', FILTER_SANITIZE_STRING);
                $status = 'Recebido';
                // $data_cadastro = filter_input(INPUT_POST, 'data_cadastro', FILTER_SANITIZE_STRING);

                try {

                    if (file_exists('Connection/conexao.php')) {
                        $pastaArquivos = 'img';
                    } else {
                        $pastaArquivos = '../img';
                    }

                    $sql = "INSERT INTO tbl_requisicao (nome, nascimento, email, telefone, celular, cep, rua, numero, complemento, bairro, cidade, estado, nomeDentista, cro, telefoneDentista, emailDentista, dataPreferencia, periodo, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    $stm = $this->pdo->prepare($sql);
                    $stm->bindValue(1, $nome);
                    $stm->bindValue(2, $nascimento);
                    $stm->bindValue(3, $email);
                    $stm->bindValue(4, $telefone);
                    $stm->bindValue(5, $celular);
                    $stm->bindValue(6, $cep);
                    $stm->bindValue(7, $rua);
                    $stm->bindValue(8, $numero);
                    $stm->bindValue(9, $complemento);
                    $stm->bindValue(10, $bairro);
                    $stm->bindValue(11, $cidade);
                    $stm->bindValue(12, $estado);
                    $stm->bindValue(13, $nomeDentista);
                    $stm->bindValue(14, $cro);
                    $stm->bindValue(15, $telefoneDentista);
                    $stm->bindValue(16, $emailDentista);
                    $stm->bindValue(17, $dataPreferencia);
                    $stm->bindValue(18, $periodo);
                    $stm->bindValue(19, $status);
                    // 	$stm->bindValue(20, $data_cadastro);

                    $stm->execute();
                    $idForm = $this->pdo->lastInsertId();
                    $i= count($_POST['especialidadeSelecionada']);
                    $especialidadeSelecionada = $_POST['especialidadeSelecionada'];
                    $complementoTexto = $_POST['complementoTexto'];
                    $tituloSelecionada = $_POST['tituloSelecionada'];

                    for ($cont = 0; $cont < count($especialidadeSelecionada); $cont++) {
                        $sql = "SELECT * FROM tbl_especialidades where id = ".$especialidadeSelecionada[$cont];
    					$stm = $this->pdo->prepare($sql);
    					$stm->execute();   
    					$rsDados = $stm->fetchAll(PDO::FETCH_OBJ);
                        
                        $catEspecialidades = $rsDados[0]->id_categoria;
            
                        $sql = "INSERT INTO tbl_requisicao_especialidades (id_form, id_especialidade, complemento, id_cat_especialidade) VALUES (?, ?, ?, ?)";

                        $stm = $this->pdo->prepare($sql);
                        $stm->bindValue(1, $idForm);
                        $stm->bindValue(2, $especialidadeSelecionada[$cont]);
                        $stm->bindValue(3, $complementoTexto[$especialidadeSelecionada[$cont]]);
                        $stm->bindValue(4, $catEspecialidades);

                        $stm->execute();
                    }

                    if ($redireciona == '') {
                        $redireciona = '.';
                    }

                    // Envio de formulário por email
                    // $destinatario      = 'lucas.hoogli@gmail.com';
                    $destinatario      = $infoSistema->email_recebimento;
                    $remetente         = $infoSistema->email_recebimento;
                    $assunto           = 'Requisição Online - Status :' . $status;
                    
                    // Montar corpo do email com dados vindos do Formulário e formatados
                    $corpo = "<br> Nome:" .  $nome .
                        "<br> Nascimento:" .  $nascimento .
                        "<br> E-Mail:" .  $email .
                        "<br> Telefone:" .  $telefone .
                        "<br> Celular:" .  $celular .
                        "<br> CEP:" .  $cep .
                        "<br> Rua:" .  $rua .
                        "<br> Número:" .  $numero .
                        "<br> Complemento:" .  $complemento .
                        "<br> Bairro:" .  $bairro .
                        "<br> Cidade:" .  $cidade .
                        "<br> Estado:" .  $estado .
                        "<br> Nome do Dentista:" .  $nomeDentista .
                        "<br> CRO:" .  $cro .
                        "<br> Telefone do Dentista:" .  $telefoneDentista .
                        "<br> Email do Dentista:" .  $emailDentista .
                        "<br> Data de Preferência:" .  $dataPreferencia .
                        "<br> Período:" . $periodo .
                        "<br> Procedimento <br>";
                        
                        // Criar lista de procedimentos selecionados, vindos dos campos marcados dentro do formulario
                        for ($cont = 0; $cont < count($especialidadeSelecionada); $cont++) {
                            $corpo .= "<br> Especialidadade:" .  $tituloSelecionada[$especialidadeSelecionada[$cont]] . '<br>';
                            $corpo .= "<br> Detalhe do Procedimento:" .  $complementoTexto[$especialidadeSelecionada[$cont]] . '<br>';
                        }
                    
                    // Montar cabecalho do Email
                    $headers  = "From: $remetente\n";
                    $headers .= "Reply-To: $de";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=utf-8\n";
                    
                    // Realizar o envio do email, caso ocorra um erro, retornar a mensagem
                    if (mail($destinatario, $assunto, $corpo, $headers, "-f$remetente")) {
                        echo "<script>window.location='form-requisicao.php';</script>";
                        exit;
                    } else {
                        return 'Erro ao mandar seu e-mail, por favor tente novamente mais tarde';
                    }
                } catch (PDOException $erro) {
                    echo $erro->getMessage();
                }
                
                echo "<script>window.location='form-requisicao.php';</script>";
                exit;
            }
        }

        function editarRequisicao($redireciona = 'requisicoes.php')
        {
            if (isset($_POST['acao']) && $_POST['acao'] == 'editarRequisicao') {

                $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
                $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

                try {

                    if (file_exists('Connection/conexao.php')) {
                        $pastaArquivos = 'img';
                    } else {
                        $pastaArquivos = '../img';
                    }

                    $sql = "UPDATE tbl_requisicao SET status=? WHERE id=?";
                    $stm = $this->pdo->prepare($sql);
                    $stm->bindValue(1, $status);
                    $stm->bindValue(2, $id);
                    $stm->execute();
                } catch (PDOException $erro) {
                    echo $erro->getMessage();
                }

                echo "	<script>
							window.location='{$redireciona}';
							</script>";
                exit;
            }
        }

        // Listar requisições
        function rsDadosRequisicoes($id = '', $orderBy = '', $limite = '', $id_categoria = '')
        {

            /// FILTROS
            $nCampos = 0;
            $sql = '';
            $sqlOrdem = '';
            $sqlLimite = '';
            if (!empty($id)) {
                $sql .= " and id = ?";
                $nCampos++;
                $campo[$nCampos] = $id;
            }
            if (!empty($id_categoria)) {
                $sql .= " and id_categoria = ?";
                $nCampos++;
                $campo[$nCampos] = $id_categoria;
            }

            /// ORDEM		
            if (!empty($orderBy)) {
                $sqlOrdem = " order by {$orderBy}";
            }

            if (!empty($limite)) {
                $sqlLimite = " limit 0,{$limite}";
            }

            try {
                $sql = "SELECT * FROM tbl_requisicao where 1=1 $sql $sqlOrdem $sqlLimite";
                $stm = $this->pdo->prepare($sql);

                for ($i = 1; $i <= $nCampos; $i++) {
                    $stm->bindValue($i, $campo[$i]);
                }

                $stm->execute();
                $rsDados = $stm->fetchAll(PDO::FETCH_OBJ);
                //print_r($rsDados);
                if ($id <> '' or $limite == 1) {
                    return ($rsDados[0]);
                } else {
                    return ($rsDados);
                }
            } catch (PDOException $erro) {
                echo $erro->getMessage();
            }
        }

        // Listar requisições x especialidades
        function rsRequisicoesEspecialidades($id = '', $orderBy = '', $limite = '', $id_form = '', $id_cat_especialidade = '')
        {

            /// FILTROS
            $nCampos = 0;
            $sql = '';
            $sqlOrdem = '';
            $sqlLimite = '';
            if (!empty($id)) {
                $sql .= " and id = ?";
                $nCampos++;
                $campo[$nCampos] = $id;
            }
            if (!empty($id_form)) {
                $sql .= " and id_form = ?";
                $nCampos++;
                $campo[$nCampos] = $id_form;
            }
            
            if (!empty($id_cat_especialidade)) {
                $sql .= " and id_cat_especialidade = ?";
                $nCampos++;
                $campo[$nCampos] = $id_cat_especialidade;
            }

            /// ORDEM		
            if (!empty($orderBy)) {
                $sqlOrdem = " order by {$orderBy}";
            }

            if (!empty($limite)) {
                $sqlLimite = " limit 0,{$limite}";
            }

            try {
                $sql = "SELECT aux.id_form, aux.id_especialidade, aux.complemento, esp.titulo as especialidade FROM tbl_requisicao_especialidades as aux INNER JOIN tbl_especialidades AS esp ON aux.id_especialidade = esp.id WHERE 1=1 $sql $sqlOrdem $sqlLimite";

                $stm = $this->pdo->prepare($sql);

                for ($i = 1; $i <= $nCampos; $i++) {
                    $stm->bindValue($i, $campo[$i]);
                }

                $stm->execute();
                $rsDados = $stm->fetchAll(PDO::FETCH_OBJ);
                //print_r($rsDados);
                if ($id <> '' or $limite == 1) {
                    return ($rsDados[0]);
                } else {
                    return ($rsDados);
                }
            } catch (PDOException $erro) {
                echo $erro->getMessage();
            }
        }

        function excluirRequisicoes()
        {
            if (isset($_GET['acao']) && $_GET['acao'] == 'excluirRequisicoes') {

                try {
                    $sql = "DELETE FROM tbl_requisicao WHERE id=? ";
                    $stm = $this->pdo->prepare($sql);
                    $stm->bindValue(1, $_GET['id']);
                    $stm->execute();
                } catch (PDOException $erro) {
                    echo $erro->getMessage();
                }

                echo "	<script>
								window.location='requisicoes.php';
								</script>";
                exit;
            }
        }
    }

    $EspecialidadesInstanciada = 'S';
}
