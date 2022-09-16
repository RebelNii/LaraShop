<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- Fonts -->
        <link rel="stylesheet" 
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" 
        rel="stylesheet">
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
        
        @vite(['resources/sass/app.scss','resources/js/app.js'])
        
        <!--AlpineJS-->
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>

        
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
            }

            a{
                text-decoration: none;
            }
        </style>

        <style>
            main #admin{
                display: grid;
                grid-template-columns: 30% 70%;
                gap: 10px;
            }

            main #admin .admin2{
                height: 100%;
            }

            main #admin .admin2 .ad-1{
                display: none;
                cursor: pointer;
            }

            main #admin .admin2 .ad-2{
                height: 100vh;
            }

            @media(max-width: 768px){
                main #admin{
                    grid-template-columns: 1fr;
                    width: 100%;
                    margin: 0 7px;
                }

                main #admin .admin2{
                    width: 100%;
                }

                main #admin .admin2 .ad-1{
                    display: block;
                }
            }
        </style>
    </head>
    <body class="antialiased">
        <main>
            <div id="admin">
                <div class="admin1">
                    <x-admin-nav />
                </div>
                <div class="admin2">
                    <div class="ad-1">
                        <span class="material-symbols-sharp">
                            reorder
                        </span>
                    </div>
                    <div class="ad-2">
                        @yield('admin')
                    </div>
                </div>
            </div>
        </main>

        <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
        <script async src="{{asset('js/custom.js')}}"></script>
        <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    </body>
</html>
