<?php
      
    require '../../config.php';
    require_once 'head.php';
    if(!isset($_SESSION['session'])) header('Location: ../../index.php');

    $id     = base64_decode($_SESSION['session']);
    $a      = new ControllerAdministrador();
    $admin  = new Administrador();

    $admin  = $a->carregarAdministrador($id) ;
    $_SESSION['cont'] =  0;

?>


<body>
	<header id="header">      
        <div class="navbar-admin navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="navbar-logo">
                        <a class="navbar-brand" href="home.php">
                            <h1><img src="../../assets/images/logo/serv-topo-180x58.png" alt="logo"></h1>
                        </a>
                    </div>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="home.php">Home</a></li>
                        <li class="dropdown"><a href="#">Profissionais <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="gerenciar-juridico.php">Pessoa Juridica</a></li>
                                <li><a href="gerenciar-fisico.php">Pessoa Fisica</a></li>
                            </ul>
                        </li>                    
                        <li><a href="listar-clientes.php">Clientes</a></li>
                        <li><a href="gerenciar-categorias.php">Categorias</a></li>
                        <li><a href="gerenciar-areas.php">Áreas de Atuação</a></li>
                        <li><a href="gerenciar-usuarios.php">Usuários</a></li>
                        <li><a href="gerenciar-administradores.php">Administradores</a></li>
                        <li><a href="../../index.php">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->
    
<script type="text/javascript">
    var intervalo = setInterval(function() {$('#section_profissionais').load('novos-profissionais.php');}, 5000);
</script>
