<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Rifas Jr</title>
    <link rel="stylesheet" href="{{asset('css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('css/theme/blue.css')}}">
    <link rel="preload" href="{{asset('css/font/dm.css')}}" as="style" onload="this.rel='stylesheet'">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v11.0&appId=3486713101388523&autoLogAppEvents=1" nonce="fcfPVicu"></script>

    <div class="content-wrapper" id="app">

        @include("partials.navbar")

        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/theme.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
