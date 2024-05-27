<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Dashboard - Volunteer Management Strageties</title>
</head>


<body class="sb-nav-fixed">

    <?php include('./include/nav.php') ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="mt-3"></div>
                        <a class="nav-link active" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-table-cells-large"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="personal_page.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                            Personal Page
                        </a>

                        <a class="nav-link" href="team_dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                            Team Dashboard
                        </a>

                        <a class="nav-link" href="ticket_panel.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-bookmark"></i></div>
                            Ticket Panel
                        </a>

                        <a class="nav-link" href="my_account.php">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-id-card"></i></div>
                            My Account
                        </a>

                        <a class="nav-link" href="volunteer_intensity.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-table-list"></i></div>
                            Volunteer Intensity
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
                            <h4 class="mt-4"><b>Dashboard</b></h4>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Welcome Volunteer</li>
                            </ol>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="LiveTime"></span> </h4>
                        </div>
                    </div>
                    
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="card mb-4 h-100">
                                <div class="bg-success text-white card-header text-center">

                                    <a href="" class="text-white" style="text-decoration:none" data-bs-toggle="modal" data-bs-target="#announcementViewAll"> <i class="fa-solid fa-clipboard"></i> Announcements</a>
                                </div>
                                
                                <!-- View All Announcements -->
                                <div class="modal modal-lg fade" id="announcementViewAll" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success text-white">
                                                <h6 class="modal-title" id="">Announcements</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table mb-0" id="Announcements">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th scope="col">Title</th>
                                                            <th scope="col">Date & Time</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        $sql1 = "SELECT * FROM announcements ORDER BY id DESC";
                                                        $result1 = $conn->query($sql1);                              
                                                        while ($row1 = $result1->fetch_assoc()) {
                                                    ?>
                                                    <tbody class="text-center">
                                                        <tr>
                                                            <th><a href="#" style="color:black; text-decoration:none;"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#announcements<?php echo $row1['id'] ?>"><?php echo $row1['title'] ?></a>
                                                            </th>
                                                            <td><a href="#" style="color:black; text-decoration:none;"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#announcements<?php echo $row1['id'] ?>"><?php echo $row1['time'] ?></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                    <!-- Announements -->
                                                    <div class="modal fade" id="announcements<?php echo $row1['id'] ?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-dark text-white">
                                                                    <h6 class="modal-title" id="">Announement: <b><?php echo $row1['title'] ?></b> </h6>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <ul>
                                                                        <li><h6>Subject: <b><?php echo $row1['subject']; ?></b> </h6></li>
                                                                        <li><h6>Details: <br> <b><?php echo $row1['details']; ?></b> </h6></li>
                                                                        <li><h6>Date & Time: <b><?php echo $row1['time']; ?></b></h6></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                                <br>
                                <div style="max-height: 200px; overflow-y: auto;">
                                    <table class="table mb-0">
                                        <thead class="text-center">
                                            <tr>
                                                <th scope="col">Title</th>
                                                <th scope="col">Date & Time</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $sql2 = "SELECT * FROM announcements ORDER BY id DESC";
                                            $result2 = $conn->query($sql2);                              
                                            while ($row2 = $result2->fetch_assoc()) {
                                        ?>
                                        <tbody class="text-center">
                                            <tr>
                                                <th><a href="#" style="color:black; text-decoration:none;"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#announcementss<?php echo $row2['id'] ?>"><?php echo $row2['title'] ?></a>
                                                </th>
                                                <td><a href="#" style="color:black; text-decoration:none;"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#announcementss<?php echo $row2['id'] ?>"><?php echo $row2['time'] ?></a>
                                                </td>
                                            </tr>
                                        </tbody>

                                        <!-- Announements -->
                                        <div class="modal fade" id="announcementss<?php echo $row2['id'] ?>" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-dark text-white">
                                                        <h6 class="modal-title" id="">Announement: <b><?php echo $row2['title'] ?></b> </h6>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul>
                                                            <li><h6>Subject: <b><?php echo $row2['subject']; ?></b> </h6></li>
                                                            <li><h6>Details: <br> <b><?php echo $row2['details']; ?></b> </h6></li>
                                                            <li><h6>Date & Time: <b><?php echo $row2['time']; ?></b></h6></li>
                                                        </ul>
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
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 h-100">
                                <div class="bg-warning text-white card-header text-center">
                                    <i class="fa-solid fa-comments"></i>
                                    Reminders
                                </div>
                                <br>
                                <!---CONDITIONS---->
                                <?php

                                // Count how many To-Do tasks does the volunteer have
                                $volunteer_id = $_SESSION['volunteer']['id'];
                                $volunteer_count = 0;
                                $queryTodo = "SELECT * FROM tickets WHERE ticket_status = 'To-Do'";
                                $resultTodo = mysqli_query($conn, $queryTodo);

                                while ($rowTodo = mysqli_fetch_array($resultTodo)) {
                                    $ticket_volunteers_ids_todo = explode(',', $rowTodo['ticket_volunteers_id']);
                                    if (in_array($volunteer_id, $ticket_volunteers_ids_todo)) {
                                        $volunteer_count++;
                                    }
                                }

                                // Check if the volunteer has an event tomorrow
                                $queryEvent = "SELECT * FROM tickets";
                                $resultEvent = mysqli_query($conn, $queryEvent);
                                $tomorrow = (new DateTime('tomorrow'))->format('Y-m-d');
                                $hasEventTomorrow = false;
                                $dateOnlyDebug = [];

                                while ($rowEvent = mysqli_fetch_array($resultEvent)) {
                                    $ticket_volunteers_ids_event = explode(',', $rowEvent['ticket_volunteers_id']);
                                    if (in_array($volunteer_id, $ticket_volunteers_ids_event)) {
                                        $dateTime = new DateTime($rowEvent['end']);
                                        $dateOnly = $dateTime->format('Y-m-d');
                                        
                                        $dateOnlyDebug[] = $dateOnly;
                                        if ($dateOnly === $tomorrow) {
                                            $hasEventTomorrow = true;
                                            break;
                                        }
                                    }
                                }

                                // Check the status if ticket if completed then count the total
                                $queryCompleted = "SELECT * FROM tickets WHERE ticket_status = 'Completed'";
                                $resultCompleted = mysqli_query($conn, $queryCompleted);
                                $volunteer_count_completed = 0;
                                while ($rowCompleted = mysqli_fetch_array($resultCompleted)) {
                                    $ticket_volunteers_ids_completed = explode(',', $rowCompleted['ticket_volunteers_id']);
                                    if (in_array($volunteer_id, $ticket_volunteers_ids_completed)) {
                                        $volunteer_count_completed++;
                                    }
                                }

                                // Check if the volunteer have a ticket deadline that is within the week or has passed
                                $queryDeadline = "SELECT * FROM tickets WHERE ticket_status != 'Completed'";
                                $resultDeadline = mysqli_query($conn, $queryDeadline);

                                $currentDate = new DateTime(); // Current date
                                $startOfWeek = (clone $currentDate)->modify('monday this week'); // Start of the week
                                $endOfWeek = (clone $startOfWeek)->modify('sunday this week'); // End of the week

                                $reminder_deadline = '';

                                while ($rowDeadline = mysqli_fetch_array($resultDeadline)) {
                                    $ticket_volunteers_ids_deadline = explode(',', $rowDeadline['ticket_volunteers_id']);
                                    if (in_array($volunteer_id, $ticket_volunteers_ids_deadline)) {
                                        $ticketDeadline = new DateTime($rowDeadline['ticket_deadline']);
                                        $ticketTitle = $rowDeadline['ticket_title'];
                                        $ticketId = $rowDeadline['id'];
                                        
                                        // Check if the deadline is within this week
                                        if ($ticketDeadline >= $startOfWeek && $ticketDeadline <= $endOfWeek) {
                                            // Calculate days left until the deadline
                                            $daysLeft = $currentDate->diff($ticketDeadline)->days;

                                            // If needed, check if the deadline is in the past or future
                                            if ($ticketDeadline > $currentDate) {
                                                $reminder_deadline .= "<a href='' class='text-danger' style='text-decoration:none' data-bs-toggle='modal' data-bs-target='#detTicket$ticketId'>". "The ticket '$ticketTitle' has $daysLeft days left until the deadline. ".'</a>';
                                            } else {
                                                $reminder_deadline .= "<p class='text-danger'>"."The deadline for the ticket '$ticketTitle' is today or has passed. ". "</p>";
                                            }
                                        }
                                ?>
                                <!--Ticket Details-->
                                <div class="modal modal-xl fade" id="detTicket<?php echo $ticketId ?>" tabindex="-1" role="dialog" aria-labelledby="detTicket" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success text-white">
                                                <h6 class="modal-title">Ticket Details</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                </button>
                                            </div>  
                                            <div class="card-body">
                                                <ul class="nav nav-tabs " id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="main-tab" data-bs-toggle="tab" data-bs-target="#main<?php echo $rowDeadline['id'] ?>" type="button" role="tab" aria-controls="main" aria-selected="true">Main</button>
                                                    </li>
                                                    <!-- <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments<?php echo $rowDeadline['id'] ?>" type="button" role="tab" aria-controls="comments" aria-selected="false">Comments</button>
                                                    </li> -->
                                                
                                                </ul>
                                        
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active p-3" id="main<?php echo $rowDeadline['id'] ?>" role="tabpanel" aria-labelledby="main-tab">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h6 class="mt-3">Ticket Title:</h6>
                                                                        <h6 class="mt-3"><b><?php echo $rowDeadline['ticket_title'] ?></b> </h6>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mt-3">Ticket Admin: </h6>
                                                                        <h6 class="mt-3"><b><?php echo $rowDeadline['ticket_admin'] ?></b></h6>
                                                                    </div>
                                                                </div>
                                                                <h6 class="mt-3">Ticket Description: </h6>
                                                                <h6 class="mt-3"><b><?php echo $rowDeadline['ticket_desc'] ?></b></h6>
                                                                <br>
                                                                <hr>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto">
                                                                        <h6>Priority Level:</h6>
                                                                    </div>
                                                                    <div class="col">
                                                                        <?php 
                                                                        if($rowDeadline['ticket_priority'] == 'Low'){
                                                                            ?>
                                                                            <div class="alert alert-secondary d-inline-flex align-items-center py-1"
                                                                                role="alert">
                                                                                <strong>Low</strong>
                                                                            </div>
                                                                        <?php
                                                                        }elseif($rowDeadline['ticket_priority'] == 'Mid'){
                                                                            ?>
                                                                            <div class="alert alert-primary d-inline-flex align-items-center py-1"
                                                                                role="alert">
                                                                                <strong>Mid</strong>
                                                                            </div>
                                                                        <?php
                                                                        }elseif($rowDeadline['ticket_priority'] == 'High'){
                                                                            ?>
                                                                            <div class="alert alert-warning d-inline-flex align-items-center py-1"
                                                                                role="alert">
                                                                                <strong>High</strong>
                                                                            </div>
                                                                        <?php
                                                                        }else{
                                                                            ?>
                                                                            <div class="alert alert-danger d-inline-flex align-items-center py-1"
                                                                                role="alert">
                                                                                <strong>Urgent</strong>
                                                                            </div>
                                                                        <?php
                                                                        }
                                                                        
                                                                        ?>
                                                        

                                                                    </div>
                                                                </div>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto">
                                                                        <h6>Status:</h6>
                                                                    </div>
                                                                    <div class="col">
                                                                        <?php 
                                                                            if($rowDeadline['ticket_status'] == 'Your-ticket'){
                                                                            ?>
                                                                                <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-1">
                                                                                    <strong>Your-ticket</strong>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                            elseif($rowDeadline['ticket_status'] == 'To-Do'){
                                                                            ?>
                                                                                <div class="alert alert-primary rounded-pill d-inline-flex align-items-center py-1">
                                                                                    <strong>To-Do</strong>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                            elseif($rowDeadline['ticket_status'] == 'In-Review'){ 
                                                                            ?>
                                                                                <div class="alert alert-warning rounded-pill d-inline-flex align-items-center py-1">
                                                                                    <strong>In-Review</strong>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                            else{
                                                                            ?>
                                                                                <div class="alert alert-danger rounded-pill d-inline-flex align-items-center py-1">
                                                                                    <strong>Revision</strong>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                    </div>
                                                                </div>

                                                                <div style="max-height: 200px; overflow-y: auto;">
                                                                <h6><b>Additional Instructions:</b></h6>
                                                                <?php 
                                                                    $ticket_id = $rowDeadline['id'];
                                                                    $queryInstruction = "SELECT ticket_instructions FROM tickets WHERE id = $ticket_id";
                                                                    $resultInstruction = mysqli_query($conn, $queryInstruction);

                                                                    while ($instructionRow = mysqli_fetch_assoc($resultInstruction)) {
                                                                        // Get the instructions from the row
                                                                        $instructionStr = $instructionRow['ticket_instructions'];
                                                                        
                                                                        // Explode the instructions into an array
                                                                        $instructionsArray = explode(', ', $instructionStr);

                                                                        // Output each instruction in a list item
                                                                        echo '<ul>';
                                                                        foreach ($instructionsArray as $instruction) {
                                                                            echo '<li>' . $instruction . '</li>';
                                                                        }
                                                                        echo '</ul>';
                                                                    }
                                                                ?>

                                                                </div>
                                                                
                                                                <hr>
                                                                <div>
                                                                    <h6>Ticket Volunteers: </h6>

                                                                    <div class="col">
                                                                    <?php 
                                                                        $ids = $rowDeadline['ticket_volunteers_id'];
                                                                        $idsArray = explode(',', $ids);
                                                                    
                                                                        $idsString = "'" . implode("', '", $idsArray) . "'";
                                                                        
                                                                        $query_volunteer = "SELECT * FROM accounts WHERE id IN ($idsString)";
                                                                        $result_volunteer = mysqli_query($conn, $query_volunteer);
                                                                    
                                                                        while ($row_volunteer = mysqli_fetch_array($result_volunteer)) {

                                                                    ?>
                                                                        <button type="button"
                                                                            class="btn btn-dark rounded-pill d-inline-flex align-items-center py-1">
                                                                            <strong><?php echo $row_volunteer['name'] ?></strong>
                                                                        </button>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div id="progress-bar-container<?php echo $rowDeadline['id'] ?>"
                                                                    style="position: relative;">
                                                                </div>
                                                                <hr>
                                                                <h6>Ticket Type: <b><?php echo $rowDeadline['ticket_type'] ?></b> </h6>
                                                                <h6 class="mt-3">Ticket Deadline: <b class="text-danger"><?php echo $rowDeadline['ticket_deadline'] ?></b> </h6>
                                                                <div class="mt-5 text-center">
                                                                    <a href="team_dashboard.php" class="btn btn-secondary">View Tickets</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--INCLUDED SCRIPT FOR PROGRESS CHART--->
                                <script src="https://cdn.jsdelivr.net/npm/progressbar.js@1.1.0/dist/progressbar.min.js"></script>
                                <?php
                                    $ticket_event_id = $rowDeadline['event_id'];
                                    $queryPercent = "SELECT * FROM tickets WHERE event_id = '$ticket_event_id' AND ticket_type != 'Ask Ticket'";
                                    $resultPercent = mysqli_query($conn, $queryPercent);

                                    $completedCount = 0;
                                    while ($completed = mysqli_fetch_array($resultPercent)) {
                                        if ($completed['ticket_status'] == 'Completed') {
                                            $completedCount++;
                                        }
                                    }
                                    $count = mysqli_num_rows($resultPercent);

                                    $results = ($count > 0) ? ($completedCount / $count) * 100 : 0; 
                                    $formattedResult = number_format($results, 2);
                                ?>
                                <script>
                                var progressBar = new ProgressBar.Circle('#progress-bar-container<?php echo $rowDeadline['id'] ?>', {
                                    strokeWidth: 6,
                                    easing: 'easeInOut',
                                    duration: 1400,
                                    color: '#4caf50',
                                    trailColor: '#f3f3f3',
                                    trailWidth: 6,
                                    svgStyle: {
                                        // Center align the progress percentage text
                                        transform: 'translateX(-50%) translateY(00%)',
                                        width: '200px', //size of the circle
                                        height: '200px', //size of the circle
                                        position: 'relative',
                                        left: '50%',
                                        top: '50%'
                                    },
                                    text: {
                                        value: 'Event Progress: <?php echo $formattedResult ?>%', // Initial value of the progress text
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
                                progressBar.animate(<?php echo $formattedResult / 100 ?>); // Example: 50% progress
                                </script>

                                <?php } } ?>

                                <div style="max-height: 200px; overflow-y: auto;">
                                    <ul>
                                        <?php
                                            if ($volunteer_count > 0) {
                                                $prompt1 = '<a href="team_dashboard.php" class="text-warning" style="text-decoration:none">You have a total of ' . $volunteer_count . ' To-Do Task/s.</a>';
                                                ?>
                                                <li><?php echo $prompt1; ?></li>
                                            <?php
                                            }

                                            if ($hasEventTomorrow){
                                                $prompt2 =  'You have to rest well for the upcoming event tommorrow.';
                                                $prompt3 =  'You are the assigned volunteer for the event tommorrow.';
                                                ?>
                                                <li><?php echo $prompt2; ?></li>
                                                <li><?php echo $prompt3; ?></li>
                                            <?php
                                            }
                                            
                                            if ($volunteer_count_completed > 0) {
                                                $prompt4 = '<p class="text-success" style="text-decoration:none">'. 'You have completed a total ' . $volunteer_count_completed . ' tickets. If convenient you can always send tickets to get or join other task.
                                                This will always increase your intensity points and you will be always be suggested to other tickets.'.'</p>';
                                                ?>
                                                <li><?php echo $prompt4; ?></li>
                                            <?php
                                            }
                                                  
                                            if (!empty($reminder_deadline)){
                                                // $prompt5 = '<a href="" class="text-danger" style="text-decoration:none">' . $reminder_deadline . '</a>';
                                                $prompt5 = $reminder_deadline;
                                                ?>
                                                <li><?php echo $prompt5; ?></li>
                                            <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 h-100">
                                <div class="bg-danger text-white card-header text-center">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    Urgent Tickets
                                </div>
                                <br>
                                <div style="max-height: 200px; overflow-y: auto;">
                                    <?php 
                                        $volunteer_id = $_SESSION['volunteer']['id'];
                                        $query = "SELECT * FROM tickets WHERE ticket_priority = 'Urgent'";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                        $ticket_volunteers_ids = explode(',', $row['ticket_volunteers_id']);
                                        if (in_array($volunteer_id, $ticket_volunteers_ids)) {
                                    ?>
                                    <ul>
                                        <li> <a href="" class="text-danger" style="text-decoration:none" data-bs-toggle="modal" data-bs-target="#urgent<?php echo $row['id'] ?>"><?php echo $row['ticket_title'] ?> -  Deadline: <?php echo $row['ticket_deadline'] ?></a></li>
                                    </ul>

                                    <div class="modal modal-md fade" id="urgent<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="detTicket" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h6 class="modal-title">Ticket Details</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                    </button>
                                                </div>  
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <h6>Ticket Title: <b><?php echo $row['ticket_title'] ?></b> </h6>
                                                            <h6>Ticket Admin: <b><?php echo $row['ticket_admin'] ?></b> </h6>
                                                            <hr>
                                                            <h6>Ticket Description: </h6>
                                                            <b><?php echo $row['ticket_desc'] ?></b>
                                                            <hr>
                                                            <h6 class="mt-3">Ticket Volunteers:</h6>
                                                            <?php 
                                                                $ids = $row['ticket_volunteers_id'];
                                                                $idsArray = explode(',', $ids);
                                                            
                                                                $idsString = "'" . implode("', '", $idsArray) . "'";
                                                                
                                                                $query_volunteer = "SELECT * FROM accounts WHERE id IN ($idsString)";
                                                                $result_volunteer = mysqli_query($conn, $query_volunteer);
                                                                
                                                                while ($row_volunteer = mysqli_fetch_array($result_volunteer)) {
                                                                    ?>
                                                                    <ul>
                                                                        <li><b><?php echo $row_volunteer['name'] ?></b></li>
                                                                    </ul>
                                                                <?php
                                                                }
                                                            ?>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6 class="mt-3">Priority:
                                                            <?php 
                                                            if($row['ticket_priority'] == 'Low'){
                                                                ?>
                                                                <b><label class="text-secondary">Low</label></b>
                                                            <?php
                                                            }elseif($row['ticket_priority'] == 'Mid'){
                                                                ?>
                                                                <b><label class="text-primary">Mid</label></b>
                                                            <?php
                                                            }elseif($row['ticket_priority'] == 'High'){
                                                                ?>
                                                                <b><label class="text-warning">High</label></b>
                                                            <?php
                                                            }else{
                                                                ?>
                                                                <b><label class="text-danger">Urgent</label></b>
                                                            <?php
                                                            }
                                                            
                                                            ?>
                                                            </h6>
                                                            <h6>Ticket Type: <b><?php echo $row['ticket_type'] ?></b> </h6>
                                                            <h6 class="mt-3">Ticket Deadline: <b><?php echo $row['ticket_deadline'] ?></b> </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php 
                                } }
                                ?>
                                </div>
                            </div>
                        </div>

                        <hr class="mt-3">


                        <div class="col-md-9">
                            <div class="card mb-4 h-100">
                                <div class="bg-dark text-white card-header text-center">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    Calendar
                                </div>
                                <div class="card-body p-4">
                                    <?php 
                                        // Fetch events from database
                                        $sql = "SELECT id, title, startdate, enddate, allday FROM events";
                                        $result = $conn->query($sql);

                                        $events = array();

                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                $event = array(
                                                    'id' => $row['id'],
                                                    'title' => $row['title'],
                                                    'start' => $row['startdate'],
                                                    'end' => $row['enddate'],
                                                    'allDay' => $row['allday']
                                                );
                                                array_push($events, $event);
                                            }
                                        }
                                    ?>
                                    <div id="calendar"
                                        class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap5 bsb-calendar-theme">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="card mb-4 h-100">
                                <div class="bg-success text-white card-header text-center">
                                    <i class="fa-solid fa-bookmark"></i>
                                    Tickets
                                </div>
                                <div style="max-height: 800px; overflow-y: auto;">
                                <?php
                                    $query = "SELECT * FROM tickets";
                                    $result = mysqli_query($conn, $query);

                                    while ($row = mysqli_fetch_array($result)) {
                                        $priority = $row['ticket_priority'];
                                        $bgColor = '';
                                        
                                        switch ($priority) {
                                            case 'Urgent':
                                                $bgColor = 'bg-danger';
                                                break;
                                            case 'Low':
                                                $bgColor = 'bg-secondary';
                                                break;
                                            case 'Mid':
                                                $bgColor = 'bg-primary';
                                                break;
                                            case 'High':
                                                $bgColor = 'bg-warning';
                                                break;
                                            default:
                                            $bgColor = 'bg-success';
                                            break;
                                        }
                                        $ticket_volunteers_ids = explode(',', $row['ticket_volunteers_id']);
                                        if (in_array($volunteer_id, $ticket_volunteers_ids)) {
                                ?>
                                <div class="p-3">
                                    <div class="card <?php echo $bgColor ?>">
                                        <div class="card-body text-white">
                                            <h6><?php echo $row['ticket_title'] ?></h6>
                                            <hr>
                                            <p><?php echo $row['ticket_desc'] ?></p>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="" class="text-white" style="text-decoration:none" data-bs-toggle="modal" data-bs-target="#ticket<?php echo $row['id'] ?>">View</a>
                                        </div>

                                        <div class="modal modal-md fade" id="ticket<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="detTicket" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-success text-white">
                                                        <h6 class="modal-title">Ticket Details</h6>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        </button>
                                                    </div>  
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <h6>Ticket Title: <b><?php echo $row['ticket_title'] ?></b> </h6>
                                                                <h6>Ticket Admin: <b><?php echo $row['ticket_admin'] ?></b> </h6>
                                                                <hr>
                                                                <h6>Ticket Description: </h6>
                                                                <b><?php echo $row['ticket_desc'] ?></b>
                                                                <hr>
                                                                <h6 class="mt-3">Ticket Volunteers:</h6>
                                                                <?php 
                                                                    $ids = $row['ticket_volunteers_id'];
                                                                    $idsArray = explode(',', $ids);
                                                                
                                                                    $idsString = "'" . implode("', '", $idsArray) . "'";
                                                                    
                                                                    $query_volunteer = "SELECT * FROM accounts WHERE id IN ($idsString)";
                                                                    $result_volunteer = mysqli_query($conn, $query_volunteer);
                                                                    
                                                                    while ($row_volunteer = mysqli_fetch_array($result_volunteer)) {
                                                                        ?>
                                                                        <ul>
                                                                            <li><b><?php echo $row_volunteer['name'] ?></b></li>
                                                                        </ul>
                                                                    <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <h6 class="mt-3">Priority:
                                                                <?php 
                                                                if($row['ticket_priority'] == 'Low'){
                                                                    ?>
                                                                    <b><label class="text-secondary">Low</label></b>
                                                                <?php
                                                                }elseif($row['ticket_priority'] == 'Mid'){
                                                                    ?>
                                                                    <b><label class="text-primary">Mid</label></b>
                                                                <?php
                                                                }elseif($row['ticket_priority'] == 'High'){
                                                                    ?>
                                                                    <b><label class="text-warning">High</label></b>
                                                                <?php
                                                                }else{
                                                                    ?>
                                                                    <b><label class="text-danger">Urgent</label></b>
                                                                <?php
                                                                }
                                                                
                                                                ?>
                                                                </h6>
                                                                <h6>Ticket Type: <b><?php echo $row['ticket_type'] ?></b> </h6>
                                                                <h6 class="mt-3">Ticket Deadline: <b><?php echo $row['ticket_deadline'] ?></b> </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }   }
                                ?>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'today',
                center: 'title',
                right: 'prev,next'
            },
            initialView: 'dayGridMonth',
            events: <?php echo json_encode($events); ?>,
            navLinks: false,
            selectable: true,
            selectMirror: true,
            dayMaxEvents: true,
            
            });

            calendar.render();

        });
    </script>
</body>

</html>