@extends('layouts.app')

@section('content')

  <div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line-student">Course Feeds</h1>
        </div>
    </div>
    <div class="row">
      @if(session('created'))
      <div class="alert alert-success" id="status-popup"><p>{{session('created')}}</p></div>
      @endif
      @if(session('edited'))
      <div class="alert alert-success" id="status-popup"><p>{{session('edited')}}</p></div>
      @endif
      @if(session('deleted'))
      <div class="alert alert-success" id="status-popup"><p>{{session('deleted')}}</p></div>
      @endif
      <div class="col-md-12 d-flex justify-content-end">
        <button class="btn btn-primary" data-toggle="modal" data-target="#createFeed">+ Create New Feed</button>
      </div>
      <form action="{{ route('posts.admin.display') }}" method="GET" id="filterForm">
          @csrf
          <select name="postSelection" id="postSelection" onchange="this.form.submit()">
              <option value="allPosts" {{ $postType == 'allPosts' ? 'selected' : '' }}>All Posts</option>
              <option value="myPosts" {{ $postType == 'myPosts' ? 'selected' : '' }}>My Posts</option>
          </select>
          <button type="submit" style="display: none;">Submit</button>
      </form>
    </div>

    <div class="row mt-5">
      
      <div class="col-md-8 offset-md-2">
      @foreach ($posts as $post)
        @if($postType == 'allPosts')
          @can('viewAny', $post)
            <div class="post">
              <div class="post-header">
                <h4><b>{{ $post['title'] }}</b></h4>
                <p>Posted by {{ $post['author'] }}</p>
              </div>
              <div class="post-content">
                <p>{{ $post['content'] }}</p>
              </div>
              <div class="post-footer">
                <p>Posted on: {{ $post['created_at'] }}</p>
                <!-- Button to trigger modal -->
                <div class="row">
                  <div class="col-md-12 d-flex justify-content-between">
                    <div>
                      <button class="btn btn-primary" data-toggle="modal" data-target="#viewDetails{{ $post['id'] }}">View Details</button>
                      @can('updateByAdmin', $post)
                        <button class="btn btn-success" data-toggle="modal" data-target="#editFeed{{ $post['id'] }}">Edit Post</button>
                      @endcan
                    </div>
                    <div>
                      @can('deleteByAdmin', $post)
                        <button class="btn btn-danger" onclick="confirmDelete({{ $post['id'] }})">Delete Post</button>
                      @endcan
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
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                  </div>
                  <div class="modal-body">
                    <p>{{ $post['content'] }}</p>
                    <p>Posted by: {{ $post['author'] }}</p>
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
                    <form action="{{ route('posts.admin.update', ['id' => $post['id']]) }}" method="POST">
                      @csrf 
                      @method('PUT')
                      <div class="row mb-4 ms-1 me-1">
                        <label for="title" class="form-label">Title: </label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $post['title'] }}">
                      </div>
                      <div class="row mb-4 ms-1 me-1">
                        <label for="content" class="form-label">Content:</label>
                        <!-- <input type="text" class="form-control" id="content" name="content" value="{{ $post['content'] }}"> -->
                        <textarea class="form-control" id="content" name="content" rows="10" cols="50">{{ $post['content'] }}</textarea>
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
                  
                  <form action="{{ route('posts.admin.store') }}" method="POST" class="container mt-4">
                    @csrf
                    <!-- <input type="hidden" name="author" value="">
                    <input type="hidden" name="regNo" value=""> -->
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
                      <textarea class="form-control "id="content" name="content" rows="4" cols="50"></textarea>
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

            <!-- Delete Feed Form -->
            <!-- Send the form using the delete method -->
            <form id="deleteForm{{ $post['id'] }}" action="{{ route('posts.admin.destroy', ['id' => $post['id']]) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
          @endcan
        @endif

        @if($postType == 'myPosts')
          @can('viewAdmin', $post)
            <div class="post">
              <div class="post-header">
                <h4><b>{{ $post['title'] }}</b></h4>
                <p>Posted by {{ $post['author'] }}</p>
              </div>
              <div class="post-content">
                <p>{{ $post['content'] }}</p>
              </div>
              <div class="post-footer">
                <p>Posted on: {{ $post['created_at'] }}</p>
                <!-- Button to trigger modal -->
                <div class="row">
                  <div class="col-md-12 d-flex justify-content-between">
                    <div>
                      <button class="btn btn-primary" data-toggle="modal" data-target="#viewDetails{{ $post['id'] }}">View Details</button>
                      @can('updateByAdmin', $post)
                        <button class="btn btn-success" data-toggle="modal" data-target="#editFeed{{ $post['id'] }}">Edit Post</button>
                      @endcan
                    </div>
                    <div>
                      @can('deleteByAdmin', $post)
                        <button class="btn btn-danger" onclick="confirmDelete({{ $post['id'] }})">Delete Post</button>
                      @endcan
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
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                  </div>
                  <div class="modal-body">
                    <p>{{ $post['content'] }}</p>
                    <p>Posted by: {{ $post['author'] }}</p>
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
                    <form action="{{ route('posts.admin.update', ['id' => $post['id']]) }}" method="POST">
                      @csrf 
                      @method('PUT')
                      <div class="row mb-4 ms-1 me-1">
                        <label for="title" class="form-label">Title: </label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $post['title'] }}">
                      </div>
                      <div class="row mb-4 ms-1 me-1">
                        <label for="content" class="form-label">Content:</label>
                        <!-- <input type="text" class="form-control" id="content" name="content" value="{{ $post['content'] }}"> -->
                        <textarea class="form-control" id="content" name="content" rows="10" cols="50">{{ $post['content'] }}</textarea>
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
                  
                  <form action="{{ route('posts.admin.store') }}" method="POST" class="container mt-4">
                    @csrf
                    <!-- <input type="hidden" name="author" value="">
                    <input type="hidden" name="regNo" value=""> -->
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
                      <textarea class="form-control "id="content" name="content" rows="4" cols="50"></textarea>
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

            <!-- Delete Feed Form -->
            <!-- Send the form using the delete method -->
            <form id="deleteForm{{ $post['id'] }}" action="{{ route('posts.admin.destroy', ['id' => $post['id']]) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
          @endcan
        @endif
      @endforeach

      </div>
    </div>
  </div>

  <!-- Bootstrap and jQuery JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <script>
    // This only use to toggle the delete confirmation model
    function confirmDelete(postId) {
        if (confirm("Are you sure you want to delete this post?")) {
            // If the user confirms, submit the form
            document.getElementById('deleteForm' + postId).submit();
        }
    }
  </script>


  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var statusPopup = document.getElementById('status-popup');
      
      if (statusPopup) {
        // Show the pop-up
        statusPopup.style.opacity = '1';

        // Set a timer to fade out the pop-up after 3 seconds
        setTimeout(function() {
          fadeOut(statusPopup);
        }, 2000);
      }
    });

    function fadeOut(element) {
      var opacity = 1;
      var interval = setInterval(function() {
        if (opacity <= 0.1) {
          clearInterval(interval);
          element.style.display = 'none';
        }
        element.style.opacity = opacity;
        opacity -= opacity * 0.1;
      }, 100);
    }
  </script>
@endsection