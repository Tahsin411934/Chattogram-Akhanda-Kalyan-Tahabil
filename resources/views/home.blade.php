<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="bg-[#031525] dark:bg-gray-200 font-Inter flex justify-center items-center">

    <div class="bg-[#162C46] w-[50%] rounded-xl p-5 h-96 shadow-2xl mt-[10%]">
        <div class="flex justify-center items-center gap-4">
            <img class="h-12 w-12 rounded-full" src="logo.jpg" alt="">
            <h1 class="text-white font-bold text-3xl">Chattogram Akhanda Kalyan Tahabil</h1>
        </div>
        <div class="flex flex-col gap-5 mt-10 justify-center items-center">
            <Button class="btn w-40 bg-gray-50 p-3 rounded-xl font-semibold text-xl shadow-2xl">Admin Login</Button>
            <header>

                @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                    </a>
                    @else
                    <Button class="btn w-40 bg-gray-50 p-3 rounded-xl font-semibold text-xl shadow-2xl"><a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            User Login
                        </a></Button>


                    @if (Route::has('register'))
                    <a class="hidden" href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Register
                    </a>
                    @endif
                    @endauth
                </nav>
                @endif
            </header>


        </div>
    </div>


</body>

</html>