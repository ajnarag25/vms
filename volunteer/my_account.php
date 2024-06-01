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
                        <?php 
                            error_reporting(0);

                            $sesId = $_SESSION['volunteer']['id'];
                            $sesUser = $_SESSION['volunteer']['username'];
               
                            $query = "SELECT * FROM accounts WHERE `id`='$sesId'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="card p-4">
                            <div class="row">
                                <div class="col-md-9">
                                        <h5><b>Name:</b> <?php echo $row['name'] ?></h5>
                                        <h5><b>Date Joined:</b> <?php echo $row['date_joined'] ?></h5>
                                        <h5><b>Account Type: </b>
                                            <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-0 px-2 text-capitalize"
                                                role="alert">
                                                <?php echo $row['type'] ?>
                                            </div>
                                        </h5>
                                </div>
                                
                                <?php 
                                    // VOLUNTEER INTENSITY LOGIC
                                    $volunteer_id = $_SESSION['volunteer']['id'];;

                                    $querySVol = "SELECT * FROM tickets WHERE ticket_volunteers_id LIKE '%, $volunteer_id, %' 
                                                OR ticket_volunteers_id LIKE '$volunteer_id, %' 
                                                OR ticket_volunteers_id LIKE '%, $volunteer_id' 
                                                OR ticket_volunteers_id = '$volunteer_id' AND ticket_status != 'Completed' ";

                                    $resultSVol = mysqli_query($conn, $querySVol);

                                    $ask_tickets_count = 0; // Initialize the counter for "ask" tickets
                                    $total_comment_value = 0; // Initialize the total comment value
                                    $monthly_intensity = []; // Initialize an array to store monthly intensity
                                    $monthly_ticket_count = []; // Initialize an array to store the count of tickets processed in each month

                                    // Define the priority mapping
                                    $priority_mapping = [
                                        'urgent' => 4,
                                        'high' => 3,
                                        'mid' => 2,
                                        'low' => 1
                                    ];

                                    if ($resultSVol) {
                                        while ($ticket = mysqli_fetch_assoc($resultSVol)) {
                                            $ticket_id = $ticket['id'];
                                            $ticket_priority = strtolower($ticket['ticket_priority']); // Make sure to handle case-insensitivity
                                            $ticket_ask = strtolower($ticket['ticket_type']);
                                            $ticket_instruction = $ticket['ticket_instructions'];
                                            $ticket_date = $ticket['date_added']; // Assuming the date field is 'date_added'

                                            // Get the month of the ticket
                                            $ticket_month = date('Y-m', strtotime($ticket_date));

                                            // Get the numeric priority value
                                            $priority_value = isset($priority_mapping[$ticket_priority]) ? $priority_mapping[$ticket_priority] : 0;

                                            // Output the ticket details
                                            // echo "Priority: $ticket_priority ($priority_value)<br>";
                                            // echo "Type: $ticket_ask<br>";
                                            // echo "Instructions: $ticket_instruction<br>";

                                            // Count the number of instructions
                                            if (!empty($ticket_instruction)) {
                                                $instructions_array = array_filter(explode(',', $ticket_instruction));
                                                $instructions_count = count($instructions_array);
                                            } else {
                                                $instructions_count = 0;
                                            }

                                            // echo "Number of instructions: $instructions_count<br>";

                                            // Increment the ask tickets counter if the type is "ask"
                                            if ($ticket_ask == 'ask') {
                                                $ask_tickets_count++;
                                            }

                                            // Query to count the comments for the current ticket
                                            $q = "SELECT COUNT(*) as comment_count FROM comments WHERE ticket_id = '$ticket_id'";
                                            $r = mysqli_query($conn, $q);

                                            if ($r) {
                                                $comment_data = mysqli_fetch_assoc($r);
                                                $comment_count = $comment_data['comment_count'];
                                            } else {
                                                $comment_count = 0; // Default to 0 if the query fails
                                            }

                                            // Calculate the comment value for the current ticket
                                            $comment_value = $comment_count * 0.2;

                                            // Calculate the intensity for the current ticket
                                            $intensity = $priority_value + $comment_value + $instructions_count;
                                            if ($ticket_ask == 'ask') {
                                                $intensity += 1; // Add 1 for each "ask" ticket
                                            }

                                            // Add the intensity to the corresponding month
                                            if (!isset($monthly_intensity[$ticket_month])) {
                                                $monthly_intensity[$ticket_month] = 0;
                                                $monthly_ticket_count[$ticket_month] = 0;
                                            }
                                            $monthly_intensity[$ticket_month] += $intensity;
                                            $monthly_ticket_count[$ticket_month]++;

                                            // Output the ticket title with the number of comments and the comment value
                                            // echo "<ul><li>{$ticket['ticket_title']} (Comments: $comment_count, Comment Value: $comment_value, Intensity: $intensity)</li></ul>";
                                        }

                                        // Output the total count of "ask" tickets
                                        // echo "Total number of 'ask' tickets: $ask_tickets_count<br>";
                                        // Output the total comment value
                                        // echo "Total comment value: $total_comment_value<br>";

                                        // Output the monthly intensity and calculate average intensity
                                        foreach ($monthly_intensity as $month => $intensity) {
                                            $average_intensity = $monthly_ticket_count[$month] > 0 ? $intensity / $monthly_ticket_count[$month] : 0;
                                            // echo "Month: $month, Total Intensity: $intensity, Average Intensity: $average_intensity<br>";
                                            ?>
                                            <?php
                                        }
                                    } else {
                                        echo "Error: " . mysqli_error($conn);
                                    }
                                ?>
                                
                                <div class="col-md-3 text-center">
                                    <div id="progress-bar-container"
                                        style="position: relative;">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-9">
                                    <h5><b>Contacts:</b></h5>
                                    <h5>
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateEmail<?php echo $row['id'] ?>">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        Email: <b><?php echo $row['email'] ?></b>
                                    </h5>

                                    <!-- Update Email -->
                                    <div class="modal fade" id="updateEmail<?php echo $row['id'] ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h5 class="modal-title" id="">Update Email</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="./include/process.php" method="POST">
                                                    <div class="modal-body">
                                                        <label for=""><b>Email:</b> </label>
                                                        <input type="email" class="form-control" name="updt_email" placeholder="Enter your new email" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="update_id" value="<?php echo $row['id'] ?>">
                                                        <button type="submit" name="update_email" class="btn btn-primary w-100">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <h5>
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateNumber<?php echo $row['id'] ?>">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        Phone Number: <b><?php echo $row['contact'] ?></b>
                                    </h5>

                                    <!-- Update Contact  -->
                                    <div class="modal fade" id="updateNumber<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h5 class="modal-title" id="">Update Contact Number</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="./include/process.php" method="POST">
                                                    <div class="modal-body">
                                                        <label for=""><b>Contact Number:</b> </label>
                                                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter your new contact number" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="update_id" value="<?php echo $row['id'] ?>">
                                                        <button type="submit" name="update_contact" class="btn btn-primary w-100">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <p>Average Online Time: <b>2 Hr/s per day</b></p> -->
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-sm btn-success w-50"  data-bs-toggle="modal" data-bs-target="#addSkills<?php echo $row['id'] ?>">
                                            Add Skills <i class="fa-solid fa-plus"></i>
                                        </button>
                                        <h6 class="mt-3">Skills:</h6>
                                    </div>

                                    <!-- Update Contact  -->
                                    <div class="modal modal-lg fade" id="addSkills<?php echo $row['id'] ?>" tabindex="-1"  aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h5 class="modal-title" id="">Add Skills</h5>
                                                    <p class="modal-title text-danger">* Select your skills</p>
                                                </div>
                                                <form action="./include/process.php" method="POST">
                                                    <div class="modal-body">
                                                        <?php
                                                            $query = "SELECT * FROM skill_tag WHERE tag_name = ''";
                                                            $result = mysqli_query($conn, $query);
                                                            while ($row = mysqli_fetch_array($result)) {
                                                            $main_cat = $row['category'];
                                                        ?>
                                                        <h5 class="mt-3"><b><?php echo $row['category'] ?>:</b></h5>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                <?php 
                                                                    $check_skills = "SELECT * FROM volunteer_skills WHERE volunteer_id = '$sesId'";
                                                                    $query_check = mysqli_query($conn, $check_skills);
                                                                    $tag_names = array();
                                                                    while ($check_tags = mysqli_fetch_array($query_check)) {
                                                                        $tag_names[] = $check_tags['tag_name'];
                                                                    }
                                                                    $sub_query = "SELECT * FROM skill_tag WHERE tag_name != '' AND category = '$main_cat' AND tag_name NOT IN ('" . implode("','", $tag_names) . "')";
                                                                    $sub_result = mysqli_query($conn, $sub_query);
                                                                    while ($sub_row = mysqli_fetch_array($sub_result)) {
                                                                ?>
                                                                    <div class="col-md-2">
                                                                        <button type="button" class="btn btn-success skill-tag add-skills" value="<?php echo $sub_row['id'] ?>"><?php echo $sub_row['tag_name']; ?></button>
                                                                        <input type="hidden" name="vl_id" value="<?php echo $sesId; ?>">
                                                                        <input type="hidden" name="vl_user" value="<?php echo $sesUser; ?>">
                                                                        <input type="hidden" name="skill_id" value="<?php echo $sub_row['id']; ?>">
                                                                        <input type="hidden" id="skills-ids" name="skills_ids[]">
                                                                        <input type="hidden" id="skills-values" name="skills_values[]">
                                                                    </div>
                                                                <?php 
                                                                }
                                                                ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php 
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="addSkills" class="btn btn-success w-100">Add Skills</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center" style="max-height: 200px; overflow-y: auto;">
                                    <?php
                                        $retrieve_skills = "SELECT * FROM volunteer_skills WHERE volunteer_id = '$sesId'";
                                        $query_retrieve = mysqli_query($conn, $retrieve_skills);
                                        while ($rtags = mysqli_fetch_array($query_retrieve)) {
                                    ?>
                                        <div class="alert alert-success rounded-pill d-inline-flex align-items-center py-0 px-2 text-capitalize"
                                            role="alert">
                                            <a href="" title="Remove Skill" class="text-secondary" style="margin-right:5px;" data-bs-toggle="modal" data-bs-target="#delSkills<?php echo $rtags['id'] ?>"><i class="fa-solid fa-x" style="font-size:13px;"></i> </a>  <?php echo $rtags['tag_name']; ?>
                                        </div>
                                        

                                        <!-- Remove Skills -->
                                        <div class="modal fade" id="delSkills<?php echo $rtags['id'] ?>" tabindex="-1" aria-labelledby="instructions" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-dark text-white">
                                                        <h5 class="modal-title" id="">Remove Skill: <b class="text-danger"><?php echo $rtags['tag_name'] ?></b> </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="./include/process.php" method="POST">
                                                        <div class="modal-body text-center">
                                                            <h5> <b>Are you sure you want to remove this skill?</b></h5>
                                                            <p class="text-danger">* This action is irreversible!</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="remId" value="<?php echo $rtags['id'] ?>">
                                                            <button type="submit" class="btn btn-danger w-100" name="remSkills">Remove</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
            </main>

            <?php include('./include/footer.php') ?>

        </div>
    </div>

    <?php include('./include/scripts.php') ?>
    <script>
        // Initialize arrays to store clicked button IDs and values
        var clickedSkillIds = [];
        var clickedSkillValues = [];

        $(".add-skills").click(function() {
            var buttonId = $(this).val();
            var buttonValue = $(this).text();
        
            clickedSkillIds.push(buttonId);
            clickedSkillValues.push(buttonValue);
            
            $(this).prop('disabled', true);
            
            $("#skills-ids").val(clickedSkillIds);
            $("#skills-values").val(clickedSkillValues);
        });
    </script>

    <!--INCLUDED SCRIPT FOR PROGRESS CHART--->
    <script src="https://cdn.jsdelivr.net/npm/progressbar.js@1.1.0/dist/progressbar.min.js"></script>
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
            value: 'Intensity Points: <?php echo $intensity; ?>%', // Initial value of the progress text at the middle of the circle
            className: 'progressbar-text', // CSS class for the progress text
            autoStyleContainer: false, // Disable automatic styling of the text container
            style: {
                position: 'absolute',
                left: '30%', //it works like padding
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
    progressBar.animate(<?php echo $intensity / 100 ?>);
    </script>

    <script>
        window.onload = function() {
            var contactInput = document.getElementById("contact");

            contactInput.addEventListener("input", function() {
                // Remove any non-digit characters
                this.value = this.value.replace(/\D/g, '');

            });
        };
    </script>
</body>

</html>