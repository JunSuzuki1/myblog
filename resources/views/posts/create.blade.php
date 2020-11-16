@extends('layouts.default')

@section('title' , 'New Post')

@section('content')
    <h1>
        New Post
    　　<a href="{{ url('/') }}" class="header-menu btn btn-link">Back</a>
    </h1>
    <form method="post" action="{{ url('/posts') }}">
        {{ csrf_field() }}
        <p>
          <input type="text" name="title" placeholder="enter title" value="{{ old('title') }}">
          @if ($errors->has('title'))
          <span class="error"> {{ $errors->first('title') }}</span>
          @endif
        </p>
        <p>
          <textarea name="body" placeholder="enter body" > {{ old('body') }} </textarea>
          @if ($errors->has('body'))
          <span class="error"> {{ $errors->first('body') }}</span>
          @endif
        </p>
        <p>
          <input type="submit" value="Add" class="btn btn-primary">
        </p>
    </form>
@endsection