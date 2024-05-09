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
                            <h4 class="mt-4"><b>Dashboard</b></h4>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Welcome Volunteer</li>
                            </ol>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="currentDate"></span> </h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <a href="" style="text-decoration: none;" data-bs-toggle="modal"
                                    data-bs-target="#ann-modal">
                                    <div class="bg-success text-white card-header text-center">
                                        <i class="fa-solid fa-clipboard"></i>
                                        Announcement
                                    </div>
                                </a>
                                <!-- Announcement Whole Modal -->
                                <div class="modal fade" id="ann-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Announcements</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Title</th>
                                                            <th scope="col">Details</th>
                                                            <th scope="col">Time</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                $sql = "SELECT * FROM announcements ORDER BY id DESC";
                                $result = $conn->query($sql);                              
                                while ($row = $result->fetch_assoc()) {
                                ?>

                                                    <tbody>
                                                        <tr>
                                                            <th><a href="#" style="color:black; text-decoration:none;"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#ann-sm-modal<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a>
                                                            </th>
                                                            <td><a href="#" style="color:black; text-decoration:none;"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#ann-sm-modal<?php echo $row['id'] ?>"><?php echo $row['details'] ?></a>
                                                            </td>
                                                            <td><a href="#" style="color:black; text-decoration:none;"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#ann-sm-modal<?php echo $row['id'] ?>"><?php echo $row['time'] ?></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <?php
                                }
                                ?>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Details</th>
                                            <th scope="col">Time</th>
                                        </tr>
                                    </thead>
                                    <?php
                                $sql = "SELECT * FROM announcements ORDER BY id DESC LIMIT 4";
                                $result = $conn->query($sql);                              
                                while ($row = $result->fetch_assoc()) {
                                ?>

                                    <tbody>
                                        <tr>
                                            <th><a href="#" style="color:black; text-decoration:none;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#ann-sm-modal<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a>
                                            </th>
                                            <td><a href="#" style="color:black; text-decoration:none;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#ann-sm-modal<?php echo $row['id'] ?>"><?php echo $row['details'] ?></a>
                                            </td>
                                            <td><a href="#" style="color:black; text-decoration:none;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#ann-sm-modal<?php echo $row['id'] ?>"><?php echo $row['time'] ?></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
                                }
                                ?>
                                </table>
                                <!-- Small Modal -->
                                <?php
                                $sql = "SELECT * FROM announcements";
                                $result = $conn->query($sql);                              
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id'];
                                $sql1 = "SELECT * FROM announcements WHERE id ='$id'";
                                $result1 = $conn->query($sql1);                              
                                while ($row1 = $result1->fetch_assoc()) {
                                ?>
                                <div class="modal fade" id="ann-sm-modal<?php echo $row['id'] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    <?php echo $row1['title']; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <ul>
                                                    <li><?php echo $row1['subject']; ?></li>
                                                    <li><?php echo $row1['details']; ?></li>
                                                    <li><?php echo $row1['links']; ?></li>
                                                    <li><?php echo $row1['time']; ?></li>
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                                <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="bg-success text-white card-header text-center">
                                    <a href="#" style="text-decoration:none; color:white;" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><i class="fa-solid fa-comments"></i>
                                        Suggestion</a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Suggestion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Title</th>
                                                            <th scope="col">Subject</th>
                                                            <th scope="col">Message</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                $sql = "SELECT * FROM suggestion ORDER BY id DESC";
                                $result = $conn->query($sql);                              
                                while ($row = $result->fetch_assoc()) {
                                ?>

                                                    <tbody>
                                                        <tr>
                                                            <th><a href="#" style="color:black; text-decoration:none;"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#sugg-sm-modal<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a>
                                                            </th>
                                                            <td><a href="#" style="color:black; text-decoration:none;"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#sugg-sm-modal<?php echo $row['id'] ?>"><?php echo $row['subject'] ?></a>
                                                            </td>
                                                            <td><a href="#" style="color:black; text-decoration:none;"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#sugg-sm-modal<?php echo $row['id'] ?>"><?php echo $row['message'] ?></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <?php
                                }
                                ?>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Message</th>
                                        </tr>
                                    </thead>
                                    <?php
                                $sql = "SELECT * FROM suggestion ORDER BY id DESC LIMIT 4";
                                $result = $conn->query($sql);                              
                                while ($row = $result->fetch_assoc()) {
                                ?>

                                    <tbody>
                                        <tr>
                                            <th><a href="#" style="color:black; text-decoration:none;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#sugg-sm-modal<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a>
                                            </th>
                                            <td><a href="#" style="color:black; text-decoration:none;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#sugg-sm-modal<?php echo $row['id'] ?>"><?php echo $row['subject'] ?></a>
                                            </td>
                                            <td><a href="#" style="color:black; text-decoration:none;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#sugg-sm-modal<?php echo $row['id'] ?>"><?php echo $row['message'] ?></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
                                }
                                ?>
                                </table>

                                <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas>
                                </div>
                            </div>
                            <?php
                                $sql = "SELECT * FROM suggestion";
                                $result = $conn->query($sql);                              
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id'];
                                $sql1 = "SELECT * FROM suggestion WHERE id ='$id'";
                                $result1 = $conn->query($sql1);                              
                                while ($row1 = $result1->fetch_assoc()) {
                                ?>
                            <div class="modal fade" id="sugg-sm-modal<?php echo $row['id'] ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $row1['title']; ?>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <ul>
                                                <li><?php echo $row1['title']; ?></li>
                                                <li><?php echo $row1['subject']; ?></li>
                                                <li><?php echo $row1['message']; ?></li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 h-100">
                                <div class="bg-danger text-white card-header text-center">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    Urgent Tickets
                                </div>
                                <br>
                                <div style="max-height: 200px; overflow-y: auto;">
                                    <?php 
                                        $ticket_volunteers_id = $_SESSION['id'];
                                        $query = "SELECT * FROM tickets WHERE ticket_priority = 'Urgent' AND ticket_volunteers_id = '$ticket_volunteers_id'";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <ul>
                                        <li> <a href="" class="text-danger" style="text-decoration:none"
                                                data-bs-toggle="modal"
                                                data-bs-target="#urgent<?php echo $row['id'] ?>"><?php echo $row['ticket_title'] ?>
                                                - Deadline: <?php echo $row['ticket_deadline'] ?></a></li>
                                    </ul>

                                    <div class="modal modal-md fade" id="urgent<?php echo $row['id'] ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="detTicket" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title">Ticket Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <h6>Ticket Title: <b><?php echo $row['ticket_title'] ?></b>
                                                            </h6>
                                                            <h6>Ticket Admin: <b><?php echo $row['ticket_admin'] ?></b>
                                                            </h6>
                                                            <hr>
                                                            <h6>Ticket Description: </h6>
                                                            <b><?php echo $row['ticket_desc'] ?></b>
                                                            <hr>
                                                            <h6 class="mt-3">Ticket Volunteers:</h6>
                                                            <?php 
                                                                $ids = $row['ticket_volunteers_id'];
                                                                $idsArray = explode(',', $ids);
                                                            
                                                                $idsString = "'" . implode("', '", $idsArray) . "'";
                                                                
                                                                $query_volunteer = "SELECT * FROM accounts WHERE id IN ($idsString)";
                                                                $result_volunteer = mysqli_query($conn, $query_volunteer);
                                                                
                                                                while ($row_volunteer = mysqli_fetch_array($result_volunteer)) {
                                                                    ?>
                                                            <ul>
                                                                <li><b><?php echo $row_volunteer['name'] ?></b></li>
                                                            </ul>
                                                            <?php
                                                                }
                                                            ?>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6 class="mt-3">Priority:
                                                                <?php 
                                                            if($row['ticket_priority'] == 'Low'){
                                                                ?>
                                                                <b><label class="text-secondary">Low</label></b>
                                                                <?php
                                                            }elseif($row['ticket_priority'] == 'Mid'){
                                                                ?>
                                                                <b><label class="text-primary">Mid</label></b>
                                                                <?php
                                                            }elseif($row['ticket_priority'] == 'High'){
                                                                ?>
                                                                <b><label class="text-warning">High</label></b>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <b><label class="text-danger">Urgent</label></b>
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                            </h6>
                                                            <h6>Ticket Type: <b><?php echo $row['ticket_type'] ?></b>
                                                            </h6>
                                                            <h6 class="mt-3">Ticket Deadline:
                                                                <b><?php echo $row['ticket_deadline'] ?></b>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                }
                                ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>