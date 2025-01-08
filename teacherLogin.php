<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teacher Login</title>
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
                    <div class="col-12  student-signin" id="signInBox">
                        <?php

                        $email = "";
                        $password = "";

                        if (isset($_COOKIE["temail"])) {
                            $email = $_COOKIE["temail"]; //set email in the cookie
                        }

                        if (isset($_COOKIE["tpassword"])) {
                            $password = $_COOKIE["tpassword"]; //set password in the cookie
                        }

                        ?>
                        <h1 class="fw-bold">teacher LogIn</h1>
                        <div class="form-floating col-lg-12 col-10 col-md-12 ms-4 ms-lg-0 ms-md-0">
                            <input type="email" class="form-control" placeholder="name@example.com" id="temail" value="<?php echo $email; ?>">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mt-3 col-lg-12 col-10 col-md-12 ms-4 ms-lg-0 ms-md-0">
                            <input type="password" class="form-control" placeholder="Password" id="tpw" value="<?php echo $password; ?>">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="col-12 row p-0 mt-1 mb-1">
                            <div class="col-6">
                                <div class="form-check rememberme">
                                    <input class="form-check-input check-box" type="checkbox" value="" id="trm">
                                    <label class="check-boxlabel" for="rm">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <a href="#" class="link-warning me-0" onclick="forgotPassword();">Forgot Password</a>
                            </div>
                        </div>
                        <button class="mb-3" type="submit" onclick="teacherSignIn();">Log In</button>
                        <a href="index.php">Back to home page</a>
                    </div>
                </div>
            </div>
            <!-- content -->
        </div>

    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>