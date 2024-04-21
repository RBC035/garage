<?php 
   include('./constant/layout/head.php');
   include('./constant/layout/c-header.php');
   include('./constant/layout/c-sidebar.php');
    require_once 'constant/connect.php';

      

?>
       <div class="page-wrapper">
           
           <div class="row page-titles card-extra">
               <div class="col-md-5 align-self-center">
                   <h3 class="text-primary">Find near garage </h3> </div>
               <div class="col-md-7 align-self-center">
                   <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="c-index.php">Home</a></li>
                       <li class="breadcrumb-item active"><a href="c.pending-problem.php">View pending problem</a>  </li>
                       <li class="breadcrumb-item active">Find near garage </li>
                   </ol>
               </div>
           </div>
           <div class="container-fluid">
            <?php
              if (isset($_GET['edit']) && $_GET['edit'] === $_GET['edit']) {
            ?>

               <div class="row">
                <div class="col-lg-2"></div>
                   <div class="col-lg-5" style="margin-left: 10%;">
                       <div class="card card-extra">
                           <div class="card-title">
                             
                           </div>
                           <div id="add-brand-messages"></div>
                           <div class="card-body">
                               <div class="input-states">
                                <div class="form-group col-md-12">
                                    <span style="font-family: initial; font-size: 16px">Please contact to the garage bellow to get a help</span>
                                </div>
                                <?php
                                    $checked = $con->prepare("select * from checkedproblem  where  problemID = :id ");
                                    $checked->execute(array('id' => $_GET['edit']));
                                    $checkedRow = $checked->fetch();

                                    $region = $con->prepare("select * from garage  where  status = :st && garageID != :gid ");
                                    $region->execute(array( 'st' => "Enable", 'gid' => $checkedRow['garageID']));
                                    $rdrow = $region->fetch();

                                    $owner = $con->prepare("select * from owner  where  ownerID = :id  ");
                                    $owner->execute(array('id' => $rdrow['ownerID']));
                                    $owneRow = $owner->fetch();
                                ?>

                                <div class="form-group col-md-12">
                                  <span style="font-family: initial;">There is a garage near to <b class="text-info"><?php echo $rdrow['street']; ?></b> street, on   <b class="text-info"><?php echo $rdrow['shehia']; ?></b> shehia  , on  <b class="text-info"><?php echo $rdrow['district']; ?></b> district , on <b class="text-info"><?php echo $rdrow['region']; ?></b> region, please use phone numbers bellow to call garage for help </span>
                                </div>
                                <div class="form-group col-md-12">
                                    <span style="font-family: initial;">Office phone number: <b class="text-info"><?php echo $rdrow['officeNumber']; ?></b></span><br>
                                    <span style="font-family: initial;">Garage owner name: <b class="text-info"><?php echo ucwords($owneRow['firstName']." ".$owneRow['lastName']); ?></b></span><br>
                                    <span style="font-family: initial;">Garage owner phone number: <b class="text-info"><?php echo $owneRow['phoneNumber']; ?></b></span>
                                </div>

                                <div class="col-md-12"> 
                                 <div class="row">
                                   <div style="margin:1rem">
                                     <span >Please click bellow to verify if you get a help or no</span>
                                   </div>
                                   <div class="col-md-9">
                                     <form method="post" action="app/login-handler.php">
                                       <input type="hidden" name="problemID" value="<?php echo $_GET['edit']; ?>">
                                       <input type="hidden" name="garageID" value="<?php echo $rdrow['garageID']; ?>">
                                       <button type="submit" name="solvedProblem" class="btn btn-xs btn-success" ><i class="fa fa-get-pocket"></i></button>
                                     </form>
                                   </div>
                                   <div class="col-md-3">
                                     <form method="post" action="app/login-handler.php">
                                       <input type="hidden" name="problemID" value="<?php echo $_GET['edit']; ?>">
                                       <input type="hidden" name="garageID" value="<?php echo $rdrow['garageID']; ?>">
                                       <button type="submit" name="pendingProblem" class="btn btn-xs btn-danger" ><i class="fa fa-remove"></i></button>
                                     </form>
                                   </div>
                                 </div>
                                  
                                </div>

                               </div>
                           </div>
                       </div>
                   </div>
                 
               </div> 

            <?php
              } else {
                  $problem = $con->prepare("select * from carproblem  where  problemID = :id ");
                  $problem->execute(array('id' => $_GET['id']));
                  $row = $problem->fetch();
            ?>
               <div class="row">
                <div class="col-lg-2"></div>
                   <div class="col-lg-5" style="margin-left: 10%;">
                       <div class="card card-extra">
                           <div class="card-title">
                             
                           </div>
                           <div id="add-brand-messages"></div>
                           <div class="card-body">
                               <div class="input-states">
                                <div class="form-group col-md-12">
                                    <span style="font-family: initial; font-size: 16px">Please contact to the garage bellow to get a help</span>
                                </div>
                                <?php
                                  $street = $con->prepare("select * from garage  where  street = :id && shehia = :sh && district = :ds && region = :rd ");
                                  $street->execute(array('id' => $row['street'], 'sh' => $row['shehia'], 'ds' => $row['district'], 'rd' => $row['region']));
                                  if ($street->rowCount() > 0) {
                                      $strow = $street->fetch();

                                      $owner = $con->prepare("select * from owner  where  ownerID = :id  ");
                                      $owner->execute(array('id' => $strow['ownerID']));
                                      $owneRow = $owner->fetch();
                                  ?>
                                      <div class="form-group col-md-12">
                                          <span style="font-family: initial;">There is a garage near to <b class="text-info"><?php echo $row['street']; ?></b> street, please use phone numbers bellow to call garage for help </span>
                                      </div>
                                      <div class="form-group col-md-12">
                                          <span style="font-family: initial;">Office phone number: <b class="text-info"><?php echo $strow['officeNumber']; ?></b></span><br>
                                          <span style="font-family: initial;">Garage owner name: <b class="text-info"><?php echo ucwords($owneRow['firstName']." ".$owneRow['lastName']); ?></b></span><br>
                                          <span style="font-family: initial;">Garage owner phone number: <b class="text-info"><?php echo $owneRow['phoneNumber']; ?></b></span>
                                      </div>

                                      <div class="col-md-12"> 
                                       <div class="row">
                                         <div style="margin:1rem">
                                           <span >Please click bellow to verify if you get a help or no</span>
                                         </div>
                                         <div class="col-md-9">
                                           <form method="post" action="app/login-handler.php">
                                             <input type="hidden" name="problemID" value="<?php echo $_GET['id']; ?>">
                                             <input type="hidden" name="garageID" value="<?php echo $strow['garageID']; ?>">
                                             <button type="submit" name="solvedProblem" class="btn btn-xs btn-success" ><i class="fa fa-get-pocket"></i></button>
                                           </form>
                                         </div>
                                         <div class="col-md-3">
                                           <form method="post" action="app/login-handler.php">
                                             <input type="hidden" name="problemID" value="<?php echo $_GET['id']; ?>">
                                             <input type="hidden" name="garageID" value="<?php echo $strow['garageID']; ?>">
                                             <button type="submit" name="pendingProblem" class="btn btn-xs btn-danger" ><i class="fa fa-remove"></i></button>
                                           </form>
                                         </div>
                                       </div>
                                        
                                      </div>
                                  <?php

                                  } else {

                                      $shehia = $con->prepare("select * from garage  where shehia = :sh && district = :ds && region = :rd ");
                                      $shehia->execute(array('sh' => $row['shehia'], 'ds' => $row['district'], 'rd' => $row['region']));
                                      if ($shehia->rowCount() > 0) {
                                        $shrow = $shehia->fetch();
                                        $owner = $con->prepare("select * from owner  where  ownerID = :id  ");
                                        $owner->execute(array('id' => $shrow['ownerID']));
                                        $owneRow = $owner->fetch();
                                    ?>
                                        <div class="form-group col-md-12">
                                          <span style="font-family: initial;">There is a garage near to <b class="text-info"><?php echo $shrow['street']; ?></b> street, on shehia of <b class="text-info"><?php echo $shrow['shehia']; ?></b> ,  please use phone numbers bellow to call garage for help </span>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <span style="font-family: initial;">Office phone number: <b class="text-info"><?php echo $shrow['officeNumber']; ?></b></span><br>
                                            <span style="font-family: initial;">Garage owner name: <b class="text-info"><?php echo ucwords($owneRow['firstName']." ".$owneRow['lastName']); ?></b></span><br>
                                            <span style="font-family: initial;">Garage owner phone number: <b class="text-info"><?php echo $owneRow['phoneNumber']; ?></b></span>
                                        </div>

                                        <div class="col-md-12"> 
                                         <div class="row">
                                           <div style="margin:1rem">
                                             <span >Please click bellow to verify if you get a help or no</span>
                                           </div>
                                           <div class="col-md-9">
                                             <form method="post" action="app/login-handler.php">
                                               <input type="hidden" name="problemID" value="<?php echo $_GET['id']; ?>">
                                               <input type="hidden" name="garageID" value="<?php echo $shrow['garageID']; ?>">
                                               <button type="submit" name="solvedProblem" class="btn btn-xs btn-success" ><i class="fa fa-get-pocket"></i></button>
                                             </form>
                                           </div>
                                           <div class="col-md-3">
                                             <form method="post" action="app/login-handler.php">
                                               <input type="hidden" name="problemID" value="<?php echo $_GET['id']; ?>">
                                               <input type="hidden" name="garageID" value="<?php echo $shrow['garageID']; ?>">
                                               <button type="submit" name="pendingProblem" class="btn btn-xs btn-danger" ><i class="fa fa-remove"></i></button>
                                             </form>
                                           </div>
                                         </div>
                                          
                                        </div>
                                    <?php
                                      } else {
                                        
                                           $district = $con->prepare("select * from garage  where  district = :ds && region = :rd ");
                                            $district->execute(array( 'ds' => $row['district'], 'rd' => $row['region']));
                                            if ($district->rowCount() > 0) {
                                               $dsrow = $district->fetch();
                                                $owner = $con->prepare("select * from owner  where  ownerID = :id  ");
                                                $owner->execute(array('id' => $dsrow['ownerID']));
                                                $owneRow = $owner->fetch();
                                          ?>
                                            
                                            <div class="form-group col-md-12">
                                              <span style="font-family: initial;">There is a garage near to <b class="text-info"><?php echo $dsrow['street']; ?></b> street, on   <b class="text-info"><?php echo $dsrow['shehia']; ?></b> shehia  , on  <b class="text-info"><?php echo $dsrow['district']; ?></b> district ,please use phone numbers bellow to call garage for help </span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <span style="font-family: initial;">Office phone number: <b class="text-info"><?php echo $dsrow['officeNumber']; ?></b></span><br>
                                                <span style="font-family: initial;">Garage owner name: <b class="text-info"><?php echo ucwords($owneRow['firstName']." ".$owneRow['lastName']); ?></b></span><br>
                                                <span style="font-family: initial;">Garage owner phone number: <b class="text-info"><?php echo $owneRow['phoneNumber']; ?></b></span>
                                            </div>

                                            <div class="col-md-12"> 
                                             <div class="row">
                                               <div style="margin:1rem">
                                                 <span >Please click bellow to verify if you get a help or no</span>
                                               </div>
                                               <div class="col-md-9">
                                                 <form method="post" action="app/login-handler.php">
                                                   <input type="hidden" name="problemID" value="<?php echo $_GET['id']; ?>">
                                                   <input type="hidden" name="garageID" value="<?php echo $dsrow['garageID']; ?>">
                                                   <button type="submit" name="solvedProblem" class="btn btn-xs btn-success" ><i class="fa fa-get-pocket"></i></button>
                                                 </form>
                                               </div>
                                               <div class="col-md-3">
                                                 <form method="post" action="app/login-handler.php">
                                                   <input type="hidden" name="problemID" value="<?php echo $_GET['id']; ?>">
                                                   <input type="hidden" name="garageID" value="<?php echo $dsrow['garageID']; ?>">
                                                   <button type="submit" name="pendingProblem" class="btn btn-xs btn-danger" ><i class="fa fa-remove"></i></button>
                                                 </form>
                                               </div>
                                             </div>
                                              
                                            </div>

                                          <?php
                                            } else {
                                              
                                               $region = $con->prepare("select * from garage  where  status = :rd order by region desc ");
                                                $region->execute(array( 'rd' => "Enable"));
                                                $rdrow = $region->fetch();

                                                $owner = $con->prepare("select * from owner  where  ownerID = :id  ");
                                                $owner->execute(array('id' => $rdrow['ownerID']));
                                                $owneRow = $owner->fetch();
                                          ?>
                                              <div class="form-group col-md-12">
                                                <span style="font-family: initial;">There is a garage near to <b class="text-info"><?php echo $rdrow['street']; ?></b> street, on   <b class="text-info"><?php echo $rdrow['shehia']; ?></b> shehia  , on  <b class="text-info"><?php echo $rdrow['district']; ?></b> district , on <b class="text-info"><?php echo $rdrow['region']; ?></b> region, please use phone numbers bellow to call garage for help </span>
                                              </div>
                                              <div class="form-group col-md-12">
                                                  <span style="font-family: initial;">Office phone number: <b class="text-info"><?php echo $rdrow['officeNumber']; ?></b></span><br>
                                                  <span style="font-family: initial;">Garage owner name: <b class="text-info"><?php echo ucwords($owneRow['firstName']." ".$owneRow['lastName']); ?></b></span><br>
                                                  <span style="font-family: initial;">Garage owner phone number: <b class="text-info"><?php echo $owneRow['phoneNumber']; ?></b></span>
                                              </div>

                                              <div class="col-md-12"> 
                                               <div class="row">
                                                 <div style="margin:1rem">
                                                   <span >Please click bellow to verify if you get a help or no</span>
                                                 </div>
                                                 <div class="col-md-9">
                                                   <form method="post" action="app/login-handler.php">
                                                     <input type="hidden" name="problemID" value="<?php echo $_GET['id']; ?>">
                                                     <input type="hidden" name="garageID" value="<?php echo $rdrow['garageID']; ?>">
                                                     <button type="submit" name="solvedProblem" class="btn btn-xs btn-success" ><i class="fa fa-get-pocket"></i></button>
                                                   </form>
                                                 </div>
                                                 <div class="col-md-3">
                                                   <form method="post" action="app/login-handler.php">
                                                     <input type="hidden" name="problemID" value="<?php echo $_GET['id']; ?>">
                                                     <input type="hidden" name="garageID" value="<?php echo $rdrow['garageID']; ?>">
                                                     <button type="submit" name="pendingProblem" class="btn btn-xs btn-danger" ><i class="fa fa-remove"></i></button>
                                                   </form>
                                                 </div>
                                               </div>
                                                
                                              </div>
                                          <?php

                                            }
                                      }
                                  }
                                ?>

                               </div>
                           </div>
                       </div>
                   </div>
                 
               </div> 
                
<?php } include('./constant/layout/footer.php');?>



