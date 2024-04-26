<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Guest / Sponsors - Volunteer Management Strageties</title>
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

                        <!-- <a class="nav-link" href="event_plan.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-week"></i></div>
                            Event Plan
                        </a> -->

                        <a class="nav-link" href="skill_tag.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-tag"></i></div>
                            Skill Tag
                        </a>

                        <a class="nav-link active" href="guest_sponsors.php">
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
                            <h4 class="mt-4"><b>Guest / Sponsors</b></h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="LiveTime"></span> </h4>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#addGS">Add Guest / Sponsors <i class="fa-solid fa-plus"></i></button>

                        <!--Add Guest / Sponsors-->
                        <div class="modal fade" id="addGS" tabindex="-1" role="dialog" aria-labelledby="addGS" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-success text-white">
                                        <h5 class="modal-title">Add Guest / Sponsors</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </button>
                                    </div>
                                    <form action="./include/process.php" method="POST">
                                        <div class="modal-body">
                                            <label for=""><span class="text-danger">*</span> Type:</label>
                                            <select class="form-select" name="type" id="" required>
                                                <option value="" selected disabled>Select Type</option>
                                                <option value="guest">Guest</option>
                                                <option value="sponsors">Sponsors</option>
                                            </select>
                                            <label for=""><span class="text-danger">*</span> Name:</label>
                                            <input class="form-control" name="gs_name" type="text" required>
                                            <label for=""><span class="text-danger">*</span> Position:</label>
                                            <input class="form-control" type="text" name="position" required>
                                            <label for=""><span class="text-danger">*</span> Company:</label>
                                            <input class="form-control" type="text" name="company" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="addGS" class="btn btn-success">Add</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card p-3 mt-3">
                            <div class="card-body">
                                <table class="table" id="GSTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">Company</th>
                                            <th scope="col">Date Added</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $query = "SELECT * FROM guest_sponsors";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {

                                        ?>
                                            <tr>
                                                <th><?php echo $row['name'] ?></th>
                                                <td><?php echo $row['position'] ?></td>
                                                <td><?php echo $row['company'] ?></td>
                                                <td><?php echo $row['date_added'] ?></td>
                                                <td><?php echo $row['status'] ?></td>
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