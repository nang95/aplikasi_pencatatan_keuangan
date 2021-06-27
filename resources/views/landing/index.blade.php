<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>APLIKASI PENCATATAN KEUANGAN</title>
</head>
<body>
    <div id="root">
        <div class="cover"> 
            <div class="text-group">
                <div class="tittle">
                <div class="first-text">WELCOME TO!</div> 
                <span class="first-text">APLIKASI PENCATATAN</span> 
                    <span class="second-text"> KEUANGAN </span>
                </div>
                <div class="button-group">
                    <a href="{{ route('login') }}">
                        <button class="btn sign-in">Login</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>