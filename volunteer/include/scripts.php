<script src="../js/jquery.js"></script>
<script src="../js/sweetalert.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/scripts.js"></script>
<script src="../js/datatable.js"></script>
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.9/index.global.min.js"></script>
<script
    src="https://unpkg.com/bs-brain@2.0.3/components/calendars/calendar-1/assets/controller/calendar-1.js"></script>

<script>
    $('#Announcements').DataTable()
    $('#TicketPanel').DataTable()
    $('#Timelog').DataTable()
    $('#TicketPanelAll').DataTable()
    $('#TicketPanelAll').DataTable()
    $('#Intensity').DataTable()
</script>

 <!-- RANDOM SUGGESTIONS -->
 <!-- <script>
    $(document).ready(function() {
        function getRandomSuggestion() {
            const suggestions = [
                "You must avoid multitasking to maintain task working quality and efficiency.",
                "Multitasking can lead to errors and increased stress.",
                "Learn to adapt to changing circumstances.",
                "Celebrate small wins, this boost motivation and helps maintain positive mindset.",
                "Always review your to-do list.",
                "You can send tickets to the admins about the task to improve proficiency.",
                "Please make sure to update your personal plans.",
                "You can always focus on high priority task.",
                "You can always set a target submission goal on every tickets to improve intensity."
            ];
            return suggestions[Math.floor(Math.random() * suggestions.length)];
        }

        function updateSuggestions() {
            const newSuggestion = getRandomSuggestion();
            $('#liveToast .toast-body').text(newSuggestion);
            var toastEl = document.getElementById('liveToast');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();

            const minInterval = 10000; // minimum interval in milliseconds
            const maxInterval = 30000; // maximum interval in milliseconds
            const randomInterval = Math.floor(Math.random() * (maxInterval - minInterval + 1)) + minInterval;

            setTimeout(updateSuggestions, randomInterval);
        }

        updateSuggestions();
    });
</script> -->

<!---CONDITIONS---->
<?php

// Count how many To-Do tasks does the volunteer have
$volunteer_id = $_SESSION['volunteer']['id'];
$volunteer_count = 0;
$queryTodo = "SELECT * FROM tickets WHERE ticket_status = 'To-Do'";
$resultTodo = mysqli_query($conn, $queryTodo);

while ($rowTodo = mysqli_fetch_array($resultTodo)) {
    $ticket_volunteers_ids_todo = explode(',', $rowTodo['ticket_volunteers_id']);
    if (in_array($volunteer_id, $ticket_volunteers_ids_todo)) {
        $volunteer_count++;
    }
}

// Check if the volunteer has an event tomorrow
$queryEvent = "SELECT * FROM tickets";
$resultEvent = mysqli_query($conn, $queryEvent);
$tomorrow = (new DateTime('tomorrow'))->format('Y-m-d');
$hasEventTomorrow = false;
$dateOnlyDebug = [];

while ($rowEvent = mysqli_fetch_array($resultEvent)) {
    $ticket_volunteers_ids_event = explode(',', $rowEvent['ticket_volunteers_id']);
    if (in_array($volunteer_id, $ticket_volunteers_ids_event)) {
        $dateTime = new DateTime($rowEvent['end']);
        $dateOnly = $dateTime->format('Y-m-d');
        
        $dateOnlyDebug[] = $dateOnly;
        if ($dateOnly === $tomorrow) {
            $hasEventTomorrow = true;
            break;
        }
    }
}

// Check the status if ticket if completed then count the total
$queryCompleted = "SELECT * FROM tickets WHERE ticket_status = 'Completed'";
$resultCompleted = mysqli_query($conn, $queryCompleted);
$volunteer_count_completed = 0;
while ($rowCompleted = mysqli_fetch_array($resultCompleted)) {
    $ticket_volunteers_ids_completed = explode(',', $rowCompleted['ticket_volunteers_id']);
    if (in_array($volunteer_id, $ticket_volunteers_ids_completed)) {
        $volunteer_count_completed++;
    }
}

// Check if the volunteer have a ticket deadline that is within the week or has passed
$queryDeadline = "SELECT * FROM tickets WHERE ticket_status != 'Completed'";
$resultDeadline = mysqli_query($conn, $queryDeadline);

$currentDate = new DateTime(); // Current date
$startOfWeek = (clone $currentDate)->modify('monday this week'); // Start of the week
$endOfWeek = (clone $startOfWeek)->modify('sunday this week'); // End of the week

