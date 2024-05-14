<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Team Dashboard - Volunteer Management Strageties</title>
    <script src="https://cdn.jsdelivr.net/npm/progressbar.js@1.1.0/dist/progressbar.min.js"></script>
    <!-- chat style -->
    <style>
    .message.sent {
        text-align: right;
    }
    </style>
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

                        <a class="nav-link" href="personal_page.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                            Personal Page
                        </a>

                        <a class="nav-link active" href="team_dashboard.php">
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
                            <h4 class="mt-4"><b>Team Dashboard</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="currentDate"></span> </h4>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-2">
                            <div class="card mb-4" style="max-height: 600px; overflow-y: auto;">
                                <div class="text-success card-header text-center">
                                    Your Tickets
                                </div>
                                <?php 
                                    $volunteer_id = $_SESSION['volunteer']['id'];

                                    $query = "SELECT * FROM tickets WHERE ticket_status = 'Your-ticket'";
                                    
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $ticket_volunteers_ids = explode(',', $row['ticket_volunteers_id']);
                                        if (in_array($volunteer_id, $ticket_volunteers_ids)) {
                                        ?>
                                        <div class="p-2">
                                            <div class="card bg-success text-white mb-4">
                                                <div class="card-body">
                                                    <h5><?php echo $row['ticket_title'] ?></h5>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <h6><a class="text-white" style="text-decoration:none" href="" data-bs-toggle="modal" data-bs-target="#detTicket<?php echo $row['id'] ?>">View</a></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Ticket Details-->
                                        <div class="modal modal-xl fade" id="detTicket<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="detTicket" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-success text-white">
                                                        <h5 class="modal-title">Ticket Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        </button>
                                                    </div>  
                                                    <div class="card-body">
                                                        <ul class="nav nav-tabs " id="myTab" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link active" id="main-tab" data-bs-toggle="tab" data-bs-target="#main<?php echo $row['id'] ?>" type="button" role="tab" aria-controls="main" aria-selected="true">Main</button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments<?php echo $row['id'] ?>" type="button" role="tab" aria-controls="comments" aria-selected="false">Comments</button>
                                                            </li>
                                                        
                                                        </ul>
                                                
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="tab-pane fade show active p-3" id="main<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="main-tab">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <h5 class="mt-3">Ticket Title:</h5>
                                                                                <h5 class="mt-3"><b><?php echo $row['ticket_title'] ?></b> </h5>
                                                                            </div>
                                                                            <div class="col">
                                                                                <h5 class="mt-3">Ticket Admin: </h5>
                                                                                <h5 class="mt-3"><b><?php echo $row['ticket_admin'] ?></b></h5>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="mt-3">Ticket Description: </h5>
                                                                        <h5 class="mt-3"><b><?php echo $row['ticket_desc'] ?></b></h5>
                                                                        <br>
                                                                        <hr>
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto">
                                                                                <h5>Priority Level:</h5>
                                                                            </div>
                                                                            <div class="col">
                                                                                <?php 
                                                                                if($row['ticket_priority'] == 'Low'){
                                                                                    ?>
                                                                                    <div class="alert alert-secondary d-inline-flex align-items-center py-1"
                                                                                        role="alert">
                                                                                        <strong>Low</strong>
                                                                                    </div>
                                                                                <?php
                                                                                }elseif($row['ticket_priority'] == 'Mid'){
                                                                                    ?>
                                                                                    <div class="alert alert-primary d-inline-flex align-items-center py-1"
                                                                                        role="alert">
                                                                                        <strong>Mid</strong>
                                                                                    </div>
                                                                                <?php
                                                                                }elseif($row['ticket_priority'] == 'High'){
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
                                                                                <h5>Status:</h5>
                                                                            </div>
                                                                            <div class="col">
                                                                                <?php 
                                                                                    if($row['ticket_status'] == 'Your-ticket'){
                                                                                    ?>
                                                                                        <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-1">
                                                                                            <strong>Your-ticket</strong>
                                                                                        </div>
                                                                                    <?php
                                                                                    }
                                                                                    elseif($row['ticket_status'] == 'To-Do'){
                                                                                    ?>
                                                                                        <div class="alert alert-primary rounded-pill d-inline-flex align-items-center py-1">
                                                                                            <strong>To-Do</strong>
                                                                                        </div>
                                                                                    <?php
                                                                                    }
                                                                                    elseif($row['ticket_status'] == 'In-Review'){ 
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
                                                                            $ticket_id = $row['id'];
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
                                                                            <h5>Ticket Volunteers: </h5>

                                                                            <div class="col">
                                                                            <?php 
                                                                                $ids = $row['ticket_volunteers_id'];
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
                                                                        <div id="progress-bar-container<?php echo $row['id'] ?>"
                                                                            style="position: relative;">
                                                                        </div>
                                                                        <hr>
                                                                        <h6>Ticket Type: <b><?php echo $row['ticket_type'] ?></b> </h6>
                                                                        <h6 class="mt-3">Ticket Deadline: <b class="text-danger"><?php echo $row['ticket_deadline'] ?></b> </h6>
                                                                        <div class="text-center mt-3">
                                                                            <button class="btn btn-secondary w-50">Add Target (Time)</button>
                                                                            <br>
                                                                            <button class="btn btn-secondary w-50 mt-2">View Plan</button>
                                                                            <br>
                                                                            <button class="btn btn-secondary w-25 mt-2">Ask</button>
                                                                            <button class="btn btn-secondary w-25 mt-2">Upload</button>
                                                                            <br>
                                                                            <button class="btn btn-success mt-2">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade p-3" id="comments<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="comments-tab">
                                                                <div class="row mt-12">
                                                                    <!-- right side of the modal comment display -->
                                                                    <div class="col-md-12">
                                                                        <div class="container">
                                                                            <div class="chat-container">
                                                                                <div class="message received">
                                                                                    <div class="alert alert-primary" role="alert">
                                                                                        Hello! How can I help you?
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message sent">
                                                                                    <div class="alert alert-secondary" role="alert">
                                                                                        Hi! I have a question about your services.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message received">
                                                                                    <div class="alert alert-primary" role="alert">
                                                                                        Sure, feel free to ask.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message sent">
                                                                                    <div class="alert alert-secondary" role="alert">
                                                                                        Hi! I have a question about your services.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message sent">
                                                                                    <div class="alert alert-secondary" role="alert">
                                                                                        Hi! I have a question about your services.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message sent">
                                                                                    <div class="alert alert-secondary" role="alert">
                                                                                        Hi! I have a question about your services.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
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
                                        <?php
                                        }
                                    }
                                ?>
                       
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="card mb-4">
                                <div class="text-primary card-header text-center">
                                    To-Do
                                </div>
                                <?php 
                                    $volunteer_id = $_SESSION['volunteer']['id'];

                                    $query = "SELECT * FROM tickets WHERE ticket_status = 'To-Do'";
                                    
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $ticket_volunteers_ids = explode(',', $row['ticket_volunteers_id']);
                                        if (in_array($volunteer_id, $ticket_volunteers_ids)) {
                                        ?>
                                        <div class="p-2">
                                            <div class="card bg-primary text-white mb-4">
                                                <div class="card-body">
                                                    <h5><?php echo $row['ticket_title'] ?></h5>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <h6><a class="text-white" style="text-decoration:none" href="" data-bs-toggle="modal" data-bs-target="#detTicket2<?php echo $row['id'] ?>">View</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Ticket Details-->
                                        <div class="modal modal-xl fade" id="detTicket2<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="detTicket" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-success text-white">
                                                        <h5 class="modal-title">Ticket Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        </button>
                                                    </div>  
                                                    <div class="card-body">
                                                        <ul class="nav nav-tabs " id="myTab" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link active" id="main-tab" data-bs-toggle="tab" data-bs-target="#main<?php echo $row['id'] ?>" type="button" role="tab" aria-controls="main" aria-selected="true">Main</button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments<?php echo $row['id'] ?>" type="button" role="tab" aria-controls="comments" aria-selected="false">Comments</button>
                                                            </li>
                                                        
                                                        </ul>
                                                
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="tab-pane fade show active p-3" id="main<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="main-tab">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <h5 class="mt-3">Ticket Title:</h5>
                                                                                <h5 class="mt-3"><b><?php echo $row['ticket_title'] ?></b> </h5>
                                                                            </div>
                                                                            <div class="col">
                                                                                <h5 class="mt-3">Ticket Admin: </h5>
                                                                                <h5 class="mt-3"><b><?php echo $row['ticket_admin'] ?></b></h5>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="mt-3">Ticket Description: </h5>
                                                                        <h5 class="mt-3"><b><?php echo $row['ticket_desc'] ?></b></h5>
                                                                        <br>
                                                                        <hr>
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto">
                                                                                <h5>Priority Level:</h5>
                                                                            </div>
                                                                            <div class="col">
                                                                                <?php 
                                                                                if($row['ticket_priority'] == 'Low'){
                                                                                    ?>
                                                                                    <div class="alert alert-secondary d-inline-flex align-items-center py-1"
                                                                                        role="alert">
                                                                                        <strong>Low</strong>
                                                                                    </div>
                                                                                <?php
                                                                                }elseif($row['ticket_priority'] == 'Mid'){
                                                                                    ?>
                                                                                    <div class="alert alert-primary d-inline-flex align-items-center py-1"
                                                                                        role="alert">
                                                                                        <strong>Mid</strong>
                                                                                    </div>
                                                                                <?php
                                                                                }elseif($row['ticket_priority'] == 'High'){
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
                                                                                <h5>Status:</h5>
                                                                            </div>
                                                                            <div class="col">
                                                                                <?php 
                                                                                    if($row['ticket_status'] == 'Your-ticket'){
                                                                                    ?>
                                                                                        <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-1">
                                                                                            <strong>Your-ticket</strong>
                                                                                        </div>
                                                                                    <?php
                                                                                    }
                                                                                    elseif($row['ticket_status'] == 'To-Do'){
                                                                                    ?>
                                                                                        <div class="alert alert-primary rounded-pill d-inline-flex align-items-center py-1">
                                                                                            <strong>To-Do</strong>
                                                                                        </div>
                                                                                    <?php
                                                                                    }
                                                                                    elseif($row['ticket_status'] == 'In-Review'){ 
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
                                                                            $ticket_id = $row['id'];
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
                                                                            <h5>Ticket Volunteers: </h5>

                                                                            <div class="col">
                                                                            <?php 
                                                                                $ids = $row['ticket_volunteers_id'];
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
                                                                        <div id="progress-bar-container<?php echo $row['id'] ?>"
                                                                            style="position: relative;">
                                                                        </div>
                                                                
                                                                        <hr>
                                                                        <h6>Ticket Type: <b><?php echo $row['ticket_type'] ?></b> </h6>
                                                                        <h6 class="mt-3">Ticket Deadline: <b class="text-danger"><?php echo $row['ticket_deadline'] ?></b> </h6>
                                                                        <div class="text-center mt-3">
                                                                            <button class="btn btn-secondary w-50">Add Target (Time)</button>
                                                                            <br>
                                                                            <button class="btn btn-secondary w-50 mt-2">View Plan</button>
                                                                            <br>
                                                                            <button class="btn btn-secondary w-25 mt-2">Ask</button>
                                                                            <button class="btn btn-secondary w-25 mt-2">Upload</button>
                                                                            <br>
                                                                            <button class="btn btn-success mt-2">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade p-3" id="comments<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="comments-tab">
                                                                <div class="row mt-12">
                                                                    <!-- right side of the modal comment display -->
                                                                    <div class="col-md-12">
                                                                        <div class="container">
                                                                            <div class="chat-container">
                                                                                <div class="message received">
                                                                                    <div class="alert alert-primary" role="alert">
                                                                                        Hello! How can I help you?
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message sent">
                                                                                    <div class="alert alert-secondary" role="alert">
                                                                                        Hi! I have a question about your services.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message received">
                                                                                    <div class="alert alert-primary" role="alert">
                                                                                        Sure, feel free to ask.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message sent">
                                                                                    <div class="alert alert-secondary" role="alert">
                                                                                        Hi! I have a question about your services.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message sent">
                                                                                    <div class="alert alert-secondary" role="alert">
                                                                                        Hi! I have a question about your services.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message sent">
                                                                                    <div class="alert alert-secondary" role="alert">
                                                                                        Hi! I have a question about your services.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
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
                                        <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="card mb-4">
                                <div class="text-warning card-header text-center">
                                    In-Review
                                </div>
                                <?php 
                                    $volunteer_id = $_SESSION['volunteer']['id'];

                                    $query = "SELECT * FROM tickets WHERE ticket_status = 'In-Review'";
                                    
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $ticket_volunteers_ids = explode(',', $row['ticket_volunteers_id']);
                                        if (in_array($volunteer_id, $ticket_volunteers_ids)) {
                                        ?>
                                        <div class="p-2">
                                            <div class="card bg-warning text-white mb-4">
                                                <div class="card-body">
                                                    <h5><?php echo $row['ticket_title'] ?></h5>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <h6><a class="text-white" style="text-decoration:none" href="" data-bs-toggle="modal" data-bs-target="#detTicket3<?php echo $row['id'] ?>">View</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Ticket Details-->
                                        <div class="modal modal-xl fade" id="detTicket3<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="detTicket" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-success text-white">
                                                        <h5 class="modal-title">Ticket Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        </button>
                                                    </div>  
                                                    <div class="card-body">
                                                        <ul class="nav nav-tabs " id="myTab" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link active" id="main-tab" data-bs-toggle="tab" data-bs-target="#main<?php echo $row['id'] ?>" type="button" role="tab" aria-controls="main" aria-selected="true">Main</button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments<?php echo $row['id'] ?>" type="button" role="tab" aria-controls="comments" aria-selected="false">Comments</button>
                                                            </li>
                                                        
                                                        </ul>
                                                
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="tab-pane fade show active p-3" id="main<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="main-tab">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <h5 class="mt-3">Ticket Title:</h5>
                                                                                <h5 class="mt-3"><b><?php echo $row['ticket_title'] ?></b> </h5>
                                                                            </div>
                                                                            <div class="col">
                                                                                <h5 class="mt-3">Ticket Admin: </h5>
                                                                                <h5 class="mt-3"><b><?php echo $row['ticket_admin'] ?></b></h5>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="mt-3">Ticket Description: </h5>
                                                                        <h5 class="mt-3"><b><?php echo $row['ticket_desc'] ?></b></h5>
                                                                        <br>
                                                                        <hr>
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto">
                                                                                <h5>Priority Level:</h5>
                                                                            </div>
                                                                            <div class="col">
                                                                                <?php 
                                                                                if($row['ticket_priority'] == 'Low'){
                                                                                    ?>
                                                                                    <div class="alert alert-secondary d-inline-flex align-items-center py-1"
                                                                                        role="alert">
                                                                                        <strong>Low</strong>
                                                                                    </div>
                                                                                <?php
                                                                                }elseif($row['ticket_priority'] == 'Mid'){
                                                                                    ?>
                                                                                    <div class="alert alert-primary d-inline-flex align-items-center py-1"
                                                                                        role="alert">
                                                                                        <strong>Mid</strong>
                                                                                    </div>
                                                                                <?php
                                                                                }elseif($row['ticket_priority'] == 'High'){
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
                                                                                <h5>Status:</h5>
                                                                            </div>
                                                                            <div class="col">
                                                                                <?php 
                                                                                    if($row['ticket_status'] == 'Your-ticket'){
                                                                                    ?>
                                                                                        <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-1">
                                                                                            <strong>Your-ticket</strong>
                                                                                        </div>
                                                                                    <?php
                                                                                    }
                                                                                    elseif($row['ticket_status'] == 'To-Do'){
                                                                                    ?>
                                                                                        <div class="alert alert-primary rounded-pill d-inline-flex align-items-center py-1">
                                                                                            <strong>To-Do</strong>
                                                                                        </div>
                                                                                    <?php
                                                                                    }
                                                                                    elseif($row['ticket_status'] == 'In-Review'){ 
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
                                                                            $ticket_id = $row['id'];
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
                                                                            <h5>Ticket Volunteers: </h5>

                                                                            <div class="col">
                                                                            <?php 
                                                                                $ids = $row['ticket_volunteers_id'];
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
                                                                        <div id="progress-bar-container<?php echo $row['id'] ?>"
                                                                            style="position: relative;">
                                                                        </div>
                                                                
                                                                        <hr>
                                                                        <h6>Ticket Type: <b><?php echo $row['ticket_type'] ?></b> </h6>
                                                                        <h6 class="mt-3">Ticket Deadline: <b class="text-danger"><?php echo $row['ticket_deadline'] ?></b> </h6>
                                                                        <div class="text-center mt-3">
                                                                            <button class="btn btn-secondary w-50">Add Target (Time)</button>
                                                                            <br>
                                                                            <button class="btn btn-secondary w-50 mt-2">View Plan</button>
                                                                            <br>
                                                                            <button class="btn btn-secondary w-25 mt-2">Ask</button>
                                                                            <button class="btn btn-secondary w-25 mt-2">Upload</button>
                                                                            <br>
                                                                            <button class="btn btn-success mt-2">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade p-3" id="comments<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="comments-tab">
                                                                <div class="row mt-12">
                                                                    <!-- right side of the modal comment display -->
                                                                    <div class="col-md-12">
                                                                        <div class="container">
                                                                            <div class="chat-container">
                                                                                <div class="message received">
                                                                                    <div class="alert alert-primary" role="alert">
                                                                                        Hello! How can I help you?
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message sent">
                                                                                    <div class="alert alert-secondary" role="alert">
                                                                                        Hi! I have a question about your services.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message received">
                                                                                    <div class="alert alert-primary" role="alert">
                                                                                        Sure, feel free to ask.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message sent">
                                                                                    <div class="alert alert-secondary" role="alert">
                                                                                        Hi! I have a question about your services.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message sent">
                                                                                    <div class="alert alert-secondary" role="alert">
                                                                                        Hi! I have a question about your services.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message sent">
                                                                                    <div class="alert alert-secondary" role="alert">
                                                                                        Hi! I have a question about your services.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
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
                                        <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="card mb-4">
                                <div class="text-danger card-header text-center">
                                    Revisions
                                </div>
                                <?php 
                                    $volunteer_id = $_SESSION['volunteer']['id'];

                                    $query = "SELECT * FROM tickets WHERE ticket_status = 'Revision'";
                                    
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $ticket_volunteers_ids = explode(',', $row['ticket_volunteers_id']);
                                        if (in_array($volunteer_id, $ticket_volunteers_ids)) {
                                        ?>
                                        <div class="p-2">
                                            <div class="card bg-danger text-white mb-4">
                                                <div class="card-body">
                                                    <h5><?php echo $row['ticket_title'] ?></h5>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <h6><a class="text-white" style="text-decoration:none" href="" data-bs-toggle="modal" data-bs-target="#detTicket4<?php echo $row['id'] ?>">View</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Ticket Details-->
                                        <div class="modal modal-xl fade" id="detTicket4<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="detTicket" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-success text-white">
                                                        <h5 class="modal-title">Ticket Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        </button>
                                                    </div>  
                                                    <div class="card-body">
                                                        <ul class="nav nav-tabs " id="myTab" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link active" id="main-tab" data-bs-toggle="tab" data-bs-target="#main<?php echo $row['id'] ?>" type="button" role="tab" aria-controls="main" aria-selected="true">Main</button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments<?php echo $row['id'] ?>" type="button" role="tab" aria-controls="comments" aria-selected="false">Comments</button>
                                                            </li>
                                                        
                                                        </ul>
                                                
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="tab-pane fade show active p-3" id="main<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="main-tab">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <h5 class="mt-3">Ticket Title:</h5>
                                                                                <h5 class="mt-3"><b><?php echo $row['ticket_title'] ?></b> </h5>
                                                                            </div>
                                                                            <div class="col">
                                                                                <h5 class="mt-3">Ticket Admin: </h5>
                                                                                <h5 class="mt-3"><b><?php echo $row['ticket_admin'] ?></b></h5>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="mt-3">Ticket Description: </h5>
                                                                        <h5 class="mt-3"><b><?php echo $row['ticket_desc'] ?></b></h5>
                                                                        <br>
                                                                        <hr>
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto">
                                                                                <h5>Priority Level:</h5>
                                                                            </div>
                                                                            <div class="col">
                                                                                <?php 
                                                                                if($row['ticket_priority'] == 'Low'){
                                                                                    ?>
                                                                                    <div class="alert alert-secondary d-inline-flex align-items-center py-1"
                                                                                        role="alert">
                                                                                        <strong>Low</strong>
                                                                                    </div>
                                                                                <?php
                                                                                }elseif($row['ticket_priority'] == 'Mid'){
                                                                                    ?>
                                                                                    <div class="alert alert-primary d-inline-flex align-items-center py-1"
                                                                                        role="alert">
                                                                                        <strong>Mid</strong>
                                                                                    </div>
                                                                                <?php
                                                                                }elseif($row['ticket_priority'] == 'High'){
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
                                                                                <h5>Status:</h5>
                                                                            </div>
                                                                            <div class="col">
                                                                                <?php 
                                                                                    if($row['ticket_status'] == 'Your-ticket'){
                                                                                    ?>
                                                                                        <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-1">
                                                                                            <strong>Your-ticket</strong>
                                                                                        </div>
                                                                                    <?php
                                                                                    }
                                                                                    elseif($row['ticket_status'] == 'To-Do'){
                                                                                    ?>
                                                                                        <div class="alert alert-primary rounded-pill d-inline-flex align-items-center py-1">
                                                                                            <strong>To-Do</strong>
                                                                                        </div>
                                                                                    <?php
                                                                                    }
                                                                                    elseif($row['ticket_status'] == 'In-Review'){ 
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
                                                                            $ticket_id = $row['id'];
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
                                                                            <h5>Ticket Volunteers: </h5>

                                                                            <div class="col">
                                                                            <?php 
                                                                                $ids = $row['ticket_volunteers_id'];
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
                                                                        <div id="progress-bar-container<?php echo $row['id'] ?>"
                                                                            style="position: relative;">
                                                                        </div>
                                                                
                                                                        <hr>
                                                                        <h6>Ticket Type: <b><?php echo $row['ticket_type'] ?></b> </h6>
                                                                        <h6 class="mt-3">Ticket Deadline: <b class="text-danger"><?php echo $row['ticket_deadline'] ?></b> </h6>
                                                                        <div class="text-center mt-3">
                                                                            <button class="btn btn-secondary w-50">Add Target (Time)</button>
                                                                            <br>
                                                                            <button class="btn btn-secondary w-50 mt-2">View Plan</button>
                                                                            <br>
                                                                            <button class="btn btn-secondary w-25 mt-2">Ask</button>
                                                                            <button class="btn btn-secondary w-25 mt-2">Upload</button>
                                                                            <br>
                                                                            <button class="btn btn-success mt-2">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade p-3" id="comments<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="comments-tab">
                                                                <div class="row mt-12">
                                                                    <!-- right side of the modal comment display -->
                                                                    <div class="col-md-12">
                                                                        <div class="container">
                                                                            <div class="chat-container">
                                                                                <div class="message received">
                                                                                    <div class="alert alert-primary" role="alert">
                                                                                        Hello! How can I help you?
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message sent">
                                                                                    <div class="alert alert-secondary" role="alert">
                                                                                        Hi! I have a question about your services.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message received">
                                                                                    <div class="alert alert-primary" role="alert">
                                                                                        Sure, feel free to ask.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message sent">
                                                                                    <div class="alert alert-secondary" role="alert">
                                                                                        Hi! I have a question about your services.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message sent">
                                                                                    <div class="alert alert-secondary" role="alert">
                                                                                        Hi! I have a question about your services.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="message sent">
                                                                                    <div class="alert alert-secondary" role="alert">
                                                                                        Hi! I have a question about your services.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
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
                                        <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="bg-success text-white card-header text-center">
                                    <select class="form-select" name="" id="">
                                        <option value="" selected>All Tickets</option>
                                        <option value="">To-Do</option>
                                        <option value="">In-Review</option>
                                        <option value="">Revisions</option>
                                    </select>

                                </div>


                                <input class="form-control mr-sm-2" type="search" placeholder="Search Tickets"
                                    aria-label="Search">


                                <div class="p-3">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">

                                            <h5>All Tickets Sample 1</h5>
                                            <hr>
                                            <p>This is only a sample ticket. Details goes here</p>
                                        </div>

                                    </div>

                                    <div class="card bg-dark text-white mb-4">
                                        <div class="card-body">

                                            <h5>All Tickets Sample 2</h5>
                                            <hr>
                                            <p>This is only a sample ticket. Details goes here</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">

                        <h5 class=""><b>Urgent Tickets</b></h5>
                        <div class="row mt-3" style="max-height: 300px; overflow-y: auto;">
                            <?php 
                                $volunteer_id = $_SESSION['volunteer']['id'];

                                $query = "SELECT * FROM tickets WHERE ticket_priority = 'Urgent'";
                                
                                $result = mysqli_query($conn, $query);
                                while ($rowUrgent = mysqli_fetch_array($result)) {
                                    $ticket_volunteers_ids = explode(',', $rowUrgent['ticket_volunteers_id']);
                                    if (in_array($volunteer_id, $ticket_volunteers_ids)) {
                            ?>
                            <div class="col-md-2 mt-3">
                                <div class="card mb-4 h-100">
                                    <div class="card-header bg-dark text-white">
                                        <h5><?php echo $rowUrgent['ticket_title'] ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <h5><?php echo $rowUrgent['ticket_desc'] ?></h5>
                                    </div>
                                    <div class="card-footer bg-danger text-white">
                                        <h6>Deadline: <?php echo $rowUrgent['ticket_deadline'] ?></h6>
                                    </div>
                                </div>
                            </div>

                            <?php 
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </main>

            <?php include('./include/footer.php') ?>

        </div>
    </div>
    <!-- additional libraries for comment view -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <?php include('./include/scripts.php') ?>
    <!-- script for calendar -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next, today',
                center: 'title',
                right: 'dayGridMonth'
            },
            initialView: 'dayGridMonth',
            events: [{
                    id: '1',
                    title: 'Event 1',
                    start: '2024-04-01',
                    end: '2024-04-03',
                    allDay: false,
                },
                {
                    id: '2',
                    title: 'Event 2',
                    start: '2024-04-05T10:00:00',
                    end: '2024-04-05T12:00:00',
                    allDay: false,
                },
            ],
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
                success: function(data) {
                    $("#currentDate").text(data);
                }
            });
        }

        // Initial update
        updateDate();
        var intervalId = setInterval(updateDate, 1000);
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