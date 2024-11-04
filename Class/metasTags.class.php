<?php
$MetasTagsInstanciada = '';
if(empty($MetasTagsInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('Class/funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../Class/funcoes.php');
	}
	
	class MetasTags {

		private $pdo = null;  

		private static $MetasTags = null; 
	
		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
		
		public static function getInstance($conexao){   
			if (!isset(self::$MetasTags)):    
				self::$MetasTags = new MetasTags($conexao);   
			endif;
			return self::$MetasTags;    
		}
				
		function rsDados() {
			
			try{   
				$sql = "SELECT * FROM tbl_metas_tags ";
				$stm = $this->pdo->prepare($sql);
				$stm->execute();   
				$rsDados = $stm->fetchAll(PDO::FETCH_OBJ);
											
				$this->meta_title_principal = $rsDados[0]->meta_title_principal;
				$this->meta_keywords_principal = $rsDados[0]->meta_keywords_principal;
				$this->meta_description_principal = $rsDados[0]->meta_description_principal;
				$this->url_amigavel_principal = $rsDados[0]->url_amigavel_principal;
				$this->meta_title_convenio = $rsDados[0]->meta_title_convenio;
				$this->meta_keywords_convenio = $rsDados[0]->meta_keywords_convenio;
				$this->meta_description_convenio = $rsDados[0]->meta_description_convenio;
				$this->url_amigavel_convenio = $rsDados[0]->url_amigavel_convenio;
				$this->meta_title_blog = $rsDados[0]->meta_title_blog;
				$this->meta_keywords_blog = $rsDados[0]->meta_keywords_blog;
				$this->meta_description_blog = $rsDados[0]->meta_description_blog;
				$this->url_amigavel_blog = $rsDados[0]->url_amigavel_blog;
				$this->meta_title_contato = $rsDados[0]->meta_title_contato;
				$this->meta_keywords_contato = $rsDados[0]->meta_keywords_contato;
				$this->meta_description_contato = $rsDados[0]->meta_description_contato;
				$this->url_amigavel_contato = $rsDados[0]->url_amigavel_contato;
				$this->meta_title_parceria = $rsDados[0]->meta_title_parceria;
				$this->meta_keywords_parceria = $rsDados[0]->meta_keywords_parceria;
				$this->meta_description_parceria = $rsDados[0]->meta_description_parceria;
				$this->url_amigavel_parceria = $rsDados[0]->url_amigavel_parceria;
				$this->meta_title_servico = $rsDados[0]->meta_title_servico;
				$this->meta_keywords_servico = $rsDados[0]->meta_keywords_servico;
				$this->meta_description_servico = $rsDados[0]->meta_description_servico;
				$this->url_amigavel_servico = $rsDados[0]->url_amigavel_servico;
				$this->meta_title_sobre = $rsDados[0]->meta_title_sobre;
				$this->meta_keywords_sobre = $rsDados[0]->meta_keywords_sobre;
				$this->meta_description_sobre = $rsDados[0]->meta_description_sobre;
				$this->url_amigavel_sobre = $rsDados[0]->url_amigavel_sobre;
				$this->meta_title_produtos = $rsDados[0]->meta_title_produtos;
				$this->meta_keywords_produtos = $rsDados[0]->meta_keywords_produtos;
				$this->meta_description_produtos = $rsDados[0]->meta_description_produtos;
				$this->url_amigavel_produtos = $rsDados[0]->url_amigavel_produtos;
				$this->meta_keywords_espaco = $rsDados[0]->meta_keywords_espaco;
				$this->meta_description_espaco = $rsDados[0]->meta_description_espaco;
				$this->meta_title_espaco = $rsDados[0]->meta_title_espaco;
				$this->meta_keywords_equipe = $rsDados[0]->meta_keywords_equipe;
				$this->meta_description_equipe = $rsDados[0]->meta_description_equipe;
				$this->meta_title_equipe = $rsDados[0]->meta_title_equipe;
				$this->meta_keywords_convenio = $rsDados[0]->meta_keywords_convenio;
				$this->meta_description_convenio = $rsDados[0]->meta_description_convenio;
				$this->meta_title_convenio = $rsDados[0]->meta_title_convenio;
				
			} catch(PDOException $erro){   
				echo $erro->getLine(); 
			}
			
			return($this);
		}


	function editarMetaTag() {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editarMetaTag') {
				$meta_title_principal = filter_input(INPUT_POST, 'meta_title_principal', FILTER_SANITIZE_STRING);
				$meta_keywords_principal = filter_input(INPUT_POST, 'meta_keywords_principal', FILTER_SANITIZE_STRING);
				$meta_description_principal = filter_input(INPUT_POST, 'meta_description_principal', FILTER_SANITIZE_STRING);
				$url_amigavel_principal = filter_input(INPUT_POST, 'url_amigavel_principal', FILTER_SANITIZE_STRING);
				$meta_title_blog = filter_input(INPUT_POST, 'meta_title_blog', FILTER_SANITIZE_STRING);
				$meta_keywords_blog = filter_input(INPUT_POST, 'meta_keywords_blog', FILTER_SANITIZE_STRING);
				$meta_description_blog = filter_input(INPUT_POST, 'meta_description_blog', FILTER_SANITIZE_STRING);
				$url_amigavel_blog = filter_input(INPUT_POST, 'url_amigavel_blog', FILTER_SANITIZE_STRING);
				$meta_title_contato = filter_input(INPUT_POST, 'meta_title_contato', FILTER_SANITIZE_STRING);
				$meta_keywords_contato = filter_input(INPUT_POST, 'meta_keywords_contato', FILTER_SANITIZE_STRING);
				$meta_description_contato = filter_input(INPUT_POST, 'meta_description_contato', FILTER_SANITIZE_STRING);
				$url_amigavel_contato = filter_input(INPUT_POST, 'url_amigavel_contato', FILTER_SANITIZE_STRING);
				$meta_title_parceria = filter_input(INPUT_POST, 'meta_title_parceria', FILTER_SANITIZE_STRING);
				$meta_keywords_parceria = filter_input(INPUT_POST, 'meta_keywords_parceria', FILTER_SANITIZE_STRING);
				$meta_description_parceria = filter_input(INPUT_POST, 'meta_description_parceria', FILTER_SANITIZE_STRING);
				$url_amigavel_parceria = filter_input(INPUT_POST, 'url_amigavel_parceria', FILTER_SANITIZE_STRING);
				$meta_title_servico = filter_input(INPUT_POST, 'meta_title_servico', FILTER_SANITIZE_STRING);
				$meta_keywords_servico = filter_input(INPUT_POST, 'meta_keywords_servico', FILTER_SANITIZE_STRING);
				$meta_description_servico = filter_input(INPUT_POST, 'meta_description_servico', FILTER_SANITIZE_STRING);
				$url_amigavel_servico = filter_input(INPUT_POST, 'url_amigavel_servico', FILTER_SANITIZE_STRING);
				$meta_title_sobre = filter_input(INPUT_POST, 'meta_title_sobre', FILTER_SANITIZE_STRING);
				$meta_keywords_sobre = filter_input(INPUT_POST, 'meta_keywords_sobre', FILTER_SANITIZE_STRING);
				$meta_description_sobre = filter_input(INPUT_POST, 'meta_description_sobre', FILTER_SANITIZE_STRING);
				$url_amigavel_sobre = filter_input(INPUT_POST, 'url_amigavel_sobre', FILTER_SANITIZE_STRING);
				$meta_title_produtos = filter_input(INPUT_POST, 'meta_title_produtos', FILTER_SANITIZE_STRING);
				$meta_keywords_produtos = filter_input(INPUT_POST, 'meta_keywords_produtos', FILTER_SANITIZE_STRING);
				$meta_description_produtos = filter_input(INPUT_POST, 'meta_description_produtos', FILTER_SANITIZE_STRING);
				$url_amigavel_produtos = filter_input(INPUT_POST, 'url_amigavel_produtos', FILTER_SANITIZE_STRING);
				$meta_title_espaco = filter_input(INPUT_POST, 'meta_title_espaco', FILTER_SANITIZE_STRING);
				$meta_keywords_espaco = filter_input(INPUT_POST, 'meta_keywords_espaco', FILTER_SANITIZE_STRING);
				$meta_description_espaco = filter_input(INPUT_POST, 'meta_description_espaco', FILTER_SANITIZE_STRING);
				$meta_title_equipe = filter_input(INPUT_POST, 'meta_title_equipe', FILTER_SANITIZE_STRING);
				$meta_keywords_equipe = filter_input(INPUT_POST, 'meta_keywords_equipe', FILTER_SANITIZE_STRING);
				$meta_description_equipe = filter_input(INPUT_POST, 'meta_description_equipe', FILTER_SANITIZE_STRING);
				$meta_title_convenio = filter_input(INPUT_POST, 'meta_title_convenio', FILTER_SANITIZE_STRING);
				$meta_keywords_convenio = filter_input(INPUT_POST, 'meta_keywords_convenio', FILTER_SANITIZE_STRING);
				$meta_description_convenio = filter_input(INPUT_POST, 'meta_description_convenio', FILTER_SANITIZE_STRING);
				
				
				try{   
					$sql = "UPDATE tbl_metas_tags SET meta_title_principal=?, meta_keywords_principal=?, meta_description_principal=?, url_amigavel_principal=?, meta_title_blog=?, meta_keywords_blog=?, meta_description_blog=?, url_amigavel_blog=?, meta_title_contato=?, meta_keywords_contato=?, meta_description_contato=?, url_amigavel_contato=?, meta_title_parceria=?, meta_keywords_parceria=?, meta_description_parceria=?, url_amigavel_parceria=?, meta_title_servico=?, meta_keywords_servico=?, meta_description_servico=?, url_amigavel_servico=?, meta_title_sobre=?, meta_keywords_sobre=?, meta_description_sobre=?, url_amigavel_sobre=?, meta_title_produtos=?, meta_keywords_produtos=?, meta_description_produtos=?, url_amigavel_produtos=?, meta_title_espaco=?, meta_keywords_espaco=?, meta_description_espaco=?, meta_title_equipe=?, meta_keywords_equipe=?, meta_description_equipe=?, meta_title_convenio=?, meta_keywords_convenio=?, meta_description_convenio=? WHERE id=? ";
					$stm = $this->pdo->prepare($sql);  
					$stm->bindValue(1, $meta_title_principal);
					$stm->bindValue(2, $meta_keywords_principal);
					$stm->bindValue(3, $meta_description_principal);
					$stm->bindValue(4, $url_amigavel_principal);
					$stm->bindValue(5, $meta_title_blog);
					$stm->bindValue(6, $meta_keywords_blog);
					$stm->bindValue(7, $meta_description_blog);
					$stm->bindValue(8, $url_amigavel_blog);
					$stm->bindValue(9, $meta_title_contato);
					$stm->bindValue(10, $meta_keywords_contato);
					$stm->bindValue(11, $meta_description_contato);
					$stm->bindValue(12, $url_amigavel_contato);
					$stm->bindValue(13, $meta_title_parceria);
					$stm->bindValue(14, $meta_keywords_parceria);
					$stm->bindValue(15, $meta_description_parceria);
					$stm->bindValue(16, $url_amigavel_parceria);
					$stm->bindValue(17, $meta_title_servico);
					$stm->bindValue(18, $meta_keywords_servico);
					$stm->bindValue(19, $meta_description_servico);
					$stm->bindValue(20, $url_amigavel_servico);
					$stm->bindValue(21, $meta_title_sobre);
					$stm->bindValue(22, $meta_keywords_sobre);
					$stm->bindValue(23, $meta_description_sobre);
					$stm->bindValue(24, $url_amigavel_sobre);
					$stm->bindValue(25, $meta_title_produtos);
					$stm->bindValue(26, $meta_keywords_produtos);
					$stm->bindValue(27, $meta_description_produtos);
					$stm->bindValue(28, $url_amigavel_produtos);
					$stm->bindValue(29, $meta_title_espaco);
					$stm->bindValue(30, $meta_keywords_espaco);
					$stm->bindValue(31, $meta_description_espaco);
					$stm->bindValue(32, $meta_title_equipe);
					$stm->bindValue(33, $meta_keywords_equipe);
					$stm->bindValue(34, $meta_description_equipe);
					$stm->bindValue(35, $meta_title_convenio);
					$stm->bindValue(36, $meta_keywords_convenio);
					$stm->bindValue(37, $meta_description_convenio);
					$stm->bindValue(38, 1);
					$stm->execute(); 
					
					
					//exit;
					
					echo "	<script>
							alert('Modificado com sucesso!');
							window.location='metas-tags.php';
							</script>";
							exit;
				} catch(PDOException $erro){   
					echo $erro->getMessage();
				}
			}
		}
	}
	
	$MetasTagsInstanciada = 'S';
}