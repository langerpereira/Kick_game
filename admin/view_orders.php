<?php
include('../includes/connect.php');

if (isset($_POST['update_quantity'])) {
    global $conn;
    $pro_qty = $_POST['quantity'];
    $p_id = $_POST['p_id'];
    
    $update_query = "UPDATE `product`
                     SET p_qty = $pro_qty
                     WHERE p_id=$p_id;";
    
    $result_update_query = mysqli_query($conn, $update_query);
    
    echo "<script>alert('Product Quantity Updated Successfully')</script>";
    echo "<script>location.href='index.php?view_product';</script>";
}
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
        background-color: white;
        border: 3px solid #ffffff;
        border-radius: 10px;
        margin-top: 20px;
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

<section class="h-100 h-custom">
    <div class="container container-card">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-12">
                            <div class="p-5">
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <h1 class="fw-bold mb-0 text-black">
                                        <?php echo 'All Orders'; ?>
                                    </h1>
                                </div>

                                <?php
                               global $conn;
                                        
                               $select_query = "SELECT orders.od_id, customer.c_fname,customer.c_email,orders.od_date  FROM orders INNER JOIN customer on orders.c_id=customer.c_id order by od_id desc;";
                               $result_select_query = mysqli_query($conn,$select_query);
                               while($rowData = mysqli_fetch_assoc($result_select_query)){
                                   $customer_name = $rowData['c_fname'];
                                   $customer_email = $rowData['c_email'];
                                   $order_id = $rowData['od_id'];
                                   $order_date = $rowData['od_date'];

                           
                                   echo "<div class='row mb-4 d-flex justify-content-between align-items-center'>
                                       
                                       <div class='col-1'>
                                           <h6 class='text-black mb-0'>$order_id</h6>
                                       </div>
                                       <div class='col-2'>
                                           <h6 class='text-black mb-0'>$customer_name</h6>
                                       </div>
                                       <div class='col-3'>
                                           <h6 class='text-black mb-0'>$customer_email</h6>
                                       </div>
                                       <div class='col-2'>
                                           <h6 class='text-black mb-0'>$order_date</h6>
                                       </div>
                                       <div class='col-2'>
                                           <h6 class='text-black mb-0'>$order_price</h6>
                                       </div>
                                       <div class='col-2'>
                                           <a href='index.php?view_order_details=$order_id'>
                                               <button class='btn btn-dark px-2' name='view_od_details'>View Details</button>
                                           </a>
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
</section>
