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

                        <a class="nav-link" href="personal_page.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                            Personal Page
                        </a>

                        <a class="nav-link" href="team_dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                            Team Dashboard
                        </a>

                        <a class="nav-link" href="ticket_panel.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-bookmark"></i></div>
                            Ticket Panel
                        </a>

                        <a class="nav-link active" href="my_account.php">
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
                            <h4 class="mt-4"><b>My Account</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="currentDate"></span> </h4>
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
                                                <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%
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