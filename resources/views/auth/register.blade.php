@extends('layout.app')

@section('content')
    <h1 class="text-3xl mb-6">Register</h1>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="name" class="inline-block mb-1">Name *</label>
            <input type="text" name="name" id="name" class="bg-slate-100 border w-full p-2 @error('name') border-red-500 @enderror" value="{{ old('name') }}">
            @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="username" class="inline-block mb-1">Username *</label>
            <input type="text" name="username" id="username" class="bg-slate-100 border w-full p-2 @error('username') border-red-500 @enderror" value="{{ old('username') }}">
            @error('username')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
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
        <div class="mb-4">
            <label for="password_confirmation" class="inline-block mb-1">Confirm Password *</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="bg-slate-100 w-full p-2 @error('password_confirmation') border-red-500 @enderror">
        </div>
        <input type="submit" value="Submit" class="duration-300 bg-orange-100 hover:bg-orange-300 py-4 px-8 rounded inline-block mt-4">
    </form>
@endsection