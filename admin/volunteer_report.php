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
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contact</th>
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
                                            <td><a class="text-success" href="" data-bs-toggle="modal" data-bs-target="#volunteerReport<?php echo $row['id'] ?>"><b><?php echo $row['name'] ?></b></a> </td>
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
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['contact'] ?></td>
                                        </tr>

                                        <!-- Volunteer Report-->
                                        <div class="modal modal-xl fade" id="volunteerReport<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="addcategory"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-success">
                                                        <h5 class=" modal-title text-white">Volunteer Report</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="card-body p-3">
                                                        <ul class="nav nav-tabs " id="myTab" role="tablist">
                                                            <li class="nav-item" role="report">
                                                                <button class="nav-link active" id="reports-tab" data-bs-toggle="tab" data-bs-target="#reports<?php echo $row['id'] ?>" type="button" role="tab" aria-controls="reports" aria-selected="true">Reports</button>
                                                            </li>
                                                            <li class="nav-item" role="report">
                                                                <button class="nav-link" id="tickets-tab" data-bs-toggle="tab" data-bs-target="#tickets<?php echo $row['id'] ?>" type="button" role="tab" aria-controls="tickets" aria-selected="false">Tickets</button>
                                                            </li>
                                                            <li class="nav-item" role="report">
                                                                <button class="nav-link" id="agenda-tab" data-bs-toggle="tab" data-bs-target="#agenda<?php echo $row['id'] ?>" type="button" role="tab" aria-controls="agenda" aria-selected="false">Agenda</button>
                                                            </li>
                                                        
                                                        </ul>
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="tab-pane fade show active p-3" id="reports<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="main-tab">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <h5>Name: <b><?php echo $row['name'] ?></b></h5>
                                                                        <h5 class="mt-3">Username: <b><?php echo $row['username'] ?></b></h5>
                                                                        <h5 class="mt-3">Email: <b><?php echo $row['email'] ?></b></h5>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <h5 class="">Contact: <b><?php echo $row['contact'] ?></b></h5>
                                                                        <h5 class="mt-3">Date Joined:  <b><?php echo $row['date_joined'] ?></b></h5>
                                                                        <h5 class="mt-3">Status:
                                                                        <?php 
                                                                            if($row['status'] == 'Verified'){
                                                                                ?>
                                                                                <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-0 px-2 text-capitalize"
                                                                                    role="alert">
                                                                                    <?php echo $row['status']; ?>
                                                                                </div>
                                                                            <?php
                                                                            }else{
                                                                                ?>
                                                                                <div class="alert alert-danger rounded-pill d-inline-flex align-items-center py-0 px-2 text-capitalize"
                                                                                    role="alert">
                                                                                    <?php echo $row['status']; ?>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                        ?>
                                                                        </h5>
                                                             
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <h5 class="text-center">Availability:</h5>
                                                                        <div id="progress-bar-container<?php echo $row['id'] ?>"
                                                                            style="position: relative;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--INCLUDED SCRIPT FOR PROGRESS CHART--->
                                                                <script src="https://cdn.jsdelivr.net/npm/progressbar.js@1.1.0/dist/progressbar.min.js"></script>
                                                                <script>
                                                                var progressBar = new ProgressBar.Circle('#progress-bar-container<?php echo $row['id'] ?>', {
                                                                    strokeWidth: 6,
                                                                    easing: 'easeInOut',
                                                                    duration: 1400,
                                                                    color: '#4caf50',
                                                                    trailColor: '#f3f3f3',
                                                                    trailWidth: 6,
                                                                    svgStyle: {
                                                                        // Center align the progress percentage text
                                                                        transform: 'translateX(-50%) translateY(00%)',
                                                                        width: '180px', //size of the circle
                                                                        height: '180px', //size of the circle
                                                                        position: 'relative',
                                                                        left: '50%',
                                                                        top: '50%'
                                                                    },
                                                                    text: {
                                                                        value: 'Plan Progress: 70%', // Initial value of the progress text
                                                                        className: 'progressbar-text', // CSS class for the progress text
                                                                        autoStyleContainer: false, // Disable automatic styling of the text container
                                                                        style: {
                                                                            position: 'absolute',
                                                                            left: '30%',
                                                                            right: '20%',
                                                                            top: '42%',
                                                                            padding: 0,
                                                                            margin: 0,
                                                                            fontSize: '1.0rem',
                                                                            fontWeight: 'bold',
                                                                            color: '#000'
                                                                        }
                                                                    }
                                                                });

                                                                // Set the initial progress value
                                                                progressBar.animate(0.5); // Example: 50% progress
                                                                </script>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <?php 
                                                                            $volunteer_id = $row['id'];

                                                                            $yourTicketCount = 0;
                                                                            $assignedTaskCount = 0;
                                                                            $inReviewCount = 0;
                                                                            $urgentCount = 0;
                                                                            $toDoCount = 0;
                                                                            $revisionsCount = 0;
                                                                            $completedCount = 0;

                                                                            $queryCheck1 = "SELECT * FROM tickets";
                                                                            $resultCheck1 = mysqli_query($conn, $queryCheck1);
                                                                            while ($rowCheck1 = mysqli_fetch_array($resultCheck1)) {
                                                                                $ticket_volunteers_ids1 = explode(',', $rowCheck1['ticket_volunteers_id']);
                                                                                if (in_array($volunteer_id, $ticket_volunteers_ids1)) {
                                                                                    $assignedTaskCount++;

                                                                                    // Check for each status
                                                                                    switch ($rowCheck1['ticket_status']) {
                                                                                        case 'Your-ticket':
                                                                                            $yourTicketCount++;
                                                                                            break;
                                                                                        case 'In-Review':
                                                                                            $inReviewCount++;
                                                                                            break;
                                                                                        case 'Urgent':
                                                                                            $urgentCount++;
                                                                                            break;
                                                                                        case 'To-Do':
                                                                                            $toDoCount++;
                                                                                            break;
                                                                                        case 'Revision':
                                                                                            $revisionsCount++;
                                                                                            break;
                                                                                        case 'Completed':
                                                                                            $completedCount++;
                                                                                            break;
                                                                                    }
                                                                                }
                                                                            }

                                                                            echo '<h5>Your-tickets: ' . $yourTicketCount . '</h5>';
                                                                            echo '<h5>In-Review: ' . $inReviewCount . '</h5>';
                                                                            echo '<h5>Urgent: ' . $urgentCount . '</h5>';
                                                                        ?>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <?php 
                                                                          echo '<h5>To-Do: ' . $toDoCount . '</h5>';
                                                                          echo '<h5>Revisions: ' . $revisionsCount . '</h5>';
                                                                          echo '<h5>Completed: ' . $completedCount . '</h5>';
                                                                        ?>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <h5 class="text-center">Intensity Points:</h5>
                                                                        <div class="progress mt-3">
                                                                            <div class="progress-bar bg-success w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h5>Skill Tags:</h5>
                                                                        <?php
                                                                            $vl_id = $row['id'];
                                                                            $retrieve_skills = "SELECT * FROM volunteer_skills WHERE volunteer_id = '$vl_id'";
                                                                            $query_retrieve = mysqli_query($conn, $retrieve_skills);
                                                                            while ($rtags = mysqli_fetch_array($query_retrieve)) {
                                                                        ?>
                                                                        <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-0 px-2 text-capitalize"
                                                                            role="alert">
                                                                            <?php echo $rtags['tag_name']; ?>
                                                                        </div>
                                                                        <?php 
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade p-3" id="tickets<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="comments-tab">
                                                                <div class="row">
                                                                    <div class="col-sm-2">
                                                                        <h5 class="text-success">Your-tickets</h5>
                                                                        <div class="card bg-danger text-white mb-4">
                                                                            <div class="card-body">
                                                                                <h5><?php echo $row['ticket_title'] ?></h5>
                                                                            </div>
                                                                            <div class="card-footer text-center">
                                                                                <h6><a class="text-white" style="text-decoration:none" href="" data-bs-toggle="modal" data-bs-target="#detTicket4<?php echo $row['id'] ?>">View</a></h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <h5 class="text-primary">To-Do</h5>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <h5 class="text-secondary">Revisions</h5>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <h5 class="text-warning">In-Review</h5>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <h5 class="text-danger">Urgent</h5>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade p-3" id="agenda<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="comments-tab">
                                                                <h5>qqqqqqq</h5>
                                                            </div>
                                                        </div>
                                                   </div>
                                                   <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>

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