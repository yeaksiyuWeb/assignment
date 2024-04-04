<?php
// session_start();
// include('includes/config.php');
// if(strlen($_SESSION['alogin'])==0)
//     {   
// header('location:index.php');
// }
// else{

// if(isset($_POST['submit']))
// {
//   $sesssion=$_POST['sesssion'];
// $ret=mysqli_query($con,"insert into session(session) values('$sesssion')");
// if($ret)
// {
// $_SESSION['msg']="Session Created Successfully !!";
// }
// else
// {
//   $_SESSION['msg']="Error : Session not created";
// }
// }
// if(isset($_GET['del']))
//       {
//               mysqli_query($con,"delete from session where id = '".$_GET['id']."'");
//                   $_SESSION['delmsg']="Session deleted !!";
//       }
?>

@extends('layouts.app')
@section('content')


<?php 
// if($_SESSION['alogin']!="")
// {
//  include('includes/menubar.php');
// }
 ?>

@if ($errors->has('session'))
    <div id="error-message">{{ $errors->first('session') }}</div>
@endif

    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add session  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Session
                        </div>
<font color="green" align="center"><?php //echo htmlentities($_SESSION['msg']);?><?php //echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
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
                                <div class="form-group">
                                    <label for="session">Create Session </label>
                                    <input type="text" class="form-control" id="session" name="session" placeholder="Session" />
                                </div>
                                <button type="submit" name="submit" class="btn btn-default">Submit</button>
                            </form>
                        </div>
                            </div>
                    </div>
                  
                </div>
                <font color="red" align="center"><?php //echo htmlentities($_SESSION['delmsg']);?><?php //echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Session
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Session</th>
                                            <th>Creation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sessions as $session)
                                        <tr>
                                            <td>{{ $session->id }}</td>
                                            <td>{{ $session->session }}</td>
                                            <td>{{ $session->created_at }}</td>
                                            <td>
  <a href="session.php?id=<?php //echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn btn-danger">Delete</button>
</a>
                                            </td>
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
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <!-- <script src="assets/js/jquery-1.11.1.js"></script> -->
    <!-- BOOTSTRAP SCRIPTS  -->
    <!-- <script src="assets/js/bootstrap.js"></script> -->
    <script src="/js/app.js"></script>