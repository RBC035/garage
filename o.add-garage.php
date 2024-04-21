<?php 
    include('./constant/layout/head.php');
   include('./constant/layout/o-header.php');
   include('./constant/layout/o-sidebar.php');
    require_once 'constant/connect.php';

    if (isset($_GET['id'])) {
        $garage = $con->prepare("select * from garage  where  garageID = :id ");
        $garage->execute(array('id' => $_GET['id']));
        $row = $garage->fetch();
?>

<!-- start ajax script code -->

<script type="text/javascript">
  $(document).ready(function(){
    $('#region').on('change',function(){
           var rID = $(this).val();
           if(rID){
                $.ajax({
                    type:'POST',
                    url:'ajax-select.php',
                    data:'dName='+rID,
                    success:function(html)
                    {
                        $('#district').html(html);
                        $('#shehia').html('<option value="NULL">Select district first</option>');  
                    }
                }); 
            }
            else
            {
                $('#district').html('<option value="NULL">Select region first</option>');
                $('#shehia').html('<option value="NULL">Select district first</option>');
            }
        });

    $('#district').on('change',function() {
          var dName = $(this).val();
          if(dName)
          {
              $.ajax({
                  type:'POST',
                  url:'ajax-select.php',
                  data:'id='+dName,
                  success:function(html)
                  {
                      $('#shehia').html(html);
                  }
              }); 
          }else{
              $('#shehia').html('<option value="NULL">Select district first</option>');
          }
      });
  });
</script>

<!-- end ajax script code --> 
       <div class="page-wrapper">
           
           <div class="row page-titles card-extra">
               <div class="col-md-5 align-self-center">
                   <h3 class="text-primary">Change garage details</h3> </div>
               <div class="col-md-7 align-self-center">
                   <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="o-index.php">Home</a></li>
                       <li class="breadcrumb-item active"><a href="o.manage-garage.php"> View garages</a> </li>
                       <li class="breadcrumb-item active">Change garage </li>
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
                                        <label lass="col-sm-3 control-label">Enter garage name</label>
                                        <input type="text" name="garageName"  class="form-control" value="<?php echo $row['garageName']; ?>" title="Invalid username "  style="border-radius: .3rem;">
                                        <input type="hidden" name="id" value="<?php echo $row['garageID']; ?>">
                                    </div>
                                    <?php
                                      $regionSelect = $con->prepare("select * from region where status = ?  order by regionName ASC ");
                                      $status = "Enable";
                                        $regionSelect->execute([$status]);
                                    ?>
                                    <div class="form-group col-md-12">
                                       <label lass="col-sm-3 control-label">Select region</label>
                                       <select class="form-control"  name="region" id="region" style="border-radius: .3rem;">
                                         <option value="<?php echo $row['region']; ?>"><?php echo $row['region']; ?></option>
                                         <?php
                                          while ($regRow = $regionSelect->fetch(PDO::FETCH_OBJ)) {
                                        ?>
                                            <option value="<?php echo $regRow->regionName; ?>"><?php echo $regRow->regionName ?></option>
                                        <?php
                                          }
                                         ?>
                                     </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                       <label lass="col-sm-3 control-label">Select district</label>
                                       <select class="form-control"   name="district" id="district" style="border-radius: .3rem;">
                                         <option value="<?php echo $row['district']; ?>"><?php echo $row['district']; ?></option>
                                     </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                       <label lass="col-sm-3 control-label">Select shehia</label>
                                       <select class="form-control"  name="shehia" id="shehia" style="border-radius: .3rem;">
                                         <option value="<?php echo $row['shehia']; ?>"><?php echo $row['shehia']; ?></option>
                                     </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label lass="col-sm-3 control-label">Enter street name</label>
                                        <input type="text" name="street"  class="form-control" value="<?php echo $row['street']; ?>" title="Invalid street name "  style="border-radius: .3rem;">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Enter garage phone  number</label>
                                        <input type="tel"  name="phone" class="form-control" value="<?php echo $row['officeNumber']; ?>"  style="border-radius: .3rem;">
                                    </div>
                                    <div class="col-md-12"> 
                                       <input type="submit" name="changeGarage" value="Change" style="background-color: #102b49; border-radius: .8rem; padding: .6rem;" class="text-white btn  btn-flat m-b-25 m-t-5 form-control">
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

<!-- start ajax script code -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#region').on('change',function(){
	      	 var rID = $(this).val();
	      	 if(rID){
	              $.ajax({
	                  type:'POST',
	                  url:'ajax-select.php',
	                  data:'dName='+rID,
	                  success:function(html)
	                  {
	                      $('#district').html(html);
	                      $('#shehia').html('<option value="NULL">Select district first</option>');  
	                  }
	              }); 
	          }
	          else
	          {
	              $('#district').html('<option value="NULL">Select region first</option>');
	              $('#shehia').html('<option value="NULL">Select district first</option>');
	          }
	      });

		$('#district').on('change',function() {
          var dName = $(this).val();
          if(dName)
          {
              $.ajax({
                  type:'POST',
                  url:'ajax-select.php',
                  data:'id='+dName,
                  success:function(html)
                  {
                      $('#shehia').html(html);
                  }
              }); 
          }else{
              $('#shehia').html('<option value="NULL">Select district first</option>');
          }
      });
	});
