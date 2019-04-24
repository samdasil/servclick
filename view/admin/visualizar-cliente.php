    
<?php include 'header.php'; ?>

<?php

  $c        = new ControllerCliente();
  $e        = new ControllerEndereco();
  $cliente  = new Cliente();
  $endereco = new Endereco();
  $cliente  = $c->carregarCliente($get);
  $endereco = $e->carregarEnderecoCliente($get);

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
                <div class="col-md-9 col-sm-8">
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                          <div class="contact-form">
                              <h2>Cliente</h2>
                                <form name="form" method="post" action="" enctype="multipart/form-data">
                                    <input type="hidden" name="v" value="<?=$v;?>" >

                                    <input type="hidden" name="idcliente" value="<?=$cliente->getIdcliente();?>">
                                    <div class="form-group">
                                        <label class="form-group">Perfil</label>                        
                                        <input type="hidden" name="img" value="<?=$cliente->getFoto();?>">
                                        <img src="../../assets/images/cliente/<?=$cliente->getFoto();?>" class="img-responsive" alt="Foto Cliente" name="img" id="img" style="width: 25%;" readonly>
                                    </div>
                                    
                                    <label class="form-group">Dados</label>

                                    <div class="form-group">
                                        <input type="text" name="cpf" id="cpf" class="form-control" placeholder="CPF" value="<?=$cliente->getCpf();?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" value="<?=$cliente->getNome();?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required="required" placeholder="E-mail" value="<?=$cliente->getEmail();?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" value="<?=$cliente->getFone();?>" maxlength="15" minlength="15"  readonly>
                                    </div>
                                    
                                    <label class="form-group">Endereço</label>

                                    <div class="form-group">
                                        <input type="text" name="cep" id="cep" class="form-control" required="required" placeholder="CEP" value="<?=$endereco->getCep();?>" minlength="9" maxlength="9" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="logradouro" id="logradouro" class="form-control" required="required" placeholder="Logradouro" value="<?=$endereco->getLogradouro();?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="cidade" id="cidade" class="form-control" required="required" placeholder="Cidade" value="<?=$endereco->getCidade();?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="bairro" id="bairro" class="form-control" required="required" placeholder="Bairro" value="<?=$endereco->getBairro();?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="estado" id="estado" class="form-control" required="required" placeholder="Estado" value="<?=$endereco->getEstado();?>" maxlength="2" minlength="2" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="numero" id="numero" class="form-control" placeholder="Nº" value="<?=$endereco->getNumero();?>" readonly> 
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Quadra, apto ..." value="<?=$endereco->getComplemento();?>" readonly>
                                    </div>

                                    <div class="buttons-action">
                                        <a href="editar-cliente.php?v=<?=$v;?>&get=<?=$get?>"><button type="button" class="btn btn-btn btn-info"><i class="fa fa-pencil"></i>&nbsp Editar</button></a>
                                    </div>
                                    <br>
                                    <div class="topo">
                                        <a href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
                                    </div>
                                </form>  
                            </div>          
                        </div>
                    </div>
                </div>
            
        </div>
    </section>