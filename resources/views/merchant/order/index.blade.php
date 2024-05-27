@extends('layouts.merchant')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data order</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="/merchant/order">order </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Data order</h4>
                    {{-- <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-round ml-auto">
                        <i class="fa fa-plus"></i>
                        Tambah Kategori
                    </a> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="display table table-striped table-hover data-table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>nama Produk</th>
                                <th>Kategori Produk</th>
                                <th>Nama Pembeli</th>
                                <th>Status</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($order as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td> {{ $item->produk->name }}
                                    </td>
                                    <td> {{ $item->produk->kategori->name }}
                                    </td>
                                    <td> {{ $item->user->name }}
                                    </td>
                                    <td>  
                                        @if ($item->status == 'pending')
                                            pending / belum bayar
                                        @endif
                                        @if ($item->status == 'success')
                                             Success / Sudah bayar
                                        @endif
                                    </td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
