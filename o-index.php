 <?php 
 	include('./constant/layout/head.php');
 	include('./constant/layout/o-header.php');
 	include('./constant/layout/o-sidebar.php');
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
                 <div class="col-md-4 dashboard">
                        <div class="card" style="background: #A02CFA; border-radius: .6rem; ">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-widget"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                  <?php
                                    $customer = $con->prepare("select * from garage where ownerID = ? && status = ?");
                                    $customer->execute([$_SESSION['user'], "Enable"]);
                                  ?>
                                 	<h2 class="color-white"><?php echo $customer->rowCount(); ?></h2>
                                    <a href="o.manage-garage.php"><p class="m-b-0"  style="font-weight: 700;">Garages</p></a>
                                </div>
                            </div>
                        </div>
                    </div> 

                     <div class="col-md-4 dashboard">
                         <div class="card" style="background:#F94687; border-radius: .6rem; ">

                             <div class="media widget-ten">
                                 <div class="media-left meida media-middle">
                                     <span><i class="fa fa-group"></i></span>
                                 </div>
                                 <div class="media-body media-text-right">
                                    <?php
                                       $garage = $con->prepare("select * from garage where ownerID = ? && status = ?");
                                      $garage->execute([$_SESSION['user'], "Enable"]);
                                      $row = $garage->fetch();
                                    ?>
                                     <h2 class="color-white"><?php echo $garage->rowCount(); ?></h2>
                                      <a href="o.manage-service.php"><p class="m-b-0"  style="font-weight: 700;">Garage services</p></a>
                                 </div>
                             </div>
                         </div>
                     </div>

                    <div class="col-md-4 dashboard">
                       <div class="card" style="    background-color:#2BC155; border-radius: .6rem; ">
                           <div class="media widget-ten">
                               <div class="media-left meida media-middle">
                                   <span><i class="fa fa-cogs"></i></span>
                               </div>
                               <div class="media-body media-text-right"> 
                           		<h2 class="color-white"><?php echo 1; ?></h2>
                                   <a href="o.account.php"><p class="m-b-0"  style="font-weight: 700;">Settings</p></a>
                               </div>
                           </div>
                       </div>
                   </div>           
             </div>
         </div>
     </div>

             
             <?php include ('./constant/layout/footer.php');?>
 