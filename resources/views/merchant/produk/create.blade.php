@extends('layouts.merchant')
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <div class="col-md-12">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Produk</h4>
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
                        <a href="/merchant/produk"> Produk</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#"> Tambah Produk</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Produk</div>
                        </div>
                        <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email2">Masukan Produk</label>
                                            <input required type="text" class="form-control col-sm-12" name="name"
                                                placeholder="Masukan Kategori">
                                            <small id="emailHelp2" class="form-text text-muted">Masukan Produk</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email2">Masukan Kategori</label>
                                            <select name="id_kategori" required class="form-control" id="">
                                                <option value="">-- Pilih Kategori -- </option>
                                                @foreach ($kategori as $item)
                                                    <option value="{{$item->id}}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <small id="emailHelp2" class="form-text text-muted">Masukan Kategori</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email2">Masukan Qty</label>
                                            <input required type="number" class="form-control col-sm-12" name="qty"
                                                placeholder="Masukan qty">
                                            <small id="emailHelp2" class="form-text text-muted">Masukan Produk</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email2">Masukan Harga</label>
                                            <input required type="number" class="form-control col-sm-12" name="harga"
                                                placeholder="Masukan Harga">
                                            <small id="emailHelp2" class="form-text text-muted">Masukan Harga</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email2">Deskripsi</label>
                                            <textarea name="deskripsi" id="editor" cols="100" rows="30" style="width: 100%"></textarea>
                                            <small id="emailHelp2" class="form-text text-muted">Masukan Deskripsi</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email2">Masukan Image</label>
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
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    
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
