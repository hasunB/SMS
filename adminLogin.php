<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
                    <div class="col-12  signin" id="signInBox">
                        <h1 class="fw-bold">Admin LogIn</h1>
                        <div class="form-floating col-lg-12 col-10 col-md-12 ms-4 ms-lg-0 ms-md-0">
                            <input type="email" class="form-control" placeholder="name@example.com" id="admine">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mt-3 col-lg-12 col-10 col-md-12 ms-4 ms-lg-0 ms-md-0">
                            <input type="password" class="form-control" placeholder="Password" id="adminpw">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <a href="#" class="link-light mb-3" onclick="forgotPassword();">Forgot Password</a>
                        <button type="submit" onclick="adminSignIn();">Log In</button>
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