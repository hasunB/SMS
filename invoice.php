<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice | Student Portal Payment</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="invoice-body">
    <?php
    require "connection.php"; //require the connection
    session_start(); //strat the session
    if (isset($_SESSION["u"])) {

        $umail = $_SESSION["u"]["email"];
        $oid = $_GET["id"]; //get the id

    ?>
        <div class="container">
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <?php

                            //take the invoice data
                            $invoice_rs = Database::search("SELECT * FROM `student_registration`
                            INNER JOIN `student_expiration` ON
                            student_registration.email=student_expiration.student_registration_email
                            INNER JOIN `student_amount` ON
                            student_expiration.student_amount_id=student_amount.id
                            INNER JOIN `invoice` ON
                            student_registration.email=invoice.student_registration_email");
                            $invoice_num = $invoice_rs->num_rows; //take number of results

                            if ($invoice_num == 1) {
                                $invoice_data = $invoice_rs->fetch_assoc();
                            ?>
                                <div class="invoice-container">
                                    <div class="invoice-header">
                                        
                                        <!-- Row start -->
                                        <div class="row gutters mb-5 mt-4">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6" style="margin-top: -20px;">
                                                <a href="index.php" class="invoice-logo">
                                                    <h3><em>MY</em>SCHOOL</h3>
                                                </a>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="custom-actions-btns mb-5">
                                                    <a href="#" class="btn btn-primary">
                                                        <i class="icon-download"></i> Download
                                                    </a>
                                                    <button class="btn btn-secondary" onclick="printInvoice();">
                                                        <i class="icon-printer"></i> Print
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->

                                        <!-- Row start -->
                                        <div class="row gutters mb-1">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6" style="margin-top: -10px;">
                                                <div class="invoice-logo">
                                                    <h3 class="fs-2">Student Portal Payment</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->

                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                                <div class="invoice-details">
                                                    <address>
                                                        <h5><?php echo $invoice_data["email"]; ?></h5>
                                                        <span><?php echo $invoice_data["first_name"]. " " .$invoice_data["middle_name"]." ".$invoice_data["last_name"]; ?></span><br>
                                                        <span><?php echo $invoice_data["school"]; ?></span><br>
                                                        <span>Grade <?php echo $invoice_data["grade_id"]; ?></span>
                                                    </address>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                                <div class="invoice-details">
                                                    <div class="invoice-num">
                                                        <div>Invoice - <?php echo $invoice_data["order_id"]; ?></div>
                                                        <div><?php echo $invoice_data["date"]; ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->

                                    </div>

                                    <div class="invoice-body">

                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="table custom-table m-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Discription</th>
                                                                <th>Invoice Id</th>
                                                                <th class="text-end">Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="col-8 fs-6">
                                                                    Student Portal Payment
                                                                </td>
                                                                <td><?php echo $invoice_data["order_id"]; ?></td>
                                                                <td class="text-end fs-5">LKR <?php echo $invoice_data["amount"]; ?>.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td>
                                                                    <p class="fs-5">Sub Total</p>
                                                                    <p class="fs-5">Tax</p>
                                                                    <p class="fs-4 fw-bold" style="color: #f5a425;">Grand Total</p>
                                                                </td>
                                                                <td class="text-end">
                                                                    <p class="fs-5">LKR <?php echo $invoice_data["amount"]; ?>.00</p>
                                                                    <p class="fs-5">LKR 0.00</p>
                                                                    <p class="fs-4 fw-bold" style="color: #f5a425;">LKR <?php echo $invoice_data["amount"]; ?>.00</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->

                                    </div>

                                    <div class="invoice-footer mt-4 mb-4">
                                        <h5 class="text-light">www.myschool.lk</h5>
                                        <span class="text-white-50" style="font-size: 14px;">Havelock Town. Colombo 05</span><br>
                                        <span class="text-white-50" style="font-size: 14px;">0767974013</span><br>
                                        <span class="text-white-50" style="font-size: 14px;">myschool@gmail.com</span><br><br><br>
                                        <span class="text-light" style="font-size: 14px;">WORKING DAYS/HOURS: </span>
                                        <span class="text-white-50" style="font-size: 14px;">Mon-Sun/8.00 A.M to 9.00 P.M</span>
                                    </div>

                                </div>
                        </div>
                    <?php
                            } else {
                                echo ("Invoice Not Valid");
                            }

                    ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>