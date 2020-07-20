
<?php 
    $urlString = url()->current();
?>
<!--header start-->
<header>
  <div class="container-fluid ">
    <div class="row">
      <div class="col-md-3 p-0 left-sec">
        <a href="#" class="logo"><img src="{{url('/assets_frontend/images/axis-logo.svg')}}" class="img-fluid"></a>
      </div>
      <div class="col-md-9 p-0 right-sec">
        <div class="top-sec">
          <a href="{{url('important/links')}}" class="links">Important Links</a>
          <a href="{{url('employee/helpdesk')}}" class="help">Employee Helpdesk</a>
        </div>
        <div class="menu-sec">
          <nav class="dashboard-menu">
            <ul>
              <li class="<?php if(preg_match("/\bdashboard\b/i", $urlString)) { echo 'active'; } ?>"><a href="{{url('dashboard')}}">Home</a></li>
              <li class="<?php if(preg_match("/\bsales\b/i", $urlString)) { echo 'active'; } ?>"><a href="{{url('/sales/kit')}}">Sales Kit</a></li>
              <li class="<?php if(preg_match("/\bapplication\b/i", $urlString)) { echo 'active'; } ?>"><a href="{{url('application/status/tracker')}}">Application Status Tracker</a></li>
              <li class="<?php if(preg_match("/\brefer\b/i", $urlString)) { echo 'active'; } ?>"><a href="{{url('refer/friend')}}">Refer Your Friend</a></li>
              <li class="<?php if(preg_match("/\bapply\b/i", $urlString)) { echo 'active'; } ?>"><a href="{{url('apply/now')}}">Apply Now</a></li>
            </ul>
          </nav>
          <div class="user-info">
            <a href="#" class="user-icon">
              <img src="{{url('/assets_frontend/images/user-icon.png')}}">
            </a>
            <div class="submenu-box logout-btn">
              <a href="{{url('employee/logout')}}">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!--header end-->