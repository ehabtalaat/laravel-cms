<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
         <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
      <!--font awesome 5-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body data-spy="scroll">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                  Ehab's Blog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<style>
    .navbar {
        background-color: #53dfdf !important; 
    }
   .navbar a{
        color: #fff !important;
        font-size: 120%;
        font-weight: bold;
    }
    .navbar .navbar-brand{
        font-size: 1.5rem;
        font-style: italic;
    }
    .navbar-collapse{
        background-color: #53dfdf !important; 
    }
    *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.wave{
    position: fixed;
    height: 100%;
    bottom: 0px;
    z-index: -1;
    color: #8af6ec;
    right:500px;
    left: 0px;
}
.img{
    float:left;
    position: absolute;
    left: 10%;
    transform: translateX(-10%);
    top: 50%;
    transform: translateY(-50%);

}
.login-content{
    position: absolute;
    left: 60%;
    transform: translateX(-60%);
    top: 50%;
    transform: translateY(-50%);
        display: block;
  margin-left: auto;
  margin-right: auto;
    }
.img img{
    width: 500px;
}

form{
    width: 360px;

}

.login-content img{
    height: 100px;
    text-align: center;
   display: block;
    margin-bottom: 35px;
    display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
.login-content h2{
     text-align: center;
    color: #333;
    text-transform: uppercase;
    font-size: 3.4rem;
    font-weight: bold;
    margin-top: 15px;
}
.input-div {
    margin-top: 40px;
    position: relative;
    width: 340px;
    border-bottom: 3px solid #53dfdf;
}
.input-div  input{
    position: relative;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    border: none;
    outline: none;
    background: none;
    font-size: 1.2rem;
    color: #555;
    font-family: 'poppins', sans-serif;
    padding-left: 40px;
    padding-top: 3px !important;
}
/*.input-div i{
    position: relative;
    top:-2px;
    left: 10px;
    font-size: 20px;
    color: #32be8f;
    
}*/
.input-div i{
    position: absolute;
    top:3px;
    left: 10px;
    font-size: 20px;
    color: #53dfdf;
    
}
a{
    display: block;
    text-align: right;
    text-decoration: none;
    color: #999;
    font-size: 0.9rem;
    transition: .3s;
    margin-right: 20px;
    margin-top: 10px;
}
button.btn{
    display: block;
    width: 100%;
    height: 50px;
    border-radius: 25px;
    outline: none;
    border: none;
    width: 340px;
    margin-top: 20px;
    background-color: #53dfdf !important;
    cursor: pointer;
    transition: .5s;
    color: #fff;
    font-size: 20px;
    font-weight: bold;

}
@media screen and (max-width: 1000px){
    form{
        width: 290px;
    }

    .login-content h2{
        font-size: 2.4rem;
        margin: 8px 0;
    }

    .img img{
        width: 400px;
    }
}

@media screen and (max-width: 890px){
    
    .img{
        display: none;
    }

    .wave{
        display: none;
    }

    .login-content{
    margin: 0px auto !important;
    text-align: center !important;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
    }
    .login-content img{
        margin:10px auto;
        display: block;
        text-align: center;
    }
}
</style>
 <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
</html>
