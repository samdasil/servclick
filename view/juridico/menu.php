<div class="navbar navbar-inverse" role="banner">
            
    <div class="container">

        <div class="topo">
            <a class="arrow" href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
            <div class="topo-arrow">
                <label>
                    <?php 
                        $titulo=explode('/', ucfirst($_SERVER['REQUEST_URI']) ) ; 
                        $titulo=explode('.php',end($titulo));
                        $titulo = explode('-', $titulo[0]); 
                        $titulo = implode(" ",$titulo);
                        $titulo = ucwords($titulo);
                        echo $titulo;
                    ?>
                        
                </label>
            </div>
        </div>
        
        <div class="navbar-header">
            
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
        </div>
    
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="home.php">Home</a></li>
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="listar-solicitacoes.php">Solicitações</a></li>
                <li><a href="meus-servicos.php">Meus Serviços</a></li>
                <li><a href="notas.php">Notas</a></li>
                <li><a href="relatorios.php">Relatórios</a></li>
                <li><a href="config.php">Config</a></li>
                <li><a href="../../index.php">Sair</a></li>
            </ul>
        </div>
            
    </div>

</div>