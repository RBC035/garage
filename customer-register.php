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
 background-color: #ffffff;background-size:cover;">
                <div class="row ">
                  <!-- <div class="col-md-4"></div> -->
                    <div class="col-md-4">
                        <div class="login-content">
                            <div class="login-form"  style="background-color: #fff; border-radius: .3rem;">
                                <center style="margin-top: -3.6rem;"><img src="./assets/uploadImage/logo.jpeg" style="width: 145px;"></center><br>
                                <?php
                                  if (isset($_GET['userID'])) {
                                ?>
                                    <div style="margin-bottom: .4rem; ">
                                        <div style="margin-bottom: .5rem">
                                          <center><span style="color: green;">You are successfully registered.</span></center><br>
                                          <span class="col-sm-3 control-label" style="font-weight: 500;"> Please use information bellow</span>
                                        </div>
                                        <div>
                                          <span class="col-sm-3 control-label">Username: <?php echo $_GET['userID']; ?> </span> <br>
                                          <span class="col-sm-3 control-label">Password: <?php echo $_GET['userID']; ?> </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="forgot-phone col-md-6 text-right"></div>
                                        <div class="forgot-phone col-md-6 text-right">
                                             <a href="./" class="text-right text-gray"  style="font-family: initial; ;">Click to sigin</a>
                                        </div>
                                    </div>
                                <?php
                                  } else {
                                ?>
                                <form action="app/login-handler.php" method="post" class="row">
                                    <div class="form-group col-md-12">
                                        <label lass="col-sm-3 control-label">Enter first name</label>
                                        <input type="text" name="first"  class="form-control" placeholder="Enter your first name" title="Invalid username " required="" style="border-radius: .3rem;">
     
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Enter last name</label>
                                        <input type="text"  name="last" class="form-control" placeholder="Enter your last name" required=""  style="border-radius: .3rem;">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Enter phone  number</label>
                                        <input type="tel"  name="phone" class="form-control" placeholder="Enter phone number" required=""  style="border-radius: .3rem;">
                                    </div>
                                                                     
                                   <div class="col-md-12"> 
                                      <input type="submit" name="register" value="Register" style="background-color: #102b49; border-radius: .8rem; padding: .6rem;" class=" f-w-600 text-white btn  btn-flat m-b-25 m-t-25">
                                   </div>
                                   <div class="col-md-6 form-check"> </div>
                                    <div class="forgot-phone col-md-6 text-right">
                                            <a href="./" class="text-right text-gray"  style="font-family: initial;">Back to sigin</a>
                                    </div>
                                </form>
                              <?php } ?>
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
