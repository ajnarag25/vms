<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('./include/header.php') ?>
    <title>Ticket Panel - Volunteer Management Strageties</title>
    <script src="https://cdn.jsdelivr.net/npm/progressbar.js@1.1.0/dist/progressbar.min.js"></script>
    <!-- chat style -->
    <style>
    .message.sent {
        text-align: right;
    }
    </style>
</head>


<body class="sb-nav-fixed">

    <?php include ('./include/nav.php') ?>

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

                        <a class="nav-link" href="personal_page.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                            Personal Page
                        </a>

                        <a class="nav-link" href="team_dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                            Team Dashboard
                        </a>

                        <a class="nav-link active" href="ticket_panel.php">
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
                            <h4 class="mt-4"><b>Ticket Panel</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="currentDate"></span> </h4>
                        </div>
                    </div>
                    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#calendar_box"
                                type="button" role="tab" aria-controls="calendar" aria-selected="true">Calendar</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#board" type="button"
                                role="tab" aria-controls="board" aria-selected="false">Board</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#time" type="button"
                                role="tab" aria-controls="time" aria-selected="false">Time Log</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- Calendar -->
                        <div class="tab-pane fade show active" id="calendar_box" role="tabpanel"
                            aria-labelledby="calendar-tab">
                            <h5 class="mt-3">Recommendation -> <span class="text-success">Sample</span> </h5>
                            <div class="card mb-4 ">
                                <div class="bg-dark text-white card-header text-center">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    Calendar
                                </div>
                                <div class="card-body p-5">
                                    <?php
                                    // Fetch events from database
                                    $sql = "SELECT id, title, startdate, enddate, allday FROM events";
                                    $result = $conn->query($sql);

                                    $events = array();

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
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

                        <!-- Board -->
                        <div class="tab-pane fade" id="board" role="tabpanel" aria-labelledby="board-tab">
                            <br>
                            <div class="container">
                                <div class="table-responsive">
                                    <h4 class="text-center"><b>Your Tickets</b></h4>
                                    <table class="table table-border table-hover p-4" id="TicketPanel">
                                        <thead>
                                            <tr>
                                                <th scope="col">Event Title</th>
                                                <th scope="col">Event Tickets</th>
                                                <th scope="col">Event Description</th>
                                                <th scope="col">Event Date</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $volunteer_id = $_SESSION['volunteer']['id'];
                                            $queryTicket = "SELECT * FROM tickets";
                                            $resultTicket = mysqli_query($conn, $queryTicket);

                                            $eventTitles = [];

                                            while ($rowTicket = mysqli_fetch_array($resultTicket)) {
                                                $ticket_volunteers_ids = explode(',', $rowTicket['ticket_volunteers_id']);
                                                if (in_array($volunteer_id, $ticket_volunteers_ids)) {
                                                    $event_id = $rowTicket['event_id'];
                                                    if (!in_array($event_id, array_column($eventTitles, 'id'))) {
                                                        $queryEvent = "SELECT * FROM events WHERE id = '$event_id'";
                                                        $resultEvent = mysqli_query($conn, $queryEvent);

                                                        while ($rowEvent = mysqli_fetch_array($resultEvent)) {
                                                            $eventTitle = $rowEvent['title'];
                                                            $eventDescription = $rowEvent['description'];
                                                            $eventDateadded = $rowEvent['date_added'];
                                                            $eventTitles[] = ['id' => $event_id, 'title' => $eventTitle];
                                                            ?>
                                                            <tr>    
                                                                <th scope="row"><?php echo $eventTitle; ?></th>
                                                                <td class="p-3">
                                                                    <?php
                                                                    // Fetch all tickets for this event that match the volunteer ID
                                                                    $queryTicketsForEvent = "SELECT * FROM tickets WHERE event_id = '$event_id'";
                                                                    $resultTicketsForEvent = mysqli_query($conn, $queryTicketsForEvent);
                                                                    
                                                                    while ($rowTicketForEvent = mysqli_fetch_array($resultTicketsForEvent)) {
                                                                        $ticket_volunteers_ids_for_event = explode(',', $rowTicketForEvent['ticket_volunteers_id']);
                                                                        if (in_array($volunteer_id, $ticket_volunteers_ids_for_event)) {
                                                                            ?>
                                                                            <button type="button" class="btn btn-success me-2 mb-2" data-bs-toggle="modal" data-bs-target="#ticket<?php echo $rowTicketForEvent['id']; ?>">
                                                                                <?php echo $rowTicketForEvent['ticket_title']; ?>
                                                                            </button>

                                                                           <!--Ticket Details-->
                                                                            <div class="modal modal-xl fade" id="ticket<?php echo $rowTicketForEvent['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detTicket" aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header bg-success text-white">
                                                                                            <h6 class="modal-title">Ticket Details</h6>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                                                aria-label="Close"></button>
                                                                                            </button>
                                                                                        </div>  
                                                                                        <div class="card-body p-3">
                                                                                            <ul class="nav nav-tabs " id="myTab" role="tablist">
                                                                                                <li class="nav-item" role="presentation">
                                                                                                    <button class="nav-link active" id="main-tab" data-bs-toggle="tab" data-bs-target="#main<?php echo $rowTicketForEvent['id'] ?>" type="button" role="tab" aria-controls="main" aria-selected="true">Main</button>
                                                                                                </li>
                                                                                                <li class="nav-item" role="presentation">
                                                                                                    <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments<?php echo $rowTicketForEvent['id'] ?>" type="button" role="tab" aria-controls="comments" aria-selected="false">Comments</button>
                                                                                                </li>
                                                                                            
                                                                                            </ul>
                                                                                    
                                                                                            <div class="tab-content" id="myTabContent">
                                                                                                <div class="tab-pane fade show active p-3" id="main<?php echo $rowTicketForEvent['id'] ?>" role="tabpanel" aria-labelledby="main-tab">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-8">
                                                                                                            <div class="row">
                                                                                                                <div class="col">
                                                                                                                    <h6 class="mt-3">Ticket Title:</h6>
                                                                                                                    <h6 class="mt-3"><b><?php echo $rowTicketForEvent['ticket_title'] ?></b> </h6>
                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                    <h6 class="mt-3">Ticket Admin: </h6>
                                                                                                                    <h6 class="mt-3"><b><?php echo $rowTicketForEvent['ticket_admin'] ?></b></h6>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <h6 class="mt-3">Ticket Description: </h6>
                                                                                                            <h6 class="mt-3"><b><?php echo $rowTicketForEvent['ticket_desc'] ?></b></h6>
                                                                                                            <br>
                                                                                                            <hr>
                                                                                                            <div class="row align-items-center">
                                                                                                                <div class="col-auto">
                                                                                                                    <h6>Priority Level:</h6>
                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                    <?php 
                                                                                                                    if($rowTicketForEvent['ticket_priority'] == 'Low'){
                                                                                                                        ?>
                                                                                                                        <div class="alert alert-secondary d-inline-flex align-items-center py-1"
                                                                                                                            role="alert">
                                                                                                                            <strong>Low</strong>
                                                                                                                        </div>
                                                                                                                    <?php
                                                                                                                    }elseif($rowTicketForEvent['ticket_priority'] == 'Mid'){
                                                                                                                        ?>
                                                                                                                        <div class="alert alert-primary d-inline-flex align-items-center py-1"
                                                                                                                            role="alert">
                                                                                                                            <strong>Mid</strong>
                                                                                                                        </div>
                                                                                                                    <?php
                                                                                                                    }elseif($rowTicketForEvent['ticket_priority'] == 'High'){
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
                                                                                                                        if($rowTicketForEvent['ticket_status'] == 'Your-ticket'){
                                                                                                                        ?>
                                                                                                                            <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-1">
                                                                                                                                <strong>Your-ticket</strong>
                                                                                                                            </div>
                                                                                                                        <?php
                                                                                                                        }
                                                                                                                        elseif($rowTicketForEvent['ticket_status'] == 'To-Do'){
                                                                                                                        ?>
                                                                                                                            <div class="alert alert-primary rounded-pill d-inline-flex align-items-center py-1">
                                                                                                                                <strong>To-Do</strong>
                                                                                                                            </div>
                                                                                                                        <?php
                                                                                                                        }
                                                                                                                        elseif($rowTicketForEvent['ticket_status'] == 'In-Review'){ 
                                                                                                                        ?>
                                                                                                                            <div class="alert alert-warning rounded-pill d-inline-flex align-items-center py-1">
                                                                                                                                <strong>In-Review</strong>
                                                                                                                            </div>
                                                                                                                        <?php
                                                                                                                        }
                                                                                                                        elseif($rowTicketForEvent['ticket_status'] == 'Completed'){ 
                                                                                                                        ?>
                                                                                                                            <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-1">
                                                                                                                                <strong>Completed</strong>
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
                                                                                                                $ticket_id = $rowTicketForEvent['id'];
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
                                                                                                                    $ids = $rowTicketForEvent['ticket_volunteers_id'];
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
                                                                                                            <div id="progress-bar-container<?php echo $rowTicketForEvent['id'] ?>"
                                                                                                                style="position: relative;">
                                                                                                            </div>
                                                                                                    
                                                                                                            <hr>
                                                                                                            <h6>Ticket Type: <b><?php echo $rowTicketForEvent['ticket_type'] ?></b> </h6>
                                                                                                            <h6 class="mt-3">Ticket Deadline: <b class="text-danger"><?php echo $rowTicketForEvent['ticket_deadline'] ?></b> </h6>
                                                                                                            <div class="text-center mt-3">
                                                                                                            <?php 
                                                                                                                    $file_path = $rowTicketForEvent['file_uploaded'];
                                                                                                                    
                                                                                                                    if($file_path == ''){
                                                                                                                        $display_file_path = 'ticket_panel.php';
                                                                                                                    }else{
                                                                                                                        // Remove any leading '../' from the file path
                                                                                                                        $file_path = preg_replace('#^(\.\./)+#', '', $file_path);
                                                                                                                                                                        
                                                                                                                        $display_file_path = "../volunteer/" . $file_path;
                                                                                                                    }

                                                                                                                ?>
                                                                                                                <a href="<?php echo $display_file_path ?>" class="btn btn-secondary mt-2" target="_blank">View Submitted File</a>
                                                                                                            </div>
                                                                                                            
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="tab-pane fade p-3" id="comments<?php echo $rowTicketForEvent['id'] ?>" role="tabpanel" aria-labelledby="comments-tab">
                                                                                                    <div class="row mt-12">
                                                                                                        <!-- right side of the modal comment display -->
                                                                                                        <div class="col-md-12">
                                                                                                            <div class="container">
                                                                                                                <div class="chat-container" style="max-height: 300px; overflow-y: auto;">
                                                                                                                    <?php 
                                                                                                                        $comment_id = $rowTicketForEvent['id'];
                                                                                                                        $queryComment = "SELECT * FROM comments WHERE ticket_id = '$comment_id'";
                                                                                                                        $resultComment = mysqli_query($conn, $queryComment);
                                                                                                                        while ($rowComment = mysqli_fetch_array($resultComment)) {
                                                                                                                    ?>
                                                                                                                    <?php 
                                                                                                                        if($rowComment['account_type'] == 'Admin'){
                                                                                                                            ?>
                                                                                                                            <div class="">
                                                                                                                                <div class="alert alert-secondary" role="alert">
                                                                                                                                    <b>Admin:</b> <?php echo $rowComment['comment'] ?>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        <?php
                                                                                                                        }else{
                                                                                                                            ?>
                                                                                                                            <div class="">
                                                                                                                                <div class="alert alert-primary" role="alert">
                                                                                                                                    <b>Volunteer:</b> <?php echo $rowComment['comment'] ?>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        <?php
                                                                                                                        }
                                                                                                                    ?>
                                                                                                                    <?php } ?>
                                                                                                                
                                                                                                                </div>
                                                                                                                <hr>
                                                                                                                <form action="./include/process.php" method="POST">
                                                                                                                    <h6>Comment:</h6>
                                                                                                                    <input type="hidden" name="ticket_id" value="<?php echo $rowTicketForEvent['id'] ?>">
                                                                                                                    <div class="d-flex">
                                                                                                                        <textarea class="form-control me-2" name="comment" id="comment" required></textarea>
                                                                                                                        <button type="submit" class="btn btn-success" title="Send" name="add_comment_panel"><i class="fa-solid fa-paper-plane"></i></button>
                                                                                                                    </div>
                                                                                                                </form>
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
                                                                                $ticket_event_id = $rowTicketForEvent['event_id'];
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
                                                                            var progressBar = new ProgressBar.Circle('#progress-bar-container<?php echo $rowTicketForEvent['id'] ?>', {
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
                                                                            progressBar.animate(<?php echo $formattedResult / 100 ?>);
                                                                            </script>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $eventDescription; ?></td> 
                                                                <td><?php echo $eventDateadded; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                    <h4 class="text-center mt-3"><b>Other Tickets</b></h4>
                                    <table class="table table-border table-hover p-4" id="TicketPanelAll">
                                        <thead>
                                            <tr>
                                                <th scope="col">Event Title</th>
                                                <th scope="col">Event Tickets</th>
                                                <th scope="col">Event Description</th>
                                                <th scope="col">Event Date</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $volunteer_id = $_SESSION['volunteer']['id'];
                                            $queryTicket = "SELECT * FROM tickets";
                                            $resultTicket = mysqli_query($conn, $queryTicket);

                                            $eventTitles = [];

                                            while ($rowTicket = mysqli_fetch_array($resultTicket)) {
                                                $ticket_volunteers_ids = explode(',', $rowTicket['ticket_volunteers_id']);
                                                $event_id = $rowTicket['event_id'];
                                                
                                                if (!in_array($event_id, array_column($eventTitles, 'id'))) {
                                                    $queryEvent = "SELECT * FROM events WHERE id = '$event_id'";
                                                    $resultEvent = mysqli_query($conn, $queryEvent);

                                                    while ($rowEvent = mysqli_fetch_array($resultEvent)) {
                                                        $eventTitle = $rowEvent['title'];
                                                        $eventDescription = $rowEvent['description'];
                                                        $eventDateadded = $rowEvent['date_added'];
                                                        $eventTitles[] = ['id' => $event_id, 'title' => $eventTitle];
                                                        ?>
                                                        <tr>    
                                                            <th scope="row"><?php echo $eventTitle; ?></th>
                                                            <td class="p-3">
                                                                <?php
                                                                // Fetch all tickets for this event
                                                                $queryTicketsForEvent = "SELECT * FROM tickets WHERE event_id = '$event_id'";
                                                                $resultTicketsForEvent = mysqli_query($conn, $queryTicketsForEvent);
                                                                
                                                                while ($rowTicketForEvent = mysqli_fetch_array($resultTicketsForEvent)) {
                                                                    $ticket_volunteers_ids_for_event = explode(',', $rowTicketForEvent['ticket_volunteers_id']);
                                                                    
                                                                    if (!in_array($volunteer_id, $ticket_volunteers_ids_for_event)) {
                                                                        // Tickets not assigned to the volunteer
                                                                        ?>
                                                                        <button type="button" class="btn btn-success me-2 mb-2" data-bs-toggle="modal" data-bs-target="#ticket2<?php echo $rowTicketForEvent['id']; ?>">
                                                                            <?php echo $rowTicketForEvent['ticket_title']; ?>
                                                                        </button>

                                                                        <!--Ticket Details-->
                                                                        <div class="modal modal-xl fade" id="ticket2<?php echo $rowTicketForEvent['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detTicket" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header bg-success text-white">
                                                                                        <h6 class="modal-title">Ticket Details</h6>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                                            aria-label="Close"></button>
                                                                                        </button>
                                                                                    </div>  
                                                                                    <div class="card-body p-3">
                                                                                        <ul class="nav nav-tabs " id="myTab" role="tablist">
                                                                                            <li class="nav-item" role="presentation">
                                                                                                <button class="nav-link active" id="main-tab" data-bs-toggle="tab" data-bs-target="#main<?php echo $rowTicketForEvent['id'] ?>" type="button" role="tab" aria-controls="main" aria-selected="true">Main</button>
                                                                                            </li>
                                                                                            <li class="nav-item" role="presentation">
                                                                                                <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments<?php echo $rowTicketForEvent['id'] ?>" type="button" role="tab" aria-controls="comments" aria-selected="false">Comments</button>
                                                                                            </li>
                                                                                        
                                                                                        </ul>
                                                                                
                                                                                        <div class="tab-content" id="myTabContent">
                                                                                            <div class="tab-pane fade show active p-3" id="main<?php echo $rowTicketForEvent['id'] ?>" role="tabpanel" aria-labelledby="main-tab">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-8">
                                                                                                        <div class="row">
                                                                                                            <div class="col">
                                                                                                                <h6 class="mt-3">Ticket Title:</h6>
                                                                                                                <h6 class="mt-3"><b><?php echo $rowTicketForEvent['ticket_title'] ?></b> </h6>
                                                                                                            </div>
                                                                                                            <div class="col">
                                                                                                                <h6 class="mt-3">Ticket Admin: </h6>
                                                                                                                <h6 class="mt-3"><b><?php echo $rowTicketForEvent['ticket_admin'] ?></b></h6>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <h6 class="mt-3">Ticket Description: </h6>
                                                                                                        <h6 class="mt-3"><b><?php echo $rowTicketForEvent['ticket_desc'] ?></b></h6>
                                                                                                        <br>
                                                                                                        <hr>
                                                                                                        <div class="row align-items-center">
                                                                                                            <div class="col-auto">
                                                                                                                <h6>Priority Level:</h6>
                                                                                                            </div>
                                                                                                            <div class="col">
                                                                                                                <?php 
                                                                                                                if($rowTicketForEvent['ticket_priority'] == 'Low'){
                                                                                                                    ?>
                                                                                                                    <div class="alert alert-secondary d-inline-flex align-items-center py-1"
                                                                                                                        role="alert">
                                                                                                                        <strong>Low</strong>
                                                                                                                    </div>
                                                                                                                <?php
                                                                                                                }elseif($rowTicketForEvent['ticket_priority'] == 'Mid'){
                                                                                                                    ?>
                                                                                                                    <div class="alert alert-primary d-inline-flex align-items-center py-1"
                                                                                                                        role="alert">
                                                                                                                        <strong>Mid</strong>
                                                                                                                    </div>
                                                                                                                <?php
                                                                                                                }elseif($rowTicketForEvent['ticket_priority'] == 'High'){
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
                                                                                                                    if($rowTicketForEvent['ticket_status'] == 'Your-ticket'){
                                                                                                                    ?>
                                                                                                                        <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-1">
                                                                                                                            <strong>Your-ticket</strong>
                                                                                                                        </div>
                                                                                                                    <?php
                                                                                                                    }
                                                                                                                    elseif($rowTicketForEvent['ticket_status'] == 'To-Do'){
                                                                                                                    ?>
                                                                                                                        <div class="alert alert-primary rounded-pill d-inline-flex align-items-center py-1">
                                                                                                                            <strong>To-Do</strong>
                                                                                                                        </div>
                                                                                                                    <?php
                                                                                                                    }
                                                                                                                    elseif($rowTicketForEvent['ticket_status'] == 'In-Review'){ 
                                                                                                                    ?>
                                                                                                                        <div class="alert alert-warning rounded-pill d-inline-flex align-items-center py-1">
                                                                                                                            <strong>In-Review</strong>
                                                                                                                        </div>
                                                                                                                    <?php
                                                                                                                    }
                                                                                                                    elseif($rowTicketForEvent['ticket_status'] == 'Completed'){ 
                                                                                                                    ?>
                                                                                                                        <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-1">
                                                                                                                            <strong>Completed</strong>
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
                                                                                                            $ticket_id = $rowTicketForEvent['id'];
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
                                                                                                                $ids = $rowTicketForEvent['ticket_volunteers_id'];
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
                                                                                                        <div id="progress-bar-container<?php echo $rowTicketForEvent['id'] ?>"
                                                                                                            style="position: relative;">
                                                                                                        </div>
                                                                                                
                                                                                                        <hr>
                                                                                                        <h6>Ticket Type: <b><?php echo $rowTicketForEvent['ticket_type'] ?></b> </h6>
                                                                                                        <h6 class="mt-3">Ticket Deadline: <b class="text-danger"><?php echo $rowTicketForEvent['ticket_deadline'] ?></b> </h6>
                                                                                                        <div class="text-center mt-3">
                                                                                                        <button class="btn btn-secondary w-25 mt-2" data-bs-toggle="modal" data-bs-target="#ask<?php echo $rowTicketForEvent['id'] ?>">Ask</button>

                                                                                                        <!--Ask-->
                                                                                                        <div class="modal fade" id="ask<?php echo $rowTicketForEvent['id'] ?>" tabindex="-1"  aria-hidden="true">
                                                                                                            <div class="modal-dialog">
                                                                                                                <div class="modal-content">
                                                                                                                    <div class="modal-header bg-dark text-white">
                                                                                                                        <h5 class="modal-title" id="">Ask about the ticket</h5>
                                                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                                    </div>
                                                                                                                    <form action="./include/process.php" method="POST">
                                                                                                                        <div class="modal-body">
                                                                                                                            <label for=""><b>Title:</b> </label>
                                                                                                                            <input type="text" class="form-control" id="contact" name="ask_title" required>
                                                                                                                            <label for=""><b>Details:</b> </label>
                                                                                                                            <textarea class="form-control" name="ask_details" id="" cols="3" rows="3"></textarea>
                                                                                                                        </div>
                                                                                                                        <div class="modal-footer">
                                                                                                                            <input type="hidden" name="ask_id" value="<?php echo $volunteer_id ?>">
                                                                                                                            <input type="hidden" name="ask_event_id" value="<?php echo $rowTicketForEvent['event_id'] ?>">
                                                                                                                            <button type="submit" name="ask_submit_panel" class="btn btn-primary w-100">Submit</button>
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <?php 
                                                                                                                $file_path = $rowTicketForEvent['file_uploaded'];
                                                                                                                
                                                                                                                if($file_path == ''){
                                                                                                                    $display_file_path = 'ticket_panel.php';
                                                                                                                }else{
                                                                                                                    // Remove any leading '../' from the file path
                                                                                                                    $file_path = preg_replace('#^(\.\./)+#', '', $file_path);
                                                                                                                                                                    
                                                                                                                    $display_file_path = "../volunteer/" . $file_path;
                                                                                                                }

                                                                                                            ?>
                                                                                                            <a href="<?php echo $display_file_path ?>" class="btn btn-secondary mt-2" target="_blank">View Submitted File</a>
                                                                                                        </div>
                                                                                                        
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade p-3" id="comments<?php echo $rowTicketForEvent['id'] ?>" role="tabpanel" aria-labelledby="comments-tab">
                                                                                                <div class="row mt-12">
                                                                                                    <!-- right side of the modal comment display -->
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="container">
                                                                                                            <div class="chat-container" style="max-height: 300px; overflow-y: auto;">
                                                                                                                <?php 
                                                                                                                    $comment_id = $rowTicketForEvent['id'];
                                                                                                                    $queryComment = "SELECT * FROM comments WHERE ticket_id = '$comment_id'";
                                                                                                                    $resultComment = mysqli_query($conn, $queryComment);
                                                                                                                    while ($rowComment = mysqli_fetch_array($resultComment)) {
                                                                                                                ?>
                                                                                                                <?php 
                                                                                                                    if($rowComment['account_type'] == 'Admin'){
                                                                                                                        ?>
                                                                                                                        <div class="">
                                                                                                                            <div class="alert alert-secondary" role="alert">
                                                                                                                                <b>Admin:</b> <?php echo $rowComment['comment'] ?>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    <?php
                                                                                                                    }else{
                                                                                                                        ?>
                                                                                                                        <div class="">
                                                                                                                            <div class="alert alert-primary" role="alert">
                                                                                                                                <b>Volunteer:</b> <?php echo $rowComment['comment'] ?>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                                <?php } ?>
                                                                                                            
                                                                                                            </div>
                                                                                                            <hr>
                                                                                                            <form action="./include/process.php" method="POST">
                                                                                                                <h6>Comment:</h6>
                                                                                                                <input type="hidden" name="ticket_id" value="<?php echo $rowTicketForEvent['id'] ?>">
                                                                                                                <div class="d-flex">
                                                                                                                    <textarea class="form-control me-2" name="comment" id="comment" required></textarea>
                                                                                                                    <button type="submit" class="btn btn-success" title="Send" name="add_comment_panel"><i class="fa-solid fa-paper-plane"></i></button>
                                                                                                                </div>
                                                                                                            </form>
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
                                                                            $ticket_event_id = $rowTicketForEvent['event_id'];
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
                                                                        var progressBar = new ProgressBar.Circle('#progress-bar-container<?php echo $rowTicketForEvent['id'] ?>', {
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
                                                                        progressBar.animate(<?php echo $formattedResult / 100 ?>);
                                                                        </script>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $eventDescription; ?></td> 
                                                            <td><?php echo $eventDateadded; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Time Log -->
                        <div class="tab-pane fade" id="time" role="tabpanel" aria-labelledby="time-tab">

                            <div class="card mb-4 p-3">
                                <table class="table" id = 'Timelog'>
                                    <thead>
                                        <tr>
                                            <th scope="col">Volunteer</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Login Time</th>
                                            <th scope="col">Logout Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $queryLog = "SELECT * FROM volunteer_logtime AS vl 
                                                    LEFT JOIN accounts AS acc ON vl.volunteer_id = acc.id 
                                                    ORDER BY volunteer_id DESC";
                                        $resultLog = mysqli_query($conn, $queryLog);
                                        if ($resultLog) {
                                            while ($rowLog = mysqli_fetch_array($resultLog)) {
                                        ?>
                                            <tr>
                                                <th><?php echo $rowLog['name']; ?></th>
                                                <th><?php echo date('m/d/Y', strtotime($rowLog['login_time'])) ?> </th>
                                                <td><?php echo date('h:i:s A', strtotime($rowLog['login_time'])) ?> </td>
                                                <td><?php echo date('h:i:s A', strtotime($rowLog['logout_time'])) ?></td>
                                            </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </main>

            <?php include ('./include/footer.php') ?>

        </div>
    </div>

    <?php include ('./include/scripts.php') ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                initialView: 'dayGridMonth',
                events: <?php echo json_encode($events); ?>,
                navLinks: true,
                selectable: true,
                editable: true,
                selectMirror: true,
                dayMaxEvents: true,
            });
            calendar.render();
        });
    </script>
            <script>
                $(document).ready(function() {
                    // Function to fetch and update the current date
                    function updateDate() {
                        $.ajax({
                            url: "./include/currentdatetime.php",
                            type: "GET",
                            success: function (data) {
                                $("#currentDate").text(data);
                            }
                        });
                    }

            // Initial update
            updateDate();
                var intervalId = setInterval(updateDate, 1000);
        });
                    document.querySelectorAll('.collapsed-cell').forEach(cell => {
                    cell.addEventListener('click', () => {
                        // Toggle the "show" class for the cell to expand/collapse it
                        cell.nextElementSibling.classList.toggle('show');
                    });
                });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- codes for progress bar -->
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
            transform: 'translateX(-40%) translateY(00%)',
            width: '200px', //size of the circle
            height: '200px', //size of the circle
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
                left: '45%',
                right: '20%',
                top: '34%',
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
</body>

</html>