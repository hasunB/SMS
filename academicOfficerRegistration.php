<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Officers Registration</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="ao-main-body">
    <div class="container">
        <div class="row">
            <div class="col-md-6 align-self-center">
                <div class="left-content">
                    <h2>Registration for Academic Officers</h2>
                    <h3>Join with us to give a <em>better service</em></h3>
                </div>
            </div>
            <div class="col-md-6">
                <form id="contact" class="form-input">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 text-white fw-bold">
                                <input type="text" class="form-control" id="fname" placeholder="name@example.com" required>
                                <label for="fname">First Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 text-white fw-bold">
                                <input type="text" class="form-control" id="lname" placeholder="name@example.com" required>
                                <label for="lname">Last Name</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3 text-white fw-bold">
                                <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
                                <label for="email">Email address</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3 text-white fw-bold">
                                <input type="password" class="form-control" id="pw" placeholder="name@example.com" required>
                                <label for="pw">Password</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3 text-white fw-bold">
                                <input type="text" class="form-control" id="nic" placeholder="name@example.com" required>
                                <label for="nic">NIC</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 text-white fw-bold">
                                <input type="text" class="form-control" id="mobile" placeholder="name@example.com" required>
                                <label for="mobile">Contact Number</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select text-white fw-bold" id="gender" required>
                                <option>Select Gender</option>
                                <?php
                                // take the gender details from the database
                                require "connection.php";

                                $gender_rs = Database::search("SELECT * FROM `gender`");
                                $gender_num = $gender_rs->num_rows; //take the number of rows

                                for ($x = 0; $x < $gender_num; $x++) {
                                    $gender_data = $gender_rs->fetch_assoc(); //extract the data

                                ?>
                                // implement as the data
                                    <option value="<?php echo $gender_data["id"]; ?>"><?php echo $gender_data["gender_name"]; ?></option>

                                <?php

                                }

                                ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <button onclick="aoRegistration();">Register</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- content -->

    <!-- model -->
    <div class="modal fade" tabindex="-1" id="">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content studentregmodel">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Registration Successfull</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="fs-6">Thank you registering. We will send you an invitation email with instruction with 1-3 days</p>
                    <img src="assets/images/green-thumbs-up-11246.svg">
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="studentregmodelbtn" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- model -->

    <!-- footer -->

    <div class="col-12 fixed-bottom d-none d-lg-block">
        <p class="text-center text-white">&copy; 2022 myschool.lk || All Right Reserved</p>
    </div>

    <!-- footer -->

    </div>

    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>