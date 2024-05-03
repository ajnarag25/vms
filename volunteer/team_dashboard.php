<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Team Dashboard - Volunteer Management Strageties</title>
    <script src="https://cdn.jsdelivr.net/npm/progressbar.js@1.1.0/dist/progressbar.min.js"></script>
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

                        <a class="nav-link" href="personal_page.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                            Personal Page
                        </a>

                        <a class="nav-link active" href="team_dashboard.php">
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
                            <h4 class="mt-4"><b>Team Dashboard</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="currentDate"></span> </h4>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-2">
                            <div class="card mb-4">
                                <div class="text-success card-header text-center">
                                    Your Tickets
                                </div>
                                <div class="p-3">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">
                                            <h5>Your Tickets Sample 1</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">
                                            <button class="btn btn-outline-light" data-toggle="modal"
                                                data-target="#exampleModal">Sample ticket design</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">"Task Title"</h5>
                                            <div
                                                class="navbar navbar-expand-lg navbar-light bg-light justify-content-end">
                                                <!-- Navbar starts from right -->
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <!-- Align navbar items to right -->
                                                    <li class="nav-item">
                                                        <button class="nav-link active" data-toggle="tab"
                                                            data-target="#main" type="button" role="tab"
                                                            aria-controls="main" aria-selected="true">Main</button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link" data-toggle="tab"
                                                            data-target="#comment" type="button" role="tab"
                                                            aria-controls="comment"
                                                            aria-selected="false">Comment</button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="tab-pane fade show active" id="main" role="tabpanel"
                                            aria-labelledby="main-tab">
                                            <div class="modal-body" style="max-height:450px; overflow-y: auto;">
                                                <div class="row mt-12">
                                                    <!-- left side of the modal main display -->
                                                    <div class="col-md-8" style="margin-right: 50px;">
                                                        <h5>Template: </h5>
                                                        <p>"Template Title"</p>
                                                        <h5>Started by: </h5>
                                                        <p>"Admin Username"</p>
                                                        <h5>Description: </h5>
                                                        <p>" "</p>
                                                        <hr>
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <h5>Priority Level:</h5>
                                                            </div>
                                                            <div class="col">
                                                                <div class="alert alert-secondary d-inline-flex align-items-center py-1"
                                                                    role="alert">
                                                                    <strong>Low</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <h5>Status:</h5>
                                                            </div>
                                                            <div class="col">
                                                                <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-1"
                                                                    role="alert">
                                                                    <strong>Your-ticket</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="bg-dark text-white card-header text-center">
                                                                <i class="fa-solid fa-calendar-days"></i>
                                                                Calendar
                                                            </div>
                                                            <div class="card-body">
                                                                <div id="calendar"
                                                                    class="calendar fc fc-media-screen fc-direction-ltr fc-theme-bootstrap5 bsb-calendar-theme">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <hr>
                                                        <div class="ml-3">
                                                            <p class="font-italic mb-0">• "instructions from admin side"
                                                            </p>
                                                            <p class="font-italic mb-0">• "instructions from admin side"
                                                            </p>
                                                            <p class="font-italic mb-0">• "instructions from admin side"
                                                            </p>
                                                            <p>• ...</p>
                                                        </div>
                                                    </div>


                                                    <!-- rigth side of the modal main display -->
                                                    <div class="col-md-3">
                                                        <p>Plan Progress:</p>
                                                        <div class="col-md-10">
                                                            <div id="progress-bar-container"
                                                                style="position: relative;">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <p>Event Plan Deadline: May 24, 2024</p>
                                                        <p>Ticket Deadline: May 23, 2024</p>
                                                        <button type="button" class="btn btn-secondary"
                                                            style="width: 100%;">Add Target (Time)</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            style="width: 100%; margin-top: 5px;">View Plan</button>
                                                        <div class="row">
                                                            <div class="col-md-6" style="width: 50%;">
                                                                <button type="button"
                                                                    class="btn btn-secondary btn-block"
                                                                    style="width: 100%; margin-top: 5px;">Ask</button>
                                                            </div>
                                                            <div class="col-md-6" style="width: 50%;">
                                                                <button type="button"
                                                                    class="btn btn-secondary btn-block"
                                                                    style="width: 100%; margin-top: 5px;">Upload</button>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-secondary"
                                                            style="width: 100%; margin-top: 5px;">Submit</button>
                                                    </div>
                                                </div>
                                                <hr style="box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.6);">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show active" id="comment" role="tabpanel"
                                            aria-labelledby="comment-tab">
                                            <div class="modal-body" style="max-height:450px; overflow-y: auto;">
                                                <div class="row mt-12">
                                                    <!-- left side of the modal comment display -->
                                                    <div class="col-md-8" style="margin-right: 50px;">
                                                        <h5>Comment Section:</h5>
                                                        <p>"Comment Content"</p>
                                                        <!-- Add your comment-related content here -->
                                                    </div>
                                                    <!-- right side of the modal comment display -->
                                                    <div class="col-md-3">
                                                        <!-- Add any additional content related to comments here -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-body">
                                            <div>
                                                <h5>Volunteer/s <button
                                                        style="border: none; background-color: transparent; padding: 0;">
                                                        <i class="bi bi-plus-square-fill">
                                                        </i></button>
                                                </h5>
                                                <div class="col">
                                                    <button type="button"
                                                        class="btn btn-dark rounded-pill d-inline-flex align-items-center py-1">
                                                        <strong>Volunteer Name</strong>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-dark rounded-pill d-inline-flex align-items-center py-1">
                                                        <strong>Volunteer Name</strong>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-dark rounded-pill d-inline-flex align-items-center py-1">
                                                        <strong>Volunteer Name</strong>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-dark rounded-pill d-inline-flex align-items-center py-1">
                                                        <strong>Volunteer Name</strong>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-dark rounded-pill d-inline-flex align-items-center py-1">
                                                        <strong>Volunteer Name</strong>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-dark rounded-pill d-inline-flex align-items-center py-1">
                                                        <strong>Volunteer Name</strong>
                                                    </button>
                                                    <button
                                                        style="border: none; background-color: transparent; padding: 0; box-shadow: -2px 0 4px rgba(0, 0, 0, 0.2);">
                                                        <i class="bi bi-list h2"></i>
                                                    </button>
                                                </div>

                                            </div>
                                        </div>

                                        <div class=" modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of modal -->
                        </div>

                        <div class="col-md-2">
                            <div class="card mb-4">
                                <div class="text-primary card-header text-center">
                                    To-Do
                                </div>
                                <div class="p-3">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">
                                            <h5>To-Do Sample 1</h5>
                                        </div>

                                    </div>

                                    <div class="card bg-dark text-white mb-4">
                                        <div class="card-body">
                                            <h5>To-Do Sample 2</h5>
                                        </div>
                                    </div>

                                    <div class="card bg-light mb-4">
                                        <div class="card-body">
                                            <h5>To-Do Sample 3</h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="card mb-4">
                                <div class="text-warning card-header text-center">
                                    In-Review
                                </div>
                                <div class="p-3">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">
                                            <h5>In-Review Sample 1</h5>
                                        </div>

                                    </div>

                                    <div class="card bg-dark text-white mb-4">
                                        <div class="card-body">
                                            <h5>In-Review Sample 2</h5>
                                        </div>
                                    </div>

                                    <div class="card bg-light mb-4">
                                        <div class="card-body">
                                            <h5>In-Review Sample 3</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="card mb-4">
                                <div class="text-danger card-header text-center">
                                    Revisions
                                </div>
                                <div class="p-3">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">
                                            <h5>Revisions Sample 1</h5>
                                        </div>

                                    </div>

                                    <div class="card bg-dark text-white mb-4">
                                        <div class="card-body">
                                            <h5>Revisions Sample 2</h5>
                                        </div>
                                    </div>

                                    <div class="card bg-light mb-4">
                                        <div class="card-body">
                                            <h5>Revisions Sample 3</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="bg-success text-white card-header text-center">
                                    <select class="form-select" name="" id="">
                                        <option value="" selected>All Tickets</option>
                                        <option value="">To-Do</option>
                                        <option value="">In-Review</option>
                                        <option value="">Revisions</option>
                                    </select>

                                </div>


                                <input class="form-control mr-sm-2" type="search" placeholder="Search Tickets"
                                    aria-label="Search">


                                <div class="p-3">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">

                                            <h5>All Tickets Sample 1</h5>
                                            <hr>
                                            <p>This is only a sample ticket. Details goes here</p>
                                        </div>

                                    </div>

                                    <div class="card bg-dark text-white mb-4">
                                        <div class="card-body">

                                            <h5>All Tickets Sample 2</h5>
                                            <hr>
                                            <p>This is only a sample ticket. Details goes here</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">

                        <h5 class=""><b>Warning/Urgent</b></h5>
                        <div class="row mt-3">
                            <div class="col">

                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">

                                        <h5>Warning/Urgent 1</h5>
                                        <hr>
                                        <p>This is only a sample Warning/Urgent. Details goes here</p>
                                    </div>

                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">

                                        <h5>Warning/Urgent 2</h5>
                                        <hr>
                                        <p>This is only a sample Warning/Urgent. Details goes here</p>
                                    </div>

                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">

                                        <h5>Warning/Urgent 3</h5>
                                        <hr>
                                        <p>This is only a sample Warning/Urgent. Details goes here</p>
                                    </div>

                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">

                                        <h5>Warning/Urgent 4</h5>
                                        <hr>
                                        <p>This is only a sample Warning/Urgent. Details goes here</p>
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
    <!-- script for calendar -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next, today',
                center: 'title',
                right: 'dayGridMonth'
            },
            initialView: 'dayGridMonth',
            events: [{
                    id: '1',
                    title: 'Event 1',
                    start: '2024-04-01',
                    end: '2024-04-03',
                    allDay: false,
                },
                {
                    id: '2',
                    title: 'Event 2',
                    start: '2024-04-05T10:00:00',
                    end: '2024-04-05T12:00:00',
                    allDay: false,
                },
            ],
            navLinks: true,
            selectable: true,
            editable: true,
            selectMirror: true,
            dayMaxEvents: true,
        });
        calendar.render();
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    var progressBar = new ProgressBar.Circle('#progress-bar-container', {
        strokeWidth: 6,
        easing: 'easeInOut',
        duration: 1400,
        color: '#4caf50',
        trailColor: '#f3f3f3',
        trailWidth: 6,
        svgStyle: {
            // Center align the progress percentage text
            transform: 'translateX(-40%) translateY(00%)',
            position: 'relative',
            left: '50%',
            top: '50%'
        },
        text: {
            value: '70%', // Initial value of the progress text
            className: 'progressbar-text', // CSS class for the progress text
            autoStyleContainer: false, // Disable automatic styling of the text container
            style: {
                position: 'absolute',
                left: '50%',
                top: '45%',
                padding: 0,
                margin: 0,
                fontSize: '1.5rem',
                fontWeight: 'bold',
                color: '#000'
            }
        }
    });

    // Set the initial progress value
    progressBar.animate(0.5); // Example: 50% progress
    </script>
</body>

</html>