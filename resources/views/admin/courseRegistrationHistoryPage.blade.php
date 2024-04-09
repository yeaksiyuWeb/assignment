@extends('layouts.app')

@section('content')
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line-admin">Enroll History</h1>
                </div>
            </div>
            <div class="row justify-content-center mb-5" >
            <div class="col-md-11">
                <!--    Bordered Table  -->
                <div class="card">
                    <div class="card-header">
                        Enroll History
                    </div>
                    <!-- /.panel-heading -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name </th>
                                        <th>Student Reg no </th>
                                        <th>Course Name </th>
                                        <th>Session </th>
                                        <th>Department</th>
                                        <th>Semester</th>
                                        <th>Enrollment Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registration_history as $registration)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $registration->joinStudentTable->studentName}}</td>
                                            <td>{{ $registration->regNo }}</td>
                                            <td>{{ $registration->course }}</td>
                                            <td>{{ $registration->session }}</td>
                                            <td>{{ $registration->department }}
                                            <td>{{ $registration->semester }}</td>
                                            <td>{{ $registration->registerDate }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                    <!--  End  Bordered Table  -->
            </div>
        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
@endsection
