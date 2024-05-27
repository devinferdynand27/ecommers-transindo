@extends('layouts.custumer')
@section('content')
<section class="log-in-section background-image-2 section-b-space">
    <div class="container-fluid-lg w-100">
      <div class="row">
        <!-- <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
          <div class="image-contain">
            <img src="../../public/assets/images/inner-page/log-in.png" class="img-fluid" alt="" />
          </div>
        </div> -->

        <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
          <div class="log-in-box">
            <div class="log-in-title">
              <h3>Selamat Datang</h3>
              <h4>Log In Dengan Akun Kamu</h4>
            </div>

            <div class="input-box">
                <form action="/register-custumer" method="post"class="row g-4">
                      @csrf
                      <div class="col-12">
                        <div class="form-floating theme-form-floating log-in-form">
                          <input type="name" class="form-control" id="name" name="name" placeholder="name Address" />
                          <label for="name">Alamat name</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-floating theme-form-floating log-in-form">
                          <input type="number" class="form-control" id="contact" name="contact" placeholder="contact" />
                          <label for="name">contact</label>
                        </div>
                      </div>
                <div class="col-12">
                  <div class="form-floating theme-form-floating log-in-form">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" />
                    <label for="email">Alamat Email</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating theme-form-floating log-in-form">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                    <label for="password">Password</label>
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn text-white w-100 justify-content-center" style="background: orange" type="submit">Log In</button>
                </div>
          </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br><br><br><br><br><br>
@endsection