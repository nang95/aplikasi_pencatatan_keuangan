@extends('layouts.master')
@section('kontem')
<div class="container tm-mb-big">

     <!-- row -->
      <div class="container tm-mb-big mt-5">
      <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
        <div class="row tm-content-row">
          <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
            <center><h2 class="tm-block-title">Accout Settings </h2></center>
              <form action="" class="tm-signup-form row">
                <div class="form-group col-lg-11"> 
                  <label for="name">Nama</label>
                  <input
                    id="name"
                    name="name"
                    type="text"
                    class="form-control validate"
                  />
                </div>
                
                <div class="form-group col-lg-11">
                  <label for="email">Email</label>
                  <input
                    id="email"
                    name="email"
                    type="email"
                    class="form-control validate"
                  />
                </div>
                
                <div class="form-group col-lg-11">
                  <label for="password">Password</label>
                  <input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-11">
                  <label for="password2">Re-enter Password</label>
                  <input
                    id="password2"
                    name="password2"
                    type="password"
                    class="form-control validate"
                  />
                </div>
                
                <div class="form-group col-lg-10">
                  <label class="tm-hide-sm">&nbsp;</label>
                  <button
                    type="submit"
                    class="btn btn-primary btn-block text-uppercase"
                  >
                    Perbarui Account
                  </button>
                </div>
                <div class="col-10">
                  <button
                    type="submit"
                    class="btn btn-primary btn-block text-uppercase"
                  >
                    Hapus Account
                  </button>
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
