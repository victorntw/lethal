<?php
$MenusInstanciada = '';
if(empty($MenusInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('Class/funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../Class/funcoes.php');
	}
	
	class Menus {

		private $pdo = null;  

		private static $Menus = null; 
	
		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
		
		public static function getInstance($conexao){   
			if (!isset(self::$Menus)):    
				self::$Menus = new Menus($conexao);   
			endif;
			return self::$Menus;    
		}
				
		function rsDados() {
			try{   
				$sql = "SELECT * FROM tbl_menu";
				$stm = $this->pdo->prepare($sql);
				$stm->execute();   
				$rsDados = $stm->fetchAll(PDO::FETCH_OBJ);				
				$this->home = $rsDados[0]->home;
				$this->sobre = $rsDados[0]->sobre;
				$this->servicos = $rsDados[0]->servicos;
				$this->blog = $rsDados[0]->blog;
				$this->contato = $rsDados[0]->contato;
			} catch(PDOException $erro){   
				echo $erro->getLine(); 
			}
			return($this);
		}


	function editar() {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editaMenu') {
				$home = filter_input(INPUT_POST, 'home');
				$sobre = filter_input(INPUT_POST, 'sobre');
				$servicos = filter_input(INPUT_POST, 'servicos');
				$blog = filter_input(INPUT_POST, 'blog');
				$contato = filter_input(INPUT_POST, 'contato');
				
				try{   
					$sql = "UPDATE tbl_menu SET home=?, sobre=?, servicos=?, blog=?, contato=? WHERE id=? ";
					$stm = $this->pdo->prepare($sql);  
					$stm->bindValue(1, $home);
					$stm->bindValue(2, $sobre);
					$stm->bindValue(3, $servicos);
					$stm->bindValue(4, $blog);
					$stm->bindValue(5, $contato);
					$stm->bindValue(6, 1);
					$stm->execute(); 
					
					//exit;
					
					echo "	<script>
							alert('Modificado com sucesso!');
							window.location='menus.php';
							</script>";
							exit;
				} catch(PDOException $erro){   
					echo $erro->getMessage();
				}
			}
		}
	}
	
	$MenusInstanciada = 'S';
}