<?php
include('../includes/connect.php');
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    body {
        background-image: url('https://i.postimg.cc/MKq2brY5/shoes-02.jpg');
       background-repeat: no-repeat;
       background-attachment: fixed;
       background-size: cover;
    }
    
    .container-card {
        background-color: rgba(255, 255, 255, 0.9);
        border: 3px solid #ffffff;
        border-radius: 10px;
        margin-top: 20px;
        margin-right: 12%;
        margin-left: 12%;
        padding: 20px;
    }
    
    .row-item {
        margin-bottom: 20px;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    .btn-dark {
        background-color: #343a40;
        color: #fff;
    }

    .btn-dark:hover {
        background-color: #23272b;
    }
    </style>
<section class="h-100 h-custom ">
    <div class="container-card" >
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-12">
                            <div class="p-5">
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <h1 class="fw-bold mb-0 text-black">
                                        <?php echo 'Shoes Removed';?>
                                    </h1>
                                </div>

                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                    <div class="col-1">
                                        <h6>Photo</h6>
                                    </div>
                                    <div class="col-3">
                                        <h6>Shoes</h6>
                                    </div>
                                    <div class="col-2">
                                        <h6>supplier</h6>
                                    </div>
                                    <div class="col-2">
                                        <h6>Brand</h6>
                                    </div>
                                    <div class="col-2 d-flex justify-content-center">
                                        <h6>Price</h6>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <?php 
                                            global $conn;
                                        
                                            $select_query = "select * from `productbackup`
                                        inner join `supplier` using (s_id)
                                        inner join `brand` using (b_id);";
                                            $result_select_query = mysqli_query($conn,$select_query);
                                            while($rowData = mysqli_fetch_assoc($result_select_query)){
                                        
                                                $product_pic = $rowData['p_pic'];
                                                $product_name = $rowData['pb_name'];
                                                $product_id = $rowData['pb_id'];
                                                $pro_quantity = $rowData['p_qty'];
                                                $product_price = $rowData['p_price'];
                                                $supplier = $rowData['s_name'];
                                                $brand = $rowData['b_name'];
                                        
                                                echo "<div class='row mb-4 d-flex justify-content-between align-items-center'>
                                                    <div class='col-1'>
                                                        <img src='../assets/Mobile_Images/$product_pic' class='img-fluid rounded-3' alt='$product_name'>
                                                    </div>
                                                    <div class='col-3'>
                                                        <h6 class='text-black mb-0'>$product_name</h6>
                                                    </div>
                                                    <div class='col-2'>
                                                        <h6 class='text-black mb-0'>$supplier</h6>
                                                    </div>
                                                    <div class='col-2'>
                                                        <h6 class='text-black mb-0'>$brand</h6>
                                                    </div>
                                        
                                                    <div class='col-2 d-flex justify-content-center'>
                                                        <h6 class='mb-0 '>Rs $product_price</h6>
                                                    </div>
                                                </div>
                                        
                                                <hr class='my-4'>";
                                            }
                                    ?>
                                <div class="pt-5">
                                    <h6 class="mb-0"><a href="index.php" class="text-body"><i
                                                class="fas fa-long-arrow-alt-left me-2"></i>Go Back</a></h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- <div class='col-2'>

    <form action='' method='post' class='d-flex gap-1'>
        <input type='hidden' name='p_id' value='$product_id'>
        <input id='form1' min='0' name='quantity' value='$pro_quantity' type='number'
            class='form-control form-control-sm' />
        <button class='btn btn-dark px-2' name='update_quantity'>Update</button>
    </form> -->

</div>