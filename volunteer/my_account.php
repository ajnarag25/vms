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
                                        <br>
                                        Email: <b>juandelacruz@gmail.com</b>
                                        <br>
                                        Phone Number: <b>09123456789</b>
                                        <br>
                                        Average Online Time: <b> 2 Hr/s per day</b>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-5 text-left">
                                                <h4><b>Skills:</b></h4>
                                            </div>
                                            <div class="col-md-7">
                                                <!-- button for modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal" style="width: 235px;">
                                                    Edit Skills
                                                </button>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <!-- Added modal-lg class -->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                    Skills</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                This is the content of the modal.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Save
                                                                    changes</button>
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
    progressBar.animate(0.7); // Example: 50% progress
    </script>
</body>

</html>