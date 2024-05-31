<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Volunteer Report - Volunteer Management Strageties</title>
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

              
                <table class="table" id="tb">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Volunteer Intensity</th>
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
                                <td>
                            
                                <?php 
                                    // VOLUNTEER INTENSITY LOGIC
                                    $volunteer_id = $row['id'];

                                    $querySVol = "SELECT * FROM tickets WHERE ticket_volunteers_id LIKE '%, $volunteer_id, %' 
                                                OR ticket_volunteers_id LIKE '$volunteer_id, %' 
                                                OR ticket_volunteers_id LIKE '%, $volunteer_id' 
                                                OR ticket_volunteers_id = '$volunteer_id' AND ticket_status != 'Completed' ";

                                    $resultSVol = mysqli_query($conn, $querySVol);

                                    $ask_tickets_count = 0; // Initialize the counter for "ask" tickets
                                    $total_comment_value = 0; // Initialize the total comment value
                                    $monthly_intensity = []; // Initialize an array to store monthly intensity
                                    $monthly_ticket_count = []; // Initialize an array to store the count of tickets processed in each month

                                    // Define the priority mapping
                                    $priority_mapping = [
                                        'urgent' => 4,
                                        'high' => 3,
                                        'mid' => 2,
                                        'low' => 1
                                    ];

                                    if ($resultSVol) {
                                        while ($ticket = mysqli_fetch_assoc($resultSVol)) {
                                            $ticket_id = $ticket['id'];
                                            $ticket_priority = strtolower($ticket['ticket_priority']); // Make sure to handle case-insensitivity
                                            $ticket_ask = strtolower($ticket['ticket_type']);
                                            $ticket_instruction = $ticket['ticket_instructions'];
                                            $ticket_date = $ticket['date_added']; // Assuming the date field is 'date_added'

                                            // Get the month of the ticket
                                            $ticket_month = date('Y-m', strtotime($ticket_date));

                                            // Get the numeric priority value
                                            $priority_value = isset($priority_mapping[$ticket_priority]) ? $priority_mapping[$ticket_priority] : 0;

                                            // Output the ticket details
                                            // echo "Priority: $ticket_priority ($priority_value)<br>";
                                            // echo "Type: $ticket_ask<br>";
                                            // echo "Instructions: $ticket_instruction<br>";

                                            // Count the number of instructions
                                            if (!empty($ticket_instruction)) {
                                                $instructions_array = array_filter(explode(',', $ticket_instruction));
                                                $instructions_count = count($instructions_array);
                                            } else {
                                                $instructions_count = 0;
                                            }

                                            // echo "Number of instructions: $instructions_count<br>";

                                            // Increment the ask tickets counter if the type is "ask"
                                            if ($ticket_ask == 'ask') {
                                                $ask_tickets_count++;
                                            }

                                            // Query to count the comments for the current ticket
                                            $q = "SELECT COUNT(*) as comment_count FROM comments WHERE ticket_id = '$ticket_id'";
                                            $r = mysqli_query($conn, $q);

                                            if ($r) {
                                                $comment_data = mysqli_fetch_assoc($r);
                                                $comment_count = $comment_data['comment_count'];
                                            } else {
                                                $comment_count = 0; // Default to 0 if the query fails
                                            }

                                            // Calculate the comment value for the current ticket
                                            $comment_value = $comment_count * 0.2;

                                            // Calculate the intensity for the current ticket
                                            $intensity = $priority_value + $comment_value + $instructions_count;
                                            if ($ticket_ask == 'ask') {
                                                $intensity += 1; // Add 1 for each "ask" ticket
                                            }

                                            // Add the intensity to the corresponding month
                                            if (!isset($monthly_intensity[$ticket_month])) {
                                                $monthly_intensity[$ticket_month] = 0;
                                                $monthly_ticket_count[$ticket_month] = 0;
                                            }
                                            $monthly_intensity[$ticket_month] += $intensity;
                                            $monthly_ticket_count[$ticket_month]++;

                                            // Output the ticket title with the number of comments and the comment value
                                            // echo "<ul><li>{$ticket['ticket_title']} (Comments: $comment_count, Comment Value: $comment_value, Intensity: $intensity)</li></ul>";
                                        }

                                        // Output the total count of "ask" tickets
                                        // echo "Total number of 'ask' tickets: $ask_tickets_count<br>";
                                        // Output the total comment value
                                        // echo "Total comment value: $total_comment_value<br>";

                                        // Output the monthly intensity and calculate average intensity
                                        foreach ($monthly_intensity as $month => $intensity) {
                                            $average_intensity = $monthly_ticket_count[$month] > 0 ? $intensity / $monthly_ticket_count[$month] : 0;
                                            // echo "Month: $month, Total Intensity: $intensity, Average Intensity: $average_intensity<br>";
                                            ?>
                                            <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar bg-success" style="width: <?php echo $intensity; ?>%"><?php echo $intensity; ?>%</div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        echo "Error: " . mysqli_error($conn);
                                    }
                                ?>

                                </td>
                            </tr>
                            <!-- Volunteer Report-->
                            <div class="modal modal-xl fade" id="volunteerReport<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="addcategory"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-success">
                                            <h6 class=" modal-title text-white">Volunteer Report</h6>
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
                                                            <h6>Name: <b><?php echo $row['name'] ?></b></h6>
                                                            <h6 class="mt-3">Username: <b><?php echo $row['username'] ?></b></h6>
                                                            <h6 class="mt-3">Email: <b><?php echo $row['email'] ?></b></h6>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6 class="">Contact: <b><?php echo $row['contact'] ?></b></h6>
                                                            <h6 class="mt-3">Date Joined:  <b><?php echo $row['date_joined'] ?></b></h6>
                                                            <h6 class="mt-3">Status:
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
                                                            </h6>
                                                    
                                                        </div>
                                                        <!-- <div class="col-md-4">
                                                            <h6 class="text-center">Availability:</h6>
                                                            <div id="progress-bar-container<?php echo $row['id'] ?>"
                                                                style="position: relative;">
                                                            </div>
                                                        </div> -->
                                                        <div class="col-md-4">
                                                            <h6 class="text-center">Intensity Points:</h6>
                                                            <?php 
                                                                foreach ($monthly_intensity as $month => $intensity) {
                                                                    $average_intensity = $monthly_ticket_count[$month] > 0 ? $intensity / $monthly_ticket_count[$month] : 0;
                                                                    ?>
                                                                    <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar bg-success" style="width: <?php echo $intensity; ?>%"><?php echo $intensity; ?>%</div>
                                                                    </div>
                                                                    <?php
                                                                }
                                                            ?>
                                                            <h6 class="text-center mt-3">Average Monthly Intensity Points:</h6>
                                                            <?php 
                                                                foreach ($monthly_intensity as $month => $intensity) {
                                                                    $average_intensity = $monthly_ticket_count[$month] > 0 ? $intensity / $monthly_ticket_count[$month] : 0;
                                                                    ?>
                                                                    <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar bg-success" style="width: <?php echo $average_intensity; ?>%"><?php echo $average_intensity; ?>%</div>
                                                                    </div>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>

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

                                                                echo '<h6>Your-tickets: ' . $yourTicketCount . '</h6>';
                                                                echo '<h6>In-Review: ' . $inReviewCount . '</h6>';
                                                                echo '<h6>Urgent: ' . $urgentCount . '</h6>';
                                                            ?>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <?php 
                                                                echo '<h6>To-Do: ' . $toDoCount . '</h6>';
                                                                echo '<h6>Revisions: ' . $revisionsCount . '</h6>';
                                                                echo '<h6>Completed: ' . $completedCount . '</h6>';
                                                            ?>
                                                        </div>

                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6>Skill Tags:</h6>
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
                                                    <div style="max-height: 500px; overflow-y: auto;">
                                                        <div class="row">
                                                            <!-- <div class="col-sm-3">
                                                                <h6 class="text-success text-center">Your-tickets</h6>
                                                                <?php 
                                                                    $vlReport = "SELECT * FROM tickets WHERE ticket_status = 'Your-ticket'";
                                
                                                                    $rvlReport = mysqli_query($conn, $vlReport);
                                                                    while ($rowVl = mysqli_fetch_array($rvlReport)) {
                                                                        $ticket_volunteers_ids2 = explode(',', $rowVl['ticket_volunteers_id']);
                                                                        if (in_array($volunteer_id, $ticket_volunteers_ids2)) {
                                                                ?>
                                                                <div class="card bg-success text-white mb-4">
                                                                    <div class="card-body">
                                                                        <h6><?php echo $rowVl['ticket_title']; ?></h6>
                                                                        <hr>
                                                                        <h6><?php echo $rowVl['ticket_desc']; ?></h6>
                                                                    </div>
                                                                </div>
                                                                <?php 
                                                                    }
                                                                } 
                                                                ?>
                                                            </div> -->
                                                            <div class="col-sm-3">
                                                                <h6 class="text-primary text-center">To-Do</h6>
                                                                <?php 
                                                                    $vlReport = "SELECT * FROM tickets WHERE ticket_status = 'To-Do'";
                                
                                                                    $rvlReport = mysqli_query($conn, $vlReport);
                                                                    while ($rowVl = mysqli_fetch_array($rvlReport)) {
                                                                        $ticket_volunteers_ids2 = explode(',', $rowVl['ticket_volunteers_id']);
                                                                        if (in_array($volunteer_id, $ticket_volunteers_ids2)) {
                                                                ?>
                                                                <div class="card bg-primary text-white mb-4">
                                                                    <div class="card-body">
                                                                        <h6><?php echo $rowVl['ticket_title']; ?></h6>
                                                                        <hr>
                                                                        <h6><?php echo $rowVl['ticket_desc']; ?></h6>
                                                                    </div>
                                                                </div>
                                                                <?php 
                                                                    }
                                                                } 
                                                                ?>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <h6 class="text-secondary text-center">Revisions</h6>
                                                                <?php 
                                                                    $vlReport = "SELECT * FROM tickets WHERE ticket_status = 'Revision'";
                                
                                                                    $rvlReport = mysqli_query($conn, $vlReport);
                                                                    while ($rowVl = mysqli_fetch_array($rvlReport)) {
                                                                        $ticket_volunteers_ids2 = explode(',', $rowVl['ticket_volunteers_id']);
                                                                        if (in_array($volunteer_id, $ticket_volunteers_ids2)) {
                                                                ?>
                                                                <div class="card bg-secondary text-white mb-4">
                                                                    <div class="card-body">
                                                                        <h6><?php echo $rowVl['ticket_title']; ?></h6>
                                                                        <hr>
                                                                        <h6><?php echo $rowVl['ticket_desc']; ?></h6>
                                                                    </div>
                                                                </div>
                                                                <?php 
                                                                    }
                                                                } 
                                                                ?>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <h6 class="text-warning text-center">In-Review</h6>
                                                                <?php 
                                                                    $vlReport = "SELECT * FROM tickets WHERE ticket_status = 'In-Review'";
                                
                                                                    $rvlReport = mysqli_query($conn, $vlReport);
                                                                    while ($rowVl = mysqli_fetch_array($rvlReport)) {
                                                                        $ticket_volunteers_ids2 = explode(',', $rowVl['ticket_volunteers_id']);
                                                                        if (in_array($volunteer_id, $ticket_volunteers_ids2)) {
                                                                ?>
                                                                <div class="card bg-warning text-white mb-4">
                                                                    <div class="card-body">
                                                                        <h6><?php echo $rowVl['ticket_title']; ?></h6>
                                                                        <hr>
                                                                        <h6><?php echo $rowVl['ticket_desc']; ?></h6>
                                                                    </div>
                                                                </div>
                                                                <?php 
                                                                    }
                                                                } 
                                                                ?>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <h6 class="text-danger text-center">Urgent</h6>
                                                                <?php 
                                                                    $vlReport = "SELECT * FROM tickets WHERE ticket_status = 'Urgent'";
                                
                                                                    $rvlReport = mysqli_query($conn, $vlReport);
                                                                    while ($rowVl = mysqli_fetch_array($rvlReport)) {
                                                                        $ticket_volunteers_ids2 = explode(',', $rowVl['ticket_volunteers_id']);
                                                                        if (in_array($volunteer_id, $ticket_volunteers_ids2)) {
                                                                ?>
                                                                <div class="card bg-danger text-white mb-4">
                                                                    <div class="card-body">
                                                                        <h6><?php echo $rowVl['ticket_title']; ?></h6>
                                                                        <hr>
                                                                        <h6><?php echo $rowVl['ticket_desc']; ?></h6>
                                                                    </div>
                                                                </div>
                                                                <?php 
                                                                    }
                                                                } 
                                                                ?>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="tab-pane fade p-3" id="agenda<?php echo $row['id'] ?>">
                                                    <div style="max-height: 500px; overflow-y: auto;">
                                                    <button class="btn btn-secondary" onclick="sortCards()">Sort <i class="fa-solid fa-sort"></i></button>

                                                        <?php 
                                                            $queryTicket = "SELECT * FROM personal_agenda WHERE volunteer_id = '$volunteer_id'";
                                                            $resulTicket = mysqli_query($conn, $queryTicket);
                                                            while ($rows = mysqli_fetch_array($resulTicket)) {
                                                        ?>
                                                        <div id="cards-container">
                                                        <div class="card bg-dark text-white mb-4 mt-3" data-date-created="<?php echo $rows['date_created']; ?>">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-8 text-left">
                                                                        <h6>Title: <b><?php echo $rows['title'] ?></b></h6>
                                                                    </div>
                                                                    <div class="col-md-4 text-right">
                                                                        <h6>Startdate: <?php echo date('h:i:s A', strtotime($rows['startdate'])); ?></h6>
                                                                        <h6>Enddate: <?php echo date('h:i:s A', strtotime($rows['enddate'])); ?></h6>
                                                                    </div>
                                                                </div>

                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-8 text-left">
                                                                        <h6>Description: <br> <b><?php echo $rows['description'] ?></b></h6>
                                                                    </div>
                                                                    <div class="col-md-4 text-right">
                                                                        <h6>Date Created: <?php echo $rows['date_created'] ?></h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <script>
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                let ascending = true;

                                                                function sortCards() {
                                                                    const container = document.getElementById('cards-container');
                                                                    const cards = Array.from(container.querySelectorAll('.card[data-date-created]'));
                                                                    
                                                                    cards.sort((a, b) => {
                                                                        const dateA = new Date(a.getAttribute('data-date-created'));
                                                                        const dateB = new Date(b.getAttribute('data-date-created'));
                                                                        return ascending ? dateA - dateB : dateB - dateA;
                                                                    });

                                                                    // Toggle the sorting order for next click
                                                                    ascending = !ascending;

                                                                    // Re-append sorted cards to the container
                                                                    cards.forEach(card => container.appendChild(card));
                                                                }

                                                                window.sortCards = sortCards; // Expose sortCards to the global scope so the button can access it
                                                            });
                                                        </script>
                                                        <?php } ?>
                                                        </div>


                                                    </div>
                                                    
                                                </div>
                                            </div>
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
            </main>

            <?php include('./include/footer.php') ?>

        </div>
    </div>

    <?php include('./include/scripts.php') ?>
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

</body>

</html>