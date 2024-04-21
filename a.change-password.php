<?php 
   include('./constant/layout/head.php');
   include('./constant/layout/header.php');
   include('./constant/layout/sidebar.php');
?>
        <div class="page-wrapper">
            
            <div class="row page-titles card-extra">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Change password</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="a-index.php">Home</a></li>
                        <li class="breadcrumb-item active">Change password</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-5" style="    margin-left: 10%;">
                        <div class="card card-extra">
                            <div class="card-title">
                              
                            </div>
                            <div id="add-brand-messages"></div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST"  action="app/login-handler.php">

                                    <div class="form-group col-md-12">
                                        <label lass="col-sm-3 control-label">Enter old password</label>
                                        <input type="password" name="old"  class="form-control" placeholder="Enter old password" title="Invalid old password " required="" style="border-radius: .3rem;">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Enter new password</label>
                                        <input type="password"  name="new" class="form-control" placeholder="Enter new password" required=""  style="border-radius: .3rem;">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Enter confirm password</label>
                                        <input type="password"  name="confirm" class="form-control" placeholder="Enter confirm password" required=""  style="border-radius: .3rem;">
                                    </div>
                                    <div class="col-md-12"> 
                                       <input type="submit" name="ownerPassword" value="Change password" style="background-color: #102b49; border-radius: .8rem; padding: .6rem;" class="text-white btn  btn-flat m-b-25 m-t-5 form-control">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
<?php  include('./constant/layout/footer.php');?>



