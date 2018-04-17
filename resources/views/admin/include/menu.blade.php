        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span>Admin</span></a>
            </div>

            <div class="clearfix"></div>
            <div class="profile clearfix">
              <div class="profile_pic">
              
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Lethu</h2>
              </div>
            </div>
            <br />

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('bill') }}">Bill</a></li>
                      <li><a href="{{ route('comment') }}">Comment</a></li>
                      <li><a href="{{ route('size') }}">Size</a></li>
                      <li><a href="{{ route('color') }}">Color</a></li>
                      <li><a href="{{ route('company') }}">Company</a></li>
                      <li><a href="#">Payment</a></li>
                      <li><a href="{{ route('product') }}">Product</a></li>
                      <li><a href="{{ route('sale') }}"">Sale</a></li>
                      <li><a href="#">Ship oder</a></li>
                      <li><a href="{{ route('typeproduct') }}">Type Product</a></li>
                    </ul>
                  </li>
                  <li><a a href="{{ route('report') }}"><i class="fa fa-desktop"></i> Report </span></a>
                  <li><a a href="{{ route('user') }}"><i class="fa fa-desktop"></i> User </span></a>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i>Acount </span></a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
          </div>
        </div>