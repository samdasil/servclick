<?php require_once 'header.php'; ?>

<header id="header"> <?php require_once 'menu.php'; ?> </header>

<section id="portfolio" class="pt10">
    <div class="container">
        <div class="row">
            <ul class="portfolio-filter text-center">
                <li>
                    <button class="btn btn-default active line" id="op-abertos" href="#"  onclick="filtro(this)">
                        <i class="fa fa-folder-open fa-5x"></i> Aberto
                    </button>
                </li>
                <li>
                    <button class="btn btn-default line" id="op-aceitos" href="#"  onclick="filtro(this)">
                        <i class="fa fa-thumbs-up fa-5x"></i> Aceito
                    </button>
                </li>
                <li>
                    <button class="btn btn-default line" id="op-andamentos" href="#"  onclick="filtro(this)">
                        <i class="fa fa-history fa-5x"></i> Andam.
                    </button>
                </li>
                <li>
                    <button class="btn btn-default line" id="op-finalizados" href="#" onclick="filtro(this)">
                        <i class="fa fa-check fa-5x"></i> Final.
                    </button>
                </li>
            </ul>
        </div>

        <!-- reload -->
        <script type="text/javascript">
            var intervalo = setInterval(function() {$('#load').load('list-servicos.php')}, 25000); 
        </script>

        <div id="load">

            <?php include_once 'list-servicos.php'; ?>

        </div>
        
    </div>
</section>

<?php require_once 'footer.php'; ?>