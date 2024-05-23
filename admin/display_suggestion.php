<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Task Backlog - Volunteer Management Strageties</title>
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

                        <a class="nav-link active" href="task_backlog.php">
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
                            <h4 class="mt-4"><b>Sample design click to open ticket modal</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="LiveTime"></span> </h4>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="card p-3">
                            <div class="card-body">

                                <!-- start of button and ticket -->
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTicket">Add
                                    Ticket <i class="fa-solid fa-plus"></i></button>

                                <!--Add Ticket Event-->
                                <div class="modal modal-xl fade" id="addTicket" tabindex="-1" role="dialog"
                                    aria-labelledby="addTicket" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success text-white">
                                                <h5 class="modal-title">Add Ticket</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                </button>
                                            </div>
                                            <form action="./include/process.php" method="POST">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="text-center">
                                                                <label for="">Event Title:</label>
                                                                <h5><b>Sample design only </b></h5>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label class="mt-3" for="">Admin Name:</label>
                                                                        <h5><b>Sample Design</b>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="col">
                                                                        <input type="hidden" name="ticket_type"
                                                                            value="Event Ticket">
                                                                        <label class="mt-3" for="">Ticket Type:</label>
                                                                        <h5><b>Event Ticket</b></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr class="mb-2">
                                                            <div class="container mb-2 mt-0">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Search Volunteer
                                                                        Skills:</span>
                                                                    <input type="text" aria-label="First name"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-6 left-side">
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                Volunteers:
                                                                            </div>
                                                                            <div class="card-body overflow-auto"
                                                                                style="max-height: 300px;">
                                                                                <?php 
                                                                                    $query = "SELECT * FROM accounts WHERE type = 'volunteer'";
                                                                                    $result = mysqli_query($conn, $query);
                                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                                ?>
                                                                                <button type="button"
                                                                                    class="btn btn-light mt-1 text-start w-100"><?php echo $row['firstname'] ?>
                                                                                    <?php echo $row['middlename'] ?>
                                                                                    <?php echo $row['lastname'] ?>
                                                                                </button>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6  overflow-auto"
                                                                        style="max-height: 300px;">
                                                                        <div class="card mb-1">
                                                                            <div class="card-header">
                                                                                Suggestion:
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <p>These Volunteers have a high
                                                                                    compatibility for the task
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card mb-1">
                                                                            <div class="card-header">
                                                                                Suggestion:
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <p>This volunteer have a low
                                                                                    intensity
                                                                                    for this month
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card mb-1">
                                                                            <div class="card-header">
                                                                                Suggestion:
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <p>This volunteer have a low
                                                                                    availability for this
                                                                                    month
                                                                                    <small class="text-muted"> -You
                                                                                        can
                                                                                        always check his/her
                                                                                        personal
                                                                                        agenda at volunteer
                                                                                        details</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <table class="table" id="VolunteersEvent">
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
                                                                        $query = "SELECT * FROM accounts WHERE type = 'volunteer'";
                                                                        $result = mysqli_query($conn, $query);
                                                                        while ($row = mysqli_fetch_array($result)) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="volunteer_id[]"
                                                                                value="<?php echo $row['id'] ?>">
                                                                        </td>
                                                                        <td><?php echo $row['name'] ?></td>
                                                                        <td><?php echo $row['email'] ?></td>
                                                                        <td><button class="btn btn-success"
                                                                                type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#volunteerEvent<?php echo $row['id'] ?>"><i
                                                                                    class="fa-solid fa-magnifying-glass"></i></button>
                                                                        </td>
                                                                    </tr>

                                                                    <div class="modal modal-xl fade"
                                                                        id="volunteerEvent<?php echo $row['id'] ?>"
                                                                        tabindex="-1" aria-labelledby="addcategory"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header bg-dark">
                                                                                    <h6 class=" modal-title text-white">
                                                                                        Volunteer Details</h6>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="card-body p-3">
                                                                                    <ul class="nav nav-tabs " id="myTab"
                                                                                        role="tablist">
                                                                                        <li class="nav-item"
                                                                                            role="report">
                                                                                            <button
                                                                                                class="nav-link active"
                                                                                                id="reports-tab"
                                                                                                data-bs-toggle="tab"
                                                                                                data-bs-target="#reports<?php echo $row['id'] ?>"
                                                                                                type="button" role="tab"
                                                                                                aria-controls="reports"
                                                                                                aria-selected="true">Reports</button>
                                                                                        </li>
                                                                                        <li class="nav-item"
                                                                                            role="report">
                                                                                            <button class="nav-link"
                                                                                                id="tickets-tab"
                                                                                                data-bs-toggle="tab"
                                                                                                data-bs-target="#tickets<?php echo $row['id'] ?>"
                                                                                                type="button" role="tab"
                                                                                                aria-controls="tickets"
                                                                                                aria-selected="false">Tickets</button>
                                                                                        </li>
                                                                                        <li class="nav-item"
                                                                                            role="report">
                                                                                            <button class="nav-link"
                                                                                                id="agenda-tab"
                                                                                                data-bs-toggle="tab"
                                                                                                data-bs-target="#agenda<?php echo $row['id'] ?>"
                                                                                                type="button" role="tab"
                                                                                                aria-controls="agenda"
                                                                                                aria-selected="false">Agenda</button>
                                                                                        </li>

                                                                                    </ul>
                                                                                    <div class="tab-content"
                                                                                        id="myTabContent">
                                                                                        <div class="tab-pane fade show active p-3"
                                                                                            id="reports<?php echo $row['id'] ?>"
                                                                                            role="tabpanel"
                                                                                            aria-labelledby="main-tab">
                                                                                            <div class="row">
                                                                                                <div class="col-md-4">
                                                                                                    <h6>Name:
                                                                                                        <b><?php echo $row['name'] ?></b>
                                                                                                    </h6>
                                                                                                    <h6 class="mt-3">
                                                                                                        Username:
                                                                                                        <b><?php echo $row['username'] ?></b>
                                                                                                    </h6>
                                                                                                    <h6 class="mt-3">
                                                                                                        Email:
                                                                                                        <b><?php echo $row['email'] ?></b>
                                                                                                    </h6>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <h6 class="">
                                                                                                        Contact:
                                                                                                        <b><?php echo $row['contact'] ?></b>
                                                                                                    </h6>
                                                                                                    <h6 class="mt-3">
                                                                                                        Date
                                                                                                        Joined:
                                                                                                        <b><?php echo $row['date_joined'] ?></b>
                                                                                                    </h6>
                                                                                                    <h6 class="mt-3">
                                                                                                        Status:
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
                                                                                                    <h6
                                                                                                        class="text-center">
                                                                                                        Intensity
                                                                                                        Points:
                                                                                                    </h6>
                                                                                                    <div
                                                                                                        class="progress mt-3">
                                                                                                        <div class="progress-bar bg-success w-50"
                                                                                                            role="progressbar"
                                                                                                            aria-valuenow="50"
                                                                                                            aria-valuemin="0"
                                                                                                            aria-valuemax="100">
                                                                                                            50%
                                                                                                        </div>
                                                                                                    </div>
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
                                                                                                    <h6>Skill
                                                                                                        Tags:
                                                                                                    </h6>
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
                                                                                        <div class="tab-pane fade p-3"
                                                                                            id="tickets<?php echo $row['id'] ?>"
                                                                                            role="tabpanel"
                                                                                            aria-labelledby="comments-tab">
                                                                                            <div
                                                                                                style="max-height: 500px; overflow-y: auto;">
                                                                                                <div class="row">
                                                                                                    <div
                                                                                                        class="col-sm-3">
                                                                                                        <h6
                                                                                                            class="text-success text-center">
                                                                                                            Your-tickets
                                                                                                        </h6>
                                                                                                        <?php 
                                                                                                            $vlReport = "SELECT * FROM tickets WHERE ticket_status = 'Your-ticket'";
                                                                        
                                                                                                            $rvlReport = mysqli_query($conn, $vlReport);
                                                                                                            while ($rowVl = mysqli_fetch_array($rvlReport)) {
                                                                                                                $ticket_volunteers_ids2 = explode(',', $rowVl['ticket_volunteers_id']);
                                                                                                                if (in_array($volunteer_id, $ticket_volunteers_ids2)) {
                                                                                                        ?>
                                                                                                        <div
                                                                                                            class="card bg-success text-white mb-4">
                                                                                                            <div
                                                                                                                class="card-body">
                                                                                                                <h6><?php echo $rowVl['ticket_title']; ?>
                                                                                                                </h6>
                                                                                                                <hr>
                                                                                                                <h6><?php echo $rowVl['ticket_desc']; ?>
                                                                                                                </h6>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <?php 
                                                                                                            }
                                                                                                        } 
                                                                                                        ?>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-sm-2">
                                                                                                        <h6
                                                                                                            class="text-primary text-center">
                                                                                                            To-Do
                                                                                                        </h6>
                                                                                                        <?php 
                                                                                                            $vlReport = "SELECT * FROM tickets WHERE ticket_status = 'To-Do'";
                                                                        
                                                                                                            $rvlReport = mysqli_query($conn, $vlReport);
                                                                                                            while ($rowVl = mysqli_fetch_array($rvlReport)) {
                                                                                                                $ticket_volunteers_ids2 = explode(',', $rowVl['ticket_volunteers_id']);
                                                                                                                if (in_array($volunteer_id, $ticket_volunteers_ids2)) {
                                                                                                        ?>
                                                                                                        <div
                                                                                                            class="card bg-primary text-white mb-4">
                                                                                                            <div
                                                                                                                class="card-body">
                                                                                                                <h6><?php echo $rowVl['ticket_title']; ?>
                                                                                                                </h6>
                                                                                                                <hr>
                                                                                                                <h6><?php echo $rowVl['ticket_desc']; ?>
                                                                                                                </h6>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <?php 
                                                                                                            }
                                                                                                        } 
                                                                                                        ?>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-sm-2">
                                                                                                        <h6
                                                                                                            class="text-secondary text-center">
                                                                                                            Revisions
                                                                                                        </h6>
                                                                                                        <?php 
                                                                                                            $vlReport = "SELECT * FROM tickets WHERE ticket_status = 'Revision'";
                                                                        
                                                                                                            $rvlReport = mysqli_query($conn, $vlReport);
                                                                                                            while ($rowVl = mysqli_fetch_array($rvlReport)) {
                                                                                                                $ticket_volunteers_ids2 = explode(',', $rowVl['ticket_volunteers_id']);
                                                                                                                if (in_array($volunteer_id, $ticket_volunteers_ids2)) {
                                                                                                        ?>
                                                                                                        <div
                                                                                                            class="card bg-secondary text-white mb-4">
                                                                                                            <div
                                                                                                                class="card-body">
                                                                                                                <h6><?php echo $rowVl['ticket_title']; ?>
                                                                                                                </h6>
                                                                                                                <hr>
                                                                                                                <h6><?php echo $rowVl['ticket_desc']; ?>
                                                                                                                </h6>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <?php 
                                                                                                            }
                                                                                                        } 
                                                                                                        ?>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-sm-2">
                                                                                                        <h6
                                                                                                            class="text-warning text-center">
                                                                                                            In-Review
                                                                                                        </h6>
                                                                                                        <?php 
                                                                                                            $vlReport = "SELECT * FROM tickets WHERE ticket_status = 'In-Review'";
                                                                        
                                                                                                            $rvlReport = mysqli_query($conn, $vlReport);
                                                                                                            while ($rowVl = mysqli_fetch_array($rvlReport)) {
                                                                                                                $ticket_volunteers_ids2 = explode(',', $rowVl['ticket_volunteers_id']);
                                                                                                                if (in_array($volunteer_id, $ticket_volunteers_ids2)) {
                                                                                                        ?>
                                                                                                        <div
                                                                                                            class="card bg-warning text-white mb-4">
                                                                                                            <div
                                                                                                                class="card-body">
                                                                                                                <h6><?php echo $rowVl['ticket_title']; ?>
                                                                                                                </h6>
                                                                                                                <hr>
                                                                                                                <h6><?php echo $rowVl['ticket_desc']; ?>
                                                                                                                </h6>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <?php 
                                                                                                            }
                                                                                                        } 
                                                                                                        ?>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-sm-2">
                                                                                                        <h6
                                                                                                            class="text-danger text-center">
                                                                                                            Urgent
                                                                                                        </h6>
                                                                                                        <?php 
                                                                                                            $vlReport = "SELECT * FROM tickets WHERE ticket_status = 'Urgent'";
                                                                        
                                                                                                            $rvlReport = mysqli_query($conn, $vlReport);
                                                                                                            while ($rowVl = mysqli_fetch_array($rvlReport)) {
                                                                                                                $ticket_volunteers_ids2 = explode(',', $rowVl['ticket_volunteers_id']);
                                                                                                                if (in_array($volunteer_id, $ticket_volunteers_ids2)) {
                                                                                                        ?>
                                                                                                        <div
                                                                                                            class="card bg-danger text-white mb-4">
                                                                                                            <div
                                                                                                                class="card-body">
                                                                                                                <h6><?php echo $rowVl['ticket_title']; ?>
                                                                                                                </h6>
                                                                                                                <hr>
                                                                                                                <h6><?php echo $rowVl['ticket_desc']; ?>
                                                                                                                </h6>
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
                                                                                        <div class="tab-pane fade p-3"
                                                                                            id="agenda<?php echo $row['id'] ?>">
                                                                                            <div
                                                                                                style="max-height: 500px; overflow-y: auto;">
                                                                                                <button
                                                                                                    class="btn btn-secondary"
                                                                                                    onclick="sortCards()">Sort
                                                                                                    <i
                                                                                                        class="fa-solid fa-sort"></i></button>

                                                                                                <?php 
                                                                                                    $queryTicket = "SELECT * FROM personal_agenda WHERE volunteer_id = '$volunteer_id'";
                                                                                                    $resulTicket = mysqli_query($conn, $queryTicket);
                                                                                                    while ($rows = mysqli_fetch_array($resulTicket)) {
                                                                                                ?>
                                                                                                <div
                                                                                                    id="cards-container">
                                                                                                    <div class="card bg-dark text-white mb-4 mt-3"
                                                                                                        data-date-created="<?php echo $rows['date_created']; ?>">
                                                                                                        <div
                                                                                                            class="card-body">
                                                                                                            <div
                                                                                                                class="row">
                                                                                                                <div
                                                                                                                    class="col-md-8 text-left">
                                                                                                                    <h6>Title:
                                                                                                                        <b><?php echo $rows['title'] ?></b>
                                                                                                                    </h6>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-md-4 text-right">
                                                                                                                    <h6>Startdate:
                                                                                                                        <?php echo date('h:i:s A', strtotime($rows['startdate'])); ?>
                                                                                                                    </h6>
                                                                                                                    <h6>Enddate:
                                                                                                                        <?php echo date('h:i:s A', strtotime($rows['enddate'])); ?>
                                                                                                                    </h6>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <hr>
                                                                                                            <div
                                                                                                                class="row">
                                                                                                                <div
                                                                                                                    class="col-md-8 text-left">
                                                                                                                    <h6>Description:
                                                                                                                        <br>
                                                                                                                        <b><?php echo $rows['description'] ?></b>
                                                                                                                    </h6>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-md-4 text-right">
                                                                                                                    <h6>Date
                                                                                                                        Created:
                                                                                                                        <?php echo $rows['date_created'] ?>
                                                                                                                    </h6>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>


                                                                                                    <script>
                                                                                                    document
                                                                                                        .addEventListener(
                                                                                                            'DOMContentLoaded',
                                                                                                            function() {
                                                                                                                let ascending =
                                                                                                                    true;

                                                                                                                function sortCards() {
                                                                                                                    const
                                                                                                                        container =
                                                                                                                        document
                                                                                                                        .getElementById(
                                                                                                                            'cards-container'
                                                                                                                        );
                                                                                                                    const
                                                                                                                        cards =
                                                                                                                        Array
                                                                                                                        .from(
                                                                                                                            container
                                                                                                                            .querySelectorAll(
                                                                                                                                '.card[data-date-created]'
                                                                                                                            )
                                                                                                                        );

                                                                                                                    cards
                                                                                                                        .sort(
                                                                                                                            (a,
                                                                                                                                b
                                                                                                                            ) => {
                                                                                                                                const
                                                                                                                                    dateA =
                                                                                                                                    new Date(
                                                                                                                                        a
                                                                                                                                        .getAttribute(
                                                                                                                                            'data-date-created'
                                                                                                                                        )
                                                                                                                                    );
                                                                                                                                const
                                                                                                                                    dateB =
                                                                                                                                    new Date(
                                                                                                                                        b
                                                                                                                                        .getAttribute(
                                                                                                                                            'data-date-created'
                                                                                                                                        )
                                                                                                                                    );
                                                                                                                                return ascending ?
                                                                                                                                    dateA -
                                                                                                                                    dateB :
                                                                                                                                    dateB -
                                                                                                                                    dateA;
                                                                                                                            }
                                                                                                                        );

                                                                                                                    // Toggle the sorting order for next click
                                                                                                                    ascending
                                                                                                                        = !
                                                                                                                        ascending;

                                                                                                                    // Re-append sorted cards to the container
                                                                                                                    cards
                                                                                                                        .forEach(
                                                                                                                            card =>
                                                                                                                            container
                                                                                                                            .appendChild(
                                                                                                                                card
                                                                                                                            )
                                                                                                                        );
                                                                                                                }

                                                                                                                window
                                                                                                                    .sortCards =
                                                                                                                    sortCards; // Expose sortCards to the global scope so the button can access it
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
                                                        <div class="col-md-6">
                                                            <div class="text-center">
                                                                <label for="">Priority:</label>
                                                                <br>
                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input type="radio" class="btn-check"
                                                                        name="eventBtn" value="Urgent" id="eventUrgent"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-outline-danger"
                                                                        for="eventUrgent">Urgent</label>

                                                                    <input type="radio" class="btn-check"
                                                                        name="eventBtn" value="High" id="eventHigh"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-outline-warning"
                                                                        for="eventHigh">High</label>

                                                                    <input type="radio" class="btn-check"
                                                                        name="eventBtn" value="Mid" id="eventMid"
                                                                        autocomplete="off">
                                                                    <label class="btn btn-outline-primary"
                                                                        for="eventMid">Mid</label>

                                                                    <input type="radio" class="btn-check"
                                                                        name="eventBtn" value="Low" id="eventLow"
                                                                        autocomplete="off" checked>
                                                                    <label class="btn btn-outline-secondary"
                                                                        for="eventLow">Low</label>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <label class="" for="">Set Deadline:</label>
                                                            <input type="date" name="ticket_deadline"
                                                                class="form-control" required>
                                                            <label class="mt-3" for="">Ticket Title:</label>
                                                            <input class="form-control" name="ticket_title" type="text"
                                                                required>
                                                            <label class="mt-3" for="">Ticket
                                                                Description:</label>
                                                            <textarea class="form-control" name="ticket_desc" value=""
                                                                name="desc" rows="10" cols="5" required></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <input type="hidden" name='main_id'
                                                        value="<?php echo $_GET['id'] ?>">
                                                    <input type="hidden" name='main_event_id'
                                                        value="<?php echo $_GET['event_id'] ?>">
                                                    <input type="hidden" name='main_title'
                                                        value="<?php echo $_GET['title'] ?>">
                                                    <input type="hidden" name='main_start'
                                                        value="<?php echo $_GET['start'] ?>">
                                                    <input type="hidden" name='main_end'
                                                        value="<?php echo $_GET['end'] ?>">
                                                    <input type="hidden" name='main_allday'
                                                        value="<?php echo $_GET['allday'] ?>">
                                                    <input type="hidden" name='main_desc'
                                                        value="<?php echo $_GET['desc']; ?>">
                                                    <button type="submit" name="addTicketEvent"
                                                        class="btn btn-success">Add
                                                        Ticket</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Go to Prediction design -->
                                <br>
                                <smal class="text-muted">
                                    This is a sample button to put on event_plan.php <br>
                                    INFO: this button is for redirecting into Prediction page</small>
                                    <a class="nav-link" href="prediction_page.php">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <button type="button" class="btn btn-light mt-1 text-start">
                                                    Display Prediction date
                                                </button>
                                            </div>
                                        </div>
                                    </a>
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