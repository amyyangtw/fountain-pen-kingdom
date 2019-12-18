<header>
    <nav class="border navbar navbar-expand-md navbar-light bg-light py-3">
        <div class="container">
            <a class="mr-auto" href="<?=URLROOT;?>"><img class="nav-logo" src="<?=URLROOT;?>/img/logo_dark.png" alt="<?=SITENAME;?>"></a>
                <div class="d-flex flex-cloumn">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">關於我們</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">鋼筆的故事</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT; ?>/products/productList">商品店鋪</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">最新活動</a>
                            </li>
                        </ul>
                    </div>
                    <ul class="d-flex flex-row">
                        <li>
                            <a class="btn"><i class="nav-icon fa fa-search fa-fw"></i></a>
                        </li>

                        <?php if(isset($_SESSION['user_id'])) :?>
                        <li>
                            <a class="btn" href="<?php echo URLROOT; ?>/users/logout">logout</a>
                        </li>
                        <?php else :?>
                        <li>
                            <a class="btn" href="<?php echo URLROOT; ?>/users/login"><i class="nav-icon fa fa-user fa-fw"></i></a>
                        </li>
                        <?php endif;?>


                        <li>
                            <a class="btn"><i class="nav-icon fa fa-shopping-cart fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
    </nav>
</header>
