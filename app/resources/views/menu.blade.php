@extends('layouts.ressine')

@section('head')
    @include('layouts.components.main-head-links')
@endsection

@section('content')
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
