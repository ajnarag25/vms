<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Team Dashboard - Volunteer Management Strageties</title>
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

                                    <div class="card bg-dark text-white mb-4">
                                        <div class="card-body">
                                            <h5>Your Tickets Sample 2</h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
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


                                <input class="form-control mr-sm-2" type="search" placeholder="Search Tickets" aria-label="Search">


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