<?php 

    require_once 'header.php'; 
  
    $p        = isset($_GET['p']) ? $_GET['p'] : 0;
    $c        = new ControllerCliente();
    $e        = new ControllerEndereco();
    $cliente  = new Cliente();
    $endereco = new Endereco();
    $cliente  = $c->carregarCliente($p);
    $endereco = $e->carregarEndereco($cliente->getEndereco());

    // caso receba dados via POST 
    if( isset($_POST) && !empty($_POST) ){

        if((isset($_FILES['foto']['size']) && $_FILES['foto']['size'] != 0)) {

            $aFile = $_FILES;
            
        } else {
            
            $aFile = null;
            
        }

        $dados  = $_POST;
        $c->editarCliente($dados, $aFile);

    }

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
                        <h4 class="titulo">Editar Cliente</h4>

                    <form name="form" method="post" action="" enctype="multipart/form-data">

                        <input type="hidden" name="idcliente" value="<?=$cliente->getIdcliente();?>">
                        <input type="hidden" name="status_" value="<?=$cliente->getStatus_();?>">
                        <input type="hidden" name="perfil" value="<?=$cliente->getPerfil();?>">
                        <input type="hidden" name="endereco" value="<?=$cliente->getEndereco();?>">

                        <div class="col-md-3">
                            <div class="portfolio-wrapper">
                                <div class="portfolio-single">
                                    
                                    <input type="hidden" name="img" value="<?=$cliente->getFoto();?>">
                                    <img src="../../assets/images/cliente/<?=$cliente->getFoto();?>" class="img-perfil" alt="" name="img" id="img" />

                                    <div class="portfolio-view">
                                        <ul class="nav nav-pills">
                                            <li>
                                                <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
                                                <input type="file" name="foto" id="foto" class="form-control" accept="image/png, image/jpeg" onchange="alterarImagem()" />
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group text-center">
                                <label class="cad-pro fot-pro">Foto do perfil</label>
                            </div>
                        </div>

                        <div class="col-md-8" style="margin-left: 40px;">
                                <label class="form-group">Dados</label>
                            
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" name="cpf" id="cpf" class="form-control" required="required" placeholder="CPF" autocomplete="off" maxlength="14" minlength="14" value="<?=$cliente->getCpf();?>"  >
                                        </div> 
                                        <div class="col-md-8">
                                            <input type="text" name="nome" class="form-control" required="required" placeholder="Nome" autocomplete="off" value="<?=$cliente->getNome();?>"  >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="email" name="email" class="form-control" required="required" placeholder="E-mail" autocomplete="off" value="<?=$cliente->getEmail();?>" >
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" autocomplete="off" maxlength="15" minlength="15" value="<?=$cliente->getFone();?>" >
                                        </div>
                                    </div>
                                </div>

                                <label class="form-group">Endereço</label>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="cep" id="cep" maxlength="9" placeholder="CEP" autocomplete="off" minlength="9" value="<?=$endereco->getCep();?>"  onkeyup="tamanhoCampo()">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <input type="text" name="logradouro" id="logradouro" class="form-control" required="required" placeholder="Logradouro" autocomplete="off" value="<?=$endereco->getLogradouro();?>">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="numero" id="numero" class="form-control" placeholder="Nº" autocomplete="off" value="<?=$endereco->getNumero();?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" name="cidade" id="cidade" class="form-control" required="required" placeholder="Cidade" autocomplete="off" value="<?=$endereco->getCidade();?>" >
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="bairro" id="bairro" class="form-control" required="required" placeholder="Bairro" autocomplete="off" value="<?=$endereco->getBairro();?>" >
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="estado" id="estado" class="form-control" required="required" placeholder="Estado" maxlength="2" minlength="2" autocomplete="off" value="<?=$endereco->getEstado();?>">
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="complemento" class="form-control" placeholder="Quadra, apto ..." autocomplete="off" value="<?=$endereco->getComplemento();?>">
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
                                
                                <br>
                                <div class="form-group">
                                    <a type="submit" href="desativar-cliente.php?p=<?=$p;?>" class="btn btn-btn btn-warning"><i class="fa fa-trash"></i>&nbsp</a>
                                    <small>Desativar perfil</small>
                                </div>
                            </div>
                        </form>            
                </div>
            </div>
        </div>  
    </section>

<?php require_once 'footer.php'; ?>