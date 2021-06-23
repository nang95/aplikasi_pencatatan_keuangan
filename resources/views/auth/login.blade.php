@extends('layouts.app')

@section('content')
    <div class="tittle">Login</div>
    <div class="auth-form">
        <form action="">
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="password" class="form-control">
            </div> 
            <div class="form-group">
                <button class="btn-auth"> Login </button>
            </div>
        </form>
    </div>
@endsection
