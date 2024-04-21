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
                    <h3 class="text-primary"> View district details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="a-index.php">Home</a></li>
                        <li class="breadcrumb-item active">View district details</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2"></div>
                   <div class="col-sm-6">
                 <div class="card card-extra">
                            <div class="card-body">
                                
                                         <div class="table-responsive m-t-40">
                                             <table id="myTable" class="table table-bordered table-hover">
                                                 <thead>
                                                     <tr>
                                                       <th class="text-center">S/N</th>
                                                         <th>Region</th>
                                                         <th>District</th>
                                                         <th width="4%">Add</th>
                                                         <th width="4%">View</th>
                                                     </tr>
                                                </thead>
                                                <tbody>
                                                 <?php
                                                     $no = 1;
                                                     $district = $con->prepare("select * from district order by regioName ASC ");
                                                     $district->execute();
                                                     while ($row = $district->fetch(PDO::FETCH_OBJ)) 
                                                      { 
                                                 ?>
                                                 <tr>
                                                     <td class="text-center table-td"><?php echo $no; ?></td>
                                                     <td class="table-td"><?php echo ucwords($row->regioName); ?></td>
                                                     <td class="table-td"><?php echo ucwords($row->districtName); ?></td>
                                                     <td>
                                                         <a href="a.add-shehia.php?id=<?php echo $row->districtName;?>" title ="Add shehia" style="margin-right: .4rem"><button type="button" class="btn btn-xs btn-info" ><i class="fa fa-plus"></i></button></a>      
                                                     </td>
                                                     <td>
                                                         <a href="a.view-shehia.php?id=<?php echo $row->districtName;?>" title ="View shehia" style="margin-right: .4rem"><button type="button" class="btn btn-xs btn-success" ><i class="fa fa-eye"></i></button></a>      
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
                         
                                
                            </div>
                        </div>

 
<?php include('./constant/layout/footer.php');?>



