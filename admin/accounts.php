<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Accounts - Volunteer Management Strageties</title>
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

                        <a class="nav-link" href="team_dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                            Team Dashboard
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

                        <!-- <a class="nav-link" href="templates.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard"></i></div>
                            Templates
                        </a> -->

                        <a class="nav-link active" href="accounts.php">
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
                            <h4 class="mt-4"><b>Accounts</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="LiveTime"></span> </h4>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="card p-3">
                            <div class="card-body">
                                <table class="table" id="Accounts">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Account Type</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            error_reporting(0);
                                            if($_SESSION['admin']['id']){
                                                isset($_SESSION['superadmin']['id']) ? $_SESSION['superadmin']['id'] : '';
                                                $admin_id = $_SESSION['admin']['id'];
                                            }else{
                                                isset($_SESSION['admin']['id']) ? $_SESSION['admin']['id'] : '';
                                                $admin_id = $_SESSION['superadmin']['id'];
                                            }
                                            $query = "SELECT * FROM accounts WHERE id != $admin_id AND type != 'superadmin' AND status !='Unverified'";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <th><?php echo $row['name'] ?></th>
                                            <th><?php echo $row['username'] ?></th>
                                            <td>
                                            <?php 
                                                if($row['status'] == 'Verified'){
                                                ?>
                                                    <label class="text-success">Verified</label>
                                                <?php
                                                }elseif($row['status'] == 'On Process'){
                                                    ?>
                                                        <label class="text-warning">On Process</label>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <label class="text-danger">Declined</label>
                                                <?php
                                                }
                                            ?>
                                            </td>
                                            <td><?php echo $row['contact'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td>
                                            <?php 
                                                if($row['type'] == 'superadmin'){
                                                    echo 'Super Admin';
                                                }elseif($row['type'] == 'admin'){
                                                    echo 'Admin';
                                                }else{
                                                    echo 'Volunteer';
                                                }
                                            ?>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col d-flex gap-2">
                                                        <button class="btn btn-sm btn-primary" title="Change Account Status" data-bs-toggle="modal" data-bs-target="#accVerify<?php echo $row['id'] ?>">
                                                            <i class="fa-solid fa-user-check"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-warning text-white" title="Change Account Type" data-bs-toggle="modal" data-bs-target="#accType<?php echo $row['id'] ?>">
                                                            <i class="fa-solid fa-user-gear"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-danger" title="Remove Account" data-bs-toggle="modal" data-bs-target="#removeAcc<?php echo $row['id'] ?>">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-success" title="Add Ticket" data-bs-toggle="modal" data-bs-target="#addTicket<?php echo $row['id'] ?>">
                                                            <i class="fa-solid fa-ticket"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Modal Change Account Status-->
                                                <div class="modal fade" id="accVerify<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="addDuration" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="./include/process.php" method="POST">
                                                                <div class="modal-header bg-success text-white">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Change Account Status</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <label for="">Account Status:</label>    
                                                                    <select class="form-select" name="acc_stats" id="" required>
                                                                        <option value="" selected disabled>--Select Account Status--</option>
                                                                        <option value="Verified">Verify</option>
                                                                        <option value="Declined">Decline</option>
                                                                    </select>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="hidden" name="acc_id" value="<?php echo $row['id'] ?>">
                                                                    <button type="submit" name="accStat" class="btn btn-primary text-white">Change Account Status</button>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                 <!-- Modal Change Account Type-->
                                                 <div class="modal fade" id="accType<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="addDuration" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="./include/process.php" method="POST">
                                                                <div class="modal-header bg-success text-white">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Change Account Type</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <label for="">Account Type:</label>    
                                                                    <select class="form-select" name="acc_type" id="" required>
                                                                        <option value="" selected disabled>--Select Account Type--</option>
                                                                        <option value="admin">Admin</option>
                                                                        <option value="volunteer">Volunteer</option>
                                                                    </select>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="hidden" name="acc_id" value="<?php echo $row['id'] ?>">
                                                                    <button type="submit" name="accType" class="btn btn-warning text-white">Change Account Type</button>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                 <!-- Modal Remove Account-->
                                                 <div class="modal fade" id="removeAcc<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="addPart" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="./include/process.php" method="POST">
                                                                <div class="modal-header bg-success text-white">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Remove Account</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <h5> <b>Are you sure you want to remove this account?</b></h5>
                                                                    <p class="text-danger">* This action is irreversible!</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                    <button type="submit" name="removeAcc" class="btn btn-danger text-white">Remove</button>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Modal Add Ticket-->
                                                <div class="modal modal-xl fade" id="addTicket<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="addTicket" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-success text-white">
                                                                <h5 class="modal-title">Add Ticket</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                                </button>
                                                            </div>  
                                                            <form action="./include/process.php" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="text-center">
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <input type="hidden" name="ticket_admin" value="<?php echo $_SESSION['admin']['name']; ?> <?php echo $_SESSION['superadmin']['name']; ?>" >
                                                                                        <label class="mt-3" for="">Admin Name:</label>
                                                                                        <h5><b><?php echo $_SESSION['admin']['name']; ?> <?php echo $_SESSION['superadmin']['name']; ?></b></h5>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <input type="hidden" name="ticket_type" value="Account Ticket">
                                                                                        <label class="mt-3" for="">Ticket Type:</label>
                                                                                        <h5><b>Account Ticket</b></h5>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <table class="table" id="VolunteersEvent">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col"></th>
                                                                                        <th scope="col">Volunteers Name</th>
                                                                                        <th scope="col">Email</th>
                                                                                        <th scope="col">View</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php 
                                                                                    $queryAcc = "SELECT * FROM accounts WHERE type = 'volunteer'";
                                                                                    $resultAcc = mysqli_query($conn, $queryAcc);
                                                                                    while ($rowAcc = mysqli_fetch_array($resultAcc)) {
                                                                                ?>
                                                                                <tr>
                                                                                    <td><input type="checkbox" name="volunteer_id[]" value="<?php echo $rowAcc['id'] ?>"></td>
                                                                                    <td><?php echo $rowAcc['name'] ?></td>
                                                                                    <td><?php echo $rowAcc['email'] ?></td>
                                                                                    <td><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#volunteer<?php echo $rowAcc['id'] ?>"><i class="fa-solid fa-magnifying-glass"></i></button></td>
                                                                                </tr>

                                                                                <div class="modal modal-lg fade" id="volunteer<?php echo $rowAcc['id'] ?>" tabindex="-1" aria-labelledby="volunteer" aria-hidden="true">
                                                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                                                        <div class="modal-content">
                                                                                                <div class="modal-header bg-dark text-white">
                                                                                                    <h5 class="modal-title" id="exampleModalLabel">Volunteer: <?php echo $rowAcc['name'] ?></h5>
                                                                                                
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                    <h3>Volunteer Details:</h3>
                                                                                                    <ul>
                                                                                                        <li>Name: <?php echo $rowAcc['name'] ?></li>
                                                                                                        <li>Username: <?php echo $rowAcc['username'] ?></li>
                                                                                                        <li>Email: <?php echo $rowAcc['email'] ?></li>
                                                                                                        <li>Contact: <?php echo $rowAcc['contact'] ?></li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                
                                                                                <?php 
                                                                                }
                                                                                ?>
                                                                                </tbody>
                                                                            </table>
                                                                        
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="text-center">
                                                                                <label for="">Priority:</label>
                                                                                <br>
                                                                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                                    <input type="radio" class="btn-check" name="partBtn" value="Urgent" id="eventUrgent" autocomplete="off" >
                                                                                    <label class="btn btn-outline-danger" for="eventUrgent">Urgent</label>

                                                                                    <input type="radio" class="btn-check" name="partBtn" value="High" id="eventHigh" autocomplete="off">
                                                                                    <label class="btn btn-outline-warning" for="eventHigh">High</label>

                                                                                    <input type="radio" class="btn-check" name="partBtn" value="Mid" id="eventMid" autocomplete="off">
                                                                                    <label class="btn btn-outline-primary" for="eventMid">Mid</label>

                                                                                    <input type="radio" class="btn-check" name="partBtn" value="Low" id="eventLow" autocomplete="off" checked>
                                                                                    <label class="btn btn-outline-secondary" for="eventLow">Low</label>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <label class="" for="">Set Deadline:</label>
                                                                            <input type="date" name="ticket_deadline4" class="form-control" required>
                                                                            <label class="mt-3" for="">Ticket Title:</label>
                                                                            <input class="form-control" name="ticket_title" type="text" required>
                                                                            <label class="mt-3" for="">Ticket Description:</label>
                                                                            <textarea class="form-control" name="ticket_desc" value=""  name="desc" rows="10" cols="5" required></textarea>
                                                                        </div>
                                                                    </div>
                                        
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                    <input type="hidden" name='main_id' value="<?php echo $_GET['id'] ?>">
                                                                    <input type="hidden" name='main_event_id' value="<?php echo $_GET['event_id'] ?>">
                                                                    <input type="hidden" name='main_title' value="<?php echo $_GET['title'] ?>">
                                                                    <input type="hidden" name='main_start' value="<?php echo $_GET['start'] ?>">
                                                                    <input type="hidden" name='main_end' value="<?php echo $_GET['end'] ?>">
                                                                    <input type="hidden" name='main_allday' value="<?php echo $_GET['allday'] ?>">
                                                                    <input type="hidden" name='main_desc' value="<?php echo $_GET['desc']; ?>">
                                                                    <button type="submit" name="addTicketAccount" class="btn btn-success">Add Ticket</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
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

</body>

</html>