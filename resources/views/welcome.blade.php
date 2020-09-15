<!DOCTYPE html>
<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{$title}}</title>
     <link rel="stylesheet" type="text/css" href="{{ asset('app/css/home.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/crumina-fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/normalize.css')}}">

    <!--Plugins styles-->


    <!--Styles for RTL-->

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <!--bootstrap jquery-->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
    <!--<link rel="stylesheet" type="text/css" href="app/css/rtl.css">-->
       <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!--External fonts-->

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

</head>


<body class=" ">

    
    <header class="header" id="site-header">
        <div class="container">
               
          <!--nav bar from boostrap 4-->
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{route('welcome')}}">{{$title}}</a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                @foreach($categories as $category)
                <li class="nav-item">
                  <a class="nav-link"  href="{{route('category',$category->id)}}"
                    >{{$category->name}}</a>
                </li>
              @endforeach
               @if (Route::has('login'))
                    @auth
                      <li class="nav-item">        
                        <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                     </a>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
                    @else
                       <li class="nav-item">   <a href="{{ route('login') }}" class="nav-link">Login</a>
                             </li>
                        @if (Route::has('register'))
                          <li class="nav-item">    <a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        @endif
                    @endauth
            @endif
              </ul>
            </div>
          </nav>
                </div>
            
                <div class="row">
                    <div class="container">
                  <div class="header-words col-md-8">
            <h1>welcome  to our blog</h1>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing el it.
              Perferendis, iusto ad facere impedit inventore exercitationem!
              Tempore temporibus
            </p>
          </div>
      </div></div>
    </header>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                          <a href="{{route('singlePost',$firstPost->slug)}}"> <img src="{{asset('storage/' . $firstPost->image)}}"></a>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center"><a href="{{route('singlePost',$firstPost->slug)}}">{{$firstPost->title}}</a></h3>
                            <div class="row">
                              <span class="col-md-4">posted by: {{$firstPost->user->name}}</span>
                                <span class="col-md-4">created at: {{$firstPost->created_at->diffForHumans()}}</span>
                                  <span class="col-md-4">category: {{$firstPost->category->name}}</span>
                              </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>

     <div class="row ">
         <div class="container">
             <div class="col-md-6 float-left">
           <div class="card">
                        <div class="card-header">
                          <a href="{{route('singlePost',$secondPost->slug)}}">  <img src="{{asset('storage/' . $secondPost->image)}}"></a>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center"><a href="{{route('singlePost',$secondPost->slug)}}">{{$secondPost->title}}</a></h3>
                            <div class="row">
                              <span class="col-md-4">posted by: {{$secondPost->user->name}}</span>
                                <span class="col-md-4">created at: {{$secondPost->created_at->diffForHumans()}}</span>
                                  <span class="col-md-4">category: {{$secondPost->category->name}}</span>
                              </div>
                        </div>
                    </div>
             </div>
     
              <div class="col-md-6 float-right">
                 <div class="card">
                        <div class="card-header">
                          <a href="{{route('singlePost',$thirdPost->slug)}}">  <img src="{{asset('storage/' . $thirdPost->image)}}"></a>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center"><a href="{{route('singlePost',$thirdPost->slug)}}">{{$thirdPost->title}}</a></h3>
                            <div class="row">
                              <span class="col-md-4">posted by: {{$thirdPost->user->name}}</span>
                                <span class="col-md-4">created at: {{$thirdPost->created_at->diffForHumans()}}</span>
                                  <span class="col-md-4">category: {{$thirdPost->category->name}}</span>
                              </div>
                        </div>
                    </div>
             </div>
         </div>
     </div>
     @foreach($all as $cat)
      <div class="section">
  <div class="container">
      <div class="row">
        <div class="col-md-6">
        <h2>{{$cat->name}}</h2>
    </div>
      </div>
     
      <div class="row">
      @if( $cat->posts->count() > 0)
        @foreach($cat->posts as $post)
        <div class="col-md-4">
          <div class="card">
                        <div class="card-header">
                        <a href ="{{route('singlePost',$post->slug)}}"> <img src="{{asset('storage/' . $post->image)}}"></a>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center"><a href="{{route('singlePost',$post->slug)}}">{{$post->title}}</a></h3>
                            <div class="row">
                              <span class="col-md-4">posted by: {{$post->user->name}}</span>
                                <span class="col-md-4">created at: {{$post->created_at->diffForHumans()}}</span>
                                  <span class="col-md-4">category: {{$post->category->name}}</span>
                              </div>
                        </div>
                    </div>
                </div>
                @endforeach  
                 @else
                 <h3 class="text-center">no post in this category yet</h3>
                @endif     

      </div>
  </div>
</div>

@endforeach
<footer class="footer">
    <div class="row setting">
        <div class="col-md-8 mx-auto"> 
        <h1 class="text-center">{{$title}}</h1>
        <div>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco</div>
    </div>
</div>

    <div  class="address">
        <div class="container">
            <div class="row">
        <div class="col-md-4">
            <b>Contact Number: </b> {{$setting->contact_number}}
        </div>
        <div class="col-md-4">
            <b>Contact Email:</b> {{$setting->contact_email}}
        </div>
        <div class="col-md-4">
            <b>Address:</b> {{$setting->address}}
        </div>
    </div>
    </div>
    </div>
    <div class="copyright">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <p class="text-center">designed by Ehab Talaat</p>
            </div>
        </div>
    </div>
</footer>

<!-- JS Script -->

<script src="{{ asset('app/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{ asset('app/js/crum-mega-menu.js')}}"></script>
<script src="{{ asset('app/js/swiper.jquery.min.js')}}"></script>
<script src="{{ asset('app/js/theme-plugins.js')}}"></script>
<script src="{{ asset('app/js/main.js')}}"></script>
<script src="{{ asset('app/js/form-actions.js')}}"></script>

<script src="{{ asset('app/js/velocity.min.js')}}"></script>
<script src="{{ asset('app/js/ScrollMagic.min.js')}}"></script>
<script src="{{ asset('app/js/animation.velocity.min.js')}}"></script>


<!-- ...end JS Script -->

</body>
</html>
