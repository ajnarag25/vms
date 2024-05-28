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
                            <h4 class="mt-4"><b>Dashboard</b></h4>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Welcome Admin</li>
                            </ol>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="LiveTime"></span> </h4>
                        </div>
                    </div>
                    
                    <div class="row">
                        <?php 
                        // Get all volunteers
                        $queryVolunteers = "SELECT id, name FROM accounts WHERE type = 'volunteer'";
                        $resultVolunteers = mysqli_query($conn, $queryVolunteers);

                        if ($resultVolunteers) {
                            $volunteerTickets = [];

                            while ($rowVolunteer = mysqli_fetch_assoc($resultVolunteers)) {
                                $volunteerId = $rowVolunteer['id'];
                                
                                // Check the number of to-do tickets for each volunteer
                                $queryTodoCount = "
                                    SELECT COUNT(*) AS todo_count 
                                    FROM tickets 
                                    WHERE ticket_status = 'To-Do' AND FIND_IN_SET('$volunteerId', ticket_volunteers_id)";
                                $resultTodoCount = mysqli_query($conn, $queryTodoCount);
                                
                                if ($resultTodoCount) {
                                    $todoCountRow = mysqli_fetch_assoc($resultTodoCount);
                                    $todoCount = $todoCountRow['todo_count'];
                                    
                                    // Add volunteer and their to-do count to the array
                                    $volunteerTickets[] = [
                                        'id' => $volunteerId,
                                        'name' => $rowVolunteer['name'],
                                        'todo_count' => $todoCount
                                    ];

                                    // var_dump ($resultTodoCount);
                                }
                            }

                            // var_dump ($resultVolunteers);

                            // Sort volunteers by the number of to-do tickets in descending order
                            usort($volunteerTickets, function($a, $b) {
                                return $b['todo_count'] - $a['todo_count'];
                            });

                            // Display the ranked volunteers
                            foreach ($volunteerTickets as $volunteer) {
                                echo "Volunteer Name: " . $volunteer['name'] . " - To-Do Tickets: " . $volunteer['todo_count'] . "<br>";
                            }
                        } 
                        
                        ?>
                        <div class="col-md-4">
                            <div class="card mb-4 h-100">
                                <div class="bg-success text-white card-header text-center">
                                    <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#announcement"> <i class="fa-solid fa-plus"></i> </button>
                                    <a href="" class="text-white" style="text-decoration:none" data-bs-toggle="modal" data-bs-target="#announcementViewAll">Announcements</a>
                                </div>

                                <!-- Create Announcement -->
                                <div class="modal fade" id="announcement" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-dark text-white">
                                                <h6 class="modal-title" id="">Create Announcement</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="./include/process.php" method="POST">
                                                <div class="modal-body">
                                                    <label for="">Announcement Title:</label>
                                                    <input class="form-control" type="text" name="title" required>
                                                    <label for="">Subject:</label>
                                                    <input class="form-control" type="text" name="subject" required>
                                                    <label for="">Details:</label>
                                                    <textarea class="form-control" name="details" id="" rows="3" cols="3"required></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success w-100" name="createAnnouncement">Create</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
                                <div class="bg-success text-white card-header text-center">
                                    <i class="fa-solid fa-comments"></i>
                                    Suggestion
                                </div>
                                <br>
                                <ul>
                                    <li>Sample suggestion only.</li>
                                </ul>
                                <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas>
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
                                        $query = "SELECT * FROM tickets WHERE ticket_priority = 'Urgent'";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
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
                                }
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
                                    }
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