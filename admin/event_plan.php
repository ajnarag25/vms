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

                        <a class="nav-link" href="set_event.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-days"></i></div>
                            Set Event
                        </a>

                        <a class="nav-link" href="team_work_flow.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                            Team Work Flow
                        </a>

                        <a class="nav-link active" href="event_plan.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-week"></i></div>
                            Event Plan
                        </a>

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

                        <a class="nav-link" href="agenda_view.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-plus"></i></div>
                            Agenda View
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
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#board" type="button"
                                role="tab" aria-controls="board" aria-selected="false">Board</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#gantt" type="button"
                                role="tab" aria-controls="gantt" aria-selected="false">Gantt Chart</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#time" type="button"
                                role="tab" aria-controls="time" aria-selected="false">Time Log</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- Overview -->
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                            aria-labelledby="overview-tab">

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <h5>Recommendation -> <span class="text-success">Sample</span> </h5>
                                    <div class="card mb-4 ">

                                        <div class="card-body p-4">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5><b>Event Title:</b> Sample Title</h5>
                                                    <h5><b>Event Description:</b> Sample Description</h5>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <div class="progress mt-2">
                                                        <div class="progress-bar bg-success w-25" role="progressbar"
                                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%
                                                        </div>
                                                    </div>
                                                    <label for="">Completed 25%</label>
                                                </div>
                                            </div>
                                            <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                            <h5><b>Answer:</b></h5>
                                            <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card mb-4 ">

                                        <div class="card-body p-4">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5><b>Phase:</b> Sample Phase</h5>
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
                        <!-- Board -->
                        <div class="tab-pane fade" id="board" role="tabpanel" aria-labelledby="board-tab">
                            <div class="row mt-3">
                                <div class="col-md-8">
                                    <div class="text-center">
                                        <h5><b>Plan Title Sample</b></h5>
                                        <div class="text-center mt-3">
                                            <label for="">Completion Percent:</label>
                                            <div class="progress mt-2">
                                                <div class="progress-bar bg-success w-25" role="progressbar"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="text-center">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <div class="card p-3">
                                                        <div class="card bg-success text-white mb-4">
                                                            <div class="card-body">
                                                                <h5>Task Title 1</h5>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="card bg-warning text-white mb-4">
                                                                    <div class="card-body">
                                                                        <h5>Task Ticket 1</h5>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="card bg-warning text-white mb-4">
                                                                    <div class="card-body">
                                                                        <h5>Task Ticket 1</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="card p-3">
                                                        <div class="card bg-success text-white mb-4">
                                                            <div class="card-body">
                                                                <h5>Task Title 2</h5>
                                                            </div>
                                                        </div>

                                                        <div class="card bg-warning text-white mb-4">
                                                            <div class="card-body">
                                                                <h5>Task Ticket 2</h5>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="card p-3">
                                                        <div class="card bg-success text-white mb-4">
                                                            <div class="card-body">
                                                                <h5>Task Title 3</h5>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="card bg-warning text-white mb-4">
                                                                    <div class="card-body">
                                                                        <h5>Task Ticket 3</h5>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="card bg-warning text-white mb-4">
                                                                    <div class="card-body">
                                                                        <h5>Task Ticket 3</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="card bg-warning text-white mb-4">
                                                                    <div class="card-body">
                                                                        <h5>Task Ticket 3</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="card p-3">
                                                        <div class="card bg-success text-white mb-4">
                                                            <div class="card-body">
                                                                <h5>Task Title 4</h5>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="card bg-warning text-white mb-4">
                                                                    <div class="card-body">
                                                                        <h5>Task Ticket 4</h5>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="card bg-warning text-white mb-4">
                                                                    <div class="card-body">
                                                                        <h5>Task Ticket 4</h5>
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
                        <!-- Gantt Chart -->
                        <div class="tab-pane fade" id="gantt" role="tabpanel" aria-labelledby="gantt-tab">
                            Gantt Chart
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

</body>

</html>