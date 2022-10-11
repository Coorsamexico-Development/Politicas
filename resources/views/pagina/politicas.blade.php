<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Políticas Departamento Legal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
     <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <!-- Favicons -->
    <link href="img/icono.png" rel="icon">
    <link href="img/apple-touch-icon.html" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>
        
    <link href="css/style.css" rel="stylesheet">
    <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>
<body>
    <!--==========================
    Header
  ============================-->
    <header id="header">
        <div class="container-fluid">
            <div id="logo" class="pull-left">
                <a href="#intro" class="scrollto"><img src="img/coorsa.png" width="160"></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="#intro">Inicio</a></li>
                    <li class="menu-has-strong"><a href="#">FINIQUITOS</a>
                        <ul>
                            @foreach ($respuesta->finiquitos as $finiquito)

                          <li><a>{{$finiquito->nombre}} &nbsp{{$finiquito->apellidop}}&nbsp {{$finiquito->apellidom}},&nbsp &nbsp &nbsp &nbsp   <strong>Fecha: {{$finiquito->fecha}}</strong></a></li>
                          @endforeach
                        </ul>
                    </li>
                    <li><a href="#portfolio">Políticas</a></li>
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline"><img src="img/login.png" width="100"></a>
                </ul>
            </nav>
            <!-- #nav-menu-container -->
        </div>
    </header>
    <!-- #header -->
    <!--==========================
    Intro Section
  ============================-->
    <section id="intro">
        <div class="intro-container">
            <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators"></ol>
                <div id="carousel" class="carousel-inner" role="listbox">
                </div>
                <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <main id="main">
        <!--==========================
      Portfolio Section
        ============================-->
        <section id="portfolio" class="section-bg">
            <div class="container">
                <header class="section-header">
                    <h3 class="section-title">Políticas</h3>
                </header>
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">Todas</li>
                            {{--  <li data-filter=".filter-Covid">Covid</li>
                            <li data-filter=".filter-Reglamentos">Reglamentos</li>
                            <li data-filter=".filter-Políticas">Políticas</li>
                            <li data-filter=".filter-Revision">En revision</li>
                            <li data-filter=".filter-Formatos">Formatos</li>  --}}
                        </ul>
                    </div>
                </div>
                
                <div id="cont-politics" class="row portfolio-container" style="position: relative; height: 0px;">
                </div>
            </div>
        </section>
        <!-- #portfolio -->
    </main>
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- <div id="preloader"></div> -->
    <!-- JavaScript Libraries -->

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/superfish/hoverIntent.js"></script>
    <script src="lib/superfish/superfish.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js" defer></script>
    <script src="lib/touchSwipe/jquery.touchSwipe.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
    <!-- Contact Form JavaScript File -->
    <!-- Template Main Javascript File -->
    <script src="js/despliegue.js"></script>
    <script src="js/main.js" defer></script>

</body>
</html>
