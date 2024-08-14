
<?php
include './load_data.php';
?>
<!-- start header -->
<header>
            <!-- start navigation -->
            <nav class="navbar navbar-expand-lg header-light bg-white border-bottom border-color-extra-medium-gray header-reverse" data-header-hover="light">
                <div class="container-fluid"> 
                    <div class="col-auto">
                        <a class="navbar-brand" href="index01.html">
                            <img src="https://dir3.databeam.eu/assets/<?php echo $logo ?? 'photo gerant non disponible'; ?>" data-at2x="https://dir3.databeam.eu/assets/<?php echo $logo ?? 'photo gerant non disponible'; ?>" alt="" class="default-logo">
                            <img src="https://dir3.databeam.eu/assets/<?php echo $logo ?? 'photo gerant non disponible'; ?>" data-at2x="https://dir3.databeam.eu/assets/<?php echo $logo ?? 'photo gerant non disponible'; ?>" alt="" class="alt-logo">
                            <img src="https://dir3.databeam.eu/assets/<?php echo $logo ?? 'photo gerant non disponible'; ?>" data-at2x="https://dir3.databeam.eu/assets/<?php echo $logo ?? 'photo gerant non disponible'; ?>" alt="" class="mobile-logo">
                        </a>
                    </div>
                    <div class="col-auto menu-order left-nav ps-60px lg-ps-20px">
                        <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                            <ul class="navbar-nav alt-font">
                                <li class="nav-item"><a href="index01.html" class="nav-link">Home</a></li> 
                                <li class="nav-item"><a href="#contact" class="nav-link">Nous contacter</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto ms-auto ps-lg-0 d-none d-sm-flex"> 
                        <div class="d-none d-xl-flex me-25px">
                            <div class="d-flex align-items-center widget-text fw-600 alt-font"><a href="tel:<?php echo $telephone ?? 'telephone gerant non disponible'; ?>" class="d-inline-block"><span style="background: <?php echo $couleur_secondaire ?? 'couleur seg non disponible'; ?> " class="d-inline-block align-middle me-10px  h-45px w-45px text-center rounded-circle fs-16 lh-46 text-base-color"><i class="feather icon-feather-phone-outgoing"></i></span><?php echo $telephone ?? 'telephone gerant non disponible'; ?><span class="d-none d-xxl-inline-block"></span></a></div>
                        </div>
                        <div class="header-icon">
                            <div class="header-button">
                                <a href="https://www.booking.com/Share-JwOuedq" class="btn btn-base-color btn-small border-radius-50px btn-hover-animation-switch px-4">
                                    <span> 
                                        <span class="btn-text alt-font">Réserver</span> 
                                        <span class="btn-icon"><i class="feather icon-feather-arrow-right icon-very-small"></i></span>
                                        <span class="btn-icon"><i class="feather icon-feather-arrow-right icon-very-small"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- end navigation -->
        </header>
        <!-- end header -->