@extends('layout.app')

@section('content')
    <section class="mb-8">
        <h1 class="text-3xl mb-4">{{ $user->name }}</h1>
        <p>
            {{ $posts->count() }}
            {{ Str::plural('post', $posts) }}
        </p>
        <p>
            {{ $user->receivedLikes->count() }}
            Likes
        </p>
    </section>

    @if($posts->count())
        @foreach ($posts as $post)
            <x-post :post="$post" />
        @endforeach

        {{ $posts->links() }}
    @else
        <p>{{ $user->name }} does not have any posts.</p>
    @endif
@endsection