<?php 
    include('./constant/layout/head.php');
    include('./constant/layout/c-header.php');
    include('./constant/layout/c-sidebar.php');
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
                    <h3 class="text-primary"> View pending problems</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="c-index.php">Home</a></li>
                        <li class="breadcrumb-item active">View pending problems</li>
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
                                                <th>Problem name</th>
                                                <th>Description</th>
                                                <th>Type of car</th>
                                                <th>Problem type</th>
                                                <th>Region</th>
                                                <th>District</th>
                                                <th>Shehia</th>
                                                <th>Street</th>
                                                <th>View</th>
                                            </tr>
                                       </thead>
                                       <tbody>
                                        <?php
                                            $no = 1;
                                            $customer = $con->prepare("select * from carproblem where customerID = ? && status = ? ");
                                            $customer->execute([$_SESSION['user'], "Pending"]);
                                            while ($row = $customer->fetch(PDO::FETCH_OBJ)) 
                                             {
                                        ?>
                                        <tr>
                                            <td class="text-center table-td"><?php echo $no; ?></td>
                                            <td class="table-td"><?php echo $row->problemName; ?></td>
                                            <td class="table-td"><?php echo $row->description; ?></td>
                                            <td class="table-td"><?php echo $row->typeOfCar; ?></td>
                                             <td class="table-td"><?php echo $row->problemType; ?></td>
                                             <td class="table-td"><?php echo $row->region; ?></td>
                                            <td class="table-td"><?php echo $row->district; ?></td>
                                             <td class="table-td"><?php echo $row->shehia; ?></td>
                                             <td class="table-td"><?php echo $row->street; ?></td>
                                            <td>
            
                                                <a href="c.garage-help.php?id=<?php echo $row->problemID;?>" title ="View to get a help" style="margin-right: .4rem"><button type="button" class="btn btn-xs btn-info" ><i class="fa fa-eye"></i></button></a>
                                                
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



