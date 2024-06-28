@extends('layouts.ressine')

@section('head')
    @include('layouts.components.main-head-links')
    <style>
        .rating-css div {
            color: #ffe400;
            font-size: 30px;
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
            font-size: 60px;
            text-shadow: 1px 1px 0 #8f8420;
            cursor: pointer;
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
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ Storage::url($plat->imageSlide) }}" alt="{{ $plat->designationPlat }}" class="img-fluid rounded">
                    </div>
                    <div class="col-md-6">
                        <h1 class="display-4">{{ $plat->designationPlat }}</h1>
                        <p class="lead">{{ $plat->descriptionPlat }}</p>
                        <p class="h4">Price: {{ Number::currency($plat->prixUnitaire, 'mad') }}</p>
                        <a href="{{ route('cart.add', ['idPlat' => $plat->idPlat]) }}" class="btn btn-primary mt-3">Add to Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>

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
                                        <button type="submit" class="btn btn-primary mt-3">Submit Rating</button>
                                    </form>
                                </div>
                            @else
                            @endif
                        @else
                            <p class="mt-4">Please <a href="{{ route('login') }}">log in</a> to rate this plat.</p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Optional: JavaScript for visual feedback on rating selection
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.rating-css input').forEach(function (input) {
                input.addEventListener('change', function () {
                    this.parentElement.querySelectorAll('label').forEach(function (label) {
                        label.style.color = label.getAttribute('for') <= input.id ? '#ffe400' : '#b4afaf';
                    });
                });
            });
        });
    </script>
@endsection
