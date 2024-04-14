<div class="container-fluid" style="height:50px; background-color: #CD5C5C">
  <div class="container">
    <div class="row">
    <div class="col-md-12 text-white text-end pt-3">
      <strong>Welcome : </strong> {{ session('username') ? ucwords(session('username')) : ""}} 
      &nbsp;&nbsp;&nbsp;&nbsp;
      <strong>Last Login:::1 at 2024-04-01 14:23:25</strong>
    </div>
    </div>
    
  </div>
</div>