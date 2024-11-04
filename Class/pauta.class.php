<?php
@session_start();
$PautasInstanciada = '';
if (empty($PautasInstanciada)) {
    if (file_exists('Connection/conexao.php')) {
        require_once('Connection/con-pdo.php');
        require_once('Class/funcoes.php');
    } else {
        require_once('../Connection/con-pdo.php');
        require_once('../Class/funcoes.php');
    }

    class Pautas
    {

        private $pdo = null;

        private static $Pautas = null;

        private function __construct($conexao)
        {
            $this->pdo = $conexao;
        }

        public static function getInstance($conexao)
        {
            if (!isset(self::$Pautas)):
                self::$Pautas = new Pautas($conexao);
            endif;
            return self::$Pautas;
        }


        function rsDados($id = '', $representante1 = '', $representante2 = '', $orderBy = '', $limite = '')
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
            // if (!empty($representante1)) {
            //     $sql .= " and representante1 = ?";
            //     $nCampos++;
            //     $campo[$nCampos] = $representante1;
            // }

            // if (!empty($representante2)) {
            //     $sql .= " and representante2 = ?";
            //     $nCampos++;
            //     $campo[$nCampos] = $representante2;
            // }

            /// ORDEM		
            if (!empty($orderBy)) {
                $sqlOrdem = " order by {$orderBy}";
            }

            if (!empty($limite)) {
                $sqlLimite = " limit 0,{$limite}";
            }

            try {
                $sql = "SELECT * FROM tbl_pautas where 1=1 $sql $sqlOrdem $sqlLimite";
                $stm = $this->pdo->prepare($sql);

                for ($i = 1; $i <= $nCampos; $i++) {
                    $stm->bindValue($i, $campo[$i]);
                }

                $stm->execute();
                $rsDados = $stm->fetchAll(PDO::FETCH_OBJ);
                // print_r($rsDados);
                if ($id <> '' or $limite == 1) {
                    return ($rsDados[0]);
                } else {
                    return ($rsDados);
                }
            } catch (PDOException $erro) {
                echo $erro->getMessage();
            }
        }

        function add($redireciona = 'pautas')
        {
            if (isset($_POST['acao']) && $_POST['acao'] == 'addPauta') {
                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                $representante1 = filter_input(INPUT_POST, 'representante1', FILTER_VALIDATE_INT);
                $representante2 = filter_input(INPUT_POST, 'representante2', FILTER_VALIDATE_INT);
                $numero_sei = filter_input(INPUT_POST, 'numero_sei', FILTER_SANITIZE_STRING);
                $sei_link = filter_input(INPUT_POST, 'sei_link', FILTER_SANITIZE_STRING);
                $andamento = filter_input(INPUT_POST, 'andamento', FILTER_SANITIZE_STRING);
                $executar_ate = filter_input(INPUT_POST, 'executar_ate', FILTER_SANITIZE_STRING);
                $ultima_atualizacao = filter_input(INPUT_POST, 'ultima_atualizacao', FILTER_SANITIZE_STRING);
                $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
                $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);

                // Convertendo valores para os tipos corretos
                $representante1 = ($representante1 !== null) ? (int) $representante1 : null;
                $representante2 = ($representante2 !== null) ? (int) $representante2 : null;
                $valor = ($valor !== null && is_numeric($valor)) ? floatval($valor) : null;

                // Validando e formatando datas
                if ($executar_ate) {
                    $executar_ate = date('Y-m-d', strtotime($executar_ate));
                }
                if ($ultima_atualizacao) {
                    $ultima_atualizacao = date('Y-m-d', strtotime($ultima_atualizacao));
                }

                try {
                    $sql = "INSERT INTO tbl_pautas (nome, representante1, representante2, numero_sei, sei_link, andamento, tipo, valor, ultima_atualizacao) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stm = $this->pdo->prepare($sql);
                    $stm->bindValue(1, $nome);
                    $stm->bindValue(2, $representante1);
                    $stm->bindValue(3, $representante2);
                    $stm->bindValue(4, $numero_sei);
                    $stm->bindValue(5, $sei_link);
                    $stm->bindValue(6, $andamento);
                    $stm->bindValue(7, $tipo);
                    $stm->bindValue(8, $valor);
                    $stm->bindValue(9, $ultima_atualizacao);
                    $stm->execute();

                    // $idProcesso = $this->pdo->lastInsertId();

                    if ($redireciona == '') {
                        $redireciona = '.';
                    }

                    echo "<script>window.location='{$redireciona}';</script>";
                    exit;
                } catch (PDOException $erro) {
                    echo "Erro ao inserir pauta: " . $erro->getMessage();
                    // Aqui você pode tratar o erro de outra forma, como exibir uma mensagem na página
                }
            }
        }



        function editar($redireciona = 'pautas')
        {
            if (isset($_POST['acao']) && $_POST['acao'] == 'editaPauta') {
                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                $representante1 = filter_input(INPUT_POST, 'representante1', FILTER_VALIDATE_INT);
                $representante2 = filter_input(INPUT_POST, 'representante2', FILTER_VALIDATE_INT);
                $numero_sei = filter_input(INPUT_POST, 'numero_sei', FILTER_SANITIZE_STRING);
                $sei_link = filter_input(INPUT_POST, 'sei_link', FILTER_SANITIZE_STRING);
                $andamento = filter_input(INPUT_POST, 'andamento', FILTER_SANITIZE_STRING);
                $ultima_atualizacao = filter_input(INPUT_POST, 'ultima_atualizacao', FILTER_SANITIZE_STRING);
                $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
                $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
                $valor = ($valor === '' || !is_numeric($valor)) ? null : (float) $valor;
                $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
                $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

                // Validando e formatando datas
                if ($ultima_atualizacao) {
                    $ultima_atualizacao = date('Y-m-d', strtotime($ultima_atualizacao));
                }

                try {
                    $sql = "UPDATE tbl_pautas SET nome=?, representante1=?, representante2=?, numero_sei=?, sei_link=?, andamento=?, tipo=?, valor=?, ultima_atualizacao=? WHERE id=?";
                    $stm = $this->pdo->prepare($sql);
                    $stm->bindValue(1, $nome);
                    $stm->bindValue(2, $representante1);
                    $stm->bindValue(3, $representante2);
                    $stm->bindValue(4, $numero_sei);
                    $stm->bindValue(5, $sei_link);
                    $stm->bindValue(6, $andamento);
                    $stm->bindValue(7, $tipo);
                    $stm->bindValue(8, $valor);
                    $stm->bindValue(9, $ultima_atualizacao);
                    $stm->bindValue(10, $id);
                    $stm->execute();

                    if ($redireciona == '') {
                        $redireciona = '.';
                    }

                    echo "<script>window.location='{$redireciona}';</script>";
                    exit;
                } catch (PDOException $erro) {
                    echo "Erro ao editar pauta: " . $erro->getMessage();
                    // Aqui você pode tratar o erro de outra forma, como exibir uma mensagem na página
                }
            }
        }


        function excluir()
        {
            if (isset($_GET['acao']) && $_GET['acao'] == 'excluirPautas') {

                try {
                    $sql = "DELETE FROM tbl_pautas WHERE id=? ";
                    $stm = $this->pdo->prepare($sql);
                    $stm->bindValue(1, $_GET['id']);
                    $stm->execute();
                } catch (PDOException $erro) {
                    echo $erro->getMessage();
                }
                echo "	<script>
								window.location='pautas.php';
								</script>";
                exit;
            }
        }

        function Representante($id = '')
        {
            $sql = '';
            /// FILTROS
            $nCampos = 0;

            if (!empty($id)) {
                $sql .= " and id = ?";
                $nCampos++;
                $campo[$nCampos] = $id;
            }
            try {
                $sql = "SELECT * FROM tbl_representante where 1=1 $sql";
                $stm = $this->pdo->prepare($sql);

                for ($i = 1; $i <= $nCampos; $i++) {
                    $stm->bindValue($i, $campo[$i]);
                }

                $stm->execute();
                $rsDados = $stm->fetchAll(PDO::FETCH_OBJ);
                // var_dump($rsDados);die;
                if ($id <> '') {
                    return ($rsDados[0]);
                } else {
                    return ($rsDados);
                }
            } catch (PDOException $erro) {
                echo $erro->getMessage();
            }
        }

        function addRepresentante($redireciona = 'pautas')
        {
            if (isset($_POST['acao']) && $_POST['acao'] == 'addRepresentantes') {
                $representante = filter_input(INPUT_POST, 'representante', FILTER_SANITIZE_STRING);
                $id_representante = filter_input(INPUT_POST, 'id_representante', FILTER_VALIDATE_INT);
                try {
                    $sql = "INSERT INTO tbl_representante (representante, id_representante) VALUES (?, ?)";
                    $stm = $this->pdo->prepare($sql);
                    $stm->bindValue(1, $representante);
                    $stm->bindValue(2, $id_representante);
                    $stm->execute();
                    $idRepresentante = $this->pdo->lastInsertId();

                    if ($redireciona == '') {
                        $redireciona = 'representante';
                    }

                    echo "<script>
						window.location='{$redireciona}';
					  </script>";
                    exit;
                } catch (PDOException $erro) {
                    echo $erro->getMessage();
                    exit;
                }
            }
        }

        function editarRepresentante()
        {
            if (isset($_POST['acao']) && $_POST['acao'] == 'editaRepresentante') {
                $representante = filter_input(INPUT_POST, 'representante', FILTER_SANITIZE_STRING);
                $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
                try {
                    $sql = "UPDATE tbl_representante SET representante=? WHERE id=?";
                    $stm = $this->pdo->prepare($sql);
                    $stm->bindValue(1, $representante);
                    $stm->bindValue(2, $id);
                    $stm->execute();

                    echo "<script>
						window.location='representantes';
					  </script>";
                    exit;
                } catch (PDOException $erro) {
                    echo $erro->getMessage();
                    // exit;
                }
            }
        }

        function excluirRepresentante()
        {
            if (isset($_GET['acao']) && $_GET['acao'] == 'excluirRepresentante') {
                try {
                    $sql = "DELETE FROM tbl_representante WHERE id=? ";
                    $stm = $this->pdo->prepare($sql);
                    $stm->bindValue(1, $_GET['id']);
                    $stm->execute();
                } catch (PDOException $erro) {
                    echo $erro->getMessage();
                }
                echo "<script>
					window.location='representantes';
				  </script>";
                exit;
            }
        }
    }


    $PautasInstanciada = 'S';
}
