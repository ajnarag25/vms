<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('./include/header.php') ?>
    <title>Ticket Panel - Volunteer Management Strageties</title>
    <script src="https://cdn.jsdelivr.net/npm/progressbar.js@1.1.0/dist/progressbar.min.js"></script>
    <!-- chat style -->
    <style>
    .message.sent {
        text-align: right;
    }
    </style>
</head>


<body class="sb-nav-fixed">

    <?php include ('./include/nav.php') ?>

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

                        <a class="nav-link" href="team_dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                            Team Dashboard
                        </a>

                        <a class="nav-link active" href="ticket_panel.php">
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
                            <h4 class="mt-4"><b>Ticket Panel</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="currentDate"></span> </h4>
                        </div>
                    </div>
                    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#calendar_box"
                                type="button" role="tab" aria-controls="calendar" aria-selected="true">Calendar</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#board" type="button"
                                role="tab" aria-controls="board" aria-selected="false">Board</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#time" type="button"
                                role="tab" aria-controls="time" aria-selected="false">Time Log</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- Calendar -->
                        <div class="tab-pane fade show active" id="calendar_box" role="tabpanel"
                            aria-labelledby="calendar-tab">

                            <div class="row mt-3">
                                <div class="col-md-9">
                                    <h5>Recommendation -> <span class="text-success">Sample</span> </h5>
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
                                                while ($row = $result->fetch_assoc()) {
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
                                            Plan List
                                        </div>
                                        <input class="form-control mr-sm-2" type="search" placeholder="Search Plan"
                                            aria-label="Search">

                                        <div class="p-3">
                                            <div class="card bg-success text-white mb-4">
                                                <div class="card-body">

                                                    <h5>Plan Sample 1</h5>
                                                    <hr>
                                                    <p>This is only a sample plan. Details goes here</p>
                                                </div>

                                            </div>

                                            <div class="card bg-dark text-white mb-4">
                                                <div class="card-body">

                                                    <h5>Plan Sample 2</h5>
                                                    <hr>
                                                    <p>This is only a sample plan. Details goes here</p>
                                                </div>

                                            </div>

                                            <div class="card bg-warning text-white mb-4">
                                                <div class="card-body">

                                                    <h5>Plan Sample 3</h5>
                                                    <hr>
                                                    <p>This is only a sample plan. Details goes here</p>
                                                </div>

                                            </div>

                                            <div class="card bg-danger text-white mb-4">
                                                <div class="card-body">

                                                    <h5>Plan Sample 4</h5>
                                                    <hr>
                                                    <p>This is only a sample plan. Details goes here</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Board -->
                        <div class="tab-pane fade" id="board" role="tabpanel" aria-labelledby="board-tab">
                            <br>
                            <div class="container">
                                <div class="table-responsive">
                                    <table class="table table-bordered p-4">
                                        <thead>
                                            <tr>
                                                <th scope="col">Event Title</th>
                                                <th scope="col">Event Tickets</th>
                                                <th scope="col">Event Deadline</th>
                                                <th scope="col">Event Date</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td class="p-3" style="cursor: pointer;" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseExample1" aria-expanded="false"
                                                    aria-controls="collapseExample1">
                                                    Click here
                                                    <div class="collapse" id="collapseExample1" style="padding: 10px;">
                                                        <div class="card card-body">
                                                            <a href="#" style="text-decoration:none; color:black;" data-bs-toggle="modal" data-bs-target="#drpmodal">Dropdown content for row 1</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Cell content</td> <!-- Additional column -->
                                                <td>Cell content</td> <!-- Additional column -->
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="drpmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                       
                        <!-- Time Log -->
                        <div class="tab-pane fade" id="time" role="tabpanel" aria-labelledby="time-tab">
                            <div class="row mt-3">
                                <div class="col-md-8">
                                    <div class="card mb-4 p-3">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Volunteer</th>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Ticket Name</th>
                                                    <th scope="col">Information Report</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                        $query = "SELECT * FROM timelogs";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                                <tr>
                                                    <th><?php echo $row['volunteer'] ?></th>
                                                    <td><?php echo $row['time'] ?></td>
                                                    <td><?php echo $row['ticket_name'] ?></td>
                                                    <td><?php echo $row['information_report'] ?></td>
                                                </tr>
                                                <?php
                                        }
                                                 ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <div class="bg-success text-white card-header text-center">
                                            <i class="fa-solid fa-address-book"></i>
                                            Plan List
                                        </div>
                                        <input class="form-control mr-sm-2" type="search" placeholder="Search Plan"
                                            aria-label="Search">

                                        <div class="p-3">
                                            <div class="card bg-success text-white mb-4">
                                                <div class="card-body">

                                                    <h5>Plan Sample 1</h5>
                                                    <hr>
                                                    <p>This is only a sample plan. Details goes here</p>
                                                </div>

                                            </div>

                                            <div class="card bg-dark text-white mb-4">
                                                <div class="card-body">

                                                    <h5>Plan Sample 2</h5>
                                                    <hr>
                                                    <p>This is only a sample plan. Details goes here</p>
                                                </div>

                                            </div>

                                            <div class="card bg-warning text-white mb-4">
                                                <div class="card-body">

                                                    <h5>Plan Sample 3</h5>
                                                    <hr>
                                                    <p>This is only a sample plan. Details goes here</p>
                                                </div>

                                            </div>

                                            <div class="card bg-danger text-white mb-4">
                                                <div class="card-body">

                                                    <h5>Plan Sample 4</h5>
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

            <?php include ('./include/footer.php') ?>

        </div>
    </div>

    <?php include ('./include/scripts.php') ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
                            success: function (data) {
                                $("#currentDate").text(data);
                            }
                        });
                    }

            // Initial update
            updateDate();
                var intervalId = setInterval(updateDate, 1000);
        });
                    document.querySelectorAll('.collapsed-cell').forEach(cell => {
                    cell.addEventListener('click', () => {
                        // Toggle the "show" class for the cell to expand/collapse it
                        cell.nextElementSibling.classList.toggle('show');
                    });
                });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- codes for progress bar -->
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
                left: '45%',
                right: '20%',
                top: '34%',
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
</body>

</html>