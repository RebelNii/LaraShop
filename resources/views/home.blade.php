<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="An ecommerce web application">
        <!-- Short description of your document's subject -->
        <meta name="subject" content="web application">
        <meta name="keywords" content="shop, store, electronics, apple, samsung" >
        <meta name="author" content="Jeffrey Nii" >
        <meta name="generator" content="laravel">

        <!-- Fonts -->
        <link rel="stylesheet" 
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" 
        rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" 
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
        
        @vite(['resources/sass/app.scss','resources/js/app.js'])
        
        <!--AlpineJS-->
        <script src="//unpkg.com/alpinejs" defer></script>
        

        
        <title>{{config('app.name', 'Laravel')}}</title>
        <style>
            *{
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body{
                color: #fff;
                height: 100vh;
                width: 100vw;
                font-family: 'Montserrat', sans-serif;
                overflow-x: hidden;
                background: rgb(224, 229, 229);
                appearance: none;
            }

            a{
                text-decoration: none;
            }
        </style>
    </head>
    <body class="antialiased">
        <main>
            <header>
                <x-headline />
                <x-welcome />
                <x-navbar />
            </header>
            <section>
                <x-flash-message />
                @yield('content')
            </section>
        </main>
        <footer>
            <x-footer />
        </footer>

        <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
        <script async src="{{asset('js/custom.js')}}"></script>
    </body>
</html>
