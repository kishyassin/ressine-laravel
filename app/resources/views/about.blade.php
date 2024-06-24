@extends('layouts.ressine')

@section('head')
    @include('layouts.components.main-head-links')
@endsection

@section('content')
<div class="container-xxl py-5 bg-dark hero-header">
    <div class="container-fluid text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $about->title }}</h1>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="row g-3">
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg" style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">{{ $about->title }}</h5>
                <h1 class="mb-4">{{ $about->welcome_text }}</h1>
                <p class="mb-4">{{ $about->description }}</p>
                <p class="mb-4">{{ $about->additional_info }}</p>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $yearsOfExperience }}</h1>
                            <div class="ps-4">
                                <p class="mb-0">Ans</p>
                                <h6 class="text-uppercase mb-0">d'expérience</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $numberOfChefs }}</h1>
                            <div class="ps-4">
                                <p class="mb-0">Populaire</p>
                                <h6 class="text-uppercase mb-0">MAÎTRES CUISINIERS</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl mt-5 py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Nos services</h5>
            <h1 class="mb-5">Découvrez nos services</h1>
        </div>
        <div class="row g-4">
            @foreach ($services as $service)
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4 text-center">
                            <i class="fa fa-3x {{ $service->icon }} text-primary mb-4"></i>
                            <h5>{{ $service->title }}</h5>
                            <p style="height:30px">{{ $service->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container-xxl pt-5 pb-3">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Membres d'équipe</h5>
            <h1 class="mb-5">Nos chefs cuisiniers</h1>
        </div>
        <div class="row g-4">
            @foreach ($fourChefs as $chef)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="rounded-circle overflow-hidden m-4">
                            <img class="img-fluid" src="{{ Storage::url($chef->imageChef) }}" alt="">
                        </div>
                        <h5 class="mb-0">{{ $chef->nomChef }} {{ $chef->prenomChef }}</h5>
                        <small>{{ $chef->fonction }}</small>
                        <div class="d-flex justify-content-center mt-3">
                            <a class="btn btn-square btn-primary mx-1" href="{{ $chef->facebook }}"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href="{{ $chef->twitter }}"><i class="fab fa-twitter }}"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href="{{ $chef->instagram }}"><i class="fab fa-instagram }}"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
