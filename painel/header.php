<style>
    @media screen and (max-width: 500px) {
        .padding-img{
            margin: 90% 20px 15px 15%; /* top, right, bottom, left */
            /* padding: 60% 20px 15px 15%;  */
            width:50px;
        }    
        .logo-icon {
        display: none; /* Oculta a imagem quando a tela for menor ou igual a 500px */
    }
    }

    @media screen and (max-width: 1169px) {
        .padding-img{
            margin: 90% 20px 15px 15%; /* top, right, bottom, left */
            /* padding: 60% 20px 15px 15%;  */
            width:50px;
        }    
        .logo-icon {
        display: none; /* Oculta a imagem quando a tela for menor ou igual a 500px */
    }
    }


    .sidebar-nav #sidebarnav .sidebar-item.selected>.sidebar-link {
        background: #00894d;
    }
    .padding-img{
        margin: 90% 20px 15px 15%; /* top, right, bottom, left */
        width:150px;
        /* padding: 60% 20px 15px 15%;  */
    }
</style>
<header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <div class="navbar-brand">
                        <a href=".">
                            <b class="logo-icon">
                                <img src="assets/images/logo-web.webp" alt="homepage" class="dark-logo padding-img" />
                                <!-- <img src="assets/images/logo-web.webp" alt="homepage" class="light-logo" /> -->
                            </b>
                            <!-- <span class="logo-text">
                                <img src="assets/images/logo-web.webp" alt="homepage" width="130" class="dark-logo sidebar-nav padding-img" />
                                <img src="assets/images/logo-web.webp" class="light-logo" width="130" alt="homepage" />
                            </span> -->
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                       
                    </ul>
                    <ul class="navbar-nav float-right">
         
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <?php if(!empty($dadosUsuarioLogado->foto)){?>
                                <img src="../img/<?php echo $dadosUsuarioLogado->foto;?>" alt="<?php echo $dadosUsuarioLogado->nome;?>" class="rounded-circle" width="40">
                                <?php }else{?>
                                <img src="<?php echo icone_genero($dadosUsuarioLogado->sexo);?>" alt="<?php echo $dadosUsuarioLogado->nome;?>" class="rounded-circle" width="40">
                                <?php }?>
                                <span class="ml-2 d-none d-lg-inline-block"><span>Olá,</span> <span
                                        class="text-dark"><?php echo $dadosUsuarioLogado->nome;?></span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                              <!--   <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="credit-card"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="mail"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Account Setting</a> -->
                                <a class="dropdown-item mt-2" href="alterar-senha">
                                    <i data-feather="key" class="svg-icon mr-2 ml-1"></i>
                                    Alterar Senha
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login?acao=logout">
                                    <i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                    Logout
                                </a>
                            <!--     <div class="pl-4 p-3"><a href="javascript:void(0)" class="btn btn-sm btn-info">View
                                        Profile</a></div>
                            </div> -->
                        </li>
                    </ul>
                </div>
            </nav>
        </header>