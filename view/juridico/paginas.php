<div class="container">
    <div class="row">
        <div class="col-sm-12 overflow">
           <div class="social-icons pull-left">
                <ul class="nav nav-pills">

                    <?php if ($pagina->getFacebook() != '') { ?>
                        <li><a href="<?=$pagina->getFacebook();?>"><i class="fa fa-facebook"></i></a></li>
                    <?php } ?>
                    <?php if ($pagina->getInstagram() != '') { ?>
                        <li><a href="<?=$pagina->getInstagram();?>"><i class="fa fa-instagram"></i></a></li>
                    <?php } ?>
                    <?php if ($pagina->getPinterest() != '') { ?>
                        <li><a href="<?=$pagina->getPinterest();?>"><i class="fa fa-pinterest"></i></a></li>
                    <?php } ?>
                    <?php if ($pagina->getTwitter() != '') { ?>
                        <li><a href="<?=$pagina->getTwitter();?>"><i class="fa fa-twitter"></i></a></li>
                    <?php } ?>
                    <?php if ($pagina->getGoogle() != '') { ?>
                        <li><a href="<?=$pagina->getGoogle();?>"><i class="fa fa-google-plus"></i></a></li>
                    <?php } ?>
                    <?php if ($pagina->getSite() != '') { ?>
                        <li><a href="<?=$pagina->getSite();?>"><i class="fa fa-globe"></i></a></li>
                    <?php } ?>
                </ul>
            </div> 
        </div>
     </div>
</div>