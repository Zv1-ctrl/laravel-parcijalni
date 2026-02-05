<!doctype html>
<html lang="hr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Moja aplikacija')</title>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  <header class="site-header">
    <div class="container header-inner">
      <a class="logo" href="{{ url('/') }}">Moja Aplikacija</a>

      <nav class="nav">
        <a href="{{ url('/') }}" class="nav-link">Početna</a>
        <a href="{{ url('/link1') }}" class="nav-link">Link1</a>
        <a href="{{ url('/link2') }}" class="nav-link">Link 2</a>
        <a href="{{ url('/link3') }}" class="nav-link">Link 3</a>
      </nav>
    </div>
  </header>

  <main class="site-main">
    <div class="container">
      <h1 class="page-title">@yield('page_title', 'Naslov stranice')</h1>

      <div class="card">
        @yield('content')
      </div>
    </div>
  </main>

  <footer class="site-footer">
    <div class="container footer-inner">
      <span>© {{ date('Y') }} Parcijalni ispit</span>
      <span class="footer-muted">Izrađeno u Laravelu</span>
    </div>
  </footer>

</body>
</html>
