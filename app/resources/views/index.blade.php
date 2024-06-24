@extends('layouts.ressine')

@section('head')
    @include('layouts.components.main-head-links')
@endsection

@section('content')
    <!-- hero start -->
    <div class="container-xxl col-12 d-flex overflow-hidden slider">
        <div class="list">
            @foreach ($topPlatsByCategory as $categoryName => $plat)
                @if ($plat)
                    <div class="col-12 py-5 bg-dark hero-header item d-flex align-items-center justify-content-center"
                         id="slide-{{ $plat->idPlat }}"
                         style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .4)), url('{{ Storage::url($plat->imageHero)  }}'); background-size: cover; background-position: center">
                        <div class="container my-5 py-2">
                            <div class="row justify-content-center align-items-center g-5">
                                <div class="col-lg-7 text-center wow fadeInUp">
                                    <h1 class="display-4 text-white">{{ $categoryName }}<br>
                                        <span class="text-primary">{{ $plat->designationPlat }}</span>
                                    </h1>
                                    <p class="text-white mx-4 mb-4 pb-2">{{ $plat->descriptionPlat }}</p>
                                    <a href="{{ url('addToCart', ['idPlat' => $plat->idPlat]) }}"
                                       class="btn btn-primary py-sm-3 px-sm-5 me-3 fw-bold rounded-full booking-link booking-link-of-slider">
                                        Order Now<i
                                            class="fa fa-shopping-cart"
                                            aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="buttons">
            <button id="prev" class="wow fadeInRight">
                <
            </button>
            <button id="next" class="wow fadeInLeft">></button>
        </div>
    </div>
    <!-- hero end -->



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
                            @foreach ($topSevenPlats as $plat)
                                <div class="swiper-slide tranding-slide">
                                    <div class="tranding-slide-img">
                                        <img src="{{ $plat->imageSlide }}" alt="Tranding">
                                    </div>
                                    <div class="tranding-slide-content">
                                        <h1 class="food-price">{{ Number::currency($plat->prixUnitaire,'mad') }}</h1>
                                        <div class="tranding-slide-content-bottom">
                                            <h2 class="food-name">
                                                {{ $plat->designationPlat }}
                                            </h2>
                                            <h5 class="food-rating">
                                                <span>{{ round($plat->avg_star_rating, 1) }}.0</span>
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
                                                    <button
                                                        class="w-100 p-2 rounded-full btn btn-outline-primary">Explore
                                                    </button>
                                                </div>
                                                <div class="col-6 p-1">
                                                    <a href="{{ url('addToCart', ['idPlat' => $plat->idPlat]) }}"
                                                       class="w-100 p-2 rounded-full btn btn-primary">Ajouter Panier <i
                                                            class="fa fa-shopping-cart"
                                                            aria-hidden="true"></i></a>
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
                    <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="https://www.youtube.com/embed/p0Km_B8LyJo?si=5qUycZ1pFBoB4H8K"
                            data-bs-target="#videoModal">
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
                                    <input type="text" class="form-control" id="name"
                                           placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email"
                                           placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                           id="datetime" placeholder="Date & Time" data-target="#date3"
                                           data-toggle="datetimepicker"/>
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
                                    <textarea class="form-control" placeholder="Special Request" id="message"
                                              style="height: 100px"></textarea>
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

    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                                allowscriptaccess="always" allow="autoplay"></iframe>
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
                @foreach ($acceptedTestimonials as $testimonial)
                    <div class="testimonial-item bg-transparent border rounded p-4 h-100">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p style="height: 6.6em; line-height: 1.2em;">
                            {{ $testimonial->message }}
                        </p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle"
                                 src="{{ $testimonial->client->imageClient }}" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">{{ $testimonial->client->nom }}
                                    {{ $testimonial->client->prenom }}</h5>
                                <small>{{ $testimonial->jjmmaaaa }}</small>
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

@endsection
