<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Personal Page - Volunteer Management Strageties</title>
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

                        <a class="nav-link active" href="personal_page.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                            Personal Page
                        </a>

                        <a class="nav-link" href="team_dashboard.php">
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
                            <h4 class="mt-4"><b>Personal Page</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="LiveTime"></span> </h4>
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
                                    Personal Task
                                </div>
                                <input class="form-control mr-sm-2" type="search" placeholder="Search Personal Task"
                                    aria-label="Search">

                                <div class="p-3">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">

                                            <h5>Personal Task Sample 1</h5>
                                            <hr>
                                            <p>This is only a sample personal task. Details goes here</p>
                                        </div>

                                    </div>

                                    <div class="card bg-dark text-white mb-4">
                                        <div class="card-body">

                                            <h5>Personal Task Sample 2</h5>
                                            <hr>
                                            <p>This is only a sample personal task. Details goes here</p>
                                        </div>

                                    </div>

                                    <div class="card bg-warning text-white mb-4">
                                        <div class="card-body">

                                            <h5>Personal Task Sample 3</h5>
                                            <hr>
                                            <p>This is only a sample personal task. Details goes here</p>
                                        </div>

                                    </div>

                                    <div class="card bg-danger text-white mb-4">
                                        <div class="card-body">

                                            <h5>Personal Task Sample 4</h5>
                                            <hr>
                                            <p>This is only a sample personal task. Details goes here</p>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-8">
                            <div class="card mb-4">
                                <table class="table">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">1</th>
                                            <th scope="col">2</th>
                                            <th scope="col">3</th>
                                            <th scope="col">4</th>
                                            <th scope="col">5</th>
                                            <th scope="col">6</th>
                                            <th scope="col">7</th>
                                            <th scope="col">8</th>
                                            <th scope="col">9</th>
                                            <th scope="col">10</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <th>Task Title Project</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Task Title</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Sample Title</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                    </tbody>
                                </table>
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
            select: function(arg) {
                var title = prompt('Event Title:');
                if (title) {
                    var eventData = {
                        title: title,
                        start: arg.start,
                        end: arg.end,
                        allDay: arg.allDay
                    };

                    // Add event to calendar
                    calendar.addEvent(eventData);

                    // Save event to database
                    saveEventToDatabase(eventData);
                    location.reload();
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
                if (confirm('Are you sure you want to update this event?')) {
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
                data: JSON.stringify({ action: 'save', eventData: saveData }),
                success: function(response) {
                    console.log(response);
                    //console.log('Event saved to database:', saveData);
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