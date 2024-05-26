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