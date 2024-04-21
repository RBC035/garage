<?php 
    include('./constant/layout/head.php');
    include('./constant/layout/header.php');
    include('./constant/layout/sidebar.php');
    require_once 'constant/connect.php';

    if (isset($_GET['id'])) {
        $customer = $con->prepare("select * from owner  where  ownerID = :id ");
        $customer->execute(array('id' => $_GET['id']));
        $row = $customer->fetch();
?>
       <div class="page-wrapper">
           
           <div class="row page-titles card-extra">
               <div class="col-md-5 align-self-center">
                   <h3 class="text-primary">Change owner details</h3> </div>
               <div class="col-md-7 align-self-center">
                   <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="a-index.php">Home</a></li>
                       <li class="breadcrumb-item active"><a href="a.manage-owner.php"> View garage owners</a> </li>
                       <li class="breadcrumb-item active">Change owner </li>
                   </ol>
               </div>
           </div>
           <div class="container-fluid">
               <div class="row">
                <div class="col-lg-2"></div>
                   <div class="col-lg-5" style="margin-left: 10%;">
                       <div class="card card-extra">
                           <div class="card-title">
                             
                           </div>
                           <div id="add-brand-messages"></div>
                           <div class="card-body">
                               <div class="input-states">
                                   <form class="form-horizontal" method="POST"  action="app/login-handler.php">

                                   <div class="form-group col-md-12">
                                       <label lass="col-sm-3 control-label">Enter first name</label>
                                       <input type="text" name="first"  class="form-control" value="<?php echo $row['firstName']; ?>" style="border-radius: .3rem;">
                                       <input type="hidden" name="id"   value="<?php echo $row['ownerID']; ?>" >
                                   </div>
                                   <div class="form-group col-md-12">
                                       <label>Enter last name</label>
                                       <input type="text"  name="last" class="form-control" value="<?php echo $row['lastName']; ?>"  style="border-radius: .3rem;">
                                   </div>
                                   <div class="form-group col-md-12">
                                       <label>Enter phone  number</label>
                                       <input type="tel"  name="phone" class="form-control" value="<?php echo $row['phoneNumber']; ?>" style="border-radius: .3rem;">
                                   </div>
                                   <div class="col-md-12"> 
                                      <input type="submit" name="changeOwner" value="Change" style="background-color: #102b49; border-radius: .8rem; padding: .6rem;" class="text-white btn  btn-flat m-b-25 m-t-5 form-control">
                                   </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
                 
               </div> 
<?php
    } else {
?>   
 
        <div class="page-wrapper">
            
            <div class="row page-titles card-extra">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Register garage owner</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="a-index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="a.manage-owner.php"> View garage owners</a> </li>
                        <li class="breadcrumb-item active">Register garage owner</li>
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
                                       <input type="submit" name="registerOwner" value="Register" style="background-color: #102b49; border-radius: .8rem; padding: .6rem;" class="text-white btn  btn-flat m-b-25 m-t-5 form-control">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
<?php  } include('./constant/layout/footer.php');?>



