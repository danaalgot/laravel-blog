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
            <div class="mb-6 border-l-4 border-orange-200 p-4 bg-orange-50">
                <a href="" class="font-bold">{{ $post->user->name }}</a>
                <span class="text-slate-500 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                <p class="mt-2 mb-4">{{ $post->body }}</p>

                <div class="flex items-center">
                    @if($post->likedBy(auth()->user()))
                        <form action="{{ route('posts.likes', $post) }}" method="post">
                            @csrf
                             @method('DELETE'){{-- Method Spoofing  --}}
                            <button type="submit">
                                <span class="material-icons text-blue-500">thumb_down</span>
                                <span class="sr-only">Unlike Post</span>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('posts.likes', $post) }}" method="post">
                            @csrf
                            <button type="submit">
                                <span class="material-icons text-blue-500">thumb_up</span>
                                <span class="sr-only">Like Post</span>
                            </button>
                        </form>
                    @endif
                        
                    <span class="font-bold text-sm inline-block ml-3">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>

                </div>
            </div>
        @endforeach

        {{ $posts->links() }}
    @else
        <p>There are no posts</p>
    @endif

@endsection