$reminder_deadline = '';

while ($rowDeadline = mysqli_fetch_array($resultDeadline)) {
    $ticket_volunteers_ids_deadline = explode(',', $rowDeadline['ticket_volunteers_id']);
    if (in_array($volunteer_id, $ticket_volunteers_ids_deadline)) {
        $ticketDeadline = new DateTime($rowDeadline['ticket_deadline']);
        $ticketTitle = $rowDeadline['ticket_title'];

        // Check if the deadline is within this week
        if ($ticketDeadline >= $startOfWeek && $ticketDeadline <= $endOfWeek) {
            // Calculate days left until the deadline
            $daysLeft = $currentDate->diff($ticketDeadline)->days;

            // If needed, check if the deadline is in the past or future
            if ($ticketDeadline > $currentDate) {
                $reminder_deadline .= "The ticket '$ticketTitle' has $daysLeft day/s left until the deadline. ";
            } else {
                $reminder_deadline .= "The deadline for the ticket '$ticketTitle' is today or has passed. ";
            }
        }
    }
}


?>

<!-- REMINDERS -->
<script>
        $(document).ready(function() {
        let notificationCount = 0;

        function updateNotificationBadge() {
            console.log("Updating notification badge with count:", notificationCount); // Debugging line
            $('#notificationBadge').text(notificationCount);
        }

        function getRandomSuggestions(num) {
            const suggestions = [
                "You must avoid multitasking to maintain task working quality and efficiency.",
                "Multitasking can lead to errors and increased stress.",
                "Learn to adapt to changing circumstances.",
                "Celebrate small wins, this boost motivation and helps maintain positive mindset.",
                "Always review your to-do list.",
                "You can send tickets to the admins about the task to improve proficiency.",
                "Please make sure to update your personal plans.",
                "You can always focus on high priority task.",
                "You can always set a target submission goal on every tickets to improve intensity."
            ];
            const shuffled = suggestions.sort(() => 0.5 - Math.random());
            return shuffled.slice(0, num);
        }

        function updateSuggestions() {
            const newSuggestions = getRandomSuggestions(2); // Get one random suggestion
            newSuggestions.forEach(function(newSuggestion) {
                $('#notificationList').append('<li class="dropdown-item"><span class="badge-new">Suggestion</span> ' + newSuggestion + '</li>');
                notificationCount++;
            });
            updateNotificationBadge(); // Update the badge count
        }

        function getReminders() {
            const volunteerCount = <?php echo $volunteer_count; ?>;
            const volunteerCountCompleted = <?php echo $volunteer_count_completed; ?>;
            const reminders = [];

            if (volunteerCount > 0) {
                reminders.push('You have a total of ' + volunteerCount + ' To-Do Task/s.');
            }

            <?php if ($hasEventTomorrow): ?>
                reminders.push('You have to rest well for the upcoming event tommorrow.');
                reminders.push('You are the assigned volunteer for the event tommorrow.');
            <?php endif; ?>

            if (volunteerCountCompleted > 0) {
                reminders.push('You have completed a total ' + volunteerCountCompleted + ' tickets. If convenient you can always send tickets to get or join other task. This will always increase your intensity points and you will be always be suggested to other tickets.');
            }
            
            <?php if (!empty($reminder_deadline)): ?>
                reminders.push('<?php echo addslashes($reminder_deadline); ?>');
            <?php endif; ?>


            return reminders;
        }

        function updateReminders() {
            const reminders = getReminders();
            if (reminders.length > 0) {
                reminders.forEach(function(reminder) {
                    $('#notificationList').append('<li class="dropdown-item"><span class="badge-warning">Reminders</span> ' + reminder + '</li>');
                    notificationCount++;
                });
                updateNotificationBadge();
            }
        }

        updateSuggestions(); // Initial call to update suggestions
        updateReminders(); // Initial call to update reminders
    });

</script>


<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: '<?php echo $_SESSION['status_icon'] ?>',
                title: '<?php echo $_SESSION['status'] ?>',
                confirmButtonColor: 'rgb(0, 0, 0)',
                confirmButtonText: 'Okay'
            });
            <?php unset($_SESSION['status']); ?>
        })
    </script>

<?php
} else {
    unset($_SESSION['status']);
}
?>