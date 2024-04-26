<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Dashboard - Volunteer Management Strageties</title>
</head>


<body class="sb-nav-fixed">

    <?php include('./include/nav.php') ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="mt-3"></div>
                        <a class="nav-link active" href="index.php">
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

                        <a class="nav-link" href="task_backlog.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-list-check"></i></div>
                            Task Backlog
                        </a>

                        <a class="nav-link" href="templates.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard"></i></div>
                            Templates
                        </a>

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
                            <h4 class="mt-4"><b>Dashboard</b></h4>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Welcome Admin</li>
                            </ol>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="LiveTime"></span> </h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="bg-success text-white card-header text-center">
                                    <i class="fa-solid fa-clipboard"></i>
                                    Announcement
                                </div>
                                <br>
                                <ul>
                                    <li>Announcement 7pm at Gym Center, Bacoor, Cavite</li>
                                    <li>Volunteer at bacoor coliseum</li>
                                </ul>
                                <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="bg-success text-white card-header text-center">
                                    <i class="fa-solid fa-comments"></i>
                                    Suggestion
                                </div>
                                <br>
                                <ul>
                                    <li>Sample suggestion only.</li>
                                </ul>
                                <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="bg-warning text-white card-header text-center">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    Urgent
                                </div>
                                <br>
                                <ul>
                                    <li>Need it in gym at 8am sharp.</li>
                                    <li>Please provide more information.</li>
                                    <li>Sample urgent message.</li>
                                </ul>
                                <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="bg-dark text-white card-header text-center">
                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                    History
                                </div>
                                <br>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Ticket</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>03/09/2024</th>
                                            <td>Ticket 1</td>
                                            <td class="text-success">Success</td>
                                        </tr>
                                        <tr>
                                            <th>03/10/2024</th>
                                            <td>Ticket 2</td>
                                            <td class="text-warning">Pending</td>
                                        </tr>
                                        <tr>
                                            <th>03/05/2024</th>
                                            <td>Ticket 3</td>
                                            <td class="text-danger">Fail</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="bg-dark text-white card-header text-center">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    Calendar
                                </div>
                                <div class="card-body p-4">
                                    <div id="bsb-calendar-1" class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap5 bsb-calendar-theme">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="bg-danger text-white card-header text-center">
                                    <i class="fa-solid fa-bookmark"></i>
                                    Tickets
                                </div>
                                <div class="p-3">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">

                                            <h5>Ticket Sample 1</h5>
                                            <hr>
                                            <p>This is only a sample ticket. Details goes here</p>
                                        </div>

                                    </div>

                                    <div class="card bg-warning text-white mb-4">
                                        <div class="card-body">

                                            <h5>Ticket Sample 2</h5>
                                            <hr>
                                            <p>This is only a sample ticket. Details goes here</p>
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