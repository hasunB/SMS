<?php

session_start();

require "connection.php";

if (isset($_SESSION["ad"])) {
    $ad_data = $_SESSION["ad"]["email"];

    $admin_img_rs = Database::search("SELECT * FROM `admin_profile_img` WHERE `admin_email`='" . $ad_data . "'");

    $admin_img_data = $admin_img_rs->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Manage Teachers</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="bootstrap.css" />
    </head>

    <body>
        <div class="container-fluid position-relative d-flex p-0">
            <div class="sidebar pe-4 pb-3 admin-dashboard-nav" style="background-color: #172238;">
                <nav class="navbar">
                    <a href="index.html" class="navbar-brand mx-4 mb-3">
                        <h3><em>MY</em>SCHOOL</h3>
                    </a>
                    <div class="d-flex align-items-center ms-4 mb-4">
                        <?php

                        $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $ad_data . "'");
                        $admin_num = $admin_rs->num_rows;

                        if ($admin_num == 1) {
                            $admin_data = $admin_rs->fetch_assoc();
                        ?>
                            <div class="position-relative">
                                <?php
                                if (empty($admin_img_data["path"])) {
                                ?>
                                    <img class="rounded-circle" src="assets/images/man.jpg" alt="" style="width: 40px; height: 40px;">
                                <?php
                                } else {
                                ?>
                                    <img class="rounded-circle" src="<?php echo $admin_img_data["path"]; ?>" alt="" style="width: 40px; height: 40px;">
                                <?php
                                }
                                ?>
                                <div class="bg-success rounded-circle border border-1 border-white position-absolute end-0 bottom-0 p-1"></div>
                            </div>
                            <div class="ms-4 text-white">
                                <h6 class="mb-0"><?php echo $admin_data["first_name"] . " " . $admin_data["last_name"]; ?></h6>
                                <span>Admin</span>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="position-relative">
                                <img class="rounded-circle" src="assets/images/man.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="bg-success rounded-circle border border-1 border-white position-absolute end-0 bottom-0 p-1"></div>
                            </div>
                            <div class="ms-4 text-white">
                                <h6 class="mb-0">---- ----</h6>
                                <span>Admin</span>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="adminDashboard.php" class="nav-item nav-link"><i class="fa-solid fa-chart-line me-2"></i>Dashboard</a>
                        <a href="#" class="nav-item nav-link active"><i class="fa-solid fa-chalkboard-user me-2"></i>Teachers</a>
                        <a href="manageStudents.php" class="nav-item nav-link"><i class="fa-solid fa-square-poll-vertical me-2"></i>Students</a>
                        <a href="manageAO.php" class="nav-item nav-link" style="font-size: 15px;"><i class="fa-solid fa-square-poll-vertical me-2"></i>Academic Officers</a>
                        <a href="results.php" class="nav-item nav-link"><i class="fa-solid fa-square-poll-vertical me-2"></i>Results</a>
                        <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Profiles</a>
                        <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>invites</a>
                    </div>
                </nav>
            </div>
            <div class="content">
                <nav class="navbar navbar-expand  sticky-top px-4 py-0" style="background-color: #172238;">
                    <a href="#" class="sidebar-toggler flex-shrink-0 text-decoration-none">
                        <i class="fa fa-bars" style="font-size: 30px;"></i>
                    </a>
                    <form class="d-none d-md-flex ms-4 col-4">
                        <input class="form-control border-0" type="search" placeholder="Search">
                    </form>
                    <div class="navbar-nav align-items-center ms-auto">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-bs-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">
                                    <div>
                                        <h6 class="fw-normal mb-0">message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    <div>
                                        <h6 class="fw-normal mb-0">message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    <div>
                                        <h6 class="fw-normal mb-0">message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item text-center">See all message</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-bs-toggle="dropdown">
                                <i class="fa fa-bell me-lg-2"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">Profile updated</h6>
                                    <small>15 minutes ago</small>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">New user added</h6>
                                    <small>15 minutes ago</small>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">Password changed</h6>
                                    <small>15 minutes ago</small>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item text-center">See all notifications</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-bs-toggle="dropdown">
                                <?php
                                if (empty($admin_img_data["path"])) {
                                ?>
                                    <img class="rounded-circle" src="assets/images/man.jpg" alt="" style="width: 40px; height: 40px;">
                                <?php
                                } else {
                                ?>
                                    <img class="rounded-circle" src="<?php echo $admin_img_data["path"]; ?>" alt="" style="width: 40px; height: 40px;">
                                <?php
                                }
                                ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" style="width: 100px;">
                                <a href="#" class="dropdown-item">My Profile</a>
                                <a href="#" class="dropdown-item">Settings</a>
                                <a href="#" class="dropdown-item" onclick="adminLogOut();">Log Out</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="container-fluid pt-4 px-4 dash-board">
                    <div class="row g-4">
                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex align-items-center justify-content-center sinfo">
                                <i class="bi bi-people-fill"></i>
                                <?php

                                $teacher_rs = Database::search("SELECT * FROM `teacher_registration`");
                                $teacher_num = $teacher_rs->num_rows;

                                ?>
                                <div>
                                    <p class="mb-2 fw-bold">Teachers</p>
                                    <h6 class="mb-0"><?php echo $teacher_num; ?></h6>
                                </div>
                                <?php

                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex align-items-center justify-content-center sinfo">
                                <i class="bi bi-person-lines-fill"></i>
                                <?php

                                $teacher2_rs = Database::search("SELECT * FROM `teacher_registration` WHERE `Verification_status_id`='2'");
                                $teacher2_num = $teacher2_rs->num_rows;

                                ?>
                                <div>
                                    <p class="mb-2 fw-bold">Verified</p>
                                    <h6 class="mb-0"><?php echo $teacher2_num; ?></h6>
                                </div>
                                <?php

                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex align-items-center justify-content-center sinfo">
                                <i class="bi bi-person-lines-fill"></i>
                                <?php

                                $teacher3_rs = Database::search("SELECT * FROM `teacher_registration` WHERE `Verification_status_id`='1'");
                                $teacher3_num = $teacher3_rs->num_rows;

                                ?>
                                <div>
                                    <p class="mb-2 fw-bold">Not Verified</p>
                                    <h6 class="mb-0"><?php echo $teacher3_num; ?></h6>
                                </div>
                                <?php

                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex align-items-center justify-content-center sinfo">
                                <i class="bi bi-person-lines-fill"></i>
                                <?php

                                $teacher3_rs = Database::search("SELECT * FROM `teacher_registration` WHERE `status_id`='2'");
                                $teacher3_num = $teacher3_rs->num_rows;

                                ?>
                                <div>
                                    <p class="mb-2 fw-bold">Blocked</p>
                                    <h6 class="mb-0"><?php echo $teacher3_num; ?></h6>
                                </div>
                                <?php

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid pt-4 px-4">
                    <div class="text-center p-4 manage-student">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">New Teachers</h6>
                        </div>
                        <div class="col-12 row p-0 text-center mb-4 text-white fw-bold student-detail">
                            <div class="col-3">Name</div>
                            <div class="col-3">Email</div>
                            <div class="col-3">Invitation</div>
                            <div class="col-3">Status</div>
                        </div>
                        <?php

                        $teacher4_rs = Database::search("SELECT * FROM `teacher_registration`
                        INNER JOIN `gender` ON teacher_registration.gender_id=gender.id
                        INNER JOIN `teacher_has_subject` ON 
                        teacher_registration.email=teacher_has_subject.teacher_registration_email
                        INNER JOIN `grade_has_teacher` ON 
                        teacher_registration.email=grade_has_teacher.teacher_registration_email
                        INNER JOIN `subject` ON teacher_has_subject.subject_id=subject.id ORDER BY `registered_date_time` ASC");
                        $teacher4_num = $teacher4_rs->num_rows;

                        for ($x = 0; $x < $teacher4_num; $x++) {
                            $teacher4_data = $teacher4_rs->fetch_assoc();
                        ?>
                            <a href="#" class="col-12 row text-center mb-3 text-white fw-bold student-detail-2" data-bs-toggle="dropdown">
                                <div class="col-3 overflow-hidden pt-1"><?php echo $teacher4_data["first_name"] . " " . $teacher4_data["last_name"]; ?></div>
                                <div class="col-3 overflow-hidden pt-1" title="<?php echo $teacher4_data["email"]; ?>"><?php echo $teacher4_data["email"]; ?></div>
                                <div class="col-3 overflow-hidden">
                                    <?php
                                    if ($teacher4_data["Verification_status_id"] == 1) {
                                    ?>
                                        <button class="invition-btn">Not send</button>
                                    <?php
                                    } else if ($teacher4_data["Verification_status_id"] == 2) {
                                    ?>
                                        <button class="invition-btn bg-success">Sent</button>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-3 overflow-hidden">
                                    <?php
                                    if ($teacher4_data["Verification_status_id"] == 1) {
                                    ?>
                                        <button class="statusbtn">Not Verified</button>
                                    <?php
                                    } else if ($teacher4_data["Verification_status_id"] == 2) {
                                    ?>
                                        <button class="statusbtn bg-success">Verified</button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end student-more">
                                <div class="col-12 p-0 row mt-2 mb-2">
                                    <div class="col-6">
                                        <div class="col-12 ms-3">Full name : <?php echo $teacher4_data["first_name"] . " " . $teacher4_data["middle_name"] . " " . $teacher4_data["last_name"]; ?></div>
                                        <div class="col-12 ms-3">NIC : <?php echo $teacher4_data["nic"]; ?></div>
                                        <div class="col-12 ms-3">Subjects: <?php echo $teacher4_data["subject_name"]; ?></div>
                                        <div class="col-12 ms-3">Grades: <?php echo $teacher4_data["grade_id"]; ?></div>
                                        <div class="col-12 ms-3">Gender : <?php echo $teacher4_data["gender_name"]; ?></div>
                                        <div class="col-12 ms-3">Contact No : <?php echo $teacher4_data["contact_no"]; ?></div>
                                        <div class="col-12 ms-3">Registerd Date : <?php echo $teacher4_data["registered_date_time"]; ?></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="col-12">
                                            <?php
                                            if (!empty($teacher4_data["verification_code"])) {
                                            ?>
                                                <button class="btn btn-success col-6 ms-5" onclick="sentInvitation('<?php echo $teacher4_data['email']; ?>');">Invitation sent</button>
                                            <?php
                                            } else {
                                            ?>
                                                <button class="btn btn-danger col-6 ms-5" onclick="sentInvitation('<?php echo $teacher4_data['email']; ?>');">Invitation not send</button>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-12">
                                            <?php
                                            if ($teacher4_data["Verification_status_id"] == 1) {
                                            ?>
                                                <button class="btn btn-danger col-6 mt-2 ms-5">Not Verified</button>
                                            <?php
                                            } else if ($teacher4_data["Verification_status_id"] == 2) {
                                            ?>
                                                <button class="btn btn-success col-6 mt-2 ms-5">Verified</button>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-12">
                                            <?php
                                            if ($teacher4_data["status_id"] == 1) {
                                            ?>
                                                <button class="btn btn-success col-6 mt-2 ms-5" onclick="teacherStatus('<?php echo $teacher4_data['email']; ?>');">Unblocked</button>
                                            <?php
                                            } else if ($teacher4_data["status_id"] == 2) {
                                            ?>
                                                <button class="btn btn-danger col-6 mt-2 ms-5" onclick="teacherStatus('<?php echo $teacher4_data['email']; ?>');">Blocked</button>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-info col-6 mt-2 ms-5" onclick="changeGradeSubject();">Change Subject And Grade</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                </div>
                <!-- model1 -->
                <div class="modal" tabindex="-1" id="changeGreadeSubjectModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Change Subject And Grade</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12 row">
                                    <label for="">Subject</label>
                                    <select class="form-select" id="subject">
                                        <option value="0">Select Subject</option>
                                        <?php
                                        
                                        $subject_rs = Database::search("SELECT * FROM `subject`");
                                        $subject_num = $subject_rs->num_rows;

                                        for($x=0; $x < $subject_num; $x++){
                                            $subject_data = $subject_rs->fetch_assoc();

                                            ?>
                                            <option value="<?php echo $subject_data["id"]; ?>"><?php echo $subject_data["subject_name"]; ?></option>
                                            <?php
                                        }
                                        
                                        ?>
                                    </select>

                                    <label for="">Grade</label>
                                    <select class="form-select" id="grade">
                                    <option value="0">Select Grade</option>
                                        <?php
                                        
                                        $grade_rs = Database::search("SELECT * FROM `grade`");
                                        $grade_num = $grade_rs->num_rows;

                                        for($y=0; $y < $grade_num; $y++){
                                            $grade_data = $grade_rs->fetch_assoc();

                                            ?>
                                            <option value="<?php echo $grade_data["id"]; ?>"><?php echo $grade_data["grade_name"]; ?></option>
                                            <?php
                                        }
                                        
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="changegands('<?php echo $teacher4_data['email']; ?>');">update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- model1 -->
                <div class="container-fluid pt-4 px-4 mb-5">
                    <div class="row g-4">
                        <div class="col-sm-12 col-md-6 col-xl-4">
                            <div class="h-100 p-4 dash2">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h6 class="mb-0">Payments</h6>
                                    <a href="">Show All</a>
                                </div>
                                <div class="d-flex align-items-center border-bottom py-3">
                                    <div class="w-100 ms-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-0">LKR 3000</h6>
                                            <small>15 minutes ago</small>
                                        </div>
                                        <span>Hasunbandara17@gmail.com</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center border-bottom py-3">
                                    <div class="w-100 ms-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-0">LKR 3000</h6>
                                            <small>15 minutes ago</small>
                                        </div>
                                        <span>Hasunbandara17@gmail.com</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center border-bottom py-3">
                                    <div class="w-100 ms-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-0">LKR 3000</h6>
                                            <small>15 minutes ago</small>
                                        </div>
                                        <span>Hasunbandara17@gmail.com</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center pt-3">
                                    <div class="w-100 ms-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-0">LKR 3000</h6>
                                            <small>15 minutes ago</small>
                                        </div>
                                        <span>Hasunbandara17@gmail.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-8">
                            <div class="h-100 p-4 dash2">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h6 class="mb-0">Massages</h6>
                                    <a href="">Show All</a>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="w-100 ms-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-0">Mathematics</h6>
                                            <small>15 minutes ago</small>
                                        </div>
                                        <span>Grade 10/ Teacher Name</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <div class="w-100 ms-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-0">Mathematics</h6>
                                            <small>15 minutes ago</small>
                                        </div>
                                        <span>Grade 10/ Teacher Name</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <div class="w-100 ms-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-0">Mathematics</h6>
                                            <small>15 minutes ago</small>
                                        </div>
                                        <span>Grade 10/ Teacher Name</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/chart.min.js"></script>
        <script src="assets/js/easing.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/moment.min.js"></script>
        <script src="assets/js/moment-timezone.min.js"></script>
        <script src="assets/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="main.js"></script>
        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="bootstrap.js"></script>
    </body>

    </html>
<?php
} else {
    echo ("admin lognin not validated");
}

?>