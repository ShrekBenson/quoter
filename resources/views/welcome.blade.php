<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- Slick Slider --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans bg-black">
    <header class="w-full flex items-center py-10 px-[45px] bg-gradient-to-b from-gray-800 to-90%">
        <div class="text-white flex items-center gap-x-1 text-xl">
            <div class="w-[24px] h-[24px]">
                <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill="#ffffff" d="M453.004 35.117c-65.314 46.61-189.755 41.018-213.559 125.426C184.41 101.41 98.625 83.031 21.771 63.209c6.532 139.103 71.38 147.437 192.44 194.547 23.71 25.786 29.786 49.93 19.254 82.705 46.403 5.1 71.504 15.468 106.754 27.742-.708-71.67-25.14-108.928-75.518-175.035 11.058 4.233 44.979 37.02 56.578 58.607 109.419-42.421 147.64-112.074 131.725-216.658zM180.178 353.9c-60.89-.24-114.034 19.49-158.426 74.221 167.075-48.84 292.003-13.21 471.893 7.895-118.936-38.752-224.474-81.763-313.467-82.116zm98.043 77.844c-99.28.255-206.34 18.738-256.866 63.139 168.002-26.61 356.801-28.408 470.8-4.967 1.102-35.337-101.418-58.46-213.934-58.172z"></path>
                    </g>
                </svg>
            </div>
            Quoter
        </div>
        @if (Route::has('login'))
            <livewire:welcome.navigation />
        @endif
    </header>

    <main class="px-[30px] h-page-index">
        <div class="h-auto w-full relative">
            <div class="one-time">
                <div class="relative">
                    <div class="w-full h-full bg-black/50 absolute"></div>
                    <div class="w-full h-full bg-gradient-to-t from-black to-50% absolute"></div>
                    <div class="absolute left-5 bottom-5"> 
                        <h2 class="font-bold text-6xl text-white">Cotiza en tan solo unos clicks</h2>
                        <p class="text-3xl text-white">Evita retrasos, frustaciones y problemas</p>
                    </div>
                    <img class="h-[500px] w-full object-cover object-center rounded-t-2xl" src="{{ Storage::url('carousel/img-3.jpg') }}"
                    alt="img-3">
                </div>
                <div class="relative">
                    <div class="w-full h-full bg-black/50 absolute"></div>
                    <div class="w-full h-full bg-gradient-to-t from-black to-50% absolute"></div>
                    <div class="absolute left-5 bottom-5 w-[800px]"> 
                        <h2 class="font-bold text-6xl text-white">Impulsa la productividad</h2>
                        <p class="text-3xl text-white">Con nuestro sistema automatico de cotizaciones puedes reducir el tiempo de trabajo en un 50%</p>
                    </div>                    
                    <img class="h-[500px] w-full object-cover object-center rounded-t-2xl" src="{{ Storage::url('carousel/img-2.jpg') }}"
                    alt="img-2">
                </div>
                <div class="relative">
                    <div class="w-full h-full bg-black/50 absolute"></div>
                    <div class="w-full h-full bg-gradient-to-t from-black to-50% absolute"></div>
                    <div class="absolute left-5 bottom-5"> 
                        <h2 class="font-bold text-6xl text-white">No esperes más</h2>
                        <p class="text-3xl text-white">Registrate y comienza ahora</p>
                    </div>                    
                    <img class="h-[500px] w-full object-cover object-top rounded-t-2xl" src="{{ Storage::url('carousel/img-1.jpg') }}"
                    alt="img-1">
                </div>
            </div>
        </div>
    </main>

    <script>
        $('.one-time').slick();        
    </script>
</body>

</html>
