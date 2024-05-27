@extends('layouts.merchant')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Banner</h4>
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
                    <a href="/merchant/banner">Banner </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Data Banner</h4>
                    <a href="{{ route('banner.create') }}" class="btn btn-primary btn-round ml-auto">
                        <i class="fa fa-plus"></i>
                        Tambah Banner
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="display table table-striped table-hover data-table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Banner</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($banner as $item)
                                @if ($item->id_user == Auth::user()->id)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td><img src="{{ asset('banner/' . $item->banner) }}" style="width: 100px"
                                                alt=""></td>
                                        <td>
                                            <form action="{{ route('banner.destroy', $item->id) }}" method="post">

                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('banner.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm">edit</a>
                                                <button class="btn btn-danger btn-sm" data-toggle="tooltip" id="delete"
                                                    title="Remove" type="submit">hapus</button>

                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