</script>

<!-- end ajax script code -->  
 
        <div class="page-wrapper">
            
            <div class="row page-titles card-extra">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Register garage</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="o-index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="o.manage-garage.php"> View garage</a> </li>
                        <li class="breadcrumb-item active">Register garage</li>
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
                                        <label lass="col-sm-3 control-label">Enter garage name</label>
                                        <input type="text" name="garageName"  class="form-control" placeholder="Enter garage name" title="Invalid username " required="" style="border-radius: .3rem;">
                                    </div>
                                    <?php
                                    	$regionSelect = $con->prepare("select * from region where status = ?  order by regionName ASC ");
                                    	$status = "Enable";
                                        $regionSelect->execute([$status]);
                                    ?>
                                    <div class="form-group col-md-12">
                                    	 <label lass="col-sm-3 control-label">Select region</label>
                                    	 <select class="form-control"  name="region" id="region" style="border-radius: .3rem;">
                                    	 	 <option value="NULL">Select region</option>
		                                     <?php
		                                     	while ($regRow = $regionSelect->fetch(PDO::FETCH_OBJ)) {
		                                    ?>
		                                    		<option value="<?php echo $regRow->regionName; ?>"><?php echo $regRow->regionName ?></option>
		                                    <?php
		                                     	}
		                                     ?>
		                                 </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                    	 <label lass="col-sm-3 control-label">Select district</label>
                                    	 <select class="form-control"   name="district" id="district" style="border-radius: .3rem;">
                                    	 	 <option value="NULL">Select region first</option>
		                                 </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                    	 <label lass="col-sm-3 control-label">Select shehia</label>
                                    	 <select class="form-control"  name="shehia" id="shehia" style="border-radius: .3rem;">
                                    	 	 <option value="NULL">Select district first</option>
		                                 </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label lass="col-sm-3 control-label">Enter street name</label>
                                        <input type="text" name="street"  class="form-control" placeholder="Enter street name" title="Invalid street name " required="" style="border-radius: .3rem;">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Enter garage phone  number</label>
                                        <input type="tel"  name="phone" class="form-control" placeholder="Enter garage phone number" required=""  style="border-radius: .3rem;">
                                    </div>
                                    <div class="col-md-12"> 
                                       <input type="submit" name="registerGarage" value="Register" style="background-color: #102b49; border-radius: .8rem; padding: .6rem;" class="text-white btn  btn-flat m-b-25 m-t-5 form-control">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
<?php  } include('./constant/layout/footer.php');?>



