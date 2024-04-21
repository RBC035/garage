<link rel="stylesheet" href="assets/css/popup_style.css"> 
           <style>
.footer1 {
  position: fixed;
  bottom: 0;
  width: 100%;
  color: #5c4ac7;
  text-align: center;
}

</style>
   <?php
   
    include('./constant/layout/head.php');
    ?>
    
    <div id="main-wrapper">
        <div class="unix-login">

            <div class="container-fluid" style="background-image: url('assets/uploadImage/car img.jpg');
 background-color: #ffffff;background-size:cover">
                <div class="row ">
                  <!-- <div class="col-md-4"></div> -->
                    <div class="col-md-4">
                        <div class="login-content">
                            <div class="login-form"  style="background-color: #fff; border-radius: .3rem;">
                                <center style="margin-top: -3.6rem;"><img src="./assets/uploadImage/logo.jpeg" style="width: 145px;"></center><br>

                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="row">
                                    <div class="form-group col-md-12">
                                        <label lass="col-sm-3 control-label">Enter username</label>
                                        <input type="text" name="username"  class="form-control" placeholder="Enter username" title="Invalid username " required="" style="border-radius: .3rem;">
     
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Enter new password</label>
                                        <input type="password"  name="new" class="form-control" placeholder="Enter new password" required=""  style="border-radius: .3rem;">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Enter confirm password</label>
                                        <input type="password"  name="confirm" class="form-control" placeholder="Enter confirm password" required=""  style="border-radius: .3rem;">
                                    </div>

                                   <div class="form-group col-md-12"> 
                                       <button style="background-color: #102b49; border-radius: .8rem; padding: .6rem;" type="submit" name="login" class=" f-w-600 text-white btn  btn-flat m-b-30 m-t-30">Change password</button>
                                   </div>
                                   <div class="col-md-6 form-check"> </div>
                                    <div class="forgot-phone col-md-6 text-right">
                                            <a href="./" class="text-right text-gray"  style="font-family: initial;">Back to sigin</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><center>
 
            
            </footer> </center>
    </div>
    
    
     
    
    <script src="./assets/js/lib/jquery/jquery.min.js"></script>
    
    <script src="./assets/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="./assets/js/lib/bootstrap/js/bootstrap.min.js"></script>
    
    <script src="./assets/js/jquery.slimscroll.js"></script>
    
    <script src="./assets/js/sidebarmenu.js"></script>
    
    <script src="./assets/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    
    <script src="./assets/js/custom.min.js"></script>
</body>

</html>
