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
                        <?php 
                                                        
                            $query = "SELECT * FROM events WHERE event_id = $id";
                            $result = mysqli_query($conn, $query);
                            $getData = mysqli_fetch_array($result);
                            
                            if($getData == null){
                                echo '';
                            }else{
                                ?>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#agenda" type="button"
                                        role="tab" aria-controls="agenda" aria-selected="false">Agenda</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ticket" type="button"
                                        role="tab" aria-controls="ticket" aria-selected="false">Ticket</button>
                                </li>
                            <?php
                            }
                        ?>

              
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
                                            <div class="mt-3">
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
                                                            <th scope="col">Sponsors</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            $query = "SELECT * FROM events WHERE event_id = $id";
                                                            $result = mysqli_query($conn, $query);
                                                            while ($row = mysqli_fetch_array($result)) {
                                                            
                                                                            
                                                            $start_timestamp = strtotime($row['startdate']);
                                                            $end_timestamp = strtotime($row['enddate']);

                                                            // Calculate the difference in seconds
                                                            $duration_seconds = $end_timestamp - $start_timestamp;

                                                            // Calculate hours, minutes, and seconds
                                                            $hours = floor($duration_seconds / 3600);
                                                            $minutes = floor(($duration_seconds % 3600) / 60);
                                                            $seconds = $duration_seconds % 60;

                                                            // Format the duration
                                                            $duration = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds)
                                                        ?>
                                                        <tr>
                                                            <th><?php echo $row['title'] ?></th>
                                                            <td><?php echo $desc ?></td>
                                                            <td>Guests Sample</td>
                                                            <td>Volunteer Sample</td>
                                                            <td><?php echo date('h:i:s A', strtotime($row['startdate'])); ?></td>
                                                            <td><?php echo date('h:i:s A', strtotime($row['enddate'])); ?> </td>
                                                            <td><?php echo $duration; ?></td>
                                                            <td>Sample sponsors</td>
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
                                            <div class="text-center">
                                                <h4> <b>Event Start</b></h4>
                                                <p class="text-danger"><i>* Please select a specific time in the calendar. <br> (One Time Only)</i></p>
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
                                            <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#addPart">Add Part</button>

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
                                                        <?php 
                                                        
                                                            $query = "SELECT * FROM events WHERE event_id = $id";
                                                            $result = mysqli_query($conn, $query);
                                                            while ($row = mysqli_fetch_array($result)) {
                                                            $part_id = $row['id'];
                                                        ?>
                                                        <form action="./include/process.php" method="POST">
                                                            <div class="mt-2">
                                                                <label for="">Part Name:</label>
                                                                <h5><strong><?php echo $row['title']; ?></strong></h5>
                                                                <label for="" class="mt-2">Description:</label>
                                                                <?php echo $desc; ?>
                                                                <hr>
                                                                <label for="">Guests / Volunteer:</label>
                                                                <select class="form-select" name="" id="">
                                                                    <option value="">Sample People / Volunteer</option>
                                                                    <option value="">Others</option>
                                                                </select>
                                                                <label for="" class="mt-3">Volunteer:</label>
                                                                <select class="form-select" name="" id="">
                                                                    <option value="">Sample Volunteer</option>
                                                                    <option value="">Others</option>
                                                                </select>
                                                                <hr>
                                                                <label for="">Time:</label>
                                                                <h6 class="mt-2"><?php echo date('h:i:s A', strtotime($row['startdate'])); ?> - <?php echo date('h:i:s A', strtotime($row['enddate'])); ?></h6>
                                                                
                                                                <label for="" class="mt-3">Duration:</label>    
                                                                <input class="form-control" type="number" name="duration" required>
                                                            </div>
                
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                            <input type="hidden" name="current_start" value="<?php echo $row['startdate'] ?>">
                                                            <input type="hidden" name="current_end" value="<?php echo $row['enddate'] ?>">
                                                            <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                            <input type="hidden" name='main_event_id' value="<?php echo $_GET['event_id'] ?>">
                                                            <input type="hidden" name='main_title' value="<?php echo $_GET['title'] ?>">
                                                            <input type="hidden" name='main_start' value="<?php echo $_GET['start'] ?>">
                                                            <input type="hidden" name='main_end' value="<?php echo $_GET['end'] ?>">
                                                            <input type="hidden" name='main_allday' value="<?php echo $_GET['allday'] ?>">
                                                            <input type="hidden" name='main_desc' value="<?php echo $desc; ?>">

                                                            <button type="submit" name="addPart" class="btn btn-warning text-white">Add Part</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        
                                                        </div>
                                                        <?php 
                                                        }
                                                        ?>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addSponsors">Add Sponsors</button>

                                            <!-- Modal Add Sponsors -->
                                            <div class="modal modal-lg fade" id="addSponsors" tabindex="-1" aria-labelledby="addSponsors"
                                            aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h5 class=" modal-title text-white">Add Sponsors</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
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
                                                                <?php 
                                                        
                                                                    $query = "SELECT * FROM guest_sponsors WHERE type='sponsors'";
                                                                    $result = mysqli_query($conn, $query);
                                                                    while ($row = mysqli_fetch_array($result)) {
                        
                                                                ?>
                                                                <tbody>
                                                                    <tr>
                                                                        <th><?php echo $row['name'] ?></th>
                                                                        <td><?php echo $row['position'] ?></td>
                                                                        <td><?php echo $row['company'] ?></td>
                                                                        <td><?php echo $row['status'] ?></td>
                                                                        <td>
                                                                            <form action="./include/process.php" method="POST">
                                                                                <input type="hidden" name='sponsor_id' value="<?php echo $row['id'] ?>">
                                                                                <input type="hidden" name='sponsor' value="<?php echo $row['name'] ?>">
                                                                                <input type="hidden" name='part_id' value="<?php echo $part_id ?>">
                                                                                <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                                                <input type="hidden" name='main_event_id' value="<?php echo $_GET['event_id'] ?>">
                                                                                <input type="hidden" name='main_title' value="<?php echo $_GET['title'] ?>">
                                                                                <input type="hidden" name='main_start' value="<?php echo $_GET['start'] ?>">
                                                                                <input type="hidden" name='main_end' value="<?php echo $_GET['end'] ?>">
                                                                                <input type="hidden" name='main_allday' value="<?php echo $_GET['allday'] ?>">
                                                                                <input type="hidden" name='main_desc' value="<?php echo $desc; ?>">

                                                                                <button class="btn btn-success" name="addSponsor">Add</button>
                                                                            </form>
                                                         
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
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
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <?php 
                                                $query = "SELECT * FROM events WHERE event_id = $id";
                                                $result = mysqli_query($conn, $query);
                                                while ($row = mysqli_fetch_array($result)) {

                                            ?>
                                            <h6>Event Duration: <b><?php echo $duration; ?></b></h6>
                                            <hr>
                                            <h6>Agenda Overview:</h6>
                                            <h6>Part Name: <b><?php echo $row['title']; ?></b> </h6>
                                            <h6>Start/End: <b><?php echo date('h:i:s A', strtotime($row['startdate'])); ?> - <?php echo date('h:i:s A', strtotime($row['enddate'])); ?></b></h6>
                                            <?php 
                                            } 
                                            ?>
                                        </div>
                                    </div>
                                                        
                                    <br>
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
                                                <th scope="col">Sponsors</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $query = "SELECT * FROM events WHERE event_id = $id";
                                                $result = mysqli_query($conn, $query);
                                                while ($row = mysqli_fetch_array($result)) {

                                            ?>
                                            <tr>
                                                <th><?php echo $row['title'] ?></th>
                                                <td><?php echo $desc ?></td>
                                                <td>Guests Sample</td>
                                                <td>Volunteer Sample</td>
                                                <td><?php echo date('h:i:s A', strtotime($row['startdate'])); ?></td>
                                                <td><?php echo date('h:i:s A', strtotime($row['enddate'])); ?> </td>
                                                <td><?php echo $duration; ?></td>
                                                <td><?php echo $row['sponsors'] ?></td>
                                            </tr>
                                            <?php 
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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
                                                        <button type="submit" name="addTicket" class="btn btn-success">Add Ticket</button>
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
                                                        <h6 class="card-title"><strong><?php echo $row['ticket_title'] ?></strong></h6>
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
            selectable: true,
            // editable: true,
            selectMirror: true,
            allDaySlot: false,
            select: function(arg) {
                var title = prompt('Event Title:');
                if (title) {
                    var eventData = {
                        event_id:<?php echo json_encode($id) ?>,
                        title: title,
                        start: arg.start,
                        end: arg.end,
                        allDay: arg.allDay,
                        desc: <?php echo json_encode($desc) ?>,
                    };

                    // Save event to database
                    saveEventToDatabase(eventData);
                    // location.reload();
                }
                calendar.unselect();
            },
            eventClick: function(arg) {
                if (confirm('Are you sure you want to delete this event?')) {
                    // Remove event from calendar
                    arg.event.remove();
                    
                    // Delete event from database
                    deleteEventFromDatabase(arg.event);
                    location.reload();
                }
            }

        });

        calendar.render();

        function saveEventToDatabase(saveData) {
            // Send event data to server for saving
            $.ajax({
                url: './include/process.php',
                name:'calendar',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({ action: 'savePart', eventData: saveData }),
                success: function(response) {
                    if (response == 'Existing event'){
                        alert('There is an Existing Event!');
                        location.reload()
                    }else{
                        console.log(response);
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error saving event to database:', error);
                }
            });
        }

        function deleteEventFromDatabase(event) {
            // Send event ID to server for deletion
            var deleteData = { delId: event.id };
            $.ajax({
                url: './include/process.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({ action: 'delete', eventData: deleteData }),
                success: function(response) {
                    console.log(response);
                    //console.log('Event deleted from database:', event);
                },
                error: function(xhr, status, error) {
                    console.error('Error deleting event from database:', error);
                }
            });
        }

    });

    </script>

</body>

</html>