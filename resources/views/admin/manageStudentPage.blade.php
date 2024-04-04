@extends('layouts.app')

@section('content')
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line-admin">Student Registration  </h1>
            </div>
        </div>
        <div class="row justify-content-center mb-5" >
            <div class="col-md-6">
                <div class="card bottom-10">
                    <div class="card-header">
                        Student Registration
                    </div>
                    <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger mt-1">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success_student_name'))
                        <div class="alert alert-success mt-1">
                            <p> {{session('success_student_name')}} student account registered successfully</p>
                        </div>
                    @endif
                    <form method="post" action="addStudent">
                        @csrf
                        <div class="form-group row mb-2">
                            <label for="studentName" class="col-md-4 col-form-label">Student Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Student Name" />
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="regNo" class="col-md-4 col-form-label">Student Reg No</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="regNo" name="regNo" placeholder="Student Reg no" />
                            </div>    
                        </div>

                        <div class="form-group row mb-4">
                            <label for="password" class="col-md-4 col-form-label">Password  </label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" />
                            </div>    
                        </div>   
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection

<script src="/js/app.js"></script>

