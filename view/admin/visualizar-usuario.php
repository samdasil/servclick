
<?php 

    require_once 'header.php';

    $p        = isset($_GET['p'])     ? $_GET['p']      : 0;
    $l        = isset($_GET['login']) ? $_GET['login']  : 0;
    $i        = isset($_GET['i'])     ? $_GET['i']      : 0;
    
    $u          = new ControllerUsuario();
    $usuario    = new Usuario();
    $usuario    = $u->carregarUsuario($l,$i);
    $idusuario  = $i;

?>
    
    <section id="portfolio" class="pt10">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="section-profissionais">
                        <?php include 'novos-profissionais.php'; ?>
                    </div>
                </div>
            
                <div class="col-md-9">
                    <div class="contact-form">
                        <h4 class="titulo">Visualizar Usuário</h4>

                        <div class="col-md-12">                        
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="subtitulo"><strong>Dados </strong></p>
                                        <p class="linha"><strong>ID        : </strong> <?=$idusuario;?></p>
                                        <p class="linha"><strong>Login     : </strong> <?=$usuario->getLogin();?></p>
                                        <p class="linha"><strong>Perfil    : </strong> <?=$usuario->getPerfil();?></p>
                                        <p class="linha"><strong>Status    : </strong> <?=$usuario->getStatus_();?></p>
                                        <p class="linha"><strong>Cadastro feito em  : </strong> <?=$usuario->getDtcadastro();?></p>
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
                                    <a href="editar-usuario.php?i=<?=$i;?>&login=<?=$l;?>"><button type="button" class="btn btn-btn btn-info"><i class="fa fa-pencil"></i>&nbsp Editar</button></a>
                                 </div>
                            </div>   
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--/#projects-->

<?php include 'footer.php'; ?>
    