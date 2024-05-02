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
                            <h4 class="mt-4"> <span id="currentDate"></span> </h4>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div id="PersonalModal" class="modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Personal Task</h5>
                                        <button type="button" class="close" id="closeModal2" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" id="taskTitle" class="form-control" placeholder="Task Title">
                                        <br>
                                        <textarea class="tinymce form-control" id="taskDescription" name="desc"
                                            rows="10" cols="30" placeholder="Description"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" id="closeModal1"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="saveTask">Save Task</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card mb-4 ">
                                <div class="bg-dark text-white card-header text-center">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    Calendar
                                </div>
                                <div class="card-body p-4">
                                    <?php
                                    // Fetch events from database
                                    $volunteer_id = $_SESSION['id'];
                                    $username = $_SESSION['username'];
                                    $sql = "SELECT * FROM personal_agenda WHERE `volunteer_id`='$volunteer_id' AND `username`='$username'";
                                    $result = $conn->query($sql);

                                    $events = array();

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $event = array(
                                                'id' => $row['id'],
                                                'title' => $row['title'],
                                                'start' => $row['startdate'],
                                                'end' => $row['enddate'],
                                                'allDay' => $row['allday'],
                                                'backgroundColor' => '#DF0000',
                                                'borderColor' => '#5D0004',
                                                'textColor' => 'FFFFFF'
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
                                <div class="bg-success text-white card-header">
                                    <span style="vertical-align: +0.3em; margin-right: 5px; margin-left: 3px;">
                                        <!-- query for displaying the number beside the personal task -->
                                        <div
                                            style="display: inline-block; justify-content: center; align-items: flex-start; width: 25px; height: 25px; border-radius: 50%; background-color: gray; padding: 0px; text-align: center;">
                                            <?php
                                            $query = "SELECT * FROM personal_agenda WHERE volunteer_id ='$volunteer_id' AND username='$username'";
                                            $result = mysqli_query($conn, $query);
                                            if ($result) {
                                                $num_rows = mysqli_num_rows($result);
                                                echo $num_rows;
                                            } else {
                                                echo "Error executing query: " . mysqli_error($conn);
                                            }
                                            ?>
                                        </div>
                                    </span>
                                    <i class="fa-solid fa-address-book"></i>
                                    Personal Task
                                </div>
                                <!-- search bar under personal task -->
                                <input class="form-control mr-sm-2" type="search" placeholder="Search Personal Task"
                                    aria-label="Search">

                                <div class="p-3 overflow-auto" style="max-height: 650px;">
                                    <!-- query for selecting and displaying the personal agenda from volunteer_id -->
                                    <?php
                                    $query = "SELECT * FROM personal_agenda WHERE volunteer_id ='$volunteer_id' AND username='$username'";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>


                                    <div class="card bg-danger text-white mb-4">
                                        <button class="btn btn-danger"
                                            style="border: none; background-color: transparent; padding: 0;"
                                            data-toggle="modal" data-target="#exampleModal<?php echo $row['id'] ?>">
                                            <div class=" card-body">
                                                <!-- query to convert the month from fullcalendar into normal month -->
                                                <?php
                                                    $startdate = strtotime($row['startdate']);
                                                    $enddate = strtotime($row['enddate']);
                                                    $enddate -= 86400;
                                                    $convertstart = date("l, F j, Y", $startdate);
                                                    $convertend = date("l, F j, Y", $enddate);
                                                    ?>
                                                <!-- body of the personal task description -->
                                                <h5>Reason: <?php echo $row['title']; ?></h5>
                                                <hr>
                                                <p>Details: <?php echo $row['description']; ?></p>
                                                <p id="personal_start">From: <?php echo $convertstart; ?></p>
                                                <p id="personal_end">To: <?php echo $convertend; ?></p>
                                            </div>
                                        </button>
                                    </div>
                                    <!-- Modal for displaying details when a personal task is clicked -->
                                    <div class="modal fade" id="exampleModal<?php echo $row['id'] ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Event Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <h5>Reason: <?php echo $row['title']; ?></h5>
                                                    <p>Details: <?php echo $row['description']; ?></p>
                                                    <p>From: <?php echo $convertstart; ?></p>
                                                    <p>To: <?php echo $convertend; ?></p>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
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
                $('#PersonalModal').modal('show');

                $('#saveTask').click(function() {
                    var title = $('#taskTitle').val();
                    var description = $('#taskDescription').val();
                    if (title) {
                        var eventData = {
                            title: title,
                            start: arg.start,
                            end: arg.end,
                            allDay: arg.allDay,
                            backgroundColor: '#DF0000',
                            borderColor: '#5D0004',
                            textColor: 'FFFFFF',
                            description: description
                        };

                        // Add event to calendar
                        calendar.addEvent(eventData);

                        // Save event to database
                        saveEventToDatabase(eventData);
                    }
                    $('#PersonalModal').modal('hide');
                    calendar.unselect();
                    location.reload();
                });
                $('#closeModal1').click(function() {
                    $('#PersonalModal').modal('hide');
                });
                $('#closeModal2').click(function() {
                    $('#PersonalModal').modal('hide');
                });
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
                url: './include/personalprocess.php',
                name: 'calendar',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    action: 'save',
                    eventData: saveData
                }),
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
            var deleteData = {
                delId: event.id
            };
            $.ajax({
                url: './include/personalprocess.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    action: 'delete',
                    eventData: deleteData
                }),
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
                url: './include/personalprocess.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    action: 'update',
                    eventData: updateData
                }),
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>