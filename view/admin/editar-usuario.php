
<?php 

    require_once 'header.php';

    $l        = isset($_GET['login']) ? $_GET['login'] : 0;
    $i        = isset($_GET['i'])     ? $_GET['i'] : 0;
    
    $u          = new ControllerUsuario();
    $usuario    = new Usuario();
    $usuario    = $u->carregarUsuario($l,$i);

    if ($usuario->getPerfil() == 1) {
        $idusuario = $usuario->getIdadmin();
        $perfil    = "Administrador";
        $nome      = $usuario->getNome();
    } else if ($usuario->getPerfil() == 2) {
        $idusuario = $usuario->getIdcliente();
        $perfil    = "Cliente";
        $nome      = $usuario->getNome();
    } else if ($usuario->getPerfil() == 3) {
        $idusuario = $usuario->getIdfisico();
        $perfil    = "Profisional Físico";
        $nome      = $usuario->getNome();
    } else if ($usuario->getPerfil() == 3 ) {
        $idusuario = $usuario->getIdjuridico();
        $perfil    = "Profissional Jurídico";
        $nome      = $usuario->getRazaoSocial();
    }

    //chama controller
    if ( isset($_POST) && !empty($_POST) ) {
        $dados = $_POST;
        
        $u->editarUsuario($dados);
    }

?>
    <script type="text/javascript">
        $
    </script>
    
    <section id="portfolio" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="section-profissionais">
                        <?php include 'novos-profissionais.php'; ?>
                    </div>
                </div>
            
                <div class="col-md-9">
                    <div class="contact-form">
                        <h4 class="titulo">Editar Usuário</h4>

                        <form id="form" name="form" method="post" action="">

                            <div class="col-md-12">
                                <label class="form-group">Dados</label>
                          
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="text" name="id" class="form-control" placeholder="ID" value="<?=$idusuario;?>" readonly>
                                        </div> 
                                        <div class="col-md-4">
                                            <input type="hidden" name="perfil" value="<?=$usuario->getPerfil();?>">
                                            <input type="text" name="desc-perfil" class="form-control" placeholder="Perfil" value="<?=$perfil;?>" readonly>
                                        </div> 
                                        <div class="col-md-6">
                                            <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?=$nome;?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="login" class="form-control" placeholder="Login" value="<?=$usuario->getLogin();?>" maxlength="15" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" name="senha" class="form-control" placeholder="Nova Senha" value="" required autofocus>
                                            <small>Mínimo de 5 dígitos</small>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="checkbox" name="status_" id="status_" <?php if($usuario->getStatus_() == 2) echo "checked"; ?> onclick="acesso()">&nbsp&nbsp Desativado
                                        </div>
                                    </div>
                                </div>

                            </div>                                
                          
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="buttons-action float-left">
                                        <a href="javascript:history.back()" class="return"><i class="fa fa-arrow-left fa-3x"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="buttons-action float-right">
                                        <input type="submit" name="submit" class="btn btn-success" value="Enviar Atualização">
                                    </div>
                                </div>   
                            </div>
                            
                      </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--/#projects-->

<?php include 'footer.php'; ?>
    