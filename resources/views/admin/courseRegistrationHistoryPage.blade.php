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
            <div class="col-md-12">
                <!--    Bordered Table  -->
                <div class="card bottom-10">
                    <div class="card-header">
                        Enroll History
                    </div>
                    <!-- /.panel-heading -->
                    <div class="card-body">
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                                <th>Student Name </th>
                                                <th>Student Reg no </th>
                                        <th>Course Name </th>
                                        <th>Session </th>
                                        
                                            <th>Semester</th>
                                            <th>Enrollment Date</th>
                                            <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registration_history as $registration)
                                        <tr>
                                            @if ($registration->joinStudentTable)
                                                {{ $registration->joinStudentTable->studentName }}
                                            @else
                                                No student associated
                                            @endif
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

{{-- <?php
$sql=mysqli_query($con,"select courseenrolls.course as cid, course.courseName as courname,session.session as session,department.department as dept,courseenrolls.enrollDate as edate ,semester.semester as sem,students.studentName as sname,students.StudentRegno as sregno from courseenrolls join course on course.id=courseenrolls.course join session on session.id=courseenrolls.session join department on department.id=courseenrolls.department   join semester on semester.id=courseenrolls.semester join students on students.StudentRegno=courseenrolls.studentRegno ");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                    <tr>
                                        <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['sname']);?></td>
                                        <td><?php echo htmlentities($row['sregno']);?></td>
                                        <td><?php echo htmlentities($row['courname']);?></td>
                                        <td><?php echo htmlentities($row['dept']);?></td>
                                        
                                        <td><?php echo htmlentities($row['sem']);?></td>
                                            <td><?php echo htmlentities($row['edate']);?></td>
                                        <td>
                                        <a href="print.php?id=<?php echo $row['cid']?>" target="_blank">
<button class="btn btn-primary"><i class="fa fa-print "></i> Print</button> </a>                                        


                                        </td>
                                    </tr>
                                    <?php 
                                    $cnt++;
                                    } ?> --}}