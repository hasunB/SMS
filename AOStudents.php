<?php

session_start();

require "connection.php";

if (isset($_SESSION["ao"])) {
    $ao_data = $_SESSION["ao"]["email"];

    $ao_rs = Database::search("SELECT * FROM `academic_officer_registration`
    INNER JOIN `gender` ON  academic_officer_registration.gender_id=gender.id
    INNER JOIN `grade_has_academic_officer` ON
    academic_officer_registration.email=grade_has_academic_officer.academic_officer_registration_email
    WHERE `email`='" . $ao_data . "'");

    $ao_img_rs = Database::search("SELECT * FROM `academic_officer_prifile_image` WHERE `academic_officer_registration_email`='" . $ao_data . "'");

    $ao_img_data = $ao_img_rs->fetch_assoc();
    $academicOfiicer_data = $ao_rs->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Manage Students</title>
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
                        <div class="position-relative">
                            <?php
                            if (empty($ao_img_data["path"])) {
                            ?>
                                <img class="rounded-circle" src="assets/images/teacherimg.svg" alt="" style="width: 40px; height: 40px;">
                            <?php
                            } else {
                            ?>
                                <img class="rounded-circle" src="<?php echo $ao_img_data["path"]; ?>" alt="" style="width: 40px; height: 40px;">
                            <?php
                            }
                            ?>
                            <div class="bg-success rounded-circle border border-1 border-white position-absolute end-0 bottom-0 p-1"></div>
                        </div>
                        <div class="ms-4 text-white">
                            <h6 class="mb-0"><?php echo $academicOfiicer_data["first_name"] . " " . $academicOfiicer_data["last_name"]; ?></h6>
                            <span>Academic Officer</span>
                        </div>
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="AOPanel.php" class="nav-item nav-link "><i class="fa-solid fa-chart-line me-2"></i>Dashboard</a>
                        <a href="AOStudents.php" class="nav-item nav-link active"><i class="fa-solid fa-chalkboard-user me-2"></i>Students</a>
                        <a href="AOMarks.php" class="nav-item nav-link"><i class="fa-solid fa-square-poll-vertical me-2"></i>Marks</a>
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
                                if (empty($ao_img_data["path"])) {
                                ?>
                                    <img class="rounded-circle" src="assets/images/teacherimg.svg" alt="" style="width: 40px; height: 40px;">
                                <?php
                                } else {
                                ?>
                                    <img class="rounded-circle" src="<?php echo $ao_img_data["path"]; ?>" alt="" style="width: 40px; height: 40px;">
                                <?php
                                }
                                ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" style="width: 100px;">
                                <a href="updateAO.php" class="dropdown-item">My Profile</a>
                                <a href="#" class="dropdown-item">Settings</a>
                                <a href="#" class="dropdown-item" onclick="academicOfficerLogOut();">Log Out</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="container-fluid pt-4 px-4 dash-board">
                    <div class="row g-4">
                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex align-items-center justify-content-center sinfo">
                                <div>
                                    <h1 class="mb-0">Grade <?php echo $academicOfiicer_data["grade_id"]; ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex align-items-center justify-content-center sinfo">
                                <i class="bi bi-people-fill"></i>
                                <?php

                                //take the academic officer's from the database

                                $grade_id = $academicOfiicer_data["grade_id"];

                                $student_rs = Database::search("SELECT * FROM `student_registration`
                                WHERE student_registration.grade_id='" . $grade_id . "'");
                                $student_num = $student_rs->num_rows; //take number of results

                                ?>
                                <div>
                                    <p class="mb-2 fw-bold">Students</p>
                                    <h6 class="mb-0"><?php echo $student_num; ?></h6>
                                </div>
                                <?php

                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex align-items-center justify-content-center sinfo">
                                <i class="bi bi-person-lines-fill"></i>
                                <?php

                                //take the student from the database verification status

                                $student2_rs = Database::search("SELECT * FROM `student_registration` WHERE `Verification_status_id`='2'
                                AND student_registration.grade_id='" . $grade_id . "'");
                                $student2_num = $student2_rs->num_rows;

                                ?>
                                <div>
                                    <p class="mb-2 fw-bold">Verified</p>
                                    <h6 class="mb-0"><?php echo $student2_num; ?></h6>
                                </div>
                                <?php

                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex align-items-center justify-content-center sinfo">
                                <i class="bi bi-person-lines-fill"></i>
                                <?php

                                //take the student from the database verification status

                                $student3_rs = Database::search("SELECT * FROM `student_registration` WHERE `Verification_status_id`='1'
                                AND student_registration.grade_id='" . $grade_id . "'");
                                $student3_num = $student3_rs->num_rows;

                                ?>
                                <div>
                                    <p class="mb-2 fw-bold">Not Verified</p>
                                    <h6 class="mb-0"><?php echo $student3_num; ?></h6>
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
                            <h6 class="mb-0">New Students</h6>
                        </div>
                        <div class="col-12 row p-0 text-center mb-4 text-white fw-bold student-detail">
                            <div class="col-2">Name</div>
                            <div class="col-2">Email</div>
                            <div class="col-2">School</div>
                            <div class="col-2">Grade</div>
                            <div class="col-2">Invitation</div>
                            <div class="col-2">Status</div>
                        </div>
                        <?php

                        //take the student's data from the database

                        $student4_rs = Database::search("SELECT * FROM `student_registration`
                        INNER JOIN `gender` ON student_registration.gender_id=gender.id 
                        WHERE student_registration.grade_id='" . $grade_id . "'
                        ORDER BY `registered_date_time` ASC");
                        $student4_num = $student4_rs->num_rows;

                        for ($x = 0; $x < $student4_num; $x++) {
                            $student4_data = $student4_rs->fetch_assoc();
                        ?>
                            <a href="#" class="col-12 row text-center mb-3 text-white fw-bold student-detail-2" data-bs-toggle="dropdown">
                                <div class="col-2 overflow-hidden pt-1"><?php echo $student4_data["first_name"] . " " . $student4_data["last_name"]; ?></div>
                                <div class="col-2 overflow-hidden pt-1" title="<?php echo $student4_data["email"]; ?>"><?php echo $student4_data["email"]; ?></div>
                                <div class="col-2 overflow-hidden pt-1"><?php echo $student4_data["school"]; ?></div>
                                <div class="col-2 overflow-hidden pt-1"><?php echo $student4_data["grade_id"]; ?></div>
                                <div class="col-2 overflow-hidden">
                                    <?php
                                    if ($student4_data["Verification_status_id"] == 1) {
                                    ?>
                                        <button class="invition-btn">Not send</button>
                                    <?php
                                    } else if ($student4_data["Verification_status_id"] == 2) {
                                    ?>
                                        <button class="invition-btn bg-success">Sent</button>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-2 overflow-hidden">
                                    <?php
                                    if ($student4_data["Verification_status_id"] == 1) {
                                    ?>
                                        <button class="statusbtn">Not Verified</button>
                                    <?php
                                    } else if ($student4_data["Verification_status_id"] == 2) {
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
                                        <div class="col-12 ms-3">Full name : <?php echo $student4_data["first_name"] . " " . $student4_data["middle_name"] . " " . $student4_data["last_name"]; ?></div>
                                        <div class="col-12 ms-3">School : <?php echo $student4_data["school"]; ?></div>
                                        <div class="col-12 ms-3">Grades: <?php echo $student4_data["grade_id"]; ?></div>
                                        <div class="col-12 ms-3">Gender : <?php echo $student4_data["gender_name"]; ?></div>
                                        <div class="col-12 ms-3">Gurdian's name : Bandara</div>
                                        <div class="col-12 ms-3">Contact No : -</div>
                                        <div class="col-12 ms-3">Registerd Date : <?php echo $student4_data["registered_date_time"]; ?></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="col-12">
                                            <?php
                                            if (!empty($student4_data["verification_code"])) {
                                            ?>
                                                <button class="btn btn-success col-6 ms-5" onclick="sentStudentInvitation('<?php echo $student4_data['email']; ?>');">Invitation sent</button>
                                            <?php
                                            } else {
                                            ?>
                                                <button class="btn btn-danger col-6 ms-5" onclick="sentStudentInvitation('<?php echo $student4_data['email']; ?>');">Invitation not send</button>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-12">
                                            <?php
                                            if ($student4_data["Verification_status_id"] == 1) {
                                            ?>
                                                <button class="btn btn-danger col-6 mt-2 ms-5">Not Verified</button>
                                            <?php
                                            } else if ($student4_data["Verification_status_id"] == 2) {
                                            ?>
                                                <button class="btn btn-success col-6 mt-2 ms-5">Verified</button>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }

                        ?>
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