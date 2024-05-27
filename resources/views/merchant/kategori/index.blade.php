@extends('layouts.merchant')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Kategori</h4>
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
                    <a href="/merchant/kategori">Kategori </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Data Kategori</h4>
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
                                <th>nama</th>
                                <th>image</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($kategori as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td> {{ $item->name }}
                                    </td>
                                    <td><img src="{{ asset('kategori/' . $item->image) }}" style="width: 100px; height: 100px; object-fit: cover"
                                            alt=""></td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
