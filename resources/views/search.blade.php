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

    <section style="background: rgba(245, 245, 245, 0.268);">
        <div class="container">
            <div class="title d-block">
                <h2 class="text-theme font-sm">List Produk</h2>
                <p>Silahkan Pilih Produk Produk Menarik Yang Anda Suka</p>
            </div>
            @if ($products == '[]')
                <center> <h2>Produk tidak ada</h2></center>
            @endif
            <div class="row row-cols-xxl-6 row-cols-lg-5 row-cols-md-4 row-cols-sm-3 row-cols-2 g-sm-4 g-3 section-b-space">
                  @foreach ($products as $item)
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

    <br><br><br><br><br><br><br><br>
@endsection
