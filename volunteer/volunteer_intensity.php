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
                                <table class="table" id="Intensity">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">Volunteer Intensity</th>
                                        </tr>
                                    </thead>
                                    <!-- php for selecting account on accounts table  -->
                                    <tbody>
                                    <?php

                                        $query = "SELECT * FROM accounts WHERE type!='superadmin' AND type!='admin'";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {

                                    ?>
                                        <tr>
                                            <td><?php echo $row['name'] ?></td>
                                            
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['contact'] ?></td>
                                            <td>
                                        
                                            <?php 
                                                // VOLUNTEER INTENSITY LOGIC
                                                $volunteer_id = $row['id'];

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
                                                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                            <div class="progress-bar bg-success" style="width: <?php echo $intensity; ?>%"><?php echo $intensity; ?>%</div>
                                                        </div>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "Error: " . mysqli_error($conn);
                                                }
                                            ?>

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