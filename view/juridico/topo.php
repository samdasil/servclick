<div class="navbar navbar-inverse" role="banner">
            
    <div class="container">
        
        <div class="navbar-header">
            <div class="topo">
                <a class="arrow" href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
                <div class="topo-arrow">
                    <label>
                        <?php 
                            $titulo=explode('/', ucfirst($_SERVER['REQUEST_URI']) ) ; 
                            $titulo=explode('.php',end($titulo));
                            echo ucfirst($titulo[0]); 
                        ?>
                            
                    </label>
                </div>
            </div>

        </div>
        
    </div>

</div>