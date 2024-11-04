<?php
@ session_start();
$AgendasInstanciada = '';
if(empty($AgendasInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('Class/funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../Class/funcoes.php');
	}
	
	class Agendas {
		
		private $pdo = null;  

		private static $Agendas = null; 

		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
	  
		public static function getInstance($conexao){   
			if (!isset(self::$Agendas)):    
				self::$Agendas = new Agendas($conexao);   
			endif;
			return self::$Agendas;    
		}
		
	
		function rsDados($id='', $area='', $orderBy='', $limite='') {
			
			/// FILTROS
			$nCampos = 0;
			$sql = '';
			$sqlOrdem = ''; 
			$sqlLimite = '';
			if(!empty($id)) {
				$sql .= " and id = ?"; 
				$nCampos++;
				$campo[$nCampos] = $id;
			}
			if(!empty($area)) {
				$sql .= " and area = ?"; 
				$nCampos++;
				$campo[$nCampos] = $area;
			}

			
			/// ORDEM		
			if(!empty($orderBy)) {
				$sqlOrdem = " order by {$orderBy}";
			}
			
			if(!empty($limite)) {
				$sqlLimite = " limit 0,{$limite}";
			}
			
			try{   
				$sql = "SELECT * FROM tbl_agenda where 1=1 $sql $sqlOrdem $sqlLimite";
				$stm = $this->pdo->prepare($sql);
				
				for($i=1; $i<=$nCampos; $i++) {
					$stm->bindValue($i, $campo[$i]);
				}
				
				$stm->execute();
				$rsDados = $stm->fetchAll(PDO::FETCH_OBJ);
				// print_r($rsDados);
				if($id <> '' or $limite == 1) {
					return($rsDados[0]);
				} else {
					return($rsDados);
				}
			} catch(PDOException $erro){   
				echo $erro->getMessage(); 
			}
		}

		function add($redireciona = 'agenda') {
            if (isset($_POST['acao']) && $_POST['acao'] == 'addAgenda') {
                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
                $local = filter_input(INPUT_POST, 'local', FILTER_SANITIZE_STRING);
                $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
                $area = filter_input(INPUT_POST, 'area', FILTER_VALIDATE_INT);
                $orgao = filter_input(INPUT_POST, 'orgao', FILTER_SANITIZE_STRING);
                $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        
                // Convertendo valores para os tipos corretos
                $area = ($area !== null) ? (int) $area : null;
                // Validando e formatando datas
                if ($data) {
                    $data = date('Y-m-d', strtotime($data));
                }
        
                try {
                    $sql = "INSERT INTO tbl_agenda (nome, assunto, local, data, area, orgao, descricao) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)";   
                    $stm = $this->pdo->prepare($sql);
                    $stm->bindValue(1, $nome);
                    $stm->bindValue(2, $assunto);
                    $stm->bindValue(3, $local);
                    $stm->bindValue(4, $data);
                    $stm->bindValue(5, $area);
                    $stm->bindValue(6, $orgao);
                    $stm->bindValue(7, $descricao);
                    $stm->execute();
        
                    // $idAgenda = $this->pdo->lastInsertId();
        
                    if ($redireciona == '') {
                        $redireciona = '.';
                    }
        
                    echo "<script>window.location='{$redireciona}';</script>";
                    exit;
                } catch (PDOException $erro) {
                    echo "Erro ao inserir projeto: " . $erro->getMessage();
                    // Aqui você pode tratar o erro de outra forma, como exibir uma mensagem na página
                }
            }
        }
        
		
		
		function editar($redireciona = 'agenda') {
            if (isset($_POST['acao']) && $_POST['acao'] == 'editaAgenda') {
                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
                $local = filter_input(INPUT_POST, 'local', FILTER_SANITIZE_STRING);
                $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
                $area = filter_input(INPUT_POST, 'area', FILTER_VALIDATE_INT);
                $orgao = filter_input(INPUT_POST, 'orgao', FILTER_SANITIZE_STRING);
                $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
                $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        
                // Validando e formatando datas
                if ($data) {
                    $data = date('Y-m-d', strtotime($data));
                }
        
                try {
                    $sql = "UPDATE tbl_agenda SET nome=?, assunto=?, local=?, data=?, area=?, orgao=?, descricao=? WHERE id=?";   
                    $stm = $this->pdo->prepare($sql);
                    $stm->bindValue(1, $nome);
                    $stm->bindValue(2, $assunto);
                    $stm->bindValue(3, $local);
                    $stm->bindValue(4, $data);
                    $stm->bindValue(5, $area);
                    $stm->bindValue(6, $orgao);
                    $stm->bindValue(7, $descricao);
                    $stm->bindValue(8, $id);
                    $stm->execute();
        
                    if ($redireciona == '') {
                        $redireciona = '.';
                    }
        
                    echo "<script>window.location='{$redireciona}';</script>";
                    exit;
                } catch (PDOException $erro) {
                    echo "Erro ao editar projeto: " . $erro->getMessage();
                    // Aqui você pode tratar o erro de outra forma, como exibir uma mensagem na página
                }
            }
        }
        
		
		function excluir() {
			if(isset($_GET['acao']) && $_GET['acao'] == 'excluirAgenda') {
				
				try{   
					$sql = "DELETE FROM tbl_agenda WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['id']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}
				echo "	<script>
								window.location='agenda';
								</script>";
								exit;

			}
		}

		///ANCHOR - SESSAO - ÁREA

		function Area($id='') {
			$sql = '';
			/// FILTROS
			$nCampos = 0;
			
			if(!empty($id)) {
				$sql .= " and id = ?"; 
				$nCampos++;
				$campo[$nCampos] = $id;
			}
			try{   
				$sql = "SELECT * FROM tbl_areas where 1=1 $sql";
				$stm = $this->pdo->prepare($sql);
				
				for($i=1; $i<=$nCampos; $i++) {
					$stm->bindValue($i, $campo[$i]);
				}
				
				$stm->execute();
				$rsDados = $stm->fetchAll(PDO::FETCH_OBJ);
				// var_dump($rsDados);die;
				if($id <> '') {
					return($rsDados[0]);
				} else {
					return($rsDados);
				}
			} catch(PDOException $erro){   
				echo $erro->getMessage(); 
			}
		}

	function addArea($redireciona='areas') {
		if(isset($_POST['acao']) && $_POST['acao'] == 'addArea') {
			$area = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
			try{
				$sql = "INSERT INTO tbl_areas (nome) VALUES (?)";   
				$stm = $this->pdo->prepare($sql);   
				$stm->bindValue(1, $area);
				$stm->execute(); 
				$idArea = $this->pdo->lastInsertId();
				
				if($redireciona == '') {
					$redireciona = 'area';
				}
				
				echo "<script>
						window.location='{$redireciona}';
					  </script>";
				exit;
			} catch(PDOException $erro){
				echo $erro->getMessage(); 
				exit;
			}
		}
	}
	
	function editarArea() {
		if(isset($_POST['acao']) && $_POST['acao'] == 'editaArea') {
			$area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_STRING);
			$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
			try{   
				$sql = "UPDATE tbl_areas SET nome=? WHERE id=?";   
				$stm = $this->pdo->prepare($sql);   
				$stm->bindValue(1, $area);   
				$stm->bindValue(2, $id);   
				$stm->execute();  
				
				echo "<script>
						window.location='areas';
					  </script>";
				exit;
			} catch(PDOException $erro){   
				echo $erro->getMessage();
				// exit;
			}
		}
	}
	
	function excluirArea() {
		if(isset($_GET['acao']) && $_GET['acao'] == 'excluirArea') {
			try{   
				$sql = "DELETE FROM tbl_areas WHERE id=? ";   
				$stm = $this->pdo->prepare($sql);   
				$stm->bindValue(1, $_GET['id']);   
				$stm->execute();
			} catch(PDOException $erro){
				echo $erro->getMessage(); 
			}
			echo "<script>
					window.location='areas';
				  </script>";
			exit;
		}
	}
}
	
	
	$AgendasInstanciada = 'S';
}
?>
