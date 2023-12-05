@props(['post'])

<div class="post">
    <h2>{{ $post->title }}</h2>
    <p>By {{ $post->author }} in {{ $post->location }}</p>
    <p>{{ $post->excerpt }}</p>
</div>
