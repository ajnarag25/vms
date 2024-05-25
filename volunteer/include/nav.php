<nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
    <style>
    .notification-icon {
        position: relative;
    }

    .notification-badge {
        position: absolute;
        top: 0;
        right: 0;
        transform: translate(10%, 0%);
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 0.1rem 0.4rem;
        font-size: 0.6rem;
    }

    .badge-new {
        background-color: #28a745;
        /* Bootstrap's 'success' color */
        color: white;
        border-radius: 0.2rem;
        padding: 0.2rem 0.4rem;
        font-size: 0.6rem;
        margin-left: -1.0rem;
        margin-right: 0.1rem;
    }

    .dropdown-menu-scrollable {
        max-height: 200px;
        max-width: 1080px;
        /* Adjust the maximum height as needed */
        overflow-y: auto;
        /* Enable vertical scrolling */
    }
    </style>
        <a class="navbar-brand ps-3" href="#"> <img src="../assets/logo.png" width="40" alt=""> VMS </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <!-- <div class="dropdown">
                <a class="btn text-white notification-icon" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" title="Suggestions">
                    <i class="bi bi-robot fs-5"></i>
                    <span class="notification-badge" id="notificationBadge">0</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end p-3 dropdown-menu-scrollable" aria-labelledby="navbarDropdown" id="suggestionsDropdown">
                    <li><a class="dropdown-item" href="#"><span class="badge-new">New</span> You have been working for 2 hours, consider taking a short break.</a></li>
                </ul>
            </div> -->
            <a href="personal_page.php" class="btn text-white" title="Personal Page"><i class="fa fa-user"></i></a>
            <a class="btn text-white" title="My Account" href="my_account.php"><i class="fa-regular fa-id-card"></i></a>
            <a href="include/process.php?logout" class="btn text-white" title="Log out"><i class="fa fa-power-off"></i></a>
        </ul>

        <script src="../js/jquery.js"></script>
        <script>
         $(document).ready(function() {
            $('#navbarDropdown').on('click', function() {
                $('#notificationBadge').hide();
            });

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
                // $('#suggestionsDropdown').append(`<li><a class="dropdown-item" href="#"><span class="badge-new">New</span> ${newSuggestion}</a></li>`);
                // $('#notificationBadge').text(parseInt($('#notificationBadge').text()) + 1).show();
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
    </ul>

</nav>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="fa-solid fa-robot" style="margin-right: 5px"></i>
            <strong class="me-auto">Suggestion</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-dark text-white">
            <!-- SUGGESTION GOES HERE -->
        </div>
    </div>
</div>
