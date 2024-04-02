<!-- 
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
//   $department=$_POST['department'];
// $ret=mysqli_query($con,"insert into department(department) values('$department')");
// if($ret)
// {
// $_SESSION['msg']="Department Created Successfully !!";
// }
// else
// {
//   $_SESSION['msg']="Error : Department not created";
// }
// }
// if(isset($_GET['del']))
//       {
//               mysqli_query($con,"delete from department where id = '".$_GET['id']."'");
//                   $_SESSION['delmsg']="Department deleted !!";
//       }

?> -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | department</title>
    <link href="{{ asset('css/admin/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet" />
</head>


<body>
@include('layouts.header')
@include('layouts.menubar')
@if(session('alogin'))
 @include('layouts.menubar')
@endif

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
                       <form name="dept" method="post">
   <div class="form-group">
    <label for="department">Add Department  </label>
    <input type="text" class="form-control" id="department" name="department" placeholder="department" required />
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
    <!-- CONTENT-WRAPPER SECTION END-->
@include('layouts.footer')
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <!-- <script src="assets/js/jquery-1.11.1.js"></script> -->
    <!-- BOOTSTRAP SCRIPTS  -->
    <!-- <script src="assets/js/bootstrap.js"></script> -->
</body>
<script src="/js/app.js"></script>
</html>


