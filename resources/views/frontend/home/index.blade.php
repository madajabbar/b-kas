@extends('frontend.layouts.app')

@section('css')

@endsection
@section('content')
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="my-5 carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('frontend/img/pembuka.png')}}" class="d-block img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('frontend/img/pembuka.png')}}" class="d-block img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('frontend/img/pembuka.png')}}" class="d-block img-fluid" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    @include('frontend.layouts.category')


    <div class="rekomendasi">
        <div class="text-center">
            <h2 class="py-3 mb-4">Rekomendasi</h2>
        </div>
    </div>

    <div class="py-1 rekomendasi-2">
        <div class="row p-2">
            <div class="col-lg-3 col-sm-12 col-md-6">
                <div class="rekomendasi-produk card">
                    <img src="{{asset('frontend/img/sepatu.png')}}" class="card-img-top" width="50px" height="200px">
                    <div class="card-body">
                        <a href="#" class="text-decoration-none text-dark">
                            <h5 class="card-title">Sepatu Hommy Pad - Untuk anak sekolah....</h5>
                            <p>Pontianak</p>
                            <h5 class="text-end">Rp 50.000</h5>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-12 col-md-6">
                <div class="rekomendasi-produk card">
                    <img src="{{asset('frontend/img/sepatu.png')}}" class="card-img-top" width="50px" height="200px">
                    <div class="card-body">
                        <a href="#" class="text-decoration-none text-dark">
                            <h5 class="card-title">Sepatu Hommy Pad - Untuk anak sekolah....</h5>
                            <p>Pontianak</p>
                            <h5 class="text-end">Rp 50.000</h5>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-12 col-md-6">
                <div class="rekomendasi-produk card">
                    <img src="{{asset('frontend/img/sepatu.png')}}" class="card-img-top" width="50px" height="200px">
                    <div class="card-body">
                        <a href="#" class="text-decoration-none text-dark">
                            <h5 class="card-title">Sepatu Hommy Pad - Untuk anak sekolah....</h5>
                            <p>Pontianak</p>
                            <h5 class="text-end">Rp 50.000</h5>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-12 col-md-6">
                <div class="rekomendasi-produk card">
                    <img src="{{asset('frontend/img/sepatu.png')}}" class="card-img-top" width="50px" height="200px">
                    <div class="card-body">
                        <a href="#" class="text-decoration-none text-dark">
                            <h5 class="card-title">Sepatu Hommy Pad - Untuk anak sekolah....</h5>
                            <p>Pontianak</p>
                            <h5 class="text-end">Rp 50.000</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-1 rekomendasi-2">
        <div class="row p-2">
            <div class="col-lg-3 col-sm-12 col-md-6">
                <div class="rekomendasi-produk card">
                    <img src="{{asset('frontend/img/sepatu.png')}}" class="card-img-top" width="50px" height="200px">
                    <div class="card-body">
                        <a href="#" class="text-decoration-none text-dark">
                            <h5 class="card-title">Sepatu Hommy Pad - Untuk anak sekolah....</h5>
                            <p>Pontianak</p>
                            <h5 class="text-end">Rp 50.000</h5>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-12 col-md-6">
                <div class="rekomendasi-produk card">
                    <img src="{{asset('frontend/img/sepatu.png')}}" class="card-img-top" width="50px" height="200px">
                    <div class="card-body">
                        <a href="#" class="text-decoration-none text-dark">
                            <h5 class="card-title">Sepatu Hommy Pad - Untuk anak sekolah....</h5>
                            <p>Pontianak</p>
                            <h5 class="text-end">Rp 50.000</h5>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-12 col-md-6">
                <div class="rekomendasi-produk card">
                    <img src="{{asset('frontend/img/sepatu.png')}}" class="card-img-top" width="50px" height="200px">
                    <div class="card-body">
                        <a href="#" class="text-decoration-none text-dark">
                            <h5 class="card-title">Sepatu Hommy Pad - Untuk anak sekolah....</h5>
                            <p>Pontianak</p>
                            <h5 class="text-end">Rp 50.000</h5>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-12 col-md-6">
                <div class="rekomendasi-produk card">
                    <img src="{{asset('frontend/img/sepatu.png')}}" class="card-img-top" width="50px" height="200px">
                    <div class="card-body">
                        <a href="#" class="text-decoration-none text-dark">
                            <h5 class="card-title">Sepatu Hommy Pad - Untuk anak sekolah....</h5>
                            <p>Pontianak</p>
                            <h5 class="text-end">Rp 50.000</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 7
            }
        }
    })
</script>

@endsection
