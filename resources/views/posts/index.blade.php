@extends('layout.app')

@section('content')
    <h1 class="text-3xl mb-6">Blog Posts</h1>
    @auth
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
    @endauth

    @guest
        <p class="mb-8"><a href="{{ route('login') }}" class="text-blue-500">Login</a> or <a href="{{ route('register') }}" class="text-blue-500">register</a> to create and like posts.</p>
    @endguest

    @if($posts->count())
        @foreach ($posts as $post)
            <article class="mb-6 border-l-4 border-orange-200 p-4 bg-orange-50">
                <header class="flex items-center">
                    <h2 class="mr-2">
                        <a href="" class="font-bold">{{ $post->user->name }}</a>
                    </h2>
                    <span class="text-slate-500 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                </header>

                <p class="mt-2 mb-4">{{ $post->body }}</p>
                    
                <footer class="flex items-center justify-between">
                    <div class="flex items-center">
                        @auth
                            @if($post->likedBy(auth()->user()))
                                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-3">
                                    @csrf
                                    @method('DELETE'){{-- Method Spoofing  --}}
                                    <button type="submit" class="flex">
                                        <span class="material-icons text-red-500 hover:text-purple-500 duration-150">favorite</span>
                                        <span class="sr-only">Unlike Post</span>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-3">
                                    @csrf
                                    <button type="submit" class="flex">
                                        <span class="material-icons text-red-600 hover:text-purple-600 duration-150">favorite_border</span>
                                        <span class="sr-only">Like Post</span>
                                    </button>
                                </form>
                            @endif
                        @endauth

                        <span class="font-bold text-sm inline-block">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                    </div>
 
                    @can('delete', $post)
                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 rounded hover:bg-red-700 duration-150">
                                <span class="material-icons text-white text-sm p-1">delete</span>
                                <span class="sr-only">Delete Post</span>
                            </button>
                        </form>
                    @endcan
                    
                </footer>
                        
            </article>
        @endforeach

        {{ $posts->links() }}
    @else
        <p>There are no posts</p>
    @endif

@endsection