<?php
@ session_start();
$DoutoresInstanciada = '';
if(empty($DoutoresInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('Class/funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../Class/funcoes.php');
	}
	
	class Doutores {
		
		private $pdo = null;  

		private static $Doutores = null; 

		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
	  
		public static function getInstance($conexao){   
			if (!isset(self::$Doutores)):    
				self::$Doutores = new Doutores($conexao);   
			endif;
			return self::$Doutores;    
		}
		
	
		function rsDados($id='', $orderBy='', $limite='', $veioDeOnde='', $idDiferente='', $url_amigavel='', $pertence='', $hierarquia='') {
			
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
			if(!empty($idDiferente)) {
				$sql .= " and id != ?"; 
				$nCampos++;
				$campo[$nCampos] = $idDiferente;
			}
			if(!empty($veioDeOnde)) {
				$sql .= " and veio_de_onde = ?"; 
				$nCampos++;
				$campo[$nCampos] = $veioDeOnde;
			}

			if(!empty($url_amigavel)) {
				$sql .= " and url_amigavel = ?"; 
				$nCampos++;
				$campo[$nCampos] = $url_amigavel;
			}

			if(!empty($pertence)) {
				$sql .= " and pertence_ao = ?"; 
				$nCampos++;
				$campo[$nCampos] = $pertence;
			}
			if(!empty($hierarquia)) {
				$sql .= " and id_hierarquia = ?"; 
				$nCampos++;
				$campo[$nCampos] = $hierarquia;
			}

			/// ORDEM		
			if(!empty($orderBy)) {
				$sqlOrdem = " order by {$orderBy}";
			}
			
			if(!empty($limite)) {
				$sqlLimite = " limit 0,{$limite}";
			}
			
			try{   
				$sql = "SELECT * FROM tbl_doutores where 1=1 $sql $sqlOrdem $sqlLimite";
				$stm = $this->pdo->prepare($sql);
				
				for($i=1; $i<=$nCampos; $i++) {
					$stm->bindValue($i, $campo[$i]);
				}
				
				$stm->execute();
				$rsDados = $stm->fetchAll(PDO::FETCH_OBJ);
				//print_r($rsDados);
				if($id <> '' or $limite == 1 or $url_amigavel <> '') {
					return($rsDados[0]);
				} else {
					return($rsDados);
				}
			} catch(PDOException $erro){   
				echo $erro->getMessage(); 
			}
		}

		function add($redireciona='') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'addDoutor') {

				
				$nome = filter_input(INPUT_POST, 'nome');
				$especialidade = filter_input(INPUT_POST, 'especialidade');
				//$curriculo = filter_input(INPUT_POST, 'curriculo');
				$curriculo = $_POST['curriculo'];
				$sexo = filter_input(INPUT_POST, 'sexo');
				$meta_title = filter_input(INPUT_POST, 'meta_title');
				$meta_keywords = filter_input(INPUT_POST, 'meta_keywords');
				$meta_description = filter_input(INPUT_POST, 'meta_description');
				if(isset($_POST['graduacao']) && !empty($_POST['graduacao'])){
					$graduacao = $_POST['graduacao'];
				}else{
					$graduacao = '';
				}
				// $graduacao = filter_input(INPUT_POST, 'graduacao');
				$linguagem = filter_input(INPUT_POST, 'linguagem');
				$dias_trabalho = filter_input(INPUT_POST, 'dias_trabalho');
				$telefone = filter_input(INPUT_POST, 'telefone');
				$email = filter_input(INPUT_POST, 'email');
				$breve = filter_input(INPUT_POST, 'breve');
				$instagram = filter_input(INPUT_POST, 'instagram');
				$facebook = filter_input(INPUT_POST, 'facebook');
				$linkedin = filter_input(INPUT_POST, 'linkedin');
				$twitter = filter_input(INPUT_POST, 'twitter');
				$pertence_ao = filter_input(INPUT_POST, 'pertence_ao');
				$id_categoria = filter_input(INPUT_POST, 'id_categoria');
				$cargo = filter_input(INPUT_POST, 'cargo');
				$urlAmigavel = gerarTituloSEO($nome);
				$ordem = $_POST['ordem'];
				$id_hierarquia = $_POST['id_hierarquia'];

				$maximo = 50000;
                // Verificação
                if($_FILES["foto"]["size"] > $maximo) {
                    echo "Erro! O arquivo enviado por você ultrapassa o ";
                    $valorKb = $maximo / 1000;
                    $tamanhoFoto = $_FILES["foto"]["size"] /1000;
                    echo "<script>
                    alert('limite máximo de " . $valorKb . " KB! Envie outro arquivo. Sua imagem tem ".$tamanhoFoto." KB');
                    history.back();
                    </script>";
					exit;
                }
				
					try{

						if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
						
						$sql = "INSERT INTO tbl_doutores (foto, nome, especialidade, curriculo, sexo, meta_title, meta_keywords, meta_description, graduacao, linguagem, dias_trabalho, telefone, email, url_amigavel, breve, instagram, facebook, linkedin, twitter, pertence_ao, id_categoria, cargo, ordem, id_hierarquia) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";   
						$stm = $this->pdo->prepare($sql);   
						$stm->bindValue(1, upload('foto', $pastaArquivos, 'N'));   
						$stm->bindValue(2, $nome);   
						$stm->bindValue(3, $especialidade);
						$stm->bindValue(4, $curriculo);
						$stm->bindValue(5, $sexo);
						$stm->bindValue(6, $meta_title);
						$stm->bindValue(7, $meta_keywords);
						$stm->bindValue(8, $meta_description);
						$stm->bindValue(9, $graduacao);
						$stm->bindValue(10, $linguagem);
						$stm->bindValue(11, $dias_trabalho); 
						$stm->bindValue(12, $telefone); 
						$stm->bindValue(13, $email);
						$stm->bindValue(14, $urlAmigavel);
						$stm->bindValue(15, $breve);
						$stm->bindValue(16, $instagram);
						$stm->bindValue(17, $facebook);
						$stm->bindValue(18, $linkedin);
						$stm->bindValue(19, $twitter);  
						$stm->bindValue(20, $pertence_ao);
						$stm->bindValue(21, $id_categoria); 
						$stm->bindValue(22, $cargo);
						$stm->bindValue(23, $ordem);
						$stm->bindValue(24, $id_hierarquia);
						$stm->execute(); 
						$idBanner = $this->pdo->lastInsertId();
						
						// if($redireciona == '') {
						// 	$redireciona = '.';
						// }
						
						
					} catch(PDOException $erro){
						echo $erro->getMessage(); 
					}
					echo "	<script>
								window.location='especialistas.php';
								</script>";
								exit;
				
			}
		}
		
		function editar() {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editaDoutor') {

				$nome = filter_input(INPUT_POST, 'nome');
				$especialidade = filter_input(INPUT_POST, 'especialidade');
				//$curriculo = filter_input(INPUT_POST, 'curriculo');
				$curriculo = $_POST['curriculo'];
				$sexo = filter_input(INPUT_POST, 'sexo');
				$meta_title = filter_input(INPUT_POST, 'meta_title');
				$meta_keywords = filter_input(INPUT_POST, 'meta_keywords');
				$meta_description = filter_input(INPUT_POST, 'meta_description');
				if(isset($_POST['graduacao']) && !empty($_POST['graduacao'])){
					$graduacao = $_POST['graduacao'];
				}else{
					$graduacao = '';
				}
				$linguagem = filter_input(INPUT_POST, 'linguagem');
				$dias_trabalho = filter_input(INPUT_POST, 'dias_trabalho');
				$telefone = filter_input(INPUT_POST, 'telefone');
				$email = filter_input(INPUT_POST, 'email');
				$id = filter_input(INPUT_POST, 'id');
				$breve = filter_input(INPUT_POST, 'breve');
				$instagram = filter_input(INPUT_POST, 'instagram');
				$facebook = filter_input(INPUT_POST, 'facebook');
				$linkedin = filter_input(INPUT_POST, 'linkedin');
				$twitter = filter_input(INPUT_POST, 'twitter');
				$pertence_ao = filter_input(INPUT_POST, 'pertence_ao');
				$id_categoria = filter_input(INPUT_POST, 'id_categoria');
				$cargo = filter_input(INPUT_POST, 'cargo');
				$urlAmigavel = gerarTituloSEO($nome);
				$ordem = $_POST['ordem'];
				$id_hierarquia = $_POST['id_hierarquia'];
				$maximo = 50000;
                // Verificação
                if($_FILES["foto"]["size"] > $maximo) {
                    echo "Erro! O arquivo enviado por você ultrapassa o ";
                    $valorKb = $maximo / 1000;
                    $tamanhoFoto = $_FILES["foto"]["size"] /1000;
                    echo "<script>
                    alert('limite máximo de " . $valorKb . " KB! Envie outro arquivo. Sua imagem tem ".$tamanhoFoto." KB');
                    history.back();
                    </script>";
					exit;
                }
				
				try { 

					if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
				
					$sql = "UPDATE tbl_doutores SET foto=?, nome=?, especialidade=?, curriculo=?, sexo=?, meta_title=?, meta_keywords=?, meta_description=?, graduacao=?, linguagem=?, dias_trabalho=?, telefone=?, email=?, url_amigavel=?, breve=?, instagram=?, facebook=?, linkedin=?, twitter=?, pertence_ao=?, id_categoria=?, cargo=?, ordem=?, id_hierarquia=? WHERE id=?";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, upload('foto', $pastaArquivos, 'N'));   
					$stm->bindValue(2, $nome);   
					$stm->bindValue(3, $especialidade);   
					$stm->bindValue(4, $curriculo);
					$stm->bindValue(5, $sexo);
					$stm->bindValue(6, $meta_title);
					$stm->bindValue(7, $meta_keywords);
					$stm->bindValue(8, $meta_description);
					$stm->bindValue(9, $graduacao);
					$stm->bindValue(10, $linguagem);
					$stm->bindValue(11, $dias_trabalho);
					$stm->bindValue(12, $telefone);   
					$stm->bindValue(13, $email);   
					$stm->bindValue(14, $urlAmigavel);
					$stm->bindValue(15, $breve);
					$stm->bindValue(16, $instagram);
					$stm->bindValue(17, $facebook);
					$stm->bindValue(18, $linkedin);
					$stm->bindValue(19, $twitter);
					$stm->bindValue(20, $pertence_ao);    
					$stm->bindValue(21, $id_categoria);
					$stm->bindValue(22, $cargo);
					$stm->bindValue(23, $ordem);
					$stm->bindValue(24, $id_hierarquia);
					$stm->bindValue(25, $id);   
					$stm->execute(); 
										
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}

				echo "	<script>
							window.location='especialistas.php';
						</script>";
						exit;
			}
		}
		
		function excluir() {
			if(isset($_GET['acao']) && $_GET['acao'] == 'excluirDoutor') {
				
				try{   
					$sql = "DELETE FROM tbl_doutores WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['id']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}
				$pertence_ao = $_GET['pertence'];
				echo "	<script>
							window.location='especialistas.php';
						</script>";
						exit;

			}
		}
	}
	
	$DoutoresInstanciada = 'S';
}