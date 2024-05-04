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

                        <!-- <a class="nav-link" href="event_plan.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-week"></i></div>
                            Event Plan
                        </a> -->

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
                            <h4 class="mt-4"><b>Skill Tag</b></h4>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addcategory">Add
                                Category <i class="fa-solid fa-plus"></i></button>
                        </div>
                        <div class="col-md-6 text-end">
                            <h4 class="mt-4"> <span id="LiveTime"></span> </h4>
                            <h5>Recommendation -> <span class="text-success">Sample</span> </h5>
                        </div>
                    </div>
                    <!-- Modal Add Category-->
                    <div class="modal fade" id="addcategory" tabindex="-1" aria-labelledby="addcategory"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-success">
                                    <h5 class=" modal-title text-white">Add Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="./include/process.php" method="POST">
                                    <div class="modal-body">
                                        <label for="">Category:</label>
                                        <input class="form-control" name="category" type="text" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="add_category" class="btn btn-success">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php 

                        $query = "SELECT * FROM skill_tag WHERE category_id = 0";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                    
                    ?>
                    <div class="card mb-4 mt-4 border border-5">
                        <div class="card-header text-center bg-success text-white">
                            <div class="float-start">
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addTag<?php echo $row['id'] ?>">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                            <?php echo $row['category'] ?>
                            <div class="float-end">
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delCategory<?php echo $row['id'] ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Modal Add Tag-->
                        <div class="modal fade" id="addTag<?php echo $row['id'] ?>"" tabindex="-1" aria-labelledby="addcategory"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-success">
                                        <h5 class=" modal-title text-white">Add Tag</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="./include/process.php" method="POST">
                                        <div class="modal-body">
                                            <label for="">Tag Name:</label>
                                            <input type="hidden" name="category" value="<?php echo $row['category'] ?>">
                                            <input type="hidden" name="category_id" value="<?php echo $row['id'] ?>">
                                            <input class="form-control" name="tag" type="text" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="add_tag" class="btn btn-success">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Modal Delete Category-->
                        <div class="modal fade" id="delCategory<?php echo $row['id'] ?>"" tabindex="-1" aria-labelledby="addcategory"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-success">
                                        <h5 class=" modal-title text-white">Delete Category: <?php echo $row['category'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="./include/process.php" method="POST">
                                        <div class="modal-body text-center">
                                            <h5> <b>Are you sure you want to delete this category?</b></h5>
                                            <p class="text-danger">* All of the tags included in this category will be deleted. <br> * This action is irreversible!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="category_id" value="<?php echo $row['id'] ?>">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="del_category" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="p-3">
                            <div class="row">
                                <div class="col">
                                    <div style="overflow-x: auto; white-space: nowrap; display: flex;">

                                        <?php 
                                            $category_id = $row['id'];
                                            $queryTag = "SELECT * FROM skill_tag WHERE category_id = '$category_id'";
                                            $resultTag = mysqli_query($conn, $queryTag);
                                            while ($tag = mysqli_fetch_array($resultTag)) {

                                        ?>
                                        <div class="card border border-success mb-4 rounded-pill p-3 text-center mx-2" style="min-width: 200px;">
                                            <div class="card-body">
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delTag<?php echo $tag['id'] ?>"><i class="fa-solid fa-minus"></i></button>
                                                <?php echo $tag['tag_name']; ?>
                                            </div>
                                      
                                        </div>

                                         <!-- Modal Remove Tag-->
                                        <div class="modal fade" id="delTag<?php echo $tag['id'] ?>"" tabindex="-1" aria-labelledby="addcategory"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-success">
                                                        <h5 class=" modal-title text-white">Remove Tag: <?php echo $tag['tag_name'] ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="./include/process.php" method="POST">
                                                        <div class="modal-body text-center">
                                                            <h5> <b>Are you sure you want to remove this skill tag?</b></h5>
                                                            <p class="text-danger">* This action is irreversible!</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="tag_id" value="<?php echo $tag['id'] ?>">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="del_tag" class="btn btn-danger">Remove</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                    }
                    ?>


                </div>
            </main>

            <?php include('./include/footer.php') ?>

        </div>
    </div>

    <?php include('./include/scripts.php') ?>

</body>

</html>