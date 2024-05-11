<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Team Work Flow - Volunteer Management Strageties</title>
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

                        <a class="nav-link active" href="team_work_flow.php">
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
                            <h4 class="mt-4"><b>Team Work Flow</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="LiveTime"></span> </h4>
                        </div>
                    </div>
                    <h5>Recommendation -> <span class="text-success">Sample</span> </h5>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <div class="card mb-4">
                                <div class="text-success card-header text-center">
                                    Event Lists
                                </div>
                            </div>
                            <div class="row">
                                <?php 
                                    $query = "SELECT * FROM events WHERE event_id = 0";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    
                                    $url = 'event_plan.php?id=' . urlencode($row['id']) .
                                    '&event_id=' . urlencode($row['event_id']) .
                                    '&allday=' . urlencode($row['allday']) .
                                    '&title=' . urlencode($row['title']) .
                                    '&start=' . urlencode($row['startdate']) .
                                    '&end=' . urlencode($row['enddate']) .
                                    '&desc=' . urlencode($row['description']);
                                ?>
                                <div class="col-md-3">
                                    <div class="card text-center h-100">
        
                                        <div class="card-header bg-dark text-white">
                                            <div class="card-title text-center">
                                                <h6><strong><?php echo $row['title'] ?></strong></h6>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p style="font-size:12px">Date: <strong><?php echo date('Y-m-d', strtotime($row['startdate'])) ?></strong></p>
                                        </div>
                                        <div class="card-footer">
                                            <a class="text-success" href="<?php echo $url  ?>">View</a>
                                        </div>
                
                                    </div>
                                </div>
                                <?php 
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="bg-dark text-white card-header text-center">
                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                    Time Log
                                </div>

                                <div class="p-3">
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

                            <div class="card mb-4">
                                <div class="bg-dark text-white card-header text-center">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    Calendar
                                </div>
                                <div class="p-3">
                                    <div id="bsb-calendar-1"
                                        class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap5 bsb-calendar-theme">
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