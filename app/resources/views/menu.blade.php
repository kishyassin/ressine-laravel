@extends('layouts.ressine')

@section('head')
    @include('layouts.components.main-head-links')
@endsection

@section('content')
    <div class="container-xxl py-5 bg-dark hero-header"
         style="background: linear-gradient(rgba(15, 23, 43, 0.9), rgba(15, 23, 43, 0.4)), url('{{ asset('img/bg-hero.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container-fluid text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Ressine Menu</h1>
        </div>
    </div>
    @include('layouts.components.menuComponent')
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to add border bottom to the active tab
            function addActiveBorder() {
                document.querySelectorAll('.nav-pills .nav-item a').forEach(function(element) {
                    element.classList.remove('active-border');
                });
                let activeElement = document.querySelector('.nav-pills .nav-item a.active');
                if (activeElement) {
                    activeElement.classList.add('active-border');
                }
            }

            // Add active-border class to the initial active tab
            addActiveBorder();

            // Event listener for tab change
            document.querySelectorAll('.nav-pills .nav-item a').forEach(function(element) {
                element.addEventListener('shown.bs.tab', function(event) {
                    addActiveBorder();
                });
            });
        });
    </script>
    <style>
        .active-border {
            border-bottom: 2px solid #ff9800; /* Customize your border color here */
        }
    </style>
@endsection
