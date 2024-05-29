<script src="../js/jquery.js"></script>
<script src="../js/sweetalert.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/scripts.js"></script>
<script src="../js/datatable.js"></script>
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.9/index.global.min.js"></script>
<script src="https://unpkg.com/bs-brain@2.0.3/components/calendars/calendar-1/assets/controller/calendar-1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $('#GSTable').DataTable()
    $('#Sponsors').DataTable()
    $('#Agenda').DataTable()
    $('#SponsorT').DataTable()
    $('#tb').DataTable()
    $('#Accounts').DataTable()
    $('#Volunteers').DataTable()
    $('#VolunteersEvent').DataTable()
    $('#VolunteersPart').DataTable()
    $('#VolunteersSponsor').DataTable()
    $('#Taskbacklog').DataTable()
    $('#Announcements').DataTable()
</script>

<!--RANDOM SUGGESTIONS--->
<script>
    $(document).ready(function() {

        function getRandomSuggestion() {
            const suggestions = [
                "Learn to adapt to changing circumstances.",
                "Celebrate small wins, this boost motivation and helps maintain positive mindset.",
                "You can always add more volunteers to work on the same task/ticket if needed.",
                "Multitasking can lead to errors and increased stress."
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

</script>

<!-- CONDITIONS -->
<?php 
    // Check all volunteer ask tickets
    $queryAsk = "SELECT * FROM tickets WHERE ticket_type = 'Ask Ticket' AND ticket_status = ''";
    $resultAsk = mysqli_query($conn, $queryAsk);
    $volunteer_count_ask = 0;
    while ($rowAsk = mysqli_fetch_array($resultAsk)) {
        $volunteer_count_ask++;
    }

    // Check if the volunteer have a ticket deadline that is within the week or has passed
    $queryDeadline = "SELECT * FROM tickets WHERE ticket_status != 'Completed'";
    $resultDeadline = mysqli_query($conn, $queryDeadline);

    $currentDate = new DateTime(); // Current date
    $startOfWeek = (clone $currentDate)->modify('monday this week'); // Start of the week
    $endOfWeek = (clone $startOfWeek)->modify('sunday this week'); // End of the week

    $reminder_deadline = '';

    while ($rowDeadline = mysqli_fetch_array($resultDeadline)) {

        $ticketDeadline = new DateTime($rowDeadline['ticket_deadline']);
        $ticketTitle = $rowDeadline['ticket_title'];
        $ticket_event = $rowDeadline['event_id'];

        $queryEventDl = "SELECT * FROM events WHERE id = '$ticket_event'";
        $resultEventDl = mysqli_query($conn, $queryEventDl);

        while ($rowEventDl = mysqli_fetch_array($resultEventDl)) {
            $event_title = $rowEventDl['title'];
        }
        // Check if the deadline is within this week
        if ($ticketDeadline >= $startOfWeek && $ticketDeadline <= $endOfWeek) {
            // Calculate days left until the deadline
            $daysLeft = $currentDate->diff($ticketDeadline)->days;

            // If needed, check if the deadline is in the past or future
            if ($ticketDeadline > $currentDate) {
                $reminder_deadline .= "A ticket for this event '" . $event_title . "' that is nearly on its deadline is not completed and it has " . $daysLeft . " day/s left until the deadline. You can add more volunteers to work on completing the same ticket.";

            } else {
                $reminder_deadline .= "The deadline for the ticket '$ticketTitle' is today or has passed. ";
            }
        }
        
    }

    // Check if there's an event tommorrow
    $queryEvent = "SELECT * FROM events";
    $resultEvent = mysqli_query($conn, $queryEvent);
    $tomorrow = (new DateTime('tomorrow'))->format('Y-m-d');
    $hasEventTomorrow = false;
    $dateOnlyDebug = [];

    while ($rowEvent = mysqli_fetch_array($resultEvent)) {
        $dateTime = new DateTime($rowEvent['enddate']);
        $dateOnly = $dateTime->format('Y-m-d');
        
        $dateOnlyDebug[] = $dateOnly;
        if ($dateOnly === $tomorrow) {
            $hasEventTomorrow = true;
            break;
        }
        
    }

    // Get all volunteers
    $queryVolunteers = "SELECT id, name FROM accounts WHERE type = 'volunteer'";
    $resultVolunteers = mysqli_query($conn, $queryVolunteers);
    
    if ($resultVolunteers) {
        $volunteerTickets = [];
    
        while ($rowVolunteer = mysqli_fetch_assoc($resultVolunteers)) {
            $volunteerId = $rowVolunteer['id'];
            
            // Check the number of to-do tickets for each volunteer
            $queryTodoCount = "
                SELECT COUNT(*) AS todo_count 
                FROM tickets 
                WHERE ticket_status = 'To-Do' AND FIND_IN_SET('$volunteerId', ticket_volunteers_id)";
            $resultTodoCount = mysqli_query($conn, $queryTodoCount);
            
            if ($resultTodoCount) {
                $todoCountRow = mysqli_fetch_assoc($resultTodoCount);
                $todoCount = $todoCountRow['todo_count'];
                
                // Add volunteer and their to-do count to the array
                $volunteerTickets[] = [
                    'id' => $volunteerId,
                    'name' => $rowVolunteer['name'],
                    'todo_count' => $todoCount
                ];
    
                mysqli_free_result($resultTodoCount);
            }
        }
    
        mysqli_free_result($resultVolunteers);
    
        // Sort volunteers by the number of to-do tickets in descending order
        usort($volunteerTickets, function($a, $b) {
            return $b['todo_count'] - $a['todo_count'];
        });
    
        // Determine the volunteer with the most to-do tickets
        $topVolunteer = $volunteerTickets[0];
        $volTodo = "This Volunteer: " . $topVolunteer['name'] . " - To-Do Tickets: " . $topVolunteer['todo_count'] . " (Has the most to-do tickets)";
    
        // Determine the minimum to-do ticket count
        $minTodoCount = min(array_column($volunteerTickets, 'todo_count'));
    
        // Display volunteers with the minimum to-do ticket count
        // foreach ($volunteerTickets as $volunteer) {
        //     if ($volunteer['todo_count'] == $minTodoCount) {
        //         echo "Volunteer Name: " . $volunteer['name'] . " - To-Do Tickets: " . $volunteer['todo_count'] . "<br>";
        //     }
        // }
    }
    
    date_default_timezone_set('Asia/Manila');

    $fixedHolidays = [
        '01-01' => 'New Year\'s Day',
        '04-09' => 'Araw ng Kagitingan',
        '05-01' => 'Labor Day',
        '06-12' => 'Independence Day',
        '08-21' => 'Ninoy Aquino Day',
        '08-28' => 'National Heroes Day',
        '11-01' => 'All Saints\' Day',
        '11-30' => 'Bonifacio Day',
        '12-25' => 'Christmas Day',
        '12-30' => 'Rizal Day',
        '12-31' => 'New Year\'s Eve',
    ];
    
    // Define a function to calculate movable holidays (e.g., Easter Sunday, which is used to calculate other holidays like Holy Week)
    function getMovableHolidays($year) {
        // Calculate Easter Sunday
        $easter = new DateTime();
        $easter->setTimestamp(easter_date($year));
    
        // Calculate Good Friday (2 days before Easter Sunday)
        $goodFriday = clone $easter;
        $goodFriday->modify('-2 days');
    
        // Calculate Maundy Thursday (3 days before Easter Sunday)
        $maundyThursday = clone $easter;
        $maundyThursday->modify('-3 days');
    
        return [
            $goodFriday->format('m-d') => 'Good Friday',
            $maundyThursday->format('m-d') => 'Maundy Thursday',
        ];
    }
    
    // Get today's date
    $today = date('m-d');
    $year = date('Y');
    
    $movableHolidays = getMovableHolidays($year);
    $holidays = array_merge($fixedHolidays, $movableHolidays);
    
    // Check if today is a holiday
    $holidayReminder = '';
    if (isset($holidays[$today])) {
        $holidayReminder = "Today is a holiday: " . $holidays[$today]. " so the intensity of the task completion will be affected";
    }

?>

<!-- REMINDERS -->
<script>
    $(document).ready(function() {
        function getReminders() {
            const volunteerAsk = <?php echo $volunteer_count_ask; ?>;
            const reminders = [];

            if (volunteerAsk > 0) {
                reminders.push('There are ' + volunteerAsk + ' tickets that are send by the volunteers.');
            }

            <?php if ($hasEventTomorrow): ?>
                reminders.push('You have to rest well for the upcoming event tommorrow.');
            <?php endif; ?>

            <?php if (!empty($reminder_deadline)): ?>
                reminders.push('<?php echo addslashes($reminder_deadline); ?>');
            <?php endif; ?>

            <?php if (!empty($volTodo)): ?>
                reminders.push('<?php echo addslashes($volTodo); ?>');
            <?php endif; ?>
            
            <?php if (!empty($holidayReminder)): ?>
                reminders.push('<?php echo addslashes($holidayReminder); ?>');
            <?php endif; ?>

            return reminders[Math.floor(Math.random() * reminders.length)];
        }

        function updateReminders() {
            const newReminder = getReminders();

            // Check if newReminder is not empty before updating the toast
            if (newReminder) {
                $('#liveToast2 .toast-body2').text(newReminder);
                var toastEl = document.getElementById('liveToast2');
                var toast = new bootstrap.Toast(toastEl);
                toast.show();
            }

            const minInterval = 50000; // minimum interval in milliseconds
            const maxInterval = 100000; // maximum interval in milliseconds
            const randomInterval = Math.floor(Math.random() * (maxInterval - minInterval + 1)) + minInterval;

            setTimeout(updateReminders, randomInterval);
        }

        function viewTickets() {
            window.location.href = './team_dashboard.php';
        }

        updateReminders();
    });
</script>

<script>
    $(document).ready(function() {
        $('#view-suggested-volunteer1').on('click', function() {
            var suggestionMessage = `<?php echo $suggestionMessage; ?>`;
            $('#suggestion-body').html(suggestionMessage);
            var toastElement = $('#suggestedVol')[0];
            var toast = new bootstrap.Toast(toastElement);
            toast.show();
        });
        $('#view-suggested-volunteer2').on('click', function() {
            var suggestionMessage = `<?php echo $suggestionMessage; ?>`;
            $('#suggestion-body').html(suggestionMessage);
            var toastElement = $('#suggestedVol')[0];
            var toast = new bootstrap.Toast(toastElement);
            toast.show();
        });
        $('#view-suggested-volunteer3').on('click', function() {
            var suggestionMessage = `<?php echo $suggestionMessage; ?>`;
            $('#suggestion-body').html(suggestionMessage);
            var toastElement = $('#suggestedVol')[0];
            var toast = new bootstrap.Toast(toastElement);
            toast.show();
        });
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