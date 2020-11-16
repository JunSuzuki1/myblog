@extends('layouts.default')

@section('title' , 'Edit Post')

@section('content')
    <h1>
        Edit Post
    　　<a href="{{ url('/') }}" class="header-menu btn btn-link">Back</a>
    </h1>
    <form method="post" action="{{ url('/posts', $post->id) }}">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <p>
          <input type="text" name="title" placeholder="enter title" value="{{ old('title',$post->title) }}">
          @if ($errors->has('title'))
          <span class="error" {{ $errors->first('title') }}></span>
          @endif
        </p>
        <p>
          <textarea name="body" placeholder="enter body" > {{ old('body',$post->body) }} </textarea>
          @if ($errors->has('body'))
          <span class="error" {{ $errors->first('body') }}></span>
          @endif
        </p>
        <p>
          <input type="submit" class="btn btn-success" value="Update">
        </p>
    </form>
@endsection