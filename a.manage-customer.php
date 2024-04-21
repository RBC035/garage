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
                    <h3 class="text-primary"> View customers</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="a-index.php">Home</a></li>
                        <li class="breadcrumb-item active">View customers</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">

                 <div class="card card-extra">
                            <div class="card-body">
                              
                            <a href="a.add-customer.php"><button class="btn btn-primary">Register Customer</button></a>
                         
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                              <th class="text-center">S/N</th>
                                                <th>customerID</th>
                                                <th>Full name</th>
                                                <th>Phone number</th>
                                                <th>Registered date</th>
                                                <th width="4%">Action</th>
                                            </tr>
                                       </thead>
                                       <tbody>
                                        <?php
                                            $no = 1;
                                            $customer = $con->prepare("select * from customer ");
                                            $customer->execute();
                                            while ($row = $customer->fetch(PDO::FETCH_OBJ)) 
                                             {
                                        ?>
                                        <tr>
                                            <td class="text-center table-td"><?php echo $no; ?></td>
                                            <td class="table-td"><?php echo $row->customerID; ?></td>
                                            <td class="table-td"><?php echo ucwords($row->firstName." ".$row->lastName); ?></td>
                                            <td class="table-td"><?php echo $row->phoneNumber; ?></td>
                                             <td class="table-td"><?php echo $row->registerDate; ?></td>
                                            <td>
            
                                                <a href="a.add-customer.php?id=<?php echo $row->customerID;?>" title ="Edit customer details" style="margin-right: .4rem"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
                                              

             
                                              <!--   <a href="php_action/removeBrand.php?id=<?php echo $row->customerID;?>" ><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a> -->
                                           
                                                
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



