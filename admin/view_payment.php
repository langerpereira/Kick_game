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
                                        <?php echo 'All Payments'; ?>
                                    </h1>
                                </div>

                                <?php
                                global $conn;
                                        
                                $select_query = "select * from paymentview;";
                                $result_select_query = mysqli_query($conn,$select_query);
                                while($rowData = mysqli_fetch_assoc($result_select_query)){
                                    $customer_name = $rowData['c_fname'];
                                    $customer_email = $rowData['c_email'];
                                    $customer_uname = $rowData['c_uname'];
                                    $pt_amt = $rowData['pt_total'];
                                    $txn_id = $rowData['txn_id'];
                                    $od_id = $rowData['od_id'];
                            
                                    echo "<div class='row mb-4 d-flex justify-content-between align-items-center'>
                                        
                                        <div class='col-2'>
                                            <h6 class='text-black mb-0'>$customer_name</h6>
                                        </div>
                                        <div class='col-3'>
                                            <h6 class='text-black mb-0'>$customer_email</h6>
                                        </div>
                                        <div class='col-2'>
                                            <h6 class='text-black mb-0'>$customer_uname</h6>
                                        </div>
                                        <div class='col-2'>
                                            <h6 class='text-black mb-0'>$pt_amt</h6>
                                        </div>
                                        <div class='col-2'>
                                            <h6 class='text-black mb-0'>$txn_id</h6>
                                        </div>
                                        <div class='col-1'>
                                            <h6 class='text-black mb-0'>$od_id</h6>
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