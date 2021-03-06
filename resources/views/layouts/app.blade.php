<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Zomato666</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/13ae6e9c7e.js"></script>
    
    
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>


<body>
   <div id="app">
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
         <div class="container">
            <a href="{{ url('/') }}"><img src="/images/logo.png" width = "130px" height = "35px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
               <span class="navbar-toggler-icon"></span>
            </button>
         
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <!-- Left Side Of Navbar -->
               <ul class="navbar-nav mr-auto"></ul>
               
               
               <div class="form-inline">
                  <input type="search" class="form-control mr-sm-2" id="searchBox" placeholder="Search">
                  <button type="submit" class="btn btn-outline-danger mb-1">Submit</button>
               </div>
            
            
            <!-- Right Side Of Navbar -->
                


                  

               <ul class="navbar-nav ml-auto">
                  <div>
                     <a class="nav-link dropdown mt-1 mr-3" href="#" id="shoppingCart" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-shopping-cart"></i>  Shopping Cart </a>
                  </div>
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
                        <a id="navbarDropdown" class="nav-link dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{Auth::user()->avatar}}" width="30" height="30" style="border-radius:50%">
                        {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="/profile">
                                    Profile
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                           </form>
                           <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                 Logout
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
</html>




