@extends('layouts.custumer')
@section('content')
    <section style="background: rgba(245, 245, 245, 0.268);">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-8 mx-auto">
                    <div class="title d-block text-center">
                        <h2>Search  products</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                    </div>
    
                    <div class="search-box container">
                        <form action="/search" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Cari Produk / Lokasi" aria-label="Example text with button addon">
                                <button class="btn theme-bg-color text-white m-0" type="submit" id="button-addon1">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="title d-block mt-5">
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
