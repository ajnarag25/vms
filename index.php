<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Login - Volunteer Management Strageties</title>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="custom_card shadow-2" style="border-radius: 1rem;">
                        <div class="p-2"></div>
                        <div class="card-body p-4 text-center">
                            <div class="card p-5">
                                <div class="text-center">
                                    <img src="assets/logo.png" width="100" alt="">

                                </div>
                                <form action="./functions/process.php" method="POST">
                                    <h4 class="mt-3"> <b>Login | Volunteer</b></h4>
                                    <hr>
                                    <p class="mb-3">Web based Volunteer Management Strageties of 1-Lambat Ministries
                                        Foundation International INC.</p>
                                    <div class="form-outline mb-4">
                                        <input type="text" placeholder="Username" name="username" class="form-control"
                                            required />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" placeholder="Enter Password" name="password"
                                            class="form-control" required />
                                    </div>

                                    <button class="btn btn-custom btn-sm btn-block w-50" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Login" type="submit" name="login">Login</button>

                                    <p class="mt-3">Don't have an account? <a href="register.php"
                                            class="text-success">Register</a>
                                    </p>
                                </form>
                            </div>

                        </div>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </section>

    <?php include('./include/scripts.php') ?>

</body>

</html>