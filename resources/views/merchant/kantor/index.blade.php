@extends('layouts.merchant')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Profile</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="/merchant/dashboard">
                    <i class="fa-solid fa-house-chimney"></i>
                </a>
            </li>
            <li class="separator">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="nav-item">
                <a href="/merchant/kantor">Profile</a>
            </li>
            <li class="separator">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="nav-item">
                <a href="">Data Profile</a>
            </li>
        </ul>

    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">User</a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2"> Kantor </a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="card-title"> Data User</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="/merchant/user/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label>logo Kantor</label>
                                        <div class="input-group ">
                                            <input type="text" required placeholder="Nama "
                                                name="name" autocomplete='off' value="{{Auth::user()->name}}" value=""
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group ">
                                            <input type="text" required placeholder="Email " name="email"
                                                value="{{Auth::user()->email}}" autocomplete='off'
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group ">
                                            <input type="text" placeholder="Password " name="Password"
                                                value="" autocomplete='off'
                                                class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary">Publish</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="card-title"> Data kantor</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="/merchant/kantor/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label>Nama Kantor</label>
                                        <div class="input-group ">
                                            <input type="text" placeholder="company_name "
                                                name="company_name" autocomplete='off' value="{{Auth::user()->company_name}}" value=""
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Company Address</label>
                                        <div class="input-group ">
                                            <input type="text" placeholder="company_address " name="company_address"
                                                value="{{Auth::user()->company_address}}" autocomplete='off'
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Contact Address</label>
                                        <div class="input-group ">
                                            <input type="text" placeholder="contact " name="contact"
                                                value="{{Auth::user()->contact}}" autocomplete='off'
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>description</label>
                                        <div class="input-group ">
                                            <input type="text" placeholder="Company Address " name="description"
                                                value="{{Auth::user()->description}}" autocomplete='off'
                                                class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary">Publish</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection