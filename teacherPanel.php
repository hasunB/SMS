<?php

session_start();

require "connection.php";

if (isset($_SESSION["t"])) {
    $teacher_data = $_SESSION["t"]["email"];

    $teacher_rs = Database::search("SELECT * FROM `teacher_registration`
    INNER JOIN `grade_has_teacher` ON  teacher_registration.email=grade_has_teacher.teacher_registration_email
    INNER JOIN `teacher_has_subject` ON teacher_registration.email=teacher_has_subject.teacher_registration_email
    INNER JOIN `subject` ON teacher_has_subject.subject_id=subject.id WHERE `email`='" . $teacher_data . "'");

    $teacher_img_rs = Database::search("SELECT * FROM `teacher_profile_image` WHERE `teacher_registration_email`='" . $teacher_data . "'");

    $teacher_img_data = $teacher_img_rs->fetch_assoc();
    $teacher_data = $teacher_rs->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Teacher Dashboard</title>
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
            <div id="spinner" class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center" style="background-color: #172238;">
                <div class="spinner-border" style="width: 3rem; height: 3rem; color:#f5a425;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="sidebar pe-4 pb-3 admin-dashboard-nav" style="background-color: #172238;">
                <nav class="navbar">
                    <a href="index.html" class="navbar-brand mx-4 mb-3">
                        <h3><em>MY</em>SCHOOL</h3>
                    </a>
                    <div class="d-flex align-items-center ms-4 mb-4">
                        <div class="position-relative">
                            <?php
                            if (empty($teacher_img_data["path"])) {
                            ?>
                                <img class="rounded-circle" src="assets/images/teacherimg.svg" alt="" style="width: 40px; height: 40px;">
                            <?php
                            } else {
                            ?>
                                <img class="rounded-circle" src="<?php echo $teacher_img_data["path"]; ?>" alt="" style="width: 40px; height: 40px;">
                            <?php
                            }
                            ?>
                            <div class="bg-success rounded-circle border border-1 border-white position-absolute end-0 bottom-0 p-1"></div>
                        </div>
                        <div class="ms-4 text-white">
                            <h6 class="mb-0"><?php echo $teacher_data["first_name"] . " " . $teacher_data["last_name"]; ?></h6>
                            <span>Teacher</span>
                        </div>
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="#" class="nav-item nav-link active"><i class="fa-solid fa-chart-line me-2"></i>Dashboard</a>
                        <a href="teacherLesson.php" class="nav-item nav-link"><i class="fa-solid fa-chalkboard-user me-2"></i>Lessons</a>
                        <a href="teacherAssingments.php" class="nav-item nav-link"><i class="fa-solid fa-square-poll-vertical me-2"></i>Assingments</a>
                        <a href="teacherAnswerSheets.php" class="nav-item nav-link" style="font-size: 15px;"><i class="fa-solid fa-square-poll-vertical me-2"></i>Answer Sheets</a>
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
                                if (empty($teacher_img_data["path"])) {
                                ?>
                                    <img class="rounded-circle" src="assets/images/teacherimg.svg" alt="" style="width: 40px; height: 40px;">
                                <?php
                                } else {
                                ?>
                                    <img class="rounded-circle" src="<?php echo $teacher_img_data["path"]; ?>" alt="" style="width: 40px; height: 40px;">
                                <?php
                                }
                                ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" style="width: 100px;">
                                <a href="updateTeacherProfile.php" class="dropdown-item">My Profile</a>
                                <a href="#" class="dropdown-item">Settings</a>
                                <a href="#" class="dropdown-item" onclick="teacherLogOut();">Log Out</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="container-fluid pt-4 px-4 dash-board">
                    <div class="row g-4">
                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex align-items-center justify-content-center sinfo">
                                <div>
                                    <h1 class="mb-0">Grade <?php echo $teacher_data["grade_id"]; ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex align-items-center justify-content-center sinfo">
                                <div>
                                    <h3 class="mb-0 ms-3"><?php echo $teacher_data["subject_name"]; ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex align-items-center justify-content-center sinfo">
                                <?php

                                $subject_name = $teacher_data["subject_name"];
                                $grade = $teacher_data["grade_id"];

                                $gradestudent_rs = Database::search("SELECT * FROM `student_has_subject`
                                INNER JOIN subject ON student_has_subject.subject_id=subject.id
                                WHERE subject.subject_name='" . $subject_name . "'
                                AND student_has_subject.grade_id='" . $grade . "'");
                                $gradestudent_num = $gradestudent_rs->num_rows;

                                ?>
                                <div class="d-flex align-items-center justify-content-center flex-column">
                                    <p class="mb-2 fw-bold fs-4">No. of Students</p>
                                    <h3 class="mb-0"><?php echo $gradestudent_num; ?></h3>
                                </div>
                                <?php

                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex align-items-center justify-content-center sinfo">
                                <i class="bi bi-cash"></i>
                                <div>
                                    <p class="mb-2 fw-bold">Total Revenue</p>
                                    <h6 class="mb-0">1234</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-6">
                            <div class="text-center p-4 chart-dash">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h6 class="mb-0">Total Users</h6>
                                    <a href="">Show All</a>
                                </div>
                                <canvas id="total-users"></canvas>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <div class="text-center p-4 chart-dash">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h6 class="mb-0">Salse & Revenue</h6>
                                    <a href="">Show All</a>
                                </div>
                                <canvas id="salse-revenue"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid pt-4 px-4">
                    
                </div>
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
                                    <h6 class="mb-0">New Results</h6>
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