@extends('layouts.app')

@section('content')
<img class="wave" src="img/wavwreal.png">
    <div class="container">
        <div class="img">
            <img src="{{asset('img/mobile5.svg')}}">
        </div>
        <div class="login-content">
     
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                  <img src="{{asset('img/avatar.svg')}}">
                <h2 class="title">Welcome</h2>
                        <div class="input-div one">
                    <div>  
             <input type="email" class="input" placeholder="email" name="email" value="{{ old('email') }}"
             required autocomplete="email" autofocus></div>
       <div>  <i class="fas fa-user"></i></div>
        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="input-div pass">
                        
                    <div>   <input type="password" class="input" placeholder="password" name="password" required autocomplete="current-password"></div>
                   <div>    <i class="fas fa-lock"></i></div>
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                        <div class="form-group">
                            <div class="mt-1 ml-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                              <button type="submit" class="btn">Login</button> 

                                @if (Route::has('password.request'))
                                    <a class=" btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

