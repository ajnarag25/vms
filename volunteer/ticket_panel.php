<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Ticket Panel - Volunteer Management Strageties</title>
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
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#calendar" type="button" role="tab" aria-controls="calendar" aria-selected="true">Calendar</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#board" type="button" role="tab" aria-controls="board" aria-selected="false">Board</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#gantt" type="button" role="tab" aria-controls="gantt" aria-selected="false">Gantt Chart</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#time" type="button" role="tab" aria-controls="time" aria-selected="false">Time Log</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- Calendar -->
                        <div class="tab-pane fade show active" id="calendar" role="tabpanel" aria-labelledby="calendar-tab">

                            <div class="row mt-3">
                                <div class="col-md-8">
                                    <h5>Recommendation -> <span class="text-success">Sample</span> </h5>
                                    <div class="card mb-4 ">
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
                                        <div class="bg-success text-white card-header text-center">
                                            <i class="fa-solid fa-address-book"></i>
                                            Plan List
                                        </div>
                                        <input class="form-control mr-sm-2" type="search" placeholder="Search Plan" aria-label="Search">

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
                            <div class="row mt-3">
                                <div class="col-md-8">
                                    <div class="text-center">
                                        <h5><b>Plan Title Sample</b></h5>
                                        <div class="text-center mt-3">
                                            <label for="">Completion Percent:</label>
                                            <div class="progress mt-2">
                                                <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
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
                                        <input class="form-control mr-sm-2" type="search" placeholder="Search Plan" aria-label="Search">

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
                                        <input class="form-control mr-sm-2" type="search" placeholder="Search Plan" aria-label="Search">

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
</body>

</html>