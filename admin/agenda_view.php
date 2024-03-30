<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Agenda View - Volunteer Management Strageties</title>
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

                        <a class="nav-link" href="event_plan.php">
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

                        <a class="nav-link active" href="agenda_view.php">
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
                            <h4 class="mt-4"><b>Agenda View</b></h4>
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
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#phase" type="button"
                                role="tab" aria-controls="phase" aria-selected="false">Phase</button>
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
                            <div class="card mb-4 ">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <button class="btn btn-success">Event Start</button>
                                            <div class="row mt-4">
                                                <div class="col-sm-2">
                                                    <button class="btn btn-success">Add Part</button>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-success">Add Sponsors</button>
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
                        <!-- Agenda -->
                        <div class="tab-pane fade" id="agenda" role="tabpanel" aria-labelledby="agend-tab">
                            Agenda
                        </div>
                        <!-- Phase -->
                        <div class="tab-pane fade" id="phase" role="tabpanel" aria-labelledby="phase-tab">
                            Phase
                        </div>
                        <!-- Poll -->
                        <div class="tab-pane fade" id="poll" role="tabpanel" aria-labelledby="poll-tab">
                            Poll
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