<style>
    .sidebar-nav {
        padding-top: 80%;
    }
</style>

<?php include "inc-menu-lateral-variaveis.php"; ?>

<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="." aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Principal</span></a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Cadastros</span></li>

                <?php if ($verConfig == 1) : ?>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <i data-feather="file-text" class="feather-icon"></i>
                            <span class="hide-menu">Usuários </span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="usuarios" class="sidebar-link"><span class="hide-menu">
                                        Listar Usuários </span></a></li>
                            <li class="sidebar-item"><a href="add-usuario" class="sidebar-link"><span class="hide-menu">
                                        Adicionar Usuário </span></a></li>
                        </ul>
                    </li>
                <?php endif ?>

                <!-- <?php if ($configs->perm_cad_projeto == "s" || $verConfig == 1) : ?> -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Pautas</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="pautas" class="sidebar-link"><span class="hide-menu">
                                    Listar Pautas </span></a></li>
                        <li class="sidebar-item"><a href="add-pauta" class="sidebar-link"><span class="hide-menu">
                                    Adicionar Pautas </span></a></li>
                    </ul>
                </li>
                <!-- <?php endif ?> -->


                 <?php if ($configs->perm_crud_agenda == 1 || $verConfig == 1) : ?>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <i class="fas fa-calendar-alt"></i>
                            <span class="hide-menu"> Gabinete </span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="agenda" class="sidebar-link"><span class="hide-menu">
                                        Listar Agenda </span></a></li>
                            <li class="sidebar-item"><a href="add-agenda" class="sidebar-link"><span class="hide-menu">
                                        Adicionar Agenda </span></a></li>
                        </ul>
                    </li>
                <?php endif ?>

                <!-- <?php if ($configs->perm_cad_processo == "s" || $verConfig == 1) : ?> -->
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <i data-feather="file-text" class="feather-icon"></i>
                            <span class="hide-menu"> Processos | SGI</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="processos" class="sidebar-link"><span class="hide-menu">
                                        Listar Processos </span></a></li>
                            <li class="sidebar-item"><a href="add-processo" class="sidebar-link"><span class="hide-menu">
                                        Adicionar Processos </span></a></li>
                        </ul>
                    </li>
                <!-- <?php endif ?> -->

                <?php if (
                    // $configs->perm_cad_projeto == "s" ||
                    $verConfig == 1
                ) : ?>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <i data-feather="file-text" class="feather-icon"></i>
                            <span class="hide-menu">Projetos | SDUI </span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="projetos" class="sidebar-link"><span class="hide-menu">
                                        Listar Projetos </span></a></li>
                            <li class="sidebar-item"><a href="add-projeto" class="sidebar-link"><span class="hide-menu">
                                        Adicionar Projetos </span></a></li>
                        </ul>
                    </li>
                <?php endif ?>

                <?php if ($configs->perm_cad_visitante == "s"): ?>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <i class="fa fa-users"></i>
                            <span class="hide-menu">Visitantes </span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="visitantes" class="sidebar-link"><span class="hide-menu">
                                        Listar Visitantes </span></a></li>
                            <li class="sidebar-item"><a href="add-visitante" class="sidebar-link"><span class="hide-menu">
                                        Adicionar Visitantes </span></a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($verConfig == 1) : ?>
                    <li class="list-divider"></li>
                    <li class="nav-small-cap"><span class="hide-menu">Configurações Site</span></li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="menus" aria-expanded="false">
                            <i class="fas fa-calendar-alt"></i>
                            <span class="hide-menu">Menu</span>
                        </a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Blog </span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="blogs" class="sidebar-link"><span class="hide-menu">
                                        Listar Blog
                                    </span></a>
                            </li>
                            <li class="sidebar-item"><a href="add-blog" class="sidebar-link"><span class="hide-menu">
                                        Adicionar Blog
                                    </span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Serviços </span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="servicos" class="sidebar-link"><span class="hide-menu">
                                        Listar Serviços
                                    </span></a>
                            </li>
                            <li class="sidebar-item"><a href="add-servico" class="sidebar-link"><span class="hide-menu">
                                        Adicionar Serviços
                                    </span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Configurações </span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="configuracoes-aparencia" class="sidebar-link"><span class="hide-menu"> Aparência
                                    </span></a>
                            </li>
                            <li class="sidebar-item"><a href="configuracoes" class="sidebar-link"><span class="hide-menu"> Configurações Gerais
                                    </span></a>
                            </li>
                            <li class="sidebar-item"><a href="configuracoes-popup" class="sidebar-link"><span class="hide-menu">
                                        Pop-up
                                    </span></a>
                            </li>
                            <li class="sidebar-item"><a href="metas-tags" class="sidebar-link"><span class="hide-menu">
                                        Metas Tags
                                    </span></a>
                            </li>
                        </ul>
                    </li>
                <?php endif ?>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Extra</span></li>
                <!-- icons --- feathericons -->
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="alterar-senha" aria-expanded="false"><i data-feather="key" class="feather-icon"></i><span class="hide-menu">Alterar Senha</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="login?acao=logout" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Logout</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>