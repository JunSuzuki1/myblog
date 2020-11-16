@extends('layouts.default')

@section('title' , $post-> title)

@section('content')
    <h1>
        {{$post-> title}}
    　　<a href="{{ url('/') }}" class="header-menu btn btn-link">Back</a>
    </h1>
     <p> {!! nl2br(e($post->body)) !!}</p>
    <h2>Comments</h2>
    <ul>
      @forelse ($post->comments as $comment)
        <li>
          {{ $comment->body }}
          <a href="#" class="del btn btn-outline-danger btn-sm" data-id="{{ $comment->id }}">delete</a>
          <form method="post" action="{{ action('CommentsController@destroy', [$post,$comment]) }}" id="form_{{ $comment->id }}">
          {{ csrf_field() }}
          {{ method_field('delete') }}
         </form>
        </li>
      @empty <li>No comments yet</li>
      @endforelse
    </ul>
    <form method="post" action="{{ action('CommentsController@store', $post) }}">
        {{ csrf_field() }}
        <p>
          <input type="text" name="body" placeholder="enter comment" value="{{ old('body') }}">
          @if ($errors->has('body'))
          <span class="error"> {{ $errors->first('body') }}</span>
          @endif
        </p>
        <p>
          <input type="submit" class="btn btn-primary" value="Add Comments">
        </p>
    </form>
    <script src="/js/main.js"></script>
@endsection