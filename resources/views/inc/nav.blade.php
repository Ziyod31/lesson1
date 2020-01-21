<div class="container collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="col-6 navbar-nav mr-auto">

    <li class="nav-item active">
      <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
    </li>

    <li class="nav-item active offset-3">
      <a class="nav-link" href="{{ route('post.create') }}">Создать Пост <span class="sr-only">(current)</span></a>
    </li>

  </ul>
  <form class="form-inline my-2 my-lg-0" action="{{ route('index') }}">
    <input class="form-control mr-sm-2" type="search" placeholder="Найти пост" aria-label="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
  </form>
</div>