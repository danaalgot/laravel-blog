@extends('layout.app')

@section('content')
    <h1 class="text-3xl mb-6">Login</h1>
    @if (session('status'))
        <div class="bg-red-50 text-red-600 border border-red-600 px-4 py-2 my-4">{{ session('status') }}</div>
    @endif
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="email" class="inline-block mb-1">Email *</label>
            <input type="email" name="email" id="email" class="bg-slate-100 border w-full p-2 @error('email') border-red-500 @enderror" value="{{ old('email') }}">
            @error('email')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="inline-block mb-1">Password *</label>
            <input type="password" name="password" id="password" class="bg-slate-100 border w-full p-2 @error('password') border-red-500 @enderror"">
            @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-4 flex items-center">
            <input type="checkbox" name="remember" id="remember" class="mr-2">
            <label for="remember">Remember me</label>
        </div>
        <input type="submit" value="Submit" class="duration-300 bg-orange-100 hover:bg-orange-300 py-4 px-8 rounded inline-block mt-4">
    </form>
@endsection