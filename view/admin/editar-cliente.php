    
<?php include 'header.php'; ?>

<?php

    $c        = new ControllerCliente();
    $e        = new ControllerEndereco();
    $cliente  = new Cliente();
    $endereco = new Endereco();
    $cliente  = $c->carregarCliente($get);
    $endereco = $e->carregarEnderecoCliente($get);

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) ){

        if((isset($_FILES['foto']['size']) && $_FILES['foto']['size'] != 0) || (isset($_FILES['logo']['size']) && $_FILES['logo']['size'] != 0)) {

            $aFile = $_FILES;
            
        } else {
            
            $aFile = null;
            
        }

        $dados  = $_POST;
        $c->atualizarCliente($dados, $aFile);

    }

?>
    <script type="text/javascript">
        function alterarImagem() {
            
            var input = document.getElementById("foto");
            var fReader = new FileReader();
            fReader.readAsDataURL(input.files[0]);
            fReader.onloadend = function(event){
                var img = document.getElementById("img");
                img.src = event.target.result;
            //document.form.img.src = document.form.foto.files[0].name;   
            }

        }

    </script>

    <!-- script mask -->
    <script type="text/javascript">
        
        $(document).ready(function(){
            $("#cpf").mask('000.000.000-00')
            $("#cep").mask('00000-000')
            $("#fone").mask('(00) 00000-0000')
        })

    </script>

    <section id="portfolio-information" class="padding-top">
        <div class="container">
            <?php include 'novos-profissionais.php'; ?>
            <div class="row">
                <div class="col-sm-6">
                    <br>
                    <h2>Cliente</h2>
                    <form name="form" method="post" action="" enctype="multipart/form-data">

                        <input type="hidden" name="v" value="<?=$v;?>" >
                        <input type="hidden" name="idcliente" value="<?=$cliente->getIdcliente();?>">
                        <input type="hidden" name="status" value="<?=$cliente->getStatus();?>">
                        <input type="hidden" name="perfil" value="<?=$cliente->getPerfil();?>">
                        <input type="hidden" name="login" value="<?=$cliente->getLogin();?>">
                        <input type="hidden" name="senha" value="<?=$cliente->getSenha();?>">

                        <div class="col-sm-6">
                            <label class="form-group">Perfil</label>                        
                            <input type="hidden" name="img" value="<?=$cliente->getFoto();?>">
                            <img src="../../assets/images/cliente/<?=$cliente->getFoto();?>" class="img-responsive" alt="Foto Cliente" name="img" id="img">
                        </div>
                        
                        <div class="form-group">
                            <input type="file" name="foto" id="foto" class="form-control" onchange="alterarImagem()">
                        </div>

                        <label class="form-group">Dados</label>

                        <div class="form-group">
                            <input type="text" name="cpf" id="cpf" class="form-control" placeholder="CPF" value="<?=$cliente->getCpf();?>" >
                        </div>
                        <div class="form-group">
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" value="<?=$cliente->getNome();?>" >
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" required="required" placeholder="E-mail" value="<?=$cliente->getEmail();?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" value="<?=$cliente->getFone();?>" maxlength="15" minlength="15" >
                        </div>
                        
                        <label class="form-group">Endereço</label>

                        <div class="form-group">
                            <input type="text" name="cep" id="cep" class="form-control" required="required" placeholder="CEP" value="<?=$endereco->getCep();?>" minlength="9" maxlength="9">
                        </div>
                        <div class="form-group">
                            <input type="text" name="logradouro" id="logradouro" class="form-control" required="required" placeholder="Logradouro" value="<?=$endereco->getLogradouro();?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="cidade" id="cidade" class="form-control" required="required" placeholder="Cidade" value="<?=$endereco->getCidade();?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="bairro" id="bairro" class="form-control" required="required" placeholder="Bairro" value="<?=$endereco->getBairro();?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="estado" id="estado" class="form-control" required="required" placeholder="Estado" value="<?=$endereco->getEstado();?>" maxlength="2" minlength="2">
                        </div>
                        <div class="form-group">
                            <input type="text" name="numero" id="numero" class="form-control" placeholder="Nº" value="<?=$endereco->getNumero();?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Quadra, apto ..." value="<?=$endereco->getComplemento();?>">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-submit" value="Enviar Atualização">
                        </div>
                        <br>
                        <div class="form-group">
                            <a type="submit" href="desativar-cliente.php?v=<?=$v;?>&get=<?=$get;?>" class="btn btn-btn btn-warning"><i class="fa fa-trash"></i>&nbsp</a>
                            <small>Desativar perfil</small>
                        </div>

                    </form>            
                </div>
            </div>
        </div>
    </section>
<?php require_once 'footer.php'; ?>