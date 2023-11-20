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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brands</title>
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

        .card {
        background-color: white;
        border: 3px solid #ffffff;
        width: 100%;
        border-radius: 10px;
        margin-top: 20px;
        padding: 20px;
        }

        .card-header {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <section class="h-100 h-custom">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-12">
                                <div class="card p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-dark">
                                            Brands
                                        </h1>
                                    </div>
                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                        <div class="col-11">
                                            <h6>Name</h6>
                                        </div>
                                        <div class="col-1">
                                            <h6>Remove</h6>
                                        </div>
                                    </div>

                                    <?php
                                    global $conn;

                                    $select_query = "select * from `brand`;";
                                    $result_select_query = mysqli_query($conn, $select_query);
                                    while ($rowData = mysqli_fetch_assoc($result_select_query)) {

                                        $brand_name = $rowData['b_name'];
                                        $brand_id = $rowData['b_id'];
                                    ?>
                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-11">
                                                <h6 class="text-dark mb-0"><?php echo $brand_name; ?></h6>
                                            </div>
                                            <div class="col-1 d-flex justify-content-center">
                                                <a href="#" class="text-muted" onclick="confirmRemove(<?php echo $brand_id; ?>)">
                                                    <i class='fas fa-times' style='color:red;'></i>
                                                </a>
                                            </div>
                                        </div>
                                        <hr class='my-3'>
                                    <?php
                                    }
                                    ?>

                                    <div class="pt-4">
                                        <h6 class="mb-0"><a href="index.php" class="text-body"><i
                                                    class="fas fa-long-arrow-alt-left me-2 "></i>Go Back</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function confirmRemove(brandId) {
            var confirmDelete = confirm("Are you sure you want to remove this brand?");
            if (confirmDelete) {
                window.location.href = 'remove.php?removeBrand=' + brandId;
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-e7Vp5Ee5U/CFAmEZREp0gUKjVUhkqUEaC8IaaqEpF5t5U1sjVnCC25nDI0gR8iMR"
        crossorigin="anonymous"></script>
</body>

</html>
