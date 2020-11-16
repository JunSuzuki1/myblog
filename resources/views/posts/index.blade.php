@extends('layouts.default')

@section('title' ,'Blog Posts' )

@section('content')
    <h1>
      <div class="row">
        <span class="col-9">Blog Posts</span>
        <a href="{{ url('/posts/create') }}" class="col-3 btn btn-primary">New Post</a>
      </div>
    </h1>
    <ul>
      @forelse ($posts as $post)
        <li>
          <div class="row">
            <a href="{{ action('PostsController@show', $post) }}" class="col-10">{{$post->title}}</a>
            <a href="{{ action('PostsController@edit', $post) }}" class="btn btn-success btn-sm col-1">edit</a>
            <a href="#" class="del btn btn-danger btn-sm col-1" data-id="{{ $post->id }}">delete</a>
            <form method="post" action="{{ url('/posts', $post->id) }}" id="form_{{ $post->id }}">
               {{ csrf_field() }}
               {{ method_field('delete') }}
            </form>
          </div>
        </li>
      @empty <li>No posts yet</li>
      @endforelse
    </ul>
    <script src="/js/main.js"></script>
@endsection