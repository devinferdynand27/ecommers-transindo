@extends('layouts.custumer')
@section('content')

    @php
        use App\Models\Transaksi;
        $transaksi = Transaksi::orderBy('created_at', 'asc')->get();
    @endphp
    @if (Auth::check())
        <div class="container-fluid-lg mt-4">
            <h2 class="mb-2">Pesanan Saya</h2><br>
            @foreach ($transaksi as $item)
                @if ($item->id_user == Auth::user()->id && $item->status == 'success')
                    <a href="#">
                        <div class="card rounded  mb-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="h5">{{ $item->produk->name }}</h5>
                                        <div>Kategori : {{ $item->produk->kategori->name }}</div>
                                        <div>{{ $item->created_at }}</div>
                                    </div>
                                    <div class="col">
                                        <b class="text-primary" style="float: right;">Selesai</b>
                                        <br>
                                        <div style="float: right;"> Qty {{ $item->qty }}</div><br>
                                        <h3 class="h3" style="float: right;"><b>Rp. {{ $item->total_harga }}</b></h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    @else 
    <br>
    <section class="coming-soon-section pt-0">
        <div class="bg-black"></div>
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-lg-5"></div>
    
                <div class="col-xxl-5 col-xl-6 col-lg-7">
                    <div class="coming-box">
                        <div>
                            <div class="coming-title">
                                <h2>Login Terlebih dahulu</h2>
                            </div>
                            <p class="coming-text">We are currently working on an awesome new site. Stay tuned for more information. Subscribe to our newsletter to stay updated on our progress.</p>
                            <a href="/login" class="btn btn-primary mt-3" style="background: orange">Login</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </section>
    <br><br>
    @endif
@endsection
