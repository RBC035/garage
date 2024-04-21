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
                    <h3 class="text-primary"> View solved car problem</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="a-index.php">Home</a></li>
                        <li class="breadcrumb-item active">View solved car problem</li>
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
                                                <th>customerID</th>
                                                <th>ProblemName</th>
                                                <th>TypeOfCar</th>
                                                <th>Descriptio</th>
                                                <th>ProblemType</th>
                                                <th>Region</th>
                                                <th>District</th>
                                                <th>Shehia</th>
                                                <th>Street</th>
                                                <th>Date</th>
                                            </tr>
                                       </thead>
                                       <tbody>
                                        <?php
                                            $no = 1;
                                            $customer = $con->prepare("select * from carproblem where status = ? ");
                                            $customer->execute(["Solved"]);
                                            while ($row = $customer->fetch(PDO::FETCH_OBJ)) 
                                             {
                                        ?>
                                        <tr>
                                            <td class="text-center table-td"><?php echo $no; ?></td>
                                            <td class="table-td"><?php echo $row->customerID; ?></td>
                                            <td class="table-td"><?php echo $row->problemName; ?></td>
                                            <td class="table-td"><?php echo $row->typeOfCar; ?></td>
                                            <td class="table-td"><?php echo $row->description; ?></td>
                                            <td class="table-td"><?php echo $row->problemType; ?></td>
                                            <td class="table-td"><?php echo $row->region; ?></td>
                                            <td class="table-td"><?php echo $row->district; ?></td>
                                             <td class="table-td"><?php echo $row->shehia; ?></td>
                                             <td class="table-td"><?php echo $row->street; ?></td>
                                             <td class="table-td"><?php echo $row->problemDate; ?></td>
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



