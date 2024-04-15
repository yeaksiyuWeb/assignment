@extends('layouts.app')

@section('content')


<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line-student">Student Profile</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
            <div class="card-header">Student Profile</div>
            <div class="card-body">
                <form action="{{ route('student.studentProfile.update', ['regNo' => $student->regNo]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('status'))
                    <div class="alert alert-success" id="status-popup"><p>{{session('status')}}</p></div>
                    @endif
                    <div class="form-group row mb-2">
                        <label for="studentName" class="col-md-4 col-form-label "><b>Student Name</b></label>
                        <div class="col-md-6">
                          <input type="text" name="studentName" id="studentName" class="form-control" value="{{ $student->studentName }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="regNo" class="col-md-4 col-form-label "><b>Student Registration No</b></label>
                        <div class="col-md-6">
                            <input type="text" name="regNo" id="regNo" class="form-control" value="{{ $student->regNo }}" disabled></input>                              
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="pincode" class="col-md-4 col-form-label "><b>Pincode</b></label>
                        <div class="col-md-6">
                            <input type="text" name="pincode" id="pincode" class="form-control @error('pincode') is-invalid @enderror" value="{{ $student->pincode }}"></input>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="cgpa" class="col-md-4 col-form-label "><b>CGPA</b></label>
                        <div class="col-md-6">
                            <input type="text" name="cgpa" id="cgpa" class="form-control @error('cgpa') is-invalid @enderror" value="{{ $student->cgpa }}"></input>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

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
