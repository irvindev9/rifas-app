<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <title>Rifas Jr</title>
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '370534281442007');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=370534281442007&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
    <link rel="stylesheet" href="{{asset('css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('css/theme/blue.css')}}">
    <link rel="preload" href="{{asset('css/font/dm.css')}}" as="style" onload="this.rel='stylesheet'">
    <link href="{{asset('css/flipdown.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v11.0&appId=3486713101388523&autoLogAppEvents=1" nonce="fcfPVicu"></script>

    <div class="content-wrapper" id="app">

        @include("partials.navbar")

        @yield('content')

    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script>
        // Doing this in a loaded JS file is better, I put this here for simplicity
        $().ready(function(){
            $('.nav-link').click(function(){
                $('.btn-close').click();
            })
        });
    </script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/theme.js')}}"></script>

    <script src="{{asset('js/flipdown.min.js')}}"></script>
    
</body>

</html>
