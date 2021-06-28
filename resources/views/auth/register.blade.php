@extends('layouts.app')

@section('content')
<div class="tittle">Daftar</div>
    <div class="auth-form">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="">Name*</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email*</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password*</label>
                <input type="text" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Konfirmasi Password*</label>
                <input type="text" name="password_confirmation" class="form-control">
            </div> 
            <div class="form-group">
                <button class="btn-auth"> Daftar </button>
            </div>
            <div> Sudah punya akun? <a href="{{ route('login') }}">Masuk</a> </div>
        </form>
    </div>
@endsection
