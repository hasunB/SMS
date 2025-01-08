<?php

session_start();

require "connection.php";

if (isset($_GET["id"])) {


    if (isset($_SESSION["ad"])) {
        $ad_data = $_SESSION["ad"]["email"];

        $grade_id = $_GET["id"];

        $admin_img_rs = Database::search("SELECT * FROM `admin_profile_img` WHERE `admin_email`='" . $ad_data . "'");

        $admin_img_data = $admin_img_rs->fetch_assoc();
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <title>Students Results | Subjects</title>
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
                            <a href="manageTeachers.php" class="nav-item nav-link"><i class="fa-solid fa-chalkboard-user me-2"></i>Teachers</a>
                            <a href="manageStudents.php" class="nav-item nav-link"><i class="fa-solid fa-square-poll-vertical me-2"></i>Students</a>
                            <a href="manageAO.php" class="nav-item nav-link" style="font-size: 15px;"><i class="fa-solid fa-square-poll-vertical me-2"></i>Academic Officers</a>
                            <a href="results.php" class="nav-item nav-link active"><i class="fa-solid fa-square-poll-vertical me-2"></i>Results</a>
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
                                    <a href="updateAdminProfile.php" class="dropdown-item">My Profile</a>
                                    <a href="#" class="dropdown-item">Settings</a>
                                    <a href="#" class="dropdown-item" onclick="adminLogOut();">Log Out</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <div class="container-fluid pt-4 px-4">
                        <?php

                        if ($grade_id) {

                            $student_subject_rs = Database::search("SELECT * FROM `subject_has_grade` INNER JOIN `grade`
                            ON subject_has_grade.grade_id=grade.id INNER JOIN `subject`
                            ON subject_has_grade.subject_id=subject.id WHERE `grade_id`='" . $grade_id . "'");
                            $student_subject_num = $student_subject_rs->num_rows;

                            for ($x = 0; $x < $student_subject_num; $x++) {
                                $student_subject_data = $student_subject_rs->fetch_assoc();

                        ?>
                                <div class="grade-result-box">
                                    <div class="col-12 row">
                                        <div class="col-10">
                                            <p><?php echo $student_subject_data["subject_name"]; ?></p>
                                        </div>
                                        <div class="col-2">
                                            <a href="<?php echo "studentResult.php?id=" . $student_subject_data["subject_id"]; ?>" class="btn btn-primary col-12">Details</a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo ("Something Went Wrong. Please Try Again Later");
                        }

                        ?>
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
} else {
    echo ("Something went wrong");
}

?>