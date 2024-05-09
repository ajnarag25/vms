<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./include/header.php') ?>
    <title>My Account - Volunteer Management Strageties</title>
    <script src="https://cdn.jsdelivr.net/npm/progressbar.js@1.1.0/dist/progressbar.min.js"></script>
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
                            <div class="card-head">
                                <div class="row">
                                    <div class="col-md-10 text-left">
                                        <h5><b>Name:</b> Juan Delacruz</h5>
                                        <h5><b>Date Joined:</b> 03/18/2024</h5>
                                        <h5><b>Account Type: </b>
                                            <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-0 px-2"
                                                role="alert">
                                                Volunteer
                                            </div>
                                        </h5>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <div id="progress-bar-container" style="position: relative;">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7">
                                        Contacts:
                                        <br><button type="button" class="btn btn-warning" data-toggle="#"
                                            data-target="#exampleModal"
                                            style="width: 100px; height: 25px; font-size: 15px; padding: 0;">
                                            Update
                                        </button>
                                        Email: <b>juandelacruz@gmail.com</b>
                                        <br><button type="button" class="btn btn-warning" data-toggle="#"
                                            data-target="#exampleModal"
                                            style="width: 100px; height: 25px; font-size: 15px; padding: 0;">
                                            Update
                                        </button>
                                        Phone Number: <b>09123456789</b>
                                        <br>
                                        <br>
                                        Average Online Time: <b> 2 Hr/s per day</b>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-6 text-left">
                                                <h4><b>Skills:</b></h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- button for modal of addskill-->
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-toggle="modal" data-target="#addskills">
                                                            Add Skills
                                                        </button>
                                                        <!-- modal for addskill -->
                                                        <div class="modal fade" id="addskills" tabindex="-1"
                                                            role="dialog" aria-labelledby="addskillsLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <!-- Added modal-lg class -->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="addskillsLabel">Add
                                                                            Skills</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <?php
                                                                            $query = "SELECT * FROM skill_tag WHERE `tag_name`=''";
                                                                            $result = mysqli_query($conn, $query);
                                                                            while ($row = mysqli_fetch_array($result)) {
                                                                        ?>
                                                                        <p><?php echo $row['category']; ?></p>
                                                                        <!-- nested php -->
                                                                        <?php
                                                                            $category = $row['category'];
                                                                            $query2 = "SELECT * FROM skill_tag WHERE `tag_name`!='' AND `category`='$category'";
                                                                            $result2 = mysqli_query($conn,$query2);
                                                                            while($row2 = mysqli_fetch_array($result2)){
                                                                        ?>
                                                                        <!-- html inside the nested php -->
                                                                        <?php
                                                                        $volunteer_id = $_SESSION['id'];
                                                                        $category_id = $row2['category_id'];
                                                                        $tagname = $row2['tag_name'];
                                                                        $addtagsql = "SELECT * FROM volunteer_skills WHERE category_id ='$category_id' AND tag_name='$tagname' AND volunteer_id='$volunteer_id'";
                                                                        $addtagresult = mysqli_query($conn, $addtagsql);
                                                                        if (mysqli_fetch_array($addtagresult)) {  
                                                                        ?>
                                                                        <button type="button"
                                                                            class="add-button btn btn-info disabled"
                                                                            value="<?php echo $row2['category_id']; ?>"><?php echo $row2['tag_name']; ?></button>
                                                                        <!-- nested php -->
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                        <button type="button"
                                                                            class="add-button btn btn-info"
                                                                            value="<?php echo $row2['category_id']; ?>"><?php echo $row2['tag_name']; ?></button>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                        <button id='display'>Display array</button>
                                                                        <div id="result2"></div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="close btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="button"
                                                                            class="saveSkils btn btn-primary">Save
                                                                            changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!-- button for modal of removeskills-->
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal" data-target="#removeskills">
                                                            Remove Skills
                                                        </button>
                                                        <!-- modal for removeskills -->
                                                        <div class="modal fade" id="removeskills" tabindex="-1"
                                                            role="dialog" aria-labelledby="removeskillsLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <!-- Added modal-lg class -->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="removeskillsLabel">
                                                                            Remove
                                                                            Skills</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <?php
                                                                            $query = "SELECT * FROM skill_tag WHERE `tag_name`=''";
                                                                            $result = mysqli_query($conn, $query);
                                                                            while ($row = mysqli_fetch_array($result)) {
                                                                        ?>
                                                                        <p><?php echo $row['category']; ?></p>
                                                                        <!-- nested php -->
                                                                        <?php
                                                                            $category = $row['category'];
                                                                            $query2 = "SELECT * FROM skill_tag WHERE `tag_name`!='' AND `category`='$category'";
                                                                            $result2 = mysqli_query($conn,$query2);
                                                                            while($row2 = mysqli_fetch_array($result2)){
                                                                        ?>
                                                                        <!-- html inside the nested php -->
                                                                        <button type="button"
                                                                            class="btn btn-info"><?php echo $row2['tag_name']; ?></button>
                                                                        <!-- nested php -->
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="button"
                                                                            class="btn btn-primary">Save
                                                                            changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-12 text-center mt-3"
                                                style="overflow-y: auto; max-height: 250px;">
                                                Category
                                                <ol class="list-unstyled d-flex flex-wrap">
                                                    <li class="col-md-4">Sample skills 6</li>
                                                    <li class="col-md-4">Sample skills 7</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                </ol>
                                                Category
                                                <ol class="list-unstyled d-flex flex-wrap">
                                                    <li class="col-md-4">Sample skills 1</li>
                                                    <li class="col-md-4">Sample skills 2</li>
                                                    <li class="col-md-4">Sample skills 3</li>
                                                    <li class="col-md-4">Sample skills 4</li>
                                                    <li class="col-md-4">Sample skills 5</li>
                                                    <li class="col-md-4">Sample skills 6</li>
                                                    <li class="col-md-4">Sample skills 7</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                </ol>
                                                Category
                                                <ol class="list-unstyled d-flex flex-wrap">
                                                    <li class="col-md-4">Sample skills 1</li>
                                                    <li class="col-md-4">Sample skills 2</li>
                                                    <li class="col-md-4">Sample skills 3</li>
                                                    <li class="col-md-4">Sample skills 4</li>
                                                    <li class="col-md-4">Sample skills 5</li>
                                                    <li class="col-md-4">Sample skills 6</li>
                                                    <li class="col-md-4">Sample skills 7</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                    <li class="col-md-4">Sample skills 8</li>
                                                </ol>
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
        // Define an empty array
        var myArray = [];

        $(".close").click(function() {
            myArray = [];
            window.location.reload();
        })
        $(".saveSkils").click(function() {
            $.ajax({
                type: "POST",
                url: "./include/add_tags.php", // Replace "save_skills.php" with the URL of your PHP script
                data: {
                    skills: JSON.stringify(myArray)
                }, // Send myArray data as JSON
                success: function(response) {
                    // Update index page content based on the response
                    console.log(
                        "Skills saved successfully!"
                    ); // Display response message on the page
                    // Optionally, you can reload the page after saving
                    // window.location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error if AJAX request fails
                    console.error(xhr.responseText);
                }
            });
            myArray = [];
        })
        $('#addskills').on('hidden.bs.modal', function(e) {
            myArray = [];
            window.location.reload();
        });
        // jQuery function to add value of each button to the array and display array elements
        $(".add-button").click(function() {
            var buttonValue = $(this).text(); // Get the text value of the clicked button
            var buttonId = $(this).val(); // Get the value attribute of the clicked button
            myArray.push({
                id: buttonId,
                value: buttonValue
            }); // Add the value and id to the array

            // Disable button after it is clicked
            $(this).prop('disabled', true);
        });
        // ======================
        // to be remove function
        $("#display").click(function() {
            var output = "";
            $.each(myArray, function(index, obj) {
                output += "Element " + index + ": " + obj.value + " id: " + obj.id + "<br>";
            });
            $("#result2").html(output);
        });
    });
    </script>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- codes for progress bar -->
    <script>
    var progressBar = new ProgressBar.Circle('#progress-bar-container', {
        strokeWidth: 6,
        easing: 'easeInOut',
        duration: 1400,
        color: '#4caf50',
        trailColor: '#f3f3f3',
        trailWidth: 6,
        svgStyle: {
            // Center align the progress percentage text
            transform: 'translateX(-40%) translateY(00%)', //position of the circle
            width: '160px', //size of the circle
            height: '160px', //size of the circle
            position: 'relative',
            left: '27%', //it works like padding/margin
            top: '0%', //it works like padding/margin
        },
        text: {
            value: 'Intensity Points: 70%', // Initial value of the progress text at the middle of the circle
            className: 'progressbar-text', // CSS class for the progress text
            autoStyleContainer: false, // Disable automatic styling of the text container
            style: {
                position: 'absolute',
                left: '0%', //it works like padding
                right: '20%', //it works like padding/margin
                top: '40%', //it works like padding/margin
                padding: 0,
                margin: 0,
                fontSize: '0.8rem',
                fontWeight: 'bold',
                color: '#000'
            }
        }
    });
    // Set the initial progress value
    progressBar.animate(0.7); // Example: 70% progress
    </script>
</body>

</html>