@extends('layouts.ressine')

@section('head')
    @include('layouts.components.main-head-links')
@endsection

@section('extended-head')
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection


@section('content')
    @if ($items->count() > 0)
        <div class="container">
            <div class="row">
                <div class="col-10 mx-auto px-4 py-8 mt-4">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                        <h1 class="text-2xl font-bold my-4">Shopping Cart</h1>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Clear
                                    Panier</button>
                            </form>
                            <form action="{{ route('confirmation') }}" method="POST">
                                @csrf
                                <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                    Checkout
                                </button>
                            </form>
                        </div>
                    </div>
                    <div>
                        @foreach ($items as $item)
                            <div class="flex flex-col md:flex-row border-b border-gray-400 py-2">
                                <div class="flex-shrink-0">
                                    <img src="{{ $item->attributes->image }}" alt="Product image"
                                        class="w-32 h-32 object-cover">
                                </div>
                                <div class="mt-1 md:mt-0 md:ml-6">
                                    <h2 class="text-lg font-bold">{{ $item->name }} MAD {{ $item->price }}</h2>
                                    <p class="mt-2 text-gray-600">{{ $item->attributes->description }}</p>
                                    <div class="mt-4 flex items-center">
                                        <span class="mr-2 text-gray-600">Quantity:</span>
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST"
                                            class="cart-form">
                                            @csrf
                                            @method('PATCH')
                                            <div class="flex items-center">
                                                <button type="button"
                                                    class="bg-gray-200 rounded-l-lg px-2 py-1 decrement">-</button>
                                                <input type="text" name="quantity"
                                                    class="number border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                                    value="{{ $item->quantity }}">
                                                <button type="button"
                                                    class="bg-gray-200 rounded-r-lg px-2 py-1 increment">+</button>
                                                <input type="submit" value="Update" class="btn btn-secondary">

                                            </div>
                                        </form>
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class=" mx-2 btn btn-danger">Remove</button>
                                        </form>
                                        <span
                                            class="ml-auto font-bold mx-2">{{ Number::currency($item->getPriceSum(), 'mad') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col">
                              <div class="flex justify-start text-primary items-start mt-8">
                                <a href="/menu" class="text-xl font-bold btn bg-primary text-white rounded m-0 py-1">ajoter d'Autre plats </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="flex justify-end items-center mt-8">
                                <span class="text-gray-600 mr-4">Subtotal:</span>
                                <span
                                    class="text-xl font-bold">{{ Number::currency(\Cart::session(Auth::id())->getTotal(), 'mad') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-10 mx-auto px-4 py-8 mt-4">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                        <h1 class="text-2xl font-bold my-4">Shopping Cart</h1>
                        <div>
                            Votre Panier est vide !
                            <a href="/"
                                class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                Ajouter des plats?
                            </a>
                        </div>
                    </div>
                    <div class="flex justify-end items-center mt-8">
                        <span class="text-gray-600 mr-4">Total:</span>
                        <span
                            class="text-xl font-bold">{{ Number::currency(\Cart::session(Auth::id())->getTotal(), 'mad') }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (Session::has('success'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: "Bien",
                    text: "{{ Session::get('success') }}",
                    icon: "success"
                });
            })
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: "Ooops",
                    text: "{{ Session::get('error') }}",
                    icon: "error"
                });
            })
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.decrement').click(function() {
                let $input = $(this).siblings('.number');
                let currentNumber = parseInt($input.val());
                if (currentNumber > 1) { // Assuming you don't want the number to go below 1
                    $input.val(currentNumber - 1);
                }
            });

            $('.increment').click(function() {
                let $input = $(this).siblings('.number');
                let currentNumber = parseInt($input.val());
                $input.val(currentNumber + 1);
            });

            // Prevent form submission on button click
            $('.cart-form button[type="button"]').click(function(event) {
                event.preventDefault(); // Prevents the form from submitting
            });
        });
    </script>
@endsection
