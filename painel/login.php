<?php 
include "../Class/acesso.class.php";
$acesso = Acesso::getInstance(Conexao::getInstance());
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$acesso->login($login, $senha);
$acesso->logout();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title>SISTEMA SEDF | LOGIN</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="assets/css/pages/login/classic/login-4.css" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<!-- <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> -->
		<!-- <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" /> -->
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 login-signin-on login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-column flex-lg-row flex-row-fluid text-left" >
					<!--begin:Aside-->
					<div class="d-flex w-100 flex-center p-15">
						<div class="login-wrapper">
							<!--begin:Aside Content-->
							<div class="text-dark-75">
								<a href="#">
									<img src="./assets/images/logo-web.webp" class="max-h-75px" alt="" />
								</a>
								<br> <br>
								<p class="mb-15 text-muted font-weight-bold" style="text-align: justify !important; ">
									Olá, seja bem-vindo ao painel gerenciador da agência SEDF. Através dele você terá autonomia para fazer várias tarefas do dia a dia sem depender da gente para isso. <br> <br>
									Através deste gerenciador, você poderá gerenciar algumas páginas do seu site, conteúdo, blog, imagens e textos. Tudo de forma simples, intuitiva, do jeito que tem de ser. Comece inserindo o seu login e senha ao lado, para acessar. <br>
								</p>
								<a href="http://SEDF.com.br/" target="_blank" class="btn btn-outline-primary btn-pill py-4 px-9 font-weight-bold">Visite nosso site</a>
								<br> <br>
								<small>©️ SEDF, <?php $dataAtual = date("Y"); echo $dataAtual;?> Todos os Direitos Reservados.</small>
							</div>
							<!--end:Aside Content-->
						</div>
					</div>
					<!--end:Aside-->
					<!--begin:Divider-->
					<div class="login-divider">
						<div></div>
					</div>
					<!--end:Divider-->
					<!--begin:Content-->
					<div class="d-flex w-100 flex-center p-15 position-relative overflow-hidden">
						<div class="login-wrapper">
							<!--begin:Sign In Form-->
							<div class="login-signin">
								<div class="text-center mb-10 mb-lg-20">
									<h2 class="font-weight-bold">Seja bem vindo!</h2>
									<p class="text-muted font-weight-bold">Acesse para continuar.</p>
								</div>
								<form class="form text-left"  method="POST">
									<div class="form-group py-2 m-0">
										<input class="form-control h-auto border-0 px-3 placeholder-dark-75" type="text" placeholder="E-mail" name="login" autocomplete="off" />
									</div>
									<div class="form-group py-2 border-top m-0">
										<input class="form-control h-auto border-0 px-3 placeholder-dark-75" type="Password" placeholder="Password" name="senha" />
									</div>
									<!-- <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-5">
										
										<a href="javascript:;" id="kt_login_forgot" class="text-muted text-hover-primary font-weight-bold">Esqueceu a senha ?</a>
									</div> -->
								<div class="text-center mt-15">
										<button id="kt_login_signin_submit" class="btn btn-primary btn-pill shadow-sm py-4 px-9 font-weight-bold">Entrar</button>
									</div>
								</form>
							</div>
							<!--end:Sign In Form-->
						
							<!--begin:Forgot Password Form-->
							<div class="login-forgot">
								<div class="text-center mb-10 mb-lg-20">
									<h3 class="">Esqueceu a senha ?</h3>
									<p class="text-muted font-weight-bold">Informe seu e-mail que lhe enviaremos.</p>
								</div>
								<form class="form text-left" id="kt_login_forgot_form">
									<div class="form-group py-2 m-0 border-bottom">
										<input class="form-control h-auto border-0 px-3 placeholder-dark-75" type="text" placeholder="E-mail" name="email" autocomplete="off" />
									</div>
									<div class="form-group d-flex flex-wrap flex-center mt-10">
										<button id="kt_login_forgot_submit" class="btn btn-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Enviar</button>
										<button id="kt_login_forgot_cancel" class="btn btn-outline-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Cancelar</button>
									</div>
								</form>
							</div>
							<!--end:Forgot Password Form-->
						</div>
					</div>
					<!--end:Content-->
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		
	</body>
	<!--end::Body-->
</html>