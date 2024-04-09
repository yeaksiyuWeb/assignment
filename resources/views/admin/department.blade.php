@extends('layouts.app')

@section('content')

<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line-admin">Department  </h1>
            </div>
        </div>
        <div class="row justify-content-center mb-5" >
                <div class="col-md-6">
                    <div class="card bottom-10">
                        <div class="card-header">
                            Department 
                        </div>
                        <div class="card-body">
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
                                <div class="form-group row mb-2">
                                    <label for="department">Add Department  </label>
                                    <input type="text" class="form-control" id="department" name="department" placeholder="department"/>
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
                    <div class="card-heading">
                        Manage Department
                    </div>
                    <!-- /.panel-heading -->
                    <div class="card-body">
                        <div id="dept-listing-table"></div>
                    </div>
                </div>
                    <!--  End  Bordered Table  -->
            </div>
        </div>
    </div>
</div>
@endsection

<script src="/js/app.js"></script>



