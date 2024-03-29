<div class="container collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="col-6 navbar-nav mr-auto">

    <li class="nav-item active">
      <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
    </li>

    <li class="nav-item active offset-3">
      <a class="nav-link" href="{{ route('post.create') }}">Создать Пост <span class="sr-only">(current)</span></a>
    </li>

  </ul>
  <form class="form-inline my-2 my-lg-0" action="{{ route('post.index') }}">
    <input class="form-control mr-sm-2" type="search" placeholder="Найти пост" aria-label="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
  </form>
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