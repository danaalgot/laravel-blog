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
                <li><a href="" class="pr-3">Home</a></li>
                <li><a href="" class="pr-3">Dashboard</a></li>
                <li><a href="" class="pr-3">Posts</a></li>
            </ul>
    
            <ul class="flex items-center">
                <li><a href="" class="pr-3">Name</a></li>
                <li><a href="" class="pr-3">Login</a></li>
                <li><a href="" class="pr-3">Register</a></li>
                <li><a href="" class="pr-3">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main class="w-8/12 p-8 mx-auto mt-8">
        @yield('content')
    </main>
    
</body>
</html>