<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Volunteer Report - Volunteer Management Strageties</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        $(document).ready(function() {
            // Function to update status icon and login/logout times
            function updateStatusIcon() {
                // Loop through each table row
                $("tbody tr td#status").each(function() {
                    // status_word
                    var loginTime = $(this).find("#login-time").val(); // Get login time value
                    var logoutTime = $(this).find("#logout-time").val(); // Get logout time value
                    var statusIcon = $(this).find("#status-icon"); // Get status icon element
                    var statusword = $(this).find("#status_word");

                    // Check logout time to determine status
                    if (logoutTime === "0000-00-00 00:00:00") {
                        statusIcon.css("color", "green"); // Set status icon color to green for onlin
                        statusword.text("Online");
                    } else if (logoutTime === "") {
                        console.log("No Login status yet");
                        statusIcon.css("display", "none"); // Hide status icon
                    } else {
                        statusIcon.css("color", "gray"); // Set status icon color to gray for offline
                        statusword.text("Offline");
                    }
                });
            }

            // Call updateStatusIcon function every 5 seconds
            setInterval(updateStatusIcon, 0o0);
        });
    </script>
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

                        <a class="nav-link" href="templates.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard"></i></div>
                            Templates
                        </a>

                        <a class="nav-link" href="accounts.php">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-user"></i></div>
                            Accounts
                        </a>
                        
                        <a class="nav-link" href="my_account.php">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-id-card"></i></div>
                            My Account
                        </a>

                        <a class="nav-link active" href="volunteer_report.php">
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
                            <h4 class="mt-4"><b>Volunteer Report</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="LiveTime"></span> </h4>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-8">
                            <table class="table" id="tb">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Event</th>
                                        <th scope="col">Ticket</th>
                                    </tr>
                                </thead>
                                <!-- php for selecting account on accounts table  -->
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM accounts WHERE type!='superadmin' AND type!='admin'";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {

                                    ?>

                                        <tr>
                                            <th><?php echo $row['username'] ?></th>
                                            <!-- <i class="bi-circle-fill" style="color: green;" id="stats"> online</i> -->
                                            <td id="status">
                                                <?php
                                                $max_log_ID = NULL;
                                                $username = $row['username'];
                                                $volunteer_id = $row['id'];
                                                $status_query = "SELECT * FROM volunteer_logtime WHERE username ='$username' AND volunteer_id='$volunteer_id'";
                                                $status_result = mysqli_query($conn, $status_query);
                                                // Check if query was successful
                                                if ($status_result) {
                                                    // Loop through each row in the result set
                                                    while ($status_row = mysqli_fetch_array($status_result)) {
                                                        $username = $status_row['username'];
                                                        $volunteer_id = $status_row['volunteer_id'];
                                                        // Query to retrieve the maximum log_ID for the given username and volunteer_id
                                                        $log_query = "SELECT MAX(log_ID) AS max_log_ID FROM volunteer_logtime WHERE username ='$username' AND volunteer_id ='$volunteer_id'";
                                                        // Execute the query
                                                        $log_result = mysqli_query($conn, $log_query);
                                                        // Check if query was successful
                                                        if ($log_result) {
                                                            // Fetch the result
                                                            $log_row = mysqli_fetch_assoc($log_result);
                                                            $max_log_ID = $log_row['max_log_ID'];
                                                            // Output the maximum log_ID
                                                        } else {
                                                            // Error handling if the query fails
                                                            echo "Error in log query: " . mysqli_error($conn);
                                                        }
                                                    }
                                                } else {
                                                    // Error handling if the query fails
                                                    echo "Error in status query: " . mysqli_error($conn);
                                                }

                                                $check_logout = "SELECT * FROM volunteer_logtime WHERE `log_ID`='$max_log_ID'";
                                                $check_result = mysqli_query($conn, $check_logout);

                                                if ($check_result) {
                                                    if (mysqli_num_rows($check_result) > 0) {
                                                        // If at least one row is returned
                                                        $logout_row = mysqli_fetch_assoc($check_result);
                                                        $logout_time = $logout_row['logout_time'];
                                                        $login_time = $logout_row['login_time'];
                                                    } else {
                                                        // If no rows are returned
                                                        $login_time = NULL;
                                                        echo $login_time;
                                                        $logout_time = Null;
                                                        echo $logout_time;
                                                        echo "No Login Session Yet";
                                                    }
                                                } else {
                                                    // Error handling if the query fails

                                                    echo "Error in check_logout query: " . mysqli_error($conn);
                                                }

                                                ?>
                                                <!-- for table data of status -->
                                                <div class="status-container">
                                                    <i class="fas fa-circle" id="status-icon" style="display: inline-block; vertical-align: top;"></i>
                                                    <p id="status_word" style="display: inline-block; vertical-align: bottom;"></p>

                                                    <input type="text" id="login-time" value="<?php echo $login_time; ?>" hidden readonly>
                                                    <input type="text" id="logout-time" value="<?php echo $logout_time; ?>" hidden readonly>
                                                </div>
                                            </td>
                                            <td>2</td>
                                            <td>10</td>
                                        </tr>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>

                        <div class="col-md-4">
                            <div class="card mb-4 ">

                                <div class="card-body p-4">
                                    <div class="text-center mb-4">
                                        Volunteer Intensity:
                                        <div class="progress mt-2">
                                            <div class="progress-bar bg-success w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <h6>Completed:</h6>
                                                <h6>Assigned:</h6>
                                                <h6>Revisions:</h6>
                                            </div>
                                            <div class="col">
                                                <h6>Ave Online:</h6>
                                                <h6>Skills:</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-4">
                                        <div class="bg-dark text-white card-header text-center">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            Calendar
                                        </div>
                                        <div class="card-body p-4">
                                            <div id="bsb-calendar-1" class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap5 bsb-calendar-theme">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </main>

            <?php include('./include/footer.php') ?>

        </div>
    </div>

    <?php include('./include/scripts.php') ?>

</body>

</html>