@extends('layouts.ressine')

@section('head')
    @include('layouts.components.main-head-links')
    <style>
        .rating-css div {
            color: #ff8c00; /* Change to a shade of orange */
            font-size: 20px; /* Reduce font size */
            font-family: sans-serif;
            font-weight: 800;
            text-align: center;
            text-transform: uppercase;
            padding: 20px 0;
        }
        .rating-css input {
            display: none;
        }
        .rating-css input + label {
            font-size: 30px; /* Reduce font size */
            text-shadow: 1px 1px 0 #8f8420;
            cursor: pointer;
            color: #ff8c00; /* Change to a shade of orange */
        }
        .rating-css input:checked + label ~ label {
            color: #b4afaf;
        }
        .rating-css label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl py-5 bg-dark hero-header"
         style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .4)), url('{{ Storage::url($plat->imageHero)  }}'); background-size: cover; background-position: center">
        <div class="container-fluid text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $plat->designationPlat }}</h1>
        </div>
    </div>
    <div class="container py-5 mt-5">
        <div class="">
            <div class="">
                <div class="row">
                    <div class="swiper-wrapper col-md-6 m-0 p-0 ">
                        <div class="swiper-slide tranding-slide">
                        <div class="tranding-slide-img">
                            <img src="{{ Storage::url($plat->imageSlide) }}" alt="Tranding">
                        </div>
                        <div class="tranding-slide-content">
                            <h1 class="food-price">{{ Number::currency($plat->prixUnitaire,'mad') }}</h1>
                            <div class="tranding-slide-content-bottom">
                                <h2 class="food-name">
                                    <a href="{{ route('plat.details', ['idPlat' => $plat->idPlat]) }}">
                                        {{ $plat->designationPlat }}
                                    </a>
                                </h2>
                                <h5 class="food-rating">
                                    <span>{{ round($plat->etoiles_avg_nombre_etoile, 1) }}.0</span>
                                    <div class="rating">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $plat->etoiles_avg_nombre_etoile)
                                                <i class="fa-solid fa-star text-primary"></i>
                                            @else
                                                <i class="fa-regular fa-star text-primary"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </h5>
                                <div class="w-100 row">
                                    <div class="col p-1">
                                        <a href="{{ url('addToCart', ['idPlat' => $plat->idPlat]) }}"
                                           class="w-100 p-2 rounded-full btn btn-primary">Ajouter Au Panier <i
                                                class="fa fa-shopping-cart"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <h1 class="display-4">{{ $plat->designationPlat }}</h1>
                        <p class="lead">{{ $plat->descriptionPlat }}</p>
                        <p class="h4">Prix: {{ Number::currency($plat->prixUnitaire, 'mad') }}</p>

                        @auth
                            @if(!$hasRated)
                                <div class="mt-4">
                                    <form action="{{ route('plat.rate', ['idPlat' => $plat->idPlat]) }}" method="POST">
                                        @csrf
                                        <div class="rating-css">
                                            <input type="radio" value="1" name="rating" id="rating1"><label for="rating1" class="fa fa-star"></label>
                                            <input type="radio" value="2" name="rating" id="rating2"><label for="rating2" class="fa fa-star"></label>
                                            <input type="radio" value="3" name="rating" id="rating3"><label for="rating3" class="fa fa-star"></label>
                                            <input type="radio" value="4" name="rating" id="rating4"><label for="rating4" class="fa fa-star"></label>
                                            <input type="radio" value="5" name="rating" id="rating5"><label for="rating5" class="fa fa-star"></label>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Valider</button>
                                    </form>
                                </div>
                            @endif
                        @else
                            <p class="mt-4">Veuillez vous <a href="{{ route('login') }}">connecter</a> pour évaluer ce plat.</p>
                        @endauth

                        <br>
                        <img src="{{Storage::url($plat->imageIcon)}}" alt="Product image" class="mt-2 object-cover">
                        <br>
                        <a href="{{ route('cart.add', ['idPlat' => $plat->idPlat]) }}" class="btn btn-primary mt-3">Add to Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.components.menuComponent')
    </div>
@endsection

@section('scripts')
    @if(Session::has('success'))
        <script>
            $(document).ready(function(){
                Swal.fire({
                    title: "Bien",
                    text: "{{Session::get('success')}}",
                    icon: "success"
                });
            })
        </script>
    @endif

    @if(Session::has('error'))
        <script>
            $(document).ready(function(){
                Swal.fire({
                    title: "Ooops",
                    text: "{{Session::get('error')}}",
                    icon: "error"
                });
            })
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Optional: JavaScript for visual feedback on rating selection
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.rating-css input').forEach(function (input) {
                input.addEventListener('change', function () {
                    this.parentElement.querySelectorAll('label').forEach(function (label) {
                        label.style.color = label.getAttribute('for') <= input.id ? '#ff8c00' : '#b4afaf';
                    });
                });
            });
        });
    </script>
@endsection
