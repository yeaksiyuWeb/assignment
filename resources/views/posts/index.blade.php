@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row" style="padding-top:50px; padding-bottom:50px;">
      <div class="col-md-8 offset-md-2">
        @foreach ($posts as $post)
          <div class="post">
            <div class="post-header">
              <h4>{{ $post['title'] }}</h4>
              <p>Posted by {{ $post['studName'] }}</p>
            </div>
            <div class="post-content">
              <p>{{ $post['content'] }}</p>
            </div>
            <div class="post-footer">
              <p>Posted on: {{ $post['created_at'] }}</p>
              <button class="btn btn-sm btn-primary">Like</button>
              <button class="btn btn-sm btn-secondary">Comment</button>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  @endsection
