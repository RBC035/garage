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
                    <h3 class="text-primary"> View shehia details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="a-index.php">Home</a></li>
                        <li class="breadcrumb-item active"> <a href="a.manage-district.php">View district details</a></li>
                        <li class="breadcrumb-item active">View shehia details</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2"></div>
                   <div class="col-sm-4">
                 <div class="card card-extra">
                            <div class="card-body">
                                 <a href="a.add-shehia.php?id=<?php echo $_GET['id'];?>"><button class="btn btn-primary">Register shehia</button></a>
                                
                                         <div class="table-responsive m-t-40">
                                             <table id="myTable" class="table table-bordered table-hover">
                                                 <thead>
                                                     <tr>
                                                       <th class="text-center">S/N</th>
                                                         <th>Shehia</th>
                                                         <th width="4%">Edit</th>
                                                     </tr>
                                                </thead>
                                                <tbody>
                                                 <?php
                                                     $no = 1;
                                                     $district = $con->prepare("select * from shehia where districtName = ? order by shehiaName ASC ");
                                                     $district->execute([$_GET['id']]);
                                                     while ($row = $district->fetch(PDO::FETCH_OBJ)) 
                                                      { 
                                                 ?>
                                                 <tr>
                                                     <td class="text-center table-td"><?php echo $no; ?></td>
                                                     <td class="table-td"><?php echo ucwords($row->shehiaName); ?></td>
                                                     <td>
                                                         <a href="a.add-shehia.php?edit=<?php echo $row->shehiaID;?>" title ="Edit shehia" style="margin-right: .4rem"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>      
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



