<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Volunteer Report - Volunteer Management Strageties</title>
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

                        <a class="nav-link" href="agenda_view.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-plus"></i></div>
                            Agenda View
                        </a>

                        <a class="nav-link active" href="volunteer_report.php">
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
                            <h4 class="mt-4"><b>Volunteer Report</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="LiveTime"></span> </h4>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-8">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Event</th>
                                        <th scope="col">Ticket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Name Sample</th>
                                        <td>Status Sample</td>
                                        <td>Event Sample</td>
                                        <td>Ticket Sample</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                        <div class="col-md-4">
                            <div class="card mb-4 ">

                                <div class="card-body p-4">
                                    <div class="text-center mb-4">
                                        <div class="progress mt-2">
                                            <div class="progress-bar bg-success w-50" role="progressbar"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <h6>Completed</h6>
                                                <h6>Assigned</h6>
                                                <h6>Revisions</h6>
                                            </div>
                                            <div class="col">
                                                <h6>Ave</h6>
                                                <h6>Online Skills</h6>
                                            </div>
                                        </div>
                                    </div>
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
            </main>

            <?php include('./include/footer.php') ?>

        </div>
    </div>

    <?php include('./include/scripts.php') ?>

</body>

</html>