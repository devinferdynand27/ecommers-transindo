@extends('layouts.custumer')
@section('content')
    @php
        use App\Models\Kategori;
        use App\Models\Banner;
        use App\Models\Produk;
        $produk = Produk::orderBy('created_at', 'asc')->get();
        $kategori = Kategori::orderBy('created_at', 'asc')->get();
        $banner = Banner::orderBy('created_at', 'asc')->get();
    @endphp
    <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="slider-1 slider-animate product-wrapper no-arrow">
                        @foreach ($banner as $item)
                            <div>
                                <div class="banner-contain-2 hover-effect">
                                    <img src="{{ asset('banner/' . $item->banner) }}"
                                        class="bg-img rounded-3 blur-up lazyload" alt="">
                                    <div
                                        class="banner-detail p-center-right position-relative shop-banner ms-auto banner-small">
                                        <div>
                                            <h2>Selamat Berbelanja Keperluan Makanan Anda</h2>
                                            {{-- <h3>Save upto 50%</h3> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="category-section-3">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Categories</h2>
            </div>
            <div class="row">

                <div class="col-12">
                    <div class="category-slider-1 arrow-slider wow fadeInUp">
                        @foreach ($kategori as $item)
                            <div>
                                <div class="category-box-list">
                                    <a href="shop-left-sidebar.html" class="category-name">
                                        <h4>{{ $item->name }}</h4>
                                    </a>
                                    <div class="category-box-view">
                                        <a href="shop-left-sidebar.html">
                                            <img src="{{asset('kategori/'. $item->image)}}"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <button onclick="location.href = 'shop-left-sidebar.html';" class="btn shop-button">
                                            <span>Shop Now</span>
                                            <i class="fas fa-angle-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <section style="background: rgba(245, 245, 245, 0.268);">
        <div class="container">
            <div class="title d-block">
                <h2 class="text-theme font-sm">List Produk</h2>
                <p>Silahkan Pilih Produk Produk Menarik Yang Anda Suka</p>
            </div>

            <div class="row row-cols-xxl-6 row-cols-lg-5 row-cols-md-4 row-cols-sm-3 row-cols-2 g-sm-4 g-3 section-b-space">
                  @foreach ($produk as $item)
                  <div>
                    <div class="product-box product-white-bg wow fadeIn" data-wow-delay="0.1s">
                        <div class="product-image">
                            <a href="/detail/produk/{{$item->slug}}">
                                <img src="{{asset('produk/'. $item->image)}}"
                                    class="img-fluid blur-up lazyload" alt="">
                            </a>
                          
                        </div>
                        <div class="product-detail position-relative">
                            <a href="/detail/produk/{{$item->slug}}">
                                <h6 class="name">
                                     {{ $item->name}}
                                </h6>
                            </a>
                            <a href="/detail/produk/{{$item->slug}}">
                                <h6 class="sold weight text-content fw-normal">  <h6 class="price theme-color">Rp. {{$item->harga}}</h6></h6>
                            </a>
                            <div class="product-rating mt-2">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i  data-feather="star"></i>
                                    </li>
                                </ul>
                                <span>(4.0)</span>
                            </div>
                             <a href="/detail/produk/{{$item->slug}}" class="btn shop-button text-white btn-sm mt-2" style="background: rgb(0, 105, 56); width: 100%;"> Beli Sekarang</a>
                        </div>
                    </div>
                </div>
                  @endforeach
            </div>
        </div>
    </section>

    <br><br><br>
@endsection
