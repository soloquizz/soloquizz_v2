<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SoloQuizz</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="welcome_assets/img/favicon.png" rel="icon">
  <link href="welcome_assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="welcome_assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="welcome_assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="welcome_assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="welcome_assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="welcome_assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="welcome_assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="welcome_assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Jun 19 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="welcome_assets/img/logoSoloquizz2.png" alt="">
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <!--<li><a class="nav-link scrollto" href="#contact">Contact</a></li>-->
          <li><a class="getstarted scrollto" href="{{url('/login')}}">Se connecter</a></li>
          <li><a class="getstarted scrollto" href="{{route('auth.register')}}">S'inscrire</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Apprenez autrement avec soloquizz</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Préparez vos examens et certifications avec des cours, des quizz et des exercices tous en ligne</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="{{url('/login')}}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Commencer</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="welcome_assets/img/quizz.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                <p>Happy Clients</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                <p>Projects</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-headset" style="color: #15be56;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hours Of Support</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-people" style="color: #bb0852;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hard Workers</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <!--<section id="services" class="services">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Apprentissage</h2>
          <p>Soyez des pro dans votre métier</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box blue">
              <i class="ri-discuss-line icon"></i>
              <h3>Cours</h3>
              <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-box orange">
              <i class="ri-discuss-line icon"></i>
              <h3>Exercices</h3>
              <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-box green">
              <i class="ri-discuss-line icon"></i>
              <h3>Examens et quizz</h3>
              <p>Entrainez-vous avec nos quizz, obtenez les meilleures certifications avec les examens en lignes </p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          
          

        </div>

      </div>

    </section>-->
    <!-- End Services Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>Certifications</h2>
          <p>IT Certifications</p>
        </header>

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="welcome_assets/img/certifications/linux.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="welcome_assets/img/certifications/fotinet.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="welcome_assets/img/certifications/pcep.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="welcome_assets/img/certifications/vmware.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

    </section><!-- End Clients Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    
    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="welcome_assets/img/logoSoloquizz2.png" alt="">
            </a>
            <p>SoloQuizz est une plateforme de préparation des examens de certifications.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Apprentissage</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="{{url('/login')}}">Cours</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="{{url('/login')}}">Exercices</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="{{url('/login')}}">Challenges</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="{{url('/login')}}">Examens & concours</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Nous Contactez</h4>
            <p>
              <strong>Phone:</strong><a class="nav-link" href="tel:+221776473559">Tel: +221 77647 3559</a>
              <br>
              <strong>Email:</strong><a class="nav-link" href="mailto:contact@soloquizz.com">contact@soloquizz.com</a>
              <br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        Copyright &copy; edutech <script>document.write(new Date().getFullYear());</script>
      </div>
      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="welcome_assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="welcome_assets/vendor/aos/aos.js"></script>
  <script src="welcome_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="welcome_assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="welcome_assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="welcome_assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="welcome_assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="welcome_assets/js/main.js"></script>

</body>

</html>
