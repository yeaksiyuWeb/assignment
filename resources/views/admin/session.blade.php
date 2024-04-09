
@extends('layouts.app')

@section('content')

<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line-admin">Add session  </h1>
                </div>
            </div>
            <div class="row justify-content-center mb-5">
                <div class="col-md-6">
                    <!--- Bordered Table -->
                    <div class="card">
                        <div class="card-header">
                            Session
                        </div>
                        <div class="card-body">
                            <form action="/addSession" name="session" method="post">
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
                                    <label for="session">Create Session </label>
                                    <input type="text" class="form-control" id="session" name="session" placeholder="Session" />
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
                        Manage Session
                    </div>
                    <!-- /.panel-heading -->
                    <div class="card-body">
                        <div id="sess-listing-table"></div>
                    </div>
                </div>
                    <!--  End  Bordered Table  -->
            </div>
        </div>
    </div>
</div>
@endsection
<script src="/js/app.js"></script>