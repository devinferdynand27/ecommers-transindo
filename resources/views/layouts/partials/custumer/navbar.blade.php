<header class="pb-md-4 pb-0">
    <div class="header-top">
        <div class="container-fluid-lg">
            <div class="row">
                <h6 class="text-white">Selamat Datang dan selamat berbelanja @auth
                        {{ Auth::user()->name }}
                    @endauth

                </h6>
            </div>
        </div>
    </div>

    <div class="top-nav top-header sticky-header">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-top">
                        <a href="/" class="web-logo nav-logo">
                            <img src="{{ asset('custumer/assets/images/logo/1.png') }}"
                                class="img-fluid blur-up lazyload" alt="">
                        </a>

                        <div class="middle-box">

                            <div class="search-box">
                                <div class="input-group">
                                    <form action="/search" method="post" style="display: flex">
                                        @csrf
                                        <input type="search" class="form-control" placeholder="Search produk / kota"
                                            name="search">
                                        <button class="btn" type="submit" id="button-addon2">
                                            <i data-feather="search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="rightside-box">
                            <div class="search-full">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i data-feather="search" class="font-light"></i>
                                    </span>
                                    <input type="text" class="form-control search-type" placeholder="Search here..">
                                    <span class="input-group-text close-search">
                                        <i data-feather="x" class="font-light"></i>
                                    </span>
                                </div>
                            </div>
                            <ul class="right-side-menu">
                                <li class="right-side">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <div class="search-box">
                                                <i data-feather="search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                              
                                <li class="right-side">
                                    <a href="/wishlist" class="btn p-0 position-relative header-wishlist">
                                        <i data-feather="heart"></i>
                                    </a>
                                </li>
                                <li class="right-side">
                                    <div class="onhover-dropdown header-badge">
                                        <button type="button" class="btn p-0 position-relative header-wishlist">
                                            <i data-feather="shopping-cart"></i>
                                            <span class="position-absolute top-0 start-100 translate-middle badge">0
                                                <span class="visually-hidden">unread messages</span>
                                            </span>
                                        </button>
                                    </div>
                                </li>
                                <li class="right-side onhover-dropdown">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                        <div class="delivery-detail">
                                            <h6>Hello,</h6>
                                            <h5>My Account</h5>
                                        </div>
                                    </div>

                                    <div class="onhover-div onhover-div-login">
                                        <ul class="user-box-name">


                                            @if (!Auth::check())
                                                <li class="product-box-contain">
                                                    <i></i>
                                                    <a href="/login">Log In</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="/register/custumer">Register Custumer</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="/register/merchant">Register Merchant</a>
                                                </li>
                                            @endif

                                            @if (Auth::check())
                                            
                                                <li class="product-box-contain">
                                                    <a href="/transaksi-list"> Transaksi</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <form action="/custumer/logout" method="post">
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm text-white" style="background: red">Logout</button>
                                                    </form>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->

<!-- mobile fix menu start -->
<div class="mobile-menu d-md-none d-block mobile-cart">
    <ul>
        <li class="active">
            <a href="/">
                <i class="iconly-Home icli"></i>
                <span>Home</span>
            </a>
        </li>


        <li>
            <a href="/search" class="search-box">
                <i class="iconly-Search icli"></i>
                <span>Search</span>
            </a>
        </li>

        <li>
            <a href="/wishlist" class="notifi-wishlist">
                <i class="iconly-Heart icli"></i>
                <span>Wishlist</span>
            </a>
        </li>

        <li>
            <a href="/transaksi-list">
                <i class="iconly-Bag-2 icli fly-cate"></i>
                <span>Transaksi</span>
            </a>
        </li>
    </ul>
</div>
