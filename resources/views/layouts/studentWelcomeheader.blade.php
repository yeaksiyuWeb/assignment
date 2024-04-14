<div class="container-fluid" style="height:50px; background-color: #172b3f">
  <div class="container">
    <div class="row">
    <div class="col-md-12 text-white text-end pt-3">
      <strong>Welcome : </strong> {{ session('studName') ? ucwords(session('studName')) : ""}} 
      &nbsp;&nbsp;&nbsp;&nbsp;
      <strong>Student ID : </strong> {{ session('regNo') ? ucwords(session('regNo')) : ""}} 
      &nbsp;&nbsp;&nbsp;&nbsp;
      <strong>Last Login:::1 at 2024-04-01 14:23:25</strong>
    </div>
    </div>
    
  </div>
</div>