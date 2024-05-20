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
                            <div class="card mb-4" style="max-height: 500px; overflow-y: auto;">
                                <div class="text-secondary card-header text-center">
                                    Your Tickets
                                </div>
                                <?php 
                                    $volunteer_id = $_SESSION['volunteer']['id'];

                                    $query = "SELECT * FROM tickets WHERE ticket_status = 'Your-ticket' OR ticket_type = 'Ask Ticket'";
                                    
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $ticket_volunteers_ids = explode(',', $row['ticket_volunteers_id']);
                                        if (in_array($volunteer_id, $ticket_volunteers_ids)) {
                                        ?>
                                        <div class="p-2">
                                            <div class="card bg-secondary text-white mb-4">
                                                <div class="card-body">
                                                    <h6><?php echo $row['ticket_title'] ?></h6>
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
                                                        <h6 class="modal-title">Ticket Details</h6>
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
                                                                                <h6 class="mt-3">Ticket Title:</h6>
                                                                                <h6 class="mt-3"><b><?php echo $row['ticket_title'] ?></b> </h6>
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6 class="mt-3">Ticket Admin: </h6>
                                                                                <h6 class="mt-3"><b><?php echo $row['ticket_admin'] ?></b></h6>
                                                                            </div>
                                                                        </div>
                                                                        <h6 class="mt-3">Ticket Description: </h6>
                                                                        <h6 class="mt-3"><b><?php echo $row['ticket_desc'] ?></b></h6>
                                                                        <br>
                                                                        <hr>
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto">
                                                                                <h6>Priority Level:</h6>
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
                                                                                }elseif($row['ticket_priority'] == 'Urgent'){
                                                                                    ?>
                                                                                    <div class="alert alert-danger d-inline-flex align-items-center py-1"
                                                                                        role="alert">
                                                                                        <strong>Urgent</strong>
                                                                                    </div>
                                                                                <?php
                                                                                }else{
                                                                                    ?>
                                                                                    <div class="alert alert-secondary d-inline-flex align-items-center py-1"
                                                                                        role="alert">
                                                                                        <strong>N/A</strong>
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
                                                                                    elseif($row['ticket_status'] == 'Revision'){ 
                                                                                        ?>
                                                                                            <div class="alert alert-danger rounded-pill d-inline-flex align-items-center py-1">
                                                                                                <strong>Revision</strong>
                                                                                            </div>
                                                                                        <?php
                                                                                    }
                                                                                    else{
                                                                                    ?>
                                                                                        <div class="alert alert-secondary rounded-pill d-inline-flex align-items-center py-1">
                                                                                            <strong>N/A</strong>
                                                                                        </div>
                                                                                    <?php
                                                                                    }
                                                                                ?>
                                                                                
                                                                            </div>
                                                                        </div>

                                                                        <div style="max-height: 200px; overflow-y: auto;">
                                                                        <!-- <h6><b>Additional Instructions:</b></h6>
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
                                                                        ?> -->

                                                                        </div>
                                                                        
                                                                        <hr>
                                                                        <div>
                                                                            <h6>Ticket Volunteers: </h6>

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

                                                                            <?php 
                                                                                if($row['ticket_type'] == 'Ask Ticket'){
                                                                                    ?>
                                                                                    <button class="btn btn-secondary w-50" data-bs-toggle="modal" data-bs-target="#target<?php echo $row['id'] ?>" hidden>Add Target (Time)</button>
                                                                                    <?php
                                                                                }else{
                                                                                    ?>
                                                                                    <button class="btn btn-secondary w-50" data-bs-toggle="modal" data-bs-target="#target<?php echo $row['id'] ?>">Add Target (Time)</button>
                                                                                    <?php
                                                                                }
                                                                            ?>

                                                                            <!--Add Target-->
                                                                            <div class="modal fade" id="target<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header bg-dark text-white">
                                                                                            <h5 class="modal-title" id="">Add Target Time</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <form action="./include/process.php" method="POST">
                                                                                            <div class="modal-body">
                                                                                                <label for=""><b>Target Time:</b> </label>
                                                                                                <input type="time" class="form-control" name="target_time" required>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <input type="hidden" name="target_id" value="<?php echo $row['id'] ?>">
                                                                                                <button type="submit" name="target_submit" class="btn btn-primary w-100">Submit</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <br>
                                                                            <!-- <button class="btn btn-secondary w-50 mt-2">View Plan</button> -->
                                                                            <?php 
                                                                                if($row['ticket_type'] == 'Ask Ticket'){
                                                                                    ?>
                                                                                    <button class="btn btn-secondary w-25 mt-2" data-bs-toggle="modal" data-bs-target="#ask<?php echo $row['id'] ?>" hidden>Ask</button>
                                                                                    <?php
                                                                                }else{
                                                                                    ?>
                                                                                    <button class="btn btn-secondary w-25 mt-2" data-bs-toggle="modal" data-bs-target="#ask<?php echo $row['id'] ?>">Ask</button>
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                        
                                                                            <!--Ask-->
                                                                            <div class="modal fade" id="ask<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
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
                                                                                                <input type="hidden" name="ask_event_id" value="<?php echo $row['event_id'] ?>">
                                                                                                <button type="submit" name="ask_submit" class="btn btn-primary w-100">Submit</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <?php 
                                                                                if($row['ticket_type'] == 'Ask Ticket'){
                                                                                    ?>
                                                                                    <button class="btn btn-secondary w-25 mt-2" data-bs-toggle="modal" data-bs-target="#upload<?php echo $row['id'] ?>" hidden>Upload</button>
                                                                                    <?php
                                                                                }else{
                                                                                    ?>
                                                                                    <button class="btn btn-secondary w-25 mt-2" data-bs-toggle="modal" data-bs-target="#upload<?php echo $row['id'] ?>">Upload</button>
                                                                                    <?php
                                                                                }
                                                                            ?>

                                                                            <!--File Upload-->
                                                                            <div class="modal fade" id="upload<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header bg-dark text-white">
                                                                                            <h5 class="modal-title" id="">Upload File</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <form action="./include/process.php" method="POST" enctype="multipart/form-data">
                                                                                            <div class="modal-body">
                                                                                                <label for=""><b>File:</b> </label>
                                                                                                <input type="file" class="form-control" name="file_upload" accept="image/png, image/jpeg, application/pdf" required>

                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <input type="hidden" name="file_id" value="<?php echo $row['id'] ?>">
                                                                                                <input type="hidden" name="file_name" value="<?php echo $row['ticket_title'] ?>">
                                                                                                <button type="submit" name="file_submit" class="btn btn-primary w-100">Submit</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <br>
                                                                            <?php 
                                                                                if($row['ticket_type'] == 'Ask Ticket'){
                                                                                    ?>
                                                                                    <button class="btn btn-success w-50 mt-2" data-bs-toggle="modal" data-bs-target="#submit1<?php echo $row['id'] ?>" hidden>Submit</button>
                                                                                    <?php
                                                                                }else{
                                                                                    ?>
                                                                                    <button class="btn btn-success w-50 mt-2" data-bs-toggle="modal" data-bs-target="#submit1<?php echo $row['id'] ?>">Submit</button>
                                                                                    <?php
                                                                                }
                                                                            ?>

                                                                            <!--Submit Ticket-->
                                                                            <div class="modal fade" id="submit1<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header bg-dark text-white">
                                                                                            <h5 class="modal-title" id="">Submit Ticket</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <form action="./include/process.php" method="POST">
                                                                                            <div class="modal-body">
                                                                                                <h5>Are you sure you want to submit this ticket? (Admin will review this)</h5>
                                                                                                <p class="text-danger">* This action is irreversible!</p>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <input type="hidden" name="submit_id" value="<?php echo $row['id'] ?>">
                                                                                                <button type="submit" name="submit_ticket" class="btn btn-success w-100">Submit</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade p-3" id="comments<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="comments-tab">
                                                                <div class="row mt-12">
                                                                    <!-- right side of the modal comment display -->
                                                                    <div class="col-md-12">
                                                                        <div class="container">
                                                                            <div class="chat-container" style="max-height: 300px; overflow-y: auto;">
                                                                                <?php 
                                                                                    $comment_id = $row['id'];
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
                                                                                <input type="hidden" name="ticket_id" value="<?php echo $row['id'] ?>">
                                                                                <div class="d-flex">
                                                                                    <textarea class="form-control me-2" name="comment" id="comment" required></textarea>
                                                                                    <button type="submit" class="btn btn-success" title="Send" name="add_comment"><i class="fa-solid fa-paper-plane"></i></button>
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
                                            $ticket_event_id = $row['event_id'];
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
                                                    <h6><?php echo $row['ticket_title'] ?></h6>
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
                                                        <h6 class="modal-title">Ticket Details</h6>
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
                                                                                <h6 class="mt-3">Ticket Title:</h6>
                                                                                <h6 class="mt-3"><b><?php echo $row['ticket_title'] ?></b> </h6>
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6 class="mt-3">Ticket Admin: </h6>
                                                                                <h6 class="mt-3"><b><?php echo $row['ticket_admin'] ?></b></h6>
                                                                            </div>
                                                                        </div>
                                                                        <h6 class="mt-3">Ticket Description: </h6>
                                                                        <h6 class="mt-3"><b><?php echo $row['ticket_desc'] ?></b></h6>
                                                                        <br>
                                                                        <hr>
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto">
                                                                                <h6>Priority Level:</h6>
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
                                                                                <h6>Status:</h6>
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
                                                                            <h6>Ticket Volunteers: </h6>

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
                                                                            <button class="btn btn-secondary w-50" data-bs-toggle="modal" data-bs-target="#target<?php echo $row['id'] ?>">Add Target (Time)</button>

                                                                            <!--Add Target-->
                                                                            <div class="modal fade" id="target<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header bg-dark text-white">
                                                                                            <h5 class="modal-title" id="">Add Target Time</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <form action="./include/process.php" method="POST">
                                                                                            <div class="modal-body">
                                                                                                <label for=""><b>Target Time:</b> </label>
                                                                                                <input type="time" class="form-control" name="target_time" required>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <input type="hidden" name="target_id" value="<?php echo $row['id'] ?>">
                                                                                                <button type="submit" name="target_submit" class="btn btn-primary w-100">Submit</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <!-- <button class="btn btn-secondary w-50 mt-2">View Plan</button> -->
                                                                            <button class="btn btn-secondary w-25 mt-2" data-bs-toggle="modal" data-bs-target="#ask<?php echo $row['id'] ?>">Ask</button>

                                                                            <!--Ask-->
                                                                            <div class="modal fade" id="ask<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
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
                                                                                                <input type="hidden" name="ask_event_id" value="<?php echo $row['event_id'] ?>">
                                                                                                <button type="submit" name="ask_submit" class="btn btn-primary w-100">Submit</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <button class="btn btn-secondary w-25 mt-2" data-bs-toggle="modal" data-bs-target="#upload<?php echo $row['id'] ?>">Upload</button>

                                                                            <!--File Upload-->
                                                                            <div class="modal fade" id="upload<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header bg-dark text-white">
                                                                                            <h5 class="modal-title" id="">Upload File</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <form action="./include/process.php" method="POST" enctype="multipart/form-data">
                                                                                            <div class="modal-body">
                                                                                                <label for=""><b>File:</b> </label>
                                                                                                <input type="file" class="form-control" name="file_upload" accept="image/png, image/jpeg, application/pdf" required>

                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <input type="hidden" name="file_id" value="<?php echo $row['id'] ?>">
                                                                                                <input type="hidden" name="file_name" value="<?php echo $row['ticket_title'] ?>">
                                                                                                <button type="submit" name="file_submit" class="btn btn-primary w-100">Submit</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <button class="btn btn-success w-50 mt-2" data-bs-toggle="modal" data-bs-target="#submit1<?php echo $row['id'] ?>">Submit</button>

                                                                            <!--Submit Ticket-->
                                                                            <div class="modal fade" id="submit1<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header bg-dark text-white">
                                                                                            <h5 class="modal-title" id="">Submit Ticket</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <form action="./include/process.php" method="POST">
                                                                                            <div class="modal-body">
                                                                                                <h5>Are you sure you want to submit this ticket? (Admin will review this)</h5>
                                                                                                <p class="text-danger">* This action is irreversible!</p>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <input type="hidden" name="submit_id" value="<?php echo $row['id'] ?>">
                                                                                                <button type="submit" name="submit_ticket" class="btn btn-success w-100">Submit</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                         
                                                                            <?php 
                                                                                $file_path = $row['file_uploaded'];
                                                                                
                                                                                if($file_path == ''){
                                                                                    $display_file_path = 'team_dashboard.php';
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
                                                            <div class="tab-pane fade p-3" id="comments<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="comments-tab">
                                                                <div class="row mt-12">
                                                                    <!-- right side of the modal comment display -->
                                                                    <div class="col-md-12">
                                                                        <div class="container">
                                                                            <div class="chat-container" style="max-height: 300px; overflow-y: auto;">
                                                                                <?php 
                                                                                    $comment_id = $row['id'];
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
                                                                                <input type="hidden" name="ticket_id" value="<?php echo $row['id'] ?>">
                                                                                <div class="d-flex">
                                                                                    <textarea class="form-control me-2" name="comment" id="comment" required></textarea>
                                                                                    <button type="submit" class="btn btn-success" title="Send" name="add_comment"><i class="fa-solid fa-paper-plane"></i></button>
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
                                            $ticket_event_id = $row['event_id'];
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
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div style="max-height: 500px; overflow-y: auto;">
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
                                                        <h6><?php echo $row['ticket_title'] ?></h6>
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
                                                            <h6 class="modal-title">Ticket Details</h6>
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
                                                                                    <h6 class="mt-3">Ticket Title:</h6>
                                                                                    <h6 class="mt-3"><b><?php echo $row['ticket_title'] ?></b> </h6>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <h6 class="mt-3">Ticket Admin: </h6>
                                                                                    <h6 class="mt-3"><b><?php echo $row['ticket_admin'] ?></b></h6>
                                                                                </div>
                                                                            </div>
                                                                            <h6 class="mt-3">Ticket Description: </h6>
                                                                            <h6 class="mt-3"><b><?php echo $row['ticket_desc'] ?></b></h6>
                                                                            <br>
                                                                            <hr>
                                                                            <div class="row align-items-center">
                                                                                <div class="col-auto">
                                                                                    <h6>Priority Level:</h6>
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
                                                                                    <h6>Status:</h6>
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
                                                                                <h6>Ticket Volunteers: </h6>

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
                                                                                <button class="btn btn-secondary w-50" data-bs-toggle="modal" data-bs-target="#target<?php echo $row['id'] ?>">Add Target (Time)</button>

                                                                                <!--Add Target-->
                                                                                <div class="modal fade" id="target<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-dark text-white">
                                                                                                <h5 class="modal-title" id="">Add Target Time</h5>
                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                            </div>
                                                                                            <form action="./include/process.php" method="POST">
                                                                                                <div class="modal-body">
                                                                                                    <label for=""><b>Target Time:</b> </label>
                                                                                                    <input type="time" class="form-control" name="target_time" required>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <input type="hidden" name="target_id" value="<?php echo $row['id'] ?>">
                                                                                                    <button type="submit" name="target_submit" class="btn btn-primary w-100">Submit</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <!-- <button class="btn btn-secondary w-50 mt-2">View Plan</button> -->
                                                                                <button class="btn btn-secondary w-25 mt-2" data-bs-toggle="modal" data-bs-target="#ask<?php echo $row['id'] ?>">Ask</button>

                                                                                <!--Ask-->
                                                                                <div class="modal fade" id="ask<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
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
                                                                                                    <input type="hidden" name="ask_event_id" value="<?php echo $row['event_id'] ?>">
                                                                                                    <button type="submit" name="ask_submit" class="btn btn-primary w-100">Submit</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <button class="btn btn-secondary w-25 mt-2" data-bs-toggle="modal" data-bs-target="#upload<?php echo $row['id'] ?>">Upload</button>

                                                                                <!--File Upload-->
                                                                                <div class="modal fade" id="upload<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-dark text-white">
                                                                                                <h5 class="modal-title" id="">Upload File</h5>
                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                            </div>
                                                                                            <form action="./include/process.php" method="POST" enctype="multipart/form-data">
                                                                                                <div class="modal-body">
                                                                                                    <label for=""><b>File:</b> </label>
                                                                                                    <input type="file" class="form-control" name="file_upload" accept="image/png, image/jpeg, application/pdf" required>

                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <input type="hidden" name="file_id" value="<?php echo $row['id'] ?>">
                                                                                                    <input type="hidden" name="file_name" value="<?php echo $row['ticket_title'] ?>">
                                                                                                    <button type="submit" name="file_submit" class="btn btn-primary w-100">Submit</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <?php 
                                                                                    $file_path = $row['file_uploaded'];
                                                                                    
                                                                                    if($file_path == ''){
                                                                                        $display_file_path = 'team_dashboard.php';
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
                                                                <div class="tab-pane fade p-3" id="comments<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="comments-tab">
                                                                    <div class="row mt-12">
                                                                        <!-- right side of the modal comment display -->
                                                                        <div class="col-md-12">
                                                                            <div class="container">
                                                                                <div class="chat-container" style="max-height: 300px; overflow-y: auto;">
                                                                                    <?php 
                                                                                        $comment_id = $row['id'];
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
                                                                                    <input type="hidden" name="ticket_id" value="<?php echo $row['id'] ?>">
                                                                                    <div class="d-flex">
                                                                                        <textarea class="form-control me-2" name="comment" id="comment" required></textarea>
                                                                                        <button type="submit" class="btn btn-success" title="Send" name="add_comment"><i class="fa-solid fa-paper-plane"></i></button>
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
                                                $ticket_event_id = $row['event_id'];
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
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-2">
                            <div style="max-height: 500px; overflow-y: auto;">
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
                                                        <h6><?php echo $row['ticket_title'] ?></h6>
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
                                                            <h6 class="modal-title">Ticket Details</h6>
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
                                                                                    <h6 class="mt-3">Ticket Title:</h6>
                                                                                    <h6 class="mt-3"><b><?php echo $row['ticket_title'] ?></b> </h6>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <h6 class="mt-3">Ticket Admin: </h6>
                                                                                    <h6 class="mt-3"><b><?php echo $row['ticket_admin'] ?></b></h6>
                                                                                </div>
                                                                            </div>
                                                                            <h6 class="mt-3">Ticket Description: </h6>
                                                                            <h6 class="mt-3"><b><?php echo $row['ticket_desc'] ?></b></h6>
                                                                            <br>
                                                                            <hr>
                                                                            <div class="row align-items-center">
                                                                                <div class="col-auto">
                                                                                    <h6>Priority Level:</h6>
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
                                                                                    <h6>Status:</h6>
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
                                                                                <h6>Ticket Volunteers: </h6>

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
                                                                                <button class="btn btn-secondary w-50" data-bs-toggle="modal" data-bs-target="#target<?php echo $row['id'] ?>">Add Target (Time)</button>

                                                                                <!--Add Target-->
                                                                                <div class="modal fade" id="target<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-dark text-white">
                                                                                                <h5 class="modal-title" id="">Add Target Time</h5>
                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                            </div>
                                                                                            <form action="./include/process.php" method="POST">
                                                                                                <div class="modal-body">
                                                                                                    <label for=""><b>Target Time:</b> </label>
                                                                                                    <input type="time" class="form-control" name="target_time" required>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <input type="hidden" name="target_id" value="<?php echo $row['id'] ?>">
                                                                                                    <button type="submit" name="target_submit" class="btn btn-primary w-100">Submit</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <!-- <button class="btn btn-secondary w-50 mt-2">View Plan</button> -->
                                                                                <button class="btn btn-secondary w-25 mt-2" data-bs-toggle="modal" data-bs-target="#ask<?php echo $row['id'] ?>">Ask</button>

                                                                                <!--Ask-->
                                                                                <div class="modal fade" id="ask<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
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
                                                                                                    <input type="hidden" name="ask_event_id" value="<?php echo $row['event_id'] ?>">
                                                                                                    <button type="submit" name="ask_submit" class="btn btn-primary w-100">Submit</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <button class="btn btn-secondary w-25 mt-2" data-bs-toggle="modal" data-bs-target="#upload<?php echo $row['id'] ?>">Upload</button>

                                                                                <!--File Upload-->
                                                                                <div class="modal fade" id="upload<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-dark text-white">
                                                                                                <h5 class="modal-title" id="">Upload File</h5>
                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                            </div>
                                                                                            <form action="./include/process.php" method="POST" enctype="multipart/form-data">
                                                                                                <div class="modal-body">
                                                                                                    <label for=""><b>File:</b> </label>
                                                                                                    <input type="file" class="form-control" name="file_upload" accept="image/png, image/jpeg, application/pdf" required>

                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <input type="hidden" name="file_id" value="<?php echo $row['id'] ?>">
                                                                                                    <input type="hidden" name="file_name" value="<?php echo $row['ticket_title'] ?>">
                                                                                                    <button type="submit" name="file_submit" class="btn btn-primary w-100">Submit</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <br>
                                                                                <button class="btn btn-success w-50 mt-2" data-bs-toggle="modal" data-bs-target="#submit1<?php echo $row['id'] ?>">Submit</button>

                                                                                <!--Submit Ticket-->
                                                                                <div class="modal fade" id="submit1<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-dark text-white">
                                                                                                <h5 class="modal-title" id="">Submit Ticket</h5>
                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                            </div>
                                                                                            <form action="./include/process.php" method="POST">
                                                                                                <div class="modal-body">
                                                                                                    <h5>Are you sure you want to submit this ticket? (Admin will review this)</h5>
                                                                                                    <p class="text-danger">* This action is irreversible!</p>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <input type="hidden" name="submit_id" value="<?php echo $row['id'] ?>">
                                                                                                    <button type="submit" name="submit_ticket" class="btn btn-success w-100">Submit</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?php 
                                                                                    $file_path = $row['file_uploaded'];
                                                                                    
                                                                                    if($file_path == ''){
                                                                                        $display_file_path = 'team_dashboard.php';
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
                                                                <div class="tab-pane fade p-3" id="comments<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="comments-tab">
                                                                    <div class="row mt-12">
                                                                        <!-- right side of the modal comment display -->
                                                                        <div class="col-md-12">
                                                                            <div class="container">
                                                                                <div class="chat-container" style="max-height: 300px; overflow-y: auto;">
                                                                                    <?php 
                                                                                        $comment_id = $row['id'];
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
                                                                                    <input type="hidden" name="ticket_id" value="<?php echo $row['id'] ?>">
                                                                                    <div class="d-flex">
                                                                                        <textarea class="form-control me-2" name="comment" id="comment" required></textarea>
                                                                                        <button type="submit" class="btn btn-success" title="Send" name="add_comment"><i class="fa-solid fa-paper-plane"></i></button>
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
                                                $ticket_event_id = $row['event_id'];
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
                                            <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-4">
                            <div style="max-height: 500px; overflow-y: auto;">
                                <div class="card mb-4">
                                    <div class="text-success card-header text-center">
                                        Completed 
                                    </div>
                                    <?php 
                                        $volunteer_id = $_SESSION['volunteer']['id'];

                                        $query = "SELECT * FROM tickets WHERE ticket_status = 'Completed'";
                                        
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $ticket_volunteers_ids = explode(',', $row['ticket_volunteers_id']);
                                            if (in_array($volunteer_id, $ticket_volunteers_ids)) {
                                            ?>
                                            <div class="p-2">
                                                <div class="card bg-success text-white mb-4">
                                                    <div class="card-body">
                                                        <h6><?php echo $row['ticket_title'] ?></h6>
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
                                                            <h6 class="modal-title">Ticket Details</h6>
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
                                                                                    <h6 class="mt-3">Ticket Title:</h6>
                                                                                    <h6 class="mt-3"><b><?php echo $row['ticket_title'] ?></b> </h6>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <h6 class="mt-3">Ticket Admin: </h6>
                                                                                    <h6 class="mt-3"><b><?php echo $row['ticket_admin'] ?></b></h6>
                                                                                </div>
                                                                            </div>
                                                                            <h6 class="mt-3">Ticket Description: </h6>
                                                                            <h6 class="mt-3"><b><?php echo $row['ticket_desc'] ?></b></h6>
                                                                            <br>
                                                                            <hr>
                                                                            <div class="row align-items-center">
                                                                                <div class="col-auto">
                                                                                    <h6>Priority Level:</h6>
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
                                                                                    <h6>Status:</h6>
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
                                                                                        elseif($row['ticket_status'] == 'Completed'){ 
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
                                                                                <h6>Ticket Volunteers: </h6>

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
                                                                            <?php 
                                                                                    $file_path = $row['file_uploaded'];
                                                                                    
                                                                                    if($file_path == ''){
                                                                                        $display_file_path = 'team_dashboard.php';
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
                                                                <div class="tab-pane fade p-3" id="comments<?php echo $row['id'] ?>" role="tabpanel" aria-labelledby="comments-tab">
                                                                    <div class="row mt-12">
                                                                        <!-- right side of the modal comment display -->
                                                                        <div class="col-md-12">
                                                                            <div class="container">
                                                                                <div class="chat-container" style="max-height: 300px; overflow-y: auto;">
                                                                                    <?php 
                                                                                        $comment_id = $row['id'];
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
                                                                                    <input type="hidden" name="ticket_id" value="<?php echo $row['id'] ?>">
                                                                                    <div class="d-flex">
                                                                                        <textarea class="form-control me-2" name="comment" id="comment" required></textarea>
                                                                                        <button type="submit" class="btn btn-success" title="Send" name="add_comment"><i class="fa-solid fa-paper-plane"></i></button>
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
                                                $ticket_event_id = $row['event_id'];
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
                                            <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                    <hr>
                    <div class="row">

                        <h6 class=""><b>Urgent Tickets</b></h6>
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
                                        <h6><?php echo $rowUrgent['ticket_title'] ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h6><?php echo $rowUrgent['ticket_desc'] ?></h6>
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