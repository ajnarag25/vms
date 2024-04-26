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
                                            $admin_id = $_SESSION['admin']['id'];
                                            $query = "SELECT * FROM accounts WHERE id != $admin_id";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <th><?php echo $row['username'] ?></th>
                                            <td>
                                            <?php 
                                                if($row['status'] == 'Verified'){
                                                ?>
                                                    <label class="text-success">Verified</label>
                                                <?php
                                                }else{
                                                    ?>
                                                    <label class="text-warning">Unverified</label>
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
                                                <button class="btn btn-sm btn-warning text-white" title="Change Account Type" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-user-gear"></i></button>
                                                <button class="btn btn-sm btn-danger" title="Remove Account" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-minus"></i></button>
                                                <button class="btn btn-sm btn-success" title="Add Ticket" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-ticket"></i></button>
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