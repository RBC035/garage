<?php 
   include('./constant/layout/head.php');
   include('./constant/layout/c-header.php');
   include('./constant/layout/c-sidebar.php');

?>  
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
        <div class="page-wrapper">
            
            <div class="row page-titles card-extra">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add car problem</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="c-index.php">Home</a></li>
                        <li class="breadcrumb-item active">Add car problem</li>
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
                                          <label lass="col-sm-3 control-label">Enter problem name</label>
                                          <input type="text" name="name"  class="form-control" placeholder="Enter your problem name" title="Invalid username " required="" style="border-radius: .3rem;">
                                      </div>
                                      <div class="form-group col-md-12">
                                          <label>Select type of car</label>
                                          <select name="typeOfCar" class="form-control" style="border-radius: .3rem;">
                                            <option value="NULL">Select type of car</option>
                                            <option value="Automatic">Automatic</option>
                                            <option value="Manual">Manual</option>
                                          </select>
                                      </div>
                                      <div class="form-group col-md-12">
                                          <label>Enter problem  type</label>
                                          <input type="text"  name="typeOfProblem" class="form-control" placeholder="Enter problem type" required=""  style="border-radius: .3rem;">
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
                                        <label>Enter street</label>
                                        <input type="text"  name="street" class="form-control" placeholder="Enter street" required=""  style="border-radius: .3rem;">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Enter problem description</label>
                                        <textarea placeholder="Enter problem descriptions" class="form-control" style="height: 8rem; border-radius: .3rem;" required="" name="description"></textarea>
                                    </div>
                                    <div class="col-md-12"> 
                                       <input type="submit" name="addProblem" value="Add car problem" style="background-color: #102b49; border-radius: .8rem; padding: .6rem;" class="text-white btn  btn-flat m-b-25 m-t-5 form-control">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
<?php  include('./constant/layout/footer.php');?>



