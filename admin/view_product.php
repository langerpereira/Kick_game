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
                                        <?php echo 'Shoes Listed'; ?>
                                    </h1>
                                </div>

                                <?php
                                global $conn;

                                $select_query = "SELECT * FROM `product`
                                                INNER JOIN `supplier` USING (s_id)
                                                INNER JOIN `brand` USING (b_id);";
                                $result_select_query = mysqli_query($conn, $select_query);

                                while ($rowData = mysqli_fetch_assoc($result_select_query)) {
                                    $product_pic = $rowData['p_pic'];
                                    $product_name = $rowData['p_name'];
                                    $product_id = $rowData['p_id'];
                                    $product_price = $rowData['p_price'];
                                    $supplier = $rowData['s_name'];
                                    $brand = $rowData['b_name'];

                                    // Check if 'p_qty' key exists in $rowData array
                                    $pro_quantity = isset($rowData['p_qty']) ? $rowData['p_qty'] : 0;

                                    echo "<div class='row-item row mb-4 d-flex justify-content-between align-items-center'>
                                        <div class='col-1'>
                                            <img src='../assets/shoes/$product_pic' class='img-fluid rounded-3' alt='$product_name'>
                                        </div>
                                        <div class='col-2'>
                                            <h6 class='text-black mb-0'>$product_name</h6>
                                        </div>
                                        <div class='col-2'>
                                            <h6 class='text-black mb-0'>$supplier</h6>
                                        </div>
                                        <div class='col-2'>
                                            <h6 class='text-black mb-0'>$brand</h6>
                                        </div>
                                        <div class='col-2'>
                                            <form action='' method='post' class='d-flex gap-1'>
                                                <input type='hidden' name='p_id' value='$product_id'>
                                                <input id='form1' min='0' name='quantity' value='$pro_quantity' type='number' class='form-control form-control-sm' />
                                                <button class='btn btn-dark px-2' name='update_quantity'>Update</button>
                                            </form>
                                        </div>
                                        <div class='col-2 d-flex justify-content-center'>
                                            <h6 class='mb-0 '>Rs $product_price</h6>
                                        </div>
                                        <div class='col-1 d-flex justify-content-center'>
                                            <a href='remove.php?removeItem=$product_id' class='text-muted'><i class='fas fa-times'></i></a>
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
