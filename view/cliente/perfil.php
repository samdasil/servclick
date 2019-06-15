<?php require_once 'header.php'; ?>

    <header id="header"> <?php require_once 'menu.php'; ?> </header>

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><?=$cliente->getNome();?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>

   <section id="portfolio-information" class="padding-top">
        <div class="container">

            <?php require_once 'alert.php'; ?>

            <div class="row padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="col-sm-6" data-wow-duration="500ms" data-wow-delay="300ms">
                    <img src="../../assets/images/cliente/<?=$cliente->getFoto();?>" class="img-responsive img-perfil" alt="Foto do perfil" id="img">
                </div>
                <div class="col-sm-6">
                    <div class="project-name overflow">
                        
                    </div>
                    <div class="project-info overflow">
                         <div class="col-md-3 col-sm-6">
                            <h2 class="titulo">Dados</h2>
                            <strong>CPF</strong>
                            <p id="cpf"><?=$cliente->getCpf();?></p>
                            <strong>E-mail</strong>
                            <p><?=$cliente->getEmail();?></p>
                            <strong>Fone</strong>
                            <p id="fone"><?=$cliente->getFone();?></p>
                            
                        </div>
                    </div>

                    <div class="project-info overflow">
                         <div class="col-md-3 col-sm-6">
                            <h2 class="titulo">Endereço</h2>
                            <strong>Bairro</strong>
                            <p><?=$endereco->getBairro();?>,</p>
                            <strong>Rua</strong>
                            <p><?=$endereco->getLogradouro();?>, <?=$endereco->getNumero();?></p>
                            <strong>Cidade</strong>
                            <p><?=$endereco->getCidade();?>-<?=$endereco->getEstado();?></p>
                        </div>
                    </div>
                    
                    <div class="buttons-action">
                        <div class="col-md-3 col-sm-6 button-fixed-right">
                            <a href="editar.php"><button type="button" class="btn btn-info button-radius"><i class="fa fa-pencil icon-btn "></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require_once 'footer.php'; ?>