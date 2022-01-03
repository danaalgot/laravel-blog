<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Laravel Blog</title>
</head>
<body>
    <header class="bg-orange-100 px-8 py-4">
        <nav class="flex justify-between">
            <ul class="flex items-center">
                <li><a href="{{ route('home') }}" class="pr-4">Home</a></li>
                <li><a href="{{ route('dashboard') }}" class="pr-4">Dashboard</a></li>
                <li><a href="{{ route('posts') }}" class="pr-4">Posts</a></li>
            </ul>
    
            <ul class="flex items-center">
                @auth
                    <li><a href="" class="pr-3">Hi {{ auth()->user()->name }}</a></li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" value="Logout" class="pr-4 cursor-pointer">
                    </form>
                @endauth

                @guest
                    <li><a href="{{ route('login') }}" class="pr-4">Login</a></li>
                    <li><a href="{{ route('register') }}" class="pr-4">Register</a></li>
                @endguest
            </ul>
        </nav>
    </header>
    <main class="w-8/12 p-8 mx-auto mt-8">
        @yield('content')
    </main>
    
</body>
</html>