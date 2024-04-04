@extends('layouts.app')

<!-- @if(session('alogin'))
 @include('layouts.menubar')
@endif -->
@section('content')

<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Department  </h1>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Department 
                        </div>
<!-- <font color="green" align="center"><?php //echo htmlentities($_SESSION['msg']);?><?php //echo htmlentities($_SESSION['msg']="");?></font> -->
                        <div class="panel-body">
                            <form action="/addDept" name="dept" method="post">
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
                                <div class="form-group">
                                    <label for="department">Add Department  </label>
                                    <input type="text" class="form-control" id="department" name="department" placeholder="department"/>
                                </div>
                                <button type="submit" name="submit" class="btn btn-default">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <font color="red" align="center"><?php //echo htmlentities($_SESSION['delmsg']);?><?php //echo htmlentities($_SESSION['delmsg']="");?></font> -->
            <div class="col-md-12">
                <!--    Bordered Table  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manage Session
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="dept-listing-table">

                        </div>
                    </div>
                </div>
                    <!--  End  Bordered Table  -->
            </div>
        </div>
    </div>
</div>
@endsection
    <!-- CONTENT-WRAPPER SECTION END-->

    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <!-- <script src="assets/js/jquery-1.11.1.js"></script> -->
    <!-- BOOTSTRAP SCRIPTS  -->
    <!-- <script src="assets/js/bootstrap.js"></script> -->
<script src="/js/app.js"></script>



