<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>My Account - Volunteer Management Strageties</title>
</head>


<body class="sb-nav-fixed">

    <?php include('./include/nav.php') ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="mt-3"></div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-table-cells-large"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="set_event.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-days"></i></div>
                            Set Event
                        </a>

                        <a class="nav-link" href="team_work_flow.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                            Team Work Flow
                        </a>

                        <a class="nav-link" href="team_dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                            Team Dashboard
                        </a>
                        
                        <!-- <a class="nav-link" href="event_plan.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-week"></i></div>
                            Event Plan
                        </a> -->

                        <a class="nav-link" href="skill_tag.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-tag"></i></div>
                            Skill Tag
                        </a>

                        <a class="nav-link" href="guest_sponsors.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-people-group"></i></div>
                            Guest / Sponsors
                        </a>

                        <a class="nav-link" href="task_backlog.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-list-check"></i></div>
                            Task Backlog
                        </a>

                        <!-- <a class="nav-link" href="templates.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard"></i></div>
                            Templates
                        </a> -->

                        <a class="nav-link" href="accounts.php">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-user"></i></div>
                            Accounts
                        </a>
                        
                        <a class="nav-link active" href="my_account.php">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-id-card"></i></div>
                            My Account
                        </a>

                        <a class="nav-link" href="volunteer_report.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-book-bookmark"></i></div>
                            Volunteer Report
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="row">
                        <div class="col-md-6 left-side">
                            <h4 class="mt-4"><b>My Account</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="currentDate"></span> </h4>
                        </div>
                    </div>
                    <div class="mt-3">
                        <?php 
                            error_reporting(0);
                            if ($_SESSION['admin']['id']){
                                $sesId = $_SESSION['admin']['id'];
                            }else{
                                $sesId = $_SESSION['superadmin']['id'];
                            }
                            $query = "SELECT * FROM accounts WHERE `id`='$sesId'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="card p-4">
                            <div class="row">
                                <div class="col-md-9">
                                        <h5><b>Name:</b> <?php echo $row['name'] ?></h5>
                                        <h5><b>Date Joined:</b> <?php echo $row['date_joined'] ?></h5>
                                        <h5><b>Account Type: </b>
                                            <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-0 px-2 text-capitalize"
                                                role="alert">
                                                <?php echo $row['type'] ?>
                                            </div>
                                        </h5>
                                </div>
                                <div class="col-md-3 text-center">
                                    <div id="progress-bar-container"
                                        style="position: relative;">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-9">
                                    <h5><b>Contacts:</b></h5>
                                    <h5>
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateEmail<?php echo $row['id'] ?>">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        Email: <b><?php echo $row['email'] ?></b>
                                    </h5>

                                    <!-- Update Email -->
                                    <div class="modal fade" id="updateEmail<?php echo $row['id'] ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h5 class="modal-title" id="">Update Email</h5>
                                                </div>
                                                <form action="./include/process.php" method="POST">
                                                    <div class="modal-body">
                                                        <label for=""><b>Email:</b> </label>
                                                        <input type="email" class="form-control" name="updt_email" placeholder="Enter your new email" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="update_id" value="<?php echo $row['id'] ?>">
                                                        <button type="submit" name="update_email" class="btn btn-primary w-100">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <h5>
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateNumber<?php echo $row['id'] ?>">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        Phone Number: <b><?php echo $row['contact'] ?></b>
                                    </h5>

                                    <!-- Update Contact  -->
                                    <div class="modal fade" id="updateNumber<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h5 class="modal-title" id="">Update Contact Number</h5>
                                                </div>
                                                <form action="./include/process.php" method="POST">
                                                    <div class="modal-body">
                                                        <label for=""><b>Contact Number:</b> </label>
                                                        <input type="text" class="form-control" placeholder="Enter your new contact number" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="update_id" value="<?php echo $row['id'] ?>">
                                                        <button type="submit" name="update_number" class="btn btn-primary w-100">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <p>Average Online Time: <b>2 Hr/s per day</b></p>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-sm btn-success w-50" data-toggle="modal" data-target="#addSkills">
                                            Add Skills <i class="fa-solid fa-plus"></i>
                                        </button>
                                        <h6 class="mt-3">Skills:</h6>
                                    </div>
                                    <div style="max-height: 200px; overflow-y: auto;">
                                        <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-0 px-2 text-capitalize"
                                            role="alert">
                                            Skill 1 Sample
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
            </main>

            <?php include('./include/footer.php') ?>

        </div>
    </div>

    <?php include('./include/scripts.php') ?>
    <!--INCLUDED SCRIPT FOR PROGRESS CHART--->
    <script src="https://cdn.jsdelivr.net/npm/progressbar.js@1.1.0/dist/progressbar.min.js"></script>
    <script>
    var progressBar = new ProgressBar.Circle('#progress-bar-container', {
        strokeWidth: 6,
        easing: 'easeInOut',
        duration: 1400,
        color: '#4caf50',
        trailColor: '#f3f3f3',
        trailWidth: 6,
        svgStyle: {
            // Center align the progress percentage text
            transform: 'translateX(-40%) translateY(00%)', //position of the circle
            width: '160px', //size of the circle
            height: '160px', //size of the circle
            position: 'relative',
            left: '27%', //it works like padding/margin
            top: '0%', //it works like padding/margin
        },
        text: {
            value: 'Intensity Points: 70%', // Initial value of the progress text at the middle of the circle
            className: 'progressbar-text', // CSS class for the progress text
            autoStyleContainer: false, // Disable automatic styling of the text container
            style: {
                position: 'absolute',
                left: '30%', //it works like padding
                right: '20%', //it works like padding/margin
                top: '40%', //it works like padding/margin
                padding: 0,
                margin: 0,
                fontSize: '0.8rem',
                fontWeight: 'bold',
                color: '#000'
            }
        }
    });
    // Set the initial progress value
    progressBar.animate(0.7); // Example: 70% progress
    </script>
    </script>
</body>

</html>