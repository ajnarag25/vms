<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Team Dashboard - Volunteer Management Strageties</title>
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

                        <a class="nav-link active" href="team_dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                            Team Dashboard
                        </a>
<!-- 
                        <a class="nav-link" href="event_plan.php">
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
                                    From Volunteers
                                </div>
                                <?php 

                                    $query = "SELECT * FROM tickets WHERE ticket_type = 'Ask Ticket' AND ticket_status = ''";
                                    
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
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
                                                                  
                                                                                <!-- <button class="btn btn-sm btn-dark text-white" title="Update" style="font-size:8px" data-bs-toggle="modal" data-bs-target="#priority<?php echo $row['id'] ?>">
                                                                                <i class="fa-solid fa-pencil"></i></button> -->

                                                                                <!-- Modal Priority -->
                                                                                <!-- <div class="modal fade" id="priority<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-dark text-white">
                                                                                                <h6 class="modal-title" id="">Update Priority Level</h6>
                                                                                            </div>
                                                                                            <form action="./include/process.php" method="POST">
                                                                                                <div class="modal-body text-center">
                                                                                                    <label for="">Select Priority Level:</label>
                                                                                                    <br>
                                                                                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                                                        <input type="radio" class="btn-check" name="updtBtn" value="Urgent" id="updtUrgent<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                        <label class="btn btn-outline-danger" for="updtUrgent<?php echo $row['id'] ?>">Urgent</label>

                                                                                                        <input type="radio" class="btn-check" name="updtBtn" value="High" id="updtHigh<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                        <label class="btn btn-outline-warning" for="updtHigh<?php echo $row['id'] ?>">High</label>

                                                                                                        <input type="radio" class="btn-check" name="updtBtn" value="Mid" id="updtMid<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                        <label class="btn btn-outline-primary" for="updtMid<?php echo $row['id'] ?>">Mid</label>

                                                                                                        <input type="radio" class="btn-check" name="updtBtn" value="Low" id="updtLow<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                        <label class="btn btn-outline-secondary" for="updtLow<?php echo $row['id'] ?>">Low</label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <input type="hidden" name="priority_id" value="<?php echo $row['id'] ?>">
                                                                                                    <button type="submit" class="btn btn-dark w-100" name="update_priority_team">Update</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> -->

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
                                                                                
                                                                                <!-- <button class="btn btn-sm btn-dark text-white" title="Update" style="font-size:8px" data-bs-toggle="modal" data-bs-target="#status<?php echo $row['id'] ?>">
                                                                                <i class="fa-solid fa-pencil"></i></button> -->

                                                                                <!-- Modal Status -->
                                                                                <!-- <div class="modal fade" id="status<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-dark text-white">
                                                                                                <h6 class="modal-title" id="">Update Status</h6>
                                                                                            </div>
                                                                                            <form action="./include/process.php" method="POST">
                                                                                                <div class="modal-body">
                                                                                                    <label for="">Select Status:</label>
                                                                                                    <select class="form-select" name="stat" id="" required>
                                                                                                        <option value="" selected disabled>--<?php echo $row['ticket_status'] ?>--</option>
                                                                                                        <option value="Your-ticket">Your-Ticket</option>
                                                                                                        <option value="To-Do">To-Do</option>
                                                                                                        <option value="In-Review">In-Review</option>
                                                                                                        <option value="Revision">Revision</option>
                                                                                                        <option value="Completed">Completed</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <input type="hidden" name="status_id" value="<?php echo $row['id'] ?>">
                                                                                                    <button type="submit" name="update_status_team" class="btn btn-dark w-100">Update</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> -->
                                                                            </div>
                                                                        </div>

                                                                            <!-- <button
                                                                            style="border: none; background-color: transparent; padding: 0;" title="Add" data-bs-toggle="modal" data-bs-target="#instructions<?php echo $row['id'] ?>">
                                                                            <i class="bi bi-plus-square-fill">
                                                                            </i></button>  -->
                                                                            <label for="">Additional Instructions</label>

                                                                            <!-- Modal Additional Instructions -->
                                                                            <!-- <div class="modal fade" id="instructions<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header bg-dark text-white">
                                                                                            <h6 class="modal-title" id="">Add Additional Instructions</h6>
                                                                                        </div>
                                                                                        <form action="./include/process.php" method="POST">
                                                                                            <div class="modal-body">
                                                                                                <div class="instructions" style="max-height: 200px; overflow-y: auto;">
                                                                                                    <button id="addBtn<?php echo $row['id'] ?>" type="button" class="btn btn-sm btn-secondary w-100"><i class="bi bi-plus-square-fill"></i> Add Instructions</button>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <input type="hidden" name="instructions_id" value="<?php echo $row['id'] ?>">
                                                                                                <button type="submit" name="addInstructions_team" class="btn btn-dark w-100">Add</button>
                                                                                            </div>
                                                                                        </form>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div> -->

                                                                            <!--Add Instruction Input-->
                                                                            <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                                            <script>
                                                                                $(document).ready(function(){
                                                                                    var count = 1;
                                                                                    $("#addBtn<?php echo $row['id'] ?>").click(function(){
                                                                                        var input = $("<input>")
                                                                                            .addClass("form-control mt-3")
                                                                                            .attr("type", "text")
                                                                                            .attr("name", "instruction_" + count)
                                                                                            .prop("required", true)
                                                                                            .attr("placeholder", "Instruction " + count);
                                                                                        $(".instructions").append(input);
                                                                                        count++;
                                                                                    });

                                                                                });
                                                                            </script> -->
                                                                        
                                                                        <div style="max-height: 200px; overflow-y: auto;">
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
                                                                            <h6>Ticket Volunteers: 
                                                                                <!-- <button
                                                                                style="border: none; background-color: transparent; padding: 0;" title="Add" data-bs-toggle="modal" data-bs-target="#addVolunteer<?php echo $row['id'] ?>">
                                                                                <i class="bi bi-plus-square-fill">
                                                                                </i></button> -->
                                                                            </h6>

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

                                                                            <!-- Modal Add Volunteer -->
                                                                            <!-- <div class="modal modal-md fade" id="addVolunteer<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header bg-dark text-white">
                                                                                            <h6 class="modal-title" id="">Add Volunteer</h6>
                                                                                        </div>
                                                                                        <form action="./include/process.php" method="POST">
                                                                                            <div class="modal-body">
                                                                                                <table class="table" id="">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th scope="col"></th>
                                                                                                            <th scope="col">Volunteers Name</th>
                                                                                                            <th scope="col">Email</th>
                                                                                                            <th scope="col">View</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                    <?php 
                                                                                                        $idss = $row['ticket_volunteers_id'];
                                                                                                        $idsArrays = explode(',', $idss);

                                                                                                        $idsStrings = "'" . implode("', '", $idsArrays) . "'";

                                                                                                        $query_volunteers = "SELECT * FROM accounts WHERE id IN ($idsStrings)";
                                                                                                        $result_volunteers = mysqli_query($conn, $query_volunteers);

                                                                                                        $volunteerNames = [];
                                                                                                        while ($row_volunteers = mysqli_fetch_array($result_volunteers)) {
                                                                                                            $volunteerNames[] = $row_volunteers['name'];
                                                                                                        }

                                                                                                        $volunteerNamesString = "'" . implode("', '", $volunteerNames) . "'";
                                                                                                        $queryVolunteer = "SELECT * FROM accounts WHERE type = 'volunteer' AND name NOT IN ($volunteerNamesString)";

                                                                                                        $resultVolunteer = mysqli_query($conn, $queryVolunteer);
                                                                                                        while ($addVolunteer = mysqli_fetch_array($resultVolunteer)) {
                                                                                                    ?>
                                                                                                    <tr>
                                                                                                        <td><input type="checkbox" name="volunteer_id[]" value="<?php echo $addVolunteer['id'] ?>"></td>
                                                                                                        <td><?php echo $addVolunteer['name'] ?></td>
                                                                                                        <td><?php echo $addVolunteer['email'] ?></td>
                                                                                                        <td><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#addVolunteer<?php echo $addVolunteer['id'] ?><?php echo $row['id'] ?>"><i class="fa-solid fa-magnifying-glass"></i></button></td>
                                                                                                    </tr>

                                                                                                    <div class="modal modal-lg fade" id="addVolunteer<?php echo $addVolunteer['id'] ?><?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="volunteer" aria-hidden="true">
                                                                                                        <div class="modal-dialog modal-dialog-scrollable">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header bg-dark text-white">
                                                                                                                    <h6 class="modal-title" id="exampleModalLabel">Volunteer: <?php echo $addVolunteer['name'] ?></h6>
                                                                                                                
                                                                                                                </div>
                                                                                                                <div class="modal-body">
                                                                                                                    <h3>Volunteer Details:</h3>
                                                                                                                    <ul>
                                                                                                                        <li>Name: <?php echo $addVolunteer['name'] ?></li>
                                                                                                                        <li>Username: <?php echo $addVolunteer['username'] ?></li>
                                                                                                                        <li>Email: <?php echo $addVolunteer['email'] ?></li>
                                                                                                                        <li>Contact: <?php echo $addVolunteer['contact'] ?></li>
                                                                                                                    </ul>
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
                                                                                            <div class="modal-footer">
                                                                                                <input type="hidden" name="vl_id" value="<?php echo $row['id'] ?>">
                                                                                                <button type="submit" name="addVolunteers_team" class="btn btn-dark w-100">Add</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div> -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div id="progress-bar-container<?php echo $row['id'] ?>"
                                                                            style="position: relative;">
                                                                        </div>
                                                                
                                                                        <hr>
                                                                        <h6>Ticket Type: <b><?php echo $row['ticket_type'] ?></b> </h6>
                                                                        <h6 class="mt-3">Ticket Deadline: <b class="text-danger"><?php echo $row['ticket_deadline'] ?></b> </h6>
                                                                        <div class="text-center mt-5">
                                                                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#markAsViewed<?php echo $row['id'] ?>">Mark as Viewed</button>
                                                                        </div>

                                                                        <!--Mark as Viewed-->
                                                                        <div class="modal fade" id="markAsViewed<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header bg-dark text-white">
                                                                                        <h5 class="modal-title" id="">Mark as Viewed</h5>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <form action="./include/process.php" method="POST">
                                                                                        <div class="modal-body text-center">
                                                                                            <h5><b>Are you sure you want to mark as viewed this ticket?</b></h5>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <input type="hidden" name="mark_id" value="<?php echo $row['id'] ?>">
                                                                                            <button type="submit" name="mark_submit" class="btn btn-success">Yes</button>
                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">No</button>
                                                                                        </div>
                                                                                    </form>
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
                                ?>
                       
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div style="max-height: 500px; overflow-y: auto;">
                                <div class="card mb-4">
                                    <div class="text-primary card-header text-center">
                                        To-Review
                                    </div>
                                    <?php 
                                        $query = "SELECT * FROM tickets WHERE ticket_status = 'In-Review'";
                                        
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
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
                                                                                    <!-- <button class="btn btn-sm btn-dark text-white" title="Update" style="font-size:8px" data-bs-toggle="modal" data-bs-target="#priority<?php echo $row['id'] ?>">
                                                                                    <i class="fa-solid fa-pencil"></i></button> -->

                                                                                    <!-- Modal Priority -->
                                                                                    <!-- <div class="modal fade" id="priority<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header bg-dark text-white">
                                                                                                    <h6 class="modal-title" id="">Update Priority Level</h6>
                                                                                                </div>
                                                                                                <form action="./include/process.php" method="POST">
                                                                                                    <div class="modal-body text-center">
                                                                                                        <label for="">Select Priority Level:</label>
                                                                                                        <br>
                                                                                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                                                            <input type="radio" class="btn-check" name="updtBtn" value="Urgent" id="updtUrgent<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                            <label class="btn btn-outline-danger" for="updtUrgent<?php echo $row['id'] ?>">Urgent</label>

                                                                                                            <input type="radio" class="btn-check" name="updtBtn" value="High" id="updtHigh<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                            <label class="btn btn-outline-warning" for="updtHigh<?php echo $row['id'] ?>">High</label>

                                                                                                            <input type="radio" class="btn-check" name="updtBtn" value="Mid" id="updtMid<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                            <label class="btn btn-outline-primary" for="updtMid<?php echo $row['id'] ?>">Mid</label>

                                                                                                            <input type="radio" class="btn-check" name="updtBtn" value="Low" id="updtLow<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                            <label class="btn btn-outline-secondary" for="updtLow<?php echo $row['id'] ?>">Low</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <input type="hidden" name="priority_id" value="<?php echo $row['id'] ?>">
                                                                                                        <button type="submit" class="btn btn-dark w-100" name="update_priority_team">Update</button>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> -->

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
                                                                                    
                                                                                    <!-- <button class="btn btn-sm btn-dark text-white" title="Update" style="font-size:8px" data-bs-toggle="modal" data-bs-target="#status<?php echo $row['id'] ?>">
                                                                                    <i class="fa-solid fa-pencil"></i></button> -->

                                                                                    <!-- Modal Status -->
                                                                                    <!-- <div class="modal fade" id="status<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header bg-dark text-white">
                                                                                                    <h6 class="modal-title" id="">Update Status</h6>
                                                                                                </div>
                                                                                                <form action="./include/process.php" method="POST">
                                                                                                    <div class="modal-body">
                                                                                                        <label for="">Select Status:</label>
                                                                                                        <select class="form-select" name="stat" id="" required>
                                                                                                            <option value="" selected disabled>--<?php echo $row['ticket_status'] ?>--</option>
                                                                                                            <option value="Your-ticket">Your-Ticket</option>
                                                                                                            <option value="To-Do">To-Do</option>
                                                                                                            <option value="In-Review">In-Review</option>
                                                                                                            <option value="Revision">Revision</option>
                                                                                                            <option value="Completed">Completed</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <input type="hidden" name="status_id" value="<?php echo $row['id'] ?>">
                                                                                                        <button type="submit" name="update_status_team" class="btn btn-dark w-100">Update</button>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> -->
                                                                                </div>
                                                                            </div>

                                                                                <!-- <button
                                                                                style="border: none; background-color: transparent; padding: 0;" title="Add" data-bs-toggle="modal" data-bs-target="#instructions<?php echo $row['id'] ?>">
                                                                                <i class="bi bi-plus-square-fill">
                                                                                </i></button>  -->
                                                                                <label for="">Additional Instructions</label>

                                                                                <!-- Modal Additional Instructions -->
                                                                                <!-- <div class="modal fade" id="instructions<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-dark text-white">
                                                                                                <h6 class="modal-title" id="">Add Additional Instructions</h6>
                                                                                            </div>
                                                                                            <form action="./include/process.php" method="POST">
                                                                                                <div class="modal-body">
                                                                                                    <div class="instructions" style="max-height: 200px; overflow-y: auto;">
                                                                                                        <button id="addBtn<?php echo $row['id'] ?>" type="button" class="btn btn-sm btn-secondary w-100"><i class="bi bi-plus-square-fill"></i> Add Instructions</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <input type="hidden" name="instructions_id" value="<?php echo $row['id'] ?>">
                                                                                                    <button type="submit" name="addInstructions_team" class="btn btn-dark w-100">Add</button>
                                                                                                </div>
                                                                                            </form>
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                </div> -->

                                                                                <!--Add Instruction Input-->
                                                                                <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                                                <script>
                                                                                    $(document).ready(function(){
                                                                                        var count = 1;
                                                                                        $("#addBtn<?php echo $row['id'] ?>").click(function(){
                                                                                            var input = $("<input>")
                                                                                                .addClass("form-control mt-3")
                                                                                                .attr("type", "text")
                                                                                                .attr("name", "instruction_" + count)
                                                                                                .prop("required", true)
                                                                                                .attr("placeholder", "Instruction " + count);
                                                                                            $(".instructions").append(input);
                                                                                            count++;
                                                                                        });

                                                                                    });
                                                                                </script> -->
                                                                            
                                                                            <div style="max-height: 200px; overflow-y: auto;">
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
                                                                                <h6>Ticket Volunteers: 
                                                                                    <!-- <button
                                                                                    style="border: none; background-color: transparent; padding: 0;" title="Add" data-bs-toggle="modal" data-bs-target="#addVolunteer<?php echo $row['id'] ?>">
                                                                                    <i class="bi bi-plus-square-fill">
                                                                                    </i></button> -->
                                                                                </h6>

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

                                                                                <!-- Modal Add Volunteer -->
                                                                                <!-- <div class="modal modal-md fade" id="addVolunteer<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-dark text-white">
                                                                                                <h6 class="modal-title" id="">Add Volunteer</h6>
                                                                                            </div>
                                                                                            <form action="./include/process.php" method="POST">
                                                                                                <div class="modal-body">
                                                                                                    <table class="table" id="">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th scope="col"></th>
                                                                                                                <th scope="col">Volunteers Name</th>
                                                                                                                <th scope="col">Email</th>
                                                                                                                <th scope="col">View</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                        <?php 
                                                                                                            $idss = $row['ticket_volunteers_id'];
                                                                                                            $idsArrays = explode(',', $idss);

                                                                                                            $idsStrings = "'" . implode("', '", $idsArrays) . "'";

                                                                                                            $query_volunteers = "SELECT * FROM accounts WHERE id IN ($idsStrings)";
                                                                                                            $result_volunteers = mysqli_query($conn, $query_volunteers);

                                                                                                            $volunteerNames = [];
                                                                                                            while ($row_volunteers = mysqli_fetch_array($result_volunteers)) {
                                                                                                                $volunteerNames[] = $row_volunteers['name'];
                                                                                                            }

                                                                                                            $volunteerNamesString = "'" . implode("', '", $volunteerNames) . "'";
                                                                                                            $queryVolunteer = "SELECT * FROM accounts WHERE type = 'volunteer' AND name NOT IN ($volunteerNamesString)";

                                                                                                            $resultVolunteer = mysqli_query($conn, $queryVolunteer);
                                                                                                            while ($addVolunteer = mysqli_fetch_array($resultVolunteer)) {
                                                                                                        ?>
                                                                                                        <tr>
                                                                                                            <td><input type="checkbox" name="volunteer_id[]" value="<?php echo $addVolunteer['id'] ?>"></td>
                                                                                                            <td><?php echo $addVolunteer['name'] ?></td>
                                                                                                            <td><?php echo $addVolunteer['email'] ?></td>
                                                                                                            <td><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#addVolunteer<?php echo $addVolunteer['id'] ?><?php echo $row['id'] ?>"><i class="fa-solid fa-magnifying-glass"></i></button></td>
                                                                                                        </tr>

                                                                                                        <div class="modal modal-lg fade" id="addVolunteer<?php echo $addVolunteer['id'] ?><?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="volunteer" aria-hidden="true">
                                                                                                            <div class="modal-dialog modal-dialog-scrollable">
                                                                                                                <div class="modal-content">
                                                                                                                    <div class="modal-header bg-dark text-white">
                                                                                                                        <h6 class="modal-title" id="exampleModalLabel">Volunteer: <?php echo $addVolunteer['name'] ?></h6>
                                                                                                                    
                                                                                                                    </div>
                                                                                                                    <div class="modal-body">
                                                                                                                        <h3>Volunteer Details:</h3>
                                                                                                                        <ul>
                                                                                                                            <li>Name: <?php echo $addVolunteer['name'] ?></li>
                                                                                                                            <li>Username: <?php echo $addVolunteer['username'] ?></li>
                                                                                                                            <li>Email: <?php echo $addVolunteer['email'] ?></li>
                                                                                                                            <li>Contact: <?php echo $addVolunteer['contact'] ?></li>
                                                                                                                        </ul>
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
                                                                                                <div class="modal-footer">
                                                                                                    <input type="hidden" name="vl_id" value="<?php echo $row['id'] ?>">
                                                                                                    <button type="submit" name="addVolunteers_team" class="btn btn-dark w-100">Add</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> -->
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div id="progress-bar-container<?php echo $row['id'] ?>"
                                                                                style="position: relative;">
                                                                            </div>
                                                                    
                                                                            <hr>
                                                                            <h6>Ticket Type: <b><?php echo $row['ticket_type'] ?></b> </h6>
                                                                            <h6 class="mt-3">Ticket Deadline: <b class="text-danger"><?php echo $row['ticket_deadline'] ?></b> </h6>
                                                                            <div class="text-center mt-5">
                                                                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#markAsCompleted<?php echo $row['id'] ?>">Mark as Completed</button>
                                                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#forRevision<?php echo $row['id'] ?>">For Revision</button>
                                                                                <?php 
                                                                                $file_path = $row['file_uploaded'];

                                                                                // Remove any leading '../' from the file path
                                                                                $file_path = preg_replace('#^(\.\./)+#', '', $file_path);
                                                                                
                                                                                $display_file_path = "../volunteer/" . $file_path;
                                                                                ?>
                                                                                <a href="<?php echo $display_file_path ?>" class="btn btn-secondary mt-4" target="_blank">View Submitted File</a>
                                                                            </div>

                                                                            <!--Mark as Completed-->
                                                                            <div class="modal fade" id="markAsCompleted<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header bg-dark text-white">
                                                                                            <h5 class="modal-title" id="">Mark as Completed</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <form action="./include/process.php" method="POST">
                                                                                            <div class="modal-body text-center">
                                                                                                <h5><b>Are you sure you want to mark as completed this ticket?</b></h5>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <input type="hidden" name="mark_completed_id" value="<?php echo $row['id'] ?>">
                                                                                                <button type="submit" name="mark_completed_submit" class="btn btn-danger">Yes</button>
                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">No</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                             <!--For Revision-->
                                                                             <div class="modal fade" id="forRevision<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header bg-dark text-white">
                                                                                            <h5 class="modal-title" id="">Mark as For Revision</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <form action="./include/process.php" method="POST">
                                                                                            <div class="modal-body text-center">
                                                                                                <h5><b>Are you sure you want to mark as for revision?</b></h5>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <input type="hidden" name="mark_revision_id" value="<?php echo $row['id'] ?>">
                                                                                                <button type="submit" name="mark_revision_submit" class="btn btn-success">Yes</button>
                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">No</button>
                                                                                            </div>
                                                                                        </form>
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
                                        $query = "SELECT * FROM tickets WHERE ticket_status = 'Revision'";
                                        
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <div class="p-2">
                                                <div class="card bg-danger text-white mb-4">
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
                                                                                    <!-- <button class="btn btn-sm btn-dark text-white" title="Update" style="font-size:8px" data-bs-toggle="modal" data-bs-target="#priority<?php echo $row['id'] ?>">
                                                                                    <i class="fa-solid fa-pencil"></i></button> -->

                                                                                    <!-- Modal Priority -->
                                                                                    <!-- <div class="modal fade" id="priority<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header bg-dark text-white">
                                                                                                    <h6 class="modal-title" id="">Update Priority Level</h6>
                                                                                                </div>
                                                                                                <form action="./include/process.php" method="POST">
                                                                                                    <div class="modal-body text-center">
                                                                                                        <label for="">Select Priority Level:</label>
                                                                                                        <br>
                                                                                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                                                            <input type="radio" class="btn-check" name="updtBtn" value="Urgent" id="updtUrgent<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                            <label class="btn btn-outline-danger" for="updtUrgent<?php echo $row['id'] ?>">Urgent</label>

                                                                                                            <input type="radio" class="btn-check" name="updtBtn" value="High" id="updtHigh<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                            <label class="btn btn-outline-warning" for="updtHigh<?php echo $row['id'] ?>">High</label>

                                                                                                            <input type="radio" class="btn-check" name="updtBtn" value="Mid" id="updtMid<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                            <label class="btn btn-outline-primary" for="updtMid<?php echo $row['id'] ?>">Mid</label>

                                                                                                            <input type="radio" class="btn-check" name="updtBtn" value="Low" id="updtLow<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                            <label class="btn btn-outline-secondary" for="updtLow<?php echo $row['id'] ?>">Low</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <input type="hidden" name="priority_id" value="<?php echo $row['id'] ?>">
                                                                                                        <button type="submit" class="btn btn-dark w-100" name="update_priority_team">Update</button>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> -->

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
                                                                                    
                                                                                    <!-- <button class="btn btn-sm btn-dark text-white" title="Update" style="font-size:8px" data-bs-toggle="modal" data-bs-target="#status<?php echo $row['id'] ?>">
                                                                                    <i class="fa-solid fa-pencil"></i></button> -->

                                                                                    <!-- Modal Status -->
                                                                                    <!-- <div class="modal fade" id="status<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header bg-dark text-white">
                                                                                                    <h6 class="modal-title" id="">Update Status</h6>
                                                                                                </div>
                                                                                                <form action="./include/process.php" method="POST">
                                                                                                    <div class="modal-body">
                                                                                                        <label for="">Select Status:</label>
                                                                                                        <select class="form-select" name="stat" id="" required>
                                                                                                            <option value="" selected disabled>--<?php echo $row['ticket_status'] ?>--</option>
                                                                                                            <option value="Your-ticket">Your-Ticket</option>
                                                                                                            <option value="To-Do">To-Do</option>
                                                                                                            <option value="In-Review">In-Review</option>
                                                                                                            <option value="Revision">Revision</option>
                                                                                                            <option value="Completed">Completed</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <input type="hidden" name="status_id" value="<?php echo $row['id'] ?>">
                                                                                                        <button type="submit" name="update_status_team" class="btn btn-dark w-100">Update</button>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> -->
                                                                                </div>
                                                                            </div>

                                                                                <!-- <button
                                                                                style="border: none; background-color: transparent; padding: 0;" title="Add" data-bs-toggle="modal" data-bs-target="#instructions<?php echo $row['id'] ?>">
                                                                                <i class="bi bi-plus-square-fill">
                                                                                </i></button>  -->
                                                                                <label for="">Additional Instructions</label>

                                                                                <!-- Modal Additional Instructions -->
                                                                                <!-- <div class="modal fade" id="instructions<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-dark text-white">
                                                                                                <h6 class="modal-title" id="">Add Additional Instructions</h6>
                                                                                            </div>
                                                                                            <form action="./include/process.php" method="POST">
                                                                                                <div class="modal-body">
                                                                                                    <div class="instructions" style="max-height: 200px; overflow-y: auto;">
                                                                                                        <button id="addBtn<?php echo $row['id'] ?>" type="button" class="btn btn-sm btn-secondary w-100"><i class="bi bi-plus-square-fill"></i> Add Instructions</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <input type="hidden" name="instructions_id" value="<?php echo $row['id'] ?>">
                                                                                                    <button type="submit" name="addInstructions_team" class="btn btn-dark w-100">Add</button>
                                                                                                </div>
                                                                                            </form>
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                </div> -->

                                                                                <!--Add Instruction Input-->
                                                                                <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                                                <script>
                                                                                    $(document).ready(function(){
                                                                                        var count = 1;
                                                                                        $("#addBtn<?php echo $row['id'] ?>").click(function(){
                                                                                            var input = $("<input>")
                                                                                                .addClass("form-control mt-3")
                                                                                                .attr("type", "text")
                                                                                                .attr("name", "instruction_" + count)
                                                                                                .prop("required", true)
                                                                                                .attr("placeholder", "Instruction " + count);
                                                                                            $(".instructions").append(input);
                                                                                            count++;
                                                                                        });

                                                                                    });
                                                                                </script> -->
                                                                            
                                                                            <div style="max-height: 200px; overflow-y: auto;">
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
                                                                                <h6>Ticket Volunteers: 
                                                                                    <!-- <button
                                                                                    style="border: none; background-color: transparent; padding: 0;" title="Add" data-bs-toggle="modal" data-bs-target="#addVolunteer<?php echo $row['id'] ?>">
                                                                                    <i class="bi bi-plus-square-fill">
                                                                                    </i></button> -->
                                                                                </h6>

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

                                                                                <!-- Modal Add Volunteer -->
                                                                                <!-- <div class="modal modal-md fade" id="addVolunteer<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-dark text-white">
                                                                                                <h6 class="modal-title" id="">Add Volunteer</h6>
                                                                                            </div>
                                                                                            <form action="./include/process.php" method="POST">
                                                                                                <div class="modal-body">
                                                                                                    <table class="table" id="">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th scope="col"></th>
                                                                                                                <th scope="col">Volunteers Name</th>
                                                                                                                <th scope="col">Email</th>
                                                                                                                <th scope="col">View</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                        <?php 
                                                                                                            $idss = $row['ticket_volunteers_id'];
                                                                                                            $idsArrays = explode(',', $idss);

                                                                                                            $idsStrings = "'" . implode("', '", $idsArrays) . "'";

                                                                                                            $query_volunteers = "SELECT * FROM accounts WHERE id IN ($idsStrings)";
                                                                                                            $result_volunteers = mysqli_query($conn, $query_volunteers);

                                                                                                            $volunteerNames = [];
                                                                                                            while ($row_volunteers = mysqli_fetch_array($result_volunteers)) {
                                                                                                                $volunteerNames[] = $row_volunteers['name'];
                                                                                                            }

                                                                                                            $volunteerNamesString = "'" . implode("', '", $volunteerNames) . "'";
                                                                                                            $queryVolunteer = "SELECT * FROM accounts WHERE type = 'volunteer' AND name NOT IN ($volunteerNamesString)";

                                                                                                            $resultVolunteer = mysqli_query($conn, $queryVolunteer);
                                                                                                            while ($addVolunteer = mysqli_fetch_array($resultVolunteer)) {
                                                                                                        ?>
                                                                                                        <tr>
                                                                                                            <td><input type="checkbox" name="volunteer_id[]" value="<?php echo $addVolunteer['id'] ?>"></td>
                                                                                                            <td><?php echo $addVolunteer['name'] ?></td>
                                                                                                            <td><?php echo $addVolunteer['email'] ?></td>
                                                                                                            <td><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#addVolunteer<?php echo $addVolunteer['id'] ?><?php echo $row['id'] ?>"><i class="fa-solid fa-magnifying-glass"></i></button></td>
                                                                                                        </tr>

                                                                                                        <div class="modal modal-lg fade" id="addVolunteer<?php echo $addVolunteer['id'] ?><?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="volunteer" aria-hidden="true">
                                                                                                            <div class="modal-dialog modal-dialog-scrollable">
                                                                                                                <div class="modal-content">
                                                                                                                    <div class="modal-header bg-dark text-white">
                                                                                                                        <h6 class="modal-title" id="exampleModalLabel">Volunteer: <?php echo $addVolunteer['name'] ?></h6>
                                                                                                                    
                                                                                                                    </div>
                                                                                                                    <div class="modal-body">
                                                                                                                        <h3>Volunteer Details:</h3>
                                                                                                                        <ul>
                                                                                                                            <li>Name: <?php echo $addVolunteer['name'] ?></li>
                                                                                                                            <li>Username: <?php echo $addVolunteer['username'] ?></li>
                                                                                                                            <li>Email: <?php echo $addVolunteer['email'] ?></li>
                                                                                                                            <li>Contact: <?php echo $addVolunteer['contact'] ?></li>
                                                                                                                        </ul>
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
                                                                                                <div class="modal-footer">
                                                                                                    <input type="hidden" name="vl_id" value="<?php echo $row['id'] ?>">
                                                                                                    <button type="submit" name="addVolunteers_team" class="btn btn-dark w-100">Add</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> -->
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div id="progress-bar-container<?php echo $row['id'] ?>"
                                                                                style="position: relative;">
                                                                            </div>
                                                                    
                                                                            <hr>
                                                                            <h6>Ticket Type: <b><?php echo $row['ticket_type'] ?></b> </h6>
                                                                            <h6 class="mt-3">Ticket Deadline: <b class="text-danger"><?php echo $row['ticket_deadline'] ?></b> </h6>
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
                                    ?>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-md-2">
                            <div style="max-height: 500px; overflow-y: auto;">
                                <div class="card mb-4">
                                    <div class="text-dark card-header text-center">
                                        Mark as Viewed
                                    </div>
                                    <?php 
                                        $query = "SELECT * FROM tickets WHERE ticket_status = 'Mark as Viewed'";
                                        
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <div class="p-2">
                                                <div class="card bg-dark text-white mb-4">
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
                                                                                    <!-- <button class="btn btn-sm btn-dark text-white" title="Update" style="font-size:8px" data-bs-toggle="modal" data-bs-target="#priority<?php echo $row['id'] ?>">
                                                                                    <i class="fa-solid fa-pencil"></i></button> -->

                                                                                    <!-- Modal Priority -->
                                                                                    <!-- <div class="modal fade" id="priority<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header bg-dark text-white">
                                                                                                    <h6 class="modal-title" id="">Update Priority Level</h6>
                                                                                                </div>
                                                                                                <form action="./include/process.php" method="POST">
                                                                                                    <div class="modal-body text-center">
                                                                                                        <label for="">Select Priority Level:</label>
                                                                                                        <br>
                                                                                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                                                            <input type="radio" class="btn-check" name="updtBtn" value="Urgent" id="updtUrgent<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                            <label class="btn btn-outline-danger" for="updtUrgent<?php echo $row['id'] ?>">Urgent</label>

                                                                                                            <input type="radio" class="btn-check" name="updtBtn" value="High" id="updtHigh<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                            <label class="btn btn-outline-warning" for="updtHigh<?php echo $row['id'] ?>">High</label>

                                                                                                            <input type="radio" class="btn-check" name="updtBtn" value="Mid" id="updtMid<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                            <label class="btn btn-outline-primary" for="updtMid<?php echo $row['id'] ?>">Mid</label>

                                                                                                            <input type="radio" class="btn-check" name="updtBtn" value="Low" id="updtLow<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                            <label class="btn btn-outline-secondary" for="updtLow<?php echo $row['id'] ?>">Low</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <input type="hidden" name="priority_id" value="<?php echo $row['id'] ?>">
                                                                                                        <button type="submit" class="btn btn-dark w-100" name="update_priority_team">Update</button>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> -->

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
                                                                                        elseif($row['ticket_status'] == 'Mark as Viewed'){ 
                                                                                            ?>
                                                                                                <div class="alert alert-dark rounded-pill d-inline-flex align-items-center py-1">
                                                                                                    <strong>Mark as Viewed</strong>
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
                                                                                    
                                                                                    <!-- <button class="btn btn-sm btn-dark text-white" title="Update" style="font-size:8px" data-bs-toggle="modal" data-bs-target="#status<?php echo $row['id'] ?>">
                                                                                    <i class="fa-solid fa-pencil"></i></button> -->

                                                                                    <!-- Modal Status -->
                                                                                    <!-- <div class="modal fade" id="status<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header bg-dark text-white">
                                                                                                    <h6 class="modal-title" id="">Update Status</h6>
                                                                                                </div>
                                                                                                <form action="./include/process.php" method="POST">
                                                                                                    <div class="modal-body">
                                                                                                        <label for="">Select Status:</label>
                                                                                                        <select class="form-select" name="stat" id="" required>
                                                                                                            <option value="" selected disabled>--<?php echo $row['ticket_status'] ?>--</option>
                                                                                                            <option value="Your-ticket">Your-Ticket</option>
                                                                                                            <option value="To-Do">To-Do</option>
                                                                                                            <option value="In-Review">In-Review</option>
                                                                                                            <option value="Revision">Revision</option>
                                                                                                            <option value="Completed">Completed</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <input type="hidden" name="status_id" value="<?php echo $row['id'] ?>">
                                                                                                        <button type="submit" name="update_status_team" class="btn btn-dark w-100">Update</button>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> -->
                                                                                </div>
                                                                            </div>

                                                                                <!-- <button
                                                                                style="border: none; background-color: transparent; padding: 0;" title="Add" data-bs-toggle="modal" data-bs-target="#instructions<?php echo $row['id'] ?>">
                                                                                <i class="bi bi-plus-square-fill">
                                                                                </i></button>  -->
                                                                                <label for="">Additional Instructions</label>

                                                                                <!-- Modal Additional Instructions -->
                                                                                <!-- <div class="modal fade" id="instructions<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-dark text-white">
                                                                                                <h6 class="modal-title" id="">Add Additional Instructions</h6>
                                                                                            </div>
                                                                                            <form action="./include/process.php" method="POST">
                                                                                                <div class="modal-body">
                                                                                                    <div class="instructions" style="max-height: 200px; overflow-y: auto;">
                                                                                                        <button id="addBtn<?php echo $row['id'] ?>" type="button" class="btn btn-sm btn-secondary w-100"><i class="bi bi-plus-square-fill"></i> Add Instructions</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <input type="hidden" name="instructions_id" value="<?php echo $row['id'] ?>">
                                                                                                    <button type="submit" name="addInstructions_team" class="btn btn-dark w-100">Add</button>
                                                                                                </div>
                                                                                            </form>
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                </div> -->

                                                                                <!--Add Instruction Input-->
                                                                                <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                                                <script>
                                                                                    $(document).ready(function(){
                                                                                        var count = 1;
                                                                                        $("#addBtn<?php echo $row['id'] ?>").click(function(){
                                                                                            var input = $("<input>")
                                                                                                .addClass("form-control mt-3")
                                                                                                .attr("type", "text")
                                                                                                .attr("name", "instruction_" + count)
                                                                                                .prop("required", true)
                                                                                                .attr("placeholder", "Instruction " + count);
                                                                                            $(".instructions").append(input);
                                                                                            count++;
                                                                                        });

                                                                                    });
                                                                                </script> -->
                                                                            
                                                                            <div style="max-height: 200px; overflow-y: auto;">
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
                                                                                <h6>Ticket Volunteers: 
                                                                                    <!-- <button
                                                                                    style="border: none; background-color: transparent; padding: 0;" title="Add" data-bs-toggle="modal" data-bs-target="#addVolunteer<?php echo $row['id'] ?>">
                                                                                    <i class="bi bi-plus-square-fill">
                                                                                    </i></button> -->
                                                                                </h6>

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

                                                                                <!-- Modal Add Volunteer -->
                                                                                <!-- <div class="modal modal-md fade" id="addVolunteer<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-dark text-white">
                                                                                                <h6 class="modal-title" id="">Add Volunteer</h6>
                                                                                            </div>
                                                                                            <form action="./include/process.php" method="POST">
                                                                                                <div class="modal-body">
                                                                                                    <table class="table" id="">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th scope="col"></th>
                                                                                                                <th scope="col">Volunteers Name</th>
                                                                                                                <th scope="col">Email</th>
                                                                                                                <th scope="col">View</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                        <?php 
                                                                                                            $idss = $row['ticket_volunteers_id'];
                                                                                                            $idsArrays = explode(',', $idss);

                                                                                                            $idsStrings = "'" . implode("', '", $idsArrays) . "'";

                                                                                                            $query_volunteers = "SELECT * FROM accounts WHERE id IN ($idsStrings)";
                                                                                                            $result_volunteers = mysqli_query($conn, $query_volunteers);

                                                                                                            $volunteerNames = [];
                                                                                                            while ($row_volunteers = mysqli_fetch_array($result_volunteers)) {
                                                                                                                $volunteerNames[] = $row_volunteers['name'];
                                                                                                            }

                                                                                                            $volunteerNamesString = "'" . implode("', '", $volunteerNames) . "'";
                                                                                                            $queryVolunteer = "SELECT * FROM accounts WHERE type = 'volunteer' AND name NOT IN ($volunteerNamesString)";

                                                                                                            $resultVolunteer = mysqli_query($conn, $queryVolunteer);
                                                                                                            while ($addVolunteer = mysqli_fetch_array($resultVolunteer)) {
                                                                                                        ?>
                                                                                                        <tr>
                                                                                                            <td><input type="checkbox" name="volunteer_id[]" value="<?php echo $addVolunteer['id'] ?>"></td>
                                                                                                            <td><?php echo $addVolunteer['name'] ?></td>
                                                                                                            <td><?php echo $addVolunteer['email'] ?></td>
                                                                                                            <td><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#addVolunteer<?php echo $addVolunteer['id'] ?><?php echo $row['id'] ?>"><i class="fa-solid fa-magnifying-glass"></i></button></td>
                                                                                                        </tr>

                                                                                                        <div class="modal modal-lg fade" id="addVolunteer<?php echo $addVolunteer['id'] ?><?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="volunteer" aria-hidden="true">
                                                                                                            <div class="modal-dialog modal-dialog-scrollable">
                                                                                                                <div class="modal-content">
                                                                                                                    <div class="modal-header bg-dark text-white">
                                                                                                                        <h6 class="modal-title" id="exampleModalLabel">Volunteer: <?php echo $addVolunteer['name'] ?></h6>
                                                                                                                    
                                                                                                                    </div>
                                                                                                                    <div class="modal-body">
                                                                                                                        <h3>Volunteer Details:</h3>
                                                                                                                        <ul>
                                                                                                                            <li>Name: <?php echo $addVolunteer['name'] ?></li>
                                                                                                                            <li>Username: <?php echo $addVolunteer['username'] ?></li>
                                                                                                                            <li>Email: <?php echo $addVolunteer['email'] ?></li>
                                                                                                                            <li>Contact: <?php echo $addVolunteer['contact'] ?></li>
                                                                                                                        </ul>
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
                                                                                                <div class="modal-footer">
                                                                                                    <input type="hidden" name="vl_id" value="<?php echo $row['id'] ?>">
                                                                                                    <button type="submit" name="addVolunteers_team" class="btn btn-dark w-100">Add</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> -->
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div id="progress-bar-container<?php echo $row['id'] ?>"
                                                                                style="position: relative;">
                                                                            </div>
                                                                    
                                                                            <hr>
                                                                            <h6>Ticket Type: <b><?php echo $row['ticket_type'] ?></b> </h6>
                                                                            <h6 class="mt-3">Ticket Deadline: <b class="text-danger"><?php echo $row['ticket_deadline'] ?></b> </h6>
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
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div style="max-height: 500px; overflow-y: auto;">
                                <div class="card mb-4">
                                    <div class="text-success card-header text-center">
                                        Mark as Completed
                                    </div>
                                    <?php 
                                        $query = "SELECT * FROM tickets WHERE ticket_status = 'Completed'";
                                        
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
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
                                                                                    <!-- <button class="btn btn-sm btn-dark text-white" title="Update" style="font-size:8px" data-bs-toggle="modal" data-bs-target="#priority<?php echo $row['id'] ?>">
                                                                                    <i class="fa-solid fa-pencil"></i></button> -->

                                                                                    <!-- Modal Priority -->
                                                                                    <!-- <div class="modal fade" id="priority<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header bg-dark text-white">
                                                                                                    <h6 class="modal-title" id="">Update Priority Level</h6>
                                                                                                </div>
                                                                                                <form action="./include/process.php" method="POST">
                                                                                                    <div class="modal-body text-center">
                                                                                                        <label for="">Select Priority Level:</label>
                                                                                                        <br>
                                                                                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                                                            <input type="radio" class="btn-check" name="updtBtn" value="Urgent" id="updtUrgent<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                            <label class="btn btn-outline-danger" for="updtUrgent<?php echo $row['id'] ?>">Urgent</label>

                                                                                                            <input type="radio" class="btn-check" name="updtBtn" value="High" id="updtHigh<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                            <label class="btn btn-outline-warning" for="updtHigh<?php echo $row['id'] ?>">High</label>

                                                                                                            <input type="radio" class="btn-check" name="updtBtn" value="Mid" id="updtMid<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                            <label class="btn btn-outline-primary" for="updtMid<?php echo $row['id'] ?>">Mid</label>

                                                                                                            <input type="radio" class="btn-check" name="updtBtn" value="Low" id="updtLow<?php echo $row['id'] ?>" autocomplete="off" required>
                                                                                                            <label class="btn btn-outline-secondary" for="updtLow<?php echo $row['id'] ?>">Low</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <input type="hidden" name="priority_id" value="<?php echo $row['id'] ?>">
                                                                                                        <button type="submit" class="btn btn-dark w-100" name="update_priority_team">Update</button>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> -->

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
                                                                                    
                                                                                    <!-- <button class="btn btn-sm btn-dark text-white" title="Update" style="font-size:8px" data-bs-toggle="modal" data-bs-target="#status<?php echo $row['id'] ?>">
                                                                                    <i class="fa-solid fa-pencil"></i></button> -->

                                                                                    <!-- Modal Status -->
                                                                                    <!-- <div class="modal fade" id="status<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header bg-dark text-white">
                                                                                                    <h6 class="modal-title" id="">Update Status</h6>
                                                                                                </div>
                                                                                                <form action="./include/process.php" method="POST">
                                                                                                    <div class="modal-body">
                                                                                                        <label for="">Select Status:</label>
                                                                                                        <select class="form-select" name="stat" id="" required>
                                                                                                            <option value="" selected disabled>--<?php echo $row['ticket_status'] ?>--</option>
                                                                                                            <option value="Your-ticket">Your-Ticket</option>
                                                                                                            <option value="To-Do">To-Do</option>
                                                                                                            <option value="In-Review">In-Review</option>
                                                                                                            <option value="Revision">Revision</option>
                                                                                                            <option value="Completed">Completed</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <input type="hidden" name="status_id" value="<?php echo $row['id'] ?>">
                                                                                                        <button type="submit" name="update_status_team" class="btn btn-dark w-100">Update</button>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> -->
                                                                                </div>
                                                                            </div>

                                                                                <!-- <button
                                                                                style="border: none; background-color: transparent; padding: 0;" title="Add" data-bs-toggle="modal" data-bs-target="#instructions<?php echo $row['id'] ?>">
                                                                                <i class="bi bi-plus-square-fill">
                                                                                </i></button>  -->
                                                                                <label for="">Additional Instructions</label>

                                                                                <!-- Modal Additional Instructions -->
                                                                                <!-- <div class="modal fade" id="instructions<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-dark text-white">
                                                                                                <h6 class="modal-title" id="">Add Additional Instructions</h6>
                                                                                            </div>
                                                                                            <form action="./include/process.php" method="POST">
                                                                                                <div class="modal-body">
                                                                                                    <div class="instructions" style="max-height: 200px; overflow-y: auto;">
                                                                                                        <button id="addBtn<?php echo $row['id'] ?>" type="button" class="btn btn-sm btn-secondary w-100"><i class="bi bi-plus-square-fill"></i> Add Instructions</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <input type="hidden" name="instructions_id" value="<?php echo $row['id'] ?>">
                                                                                                    <button type="submit" name="addInstructions_team" class="btn btn-dark w-100">Add</button>
                                                                                                </div>
                                                                                            </form>
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                </div> -->

                                                                                <!--Add Instruction Input-->
                                                                                <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                                                <script>
                                                                                    $(document).ready(function(){
                                                                                        var count = 1;
                                                                                        $("#addBtn<?php echo $row['id'] ?>").click(function(){
                                                                                            var input = $("<input>")
                                                                                                .addClass("form-control mt-3")
                                                                                                .attr("type", "text")
                                                                                                .attr("name", "instruction_" + count)
                                                                                                .prop("required", true)
                                                                                                .attr("placeholder", "Instruction " + count);
                                                                                            $(".instructions").append(input);
                                                                                            count++;
                                                                                        });

                                                                                    });
                                                                                </script> -->
                                                                            
                                                                            <div style="max-height: 200px; overflow-y: auto;">
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
                                                                                <h6>Ticket Volunteers: 
                                                                                    <!-- <button
                                                                                    style="border: none; background-color: transparent; padding: 0;" title="Add" data-bs-toggle="modal" data-bs-target="#addVolunteer<?php echo $row['id'] ?>">
                                                                                    <i class="bi bi-plus-square-fill">
                                                                                    </i></button> -->
                                                                                </h6>

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

                                                                                <!-- Modal Add Volunteer -->
                                                                                <!-- <div class="modal modal-md fade" id="addVolunteer<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-dark text-white">
                                                                                                <h6 class="modal-title" id="">Add Volunteer</h6>
                                                                                            </div>
                                                                                            <form action="./include/process.php" method="POST">
                                                                                                <div class="modal-body">
                                                                                                    <table class="table" id="">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th scope="col"></th>
                                                                                                                <th scope="col">Volunteers Name</th>
                                                                                                                <th scope="col">Email</th>
                                                                                                                <th scope="col">View</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                        <?php 
                                                                                                            $idss = $row['ticket_volunteers_id'];
                                                                                                            $idsArrays = explode(',', $idss);

                                                                                                            $idsStrings = "'" . implode("', '", $idsArrays) . "'";

                                                                                                            $query_volunteers = "SELECT * FROM accounts WHERE id IN ($idsStrings)";
                                                                                                            $result_volunteers = mysqli_query($conn, $query_volunteers);

                                                                                                            $volunteerNames = [];
                                                                                                            while ($row_volunteers = mysqli_fetch_array($result_volunteers)) {
                                                                                                                $volunteerNames[] = $row_volunteers['name'];
                                                                                                            }

                                                                                                            $volunteerNamesString = "'" . implode("', '", $volunteerNames) . "'";
                                                                                                            $queryVolunteer = "SELECT * FROM accounts WHERE type = 'volunteer' AND name NOT IN ($volunteerNamesString)";

                                                                                                            $resultVolunteer = mysqli_query($conn, $queryVolunteer);
                                                                                                            while ($addVolunteer = mysqli_fetch_array($resultVolunteer)) {
                                                                                                        ?>
                                                                                                        <tr>
                                                                                                            <td><input type="checkbox" name="volunteer_id[]" value="<?php echo $addVolunteer['id'] ?>"></td>
                                                                                                            <td><?php echo $addVolunteer['name'] ?></td>
                                                                                                            <td><?php echo $addVolunteer['email'] ?></td>
                                                                                                            <td><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#addVolunteer<?php echo $addVolunteer['id'] ?><?php echo $row['id'] ?>"><i class="fa-solid fa-magnifying-glass"></i></button></td>
                                                                                                        </tr>

                                                                                                        <div class="modal modal-lg fade" id="addVolunteer<?php echo $addVolunteer['id'] ?><?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="volunteer" aria-hidden="true">
                                                                                                            <div class="modal-dialog modal-dialog-scrollable">
                                                                                                                <div class="modal-content">
                                                                                                                    <div class="modal-header bg-dark text-white">
                                                                                                                        <h6 class="modal-title" id="exampleModalLabel">Volunteer: <?php echo $addVolunteer['name'] ?></h6>
                                                                                                                    
                                                                                                                    </div>
                                                                                                                    <div class="modal-body">
                                                                                                                        <h3>Volunteer Details:</h3>
                                                                                                                        <ul>
                                                                                                                            <li>Name: <?php echo $addVolunteer['name'] ?></li>
                                                                                                                            <li>Username: <?php echo $addVolunteer['username'] ?></li>
                                                                                                                            <li>Email: <?php echo $addVolunteer['email'] ?></li>
                                                                                                                            <li>Contact: <?php echo $addVolunteer['contact'] ?></li>
                                                                                                                        </ul>
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
                                                                                                <div class="modal-footer">
                                                                                                    <input type="hidden" name="vl_id" value="<?php echo $row['id'] ?>">
                                                                                                    <button type="submit" name="addVolunteers_team" class="btn btn-dark w-100">Add</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> -->
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div id="progress-bar-container<?php echo $row['id'] ?>"
                                                                                style="position: relative;">
                                                                            </div>
                                                                    
                                                                            <hr>
                                                                            <h6>Ticket Type: <b><?php echo $row['ticket_type'] ?></b> </h6>
                                                                            <h6 class="mt-3">Ticket Deadline: <b class="text-danger"><?php echo $row['ticket_deadline'] ?></b> </h6>
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
                                $query = "SELECT * FROM tickets WHERE ticket_priority = 'Urgent'";
                                
                                $result = mysqli_query($conn, $query);
                                while ($rowUrgent = mysqli_fetch_array($result)) {
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
                            ?>

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