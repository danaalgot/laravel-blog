@props(['post' => $post])

<article class="mb-6 border-l-4 border-orange-200 p-4 bg-orange-50">
    <header class="flex items-center">
        <h2 class="mr-2">
            <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
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