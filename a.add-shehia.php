<?php 
    include('./constant/layout/head.php');
    include('./constant/layout/header.php');
    include('./constant/layout/sidebar.php');
    require_once 'constant/connect.php';

    if (isset($_GET['id'])) {
        
?>
       <div class="page-wrapper">
           
           <div class="row page-titles card-extra">
               <div class="col-md-5 align-self-center">
                   <h3 class="text-primary">Add shehia</h3> </div>
               <div class="col-md-7 align-self-center">
                   <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="a-index.php">Home</a></li>
                       <li class="breadcrumb-item active"><a href="a.manage-district.php"> View district </a> </li>
                       <li class="breadcrumb-item active">Add shehia </li>
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
                                       <label lass="col-sm-3 control-label">Enter shehia name</label>
                                       <input type="text" name="name" required=""  class="form-control" placeholder="Enter shehia name" style="border-radius: .3rem;">
                                       <input type="hidden" name="id"  value="<?php echo $_GET['id']; ?>" >
                                   </div>
                                   
                                   <div class="col-md-12"> 
                                      <input type="submit" name="addShehia" value="Register" style="background-color: #102b49; border-radius: .8rem; padding: .6rem;" class="text-white btn  btn-flat m-b-25 m-t-5 form-control">
                                   </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
                 
               </div> 
<?php
    } else {
      $shehia = $con->prepare("select * from shehia  where  shehiaID = :id ");
      $shehia->execute(array('id' => $_GET['edit']));
      $row = $shehia->fetch();
?>   
 
        <div class="page-wrapper">
            
            <div class="row page-titles card-extra">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Change shehia</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="a-index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="a.manage-district.php">View district</a> </li>
                        <li class="breadcrumb-item active">Change shehia</li>
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
                                       <label lass="col-sm-3 control-label">Enter shehia name</label>
                                       <input type="text" name="name"  class="form-control" value="<?php echo $row['shehiaName']; ?>" style="border-radius: .3rem;">
                                       <input type="hidden" name="id"   value="<?php echo $_GET['edit']; ?>" >
                                   </div>
                                   
                                   <div class="col-md-12"> 
                                      <input type="submit" name="changeShehia" value="Change" style="background-color: #102b49; border-radius: .8rem; padding: .6rem;" class="text-white btn  btn-flat m-b-25 m-t-5 form-control">
                                   </div>
                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
<?php  } include('./constant/layout/footer.php');?>



