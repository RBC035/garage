<?php 

include('./constant/check.php');
require_once('./constant/connect.php');
?>
    
    <div id="main-wrapper">
        
        <div class="header ">
            <marquee class="d-lg-none d-block">
                <div class="ml-lg-5 pl-lg-5 ">
                  
                     <b id="ti" class="ml-lg-5 pl-lg-5"></b>
                   
                   
                    </div>
            </marquee>
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                
                <div class="navbar-header">
                    <a class="navbar-brand" href="a-index.php">
                        
                         
                        <b><img src="./assets/uploadImage/logo.jpeg" alt="homepage" class="dark-logo" style="width:20%;height:auto;"/></b>
                       
                    </a>
                </div>
                
                <div class="navbar-collapse">
                    
                    <ul class="navbar-nav  mt-md-0">
                        
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        
                      
                        
                    </ul>
                    <div class="ml-lg-5 pl-lg-5 d-lg-block d-none">
                  
                     <b id="time" class="ml-lg-5 pl-lg-5"></b>
                   
                   
                    </div>
                    <ul class="navbar-nav my-lg-0 ml-auto">

                      <img src="./assets/uploadImage/Logo/transalation.png" alt="user" style="height: 30px; width:auto; margin-top: 16px; margin-right: 10px;">
                        <div id="google_translate_element"></div>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                                <img src="./assets/uploadImage/Profile/young-woman-avatar-facial-features-stylish-userpic-flat-cartoon-design-elegant-lady-blue-jacket-close-up-portrait-80474088.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
     
                                     <li><a href="a.change-password.php"><i class="fa fa-key"></i> Changed Password</a></li>
                                      <!-- <li><a href="#"><i class="fa fa-user"></i> Add user</a></li> -->
                               
                                    <li><a href="app/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>
        <script language="javascript">
var today = new Date();
document.getElementById('ti').innerHTML=today;

var today = new Date();
document.getElementById('time').innerHTML=today;
 </script>