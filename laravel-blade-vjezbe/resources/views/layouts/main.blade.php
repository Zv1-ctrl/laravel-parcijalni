<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Blade vježba 2')</title>
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <header>
        <h1>Blade vježba 2</h1>
    </header>
    <main>
       @include('partials.menu')
        <section>
            @yield('content')
        </section>
    </main>
    <footer>
        <p>&copy; 2026 Blade vježbe </p>
    </footer>
</body>
</html>