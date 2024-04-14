<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Event Plan - Volunteer Management Strageties</title>
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
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#agenda" type="button"
                                role="tab" aria-controls="agenda" aria-selected="false">Agenda</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#poll" type="button"
                                role="tab" aria-controls="poll" aria-selected="false">Poll</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- Overview -->
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                            aria-labelledby="overview-tab">

                            <div class="row mt-3">
                                <div class="col-md-8">
                                    <h5>Recommendation -> <span class="text-success">Sample</span> </h5>
                                    <div class="card mb-4 ">

                                        <?php
                                            $id = isset($_GET['id']) ? $_GET['id'] : '';
                                            $title = isset($_GET['title']) ? $_GET['title'] : '';
                                            $start = isset($_GET['start']) ? $_GET['start'] : '';
                                            $end = isset($_GET['end']) ? $_GET['end'] : '';
                                            $allday = isset($_GET['allday']) ? $_GET['allday'] : '';
                                            $desc = isset($_GET['desc']) ? $_GET['desc'] : '';
                                        ?>

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
                                                <input class="form-control w-50" type="hidden" name="start" value="<?php echo $start; ?>">
                                                <input class="form-control w-50" type="hidden" name="end" value="<?php echo $end; ?>">
                                                <input class="form-control w-50" type="hidden" name="allday" value="<?php echo $allday; ?>">
                                                <button class="btn btn-success w-100" type="submit" name="save_event">Save</button>
                                            </form>
                                            <hr>
                                            <div class="mt-3">
                                                <h5><b>Agenda:</b></h5>
                                                <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                            </div>
                             
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card mb-4 ">
                                        <div class="card-body p-4">
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
                                                        <div class="progress-bar bg-success w-25" role="progressbar"
                                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%
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
                                        <div class="col-md-8">
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#eventStart">Event Start</button>

                                            <!-- Modal Event Start -->
                                            <div class="modal modal-lg fade" id="eventStart" tabindex="-1" aria-labelledby="eventStart"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h5 class=" modal-title text-white">Event Start</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div id="daycalendar"
                                                                class="p-4 fc fc-media-screen fc-direction-ltr fc-theme-bootstrap5 bsb-calendar-theme">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-sm-2">
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
                                                                    <form action="">
                                                                        <div class="mt-2">
                                                                            <label for="">Event Name:</label>
                                                                            <input class="form-control" type="text" name="title" value="<?php echo $title; ?>" readonly>
                                                                            <label for="" class="mt-3">Description:</label>
                                                                            <?php echo $desc; ?>
                                                                            <label for="">People / Volunteer:</label>
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
                                                                            <h4>7:00pm</h4>
                                                                            <label for="" class="mt-3">Duration:</label>
                                                                            <select class="form-select" name="" id="">
                                                                                <option value="">1 Hour</option>
                                                                                <option value="">2 Hours</option>
                                                                                <option value="">3 Hours</option>
                                                                                <option value="">4 Hours</option>
                                                                                <option value="">5 Hours</option>
                                                                            </select>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-warning text-white"
                                                                        data-bs-dismiss="modal">Add Part</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addSponsors">Add Sponsors</button>

                                                    <!-- Modal Add Sponsors -->
                                                    <div class="modal fade" id="addSponsors" tabindex="-1" aria-labelledby="addSponsors"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-success">
                                                                    <h5 class=" modal-title text-white">Event Start</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">Name</th>
                                                                                <th scope="col">Account Type</th>
                                                                                <th scope="col">Skills</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th>Juan Delacruz</th>
                                                                                <td>Sponsor 1</td>
                                                                                <td>Sample Skills</td>
                                                                            </tr>
                                                                        </tbody>
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
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">

                                            <h6>Event Duration: 21hrs</h6>
                                            <h6>Event End: 21hrs </h6>

                                            <hr>

                                            <h6>Agenda Overview:</h6>

                                            <h6>Sample Part Name</h6>
                                            <h6>Sample Start - End</h6>

                                        </div>
                                    </div>
                                    <br>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Part Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">People</th>
                                                <th scope="col">Volunteers</th>
                                                <th scope="col">Time Start</th>
                                                <th scope="col">Time End</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Part Sample</th>
                                                <td>Description Sample</td>
                                                <td>People Sample</td>
                                                <td>Volunteer Sample</td>
                                                <td>12:01 pm</td>
                                                <td>3:01 pm</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Poll -->
                        <div class="tab-pane fade" id="poll" role="tabpanel" aria-labelledby="poll-tab">
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
                                                <tr>
                                                    <th>Juan Delacruz</th>
                                                    <td>3:30 pm</td>
                                                    <td>Ticket Sample</td>
                                                    <td>Ongoing Ticket</td>
                                                </tr>
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

    });

    </script>

</body>

</html>