<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal Payment</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>


<body class="main-body">
    <div class="container-fluid vh-100 d-flex justify-content-center">
        <div class="row align-content-center">
            <!-- content -->
            <div class="col-12">
                <div class="row">
                    <?php

                    session_start();
                    require "connection.php";

                    if (isset($_SESSION["u"])) {

                        $email = $_SESSION["u"]["email"];

                        $student_payment_rs = Database::search("SELECT * FROM `student_expiration`
                    INNER JOIN `student_amount` ON
                    student_expiration.student_amount_id=student_amount.id
                    WHERE `student_registration_email`='" . $email . "'");
                        $student_payment_num = $student_payment_rs->num_rows;

                        if ($student_payment_num == 1) {
                            $student_payment_data = $student_payment_rs->fetch_assoc();

                    ?>
                            <div class="col-12  student-signin" id="signInBox" style="width: 800px;">
                                <h1 class="fw-bold">CheckOut</h1>
                                <div class="col-12 row text-white mt-2 mb-4 border rounded">
                                    <div class="col-12 row mt-4">
                                        <div class="col-6">
                                            <p class="fs-3">Student Portal Payment:</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p class="fs-4">LKR <?php echo $student_payment_data["amount"]; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-12 row mt-4">
                                        <div class="col-6">
                                            <p class="fs-3">Tax:</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p class="fs-4">LKR ----</p>
                                        </div>
                                    </div>
                                    <div class="col-12 row mt-4 mb-2">
                                        <div class="col-6">
                                            <p class="fs-3 fw-bold">Due Total:</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p class="fs-4">LKR <?php echo $student_payment_data["amount"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <button class="mb-3" type="submit" id="payhere-payment" onclick="payNow('<?php echo $student_payment_data['student_amount_id']; ?>');">Pay</button>
                            </div>
                    <?php

                        } else {
                            echo ("Student Not Valid");
                        }
                    }

                    ?>
                </div>
            </div>
            <!-- content -->
        </div>

    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
</body>

</html>