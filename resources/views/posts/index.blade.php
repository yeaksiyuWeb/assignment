@extends('layouts.app')

@section('content')

  <div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line-student">Course Feeds</h1>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12 d-flex justify-content-end">
      <button class="btn btn-primary" data-toggle="modal" data-target="#createFeed">+ Create New Feed</button>
      </div>
    </div>

    <div class="row mt-5">
      @if(session('created'))
      <div class="alert alert-success"><p>{{session('created')}}</p></div>
      @endif
      <div class="col-md-8 offset-md-2">
        @foreach ($posts as $post)
          <div class="post">
            <div class="post-header">
              <h4><b>{{ $post['title'] }}</b></h4>
              <p>Posted by {{ $post['studName'] }}</p>
            </div>
            <div class="post-content">
              <p>{{ $post['content'] }}</p>
            </div>
            <div class="post-footer">
              <p>Posted on: {{ $post['created_at'] }}</p>
              <!-- Button to trigger modal -->
              <div class="row">
                <div class="col-md-12 d-flex justify-content-between">
                  <div >
                    <button class="btn btn-primary" data-toggle="modal" data-target="#viewDetails{{ $post['id'] }}">View Details</button>
                    <button class="btn btn-success" data-toggle="modal" data-target="#editFeed{{ $post['id'] }}">Edit Post</button>
                  </div>
                  <div >
                    <button class="btn btn-danger" >Delete Post</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- View Details Modal -->
          <div class="modal fade" id="viewDetails{{ $post['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                  <h4 class="modal-title" id="myModalLabel"><b>{{ $post['title'] }}</b></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                  <p>{{ $post['content'] }}</p>
                  <p>Posted by: {{ $post['studName'] }}</p>
                  <p>Posted on: {{ $post['created_at'] }}</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Edit Feed Modal -->
          <div class="modal fade" id="editFeed{{ $post['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">{{ $post['title'] }}</h4>
                  <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                </div>
                <div class="modal-body">
                  <form action="editPost" method="POST">
                    @csrf 
                    <div class="row mb-4 ms-1 me-1">
                      <label for="title" class="form-label">Title: </label>
                      <input type="text" class="form-control" id="title" name="title" value="{{ $post['title'] }}">
                    </div>
                    <div class="row mb-4 ms-1 me-1">
                      <label for="content" class="form-label">Content:</label>
                      <input type="text" class="form-control" id="content" name="content" value="{{ $post['content'] }}">
                    </div>
                    <div class="row">
                      <div class="col">
                      <button class="btn btn-success">Update</button> 
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Create Feed Modal -->
          <div class="modal fade" id="createFeed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Create your own new feed now !</h4>
                  <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                </div>
                <div class="modal-body">
                
                <form action="{{ route('posts.store') }}" method="POST" class="container mt-4">
                  @csrf
                  <input type="hidden" name="studName" value="">
                  <input type="hidden" name="regNo" value="">
                  <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" id="title" name="title" class="form-control">
                    @error('title')
                      <div class="alert alert-danger">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="content" class="form-label">Content:</label>
                    <textarea class="form-control "id="content" name="content" rows="4" cols="50">
                    </textarea>
                    @error('content')
                      <div class="alert alert-danger">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Create Feed</button>
                </form>

                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- Bootstrap and jQuery JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection