@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h1>{{ $post->title }}
    @if(now()->diffInMinutes($post->created_at) < 80)
        <x-badge type="primary">
            Brand New Post!
        </x-badge>
    @endif </h1>
    <p>{{ $post->content }}</p>
    <p>Added {{ $post->created_at->diffForHumans() }}</p>

    <h4>Comments</h4>

    @forelse($post->comments as $comment)
        <p>{{$comment->content}}</p>
        <p class="text-muted">
            added {{$comment ->created_at->diffForHumans()}}
        </p>
    @empty
        <p>No comments yest!</p>
    @endforelse
@endsection
