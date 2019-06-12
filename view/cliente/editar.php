<?php 

    require_once 'header.php'; 

    $c          = new ControllerCliente();
    $e          = new ControllerEndereco();
    $cliente    = new Cliente();
    $endereco   = new Endereco();
    $id         = base64_decode($_SESSION['session']);
    $cliente    = $c->carregarCliente($id);
    $endereco   = $e->carregarEndereco($cliente->getEndereco());

    // chamada do controller
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

    <header id="header"> <?php require_once 'menu.php'; ?> </header>

    <section id="portfolio">
        <div class="container">

            <?php require_once 'alert.php'; ?>

            <div class="col-md-4 col-sm-12">
                <div class="contact-form bottom">

                    <br>
                    <form name="form" method="post" action="" onsubmit="return validFormCliente()" enctype="multipart/form-data">

                        <input type="hidden" name="idcliente" value="<?=$cliente->getIdcliente();?>">
                        <input type="hidden" name="endereco" value="<?=$cliente->getEndereco();?>">
                        <input type="hidden" name="status_" value="<?=$cliente->getStatus_();?>">

                        <!--<label class="form-group">Foto para perfil</label>-->

                        <div class="col-sm-6">
                            <input type="hidden" name="img"  value="<?=$cliente->getFoto();?>">
                            <img src="../../assets/images/cliente/<?=$cliente->getFoto();?>" class="img-responsive img-perfil" alt="Clique para selecionar nova foto" name="img" id="img" >
                        </div>
                        
                        <div class="form-group">
                            <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
                            <input type="file" name="foto" id="foto" class="form-control upload-foto" onchange="alterarImagem()" accept="image/png, image/jpeg">
                            <span class="valid vfoto text-center">Selecione uma foto *</span>
                        </div>

                        <label class="form-group"><i class="fa fa-database">&nbsp&nbsp</i>Dados</label>

                        <div class="form-group">
                            <input type="text" name="cpf" id="cpf" class="form-control" placeholder="CPF" value="<?=$cliente->getCpf();?>" title="CPF" readonly  onkeypress="validoff()">
                            <span class="valid vcpf">Campo obrigatório *</span>
                            <span class="valid vcpf2">CPF inválido *</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" value="<?=$cliente->getNome();?>"  onkeypress="validoff()">
                            <span class="valid vnome">Campo obrigatório *</span>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" required="required" placeholder="E-mail" value="<?=$cliente->getEmail();?>" title="E-mail"  onkeypress="validoff()">
                            <span class="valid vemail">Campo obrigatório *</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" value="<?=$cliente->getFone();?>" maxlength="15" minlength="15"  onkeypress="validoff()">
                            <span class="valid vfone">Campo obrigatório *</span>
                        </div>
                        
                        <label class="form-group"><i class="fa fa-map-marker">&nbsp&nbsp</i>Endereço</label>

                        <div class="form-group">
                            <input type="text" name="cep" id="cep" class="form-control" required="required" placeholder="CEP" value="<?=$endereco->getCep();?>" minlength="9" maxlength="9" onkeyup="tamanhoCampo()" >
                            <span class="valid vcep">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Logradouro" value="<?=$endereco->getLogradouro();?>"  onkeypress="validoff()">
                            <span class="valid vlogradouro">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" value="<?=$endereco->getCidade();?>"  onkeypress="validoff()">
                            <span class="valid vcidade">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro" value="<?=$endereco->getBairro();?>"  onkeypress="validoff()">
                            <span class="valid vbairro">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="estado" id="estado" class="form-control" placeholder="Estado" value="<?=$endereco->getEstado();?>" maxlength="2" minlength="2"  onkeypress="validoff()">
                            <span class="valid vestado">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="numero" id="numero" class="form-control" placeholder="Nº" value="<?=$endereco->getNumero();?>"  onkeypress="validoff()">
                            <span class="valid vnumero">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Quadra, apto ..." value="<?=$endereco->getComplemento();?>">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-submit" value="Enviar Atualização">
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="buttons-action">
                                        <a type="submit" href="desativar.php" class="btn btn-btn btn-warning"><i class="fa fa-trash"></i>&nbsp</a>
                                        <small>Desativar meu perfil</small>
                                    </div>
                                </div>
                            </div>
                        </div>                

                    </form>            

                </div>
            </div>
        </div>
    </section>

<?php require_once 'footer.php'; ?>