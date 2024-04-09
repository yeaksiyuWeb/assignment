@extends('layouts.app')

@section('content')
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line-admin">Course</h1>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <div class="card bottom-10">
                    <div class="card-header">
                        Course
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
                        <form method="post" action="course">
                            @csrf
                            <div class="form-group row mb-2">
                                <label for="course_code">Course Code</label>
                                <input type="text" class="form-control" id="course_code" name="course_code" placeholder="Course Code" />
                            </div>

                            <div class="form-group row mb-2">
                                <label for="course_name">Course Name</label>
                                <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Course Name" />
                            </div>

                            <div class="form-group row mb-2">
                                <label for="course_unit">Course unit</label>
                                <input type="text" class="form-control" id="course_unit" name="course_unit" placeholder="Course Unit" />
                            </div>

                            <div class="form-group row mb-2">
                                <label for="no_of_seats">Seat limit</label>
                                <input type="text" class="form-control" id="no_of_seats" name="no_of_seats" placeholder="Seat limit" />
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <!--    Bordered Table  -->
            <div class="card">
                <div class="card-header">
                    Manage Course
                </div>
                <div class="card-body">
                    <div id="course-table"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="/js/app.js"></script>

