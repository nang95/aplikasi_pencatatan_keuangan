@extends('layouts.app')

@section('content')
    <div class="tittle">Login</div>
    <div class="auth-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control">
            </div> 
            <div class="form-group">
                <button class="btn-auth" type="submit"> Login </button>
            </div>
        </form>
    </div>
@endsection
