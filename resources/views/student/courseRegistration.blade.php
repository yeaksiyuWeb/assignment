@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <div class="container mt-5 mb-5">
      <div class="row">
          <div class="col-md-12">
              <h1 class="page-head-line-student">Course Registration</h1>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-md-6">
              <div class="card">
              <div class="card-header">Register Course</div>
              <div class="card-body">
                  <form method="POST" action="course-registration">
                      @csrf
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
                      <div class="alert alert-success"><p>{{session('status')}}</p></div>
                      @endif
                      <div class="form-group row mb-2">
                          <label for="studentName" class="col-md-4 col-form-label "><b>Student Name</b></label>
                          <div class="col-md-6">
                              <input type="text" name="studentName" id="studentName" class="form-control" value="{{ old('studentName', session('studName')) }}" disabled></input>
                          </div>
                      </div>
                      <div class="form-group row mb-2">
                          <label for="regNo" class="col-md-4 col-form-label "><b>Student Registration No</b></label>
                          <div class="col-md-6">
                              <input type="text" name="regNo" id="regNo" class="form-control @error('regNo') is-invalid @enderror" value="{{ old('regNo', session('regNo')) }}"></input>                              
                          </div>
                      </div>
                      <div class="form-group row mb-2">
                          <label for="pincode" class="col-md-4 col-form-label "><b>Pincode</b></label>
                          <div class="col-md-6">
                              <input type="text" name="pincode" id="pincode" class="form-control @error('pincode') is-invalid @enderror" value="{{ old('pincode', session('pincode')) }}"></input>
                          </div>
                      </div>
                      <div class="form-group row mb-2">
                        <label for="session" class="col-md-4 col-form-label"><b>Session</b></label>
                        <div class="col-md-6">
                          <select name="session" id="session" class="form-control @error('session') is-invalid @enderror">
                            <option value = "">Select Session</option>
                            @foreach($sess as $session)
                            <option value="{{ $session }}">
                              {{ $session }}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group row mb-2">
                        <label for="department" class="col-md-4 col-form-label"><b>Department</b></label>
                        <div class="col-md-6">
                          <select name="department" id="department" class="form-control @error('department') is-invalid @enderror">
                            <option value = "">Select Department</option>
                            @foreach($departments as $department)
                            <option value="{{ $department }}">
                              {{ $department }}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group row mb-2">
                        <label for="level" class="col-md-4 col-form-label"><b>Level</b></label>
                        <div class="col-md-6">
                          <select name="level" id="level" class="form-control @error('level') is-invalid @enderror">
                            <option value = "">Select Level</option>
                            @foreach($levels as $level)
                            <option value="{{ $level }}">
                              {{ $level }}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group row mb-2">
                        <label for="semester" class="col-md-4 col-form-label"><b>Semester</b></label>
                        <div class="col-md-6">
                          <select name="semester" id="semester" class="form-control @error('semester') is-invalid @enderror">
                            <option value = "">Select Semester</option>
                            @foreach($sems as $semester)
                            <option value="{{ $semester }}">
                              {{ $semester }}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label for="course" class="col-md-4 col-form-label"><b>Course</b></label>
                        <div class="col-md-6">
                          <select name="course" id="course" class="form-control @error('course') is-invalid @enderror">
                            <option value = "">Select Course</option>
                            @foreach($courses as $course)
                            <option value="{{ $course }}">
                              {{ $course }}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">Register</button>
                          </div>
                      </div>
                  </form>
              </div>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection
