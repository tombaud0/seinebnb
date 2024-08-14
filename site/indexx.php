<?php
include 'load_data.php';
include 'structure/carousel.php';

?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title><?php echo $titre ?? 'titre non disponible'; ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="author" content="ThemeZaa">
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <meta name="description" content="Bienvenue Au Moulin St Nicol Bed & Breakfast, un ancien moulin du XIXème situé au coeur d'un joli parc fleuri ou coule une rivière nommée la Claire.">
        <!-- favicon icon -->
        <link rel="shortcut icon" href="https://dir3.databeam.eu/assets/<?php echo $photo_gerant ?? 'photo gerant non disponible'; ?>">
        <link rel="apple-touch-icon" href="https://dir3.databeam.eu/assets/<?php echo $photo_gerant ?? 'photo gerant non disponible'; ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="https://dir3.databeam.eu/assets/<?php echo $photo_gerant ?? 'photo gerant non disponible'; ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="https://dir3.databeam.eu/assets/<?php echo $photo_gerant ?? 'photo gerant non disponible'; ?>">
        <!-- google fonts preconnect -->
        <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- style sheets and font icons  -->
        <link rel="stylesheet" href="../files/css/vendors.min.css"/>
        <link rel="stylesheet" href="../files/css/icon.min.css"/>
        <link rel="stylesheet" href="../files/css/style.css"/>
        <link rel="stylesheet" href="../files/css/responsive.css"/>
        <link rel="stylesheet" href="../files/demos/real-estate/real-estate.css" />

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <style>
            #map {  
                height: 400px;
                overflow: hidden;
                padding-top: 0;
                z-index: 1;
            
            }
        </style>
    </head>
    <body data-mobile-nav-style="classic">
        
        <style>
            
            :root {
                --base-color: <?php echo $couleur_principale ?? 'couleur princip non disponible'; ?> ;
            }
            
            .carousel-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

        
        
        </style>

        <?php include 'structure/header.php'; ?>


        
        <!-- start page title -->
        <section class="cover-background page-title-big-typography ipad-top-space-margin">
            <div class="container">
                <div class="row align-items-center align-items-lg-end justify-content-center extra-very-small-screen g-0">
                    <div class="col-xl-7 col-lg-8 position-relative page-title-extra-small md-mb-30px md-mt-auto" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <h3 class="alt-font fs-70 fw-600 text-dark-gray mb-15px ls-minus-1px"><?php echo $titre ?? 'Titre non disponible'; ?></h3>
                        <h1 class="mb-0 d-flex"><i class="feather icon-feather-map-pin icon-extra-medium text-base-color me-5px"></i><?php echo $adresse ?? 'Adresse non disponible'; ?></h1>
                    </div>
                    <div class="col-lg-3 offset-xl-2 offset-lg-1 border-start border-2 border-color-base-color ps-40px sm-ps-25px md-mb-auto">
                        <h4 class="text-dark-gray fw-700 alt-font mb-5px"><?php echo $prix ?? 'Prix non disponible'; ?> €</h4>
                        <span class="fw-500 fs-18">Prix à la nuitée.</span>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title -->
        <!-- start section -->
        <section class="p-0 overflow-hidden">
            <div class="container-fluid p-0"> 
                <div class="row row-cols-1 justify-content-center">
                    <!-- start content carousal item -->
                    <div class="col">
                        <div class="swiper slider-four-slide swiper-dark-pagination swiper-pagination-style-3" data-slider-options='{ "slidesPerView": 1, "spaceBetween": 20, "loop": true, "pagination": { "el": ".slider-four-slide-pagination", "clickable": true }, "autoplay": { "delay": 3000, "disableOnInteraction": false }, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 3 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 } }, "effect": "slide" }'>
                            <div class="swiper-wrapper">
                                <!-- start content carousal items dynamically -->
                                <?php foreach ($images as $image): ?>
                                    <div class="swiper-slide carousel-image">
                                        <img src="https://dir3.databeam.eu/assets/<?php echo htmlspecialchars($image); ?>" alt="" style="height: 576px;" class="carousel-image"/>
                                    </div>
                                <?php endforeach; ?>
                                <!-- end content carousal items dynamically -->
                            </div>
                            
                            <!-- start slider navigation -->
                            <div class="slider-one-slide-prev-1 icon-very-small bg-white h-40px w-40px swiper-button-prev slider-navigation-style-01">
                                <i class="feather icon-feather-arrow-left fs-20 text-light-gray"></i>
                            </div>
                            <div class="slider-one-slide-next-1 icon-very-small bg-white h-40px w-40px swiper-button-next slider-navigation-style-01">
                                <i class="feather icon-feather-arrow-right fs-20 text-light-gray"></i>
                            </div> 
                            <!-- end slider navigation -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section --> 
        <section class="pt-30px pb-30px border-bottom border-color-extra-medium-gray">
            <div class="container"> 
                <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2">
                    <div class="col text-center border-end xs-border-end-0 border-color-extra-medium-gray alt-font md-mb-15px">
                        <span class="fs-19 text-dark-gray fw-600">Superficie : </span> <?php echo $prix ?? 'Prix non disponible'; ?> m²
                    </div>
                    <div class="col text-center border-end md-border-end-0 border-color-extra-medium-gray alt-font md-mb-15px">
                        <span class="fs-19 text-dark-gray fw-600">Rénové en : </span> </span> <?php echo $travaux ?? 'Travaux non disponible'; ?>
                    </div>
                    <div class="col text-center border-end xs-border-end-0 border-color-extra-medium-gray alt-font sm-mb-15px">
                        <span class="fs-19 text-dark-gray fw-600">Localisation :</span> </span> <?php echo $ville ?? 'Ville non disponible'; ?>
                    </div>
                    <div class="col text-center alt-font">
                        <span class="fs-19 text-dark-gray fw-600">Satut :</span> </span> <?php echo $statut ?? 'Statut non disponible'; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->  
        <section class="position-relative" id="description">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 md-mb-50px">
                        <div class="row mb-15px">
                            <div class="col-12">
                                <span class="text-dark-gray fs-24 fw-600 alt-font mb-15px d-block">Description</span>
                                <p></span> <?php echo $description_longue ?? 'description longue non disponible'; ?></p>
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="col bg-very-light-gray p-35px lg-ps-15px lg-pe-15px border-radius-6px fs-16">
                                <div class="row row-cols-2 row-cols-md-4 row-cols-sm-2">
                                    <div class="col text-center border-end border-color-extra-medium-gray sm-mb-30px">
                                        <img src="../files/images/demo-real-estate-icon-bed.svg" class="w-50px mb-15px" alt="">
                                        <span class="text-dark-gray d-block lh-20"><?php echo $chambre ?? 'Chambre non disponible'; ?> Chambres</span>
                                    </div>
                                    <div class="col text-center border-end sm-border-end-0 border-color-extra-medium-gray sm-mb-30px">
                                        <img src="../files/images/demo-real-estate-icon-bath.svg" class="w-50px mb-15px" alt="">
                                        <span class="text-dark-gray d-block lh-20"><?php echo $salle_de_bain ?? 'SDB non disponible'; ?> Salles de bains</span>
                                    </div>
                                    <div class="col text-center border-end border-color-extra-medium-gray">
                                        <img src="../files/images/demo-real-estate-icon-car.svg" class="w-50px mb-15px" alt="">
                                        <span class="text-dark-gray d-block lh-20"><?php echo $parking ?? 'Parking non disponible'; ?> Parking</span>
                                    </div>
                                    <div class="col text-center">
                                        <img src="../files/images/demo-real-estate-icon-swimming.svg" class="w-50px mb-15px" alt="">
                                        <span class="text-dark-gray d-block lh-20"><?php echo $lieu ?? 'Lieu non disponible'; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-7" id="détails">
                            <div class="col-12">
                                <span class="text-dark-gray fs-24 fw-600 alt-font mb-25px d-block">Détails</span>
                            </div>
                            <div class="col-xl-6">
                                <div class="row g-0 align-items-center mb-15px pb-15px border-bottom border-color-extra-medium-gray">
                                    <div class="col">
                                        <!-- start features box item -->
                                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                                            <div class="feature-box-icon me-10px">
                                                <img src="../files/images/demo-real-estate-property-details-08.svg" class="w-25px" alt="">
                                            </div>
                                            <div class="feature-box-content">
                                                <span class="text-dark-gray">Nom :</span>
                                            </div>
                                        </div>
                                        <!-- end features box item -->
                                    </div>
                                    <div class="col"><?php echo $titre ?? 'titre non disponible'; ?></div>
                                </div>
                                <div class="row g-0 align-items-center mb-15px pb-15px border-bottom border-color-extra-medium-gray">
                                    <div class="col">
                                        <!-- start features box item -->
                                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                                            <div class="feature-box-icon me-10px">
                                                <img src="../files/images/demo-real-estate-property-details-09.svg" class="w-25px" alt="">
                                            </div>
                                            <div class="feature-box-content">
                                                <span class="text-dark-gray">Propriété :</span>
                                            </div>
                                        </div>
                                        <!-- end features box item -->
                                    </div>
                                    <div class="col"><?php echo $type ?? 'Type non disponible'; ?></div>
                                </div>
                                <div class="row g-0 align-items-center mb-15px pb-15px border-bottom border-color-extra-medium-gray">
                                    <div class="col">
                                        <!-- start features box item -->
                                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                                            <div class="feature-box-icon me-10px">
                                                <img src="../files/images/demo-real-estate-property-details-12.svg" class="w-25px" alt="">
                                            </div>
                                            <div class="feature-box-content">
                                                <span class="text-dark-gray">Superficie :</span>
                                            </div>
                                        </div>
                                        <!-- end features box item -->
                                    </div>
                                    <div class="col"><?php echo $superficie ?? 'Superficie non disponible'; ?> m²</div>
                                </div>
                                <div class="row g-0 align-items-center mb-15px pb-15px border-bottom border-color-extra-medium-gray">
                                    <div class="col">
                                        <!-- start features box item -->
                                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                                            <div class="feature-box-icon me-10px">
                                                <img src="../files/images/demo-real-estate-property-details-15.svg" class="w-25px" alt="">
                                            </div>
                                            <div class="feature-box-content">
                                                <span class="text-dark-gray">Cilmatisation:</span>
                                            </div>
                                        </div>
                                        <!-- end features box item -->
                                    </div>
                                    <div class="col"><?php echo $clim ?? 'Cilm non disponible'; ?></div>
                                </div>
                                <div class="row g-0 align-items-center lg-mb-15px lg-pb-15px lg-border-bottom border-color-extra-medium-gray">
                                    <div class="col">
                                        <!-- start features box item -->
                                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                                            <div class="feature-box-icon me-10px">
                                                <img src="../files/images/demo-real-estate-property-details-13.svg" class="w-25px" alt="">
                                            </div>
                                            <div class="feature-box-content">
                                                <span class="text-dark-gray">Piscine :</span>
                                            </div>
                                        </div>
                                        <!-- end features box item -->
                                    </div>
                                    <div class="col"><?php echo $piscine ?? 'Piscine non disponible'; ?></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="row g-0 align-items-center mb-15px pb-15px border-bottom border-color-extra-medium-gray">
                                    <div class="col">
                                        <!-- start features box item -->
                                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                                            <div class="feature-box-icon me-10px">
                                                <img src="../files/images/demo-real-estate-property-details-06.svg" class="w-25px" alt="">
                                            </div>
                                            <div class="feature-box-content">
                                                <span class="text-dark-gray">Parking :</span>
                                            </div>
                                        </div>
                                        <!-- end features box item -->
                                    </div>
                                    <div class="col"><?php echo $Parking ?? 'Parking non disponible'; ?></div>
                                </div>
                                <div class="row g-0 align-items-center mb-15px pb-15px border-bottom border-color-extra-medium-gray">
                                    <div class="col">
                                        <!-- start features box item -->
                                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                                            <div class="feature-box-icon me-10px">
                                                <img src="../files/images/demo-real-estate-property-details-11.svg" class="w-25px" alt="">
                                            </div>
                                            <div class="feature-box-content">
                                                <span class="text-dark-gray">Languages :</span>
                                            </div>
                                        </div>
                                        <!-- end features box item -->
                                    </div>
                                    <div class="col"><?php echo $language ?? 'Language non disponible'; ?></div>
                                </div>
                                <div class="row g-0 align-items-center mb-15px pb-15px border-bottom border-color-extra-medium-gray">
                                    <div class="col">
                                        <!-- start features box item -->
                                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                                            <div class="feature-box-icon me-10px">
                                                <img src="../files/images/demo-real-estate-property-details-10.svg" class="w-25px" alt="">
                                            </div>
                                            <div class="feature-box-content">
                                                <span class="text-dark-gray">Extérieur :</span>
                                            </div>
                                        </div>
                                        <!-- end features box item -->
                                    </div>
                                    <div class="col"><?php echo $exterieur ?? 'Exterieur non disponible'; ?></div>
                                </div>
                                <div class="row g-0 align-items-center mb-15px pb-15px border-bottom border-color-extra-medium-gray">
                                    <div class="col">
                                        <!-- start features box item -->
                                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                                            <div class="feature-box-icon me-10px">
                                                <img src="../files/images/demo-real-estate-property-details-14.svg" class="w-25px" alt="">
                                            </div>
                                            <div class="feature-box-content">
                                                <span class="text-dark-gray">Construit en :</span>
                                            </div>
                                        </div>
                                        <!-- end features box item -->
                                    </div>
                                    <div class="col"><?php echo $origine_batiment ?? 'Origine Batiment non disponible'; ?></div>
                                </div>
                                <div class="row g-0 align-items-center">
                                    <div class="col">
                                        <!-- start features box item -->
                                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                                            <div class="feature-box-icon me-10px">
                                                <img src="../files/images/demo-real-estate-property-details-09.svg" class="w-25px" alt="">
                                            </div>
                                            <div class="feature-box-content">
                                                <span class="text-dark-gray">Etages :</span>
                                            </div>
                                        </div>
                                        <!-- end features box item -->
                                    </div>
                                    <div class="col"><?php echo $etage ?? 'etage non disponible'; ?></div>
                                </div>
                            </div>
                        </div> 
                        
                        <div class="row mt-7 sm-p-5">

                            


                            <div id="map" class="border-radius-5px"></div>
                            <script>
                                // Coordonnées du point à afficher
                                var coords = [<?php echo $latitude ?? 'lat non disponible'; ?>, <?php echo $longitude ?? 'longi non disponible'; ?>]; // Paris, France

                                // Créer la carte centrée sur les coordonnées avec un zoom plus élevé
                                var map = L.map('map').setView(coords, 13);

                                // Ajouter une couche de carte en noir et blanc (OpenStreetMap Black & White)
                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                                    maxZoom: 18,
                                }).addTo(map);

                                // Ajouter un marqueur moderne à la carte
                                var marker = L.marker(coords, {
                                    icon: L.icon({
                                        iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                                        iconSize: [40, 40],
                                        iconAnchor: [20, 40],
                                    })
                                }).addTo(map);

                                // // Fonction pour ouvrir l'itinéraire sur Google Maps
                                // function openRoute() {
                                //     var startCoords = '48.8566,2.3522'; // Point de départ (Paris ici, modifiable)
                                //     var destination = 'Lyon, France'; // Destination (ici Lyon)

                                //     var url = `https://www.google.com/maps/dir/?api=1&origin=${startCoords}&destination=${destination}&travelmode=driving`;

                                //     window.open(url, '_blank');
                                // }
                            </script>

                            <!-- <div class="button-container">
                                <button class="route-button" onclick="openRoute()">Lancer l'itinéraire vers Paris</button>
                            </div> -->

                        </div>

                        


                        <div class="row mt-3" id="caractéristiques">
                            <div class="col-12">
                                <p>Vous séjournerez à 2,7 km de la plage de Butin et à 16 km de la gare SNCF de Trouville-Deauville. L'aéroport de Deauville-Normandie, le plus proche, est implanté à 9 km.</p>
                            </div>
                        </div>
                        
                        <div class="row mt-7" >
                            <div class="col-12">
                                <span class="text-dark-gray fs-24 fw-600 alt-font mb-15px d-block">Caractéristiques</span>
                            </div>
                            <div class="col-6 col-sm-4">
                                <!-- start list style -->
                                <ul class="list-style-02 ps-0 mb-0">
                                    <li><i class="bi bi-check-circle icon-small me-10px"></i>Télévision</li>
                                    <li><i class="bi bi-check-circle icon-small me-10px"></i>Salle de Bains</li>
                                    <li><i class="bi bi-check-circle icon-small me-10px"></i>Machine a café</li>
                                    <li><i class="bi bi-check-circle icon-small me-10px"></i>Connexion wifi</li> 
                                </ul>
                                <!-- end list style -->
                            </div>
                            <div class="col-6 col-sm-4">
                                <!-- start list style -->
                                <ul class="list-style-02 ps-0 mb-0">
                                    <li><i class="bi bi-check-circle icon-small me-10px"></i>Service d'étages</li>
                                    <li><i class="bi bi-check-circle icon-small me-10px"></i>Jardin</li>
                                    <li><i class="bi bi-check-circle icon-small me-10px"></i>Petit-déjeuner</li>
                                    <li><i class="bi bi-check-circle icon-small me-10px"></i>Chambres familiales</li> 
                                </ul>
                                <!-- end list style -->
                            </div>
                            <div class="col-6 col-sm-4">
                                <!-- start list style -->
                                <ul class="list-style-02 ps-0 mb-0">
                                    <li><i class="bi bi-check-circle icon-small me-10px"></i>Chambres non-fumeurs</li>
                                    <li><i class="bi bi-check-circle icon-small me-10px"></i>Espace Café</li>
                                    <li><i class="bi bi-check-circle icon-small me-10px"></i>Espace Salon</li>
                                    <li><i class="bi bi-check-circle icon-small me-10px"></i>Climatisation</li> 
                                </ul>
                                <!-- end list style -->
                            </div>
                        </div>
                        <div class="row mt-7" id="plan-rdc">
                            <div class="col-12">
                                <span class="text-dark-gray fs-24 fw-600 alt-font mb-25px d-block">Salle de Sport</span>
                                <img src="https://dir3.databeam.eu/assets/<?php echo $photo_atout_1 ?>" class="border-radius-6px" alt="">
                            </div>
                        </div>
                        <div class="row mt-7" id="plan-1">
                            <div class="col-12">
                                <span class="text-dark-gray fs-24 fw-600 alt-font mb-25px d-block">Piscine</span>
                                <img src="https://dir3.databeam.eu/assets/<?php echo $phot_atout_2 ?>" class="border-radius-6px" alt="">
                            </div>
                        </div>
                        <div class="row mt-7" id="plan-2">
                            <div class="col-12">
                                <span class="text-dark-gray fs-24 fw-600 alt-font mb-25px d-block">Espace Bureau</span>
                                <img src="https://dir3.databeam.eu/assets/<?php echo $photo_atout_3 ?>" class="border-radius-6px" alt="">
                            </div>
                        </div>
                        
                    </div>

                    <!-- start sticky -->
                    <div class="col-xl-4 offset-xl-1 col-lg-5" id="contact">
                        <div class=" border-radius-6px position-sticky top-120px" style="background:<?php echo $couleur_secondaire ?? 'couleur seg non disponible'; ?>;" >
                            <div class="bg-base-color border-radius-6px feature-box feature-box-left-icon-middle overflow-hidden icon-with-text-style-08 ps-35px pe-35px pt-25px pb-20px xs-p-25px">
                                <!-- start features box item -->
                                <div class="feature-box-icon feature-box-icon-rounded w-90px h-90px overflow-visible me-20px position-relative">
                                    <img src="https://dir3.databeam.eu/assets/<?php echo $photo_gerant ?? 'photo gerant non disponible'; ?>" class="rounded-circle" alt="">
                                    <span class="animation-zoom d-inline-block bg-orange border border-2 border-color-white h-20px w-20px border-radius-100 position-absolute right-0px top-5px"></span>
                                </div>
                                <!-- end features box item -->
                                <!-- start features box item -->
                                <div class="feature-box-content last-paragraph-no-margin">
                                    <span class="text-white alt-font fw-600 fs-20 d-block"><?php echo $titre ?? 'titre non disponible'; ?></span>
                                    <div class="lh-24 d-block">
                                        <span class="me-5px text-white opacity-8"><?php echo $gerant ?? 'gerant non disponible'; ?></span>
                                        <div class="bg-white border-radius-2px text-uppercase alt-font fw-700 text-dark-gray fs-12 lh-24 ps-10px pe-10px d-inline-block align-middle">Vérifié</div>
                                    </div>
                                </div>
                                <!-- end features box item -->
                                <!-- start social icon -->
                                <div class="elements-social social-icon-style-02 mt-5px w-100 text-start text-lg-center">
                                    <ul class="medium-icon">
                                        <li class="m-0"><a class="facebook text-white" href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li class="m-0"><a class="dribbble text-white" href="http://www.dribbble.com" target="_blank"><i class="fa-brands fa-dribbble"></i></a></li> 
                                        <li class="m-0"><a class="twitter text-white" href="http://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i></a></li> 
                                        <li class="m-0"><a class="instagram text-white" href="http://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a></li> 
                                    </ul>
                                </div>
                                <!-- end social icon -->
                            </div>
                            <div class="ps-45px pe-45px pt-35px pb-45px xs-p-25px contact-form-style-01 mt-0">
                                <div class="mb-20px last-paragraph-no-margin">
                                    <p class="mb-0 alt-font fw-500 text-dark-gray"><i class="feather icon-feather-phone-call icon-small text-base-color me-10px"></i><span class="fw-600  d-inline-block">Tel :</span><a href="tel:0660281701" class="text-dark-gray text-base-color-hover"> 0660281701</a></p>
                                    <p class="alt-font fw-500 text-dark-gray"><i class="feather icon-feather-mail icon-small text-base-color me-10px"></i><span class="fw-600 w-20 sm-w-15 xs-w-20 d-inline-block">Email :</span><a href="mailto:votre@email.com" class="text-dark-gray text-decoration-line-bottom">votre@email.com</a></p>
                                </div>
                                <span id="contact" class="alt-font fs-20 fw-600 text-dark-gray d-block mb-25px">Laissez votre message ici</span>
                                <!-- start contact form -->
                                <form action="emails.php" method="post">
                                    <div class="position-relative form-group mb-15px">
                                        <span class="form-icon"><i class="bi bi-emoji-smile"></i></span>
                                        <input type="text" name="name" class="form-control border-color-white box-shadow-large required" placeholder="Votre nom*" />
                                    </div>
                                    <div class="position-relative form-group mb-15px">
                                        <span class="form-icon"><i class="bi bi-envelope"></i></span>
                                        <input type="email" name="email" class="form-control border-color-white box-shadow-large required" placeholder="Votre adresse Email*" />
                                    </div>
                                    <div class="position-relative form-group mb-15px">
                                        <span class="form-icon"><i class="bi bi-telephone-outbound"></i></span>
                                        <input type="tel" name="phone" class="form-control border-color-white box-shadow-large" placeholder="Votre numéro de téléphone*" />
                                    </div>
                                    <div class="position-relative form-group form-textarea">
                                        <span class="form-icon"><i class="bi bi-chat-square-dots"></i></span>
                                        <textarea placeholder="Votre message" name="comment" class="form-control border-color-white box-shadow-large" rows="3"></textarea>
                                        <input type="hidden" name="redirect" value="">
                                        <button class="btn btn-small border-radius-50px btn-base-color mt-20px submit " type="submit">Envoyer le message</button>
                                        <div class="form-results mt-20px d-none"></div>
                                    </div>
                                </form>
                                <!-- end contact form -->
                            </div>
                        </div>
                    </div>
                    <!-- end sticky -->
                </div>
            </div>
        </section>
        <!-- end section --> 
        
        <?php include 'structure/footer.php'; ?>

        <!-- start scroll progress -->
        <div class="scroll-progress d-none d-xxl-block">
            <a href="#" class="scroll-top" aria-label="scroll">
                <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
            </a>
        </div>
        <!-- end scroll progress -->
        <!-- javascript libraries -->
        <script type="text/javascript" src="../files/js/jquery.js"></script>
        <script type="text/javascript" src="../files/js/vendors.min.js"></script>
        <script type="text/javascript" src="../files/js/main.js"></script>

    </body>
</html>



<!-- start navigation
<li class="nav-item"><a href="gallery.html" class="nav-link">Nos Suites<span class="label bg-light-red text-red border-radius-26px">Option</span></a></li> 
<li class="nav-item"><a href="gallery.html" class="nav-link">Gallerie<span class="label bg-light-red text-red border-radius-26px">Option</span></a></li>
<li class="nav-item"><a href="demo-real-estate-blog.html" class="nav-link">Le Blog<span class="label bg-light-red text-red border-radius-26px">Option</span></a></li> 
-->
 


    

