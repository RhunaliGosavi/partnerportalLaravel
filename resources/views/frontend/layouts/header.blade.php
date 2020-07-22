
<?php
    $urlString = url()->current();
?>
<!--header start-->

<header>
    <div class="container-fluid ">
      <div class="row">
        <div class="col-lg-2 col-6  p-0 left-sec">
          <a href="#" class="logo"><img src="{{url('/assets_frontend/images/axis-logo.svg')}}" class="img-fluid"></a>
        </div>
        <div class="col-lg-10 col-6 p-0 right-sec">
          <div class="row m-0">
            <div class="col-12 p-0">
              <div class="top-sec">
                <a href="{{url('important/links')}}" class="links">Important Links</a>
                <a href="{{url('employee/helpdesk')}}" class="help">Employee Helpdesk</a>
              </div>
            </div>
          </div>
          <div class="row m-0 menu-sec">
            <div class="col-lg-1 col-10 order-lg-2 text-right ">
              <div class="user-info">
                <a href="#" class="user-icon">
                  <img src="{{url('/assets_frontend/images/user-icon.png')}}">
                </a>
                <div class="submenu-box logout-btn">
                    <a href="{{url('employee/logout')}}">Logout</a>
                </div>
              </div>
            </div>
            <div class="col-lg-10 col-2 offset-lg-1 ">
              <nav class="navbar navbar-expand-lg dashboard-menu ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php if(preg_match("/\bdashboard\b/i", $urlString)) { echo 'active'; } ?>">
                         <a class="nav-link" href="{{url('dashboard')}}">Home</a>
                    </li>

                    <li class="nav-item dropdown <?php if(preg_match("/\bsales\b/i", $urlString)) { echo 'active'; } ?>">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sales Kit
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{url('/sales/kit')}}">Loan Product</a>
                        <a class="dropdown-item" href="{{url('/sales/kit/marketing')}}">Marketing Information</a>
                        <a class="dropdown-item" href="#">On-Screen Calculator</a>
                        <a class="dropdown-item" href="{{url('sales/kit/Dsaonboarding')}}">DSA Onboarding Details</a>
                      </div>
                    </li>
                    <li class="nav-item <?php if(preg_match("/\bapplication\b/i", $urlString)) { echo 'active'; } ?>">
                        <a class="nav-link" href="{{url('application/status/tracker')}}">Application Status Tracker</a>
                    </li>
                    <li class="nav-item <?php if(preg_match("/\brefer\b/i", $urlString)) { echo 'active'; } ?>">
                        <a class="nav-link" href="{{url('refer/friend')}}">Refer Your Friend</a>
                    </li>
                    <li class="nav-item <?php if(preg_match("/\bapply\b/i", $urlString)) { echo 'active'; } ?>">
                        <a class="nav-link" href="{{url('apply/now')}}">Apply Now</a>
                    </li>

                  </ul>
                </div>
              </nav>
            </div>

          </div>
        </div>
      </div>
    </div>

  </header>
<!--header end-->
