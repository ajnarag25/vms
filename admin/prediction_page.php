<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Task Backlog - Volunteer Management Strageties</title>
    <style>
    .event-1 {
        position: relative;
        width: 0;
        height: 0;
        border-left: 15px solid transparent;
        /* Adjust the thickness of the triangle */
        border-right: 15px solid transparent;
        /* Adjust the thickness of the triangle */
        border-bottom: 30px solid #ffcc00;
        /* Yellow background color */
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        /* Add a box shadow with a black color */
        transition: transform 0.3s ease;
        /* Add transition for smoother hover effect */
    }

    .event-1:hover {
        transform: scale(1.1);
        /* Scale up the triangle on hover */
    }

    .event-1:hover::after {
        content: "Predicted Date";
        /* Content to be displayed on hover */
        position: absolute;
        top: -25px;
        /* Adjust the vertical position */
        left: 50%;
        transform: translateX(-50%);
        background-color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        font-size: 12px;
        color: #333;
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
                            <h4 class="mt-4"><b>Prediction page</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="LiveTime"></span> </h4>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="card p-3">
                            <div class="card-body">
                                <!-- Go to Prediction design -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <a class="nav-link" href="display_suggestion.php">
                                            <button type="button" class="btn btn-light mt-1 text-start w-100">
                                                <<< Go back to display suggestion </button>
                                        </a>
                                    </div>
                                </div>
                                <!-- start of prediction display -->
                                <hr>
                                <small class="text-muted mt-3">
                                    Start of prediction display
                                </small>
                                <hr>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="card mb-4 ">
                                            <div class="bg-dark text-white card-header text-center">
                                                <i class="fa-solid fa-calendar-days"></i>
                                                Calendar
                                            </div>
                                            <div class="card-body p-4">
                                                <div id="calendar"
                                                    class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap5 bsb-calendar-theme">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="container">
                                            <div class="card">
                                                <div class="card-header">
                                                    Event Title:
                                                </div>
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Sample Event title</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    Days before event: 3
                                                </div>
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Predicted Completion Date:</span>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="text" aria-label="First name" value="May 4, 2025"
                                                            class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    Tickets: 10
                                                </div>
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Completed:</span>
                                                        <input type="text" aria-label="First name" value="5"
                                                            class="form-control" readonly>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Remaining:</span>
                                                        <input type="text" aria-label="First name" value="5"
                                                            class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    Assigned Volunteers: 4
                                                </div>
                                                <div class="card-body">
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
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth'
            },
            initialView: 'dayGridMonth',
            events: [{
                    title: '',
                    start: '2024-05-24',
                    end: '2024-05-25',
                    className: 'event-1',
                    editable: false
                },
                {
                    title: 'Event 2',
                    start: '2024-05-25',
                    end: '2024-05-26'
                },
                // Add more events as needed
            ],
            navLinks: true,
            selectable: true,
            editable: true,
            selectMirror: true,
            dayMaxEvents: true,
            select: function(arg) {
                // Clear modal inputs
                $('#taskTitle').val('');
                $('#taskDescription').val('');

                // Show modal
                $('#PersonalModal').modal('show');

                // Store the selected date range for use in the save event listener
                $('#saveTask').data('selectedDateRange', arg);
            }
        });

        $('#saveTask').click(function() {
            var selectedDateRange = $(this).data('selectedDateRange');
            var title = $('#taskTitle').val();
            var description = $('#taskDescription').val();
            if (title) {
                var eventData = {
                    title: title,
                    start: selectedDateRange.start,
                    end: selectedDateRange.end,
                    allDay: selectedDateRange.allDay,
                    backgroundColor: '#DF0000',
                    borderColor: '#5D0004',
                    textColor: '#FFFFFF',
                    description: description
                };

                // Add event to calendar
                calendar.addEvent(eventData);

                // Save event to database (implement this function to save the event)
                saveEventToDatabase(eventData);

                // Hide modal
                $('#PersonalModal').modal('hide');
            }
        });

        calendar.render();
    });

    // Example function for saving event to database
    function saveEventToDatabase(eventData) {
        $.ajax({
            url: 'save_event.php',
            method: 'POST',
            data: eventData,
            success: function(response) {
                console.log('Event saved successfully.');
            },
            error: function() {
                console.log('There was an error saving the event.');
            }
        });
    }
    </script>

</body>

</html>