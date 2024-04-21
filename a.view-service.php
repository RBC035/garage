<?php 
    include('./constant/layout/head.php');
   include('./constant/layout/header.php');
   include('./constant/layout/sidebar.php');
    require_once 'constant/connect.php';
?>

<style>
    .table-td{
        color: #000;
    }
</style>

       <div class="page-wrapper">
            
            <div class="row page-titles card-extra">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> View garage details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="a-index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="a.manage-garage.php">View garage</a> </li>
                        <li class="breadcrumb-item active">View garage services</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">

                 <div class="card card-extra">
                            <div class="card-body">
                         
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                              <th class="text-center">S/N</th>
                                                <th>Service name</th>
                                                <th>Service type</th>
                                                <th>Decription</th>
                                                <!-- <th width="4%">Edit</th>
                                                <th width="4%">Delete</th> -->
                                            </tr>
                                       </thead>
                                       <tbody>
                                        <?php
                                            $no = 1;
                                            $service = $con->prepare("select * from service where garageID = ? && status = ? ");
                                            $service->execute([$_GET['id'], "Enable"]);
                                            while ($row = $service->fetch(PDO::FETCH_OBJ)) 
                                             { 
                                        ?>
                                        <tr>
                                            <td class="text-center table-td"><?php echo $no; ?></td>
                                            <td class="table-td"><?php echo $row->serviceName; ?></td>
                                            <td class="table-td"><?php echo $row->serviceType; ?></td>
                                             <td class="table-td"><?php echo $row->decription; ?></td>
                                            <!-- <td>
                                                <a href="o.add-service.php?edit=<?php echo $row->serviceID;?>" title ="Edit service details" style="margin-right: .4rem"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>      
                                            </td>
                                            <td>
                                                <a href="app/login-handler.php?serviceID=<?php echo $row->serviceID;?>" title ="Delete service details" style="margin-right: .4rem" onclick=" return confirm('Are you sure want to delete this service..?')" ><button type="button" class="btn btn-xs btn-danger" ><i class="fa fa-trash"></i></button></a>      
                                            </td> -->
                                           
                                        </tr>               
                                       <?php  
                                                $no +=1;  
                                            }
                                        ?>
                                    </tbody>
                               </table>
                                </div>
                            </div>
                        </div>

 
<?php include('./constant/layout/footer.php');?>



