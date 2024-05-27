@extends('layouts.merchant')
@section('content')
    <div class="col-md-12">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Kategori</h4>
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
                        <a href="/merchant/kategori"> Kategori</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#"> Tambah Kategori</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Kategori</div>
                        </div>
                        <form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email2">Masukan Kategori</label>
                                            <input required type="text" class="form-control col-sm-12" 
                                                name="name" placeholder="Masukan Kategori">
                                            <small id="emailHelp2" class="form-text text-muted">Masukan Kategori</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email2">Masukan Iamge</label>
                                            <input required type="file" class="form-control col-sm-12" id="image"
                                                name="image" placeholder="Masukan image" accept="image/*"
                                                onchange="previewImage()">
                                            <small id="emailHelp2" class="form-text text-muted">Masukan image</small>
                                            <br>
                                            <img id="imagePreview" src="" alt="Preview"
                                                style="display: none; border-radius: 10px; max-width: 100%; height: auto; margin-top: 10px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button class="btn btn-success" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage() {
            const file = document.getElementById('image').files[0];
            const preview = document.getElementById('imagePreview');

            const reader = new FileReader();
            reader.addEventListener("load", function() {
                // Convert file to base64 string and set as src of the image
                preview.src = reader.result;
                preview.style.display = 'block';
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
