@php

@endphp
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{asset('katering/logo.png')}}" alt="..." style="width: 50px" class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level">merchant</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item  {{ Request::is('merchant/dashboard') ? 'active' : '' }}">
                    <a href="/merchant/dashboard" class="collapsed">
                        <i class="fas fa-home text-primary"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                </li>
                <li class="nav-item  mt-1  {{ Request::is('merchant/banner') ? 'active' : '' }} ">
                    <a href="/merchant/banner" class="collapsed">
                        <i class="bi bi-card-image text-warning"></i>
                        <p> Banner </p>
                    </a>
                </li>
                <li class="nav-item  mt-1  {{ Request::is('merchant/kategori') ? 'active' : '' }} ">
                    <a href="/merchant/kategori" class="collapsed">
                        <i class="bi bi-database text-danger"></i>
                        <p> kategori </p>
                    </a>
                </li>
                <li class="nav-item  mt-1  {{ Request::is('merchant/kantor') ? 'active' : '' }} ">
                    <a href="/merchant/kantor" class="collapsed">
                        <i class="bi bi-building text-primary"></i>
                        <p> Profile Kantor </p>
                    </a>
                </li>
                <li class="nav-item  mt-1  {{ Request::is('merchant/produk') ? 'active' : '' }} ">
                    <a href="/merchant/produk" class="collapsed">
                        <i class="bi bi-list-nested text-success"></i>
                        <p> Produk  </p>
                    </a>
                </li>
                <li class="nav-item  mt-1  {{ Request::is('merchant/order') ? 'active' : '' }} ">
                    <a href="/merchant/order" class="collapsed">
                        <i class="bi bi-unity text-warning"></i>
                        <p> Order </p>
                    </a>
            </ul>
        </div>
    </div>
</div>
