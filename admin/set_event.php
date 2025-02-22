<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Set Event - Volunteer Management Strageties</title>
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
                            <h4 class="mt-4"><b>Plan Event / Set Event</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="LiveTime"></span> </h4>
                        </div>
                    </div>

                    <!-- <h5>Recommendation -> <span class="text-success">Sample</span> </h5> -->
              
                    <!-- Modal -->
                    <div class="modal fade" id="setevent" tabindex="-1" aria-labelledby="setevent" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-success">
                                    <h5 class=" modal-title text-white">Set Event?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="">
                                    <div class="modal-body">
                                        <label for="">From:</label>
                                        <input class="form-control" type="date" required>
                                        <label for="">To:</label>
                                        <input class="form-control" type="date" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Confirm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-9">
                            <div class="card mb-4 ">
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
                            <div class="card mb-4">
                                <div class="bg-success text-white card-header text-center">
                                    <i class="fa-solid fa-address-book"></i>
                                    Set Event
                                </div>
                                
                                <div style="max-height: 750px; overflow-y: auto;">
                                    <div class="p-3">
                                        <?php 
                                            $query = "SELECT * FROM events WHERE event_id = 0";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                            
                                            $url = 'event_plan.php?id=' . urlencode($row['id']) .
                                            '&event_id=' . urlencode($row['event_id']) .
                                            '&allday=' . urlencode($row['allday']) .
                                            '&title=' . urlencode($row['title']) .
                                            '&start=' . urlencode($row['startdate']) .
                                            '&end=' . urlencode($row['enddate']) .
                                            '&desc=' . urlencode($row['description']);
                                        ?>
                                        <div class="card bg-dark text-white mb-4">
                                            <div class="card-body">
                                                <h5><?php echo $row['title'] ?></h5>
                                                <hr>
                                                <p><?php echo $row['description'] ?></p>
                                                <hr>
                                                <div class="text-center">
                                                    <a class="text-white" style="text-decoration:none" href="<?php echo $url  ?>">View</a>
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
            validRange: {
                start: new Date().toISOString().split('T')[0]  // Prevent selection of past dates
            },
            navLinks: false,
            selectable: true,
            editable: true,
            selectMirror: true,
            dayMaxEvents: true,
            select: function(arg) {
                var title = prompt('Event Title:');
                if (title) {
                    var eventData = {
                        event_id: 0,
                        title: title,
                        start: arg.start,
                        end: arg.end,
                        allDay: arg.allDay
                    };

                    // Add event to calendar
                    calendar.addEvent(eventData);

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
            },
            eventDrop: function(arg) {
                if (confirm('Are you sure you want to move this event?')) {
                    // Update event in calendar
                    var eventData = {
                        updtId: arg.event.id,
                        title: arg.event.title,
                        start: arg.event.start,
                        end: arg.event.end,
                        allDay: arg.event.allDay
                    };

                    // Update event in database
                    updateEventInDatabase(eventData);
                    location.reload();
                } else {
                    // Revert event to its original position
                    location.reload();
                    calendar.refetchEvents();
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
                data: JSON.stringify({ action: 'saveEvent', eventData: saveData }),
                success: function(response) {
                    if (response == 'Existing Event'){
                        alert('There is an Existing Event!');
                        location.reload()
                    }else{
                        var getData = JSON.parse(response);
                        var e_id = getData.id;
                        var e_event_id = 0;
                        var e_title = getData.title; 
                        var e_start = getData.start; 
                        var e_end = getData.end; 
                        var e_allday = getData.allday; 

                        var url = 'event_plan.php?id=' + encodeURIComponent(e_id) +
                        '&event_id=' + encodeURIComponent(e_event_id) +
                        '&allday=' + encodeURIComponent(e_allday) +
                        '&title=' + encodeURIComponent(e_title) +
                        '&start=' + encodeURIComponent(e_start) +
                        '&end=' + encodeURIComponent(e_end);

                        window.location.href = url;
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
        
        function updateEventInDatabase(updateData) {
            // Send updated event data to server
            $.ajax({
                url: './include/process.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({ action: 'update', eventData: updateData }),
                success: function(response) {
                    console.log(response);
                    //console.log('Event updated in database:', updateData);
                },
                error: function(xhr, status, error) {
                    console.error('Error updating event in database:', error);
                }
            });
        }
    });

    </script>

</body>

</html>