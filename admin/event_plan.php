<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Event Plan - Volunteer Management Strageties</title>
</head>


<?php
    error_reporting(0);
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

                        <a class="nav-link" href="team_dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                            Team Dashboard
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
<!-- 
                        <a class="nav-link" href="templates.php">
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
                                    
                                            <h5 class="text-center">Acquisition Speed</h5>
                                            <div class="text-center mb-4">
                                                <div class="progress mt-2">
                                                    <div class="progress-bar bg-success w-50" role="progressbar"
                                                        aria-valuenow="50" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                    </div>
                                                </div>
                                                <label for="">Normal</label>
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
                                            <div class="modal fade" id="addPart"  aria-labelledby="addPart"
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
                                                                <select class="form-select" name="gv_people" id="" required>

                                                                    <option value="" disabled selected>--Select Guests/Volunteers--</option>
                                                                    <?php 
                                                                        $query1 = "SELECT * FROM accounts WHERE type = 'volunteer'";
                                                                        $query2 = "SELECT * FROM guest_sponsors WHERE type = 'guest'";
                                                                        
                                                                        $result1 = mysqli_query($conn, $query1);
                                                                        $result2 = mysqli_query($conn, $query2);
                                                                        
                                                                        $combinedRows = array();
                                                                    
                                                                        while ($rowVolunteer = mysqli_fetch_array($result1)) {
                                                                            $combinedRows[] = $rowVolunteer;
                                                                        }
                                                                    
                                                                        while ($rowGuest = mysqli_fetch_array($result2)) {
                                                                            $combinedRows[] = $rowGuest;
                                                                        }
                                                                    
                                                                    ?>

                                                                    <?php 

                                                                    foreach ($combinedRows as $volunteer_guests) {
                                                                        ?>
                                                                            <option value="<?php echo $volunteer_guests['id'] ?> <?php echo $volunteer_guests['type'] ?> <?php echo $volunteer_guests['name'] ?>">
                                                                            <?php echo $volunteer_guests['name'] ?> - <?php echo $volunteer_guests['type'] ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                </select>
                                                                <label for="" class="mt-3">Volunteer:</label>
                                                                <select id="select2insidemodal" style="width:100%" name="vltag[]" multiple="multiple" required>
                                                                    <?php 
                                                                        $volunteer_tags = "SELECT * FROM accounts WHERE type = 'volunteer'";
                                                                        $tag_result = mysqli_query($conn, $volunteer_tags);
                                                                        while ($rowTag = mysqli_fetch_array($tag_result)) {
                                                                    ?>
                                                                        <option value="<?php echo $rowTag['id'] ?> <?php echo $rowTag['name'] ?>"><?php echo $rowTag['name'] ?></option>
                                                                    <?php 
                                                                    }
                                                                    ?>
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
                                                <td><?php echo $row['volunteer_tag'] ?></td>
                                                <td><?php echo date('h:i:s A', strtotime($row['startdate'])); ?></td>
                                                <td><?php echo date('h:i:s A', strtotime($row['enddate'])); ?> </td>
                                                <td><?php echo $duration; ?></td>
                                                <!-- <td><?php echo $row['sponsors'] ?></td> -->
                                                <td>

                                                <div class="row">
                                                    <div class="col d-flex gap-2">
                                                        <button class="btn btn-sm btn-warning text-white" title="Add Duration" data-bs-toggle="modal" data-bs-target="#addDuration<?php echo $row['id'] ?>"><i class="fa-solid fa-clock"></i></button>
                                                        <button class="btn btn-sm btn-success" title="Add Ticket" data-bs-toggle="modal" data-bs-target="#addTicketPart<?php echo $row['id'] ?>"><i class="fa-solid fa-ticket"></i></button>
                                                        <button class="btn btn-sm btn-danger" title="Delete" data-bs-toggle="modal" data-bs-target="#deletePart<?php echo $row['id'] ?>"><i class="fa-solid fa-trash"></i></button>
                                                    </div>
                                                </div>

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
                                                    
                                                    <!--Modal Add Ticket Part-->
                                                    <div class="modal modal-xl fade" id="addTicketPart<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="addTicket" aria-hidden="true">
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
                                                                                    <h5><b><?php echo $title; ?></b></h5>
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <input type="hidden" name="ticket_admin" value="<?php echo $_SESSION['admin']['name']; ?> <?php echo $_SESSION['superadmin']['name']; ?>" >
                                                                                            <label class="mt-3" for="">Admin Name:</label>
                                                                                            <h5><b><?php echo $_SESSION['admin']['name']; ?> <?php echo $_SESSION['superadmin']['name']; ?></b></h5>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <input type="hidden" name="ticket_type" value="Part Ticket">
                                                                                            <label class="mt-3" for="">Ticket Type:</label>
                                                                                            <h5><b>Part Ticket</b></h5>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <table class="table" id="VolunteersPart">
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
                                                                                        $queryVl = "SELECT * FROM accounts WHERE type = 'volunteer'";
                                                                                        $resultVl = mysqli_query($conn, $queryVl);
                                                                                        while ($vl = mysqli_fetch_array($resultVl)) {
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td><input type="checkbox" name="volunteer_id[]" value="<?php echo $vl['id'] ?>"></td>
                                                                                        <td><?php echo $vl['name'] ?></td>
                                                                                        <td><?php echo $vl['email'] ?></td>
                                                                                        <td><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#volunteerPart<?php echo $vl['id'] ?><?php echo $row['id'] ?>"><i class="fa-solid fa-magnifying-glass"></i></button></td>
                                                                                    </tr>

                                                                                    <div class="modal modal-lg fade" id="volunteerPart<?php echo $vl['id'] ?><?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="volunteer" aria-hidden="true">
                                                                                        <div class="modal-dialog modal-dialog-scrollable">
                                                                                            <div class="modal-content">
                                                                                                    <div class="modal-header bg-dark text-white">
                                                                                                        <h5 class="modal-title" id="exampleModalLabel">Volunteer: <?php echo $vl['name'] ?></h5>
                                                                                                    
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <h3>Volunteer Details:</h3>
                                                                                                        <ul>
                                                                                                            <li>Name: <?php echo $vl['name'] ?></li>
                                                                                                            <li>Username: <?php echo $vl['username'] ?></li>
                                                                                                            <li>Email: <?php echo $vl['email'] ?></li>
                                                                                                            <li>Contact: <?php echo $vl['contact'] ?></li>
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
                                                                            <div class="col-md-6">
                                                                                <div class="text-center">
                                                                                    <label for="">Priority:</label>
                                                                                    <br>
                                                                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                                        <input type="radio" class="btn-check" name="partBtn" value="Urgent" id="partUrgent<?php echo $row['id'] ?>" autocomplete="off" >
                                                                                        <label class="btn btn-outline-danger" for="partUrgent<?php echo $row['id'] ?>">Urgent</label>

                                                                                        <input type="radio" class="btn-check" name="partBtn" value="High" id="partHigh<?php echo $row['id'] ?>" autocomplete="off">
                                                                                        <label class="btn btn-outline-warning" for="partHigh<?php echo $row['id'] ?>">High</label>

                                                                                        <input type="radio" class="btn-check" name="partBtn" value="Mid" id="partMid<?php echo $row['id'] ?>" autocomplete="off">
                                                                                        <label class="btn btn-outline-primary" for="partMid<?php echo $row['id'] ?>">Mid</label>

                                                                                        <input type="radio" class="btn-check" name="partBtn" value="Low" id="partLow<?php echo $row['id'] ?>" autocomplete="off" checked>
                                                                                        <label class="btn btn-outline-secondary" for="partLow<?php echo $row['id'] ?>">Low</label>
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <label class="" for="">Set Deadline:</label>
                                                                                <input type="date" name="ticket_deadline" class="form-control" required>
                                                                                <label class="mt-3" for="">Ticket Title:</label>
                                                                                <input class="form-control" name="ticket_title" type="text" required>
                                                                                <label class="mt-3" for="">Ticket Description:</label>
                                                                                <textarea class="form-control" name="ticket_desc" value=""  name="desc" rows="10" cols="5" required></textarea>
                                                                            </div>
                                                                        </div>
                                            
                                                                    </div>
                                                                    <div class="modal-footer justify-content-center">
                                                                        <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                                        <input type="hidden" name='main_event_id' value="<?php echo $_GET['event_id'] ?>">
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
                                                                        <input type="hidden" name="part_id" value="<?php echo $row['id'] ?>">
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
                                                                    
                                                                    <div class="row">
                                                                        <div class="col d-flex gap-2">
                                                                            <button class="btn btn-sm btn-success" title="Add Ticket" data-bs-toggle="modal" data-bs-target="#addTicketSponsor<?php echo $sponsors['id'] ?>"><i class="fa-solid fa-ticket"></i></button>

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
                                                                        </div>
                                                                    </div>

                                                                    <!--Modal Add Ticket Sponsor-->
                                                                    <div class="modal modal-xl fade" id="addTicketSponsor<?php echo $sponsors['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="addTicket" aria-hidden="true">
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
                                                                                                    <h5><b><?php echo $title; ?></b></h5>
                                                                                                    <div class="row">
                                                                                                        <div class="col">
                                                                                                            <input type="hidden" name="ticket_admin" value="<?php echo $_SESSION['admin']['name']; ?> <?php echo $_SESSION['superadmin']['name']; ?>" >
                                                                                                            <label class="mt-3" for="">Admin Name:</label>
                                                                                                            <h5><b><?php echo $_SESSION['admin']['name']; ?> <?php echo $_SESSION['superadmin']['name']; ?></b></h5>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                            <input type="hidden" name="ticket_type" value="Sponsor Ticket">
                                                                                                            <label class="mt-3" for="">Ticket Type:</label>
                                                                                                            <h5><b>Sponsor Ticket</b></h5>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <hr>
                                                                                                <table class="table" id="VolunteersSponsor">
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
                                                                                                        $queryVls = "SELECT * FROM accounts WHERE type = 'volunteer'";
                                                                                                        $resultVls = mysqli_query($conn, $queryVls);
                                                                                                        while ($vls = mysqli_fetch_array($resultVls)) {
                                                                                                    ?>
                                                                                                    <tr>
                                                                                                        <td><input type="checkbox" name="volunteer_id[]" value="<?php echo $vls['id'] ?>"></td>
                                                                                                        <td><?php echo $vls['name'] ?></td>
                                                                                                        <td><?php echo $vls['email'] ?></td>
                                                                                                        <td><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#volunteerSponsor<?php echo $vls['id'] ?><?php echo $sponsors['id'] ?>"><i class="fa-solid fa-magnifying-glass"></i></button></td>
                                                                                                    </tr>

                                                                                                    <div class="modal modal-lg fade" id="volunteerSponsor<?php echo $vls['id'] ?><?php echo $sponsors['id'] ?>" tabindex="-1" aria-labelledby="volunteer" aria-hidden="true">
                                                                                                        <div class="modal-dialog modal-dialog-scrollable">
                                                                                                            <div class="modal-content">
                                                                                                                    <div class="modal-header bg-dark text-white">
                                                                                                                        <h5 class="modal-title" id="exampleModalLabel">Volunteer: <?php echo $vls['name'] ?></h5>
                                                                                                                    
                                                                                                                    </div>
                                                                                                                    <div class="modal-body">
                                                                                                                        <h3>Volunteer Details:</h3>
                                                                                                                        <ul>
                                                                                                                            <li>Name: <?php echo $vls['name'] ?></li>
                                                                                                                            <li>Username: <?php echo $vls['username'] ?></li>
                                                                                                                            <li>Email: <?php echo $vls['email'] ?></li>
                                                                                                                            <li>Contact: <?php echo $vls['contact'] ?></li>
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
                                                                                            <div class="col-md-6">
                                                                                                <div class="text-center">
                                                                                                    <label for="">Priority:</label>
                                                                                                    <br>
                                                                                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                                                        <input type="radio" class="btn-check" name="sponsorBtn" value="Urgent" id="sponsorUrgent<?php echo $sponsors['id'] ?>" autocomplete="off" >
                                                                                                        <label class="btn btn-outline-danger" for="sponsorUrgent<?php echo $sponsors['id'] ?>">Urgent</label>

                                                                                                        <input type="radio" class="btn-check" name="sponsorBtn" value="High" id="sponsorHigh<?php echo $sponsors['id'] ?>" autocomplete="off">
                                                                                                        <label class="btn btn-outline-warning" for="sponsorHigh<?php echo $sponsors['id'] ?>">High</label>

                                                                                                        <input type="radio" class="btn-check" name="sponsorBtn" value="Mid" id="sponsorMid<?php echo $sponsors['id'] ?>" autocomplete="off">
                                                                                                        <label class="btn btn-outline-primary" for="sponsorMid<?php echo $sponsors['id'] ?>">Mid</label>

                                                                                                        <input type="radio" class="btn-check" name="sponsorBtn" value="Low" id="sponsorLow<?php echo $sponsors['id'] ?>" autocomplete="off" checked>
                                                                                                        <label class="btn btn-outline-secondary" for="sponsorLow<?php echo $sponsors['id'] ?>">Low</label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <br>
                                                                                                <label class="" for="">Set Deadline:</label>
                                                                                                <input type="date" name="ticket_deadline" class="form-control" required>
                                                                                                <label class="mt-3" for="">Ticket Title:</label>
                                                                                                <input class="form-control" name="ticket_title" type="text" required>
                                                                                                <label class="mt-3" for="">Ticket Description:</label>
                                                                                                <textarea class="form-control" name="ticket_desc" value=""  name="desc" rows="10" cols="5" required></textarea>
                                                                                            </div>
                                                                                        </div>
                                                            
                                                                                    </div>
                                                                                    <div class="modal-footer justify-content-center">
                                                                                        <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                                                        <input type="hidden" name='main_event_id' value="<?php echo $_GET['event_id'] ?>">
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

                                    <!--Add Ticket Event-->
                                    <div class="modal modal-xl fade" id="addTicket" tabindex="-1" role="dialog" aria-labelledby="addTicket" aria-hidden="true">
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
                                                                    <h5><b><?php echo $title; ?></b></h5>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <input type="hidden" name="ticket_admin" value="<?php echo $_SESSION['admin']['name']; ?> <?php echo $_SESSION['superadmin']['name']; ?>" >
                                                                            <label class="mt-3" for="">Admin Name:</label>
                                                                            <h5><b><?php echo $_SESSION['admin']['name']; ?> <?php echo $_SESSION['superadmin']['name']; ?></b></h5>
                                                                        </div>
                                                                        <div class="col">
                                                                            <input type="hidden" name="ticket_type" value="Event Ticket">
                                                                            <label class="mt-3" for="">Ticket Type:</label>
                                                                            <h5><b>Event Ticket</b></h5>
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
                                                                        <td><input type="checkbox" name="volunteer_id[]" value="<?php echo $row['id'] ?>"></td>
                                                                        <td><?php echo $row['name'] ?></td>
                                                                        <td><?php echo $row['email'] ?></td>
                                                                        <td><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#volunteerEvent<?php echo $row['id'] ?>"><i class="fa-solid fa-magnifying-glass"></i></button></td>
                                                                    </tr>

                                                                    <div class="modal modal-lg fade" id="volunteerEvent<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="volunteer" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-scrollable">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header bg-dark text-white">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Volunteer: <?php echo $row['name'] ?></h5>
                                                                                       
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <h3>Volunteer Details:</h3>
                                                                                        <ul>
                                                                                            <li>Name: <?php echo $row['name'] ?></li>
                                                                                            <li>Username: <?php echo $row['username'] ?></li>
                                                                                            <li>Email: <?php echo $row['email'] ?></li>
                                                                                            <li>Contact: <?php echo $row['contact'] ?></li>
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
                                                            <div class="col-md-6">
                                                                <div class="text-center">
                                                                    <label for="">Priority:</label>
                                                                    <br>
                                                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                        <input type="radio" class="btn-check" name="eventBtn" value="Urgent" id="eventUrgent" autocomplete="off" >
                                                                        <label class="btn btn-outline-danger" for="eventUrgent">Urgent</label>

                                                                        <input type="radio" class="btn-check" name="eventBtn" value="High" id="eventHigh" autocomplete="off">
                                                                        <label class="btn btn-outline-warning" for="eventHigh">High</label>

                                                                        <input type="radio" class="btn-check" name="eventBtn" value="Mid" id="eventMid" autocomplete="off">
                                                                        <label class="btn btn-outline-primary" for="eventMid">Mid</label>

                                                                        <input type="radio" class="btn-check" name="eventBtn" value="Low" id="eventLow" autocomplete="off" checked>
                                                                        <label class="btn btn-outline-secondary" for="eventLow">Low</label>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label class="" for="">Set Deadline:</label>
                                                                <input type="date" name="ticket_deadline" class="form-control" required>
                                                                <label class="mt-3" for="">Ticket Title:</label>
                                                                <input class="form-control" name="ticket_title" type="text" required>
                                                                <label class="mt-3" for="">Ticket Description:</label>
                                                                <textarea class="form-control" name="ticket_desc" value=""  name="desc" rows="10" cols="5" required></textarea>
                                                            </div>
                                                        </div>
                             
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
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
                                                <div class="card h-100">
                                                    <div class="card-header d-flex justify-content-between align-items-center">
                                                        <h6 class="card-title"><strong><?php echo $row['ticket_title'] ?></strong></h6>
                                                        <div class="place-it-on-the-right-side-corner">
                                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delTicket<?php echo $row['id'] ?>"><i class="fa-solid fa-trash"></i></button>
                                                    
                                                            <!--Delete Ticket-->
                                                            <div class="modal fade" id="delTicket<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="delTicket" aria-hidden="true">
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
                                                        <h6>Priority:
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
                                                        <h6>Created by: <b><?php echo $row['ticket_admin'] ?></b></h6>
                                                        <h6>Ticket Deadline: <b><?php echo $row['ticket_deadline'] ?></b> </h6>
                                               
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <a style="text-decoration:none" href="" class="text-success" data-bs-toggle="modal" data-bs-target="#detTicket<?php echo $row['id'] ?>">View Details</a>
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
                                                                                            <button class="btn btn-sm btn-dark text-white" title="Update" style="font-size:8px" data-bs-toggle="modal" data-bs-target="#priority<?php echo $row['id'] ?>">
                                                                                            <i class="fa-solid fa-pencil"></i></button>

                                                                                            <!-- Modal Priority -->
                                                                                            <div class="modal fade" id="priority<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header bg-dark text-white">
                                                                                                            <h5 class="modal-title" id="">Update Priority Level</h5>
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
                                                                                                                <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                                                                                <input type="hidden" name='main_event_id' value="<?php echo $_GET['event_id'] ?>">
                                                                                                                <input type="hidden" name='main_title' value="<?php echo $_GET['title'] ?>">
                                                                                                                <input type="hidden" name='main_start' value="<?php echo $_GET['start'] ?>">
                                                                                                                <input type="hidden" name='main_end' value="<?php echo $_GET['end'] ?>">
                                                                                                                <input type="hidden" name='main_allday' value="<?php echo $_GET['allday'] ?>">
                                                                                                                <input type="hidden" name='main_desc' value="<?php echo $_GET['desc']; ?>">
                                                                                                                <button type="submit" class="btn btn-dark w-100" name="update_priority">Update</button>
                                                                                                            </div>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

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
                                                                                            
                                                                                            <button class="btn btn-sm btn-dark text-white" title="Update" style="font-size:8px" data-bs-toggle="modal" data-bs-target="#status<?php echo $row['id'] ?>">
                                                                                            <i class="fa-solid fa-pencil"></i></button>

                                                                                             <!-- Modal Status -->
                                                                                            <div class="modal fade" id="status<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header bg-dark text-white">
                                                                                                            <h5 class="modal-title" id="">Update Status</h5>
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
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <input type="hidden" name="status_id" value="<?php echo $row['id'] ?>">
                                                                                                                <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                                                                                <input type="hidden" name='main_event_id' value="<?php echo $_GET['event_id'] ?>">
                                                                                                                <input type="hidden" name='main_title' value="<?php echo $_GET['title'] ?>">
                                                                                                                <input type="hidden" name='main_start' value="<?php echo $_GET['start'] ?>">
                                                                                                                <input type="hidden" name='main_end' value="<?php echo $_GET['end'] ?>">
                                                                                                                <input type="hidden" name='main_allday' value="<?php echo $_GET['allday'] ?>">
                                                                                                                <input type="hidden" name='main_desc' value="<?php echo $_GET['desc']; ?>">
                                                                                                                <button type="submit" name="update_status" class="btn btn-dark w-100">Update</button>
                                                                                                            </div>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                        <button
                                                                                        style="border: none; background-color: transparent; padding: 0;" title="Add" data-bs-toggle="modal" data-bs-target="#instructions<?php echo $row['id'] ?>">
                                                                                        <i class="bi bi-plus-square-fill">
                                                                                        </i></button> <label for="">Additional Instructions</label>

                                                                                        <!-- Modal Additional Instructions -->
                                                                                        <div class="modal fade" id="instructions<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                            <div class="modal-dialog">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header bg-dark text-white">
                                                                                                        <h5 class="modal-title" id="">Add Additional Instructions</h5>
                                                                                                    </div>
                                                                                                    <form action="./include/process.php" method="POST">
                                                                                                        <div class="modal-body">
                                                                                                            <div class="instructions" style="max-height: 200px; overflow-y: auto;">
                                                                                                                <button id="addBtn<?php echo $row['id'] ?>" type="button" class="btn btn-sm btn-secondary w-100"><i class="bi bi-plus-square-fill"></i> Add Instructions</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                            <input type="hidden" name="instructions_id" value="<?php echo $row['id'] ?>">
                                                                                                            <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                                                                            <input type="hidden" name='main_event_id' value="<?php echo $_GET['event_id'] ?>">
                                                                                                            <input type="hidden" name='main_title' value="<?php echo $_GET['title'] ?>">
                                                                                                            <input type="hidden" name='main_start' value="<?php echo $_GET['start'] ?>">
                                                                                                            <input type="hidden" name='main_end' value="<?php echo $_GET['end'] ?>">
                                                                                                            <input type="hidden" name='main_allday' value="<?php echo $_GET['allday'] ?>">
                                                                                                            <input type="hidden" name='main_desc' value="<?php echo $_GET['desc']; ?>">
                                                                                                            <button type="submit" name="addInstructions" class="btn btn-dark w-100">Add</button>
                                                                                                        </div>
                                                                                                    </form>
                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <!--Add Instruction Input-->
                                                                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                                                                        </script>
                                                                                    
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
                                                                                        <h5>Ticket Volunteers: 
                                                                                            <button
                                                                                            style="border: none; background-color: transparent; padding: 0;" title="Add" data-bs-toggle="modal" data-bs-target="#addVolunteer<?php echo $row['id'] ?>">
                                                                                            <i class="bi bi-plus-square-fill">
                                                                                            </i></button>
                                                                                        </h5>

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
                                                                                        <div class="modal modal-md fade" id="addVolunteer<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                                                                            <div class="modal-dialog">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header bg-dark text-white">
                                                                                                        <h5 class="modal-title" id="">Add Volunteer</h5>
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
                                                                                                                                <h5 class="modal-title" id="exampleModalLabel">Volunteer: <?php echo $addVolunteer['name'] ?></h5>
                                                                                                                            
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
                                                                                                            <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                                                                            <input type="hidden" name='main_event_id' value="<?php echo $_GET['event_id'] ?>">
                                                                                                            <input type="hidden" name='main_title' value="<?php echo $_GET['title'] ?>">
                                                                                                            <input type="hidden" name='main_start' value="<?php echo $_GET['start'] ?>">
                                                                                                            <input type="hidden" name='main_end' value="<?php echo $_GET['end'] ?>">
                                                                                                            <input type="hidden" name='main_allday' value="<?php echo $_GET['allday'] ?>">
                                                                                                            <input type="hidden" name='main_desc' value="<?php echo $_GET['desc']; ?>">
                                                                                                            <button type="submit" name="addVolunteers" class="btn btn-dark w-100">Add</button>
                                                                                                        </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
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
                                            <div class="card mb-4" style="max-height: 500px; overflow-y: auto;">
                                                <?php 
                                                    $queryAsk = "SELECT * FROM tickets WHERE ticket_type = 'Ask Ticket' AND event_id = '$id'";
                                                    
                                                    $resultAsk = mysqli_query($conn, $queryAsk);
                                                    while ($rowAsk = mysqli_fetch_array($resultAsk)) {
                                                        ?>
                                                        <div class="p-2">
                                                            <div class="card bg-secondary text-white mb-4">
                                                                <div class="card-body">
                                                                    <h6><?php echo $rowAsk['ticket_title'] ?></h6>
                                                                </div>
                                                                <div class="card-footer text-center">
                                                                    <h6><a class="text-white" style="text-decoration:none" href="" data-bs-toggle="modal" data-bs-target="#detTicket5<?php echo $rowAsk['id'] ?>">View</a></h6>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Ticket Details-->
                                                        <div class="modal modal-xl fade" id="detTicket5<?php echo $rowAsk['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="detTicket" aria-hidden="true">
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
                                                                                <button class="nav-link active" id="main-tab" data-bs-toggle="tab" data-bs-target="#main<?php echo $rowAsk['id'] ?>" type="button" role="tab" aria-controls="main" aria-selected="true">Main</button>
                                                                            </li>
                                                                            <li class="nav-item" role="presentation">
                                                                                <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments<?php echo $rowAsk['id'] ?>" type="button" role="tab" aria-controls="comments" aria-selected="false">Comments</button>
                                                                            </li>
                                                                        
                                                                        </ul>
                                                                
                                                                        <div class="tab-content" id="myTabContent">
                                                                            <div class="tab-pane fade show active p-3" id="main<?php echo $rowAsk['id'] ?>" role="tabpanel" aria-labelledby="main-tab">
                                                                                <div class="row">
                                                                                    <div class="col-md-8">
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <h6 class="mt-3">Ticket Title:</h6>
                                                                                                <h6 class="mt-3"><b><?php echo $rowAsk['ticket_title'] ?></b> </h6>
                                                                                            </div>
                                                                                            <div class="col">
                                                                                                <h6 class="mt-3">Ticket Admin: </h6>
                                                                                                <h6 class="mt-3"><b><?php echo $rowAsk['ticket_admin'] ?></b></h6>
                                                                                            </div>
                                                                                        </div>
                                                                                        <h6 class="mt-3">Ticket Description: </h6>
                                                                                        <h6 class="mt-3"><b><?php echo $rowAsk['ticket_desc'] ?></b></h6>
                                                                                        <br>
                                                                                        <hr>
                                                                                        <div class="row align-items-center">
                                                                                            <div class="col-auto">
                                                                                                <h6>Priority Level:</h6>
                                                                                            </div>
                                                                                            <div class="col">
                                                                                                <?php 
                                                                                                if($rowAsk['ticket_priority'] == 'Low'){
                                                                                                    ?>
                                                                                                    <div class="alert alert-secondary d-inline-flex align-items-center py-1"
                                                                                                        role="alert">
                                                                                                        <strong>Low</strong>
                                                                                                    </div>
                                                                                                <?php
                                                                                                }elseif($rowAsk['ticket_priority'] == 'Mid'){
                                                                                                    ?>
                                                                                                    <div class="alert alert-primary d-inline-flex align-items-center py-1"
                                                                                                        role="alert">
                                                                                                        <strong>Mid</strong>
                                                                                                    </div>
                                                                                                <?php
                                                                                                }elseif($rowAsk['ticket_priority'] == 'High'){
                                                                                                    ?>
                                                                                                    <div class="alert alert-warning d-inline-flex align-items-center py-1"
                                                                                                        role="alert">
                                                                                                        <strong>High</strong>
                                                                                                    </div>
                                                                                                <?php
                                                                                                }elseif($rowAsk['ticket_priority'] == 'Urgent'){
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
                                                                                                    if($rowAsk['ticket_status'] == 'Your-ticket'){
                                                                                                    ?>
                                                                                                        <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-1">
                                                                                                            <strong>Your-ticket</strong>
                                                                                                        </div>
                                                                                                    <?php
                                                                                                    }
                                                                                                    elseif($rowAsk['ticket_status'] == 'To-Do'){
                                                                                                    ?>
                                                                                                        <div class="alert alert-primary rounded-pill d-inline-flex align-items-center py-1">
                                                                                                            <strong>To-Do</strong>
                                                                                                        </div>
                                                                                                    <?php
                                                                                                    }
                                                                                                    elseif($rowAsk['ticket_status'] == 'In-Review'){ 
                                                                                                    ?>
                                                                                                        <div class="alert alert-warning rounded-pill d-inline-flex align-items-center py-1">
                                                                                                            <strong>In-Review</strong>
                                                                                                        </div>
                                                                                                    <?php
                                                                                                    }
                                                                                                    elseif($rowAsk['ticket_status'] == 'Revision'){ 
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
                                                                                        <hr>
                                                                                        <div>
                                                                                            <h6>Ticket Volunteers: </h6>

                                                                                            <div class="col">
                                                                                            <?php 
                                                                                                $ids = $rowAsk['ticket_volunteers_id'];
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
                                                                                    <div class="col-md-4 mt-3">
                                                                                        <h6>Ticket Type: <b><?php echo $rowAsk['ticket_type'] ?></b> </h6>
                                                                                        <h6 class="mt-3">Ticket Deadline: <b class="text-danger"><?php echo $rowAsk['ticket_deadline'] ?></b> </h6>
                                                                                     
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

                                                        <?php
                                                    }
                                                ?>
                                    
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
        $(document).ready(function() {
            $("#select2insidemodal").select2({
                dropdownParent: $("#addPart")
            });
        });
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