@extends('layouts.merchant')
@section('content')
<div class="col-md-12">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Tambah Banner</h4>
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
                    <a href="/merchant/banner"> Banner</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#"> Tambah  Banner</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Banner</div>
                    </div>
                     <form action="{{route('banner.update', $banner->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email2">Masukan Banner</label>
                                        <input  type="file" class="form-control col-sm-12" id="banner" name="banner" placeholder="Masukan banner" accept="image/*" onchange="previewImage()">
                                        <small id="emailHelp2" class="form-text text-muted">Masukan Banner</small>
                                        <br>
                                        <img id="bannerPreview" src="{{asset('banner/'.$banner->banner)}}" alt="Preview" style=" border-radius: 10px; max-width: 100%; height: auto; margin-top: 10px;">
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
        const file = document.getElementById('banner').files[0];
        const preview = document.getElementById('bannerPreview');
        
        const reader = new FileReader();
        reader.addEventListener("load", function () {
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