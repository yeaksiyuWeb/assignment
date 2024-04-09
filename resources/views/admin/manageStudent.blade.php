@extends('layouts.app')
@section('content')

<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container  mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line-admin">Student </h1>
                </div>
            </div>
            <div class="row justify-content-center mb-5" >
            <div class="col-md-10">
                <!--    Bordered Table  -->
                <div class="card bottom-10">
                    <div class="card-header">
                        Manage Student
                    </div>
                    <!-- /.panel-heading -->
                    <div class="card-body">
                        <div id="manage-stud-listing-table"></div>
                    </div>
                </div>
                    <!--  End  Bordered Table  -->
            </div>
        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
@endsection
<!-- FOOTER SECTION END-->
<!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
<!-- CORE JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.11.1.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="assets/js/bootstrap.js"></script>
<script src="/js/app.js"></script>
