@extends('layouts.ressine')

@section('head')
    @include('layouts.components.main-head-links')
@endsection

@section('extended-head')
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Confirmation Page</h1>

    <h2 class="text-lg font-bold mb-2">Client Information</h2>
    <p>Name: {{ $user->nom }} {{ $user->prenom }}</p>
    <p>Email: {{ $user->email }}</p>
    
    <h2 class="text-lg font-bold mb-2 mt-4">Purchased Items</h2>
    <div>
        @foreach($items as $item)
            <div class="flex flex-col md:flex-row border-b border-gray-400 py-2">
                <div class="flex-shrink-0">
                    <img src="{{$item->attributes->image}}" alt="Product image" class="w-32 h-32 object-cover">
                </div>
                <div class="mt-1 md:mt-0 md:ml-6">
                    <h2 class="text-lg font-bold">{{ $item->name }} ${{ $item->price }}</h2>
                    <p class="mt-2 text-gray-600">{{$item->attributes->description}}</p>
                    <div class="mt-4 flex items-center">
                        <span class="mr-2 text-gray-600">Quantity:</span>
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="cart-form">
                            @csrf
                            @method('PATCH')
                            <div class="flex items-center">
                                <button type="button" class="bg-gray-200 rounded-l-lg px-2 py-1 decrement">-</button>
                                <input type="text" name="quantity" class="number border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $item->quantity }}">
                                <button type="button" class="bg-gray-200 rounded-r-lg px-2 py-1 increment">+</button>
                                <input type="submit" value="Update" class="btn btn-secondary">

                            </div>
                        </form>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" mx-2 btn btn-danger">Remove</button>
                        </form>
                        <span class="ml-auto font-bold mx-2">${{ $item->getPriceSum() }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="flex justify-end items-center mt-8">
        <span class="text-gray-600 mr-4">Subtotal:</span>
        <span class="text-xl font-bold">{{ Number::currency(\Cart::session(Auth::id())->getTotal(),'mad') }}</span>
    </div>

    <form action="{{ route('confirm') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" name="address" id="address" value="{{ $user->adresseClient }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
        </div>
        <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Confirm and Pay</button>
    </form>
</div>

@if(Session::has('success'))
    <script>
        $(document).ready(function(){
            Swal.fire({
                title: "Bien",
                text: "{{ Session::get('success') }}",
                icon: "success"
            });
        });
    </script>
@endif

@if(Session::has('error'))
    <script>
        $(document).ready(function(){
            Swal.fire({
                title: "Ooops",
                text: "{{ Session::get('error') }}",
                icon: "error"
            });
        });
    </script>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('.decrement').click(function () {
            let $input = $(this).siblings('.number');
            let currentNumber = parseInt($input.val());
            if (currentNumber > 1) { // Assuming you don't want the number to go below 1
                $input.val(currentNumber - 1);
            }
        });

        $('.increment').click(function () {
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
