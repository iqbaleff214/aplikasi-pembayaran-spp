<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body style="font-family: sans-serif;">
<header>
    <img src="{{ public_path('logo.png') }}" alt="{{ $title }}" width="50px" class="mb-2" srcset="">
    <hr>
</header>
<section>
    <h2 class="mx-auto d-auto text-center mb-3">{{ $title }}</h2>
    @yield('header')
</section>
<section class="mt-3">
    @yield('content')
</section>
</body>

</html>
