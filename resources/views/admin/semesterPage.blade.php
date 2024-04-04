@extends('layouts.app')

@section('content')
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line-admin">Semester</h1>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <div class="card bottom-10">
                    <div class="card-header">
                        Semester
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
                        <form method="post" action="semester">
                            @csrf
                            <div class="form-group row mb-2">
                                <label for="semester">Add Semester</label>
                                <input type="text" class="form-control col-6" id="semester" name="semester" placeholder="Semester" />
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <font color="red" align="center">{{ session('delmsg') }}</font>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Manage Semester
                </div>
                <div class="card-body">
                    <div id="semester-table"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="/js/app.js"></script>
