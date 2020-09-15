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
            <h1>{{$post->title}} post</h1>
          </div>
      </div></div>
    </header>

<!-- ... End Header -->



<!-- End Stunning Header -->

<!-- Post Details -->

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <img src="{{asset('storage/' . $post->image)}}" class="cimg">
            <div class="row">
       <span class="col-md-4">posted by: {{$post->user->name}}</span>
         <span class="col-md-4">created at: {{$post->created_at->diffForHumans()}}</span>
       <span class="col-md-4">category: {{$post->category->name}}</span>
    </div>
        </div>
    </div>
  <div class="row">
      <p class="content">{{$post->content}}</p>
  </div>
 
    <div class="row tags">
      @if($post->tags->count() > 0)
      @foreach($post->tags as $tag)
       <a href="{{route('tag',$tag->id)}}" class="tag" ><span class="mt-4 mb-4">{{$tag->tag}}</span></a>
      @endforeach
  @endif
  </div>
  <div class="author">
      <div class="row">
          <div class="col-md-2">
              <img src="{{asset('storage/' . $post->user->profile->avatar)}}" style="width: 120px;height: 120px;border-radius: 50%;" class="mx-auto text-center ml-3 mt-3">
          </div>
          <div class="col-md-10">
              <h3 class="name mt-2">{{$post->user->name}}</h3>
              <p>{{$post->user->profile->about}}
              </p>
              <i class="fab fa-facebook"></i><i class="fab fa-youtube"></i>
          </div>
      </div>
  </div>
</div>
               <div class="container mt-5 mb-11">
                        <div class="row mb-6">
                            <div class="col-md-6">
                                <div class="float-left">
                                  @if($prev)
                             <a href="{{route('singlePost',$prev->slug)}}"><i class="fas fa-arrow-left">previos post</i>
                             </a>
                             @endif
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="float-right" >
                                  @if($next)
                               <a href="{{route('singlePost',$next->slug)}}"><i class="fas fa-arrow-right"> next post </i></a>
                               @endif
                            </div>
                            </div>
                        </div>
                    </div>

 <div class="container mt-6">
        <h1 class="comment">Comments:</h1>
        <div id="disqus_thread"></div>
<script>


var disqus_config = function () {
 this.page.url = "{{route('singlePost',$post->slug)}}"; // Replace PAGE_URL with your page's canonical URL variable
 this.page.identifier = "post-{{$post->slug}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
 };

(function() { 
var d = document, s = d.createElement('script');
s.src = 'https://ehabs-blog.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            
    </div> 
    <div class="container mt-10">
 <div class="">
    <h3 class="tagh1 mt-5">All tags</h3>
   <div class="row tags">
    @foreach($tags as $tag)
   <a href="{{route('tag',$tag->id)}}" class="tag" ><span class="mt-4 mb-4">{{$tag->tag}}</span></a>
   @endforeach
        </div>
    </div>
    </div>

            <!-- Sidebar-->
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
