<?php
@ session_start();
$ExamesInstanciada = '';
if(empty($ExamesInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('Class/funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../Class/funcoes.php');
	}
	
	class Exames {
		
		private $pdo = null;  

		private static $Exames = null; 

		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
	  
		public static function getInstance($conexao){   
			if (!isset(self::$Exames)):    
				self::$Exames = new Exames($conexao);   
			endif;
			return self::$Exames;    
		}
		
	
		function rsDados($id='', $orderBy='', $limite='', $idCat='', $idDiferente='', $url_amigavel='') {
			
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
			if(!empty($idCat)) {
				$sql .= " and id_cat = ?"; 
				$nCampos++;
				$campo[$nCampos] = $idCat;
			}
			if(!empty($idDiferente)) {
				$sql .= " and id != ?"; 
				$nCampos++;
				$campo[$nCampos] = $idDiferente;
			}
			if(!empty($url_amigavel)) {
				$sql .= " and url_amigavel = ?"; 
				$nCampos++;
				$campo[$nCampos] = $url_amigavel;
			}
		
			/// ORDEM		
			if(!empty($orderBy)) {
				$sqlOrdem = " order by {$orderBy}";
			}
			
			if(!empty($limite)) {
				$sqlLimite = " limit {$limite}";
			}
			
			try{   
				$sql = "SELECT * FROM tbl_exames where 1=1 $sql $sqlOrdem $sqlLimite";
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
			if(isset($_POST['acao']) && $_POST['acao'] == 'addExames') {
	
				if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
					$titulo = $_POST['titulo'];
				}else{
					$titulo = '';	
				}

				if(isset($_POST['descricao']) && !empty($_POST['descricao'])){
				    $descricao = $_POST['descricao'];
				}else{
					$descricao = '';	
				}
				
				if(isset($_POST['breve']) && !empty($_POST['breve'])){
					$breve = $_POST['breve'];
				}else{
					$breve = '';	
				}
				
				$id_cat = filter_input(INPUT_POST, 'id_cat', FILTER_SANITIZE_STRING);

				if(isset($_POST['banner_titulo']) && !empty($_POST['banner_titulo'])){
					$banner_titulo = $_POST['banner_titulo'];
				}else{
					$banner_titulo = '';	
				}

				if(isset($_POST['banner_texto']) && !empty($_POST['banner_texto'])){
					$banner_texto = $_POST['banner_texto'];
				}else{
					$banner_texto = '';	
				}
				
				$banner_botao 	= filter_input(INPUT_POST, 'banner_botao', FILTER_SANITIZE_STRING);
				
				if(isset($_POST['banner_titulo2']) && !empty($_POST['banner_titulo2'])){
					$banner_titulo2 = $_POST['banner_titulo2'];
				}else{
					$banner_titulo2 = '';	
				}

				if(isset($_POST['banner_titulo3']) && !empty($_POST['banner_titulo3'])){
					$banner_titulo3 = $_POST['banner_titulo3'];
				}else{
					$banner_titulo3 = '';	
				}
	
				if(isset($_POST['sessao1_titulo']) && !empty($_POST['sessao1_titulo'])){
					$sessao1_titulo = $_POST['sessao1_titulo'];
				}else{
					$sessao1_titulo = '';	
				}

				if(isset($_POST['sessao1_texto']) && !empty($_POST['sessao1_texto'])){
					$sessao1_texto = $_POST['sessao1_texto'];
				}else{
					$sessao1_texto = '';	
				}
				
				if(isset($_POST['sessao1_video_titulo']) && !empty($_POST['sessao1_video_titulo'])){
					$sessao1_video_titulo = $_POST['sessao1_video_titulo'];
				}else{
					$sessao1_video_titulo = '';	
				}
				
				if(isset($_POST['sessao1_video_descricao']) && !empty($_POST['sessao1_video_descricao'])){
					$sessao1_video_descricao = $_POST['sessao1_video_descricao'];
				}else{
					$sessao1_video_descricao = '';	
				}
				
				if(isset($_POST['sessao1_embed']) && !empty($_POST['sessao1_embed'])){
					$sessao1_embed = $_POST['sessao1_embed'];
				}else{
					$sessao1_embed = '';	
				}
				
				if(isset($_POST['sessao2_titulo']) && !empty($_POST['sessao2_titulo'])){
					$sessao2_titulo = $_POST['sessao2_titulo'];
				}else{
					$sessao2_titulo = '';	
				}

				if(isset($_POST['sessao2_texto']) && !empty($_POST['sessao2_texto'])){
					$sessao2_texto = $_POST['sessao2_texto'];
				}else{
					$sessao2_texto = '';	
				}

				$sessao2_botao  = filter_input(INPUT_POST, 'sessao2_botao', FILTER_SANITIZE_STRING);

				if(isset($_POST['sessao2_titulo2']) && !empty($_POST['sessao2_titulo2'])){
					$sessao2_titulo2 = $_POST['sessao2_titulo2'];
				}else{
					$sessao2_titulo2 = '';	
				}

				if(isset($_POST['sessao2_texto2']) && !empty($_POST['sessao2_texto2'])){
					$sessao2_texto2 = $_POST['sessao2_texto2'];
				}else{
					$sessao2_texto2 = '';	
				}
				$sessao2_botao2 = filter_input(INPUT_POST, 'sessao2_botao2', FILTER_SANITIZE_STRING);
				
				if(isset($_POST['sessao3_titulo']) && !empty($_POST['sessao3_titulo'])){
					$sessao3_titulo = $_POST['sessao3_titulo'];
				}else{
					$sessao3_titulo = '';	
				}

				if(isset($_POST['sessao3_texto']) && !empty($_POST['sessao3_texto'])){
					$sessao3_texto = $_POST['sessao3_texto'];
				}else{
					$sessao3_texto = '';	
				}
				
				if(isset($_POST['sessao4_titulo']) && !empty($_POST['sessao4_titulo'])){
					$sessao4_titulo = $_POST['sessao4_titulo'];
				}else{
					$sessao4_titulo = '';	
				}

				if(isset($_POST['sessao4_titulo2']) && !empty($_POST['sessao4_titulo2'])){
					$sessao4_titulo2 = $_POST['sessao4_titulo2'];
				}else{
					$sessao4_titulo2 = '';	
				}

				if(isset($_POST['sessao4_texto']) && !empty($_POST['sessao4_texto'])){
					$sessao4_texto = $_POST['sessao4_texto'];
				}else{
					$sessao4_texto = '';	
				}

				$sessao5_titulo = filter_input(INPUT_POST, 'sessao5_titulo', FILTER_SANITIZE_STRING);
				
				if(isset($_POST['sessao5_texto']) && !empty($_POST['sessao5_texto'])){
					$sessao5_texto = $_POST['sessao5_texto'];
				}else{
					$sessao5_texto = '';	
				}
				
				$sessao6_titulo = filter_input(INPUT_POST, 'sessao6_titulo', FILTER_SANITIZE_STRING);
				
				if(isset($_POST['sessao6_texto']) && !empty($_POST['sessao6_texto'])){
					$sessao6_texto = $_POST['sessao6_texto'];
				}else{
					$sessao6_texto = '';	
				}
				
				if(isset($_POST['topico1_titulo']) && !empty($_POST['topico1_titulo'])){
					$topico1_titulo = $_POST['topico1_titulo'];
				}else{
					$topico1_titulo = '';	
				}

				if(isset($_POST['topico1_texto']) && !empty($_POST['topico1_texto'])){
					$topico1_texto = $_POST['topico1_texto'];
				}else{
					$topico1_texto = '';	
				}
				
				if(isset($_POST['topico2_titulo']) && !empty($_POST['topico2_titulo'])){
					$topico2_titulo = $_POST['topico2_titulo'];
				}else{
					$topico2_titulo = '';	
				}
				
				if(isset($_POST['topico2_texto']) && !empty($_POST['topico2_texto'])){
					$topico2_texto = $_POST['topico2_texto'];
				}else{
					$topico2_texto = '';	
				}
				
				if(isset($_POST['topico3_titulo']) && !empty($_POST['topico3_titulo'])){
					$topico3_titulo = $_POST['topico3_titulo'];
				}else{
					$topico3_titulo = '';	
				}
				
				if(isset($_POST['topico3_texto']) && !empty($_POST['topico3_texto'])){
					$topico3_texto = $_POST['topico3_texto'];
				}else{
					$topico3_texto = '';	
				}
				
				if(isset($_POST['topico4_titulo']) && !empty($_POST['topico4_titulo'])){
					$topico4_titulo = $_POST['topico4_titulo'];
				}else{
					$topico4_titulo = '';	
				}
				
				if(isset($_POST['topico4_texto']) && !empty($_POST['topico4_texto'])){
					$topico4_texto = $_POST['topico4_texto'];
				}else{
					$topico4_texto = '';	
				}
				
				if(isset($_POST['diferenca1_titulo']) && !empty($_POST['diferenca1_titulo'])){
					$diferenca1_titulo = $_POST['diferenca1_titulo'];
				}else{
					$diferenca1_titulo = '';	
				}

				if(isset($_POST['diferenca1_texto']) && !empty($_POST['diferenca1_texto'])){
					$diferenca1_texto = $_POST['diferenca1_texto'];
				}else{
					$diferenca1_texto = '';	
				}
				
				$diferenca2_titulo 	= filter_input(INPUT_POST, 'diferenca2_titulo', FILTER_SANITIZE_STRING);
				
				if(isset($_POST['diferenca2_titulo']) && !empty($_POST['diferenca2_titulo'])){
					$diferenca2_titulo = $_POST['diferenca2_titulo'];
				}else{
					$diferenca2_titulo = '';	
				}

				if(isset($_POST['diferenca2_texto']) && !empty($_POST['diferenca2_texto'])){
					$diferenca2_texto = $_POST['diferenca2_texto'];
				}else{
					$diferenca2_texto = '';	
				}
				
				if(isset($_POST['diferenca3_titulo']) && !empty($_POST['diferenca3_titulo'])){
					$diferenca3_titulo = $_POST['diferenca3_titulo'];
				}else{
					$diferenca3_titulo = '';	
				}

				if(isset($_POST['diferenca3_texto']) && !empty($_POST['diferenca3_texto'])){
					$diferenca3_texto = $_POST['diferenca3_texto'];
				}else{
					$diferenca3_texto = '';	
				}
				
				if(isset($_POST['contato_titulo']) && !empty($_POST['contato_titulo'])){
					$contato_titulo = $_POST['contato_titulo'];
				}else{
					$contato_titulo = '';	
				}
				
				if(isset($_POST['contato_botao']) && !empty($_POST['contato_botao'])){
					$contato_botao = $_POST['contato_botao'];
				}else{
					$contato_botao = '';	
				}

				$contato_texto 		= $_POST['contato_texto'];
				
				if(isset($_POST['contato_texto']) && !empty($_POST['contato_texto'])){
					$contato_texto = $_POST['contato_texto'];
				}else{
					$contato_texto = '';	
				}
				
				$meta_title 		= filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
				$meta_keywords 		= filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
				$meta_description 	= filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
				$botao 				= filter_input(INPUT_POST, 'botao', FILTER_SANITIZE_STRING);
				
				if(isset($_POST['url_amigavel']) && !empty($_POST['url_amigavel'])){
				    $urlAmigavel = $_POST['url_amigavel'];
				}else{
				   $urlAmigavel = gerarTituloSEO($titulo); 
				}
				
					try{

						if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
						
						$sql = "INSERT INTO tbl_exames (foto, titulo, descricao, id_cat, meta_title, meta_keywords, meta_description, url_amigavel, breve, banner_foto, sessao1_foto, sessao2_foto, sessao4_foto, topico1_foto, topico2_foto, topico3_foto, topico4_foto, diferenca1_foto, diferenca2_foto, diferenca3_foto, banner_titulo, banner_texto, sessao1_titulo, sessao1_texto, sessao2_titulo, sessao2_texto, sessao3_titulo, sessao3_texto, sessao4_titulo, sessao4_texto, sessao5_titulo, sessao5_texto, sessao6_titulo, sessao6_texto, sessao1_video_titulo, sessao1_thumb, sessao1_video_descricao, sessao1_embed) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";   
						$stm = $this->pdo->prepare($sql);   
						$stm->bindValue(1, upload('foto', $pastaArquivos, 'N'));
						$stm->bindValue(2, $titulo);   
						$stm->bindValue(3, $descricao);
						$stm->bindValue(4, $id_cat);   
						$stm->bindValue(5, $meta_title);   
						$stm->bindValue(6, $meta_keywords);   
						$stm->bindValue(7, $meta_description); 
						$stm->bindValue(8, $urlAmigavel);
						$stm->bindValue(9, $breve);
						$stm->bindValue(10, upload('banner_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(11, upload('sessao1_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(12, upload('sessao2_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(13, upload('sessao4_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(14, upload('topico1_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(15, upload('topico2_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(16, upload('topico3_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(17, upload('topico4_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(18, upload('diferenca1_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(19, upload('diferenca2_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(20, upload('diferenca3_foto', $pastaArquivos, 'N'));
						$stm->bindValue(21, $banner_titulo);
						$stm->bindValue(22, $banner_texto);
						$stm->bindValue(23, $sessao1_titulo);
						$stm->bindValue(24, $sessao1_texto);
						$stm->bindValue(25, $sessao2_titulo);
						$stm->bindValue(26, $sessao2_texto);
						$stm->bindValue(27, $sessao3_titulo);
						$stm->bindValue(28, $sessao3_texto);
						$stm->bindValue(29, $sessao4_titulo);
						$stm->bindValue(30, $sessao4_texto);
						$stm->bindValue(31, $sessao5_titulo);
						$stm->bindValue(32, $sessao5_texto);
						$stm->bindValue(33, $sessao6_titulo);
						$stm->bindValue(34, $sessao6_texto);
						$stm->bindValue(35, $sessao1_video_titulo);
						$stm->bindValue(36, upload('sessao1_thumb', $pastaArquivos, 'N'));
						$stm->bindValue(37, $sessao1_video_descricao);
						$stm->bindValue(38, $sessao1_embed);
						$stm->execute(); 
						$idExame = $this->pdo->lastInsertId();
						
						

					} catch(PDOException $erro){
						echo $erro->getMessage(); 
					}

                    

					try{

						if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
						        
						$sql = "UPDATE tbl_exames SET topico1_titulo=?, topico1_texto=?, topico2_titulo=?, topico2_texto=?, topico3_titulo=?, topico3_texto=?, topico4_titulo=?, topico4_texto=?, diferenca1_titulo=?, diferenca1_texto=?, diferenca2_titulo=?, diferenca2_texto=?, diferenca3_titulo=?, diferenca3_texto=?, contato_titulo=?, contato_texto=?, imagem_final=?, imagem_mobile_final=?, icone=?, botao=?, banner_titulo2=?, banner_titulo3=?, banner_botao=?, sessao2_titulo2=?, sessao2_texto2=?, sessao2_foto2=?, sessao2_botao2=?, sessao2_botao=?, sessao4_titulo2=?, sessao4_icone=?, contato_foto=?, contato_botao=?, sessao5_foto=? WHERE id=?";   
						$stm = $this->pdo->prepare($sql);   
						$stm->bindValue(1, $topico1_titulo);
						$stm->bindValue(2, $topico1_texto);
						$stm->bindValue(3, $topico2_titulo);
						$stm->bindValue(4, $topico2_texto);
						$stm->bindValue(5, $topico3_titulo);
						$stm->bindValue(6, $topico3_texto);
						$stm->bindValue(7, $topico4_titulo);
						$stm->bindValue(8, $topico4_texto);
						$stm->bindValue(9, $diferenca1_titulo);
						$stm->bindValue(10, $diferenca1_texto);
						$stm->bindValue(11, $diferenca2_titulo);
						$stm->bindValue(12, $diferenca2_texto);
						$stm->bindValue(13, $diferenca3_titulo);
						$stm->bindValue(14, $diferenca3_texto);
						$stm->bindValue(15, $contato_titulo);
						$stm->bindValue(16, $contato_texto);
						$stm->bindValue(17, upload('imagem_final', $pastaArquivos, 'N'));
						$stm->bindValue(18, upload('imagem_mobile_final', $pastaArquivos, 'N'));
						$stm->bindValue(19, upload('icone', $pastaArquivos, 'N'));
						$stm->bindValue(20, $botao);
						$stm->bindValue(21, $banner_titulo2);
						$stm->bindValue(22, $banner_titulo3);
						$stm->bindValue(23, $banner_botao);
						$stm->bindValue(24, $sessao2_titulo2);
						$stm->bindValue(25, $sessao2_texto2);
						$stm->bindValue(26, upload('sessao2_foto2', $pastaArquivos, 'N'));
						$stm->bindValue(27, $sessao2_botao2);
						$stm->bindValue(28, $sessao2_botao);
						$stm->bindValue(29, $sessao4_titulo2);
						$stm->bindValue(30, upload('sessao4_icone', $pastaArquivos, 'N'));
						$stm->bindValue(31, upload('contato_foto', $pastaArquivos, 'N'));
						$stm->bindValue(32, $contato_botao);
						$stm->bindValue(33, upload('sessao5_foto', $pastaArquivos, 'N'));
						$stm->bindValue(34, $idExame);
						$stm->execute(); 
						
					
					} catch(PDOException $erro){
						echo $erro->getMessage(); 
					}
				
				 	
					if($redireciona == '') {
						$redireciona = '.';
					}
					
					
					echo "	<script>
								window.location='exames.php';
								</script>";
								exit;
				
			}
		}
		
		function editar($redireciona='exames.php') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editaExames') {				
				$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
				
				if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
					$titulo = $_POST['titulo'];
				}else{
					$titulo = '';	
				}
				if(isset($_POST['descricao']) && !empty($_POST['descricao'])){
					$descricao = $_POST['descricao'];
				}else{
					$descricao = '';	
				}
				if(isset($_POST['breve']) && !empty($_POST['breve'])){
					$breve = $_POST['breve'];
				}else{
					$breve = '';	
				}
				$id_cat = filter_input(INPUT_POST, 'id_cat', FILTER_SANITIZE_STRING);

				if(isset($_POST['banner_titulo']) && !empty($_POST['banner_titulo'])){
					$banner_titulo = $_POST['banner_titulo'];
				}else{
					$banner_titulo = '';	
				}

				if(isset($_POST['banner_texto']) && !empty($_POST['banner_texto'])){
					$banner_texto = $_POST['banner_texto'];
				}else{
					$banner_texto = '';	
				}
				$banner_botao 	= filter_input(INPUT_POST, 'banner_botao', FILTER_SANITIZE_STRING);
				
				if(isset($_POST['banner_titulo2']) && !empty($_POST['banner_titulo2'])){
					$banner_titulo2 = $_POST['banner_titulo2'];
				}else{
					$banner_titulo2 = '';	
				}

				if(isset($_POST['banner_titulo3']) && !empty($_POST['banner_titulo3'])){
					$banner_titulo3 = $_POST['banner_titulo3'];
				}else{
					$banner_titulo3 = '';	
				}
				
				if(isset($_POST['sessao1_video_titulo']) && !empty($_POST['sessao1_video_titulo'])){
					$sessao1_video_titulo = $_POST['sessao1_video_titulo'];
				}else{
					$sessao1_video_titulo = '';	
				}
				
				if(isset($_POST['sessao1_video_descricao']) && !empty($_POST['sessao1_video_descricao'])){
					$sessao1_video_descricao = $_POST['sessao1_video_descricao'];
				}else{
					$sessao1_video_descricao = '';	
				}
				
				if(isset($_POST['sessao1_embed']) && !empty($_POST['sessao1_embed'])){
					$sessao1_embed = $_POST['sessao1_embed'];
				}else{
					$sessao1_embed = '';	
				}
				
	
				if(isset($_POST['sessao1_titulo']) && !empty($_POST['sessao1_titulo'])){
					$sessao1_titulo = $_POST['sessao1_titulo'];
				}else{
					$sessao1_titulo = '';	
				}

				if(isset($_POST['sessao1_texto']) && !empty($_POST['sessao1_texto'])){
					$sessao1_texto = $_POST['sessao1_texto'];
				}else{
					$sessao1_texto = '';	
				}
				//echo $sessao1_texto;exit;
				if(isset($_POST['sessao2_titulo']) && !empty($_POST['sessao2_titulo'])){
					$sessao2_titulo = $_POST['sessao2_titulo'];
				}else{
					$sessao2_titulo = '';	
				}

				if(isset($_POST['sessao2_texto']) && !empty($_POST['sessao2_texto'])){
					$sessao2_texto = $_POST['sessao2_texto'];
				}else{
					$sessao2_texto = '';	
				}

				$sessao2_botao  = filter_input(INPUT_POST, 'sessao2_botao', FILTER_SANITIZE_STRING);

				if(isset($_POST['sessao2_titulo2']) && !empty($_POST['sessao2_titulo2'])){
					$sessao2_titulo2 = $_POST['sessao2_titulo2'];
				}else{
					$sessao2_titulo2 = '';	
				}

				if(isset($_POST['sessao2_texto2']) && !empty($_POST['sessao2_texto2'])){
					$sessao2_texto2 = $_POST['sessao2_texto2'];
				}else{
					$sessao2_texto2 = '';	
				}

				$sessao2_botao2 = filter_input(INPUT_POST, 'sessao2_botao2', FILTER_SANITIZE_STRING);

				if(isset($_POST['sessao3_titulo']) && !empty($_POST['sessao3_titulo'])){
					$sessao3_titulo = $_POST['sessao3_titulo'];
				}else{
					$sessao3_titulo = '';	
				}

				if(isset($_POST['sessao3_texto']) && !empty($_POST['sessao3_texto'])){
					$sessao3_texto = $_POST['sessao3_texto'];
				}else{
					$sessao3_texto = '';	
				}
				
				if(isset($_POST['sessao4_titulo']) && !empty($_POST['sessao4_titulo'])){
					$sessao4_titulo = $_POST['sessao4_titulo'];
				}else{
					$sessao4_titulo = '';	
				}

				if(isset($_POST['sessao4_titulo2']) && !empty($_POST['sessao4_titulo2'])){
					$sessao4_titulo2 = $_POST['sessao4_titulo2'];
				}else{
					$sessao4_titulo2 = '';	
				}

				if(isset($_POST['sessao4_texto']) && !empty($_POST['sessao4_texto'])){
					$sessao4_texto = $_POST['sessao4_texto'];
				}else{
					$sessao4_texto = '';	
				}

				$sessao5_titulo = filter_input(INPUT_POST, 'sessao5_titulo', FILTER_SANITIZE_STRING);
				
				if(isset($_POST['sessao5_texto']) && !empty($_POST['sessao5_texto'])){
					$sessao5_texto = $_POST['sessao5_texto'];
				}else{
					$sessao5_texto = '';	
				}
				
				
				if(isset($_POST['sessao6_titulo']) && !empty($_POST['sessao6_titulo'])){
					$sessao6_titulo = $_POST['sessao6_titulo'];
				}else{
					$sessao6_titulo = '';	
				}
				
				if(isset($_POST['sessao6_texto']) && !empty($_POST['sessao6_texto'])){
					$sessao6_texto = $_POST['sessao6_texto'];
				}else{
					$sessao6_texto = '';	
				}

				if(isset($_POST['topico1_titulo']) && !empty($_POST['topico1_titulo'])){
					$topico1_titulo = $_POST['topico1_titulo'];
				}else{
					$topico1_titulo = '';	
				}

				if(isset($_POST['topico1_texto']) && !empty($_POST['topico1_texto'])){
					$topico1_texto = $_POST['topico1_texto'];
				}else{
					$topico1_texto = '';	
				}
				
				if(isset($_POST['topico2_titulo']) && !empty($_POST['topico2_titulo'])){
					$topico2_titulo = $_POST['topico2_titulo'];
				}else{
					$topico2_titulo = '';	
				}
				if(isset($_POST['topico2_texto']) && !empty($_POST['topico2_texto'])){
					$topico2_texto = $_POST['topico2_texto'];
				}else{
					$topico2_texto = '';	
				}
				
				if(isset($_POST['topico3_titulo']) && !empty($_POST['topico3_titulo'])){
					$topico3_titulo = $_POST['topico3_titulo'];
				}else{
					$topico3_titulo = '';	
				}
				if(isset($_POST['topico3_texto']) && !empty($_POST['topico3_texto'])){
					$topico3_texto = $_POST['topico3_texto'];
				}else{
					$topico3_texto = '';	
				}
				if(isset($_POST['topico4_titulo']) && !empty($_POST['topico4_titulo'])){
					$topico4_titulo = $_POST['topico4_titulo'];
				}else{
					$topico4_titulo = '';	
				}
				if(isset($_POST['topico4_texto']) && !empty($_POST['topico4_texto'])){
					$topico4_texto = $_POST['topico4_texto'];
				}else{
					$topico4_texto = '';	
				}
				
				if(isset($_POST['diferenca1_titulo']) && !empty($_POST['diferenca1_titulo'])){
					$diferenca1_titulo = $_POST['diferenca1_titulo'];
				}else{
					$diferenca1_titulo = '';	
				}

				if(isset($_POST['diferenca1_texto']) && !empty($_POST['diferenca1_texto'])){
					$diferenca1_texto = $_POST['diferenca1_texto'];
				}else{
					$diferenca1_texto = '';	
				}
				$diferenca2_titulo 	= filter_input(INPUT_POST, 'diferenca2_titulo', FILTER_SANITIZE_STRING);
				if(isset($_POST['diferenca2_titulo']) && !empty($_POST['diferenca2_titulo'])){
					$diferenca2_titulo = $_POST['diferenca2_titulo'];
				}else{
					$diferenca2_titulo = '';	
				}

				if(isset($_POST['diferenca2_texto']) && !empty($_POST['diferenca2_texto'])){
					$diferenca2_texto = $_POST['diferenca2_texto'];
				}else{
					$diferenca2_texto = '';	
				}
				
				if(isset($_POST['diferenca3_titulo']) && !empty($_POST['diferenca3_titulo'])){
					$diferenca3_titulo = $_POST['diferenca3_titulo'];
				}else{
					$diferenca3_titulo = '';	
				}

				if(isset($_POST['diferenca3_texto']) && !empty($_POST['diferenca3_texto'])){
					$diferenca3_texto = $_POST['diferenca3_texto'];
				}else{
					$diferenca3_texto = '';	
				}
				
				if(isset($_POST['contato_titulo']) && !empty($_POST['contato_titulo'])){
					$contato_titulo = $_POST['contato_titulo'];
				}else{
					$contato_titulo = '';	
				}

				if(isset($_POST['contato_botao']) && !empty($_POST['contato_botao'])){
					$contato_botao = $_POST['contato_botao'];
				}else{
					$contato_botao = '';	
				}

				$contato_texto 		= $_POST['contato_texto'];
				if(isset($_POST['contato_texto']) && !empty($_POST['contato_texto'])){
					$contato_texto = $_POST['contato_texto'];
				}else{
					$contato_texto = '';	
				}
				$meta_title 		= filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
				$meta_keywords 		= filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
				$meta_description 	= filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
				$botao 				= filter_input(INPUT_POST, 'botao', FILTER_SANITIZE_STRING);
				if(isset($_POST['url_amigavel']) && !empty($_POST['url_amigavel'])){
				    $urlAmigavel = $_POST['url_amigavel'];
				}else{
				   $urlAmigavel = gerarTituloSEO($titulo); 
				}
				//print_r($_POST);exit;
				try { 

					if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
				
					$sql = "UPDATE tbl_exames SET foto=?, titulo=?, descricao=?, id_cat=?, meta_title=?, meta_keywords=?, meta_description=?, url_amigavel=?, breve=?, banner_foto=?, sessao1_foto=?, sessao2_foto=?, sessao4_foto=?, topico1_foto=?, topico2_foto=?, topico3_foto=?, topico4_foto=?, diferenca1_foto=?, diferenca2_foto=?, diferenca3_foto=?, banner_titulo=?, banner_texto=?, sessao1_titulo=?, sessao1_texto=?, sessao2_titulo=?, sessao2_texto=?, sessao3_titulo=?, sessao3_texto=?, sessao4_titulo=?, sessao4_texto=?, sessao5_titulo=?, sessao5_texto=?, sessao5_foto=?, sessao6_titulo=?, sessao6_texto=?, sessao6_foto=?, sessao1_video_titulo=?,
						sessao1_thumb=?,sessao1_video_descricao=?,
						sessao1_embed=? WHERE id=?";
					$stm = $this->pdo->prepare($sql);
					$stm->bindValue(1, upload('foto', $pastaArquivos, 'N'));
					$stm->bindValue(2, $titulo);
					$stm->bindValue(3, $descricao);
					$stm->bindValue(4, $id_cat);
					$stm->bindValue(5, $meta_title);
					$stm->bindValue(6, $meta_keywords);
					$stm->bindValue(7, $meta_description);
					$stm->bindValue(8, $urlAmigavel);
					$stm->bindValue(9, $breve);
					$stm->bindValue(10, upload('banner_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(11, upload('sessao1_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(12, upload('sessao2_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(13, upload('sessao4_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(14, upload('topico1_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(15, upload('topico2_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(16, upload('topico3_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(17, upload('topico4_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(18, upload('diferenca1_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(19, upload('diferenca2_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(20, upload('diferenca3_foto', $pastaArquivos, 'N'));
					$stm->bindValue(21, $banner_titulo);
					$stm->bindValue(22, $banner_texto);
					$stm->bindValue(23, $sessao1_titulo);
					$stm->bindValue(24, $sessao1_texto);
					$stm->bindValue(25, $sessao2_titulo);
					$stm->bindValue(26, $sessao2_texto);
					$stm->bindValue(27, $sessao3_titulo);
					$stm->bindValue(28, $sessao3_texto);
					$stm->bindValue(29, $sessao4_titulo);
					$stm->bindValue(30, $sessao4_texto);
					$stm->bindValue(31, $sessao5_titulo);
					$stm->bindValue(32, $sessao5_texto);
					$stm->bindValue(33, upload('sessao5_foto', $pastaArquivos, 'N'));
					$stm->bindValue(34, $sessao6_titulo);
					$stm->bindValue(35, $sessao6_texto);
					$stm->bindValue(36, upload('sessao6_foto', $pastaArquivos, 'N'));
					$stm->bindValue(37, $sessao1_video_titulo);
					$stm->bindValue(38, upload('sessao1_thumb', $pastaArquivos, 'N'));
					$stm->bindValue(39, $sessao1_video_descricao);
					$stm->bindValue(40, $sessao1_embed);
					$stm->bindValue(41, $id);
					$stm->execute(); 
				
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}

                try { 

					if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
				
					$sql = "UPDATE tbl_exames SET topico1_titulo=?, topico1_texto=?, topico2_titulo=?, topico2_texto=?, topico3_titulo=?, topico3_texto=?, topico4_titulo=?, topico4_texto=?, diferenca1_titulo=?, diferenca1_texto=?, diferenca2_titulo=?, diferenca2_texto=?, diferenca3_titulo=?, diferenca3_texto=?, contato_titulo=?, contato_texto=?, imagem_final=?, imagem_mobile_final=?, icone=?, botao=?, banner_titulo2=?, banner_titulo3=?, banner_botao=?, sessao2_titulo2=?, sessao2_texto2=?, sessao2_foto2=?, sessao2_botao2=?, sessao2_botao=?, sessao4_titulo2=?, sessao4_icone=?, contato_foto=?, contato_botao=? WHERE id=?";
					$stm = $this->pdo->prepare($sql);
					$stm->bindValue(1, $topico1_titulo);
					$stm->bindValue(2, $topico1_texto);
					$stm->bindValue(3, $topico2_titulo);
					$stm->bindValue(4, $topico2_texto);
					$stm->bindValue(5, $topico3_titulo);
					$stm->bindValue(6, $topico3_texto);
					$stm->bindValue(7, $topico4_titulo);
					$stm->bindValue(8, $topico4_texto);
					$stm->bindValue(9, $diferenca1_titulo);
					$stm->bindValue(10, $diferenca1_texto);
					$stm->bindValue(11, $diferenca2_titulo);
					$stm->bindValue(12, $diferenca2_texto);
					$stm->bindValue(13, $diferenca3_titulo);
					$stm->bindValue(14, $diferenca3_texto);
					$stm->bindValue(15, $contato_titulo);
					$stm->bindValue(16, $contato_texto);
					$stm->bindValue(17, upload('imagem_final', $pastaArquivos, 'N'));
					$stm->bindValue(18, upload('imagem_mobile_final', $pastaArquivos, 'N'));
					$stm->bindValue(19, upload('icone', $pastaArquivos, 'N'));
					$stm->bindValue(20, $botao);
					$stm->bindValue(21, $banner_titulo2);
					$stm->bindValue(22, $banner_titulo3);
					$stm->bindValue(23, $banner_botao);
					$stm->bindValue(24, $sessao2_titulo2);
					$stm->bindValue(25, $sessao2_texto2);
					$stm->bindValue(26, upload('sessao2_foto2', $pastaArquivos, 'N'));
					$stm->bindValue(27, $sessao2_botao2);
					$stm->bindValue(28, $sessao2_botao);
					$stm->bindValue(29, $sessao4_titulo2);
					$stm->bindValue(30, upload('sessao4_icone', $pastaArquivos, 'N'));
					$stm->bindValue(31, upload('contato_foto', $pastaArquivos, 'N'));
					$stm->bindValue(32, $contato_botao);
					$stm->bindValue(33, $id);
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
			if(isset($_GET['acao']) && $_GET['acao'] == 'excluirExames') {
				
				try{   
					$sql = "DELETE FROM tbl_exames WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['id']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}

				echo "	<script>
								window.location='exames.php';
								</script>";
								exit;

			}
		}
	}
	
	$ExamesInstanciada = 'S';
}