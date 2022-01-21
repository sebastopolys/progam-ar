
 



<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
       
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <a class="navbar-brand" href="#">Progarg - 2</a>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a href="/" class="nav-link">Init</a>
                </li>
                <li class="nav-item ">
                    <a href="/expo" class="nav-link">Expo</a>
                </li>
                <li class="nav-item ">
                    <a href="/info" class="nav-link">Info</a>
                </li>
              
                
                               
                
                @if (Auth::guest())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Log </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/login') }}">Login</a></li>
                        <li><a class="dropdown-item" href="{{ url('/register') }}">Registro</a></li>
                    </ul>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
             
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown1" >
                        <li><a class="dropdown-item"  href="/user/{{ Auth::user()->name }}"><i class="fa fa-user"></i> Mi cuenta</a></li>
                        <li><a class="dropdown-item"  href="/user/{{ Auth::user()->name }}/settings"><i class="fa fa-edit"></i> Panel</a></li>
                        <li><a class="dropdown-item"  href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>  {{ __('Logout') }}  </a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
                @endif
                
                
                
                
                
                
                
            </ul>
        </div>
    </div>
</nav>



