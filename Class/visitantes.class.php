<?php
@ session_start();
$VisitantesInstanciada = '';
if(empty($VisitantesInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('Class/funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../Class/funcoes.php');
	}
	
	class Visitantes {
		
		private $pdo = null;  

		private static $Visitantes = null; 

		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
	  
		public static function getInstance($conexao){   
			if (!isset(self::$Visitantes)):    
				self::$Visitantes = new Visitantes($conexao);   
			endif;
			return self::$Visitantes;    
		}
		
	
		function rsDados($id='', $idGenero='', $orderBy='', $limite='') {
			
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
			if(!empty($idGenero)) {
				$sql .= " and id_genero = ?"; 
				$nCampos++;
				$campo[$nCampos] = $idGenero;
			}
			
			/// ORDEM		
			if(!empty($orderBy)) {
				$sqlOrdem = " order by {$orderBy}";
			}
			
			if(!empty($limite)) {
				$sqlLimite = " limit 0,{$limite}";
			}
			
			try{   
				$sql = "SELECT * FROM tbl_visitantes where 1=1 $sql $sqlOrdem $sqlLimite";
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

		function add($redireciona='') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'addVisitante') {
				$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
				$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
				$municipio = filter_input(INPUT_POST, 'municipio', FILTER_SANITIZE_STRING);
				$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
				$cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_STRING);
				$dtn = filter_input(INPUT_POST, 'dtn', FILTER_SANITIZE_STRING);
				$id_genero = filter_input(INPUT_POST, 'id_genero', FILTER_SANITIZE_STRING);
				$pauta = filter_input(INPUT_POST, 'pauta', FILTER_SANITIZE_STRING);
				$pauta_status = filter_input(INPUT_POST, 'pauta_status', FILTER_SANITIZE_STRING);
				
				try{
					if(file_exists('Connection/conexao.php')) {
						$pastaArquivos = 'img';
					} else {
						$pastaArquivos = '../img';
					}
					$sql = "INSERT INTO tbl_visitantes (nome, email, municipio, telefone, cargo, dtn, id_genero, pauta, pauta_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";   
					$stm = $this->pdo->prepare($sql);
					$stm->bindValue(1, $nome);
					$stm->bindValue(2, $email);
					$stm->bindValue(3, $municipio);
					$stm->bindValue(4, $telefone);  
					$stm->bindValue(5, $cargo);
					$stm->bindValue(6, $dtn);
					$stm->bindValue(7, $id_genero);
					$stm->bindValue(8, $pauta);
					$stm->bindValue(9, $pauta_status);
					$stm->execute();
					$idVisitante = $this->pdo->lastInsertId();
					if($redireciona == '') {
						$redireciona = '.';
					}
					
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
					// exit;
				}
				echo "	<script>
							window.location='visitantes';
							</script>";
							exit;
			}
		}
		
		function editar($redireciona='visitantes') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editaVisitante') {
				$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
				$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
				$municipio = filter_input(INPUT_POST, 'municipio', FILTER_SANITIZE_STRING);
				$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
				$cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_STRING);
				$dtn = filter_input(INPUT_POST, 'dtn', FILTER_SANITIZE_STRING);
				$id_genero = filter_input(INPUT_POST, 'id_genero', FILTER_SANITIZE_STRING);
				$pauta = filter_input(INPUT_POST, 'pauta', FILTER_SANITIZE_STRING);
				$pauta_status = filter_input(INPUT_POST, 'pauta_status', FILTER_VALIDATE_INT);
				$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
				try { 
					if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
					$sql = "UPDATE tbl_visitantes SET nome=?, email=?, municipio=?, telefone=?, cargo=?, dtn=?, id_genero=?, pauta=?, pauta_status=? WHERE id=?";   
					$stm = $this->pdo->prepare($sql);
					$stm->bindValue(1, $nome);
					$stm->bindValue(2, $email);
					$stm->bindValue(3, $municipio);
					$stm->bindValue(4, $telefone);
					$stm->bindValue(5, $cargo);
					$stm->bindValue(6, $dtn);
					$stm->bindValue(7, $id_genero);
					$stm->bindValue(8, $pauta);
					$stm->bindValue(9, $pauta_status);
					$stm->bindValue(10, $id);
					$stm->execute();

				} catch(PDOException $erro){
					echo $erro->getMessage(); 
					// exit;
				}
				echo "	<script>
							window.location='{$redireciona}';
							</script>";
							exit;
			}
		}
		
		function excluir() {
			if(isset($_GET['acao']) && $_GET['acao'] == 'excluirVisitante') {
				
				try{   
					$sql = "DELETE FROM tbl_visitantes WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['id']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}
				echo "	<script>
								window.location='visitantes.php';
								</script>";
								exit;

			}
		}

		function Pauta($id='') {
			$sql = '';
			/// FILTROS
			$nCampos = 0;
			
			if(!empty($id)) {
				$sql .= " and id = ?"; 
				$nCampos++;
				$campo[$nCampos] = $id;
			}
			try{   
				$sql = "SELECT * FROM tbl_pautas where 1=1 $sql";
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

		function Genero($id='') {
			$sql = '';
			/// FILTROS
			$nCampos = 0;
			
			if(!empty($id)) {
				$sql .= " and id = ?"; 
				$nCampos++;
				$campo[$nCampos] = $id;
			}
			try{   
				$sql = "SELECT * FROM tbl_genero where 1=1 $sql";
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

	function addGenero($redireciona='') {
		if(isset($_POST['acao']) && $_POST['acao'] == 'addGenero') {
			$genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
			try{
				$sql = "INSERT INTO tbl_genero (genero) VALUES (?)";   
				$stm = $this->pdo->prepare($sql);   
				$stm->bindValue(1, $genero);   
				$stm->execute(); 
				$idGenero = $this->pdo->lastInsertId();
				
				if($redireciona == '') {
					$redireciona = 'genero';
				}
				
				echo "<script>
						window.location='{$redireciona}';
					  </script>";
				exit;
			} catch(PDOException $erro){
				echo $erro->getMessage(); 
			}
		}
	}
	
	function editarGenero() {
		if(isset($_POST['acao']) && $_POST['acao'] == 'editaGenero') {
			$genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
			$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
			try{   
				$sql = "UPDATE tbl_genero SET genero=? WHERE id=?";   
				$stm = $this->pdo->prepare($sql);   
				$stm->bindValue(1, $genero);   
				$stm->bindValue(2, $id);   
				$stm->execute();  
				
				echo "<script>
						window.location='genero';
					  </script>";
				exit;
			} catch(PDOException $erro){   
				echo $erro->getMessage();
			}
		}
	}
	
	function excluirGenero() {
		if(isset($_GET['acao']) && $_GET['acao'] == 'excluirGenero') {
			try{   
				$sql = "DELETE FROM tbl_genero WHERE id=? ";   
				$stm = $this->pdo->prepare($sql);   
				$stm->bindValue(1, $_GET['id']);   
				$stm->execute();
			} catch(PDOException $erro){
				echo $erro->getMessage(); 
			}
			echo "<script>
					window.location='genero';
				  </script>";
			exit;
		}
	}
}
	
	
	$VisitantesInstanciada = 'S';
}
?>
