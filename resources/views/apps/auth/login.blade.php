@extends('master')
@section('kontem')

<div class="row mt-2">
              <div class="col-12">
                <form action="index.html" method="post" class="tm-login-form">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input
                      name="username"
                      type="text"
                      class="form-control validate"
                      id="username"
                      value=""
                      required
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input
                      name="password"
                      type="password"
                      class="form-control validate"
                      id="password"
                      value=""
                      required
                    />
                  </div>
                  <div class="form-group mt-4">
                    <button
                      type="submit"
                      class="btn btn-primary btn-block text-uppercase"
                    >
                      Login
                    </button>
                  </div>
                  <button class="mt-5 btn btn-primary btn-block text-uppercase">
                    Forgot your password?
                  </button>
                </form>
              </div>
            </div>
            @endsection
