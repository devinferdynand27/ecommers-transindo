@extends('layouts.merchant')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Produk</h4>
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
                    <a href="/merchant/produk">Produk </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-Produk">
                    <h4 class="card-title">Data Produk</h4>
                    <a href="{{ route('produk.create') }}" class="btn btn-primary btn-round ml-auto">
                        <i class="fa fa-plus"></i>
                        Tambah Produk
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="display table table-striped table-hover data-table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>nama</th>
                                <th>Image</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($produk as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td> {{ $item->name }}
                                    </td>
                                    <td><img src="{{ asset('produk/' . $item->image) }}"
                                        style="width: 100px; height: 100px; object-fit: cover" alt=""></td>
                                    <td> {{ $item->kategori->name }}
                                    </td>
                                    <td> {{ $item->harga }}
                                    </td>
                                    <td> {{ $item->qty }}
                                    </td>
                                    <td>
                                        <form action="{{ route('produk.destroy', $item->id) }}" method="post">

                                            @method('DELETE')
                                            @csrf
                                            <a href="{{ route('produk.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">edit</a>
                                            <button class="btn btn-danger btn-sm" data-toggle="tooltip" id="delete"
                                                title="Remove" type="submit">hapus</button>

                                        </form>
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
