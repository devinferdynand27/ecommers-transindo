@extends('layouts.custumer')
@section('content')
<section class="product-section">
    <div class="container-fluid-lg">
      <div class="row">
        <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
          <div class="row g-4">
            <div class="col-xl-6 wow fadeInUp">
              <div class="product-left-box">
                <div class="row g-2">
                  <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                    <div class="product-main-2 no-arrow">
                      <div>
                        <div class="slider-image">
                          <img
                            src="{{asset('produk/'. $produk->image)}}"
                            id="img-1"
                            style="width: 100%; height: 400px; object-fit: cover"
                            data-zoom-image="{{asset('produk/'. $produk->image)}}"
                            class="img-fluid image_zoom_cls-0 blur-up lazyload"
                            alt=""
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
              <div class="right-box-contain">
                <h2 class="name">{{$produk->name}}</h2>
                <div class="price-rating">
                  <h3 class="theme-color price">
                    Rp. {{$produk->harga}}
                    <!-- <span class="offer theme-color">(8% off)</span> -->
                  </h3>
                  <div class="product-rating custom-rate">
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
                        <i data-feather="star"></i>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="procuct-contain">
                  <p>
                     {!! $produk->deskripsi!!}
                  </p>
                </div>
                <div class="buy-box " style="width: 100%">
                     <p class="mt-4">Stock &nbsp; &nbsp; : &nbsp; &nbsp; {{$produk->qty}} &nbsp; &nbsp;</p>
                     <div class="cart_qty qty-box product-qty">
                      <div class="input-group">
                          <button onclick="minus()">
                              <i class="fa fa-minus" aria-hidden="true"></i>
                          </button>
                          <input class="form-control" type="text" name="quantity" value="1" />
                          <button onclick="plus()">
                              <i class="fa fa-plus" aria-hidden="true"></i>
                          </button>
                      </div>
                  </div>
                  <form action="/checkout/produk" method="post">
                      @csrf
                      <input type="text" id="id_produk" name="id_produk" value="1" hidden>
                      <input type="text" id="qty" value="1" name="qty" hidden>
                      <button class="btn btn-sm theme-bg-color text-white" style="width: 100%" data-bs-toggle="modal" data-bs-target="#chatPenjual">Beli Sekarang</button>
                  </form>
                  
                </div>

            
              </div>
            </div>


          </div>
        </div>

        <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
          <div class="right-sidebar-box">
            <div class="vendor-box">
              <a href="toko.html">
                <div class="verndor-contain">
                  <div class="vendor-image">
                    <img src="https://st4.depositphotos.com/12678588/23473/v/1600/depositphotos_234736640-stock-illustration-food-logo-smile-label-food.jpg" class="blur-up lazyload" alt="" />
                  </div>

                  <div class="vendor-name">
                    <h5 class="fw-500">{{ $produk->user->name}}</h5>

                    <div class="product-rating mt-1">
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
                          <i data-feather="star"></i>
                        </li>
                      </ul>
                      <span>(36 Reviews)</span>
                    </div>
                  </div>
                </div>
              </a>

              <p class="vendor-detail">
                {{ $produk->user->description}}
              </p>

              <div class="vendor-list">
                <ul>
                  <li>
                    <div class="address-contact">
                      <i data-feather="map-pin"></i>
                      <h5>Alamat: <span class="text-content">{{$produk->user->company_address}}</span></h5>
                    </div>
                  </li>

                  <li>
                    <div class="address-contact">
                      <i data-feather="headphones"></i>
                      <h5>Kontak Penjual: <span class="text-content">{{$produk->user->contact}}</span></h5>
                    </div>
                  </li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    function plus() {
        var stok = {{$produk->qty}};
        var input = document.getElementsByName('quantity')[0];
        var value = parseInt(input.value);
        
        if (value < stok) {
            input.value = value + 1;
            document.getElementById('qty').value = value + 1;
        }
    }
    function minus() {
        var input = document.getElementsByName('quantity')[0];
        var value = parseInt(input.value);
        if (value > 1) {
            input.value = value - 1;
            document.getElementById('qty').value = value - 1;
        }
    }
</script>
<br><br><br><br><br><br>
@endsection