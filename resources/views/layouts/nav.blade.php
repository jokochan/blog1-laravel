
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  {{-- <div class="container"> --}}
  <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
              <li>
                <a class="nav-link" href="{{ route('blogs') }}">
                  Blogs 
                  {{-- <span class="badge bg-dark text-white">{{$blog->count()}}</span> --}}
                  <span class="badge bg-dark text-white">{{$blogs->count()}}</span>
                </a>
              </li>
              <li>
                <a class="nav-link" href="{{ route('categories.index') }}">
                    Categories
                </a>
              </li>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">

            {{-- Administrator
            @if(Auth::user() && Auth::user()->role_id === 1)
                <li><a class="nav-link" href="{{ route('admin.index') }}">Admin</a></li>
            {{-- Author --}}
            {{-- @elseif(Auth::user() && Auth::user()->role_id === 2)
                <li><a class="nav-link" href="{{ route('admin.index') }}">Author</a></li> --}}
            {{-- Subscriber --}}
            {{-- @elseif(Auth::user() && Auth::user()->role_id === 3) 
                <li><a class="nav-link">Subscriber</a></li>
            @endif --}}

            @if(Auth::user())
                <li><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
            @endif

            
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