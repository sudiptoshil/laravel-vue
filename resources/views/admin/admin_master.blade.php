<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Metro Lab</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="Mosaddek" name="author" />
   <link href="{{asset("backend/assets/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet" />
   <link href="{{asset("backend/assets/bootstrap/css/bootstrap-responsive.min.css")}}" rel="stylesheet" />
   <link href="{{asset("backend/assets/bootstrap/css/bootstrap-fileupload.css")}}" rel="stylesheet" />
   <link href="{{asset("backend/assets/font-awesome/css/font-awesome.css")}}" rel="stylesheet" />
   <link href="{{asset("backend/css/style.css")}}" rel="stylesheet" />
   <link href="{{asset("backend/css/style-responsive.css")}}" rel="stylesheet" />
   <link href="{{asset("backend/css/style-default.css")}}" rel="stylesheet" id="style_color" />
   <link href="{{asset("backend/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css")}}" rel="stylesheet" />
   <link href="{{asset("backend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css")}}" rel="stylesheet" type="text/css" media="screen"/>
   
 
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">

   <!-- BEGIN HEADER -->
   <div id="app">
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <div class="navbar-inner" >
           <div class="container-fluid">
               <!--BEGIN SIDEBAR TOGGLE-->
               <div class="sidebar-toggle-box hidden-phone">
                   <div class="icon-reorder"></div>
               </div>
               <!--END SIDEBAR TOGGLE-->
               <!-- BEGIN RESPONSIVE MENU TOGGLER -->
               <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="arrow"></span>
               </a>
               <!-- END RESPONSIVE MENU TOGGLER -->
              
               <!-- END  NOTIFICATION -->
               <div class="top-nav ">
                   <ul class="nav pull-right top-menu" >
                       <!-- BEGIN SUPPORT -->
                      
                       <!-- END SUPPORT -->
                       <!-- BEGIN USER LOGIN DROPDOWN -->
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <img src="" alt="">
                               <span class="username">{{ Auth::user()->name }}</span>
                               <b class="caret"></b>
                           </a>
                           <ul class="dropdown-menu extended logout">
                               <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                               <li><a href="#"><i class="icon-cog"></i> My Settings</a></li>
                               <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
                           </ul>
                       </li>
                       <!-- END USER LOGIN DROPDOWN -->
                   </ul>
                   <!-- END TOP NAVIGATION MENU -->
               </div>
           </div>
       </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse">

         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
               <input type="text" class="search-query" placeholder="Search" />
            </form>
         </div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
          <ul class="sidebar-menu">
              <li class="sub-menu active">
                  <router-link to="/home" class="" >
                      <i class="icon-dashboard"></i>
                      <span>Dashboard</span>
                  </router-link>
              </li>
              
                <li class="sub-menu">
                  <router-link to="/add-category" class="" >
                      <i class="icon-dashboard"></i>
                      <span>add category</span>
                  </router-link>
              </li>
              <li class="sub-menu">
                  <router-link to="/manage-category" class="" >
                      <i class="icon-dashboard"></i>
                      <span>manage category</span>
                  </router-link>
              </li>
              <li class="sub-menu">
                  <router-link to="/add-post" class="" >
                      <i class="icon-dashboard"></i>
                      <span>add post</span>
                  </router-link>
              </li>
                <li class="sub-menu">
                  <router-link to="/manage-post" class="" >
                      <i class="icon-dashboard"></i>
                      <span>manage post</span>
                  </router-link>
              </li>
               <li class="sub-menu">
                  <router-link to="/add-aboutus" class="" >
                      <i class="icon-dashboard"></i>
                      <span>add about us</span>
                  </router-link>
              </li>
              <li class="sub-menu">
                  <router-link to="/manage-aboutus" class="" >
                      <i class="icon-dashboard"></i>
                      <span>manage about us</span>
                  </router-link>
              </li>
              <li class="sub-menu">
                  <router-link to="/add-logo" class="" >
                      <i class="icon-dashboard"></i>
                      <span>add logo</span>
                  </router-link>
              </li>
                <li class="sub-menu">
                  <router-link to="/manage-logo" class="" >
                      <i class="icon-dashboard"></i>
                      <span>manage logo</span>
                  </router-link>
              </li>
          </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme Color:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-green" data-style="green"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-red" data-style="red"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           
                           <span class="divider"></span>
                       </li>
                       <li>
                           <a href="#"></a>
                           <span class="divider"></span>
                       </li>
                       <li class="active">
                           
                       </li>
                       
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <admin-main></admin-main>

            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   </div>
   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->
   <div id="footer">
       2013 &copy; Metro Lab Dashboard.
   </div>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="{{asset("backend/js/jquery-1.8.3.min.js")}}"></script>
   <script src="{{asset("backend/js/jquery.nicescroll.js")}}" type="text/javascript"></script>
   <script type="text/javascript" src="{{asset("backend/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js")}}"></script>
   <script type="text/javascript" src="{{asset("backend/assets/jquery-slimscroll/jquery.slimscroll.min.js")}}"></script>
   <script src="{{asset("backend/assets/fullcalendar/fullcalendar/fullcalendar.min.js")}}"></script>
   <script src="{{asset("backend/assets/bootstrap/js/bootstrap.min.js")}}"></script>

   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->

   <script src="{{asset("backend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js")}}" type="text/javascript"></script>
   <script src="{{asset("backend/js/jquery.sparkline.js")}}"></script>
   <script src="{{asset("backend/assets/chart-master/Chart.js")}}"></script>

   <!--common script for all pages-->
   <script src="{{asset("backend/js/common-scripts.js")}}"></script>

   <!--script for this page only-->

   <script src="{{asset("backend/js/easy-pie-chart.js")}}"></script>
   <script src="{{asset("backend/js/sparkline-chart.js")}}"></script>
   <script src="{{asset("backend/js/home-page-calender.js")}}"></script>
   <script src="{{asset("backend/js/chartjs.js")}}"></script>
   <script src="{{ asset('js/app.js') }}" defer></script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>