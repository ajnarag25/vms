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
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

        <!-- ================================================================================================= -->
        <!-- for suggestion function and display -->
        <div class="dropdown">
            <a class="btn text-white notification-icon" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" title="Suggestions">
                <i class="bi bi-robot fs-5"></i>
                <span class="notification-badge" id="notificationBadge">2</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end p-3 dropdown-menu-scrollable" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#"><span class="badge-new">New</span>
                        Celebrate small wins, this boost motivation and helps maintain positive mindset.
                    </a></li>
                <li><a class="dropdown-item" href="#"><span class="badge-new">New</span>
                        Learn to adapt to changing circumstances.
                    </a></li>
                <li><a class="dropdown-item" href="#">
                        "(volunteer name)" set an unavailability within this event's planning duration so it is
                        important to add a volunteer for this ticket to maintain completion intensity.
                    </a></li>
                <li><a class="dropdown-item" href="#">
                        Multitasking can lead to errors and increased stress.
                    </a></li>
                <li><a class="dropdown-item" href="#">
                        Multitasking can lead to errors and increased stress.
                    </a></li>
                <li><a class="dropdown-item" href="#">
                        Multitasking can lead to errors and increased stress.
                    </a></li>
                <li><a class="dropdown-item" href="#">
                        Multitasking can lead to errors and increased stress.
                    </a></li>
            </ul>
        </div>
        <!-- end of suggestion function div -->
        <!-- ================================================================================================== -->

        <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
        <!-- <a class="btn text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
            title="Notification" href="#!"><i class="fa fa-bell"></i></a> -->
        <ul class="dropdown-menu dropdown-menu-end p-3" aria-labelledby="navbarDropdown">
            <p>No Available Notification</p>
        </ul>
        <a href="accounts.php" class="btn text-white" title="Profile" href="#!"><i class="fa fa-user"></i></a>
        <a href="my_account.php" class="btn text-white" title="Settings" href="#!"><i
                class="fa-regular fa-id-card"></i></a>
        <a href="include/process.php?logout" class="btn text-white" title="Log out" href="#!"><i
                class="fa fa-power-off"></i></a>

    </ul>
</nav>