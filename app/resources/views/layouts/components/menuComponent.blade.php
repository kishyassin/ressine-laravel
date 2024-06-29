<!-- _menu.blade.php -->
<div class="container py-5 mt-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Menu</h5>
            <h1 class="mb-5">Ressine Plats par cetegorie</h1>
        </div>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                @foreach($categories as $category)
                    <li class="nav-item {{ $loop->first ? 'ms-0' : '' }}">
                        <a class="d-flex align-items-center text-start mx-3 {{ $loop->first ? 'active' : '' }}" data-bs-toggle="pill" href="#tab-{{ $category->idCategorie }}">
                            <i class="fas {{ $category->iconCategorie }} fa-2x text-primary"></i>
                            <div class="ps-3">
                                <small class="text-body">{{ $loop->first ? 'Populaire' : ($loop->index == 1 ? 'Spécial' : 'Charmant') }}</small>
                                <h6 class="mt-n1 mb-0">{{ $category->designation }}</h6>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach($categories as $category)
                    <div id="tab-{{ $category->idCategorie }}" class="tab-pane fade {{ $loop->first ? 'show active' : '' }}">
                        <div class="row g-4">
                            @foreach($plats->where('idCategorie', $category->idCategorie) as $plat)
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded-pill" src="{{ asset('storage/' . $plat->imageIcon) }}" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <a href="{{ route('plat.details', ['idPlat' => $plat->idPlat]) }}">
                                                    {{ $plat->designationPlat }}
                                                </a>
                                                <span class="text-primary">${{ number_format($plat->prixUnitaire, 2) }}</span>
                                            </h5>
                                            <small class="fst-italic">{{ $plat->descriptionPlat }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
