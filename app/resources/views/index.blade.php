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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
</head>

<body>
    <div class="container-fluid p-0 bg-light">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
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


        <!-- hero start  -->
        <div class="container-xxl col-12 d-flex overflow-hidden slider ">
            <div class="list">
                @foreach ($topPlatsByCategory as $categoryName => $topPlats)
                    @foreach ($topPlats as $plat)
                <div class="col-12 py-5 bg-dark hero-header item d-flex align-items-center justify-content-center" id="slide-{{ $plat->idPlat }}" style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .4)), url('{{ $plat->imagePlat }}');">
                    <div class="container my-5 py-2">
                        <div class="row justify-content-center align-items-center g-5">
                            <div class="col-lg-7 text-center wow fadeInUp">
                                <h1 class="display-4 text-white">{{ $plat->categoryName }}<br> <span class="text-primary">{{ $plat->designationPlat }}</span></h1>
                                <p class="text-white mx-4 mb-4 pb-2">{{ $plat->descriptionPlat }}</p>
                                <a href="{{url('booking',['idPlat'=>$plat->idPlat])}}" class="btn btn-primary py-sm-3 px-sm-5 me-3 fw-bold rounded-full booking-link booking-link-of-slider">Book A Table</a>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                @endforeach
            </div>

            <div class="buttons">
                <button id="prev" class=" wow fadeInRight"><</button>
                <button id="next" class=" wow fadeInLeft">></button>
            </div>
        </div>
        <!-- hero end  -->


        <!-- special offers start -->
        <div class="container-fluid mt-5 wow fadeInUp p-0 m-0">
            <div class="container-fluid p-0 m-0">
                <section id="tranding" class=" container-fluid p-0 m-0">
                    <div class="container-fluid p-0 m-0">
                        <div class="text-center" data-wow-delay="0.1s">
                            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                            <h1 class="mb-2">Trending food</h1>
                        </div>
                        <div class="swiper tranding-slider">
                            <div class="swiper-wrapper">
                                <!-- Slide-start -->
                                @foreach($topSevenPlats as $plat)
                                    <div class="swiper-slide tranding-slide">
                                        <div class="tranding-slide-img">
                                            <img src="{{ $plat->imagePlat }}" alt="Tranding">
                                        </div>
                                        <div class="tranding-slide-content">
                                            <h1 class="food-price">${{ $plat->prixUnitaire }}</h1>
                                            <div class="tranding-slide-content-bottom">
                                                <h2 class="food-name">
                                                    {{ $plat->designationPlat }}
                                                </h2>
                                                <h5 class="food-rating">
                                                    <span>{{ $plat->avg_star_rating }}</span>
                                                    <div class="rating">
                                                        @for ($i = 0; $i < 5; $i++)
                                                            @if ($i < $plat->avg_star_rating)
                                                                <i class="fa-solid fa-star text-primary"></i>
                                                            @else
                                                                <i class="fa-regular fa-star text-primary"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </h5>
                                                <div class="w-100 row">
                                                    <div class="col-6 p-1">
                                                        <button class="w-100 p-2 rounded-full btn btn-outline-primary">Explore</button>
                                                    </div>
                                                    <div class="col-6 p-1">
                                                        <a href="{{ url('booking', ['idPlat' => $plat->idPlat]) }}" class="w-100 p-2 rounded-full btn btn-primary">Order <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <!-- Slide-end -->
                            </div>

                            <div class="tranding-slider-control">
                                <div class="swiper-button-prev slider-arrow">
                                    <ion-icon name="arrow-back-outline"></ion-icon>
                                </div>
                                <div class="swiper-button-next slider-arrow">
                                    <ion-icon name="arrow-forward-outline"></ion-icon>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>

                        </div>
                    </div>
                </section>

            </div>
        </div>
        <!-- special offers end -->

        <!-- Reservation Start -->
        <div class="container-fluid py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="video">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/-Ed-GNq2EyU?si=dkmPyGVj_eda-7ql" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                        <h1 class="text-white mb-4">Book A Table Online</h1>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="datetime">Date & Time</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="select1">
                                          <option value="1">People 1</option>
                                          <option value="2">People 2</option>
                                          <option value="3">People 3</option>
                                        </select>
                                        <label for="select1">No Of People</label>
                                      </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Special Request" id="message" style="height: 100px"></textarea>
                                        <label for="message">Special Request</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reservation Start -->
        <!-- testimonail start  -->

        <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container-fluid">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
                    <h1 class="mb-5">Our <span class="text-primary">Clients </span> Say!!!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel row">
                    @foreach($acceptedTestimonials as $testimonial)
                        <div class="testimonial-item bg-transparent border rounded p-4 h-100">
                            <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                            <p  style="height: 6.6em; line-height: 1.2em;">
                                {{$testimonial->message}}
                            </p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded-circle"  src="{{$testimonial->client->imageClient}}" style="width: 50px; height: 50px;">
                                <div class="ps-3">
                                    <h5 class="mb-1">{{$testimonial->client->nom}}  {{$testimonial->client->prenom}}</h5>
                                    <small>{{$testimonial->jjmmaaaa}}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- testimonila end -->
        <!-- panorama start -->
        <div class="container-fluid my-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Our Restaurant</h5>
                <h1 class="mb-2"><span class=" text-primary">Ressine</span> from inside</h1>
            </div>
            <div id="panorama" class=" my-2 rounded-5 shadow wow fadeInUp"></div>
        </div>
        <!-- panorama end -->
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
