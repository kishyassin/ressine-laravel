<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ressine - Home</title>
    <link rel="icon" type="image/svg+xml" href="img/logo.svg" />

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/eliyantosarage/font-awesome-pro@main/fontawesome-pro-6.5.2-web/css/all.min.css" rel="stylesheet">

    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- popular items style  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" />
    <style>
        body{
            background-color: #0F172B !important;
            overflow-x: hidden ;
        }
        .col-xxl-11{
            padding: 0  !important;
        }
        .card{
            border: 0 !important;
        }
        .bg-image{
            background-image: url('./img/video.jpg');
            background-position: center;
            background-size: cover;
        }
    </style>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
</head>

<body>
    <div class="container-fluid p-0  bg-dark">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3  py-lg-0">
            <a href="index.php" class="navbar-brand p-0 ">
                <h1 class="text-primary m-0 d-flex">
                    <img src="./img/logo.svg" alt="Logo" class=" d-inline-block h-100 w-auto">
                    <span class=" h-100 align-bottom align-self-end">Ressine</span>
                </h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 pe-4">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="service.php" class="nav-item nav-link">Service</a>
                    <a href="menu.php" class="nav-item nav-link">Menu</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="booking.blade.php" class="dropdown-item active">Booking</a>
                            <a href="team.php" class="dropdown-item">Our Team</a>
                            <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <a href="booking.blade.php" class="btn btn-primary py-2 px-4 rounded-full">Book A Table</a>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Sign up Start -->
        <section  style="margin-top:80px !important;">
            <div class="w-100">
              <div class="row">
                <div class="col-12 col-xxl-11">
                  <div class="card  shadow-sm">
                    <div class="row d-flex  g-0">
                      <div class="col-12 col-md-6   bg-image">

                        </div>
                      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                        <div class="col-12 col-lg-11 col-xl-10">
                          <div class="card-body p-xl-5">
                            <div class="row">
                              <div class="col-12">
                                <div class="mb-5">
                                  <div class="text-center mb-4">
                                    <a href="#!">
                                      <img src="./img/logo.svg" alt="BootstrapBrain Logo" width="175" height="57">
                                    </a>
                                  </div>
                                  <h4 class="text-center">Welcome  to ressine</h4>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                            </div>
                            <form action="#!">
                              <div class="row gy-3 overflow-hidden">
                                <div class="col-6">
                                  <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="nom" id="nom" required>
                                    <label for="nom" class="form-label">Nom</label>
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="prenom" id="prenom" value="" placeholder="prenom" required>
                                    <label for="prenom" class="form-label">Prenom</label>
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="adresse" id="adresse" required>
                                    <label for="adresse" class="form-label">Adresse</label>
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="telephone" id="telephone" value="" placeholder="telephone" required>
                                    <label for="telephone" class="form-label">Téléphone</label>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                    <label for="email" class="form-label">Email</label>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                                    <label for="password" class="form-label">Password</label>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <label for="formFileMultiple" class="form-label">Image : </label>
                                  <input class="form-control p-3" type="file" id="formFileMultiple" multiple>
                                </div>
                                <div class="col-12">
                                  <div class="d-grid">
                                    <button class="btn btn-dark btn-lg" type="submit">Sign up </button>
                                  </div>
                                </div>

                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        <!-- Sign up end Start -->
        <!-- footer start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h1 class="text-primary m-0 d-flex">
                            <img src="./img/logo.svg" alt="Logo" class=" d-inline-block h-100 w-auto">
                            <span class=" h-100 align-bottom align-self-end">Ressine</span>
                        </h1>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                        <h5 class="text-light fw-normal">Monday - Saturday</h5>
                        <p>09AM - 09PM</p>
                        <h5 class="text-light fw-normal">Sunday</h5>
                        <p>10AM - 08PM</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-12 text-center text-md-center mb-3 mb-md-0">
                            © 2024 Ressine - All Rights Reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer end -->
    </div>


    <!-- bacvk to top button  -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- popular items slider  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <script src="js/main.js"></script>
</body>

</html>
