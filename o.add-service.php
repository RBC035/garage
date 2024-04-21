<?php 
   include('./constant/layout/head.php');
   include('./constant/layout/o-header.php');
   include('./constant/layout/o-sidebar.php');
   require_once 'constant/connect.php';

   if (isset($_GET['edit'])) {
    $service = $con->prepare("select * from service  where  serviceID = :id ");
    $service->execute(array('id' => $_GET['edit']));
    $row = $service->fetch();
?>
    <div class="page-wrapper">
        
        <div class="row page-titles card-extra">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Channge garage service</h3> </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="o-index.php">Home</a></li>
                     <li class="breadcrumb-item active"><a href="o.manage-service.php">View service </a></li>
                    <li class="breadcrumb-item active">Channge garage service </li>
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
                                    <label lass="col-sm-3 control-label">Enter service name</label>
                                    <input type="text" name="serviceName"  class="form-control" value="<?php echo $row['serviceName']; ?>" style="border-radius: .3rem;">
                                    <input type="hidden" name="id"   value="<?php echo $_GET['edit']; ?>" >
                                </div>
                                <div class="form-group col-md-12">
                                     <label lass="col-sm-3 control-label">Select service type</label>
                                  <input type="text" name="serviceType"   class="form-control"value="<?php echo $row['serviceType']; ?>" style="border-radius: .3rem;">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Enter service descriptions</label>
                                    <textarea  class="form-control" style="height: 8rem; border-radius: .3rem;"  name="description"><?php echo $row['serviceName']; ?></textarea>
                                </div>
                                <div class="col-md-12"> 
                                   <input type="submit" name="changeService" value="Change" style="background-color: #102b49; border-radius: .8rem; padding: .6rem;" class="text-white btn  btn-flat m-b-25 m-t-5 form-control">
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
                   <h3 class="text-primary">Register garage service</h3> </div>
               <div class="col-md-7 align-self-center">
                   <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="o-index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="o.manage-service.php">View service </a></li>
                       <li class="breadcrumb-item active">Register garage service </li>
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
                                       <label lass="col-sm-3 control-label">Enter service name</label>
                                       <input type="text" name="serviceName"  class="form-control" placeholder="Enter service name" required="" style="border-radius: .3rem;">
                                       <input type="hidden" name="id"   value="<?php echo $_GET['id']; ?>" >
                                   </div>
                                   <div class="form-group col-md-12">
                                        <label lass="col-sm-3 control-label">Select service type</label>
                                    	<input type="text" name="serviceType" required=""  class="form-control" placeholder="Enter service type" style="border-radius: .3rem;">
                                   </div>
                                   <div class="form-group col-md-12">
                                       <label>Enter service descriptions</label>
                                       <textarea placeholder="Enter garage descriptions" class="form-control" style="height: 8rem; border-radius: .3rem;" required="" name="description"></textarea>
                                   </div>
                                   <div class="col-md-12"> 
                                      <input type="submit" name="addService" value="Register" style="background-color: #102b49; border-radius: .8rem; padding: .6rem;" class="text-white btn  btn-flat m-b-25 m-t-5 form-control">
                                   </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
                 
               </div> 

                
<?php  } include('./constant/layout/footer.php');?>



