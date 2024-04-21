 <?php 
 	include('./constant/layout/head.php');
 	include('./constant/layout/header.php');
 	include('./constant/layout/sidebar.php');
 ?> 


<style type="text/css">
    .ui-datepicker-calendar {
        display: none;
    }
</style>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  

         <div class="page-wrapper">
		 <div class="container-fluid ">
            <div class="row">
                 <div class="col-md-3 dashboard">
                        <div class="card" style="background: #2BC155; border-radius: .6rem; ">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-group"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                  <?php
                                    $customer = $con->prepare("select * from customer ");
                                    $customer->execute();
                                  ?>
                                 	<h2 class="color-white"><?php echo $customer->rowCount(); ?></h2>
                                    <a href="a.manage-customer.php"><p class="m-b-0"  style="font-weight: 700;">Customers</p></a>
                                </div>
                            </div>
                        </div>
                    </div> 

                     <div class="col-md-3 dashboard">
                         <div class="card" style="background:#A02CFA; border-radius: .6rem; ">
                             <div class="media widget-ten">
                                 <div class="media-left meida media-middle">
                                     <span><i class="ti-widget"></i></span>
                                 </div>
                                 <div class="media-body media-text-right">
                                    <?php
                                      $garage = $con->prepare("select * from garage ");
                                      $garage->execute();
                                    ?>
                                     <h2 class="color-white"><?php echo $garage->rowCount(); ?></h2>
                                      <a href="a.manage-garage.php"><p class="m-b-0"  style="font-weight: 700;">Garage</p></a>
                                 </div>
                             </div>
                         </div>
                     </div>

                    <div class="col-md-3 dashboard">
                       <div class="card " style="    background-color: #F94687; border-radius: .6rem; ">
                           <div class="media widget-ten">
                               <div class="media-left meida media-middle">
                                   <span><i class="ti-vector"></i></span>
                               </div>
                               <div class="media-body media-text-right">
                                  <?php
                                    $owner = $con->prepare("select * from owner ");
                                    $owner->execute();
                                  ?> 
                           <h2 class="color-white"><?php echo $owner->rowCount(); ?></h2>
                                   <a href="a.manage-owner.php"><p class="m-b-0" style="font-weight: 700;">Owners</p></a>
                               </div>
                           </div>
                       </div>
                   </div>

                    <div class="col-md-3 dashboard">
                       <div class="card" style="    background-color: #FFBC11; border-radius: .6rem; ">
                           <div class="media widget-ten">
                               <div class="media-left meida media-middle">
                                   <span><i class="ti-agenda"></i></span>
                               </div>
                               <div class="media-body media-text-right">
                                  <?php
                                    $carproblem = $con->prepare("select * from carproblem ");
                                    $carproblem->execute();
                                  ?>  
                           <h2 class="color-white"><?php echo $carproblem->rowCount(); ?></h2>
                                   <a href="a.manage-carproblem.php"><p class="m-b-0"  style="font-weight: 700;">Car problems</p></a>
                               </div>
                           </div>
                       </div>
                   </div>

                                       
                   




                 
             </div>
         </div>
     </div>

             
             <?php include ('./constant/layout/footer.php');?>
 