<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {
    $user_data = $_SESSION["u"]["email"];

    $user_rs = Database::search("SELECT * FROM `student_registration`
    WHERE `email`='" . $user_data . "'");

    $user_img_rs = Database::search("SELECT * FROM `student_profile_image` WHERE `student_registration_email`='" . $user_data . "'");

    $user_img_data = $user_img_rs->fetch_assoc();
    $student_data = $user_rs->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Students Lesson Notes</title>
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
                            if (empty($user_img_data["path"])) {
                            ?>
                                <img class="rounded-circle" src="assets/images/teacherimg.svg" alt="" style="width: 40px; height: 40px;">
                            <?php
                            } else {
                            ?>
                                <img class="rounded-circle" src="<?php echo $user_img_data["path"]; ?>" alt="" style="width: 40px; height: 40px;">
                            <?php
                            }
                            ?>
                            <div class="bg-success rounded-circle border border-1 border-white position-absolute end-0 bottom-0 p-1"></div>
                        </div>
                        <div class="ms-4 text-white">
                            <h6 class="mb-0"><?php echo $student_data["first_name"] . " " . $student_data["last_name"]; ?></h6>
                            <span>Student</span>
                        </div>
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="studentPanel.php" class="nav-item nav-link"><i class="fa-solid fa-chart-line me-2"></i>Dashboard</a>
                        <a href="studentAssingments.php" class="nav-item nav-link "><i class="fa-solid fa-chalkboard-user me-2"></i>Assingments</a>
                        <a href="studentLessons.php" class="nav-item nav-link active"><i class="fa-solid fa-square-poll-vertical me-2"></i>Lessons</a>
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
                                if (empty($user_img_data["path"])) {
                                ?>
                                    <img class="rounded-circle" src="assets/images/teacherimg.svg" alt="" style="width: 40px; height: 40px;">
                                <?php
                                } else {
                                ?>
                                    <img class="rounded-circle" src="<?php echo $user_img_data["path"]; ?>" alt="" style="width: 40px; height: 40px;">
                                <?php
                                }
                                ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" style="width: 100px;">
                                <a href="updateStudent.php" class="dropdown-item">My Profile</a>
                                <a href="#" class="dropdown-item">Settings</a>
                                <a href="#" class="dropdown-item" onclick="studentLogOut();">Log Out</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="container-fluid pt-4 px-4">
                    <?php

                    if (isset($_GET["id"])) {

                        $subject_id = $_GET["id"];

                        $grade_id = $student_data["grade_id"];

                        if ($grade_id) {

                            $lesson_rs = Database::search("SELECT * FROM `lessons`
                            INNER JOIN subject ON lessons.subject_id=subject.id
                            WHERE subject.id='" . $subject_id . "'
                            AND lessons.grade_id='" . $grade_id . "'");
                            $lesson_num = $lesson_rs->num_rows;

                            for ($x = 0; $x < $lesson_num; $x++) {
                                $lesson_data = $lesson_rs->fetch_assoc();

                    ?>
                                <div class="grade-result-box">
                                    <div class="col-12 row">
                                        <div class="col-10">
                                            <p><?php echo $lesson_data["subject_name"]; ?></p>
                                        </div>
                                        <div class="col-2">
                                            <a href="#" class="btn btn-primary col-12" onclick="ViewAssingments();">View Notes</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal1 -->
                                <div class="modal" tabindex="-1" id="downloadAssingmentModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Lesson Notes</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12 ms-2 p-0">
                                                    <?php

                                                    $lesson_id = $lesson_data["lesson_id"];

                                                    $view_lesson_rs = Database::search("SELECT * FROM `lesson_notes`
                                                    WHERE `lessons_id`='" . $lesson_id . "'");
                                                    $view_lesson_num = $view_lesson_rs->num_rows;

                                                    for ($q = 0; $q < $view_lesson_num; $q++) {
                                                        $view_lesson_data = $view_lesson_rs->fetch_assoc();

                                                    ?>
                                                        <div class="col-12 border row p-0 rounded bg-warning">
                                                            <div class="col-12 row">
                                                                <div class="col-9 pt-3">
                                                                    <p class="fs-4"><?php echo $view_lesson_data["file_name"]; ?></p>
                                                                </div>
                                                                <div class="col-3 pt-2">
                                                                    <button class="btn btn-primary" onclick="viewLessons();">View</button>
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
                                </div>
                                <!-- Modal1 -->
                                <!-- Modal2 -->
                                <div class="modal" tabindex="-1" id="viewLessonModel">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"><?php echo $view_lesson_data["file_name"]; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12 ms-2 p-0">
                                                    <div class="modal-body">
                                                        <iframe src="<?php echo $view_lesson_data["path"]; ?>" width="100%" height="500px"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal2 -->
                    <?php
                            }
                        } else {
                            echo ("Something Went Wrong. Please Try Again Later");
                        }
                    } else {
                        echo ("Please try Again Later");
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

?>