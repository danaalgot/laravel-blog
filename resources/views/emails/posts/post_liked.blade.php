@component('mail::message')
# Your post got a like!

{{ $liker->username }} has liked one of your posts.

@component('mail::button', ['url' => route('posts.show', $post)])
    View Post
@endcomponent       

Thanks,<br>
{{ config('app.name') }}
@endcomponent
