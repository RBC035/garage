<?php 
    include('./constant/layout/head.php');
   include('./constant/layout/o-header.php');
   include('./constant/layout/o-sidebar.php');
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
                        <li class="breadcrumb-item"><a href="o-index.php">Home</a></li>
                        <li class="breadcrumb-item active">View garage details</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">

                 <div class="card card-extra">
                            <div class="card-body">
                              
                            <a href="o.add-garage.php"><button class="btn btn-primary">Register garage</button></a>
                         
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                              <th class="text-center">S/N</th>
                                                <th>Garage name</th>
                                                <th>Region</th>
                                                <th>District</th>
                                                <th>Shehia</th>
                                                <th>Street</th>
                                                <th>Office number</th>
                                                <th width="4%">Edit</th>
                                            </tr>
                                       </thead>
                                       <tbody>
                                        <?php
                                            $no = 1;
                                            $customer = $con->prepare("select * from garage where ownerID = ? && status = ? ");
                                            $customer->execute([$_SESSION['user'], "Enable"]);
                                            while ($row = $customer->fetch(PDO::FETCH_OBJ)) 
                                             { 
                                        ?>
                                        <tr>
                                            <td class="text-center table-td"><?php echo $no; ?></td>
                                            <td class="table-td"><?php echo ucwords($row->garageName); ?></td>
                                            <td class="table-td"><?php echo ucwords($row->region); ?></td>
                                             <td class="table-td"><?php echo ucwords($row->district); ?></td>
                                              <td class="table-td"><?php echo ucwords($row->shehia); ?></td>
                                               <td class="table-td"><?php echo $row->street; ?></td>
                                            <td class="table-td"><?php echo $row->officeNumber; ?></td>
                                            <td>
                                                <a href="o.add-garage.php?id=<?php echo $row->garageID;?>" title ="Edit garage details" style="margin-right: .4rem"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>      
                                            </td>
                                           
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



