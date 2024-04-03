@extends('layouts.app')

@section('content')


<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line-student">Registration History</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Registration History</div>
            <div class="card-body">
            <div class="table-responsive">
            <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Course Name</th>
              <th>Session</th>
              <th>Department</th>
              <th>Level</th>
              <th>Semester</th>
              <th>Registration Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reg_list as $reg_row)
              <tr>
                <td>{{ $reg_row['id'] }}</td>
                <td>{{ $reg_row['course'] }}</td>
                <td>{{ $reg_row['session'] }}</td>
                <td>{{ $reg_row['department'] }}</td>
                <td>{{ $reg_row['level'] }}</td>
                <td>{{ $reg_row['semester'] }}</td>
                <td>{{ $reg_row['registerDate'] }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
            </div>
            
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
