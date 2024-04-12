<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>Skill Tag - Volunteer Management Strageties</title>
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

                        <a class="nav-link" href="event_plan.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-week"></i></div>
                            Event Plan
                        </a>

                        <a class="nav-link active" href="skill_tag.php">
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
                            <h4 class="mt-4"><b>Skill Tag</b></h4>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addcategory">Add
                                Category <i class="fa-solid fa-plus"></i></button>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="LiveTime"></span> </h4>
                            <h5>Recommendation -> <span class="text-success">Sample</span> </h5>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="addcategory" tabindex="-1" aria-labelledby="addcategory"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-success">
                                    <h5 class=" modal-title text-white">Add Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="">
                                    <div class="modal-body">
                                        <label for="">Category:</label>
                                        <input class="form-control" type="text" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 mt-4">
                        <div class="card-header text-center">
                            Category 1 Sample <button class="btn btn-success"><i class="fa-solid fa-plus"></i></button>
                        </div>
                        <div class="p-3">
                            <div class="row">

                                <div class="col-sm-2">

                                    <div class="card bg-success text-white mb-4 rounded-pill p-3 text-center">
                                        <div class="card-body">
                                            Sample Tag 1
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card bg-success text-white mb-4 rounded-pill p-3 text-center">
                                        <div class="card-body">
                                            Sample Tag 2
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card bg-success text-white mb-4 rounded-pill p-3 text-center">
                                        <div class="card-body">
                                            Sample Tag 3
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card bg-success text-white mb-4 rounded-pill p-3 text-center">
                                        <div class="card-body">
                                            Sample Tag 4
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card bg-success text-white mb-4 rounded-pill p-3 text-center">
                                        <div class="card-body">
                                            Sample Tag 5
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card bg-success text-white mb-4 rounded-pill p-3 text-center">
                                        <div class="card-body">
                                            Sample Tag 6
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 mt-4">
                        <div class="card-header text-center">
                            Category 2 Sample <button class="btn btn-success"><i class="fa-solid fa-plus"></i></button>
                        </div>

                        <div class="p-3">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="card bg-dark text-white mb-4 rounded-pill p-3 text-center">
                                        <div class="card-body">
                                            Sample Tag 1
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card bg-dark text-white mb-4 rounded-pill p-3 text-center">
                                        <div class="card-body">
                                            Sample Tag 2
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card bg-dark text-white mb-4 rounded-pill p-3 text-center">
                                        <div class="card-body">
                                            Sample Tag 3
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 mt-4">
                        <div class="card-header text-center">
                            Category 3 Sample <button class="btn btn-success"><i class="fa-solid fa-plus"></i></button>
                        </div>

                        <div class="p-3">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="card bg-danger text-white mb-4 rounded-pill p-3 text-center">
                                        <div class="card-body">
                                            Sample Tag 1
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card bg-danger text-white mb-4 rounded-pill p-3 text-center">
                                        <div class="card-body">
                                            Sample Tag 2
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card bg-danger text-white mb-4 rounded-pill p-3 text-center">
                                        <div class="card-body">
                                            Sample Tag 3
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card bg-danger text-white mb-4 rounded-pill p-3 text-center">
                                        <div class="card-body">
                                            Sample Tag 4
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