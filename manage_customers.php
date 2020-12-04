<?php 

session_start();

if(isset($_SESSION['admin'])){

}
else{
    header("location: http://localhost/E-Commerce%20Website%20PHP%20and%20MYSQL/CODE/ADMIN%20DASHBOARD/concept-master/concept-master/pages/login.php ");
    die();
}


$connection = mysqli_connect("localhost","root" ,"" ,"project4_ecommerce");

if(!$connection){
    die("can not connect to the server");
}


if (isset($_POST['customer_submit'])){

    
    
    $customer_name      = $_POST['customer_name'];
    $customer_email     = $_POST['customer_email'];
    $customer_password  = $_POST['customer_password'];
    $customer_phone     = $_POST['customer_phone'];
    $customer_address   = $_POST['customer_address'];
    

    $query   = "INSERT INTO customers (customer_name, customer_email, customer_phone, customer_password, customer_address) 
    VALUES ('$customer_name' , '$customer_email' ,'$customer_phone' , '$customer_password' , '$customer_address' ) ";
        
    mysqli_query($connection, $query);
    
}


    


else {
    echo "Not set";
}

?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Manage Customer</title>
</head>
<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">Concept</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <form method="POST" class="d-flex">
                                    <input class="form-control"  name="item" type="text" placeholder="Search..">
                                    <button name="submit" value="Search" class="btn btn-primary submit" ><i class="fas fa-search"></i></button>
                            </form>
                            </div>
                        </li>
                        <?php
						
						
						 if(isset($_POST['submit'])){
							 $item=$_POST['item'];

							$_SESSION['item']=$_POST['item'];
                            header("location:http://localhost/E-Commerce%20Website%20PHP%20and%20MYSQL/CODE/ECOMMERCE-PUBLIC/goggles-web_Free07-08-2018_1255464790/web/searchresults.php");
                        }
				
					
					
						?>
                       
                              

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <?php 

                                    $query  = "SELECT * from admins WHERE admin_id = {$_SESSION['admin']};";
                                    $result = mysqli_query($connection, $query);
                                    $row = mysqli_fetch_assoc($result);

                                    ?>

                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $row['admin_name']; ?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="http://localhost/E-Commerce%20Website%20PHP%20and%20MYSQL/CODE/ECOMMERCE-PUBLIC/goggles-web_Free07-08-2018_1255464790/web/index.php"><i class="fas fa-user mr-2"></i>Homepage</a>
                                <a class="dropdown-item" href="http://localhost/E-Commerce%20Website%20PHP%20and%20MYSQL/CODE/ADMIN%20DASHBOARD/concept-master/concept-master/pages/logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>


                       
                        
                       
                        
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                            <li class="nav-divider active">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="manage_admin.php"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Manage Admins <span class="badge badge-success">6</span></a>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="manage_categories.php"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-rocket"></i>Manage Categories <span class="badge badge-success">6</span></a>
                                
                            </li><li class="nav-item ">
                                <a class="nav-link " href="manage_products.php"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-fw fa-chart-pie"></i>Manage Products <span class="badge badge-success">6</span></a>
                                
                            </li><li class="nav-item ">
                                <a class="nav-link " href="manage_customers.php"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fab fa-fw fa-wpforms"></i>Manage Customers <span class="badge badge-success">6</span></a>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="manage_orders.php"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-fw fa-table"></i>Manage Orders <span class="badge badge-success">6</span></a>
                                
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                    
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Manage Customer </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Menu</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Manage Customer</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- validation form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1"></div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">
                            <div class="card">
                                <h5 class="card-header">Manage Customer</h5>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate action="" method="POST">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
                                                <label for="validationCustom01">Customer Name</label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="Enter Customer name" name="customer_name" required>
                                                <!-- <div class="valid-feedback">
                                                    Looks good!
                                                </div> -->
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                                                <label for="validationCustom02">Customer Email</label>
                                                <input type="text" class="form-control" id="validationCustom02" placeholder="Enter Customer Email" name="customer_email" required>
                                                <!-- <div class="valid-feedback">
                                                    Looks good!
                                                </div> -->
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                                                <label for="validationCustom02">Customer Password</label>
                                                <input type="password" class="form-control" id="validationCustom02" placeholder="Enter Customer Password" name="customer_password" required>
                                                <!-- <div class="valid-feedback">
                                                    Looks good!
                                                </div> -->
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                                                <label for="validationCustom02">Customer Phone</label>
                                                <input type="numbers" class="form-control" id="validationCustom02" placeholder="Enter Customer Phone" name="customer_phone" required>
                                                <!-- <div class="valid-feedback">
                                                    Looks good!
                                                </div> -->
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                                                <label for="validationCustom02">Customer Address</label>
                                                <input type="text" class="form-control" id="validationCustom02" placeholder="Enter Customer Address" name="customer_address" required>
                                                <!-- <div class="valid-feedback">
                                                    Looks good!
                                                </div> -->
                                            </div>
                                        </div>
                                         <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
                                             <button class="btn btn-primary" type="submit" name="customer_submit">Submit form</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1"></div>
                        <!-- ============================================================== -->
                        <!-- end validation form -->
                        <!-- ============================================================== -->
                    </div>
                    <div class="row">
                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1"></div>
                        
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">
                            <div class="card">
                                <h5 class="card-header">Customers Informations</h5>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Customer ID</th>
                                                <th scope="col">Customer Name</th>
                                                <th scope="col">Customer Email</th>
                                                <th scope="col">Customer Phone</th>
                                                <th scope="col">Customer Address</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        
                                        $query  = "SELECT * FROM customers ";
                                        $result =  mysqli_query($connection,$query);
                                        while ($row = mysqli_fetch_assoc($result)){
                                         
                                            echo "<tr>";
                                              echo "<td>{$row['customer_id']}</td>";
                                              echo "<td>{$row['customer_name']}</td>";
                                              echo "<td>{$row['customer_email']}</td>";
                                              echo "<td>{$row['customer_phone']}</td>";
                                              echo "<td>{$row['customer_address']}</td>";
                                              echo "<td><a href='edit_customers.php?id={$row['customer_id']}' class='btn btn-primary'>Edit</a></td>";
                                              echo "<td><a href='delete.php?id={$row['customer_id']}' class='btn btn-danger'>Delete</a></td>";
                                              echo "</tr>";
                                        }
                                        

                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1"></div>
</div>
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>