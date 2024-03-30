<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Course</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/front-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>

<body>
<!-- HEADER END-->
@extends('layouts.header')

<!-- LOGO HEADER END-->
@if(session('alogin'))
    @extends('layouts.menubar')
@endif
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Course</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Course
                    </div>
                    <div class="panel-body">
                        <form name="dept" method="post">
                            <div class="form-group">
                                <label for="coursecode">Course Code</label>
                                <input type="text" class="form-control" id="coursecode" name="coursecode" placeholder="Course Code" required />
                            </div>

                            <div class="form-group">
                                <label for="coursename">Course Name</label>
                                <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Course Name" required />
                            </div>

                            <div class="form-group">
                                <label for="courseunit">Course unit</label>
                                <input type="text" class="form-control" id="courseunit" name="courseunit" placeholder="Course Unit" required />
                            </div>

                            <div class="form-group">
                                <label for="seatlimit">Seat limit</label>
                                <input type="text" class="form-control" id="seatlimit" name="seatlimit" placeholder="Seat limit" required />
                            </div>

                            <button type="submit" name="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(session('msg'))
            <font color="green" align="center">{{ session('msg') }}</font>
        @endif
        <font color="red" align="center">{{ session('delmsg') }}</font>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manage Course
                </div>
                <div class="panel-body">
                    <div class="table-responsive table-bordered">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Course Unit</th>
                                    <th>Seat limit</th>
                                    <th>Creation Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($courses as $course)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $course->courseCode }}</td>
                                        <td>{{ $course->courseName }}</td>
                                        <td>{{ $course->courseUnit }}</td>
                                        <td>{{ $course->noofSeats }}</td>
                                        <td>{{ $course->creationDate }}</td>
                                        <td>
                                            <a href="{{ route('edit-course', $course->id) }}"><button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                                            <a href="{{ route('delete-course', $course->id) }}" onclick="return confirm('Are you sure you want to delete?')"><button class="btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@extends('layouts.footer')

<!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
<!-- CORE JQUERY SCRIPTS -->
<script src="{{ asset('assets/js/jquery-1.11.1.js') }}"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
</body>
</html>
