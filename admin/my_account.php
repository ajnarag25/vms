<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>My Account - Volunteer Management Strageties</title>
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

                        <a class="nav-link active" href="my_account.php">
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
                            <h4 class="mt-4"><b>My Account</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="LiveTime"></span> </h4>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="card p-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <h4>Name: <b>Juan Delacruz</b></h4>
                                        <br>
                                        <h4>Email: <b>juandelacruz@gmail.com</b></h4>
                                        <br>
                                        <h4>Phone Number: <b>09123456789</b></h4>
                                        <br>
                                        <h4>Account Information: <b>This is only a sample account
                                                information.</b></h4>
                                        <br>
                                        <h4>Date Joined: <b>03/18/2024</b></h4>
                                        <br>
                                        <h4>Up Time: <b>1:08 PM</b></h4>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <h4>Intensity Points: <b>200</b> </h4>
                                            <div class="progress mt-2">
                                                <div class="progress-bar bg-success w-25" role="progressbar"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4><b>Skills:</b></h4>

                                        <ol>
                                            <li>Sample skills 1</li>
                                            <li>Sample skills 2</li>
                                            <li>Sample skills 3</li>
                                        </ol>
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