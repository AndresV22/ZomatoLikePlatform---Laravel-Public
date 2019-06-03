<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    GGWP
                </div>
                <div class="links">
<<<<<<< Updated upstream
                    <a href="https://laravel.com/docs">Esta</a>
                    <a href="https://laracasts.com">Entero</a>
                    <a href="https://laravel-news.com">Brigido</a>
                    <a href="https://blog.laravel.com">el</a>
                    <a href="https://nova.laravel.com">ramo</a>
                    <a href="https://forge.laravel.com">loko</a>
                    <a href="https://github.com/laravel/laravel">hmno</a>
=======
                    <a href="https://taringa.net">porfa</a>
                    <a href="https://laracasts.com">ponganos</a>
                    <a href="https://laravel-news.com">un</a>
                    <a href="https://blog.laravel.com">siete</a>
                    <a href="https://nova.laravel.com">en</a>
                    <a href="https://forge.laravel.com">este</a>
                    <a href="https://github.com/laravel/laravel">trabajo</a>
>>>>>>> Stashed changes
                </div>
            </div>
        </div>
    </body>
</html>
