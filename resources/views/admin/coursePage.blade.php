@extends('layouts.app')

@section('content')
{{-- <body>
<!-- HEADER END-->

@include('layouts.header') --}}

<!-- LOGO HEADER END-->
{{-- @if(session('alogin'))
    @include('layouts.menubar') --}}
{{-- @endif --}}

<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line-admin">Course</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bottom-10">
                    <div class="card-header">
                        Course
                    </div>
                    <div class="card-body">
                        <form name="dept" method="post">
                            <div class="form-group row mb-2">
                                <label for="coursecode">Course Code</label>
                                <input type="text" class="form-control" id="coursecode" name="coursecode" placeholder="Course Code" required />
                            </div>

                            <div class="form-group row mb-2">
                                <label for="coursename">Course Name</label>
                                <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Course Name" required />
                            </div>

                            <div class="form-group row mb-2">
                                <label for="courseunit">Course unit</label>
                                <input type="text" class="form-control" id="courseunit" name="courseunit" placeholder="Course Unit" required />
                            </div>

                            <div class="form-group row mb-2">
                                <label for="seatlimit">Seat limit</label>
                                <input type="text" class="form-control" id="seatlimit" name="seatlimit" placeholder="Seat limit" required />
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
{{-- @include('layouts.footer') --}}

<!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
<!-- CORE JQUERY SCRIPTS -->
{{-- <script src="{{ asset('assets/js/jquery-1.11.1.js') }}"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{ asset('assets/js/bootstrap.js') }}"></script> --}}
{{-- </body>
</html> --}}
