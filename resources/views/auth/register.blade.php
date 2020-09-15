@extends('layouts.app')

@section('content')
<img class="wave" src="img/wavwreal.png">
    <div class="container">
        <div class="img">
            <img src="img/mobile5.svg">
        </div>
        <div class="login-content">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
        <img src="img/avatar.svg">
                <h2 class="title">Welcome</h2>
                <div class="input-div one">
                     <div>   <input type="text" class="input" placeholder="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus></div>
            <div>  <i class="fas fa-user"></i></div>
               @error('name')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                        </div>         
              <div class="input-div one">
                     <div>   <input type="text" class="input" placeholder="email" name="email" value="{{ old('email') }}" required autocomplete="email"></div>
            <div>  <i class="fas fa-user"></i></div>
               @error('email')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                        </div>  
                        <div class="input-div pass">
                        
                    <div>   <input type="password" class="input" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"></div>
                   <div>    <i class="fas fa-lock"></i></div>
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                     <div class="input-div pass">
                        
                    <div>   <input type="password" class="input" placeholder="confrim password"type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"></div>
                   <div>    <i class="fas fa-lock"></i></div>

                </div>
                    

                        <div class="form-group">
                            <div class=" ">
                                <button type="submit" class="btn">register</button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
