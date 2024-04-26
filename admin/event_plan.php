<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Event Plan - Volunteer Management Strageties</title>
</head>


<?php
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $event_id = isset($_GET['event_id']) ? $_GET['event_id'] : '';
    $title = isset($_GET['title']) ? $_GET['title'] : '';
    $start = isset($_GET['start']) ? $_GET['start'] : '';
    $end = isset($_GET['end']) ? $_GET['end'] : '';
    $allday = isset($_GET['allday']) ? $_GET['allday'] : '';
    $desc = isset($_GET['desc']) ? $_GET['desc'] : '';
?>

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

                        <a class="nav-link active" href="set_event.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-days"></i></div>
                            Set Event
                        </a>

                        <a class="nav-link" href="team_work_flow.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                            Team Work Flow
                        </a>

                        <!-- <a class="nav-link active" href="event_plan.php">
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
                            <h4 class="mt-4"><b>Event Plan</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="LiveTime"></span> </h4>
                        </div>
                    </div>
                    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#overview"
                                type="button" role="tab" aria-controls="overview" aria-selected="true">Overview</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#agenda" type="button"
                                role="tab" aria-controls="agenda" aria-selected="false">Agenda</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ticket" type="button"
                                role="tab" aria-controls="ticket" aria-selected="false">Ticket</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- Overview -->
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                            aria-labelledby="overview-tab">

                            <div class="row mt-3">
                                <div class="col-md-7">
                                    <h5>Recommendation -> <span class="text-success">Sample</span> </h5>
                                    <div class="card mb-4 ">

                                        <div class="card-body p-4">
                                            <form action="./include/process.php" method="POST">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <h5><b>Event Title:</b> </h5>
                                                        <input class="form-control w-50" type="text" name="title" value="<?php echo $title; ?>">
                                                        <h5 class="mt-4"><b>Event Description:</b></h5>
                                                    </div>
                                                    <div class="col-md-4 text-center">
                                                        <div class="progress mt-2">
                                                            <div class="progress-bar bg-success " role="progressbar"
                                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <label for="">Completed 0%</label>
                                                    </div>
                                                </div>
                                                <textarea class="tinymce form-control" value="<?php echo $desc ?>"  name="desc" rows="10" cols="30"><?php echo $desc ?></textarea>
                                                <input class="form-control w-50" type="hidden" name="id" value="<?php echo $id; ?>">
                                                <input class="form-control w-50" type="hidden" name="event_id" value="<?php echo $event_id; ?>">
                                                <input class="form-control w-50" type="hidden" name="start" value="<?php echo $start; ?>">
                                                <input class="form-control w-50" type="hidden" name="end" value="<?php echo $end; ?>">
                                                <input class="form-control w-50" type="hidden" name="allday" value="<?php echo $allday; ?>">
                                                <button class="btn btn-success w-100" type="submit" name="save_event">Save</button>
                                            </form>
                                            <hr>
                                            <div class="mt-3 table-responsive">
                                                <h5><b>Agenda:</b></h5>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Part Name</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Guests</th>
                                                            <th scope="col">Volunteers</th>
                                                            <th scope="col">Time Start</th>
                                                            <th scope="col">Time End</th>
                                                            <th scope="col">Event Duration</th>
                                                            <!-- <th scope="col">Sponsors</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                        $query = "SELECT * FROM events WHERE event_id = $id";
                                                        $result = mysqli_query($conn, $query);
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            $start_timestamp = strtotime($row['startdate']);
                                                            $end_timestamp = strtotime($row['enddate']);

                                                            // Calculate the duration in seconds
                                                            $duration_seconds = $end_timestamp - $start_timestamp;
                                                            
                                                            // Convert duration to hours, minutes, and seconds
                                                            $hours = floor($duration_seconds / 3600);
                                                            $minutes = floor(($duration_seconds % 3600) / 60);
                                                            $seconds = $duration_seconds % 60;

                                                            // Format the duration
                                                            $duration = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
                                                        ?>
                                                        <tr>
                                                            <th><?php echo $row['title'] ?></th>
                                                            <td><?php echo $row['description'] ?></td>
                                                            <td>Guests Sample</td>
                                                            <td>Volunteer Sample</td>
                                                            <td><?php echo date('h:i:s A', $start_timestamp); ?></td>
                                                            <td><?php echo date('h:i:s A', $end_timestamp); ?></td>
                                                            <td><?php echo $duration; ?></td>
                                                            <!-- <td><?php echo $row['sponsors'] ?></td> -->
                                                        </tr>
                                                    <?php 
                                                    }
                                                    ?>

                                                    </tbody>
                                                </table>
                                 
                                            </div>
                             
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="card mb-4 ">
                                        <div class="card-body p-4">
                                            <!-- <div class="text-center">
                                                <h4> <b>Event Start</b></h4>
                                                <p class="text-danger"><i>* Please select a specific time in the calendar. <br> (One Time Only)</i></p>
                                            </div> -->
                                            <div class="text-center">
                                                <h4> <b>Events</b></h4>
                                            </div>

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

                                            <div id="daycalendar"
                                                class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap5 bsb-calendar-theme">
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5><b>Tickets:</b> Sample Tickets</h5>
                                                    <h5><b>Volunteers:</b> Sample Volunteers</h5>
                                                    <br>
                                                    <h5>Acquisition Speed</h5>
                                                    <div class="text-center mb-4">
                                                        <div class="progress mt-2">
                                                            <div class="progress-bar bg-success w-50" role="progressbar"
                                                                aria-valuenow="50" aria-valuemin="0"
                                                                aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <label for="">Normal</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <label for="">Completeness:</label>
                                                    <div class="progress mt-2">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6>Prediction Date:</h6>
                                            <div class="card mb-4">
                                                <div class="bg-dark text-white card-header text-center">
                                                    <i class="fa-solid fa-calendar-days"></i>
                                                    Calendar
                                                </div>
                                                <div class="card-body p-4">
                                                    <div id="bsb-calendar-1"
                                                        class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap5 bsb-calendar-theme">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Agenda -->
                        <div class="tab-pane fade" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">
                            <div class="card mb-4 ">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPart">Add Part <i class="fa-solid fa-plus"></i></button>

                                            <!-- Modal Event Start -->
                                            <div class="modal fade" id="addPart" tabindex="-1" aria-labelledby="addPart"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-success">
                                                        <h5 class=" modal-title text-white">Add Part</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="./include/process.php" method="POST">
                                                            <div class="mt-2">
                                                                <label for="">Part Name:</label>
                                                                <input class="form-control" type="text" name="part_name" required>
                                                                <label for="" class="mt-2">Description:</label>
                                                                <textarea class="form-control" name="desc" id="" cols="10" rows="5"></textarea>
                                                                <hr>
                                                                <label for="">Guests / Volunteer:</label>
                                                                <select class="form-select" name="gv_people" id="">
                                                                    <option value="">Sample People / Volunteer</option>
                                                                    <option value="">Others</option>
                                                                </select>
                                                                <label for="" class="mt-3">Volunteer:</label>
                                                                <select class="form-select" name="volunteer" id="">
                                                                    <option value="">Sample Volunteer</option>
                                                                    <option value="">Others</option>
                                                                </select>
                                                                <hr>
                                                                <label for="">Set Time:</label>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <input class="form-control" name="from" type="time" required>
                                                                    </div>
                                                                    <div class="col">
                                                                        <input class="form-control" name="to" type="time" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                            <input type="hidden" name='main_title' value="<?php echo $_GET['title'] ?>">
                                                            <input type="hidden" name='main_start' value="<?php echo $_GET['start'] ?>">
                                                            <input type="hidden" name='main_end' value="<?php echo $_GET['end'] ?>">
                                                            <input type="hidden" name='main_allday' value="<?php echo $_GET['allday'] ?>">
                                                            <input type="hidden" name='main_desc' value="<?php echo $desc; ?>">

                                                            <button type="submit" name="addPart" class="btn btn-success text-white">Add Part</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        
                                                        </div>
                                            
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-secondary" title="Add Sponsors" data-bs-toggle="modal" data-bs-target="#addSponsors">Add Sponsors <i class="fa-solid fa-users"></i></button>

                                            <!-- Modal Add Sponsors -->
                                            <div class="modal modal-lg fade" id="addSponsors" tabindex="-1" aria-labelledby="addSponsors" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h5 class=" modal-title text-white">Add Sponsors</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table" id="Sponsors">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Name</th>
                                                                        <th scope="col">Position</th>
                                                                        <th scope="col">Company</th>
                                                                        <th scope="col">Status</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                        $query_sponsors = "SELECT * FROM guest_sponsors WHERE type='sponsors'";
                                                                        $result_sponsors = mysqli_query($conn, $query_sponsors);
                                                                        while ($sponsors = mysqli_fetch_array($result_sponsors)) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $sponsors['name'] ?></td>
                                                                        <td><?php echo $sponsors['position'] ?></td>
                                                                        <td><?php echo $sponsors['company'] ?></td>
                                                                        <td><?php echo $sponsors['status'] ?></td>
                                                                        <td>
                                                                            <form action="./include/process.php" method="POST">
                                                                                <input type="hidden" name='part_id' value="<?php echo $part_id ?>">
                                                                                <input type="hidden" name='sponsor_id' value="<?php echo $sponsors['id'] ?>">
                                                                                <input type="hidden" name='sponsor' value="<?php echo $sponsors['name'] ?>">
                                                                                <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                                                <input type="hidden" name='main_title' value="<?php echo $_GET['title'] ?>">
                                                                                <input type="hidden" name='main_start' value="<?php echo $_GET['start'] ?>">
                                                                                <input type="hidden" name='main_end' value="<?php echo $_GET['end'] ?>">
                                                                                <input type="hidden" name='main_allday' value="<?php echo $_GET['allday'] ?>">
                                                                                <input type="hidden" name='main_desc' value="<?php echo $desc; ?>">
                                                                                <button class="btn btn-success" name="addSponsor">Add</button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                    <table class="table" id="Agenda">
                                        <h5 class="text-center"><strong>Part Event Table</strong></h5>
                                        <thead>
                                            <tr>
                                                <th scope="col">Part Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Guests</th>
                                                <th scope="col">Volunteers</th>
                                                <th scope="col">Time Start</th>
                                                <th scope="col">Time End</th>
                                                <th scope="col">Event Duration</th>
                                                <!-- <th scope="col">Sponsors</th> -->
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php 
                                                $query = "SELECT * FROM events WHERE event_id = $id";
                                                $result = mysqli_query($conn, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                $part_id = $row['id'];

                                                $start_timestamp = strtotime($row['startdate']);
                                                $end_timestamp = strtotime($row['enddate']);

                                                // Calculate the duration in seconds
                                                $duration_seconds = $end_timestamp - $start_timestamp;
                                                
                                                // Convert duration to hours, minutes, and seconds
                                                $hours = floor($duration_seconds / 3600);
                                                $minutes = floor(($duration_seconds % 3600) / 60);
                                                $seconds = $duration_seconds % 60;

                                                // Format the duration
                                                $duration = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
                                            ?>
                                            <tr>
                                                <th><?php echo $row['title'] ?></th>
                                                <td><?php echo $row['description'] ?></td>
                                                <td>Guests Sample</td>
                                                <td>Volunteer Sample</td>
                                                <td><?php echo date('h:i:s A', strtotime($row['startdate'])); ?></td>
                                                <td><?php echo date('h:i:s A', strtotime($row['enddate'])); ?> </td>
                                                <td><?php echo $duration; ?></td>
                                                <!-- <td><?php echo $row['sponsors'] ?></td> -->
                                                <td>
                                                    <button class="btn btn-sm btn-warning text-white" title="Add Duration" data-bs-toggle="modal" data-bs-target="#addDuration<?php echo $row['id'] ?>"><i class="fa-solid fa-clock"></i></button>

                                                    <!-- Modal Add Duration-->
                                                    <div class="modal fade" id="addDuration<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="addDuration" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="./include/process.php" method="POST">
                                                                    <div class="modal-header bg-success text-white">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Add Duration</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <label for="">Duration:</label>    
                                                                        <input class="form-control" type="number" name="duration" required>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                        <input type="hidden" name="current_end" value="<?php echo $row['enddate'] ?>">
                                                                        <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                                        <input type="hidden" name='main_title' value="<?php echo $_GET['title'] ?>">
                                                                        <input type="hidden" name='main_start' value="<?php echo $_GET['start'] ?>">
                                                                        <input type="hidden" name='main_end' value="<?php echo $_GET['end'] ?>">
                                                                        <input type="hidden" name='main_allday' value="<?php echo $_GET['allday'] ?>">
                                                                        <input type="hidden" name='main_desc' value="<?php echo $desc; ?>">
                                                                        <button type="submit" name="addDuration" class="btn btn-warning text-white">Add Duration</button>
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button class="btn btn-sm btn-success" title="Add Ticket" data-bs-toggle="modal" data-bs-target="#addTicket<?php echo $row['id'] ?>"><i class="fa-solid fa-ticket"></i></button>

                                                    <!--Modal Add Ticket-->
                                                    <div class="modal fade" id="addTicket<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="addTicket" aria-hidden="true">
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
                                                                        <label for="">Ticket Title:</label>
                                                                        <input class="form-control" name="ticket_title" type="text" required>
                                                                        <hr>
                                                                        <label for="">Ticket Description:</label>
                                                                        <textarea class="form-control" name="ticket_desc" value=""  name="desc" rows="5" cols="5" required></textarea>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                                        <input type="hidden" name='main_title' value="<?php echo $_GET['title'] ?>">
                                                                        <input type="hidden" name='main_start' value="<?php echo $_GET['start'] ?>">
                                                                        <input type="hidden" name='main_end' value="<?php echo $_GET['end'] ?>">
                                                                        <input type="hidden" name='main_allday' value="<?php echo $_GET['allday'] ?>">
                                                                        <input type="hidden" name='main_desc' value="<?php echo $_GET['desc']; ?>">
                                                                        <button type="submit" name="addTicketPart" class="btn btn-success">Add Ticket</button>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                    
                                                    <button class="btn btn-sm btn-danger" title="Delete" data-bs-toggle="modal" data-bs-target="#deletePart<?php echo $row['id'] ?>"><i class="fa-solid fa-trash"></i></button>

                                                    <!-- Modal Delete Part-->
                                                    <div class="modal fade" id="deletePart<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="addPart" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="./include/process.php" method="POST">
                                                                    <div class="modal-header bg-success text-white">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Part</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        <h5> <b>Are you sure you want to delete this part event?</b></h5>
                                                                        <p class="text-danger">* This action is irreversible!</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                        <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                                        <input type="hidden" name='main_title' value="<?php echo $_GET['title'] ?>">
                                                                        <input type="hidden" name='main_start' value="<?php echo $_GET['start'] ?>">
                                                                        <input type="hidden" name='main_end' value="<?php echo $_GET['end'] ?>">
                                                                        <input type="hidden" name='main_allday' value="<?php echo $_GET['allday'] ?>">
                                                                        <input type="hidden" name='main_desc' value="<?php echo $desc; ?>">
                                                                        <button type="submit" name="delPart" class="btn btn-danger text-white">Delete</button>
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </td>
                                            </tr>
                                            <?php 
                                            }
                                            ?>
                                        </tbody>
                                    </table>    
                                    <hr>
                                    <div class="mt-3">
                                        <h5 class="text-center"><strong>Sponsors Table</strong></h5>
                                        <table class="table" id="SponsorT">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Position</th>
                                                    <th scope="col">Company</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $query_get_sponsor = "SELECT sponsors_id FROM events WHERE id = $id";
                                                    $result_get_sponsors = mysqli_query($conn, $query_get_sponsor);

                                                    $sponsor_ids = array();

                                                    while ($check_sponsors = mysqli_fetch_array($result_get_sponsors)) {
                                                        if ($check_sponsors['sponsors_id']){
                                                            $s_ids = explode(',', $check_sponsors['sponsors_id']);
                                                            $merge_ids = isset($merge_ids) ? $merge_ids : array();
                                                            $merge_ids = array_merge($merge_ids, $s_ids);
                                                            $sponsor_ids = array_unique($merge_ids);
                                                            $query_sponsors = "SELECT * FROM guest_sponsors WHERE id IN (" . implode(',', $sponsor_ids) . ")";
                                                        } else { 
                                                            $query_sponsors = "SELECT * FROM guest_sponsors WHERE id = 0";
                                                        }

                                                        $result_sponsors = mysqli_query($conn, $query_sponsors);
                                                        while ($sponsors = mysqli_fetch_array($result_sponsors)) {
       
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $sponsors['name'] ?></td>
                                                                <td><?php echo $sponsors['position'] ?></td>
                                                                <td><?php echo $sponsors['company'] ?></td>
                                                                <td><?php echo $sponsors['status'] ?></td>
                                                                <td>
                                                                    <button class="btn btn-sm btn-success" title="Add Ticket" data-bs-toggle="modal" data-bs-target="#addTicketSponsor<?php echo $sponsors['id'] ?>"><i class="fa-solid fa-ticket"></i></button>

                                                                    <!--Modal Add Ticket-->
                                                                    <div class="modal fade" id="addTicketSponsor<?php echo $sponsors['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="addTicketSponsor" aria-hidden="true">
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
                                                                                        <label for="">Ticket Title:</label>
                                                                                        <input class="form-control" name="ticket_title" type="text" required>
                                                                                        <hr>
                                                                                        <label for="">Ticket Description:</label>
                                                                                        <textarea class="form-control" name="ticket_desc" value=""  name="desc" rows="5" cols="5" required></textarea>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                                                        <input type="hidden" name='main_title' value="<?php echo $_GET['title'] ?>">
                                                                                        <input type="hidden" name='main_start' value="<?php echo $_GET['start'] ?>">
                                                                                        <input type="hidden" name='main_end' value="<?php echo $_GET['end'] ?>">
                                                                                        <input type="hidden" name='main_allday' value="<?php echo $_GET['allday'] ?>">
                                                                                        <input type="hidden" name='main_desc' value="<?php echo $_GET['desc']; ?>">
                                                                                        <button type="submit" name="addTicketSponsor" class="btn btn-success">Add Ticket</button>
                                                                                        <button type="button" class="btn btn-secondary"
                                                                                            data-bs-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <form action="./include/process.php" method="POST">
                                                                        <input type="hidden" name='sponsor_id' value="<?php echo $sponsors['id'] ?>">
                                                                        <input type="hidden" name='sponsor' value="<?php echo $sponsors['name'] ?>">
                                                                        <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                                        <input type="hidden" name='main_title' value="<?php echo $_GET['title'] ?>">
                                                                        <input type="hidden" name='main_start' value="<?php echo $_GET['start'] ?>">
                                                                        <input type="hidden" name='main_end' value="<?php echo $_GET['end'] ?>">
                                                                        <input type="hidden" name='main_allday' value="<?php echo $_GET['allday'] ?>">
                                                                        <input type="hidden" name='main_desc' value="<?php echo $desc; ?>">
                                                                        <button type="submit" name="delSponsor" title="Delete" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                                    </form>
                                                                </td>
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
                        <!-- Ticket -->
                        <div class="tab-pane fade" id="ticket" role="tabpanel" aria-labelledby="ticket-tab">
                            <div class="row mt-3">
                                <div class="col-md-9">
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTicket">Add Ticket <i class="fa-solid fa-plus"></i></button>

                                    <!--Add Ticket-->
                                    <div class="modal fade" id="addTicket" tabindex="-1" role="dialog" aria-labelledby="addTicket" aria-hidden="true">
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
                                                        <label for="">Ticket Title:</label>
                                                        <input class="form-control" name="ticket_title" type="text" required>
                                                        <hr>
                                                        <label for="">Ticket Description:</label>
                                                        <textarea class="form-control" name="ticket_desc" value=""  name="desc" rows="5" cols="5" required></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                        <input type="hidden" name='main_event_id' value="<?php echo $_GET['event_id'] ?>">
                                                        <input type="hidden" name='main_title' value="<?php echo $_GET['title'] ?>">
                                                        <input type="hidden" name='main_start' value="<?php echo $_GET['start'] ?>">
                                                        <input type="hidden" name='main_end' value="<?php echo $_GET['end'] ?>">
                                                        <input type="hidden" name='main_allday' value="<?php echo $_GET['allday'] ?>">
                                                        <input type="hidden" name='main_desc' value="<?php echo $_GET['desc']; ?>">
                                                        <button type="submit" name="addTicketEvent" class="btn btn-success">Add Ticket</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="row">
                                            <?php 
                                                $main_id = $_GET['id'];
                                                $query = "SELECT * FROM tickets WHERE event_id = $main_id";
                                                $result = mysqli_query($conn, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <div class="col-md-4 mb-3">
                                                <div class="card">
                                                    <div class="card-header d-flex justify-content-between align-items-center">
                                                        <h6 class="card-title"><strong><?php echo $row['ticket_title'] ?> - <i><?php echo $row['ticket_type'] ?></i></strong></h6>
                                                        <div class="place-it-on-the-right-side-corner">
                                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delTicket"><i class="fa-solid fa-trash"></i></button>

                                                            <!--Delete Ticket-->
                                                            <div class="modal fade" id="delTicket" tabindex="-1" role="dialog" aria-labelledby="delTicket" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-success text-white">
                                                                            <h5 class="modal-title">Delete Ticket</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                            </button>
                                                                        </div>  
                                                                        <form action="./include/process.php" method="POST">
                                                                            <div class="modal-body text-center">
                                                                                <h5>Are you sure you want to delete this ticket?</h5>
                                                                                <p class="text-danger">*This action is irreversible!</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <input type="hidden" name='ticket_id' value="<?php echo $row['id'] ?>">
                                                                                <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                                                <input type="hidden" name='main_event_id' value="<?php echo $_GET['event_id'] ?>">
                                                                                <input type="hidden" name='main_title' value="<?php echo $_GET['title'] ?>">
                                                                                <input type="hidden" name='main_start' value="<?php echo $_GET['start'] ?>">
                                                                                <input type="hidden" name='main_end' value="<?php echo $_GET['end'] ?>">
                                                                                <input type="hidden" name='main_allday' value="<?php echo $_GET['allday'] ?>">
                                                                                <input type="hidden" name='main_desc' value="<?php echo $_GET['desc']; ?>">
                                                                                <button type="submit" name="delTicket" class="btn btn-danger">Delete Ticket</button>
                                                                                <button type="button" class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-text"><?php echo $row['ticket_desc'] ?></p>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php 
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="text-center">
                                        <label for="">Completion Percent:</label>
                                        <div class="progress mt-2">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card mb-4">
                                        <div class="bg-success text-white card-header text-center">
                                            <i class="fa-solid fa-ticket"></i>
                                            Request Tickets
                                        </div>  
                                        
                                        <div class="p-3">
                                            <div class="card bg-success text-white mb-4">
                                                <div class="card-body">

                                                    <h5>Plan Requests</h5>
                                                    <hr>
                                                    <p>This is only a sample plan. Details goes here</p>
                                                </div>
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
    <script src="./include/plugins/tinymce/tinymce.min.js"></script>
    <script src="./include/plugins/tinymce/init-tinymce.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('daycalendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: '',
                center: 'title',
                right: ''
            },
            initialView: 'timeGridDay',
            initialDate: <?php echo json_encode($start) ?>,
            events: <?php echo json_encode($events) ?>,
            selectMirror: true,
            allDaySlot: false

        });

        calendar.render();

    });

    </script>

</body>

</html>