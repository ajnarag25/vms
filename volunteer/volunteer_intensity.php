<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Volunteer Intensity - Volunteer Management Strageties</title>
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

                        <a class="nav-link" href="my_account.php">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-id-card"></i></div>
                            My Account
                        </a>

                        <a class="nav-link active" href="volunteer_intensity.php">
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
                            <h4 class="mt-4"><b>Volunteer Intensity</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="currentDate"></span> </h4>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="card p-3">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Assigned</th>
                                            <th scope="col">To-Do</th>
                                            <th scope="col">Revisions</th>
                                            <th scope="col">Completed</th>
                                            <th scope="col">Intensity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                         $sql = "SELECT * FROM accounts WHERE type ='Volunteer'";
                                         $result = $conn->query($sql);                              
                                         while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <th><a href="#" style="text-decoration:none; color:black;"><?php echo $row['username'] ?></a></th>
                                            <td><a href="#" style="text-decoration:none; color:black;">Today</a></td>
                                            <td><a href="#" style="text-decoration:none; color:black;">Sample To-Do</a></td>
                                            <td><a href="#" style="text-decoration:none; color:black;">Sample Revisions</a></td>
                                            <td><a href="#" style="text-decoration:none; color:black;">Pending</a></td>
                                            <td><div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar bg-success" style="width: 25%">25%</div>
                                                </div></td>
                                        </tr>
                                        <?php
                                         }
                                        ?>
                                    </tbody>
                                </table>
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