@extends('layout.app')

@section('content')
    <h1 class="text-3xl mb-6">Blog Posts</h1>
    <form action="{{ route('posts') }}" method="post" class="mb-10">
        @csrf

        <div class="mb-4">
            <label for="body" class="inline-block mb-1">Body *</label>
            <textarea type="text" name="body" id="body" cols="30" rows="4" class="bg-slate-100 border w-full p-2 @error('body') border-red-500 @enderror" value="{{ old('body') }}"></textarea>
            @error('body')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <input type="submit" value="Submit" class="duration-300 bg-orange-100 hover:bg-orange-300 py-4 px-8 rounded cursor-pointer inline-block mt-4">

    </form>

    @if($posts->count())
        @foreach ($posts as $post)
            <div class="mb-6 border-l-4 border-orange-200 py-4 bg-orange-50 pl-4">
                <a href="" class="font-bold">{{ $post->user->name }}</a>
                <span class="text-slate-500 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                <p class="mt-2">{{ $post->body }}</p>
            </div>
        @endforeach

        {{ $posts->links() }}
    @else
        <p>There are no posts</p>
    @endif

@endsection