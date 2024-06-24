<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5  py-lg-0">
    <a href="index.php" class="navbar-brand p-0 ">
        <h2 class="text-primary m-0 d-flex">
            <img src="./img/logo.svg" alt="Logo" class="d-inline-block h-100 w-auto">
            <span class=" h-100 align-bottom align-self-end">Ressine</span>
        </h2>
    </a>

    <div class=" navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4">
            <a  href="/" class=" nav-item nav-link active">Accueil</a>
            <a  href="about" class=" nav-item nav-link">à propos</a>
            <a  href="menu.php" class=" nav-item nav-link">Menu</a>
            <div class="nav-item dropdown">
                <a  href="#" class=" nav-link dropdown-toggle" data-bs-toggle="dropdown">Reserver</a>
                <div class="dropdown-menu m-0">
                    <a  href="booking.blade.php" class=" dropdown-item active">petit déjeuner</a>
                    <a  href="team.php" class=" dropdown-item">déjeuner</a>
                    <a  href="testimonial.php" class=" dropdown-item">dîner</a>
                </div>
            </div>
            <a  href="contact" class="nav-item nav-link">Contact</a>


            @if (Route::has('login'))
                @auth
                    <div class="nav-item dropdown">
                        <a  href="#" class="nav-item nav-link"><i class="fa fa-user" aria-hidden="true"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a  href="profile" class=" dropdown-item ">modifier </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="/logout" class="dropdown-item"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Déconnecter') }}
                                </a>
                            </form>
                        </div>
                    </div>
                    <a  href="cart" class="nav-item nav-link"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>


                @else
                    <div class="sm:top-0 sm:right-0 ps-3 d-flex align-items-center justify-content-center text-right">
                        <a  href="login" class="btn btn-primary  rounded-full">se connecter</a>
                    </div>
                @endauth
            @endif
        </div>

    </div>
</nav>
<!-- Navbar End -->
