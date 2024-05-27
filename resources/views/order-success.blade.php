@extends('layouts.custumer')
@section('content')
@php
            use App\Models\Transaksi;
        $transaksi = Transaksi::orderBy('created_at', 'asc')->get();
@endphp
<div class="container-fluid-lg mt-4">
    <h2 class="mb-2">Pesanan Saya</h2><br>
     @foreach ($transaksi as $item)
       @if ($item->id_user == Auth::user()->id && $item->status == 'success')
        <a href="/invoice/{{$item->id}}">
            <div class="card rounded  mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col">  
                            <h5 class="h5">{{$item->produk->name}}</h5>
                            <div>Kategori : {{$item->produk->kategori->name}}</div>
                            <div>{{$item->created_at}}</div>
                        </div>
                        <div class="col" >
                            <b class="text-primary" style="float: right;">Selesai</b>
                            <br>
                            <div style="float: right;"> Qty {{$item->qty}}</div><br>
                            <h3 class="h3" style="float: right;"><b>Rp. {{$item->total_harga}}</b></h3>
                        </div>
                    </div>
        
                </div>
            </div>
        </a>
       @endif
     @endforeach
</div>
@endsection