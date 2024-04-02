@extends('layouts.app')

@section('content')
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
                        Semester
                    </div>
                    <div class="panel-body">
                        @if(session('msg'))
                        <font color="green" align="center">{{ session('msg') }}</font>
                        {{ session()->forget('msg') }}
                        @endif

                        {{-- <form name="semester" method="post" action="{{ route('semester.store') }}"> --}}
                        <form method="post">
                            @csrf
                            <div class="form-group">
                                <label for="semester">Add Semester</label>
                                <input type="text" class="form-control" id="semester" name="semester" placeholder="Semester" required />
                            </div>
                            <button type="submit" name="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
                                    <th>Semester</th>
                                    <th>Creation Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($semesters as $semester)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $semester->semester }}</td>
                                        <td>{{ $semester->created_at }}</td>
                                        <td>
                                            <form method="post" action="{{ route('semester.destroy', $semester->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                            </form>
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
@endsection
