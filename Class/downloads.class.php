<?php
@ session_start();
$DownloadsInstanciada = '';
if(empty($DownloadsInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('Class/funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../Class/funcoes.php');
	}
	
	class Downloads {
		
		private $pdo = null;  

		private static $Downloads = null; 

		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
	  
		public static function getInstance($conexao){   
			if (!isset(self::$Downloads)):    
				self::$Downloads = new Downloads($conexao);   
			endif;
			return self::$Downloads;    
		}
		
	
		function rsDados($id='', $orderBy='', $limite='', $idServico='') {
			
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

			if(!empty($idServico)) {
				$sql .= " and id_servico = ?"; 
				$nCampos++;
				$campo[$nCampos] = $idServico;
			}
			
			/// ORDEM		
			if(!empty($orderBy)) {
				$sqlOrdem = " order by {$orderBy}";
			}
			
			if(!empty($limite)) {
				$sqlLimite = " limit 0,{$limite}";
			}
			
			try{   
				$sql = "SELECT * FROM tbl_downloads where 1=1 $sql $sqlOrdem $sqlLimite";
				$stm = $this->pdo->prepare($sql);
				
				for($i=1; $i<=$nCampos; $i++) {
					$stm->bindValue($i, $campo[$i]);
				}
				
				$stm->execute();
				$rsDados = $stm->fetchAll(PDO::FETCH_OBJ);
				//print_r($rsDados);
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
			if(isset($_POST['acao']) && $_POST['acao'] == 'addDownload') {

				
				$nome = filter_input(INPUT_POST, 'nome');
				$link = $_POST['link'];
					try{

						if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}

						$sql = "INSERT INTO tbl_downloads (nome, link, foto) VALUES (?, ?, ?)";   
						$stm = $this->pdo->prepare($sql);   
						$stm->bindValue(1, $nome);   
						$stm->bindValue(2, $link);
						$stm->bindValue(3, upload('foto', $pastaArquivos, 'N')); 
						$stm->execute(); 
						$idBanner = $this->pdo->lastInsertId();
						
						if($redireciona == '') {
							$redireciona = '.';
						}
						
						
					} catch(PDOException $erro){
						echo $erro->getMessage(); 
					}
					echo "	<script>
								window.location='downloads.php';
								</script>";
								exit;
				
			}
		}
		
		function editar($redireciona='downloads.php') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editaDownload') {

		    	$nome = filter_input(INPUT_POST, 'nome');
				$link = $_POST['link'];
				$id = filter_input(INPUT_POST, 'id');
				
				try { 

					if(file_exists('Connection/conexao.php')) {
						$pastaArquivos = 'img';
					} else {
						$pastaArquivos = '../img';
					}

					$sql = "UPDATE tbl_downloads SET nome=?, link=?, foto=? WHERE id=?";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $nome);   
					$stm->bindValue(2, $link);
					$stm->bindValue(3, upload('foto', $pastaArquivos, 'N')); 
					$stm->bindValue(4, $id);
					$stm->execute(); 
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}
				echo "	<script>
							window.location='{$redireciona}';
							</script>";
							exit;
			}
		}
		function excluir() {
			if(isset($_GET['acao']) && $_GET['acao'] == 'excluirDownload') {
				
				try{   
					$sql = "DELETE FROM tbl_downloads WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['id']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}
				echo "	<script>
								window.location='downloads.php';
								</script>";
								exit;

			}
		}
	}
	
	$DownloadsInstanciada = 'S';
}