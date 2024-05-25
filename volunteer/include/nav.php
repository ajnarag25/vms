<nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
    <a class="navbar-brand ps-3" href="#"> <img src="../assets/logo.png" width="40" alt=""> VMS </a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <a href="personal_page.php" class="btn text-white" title="Personal Page"><i class="fa fa-user"></i></a>
        <a class="btn text-white" title="My Account" href="my_account.php"><i class="fa-regular fa-id-card"></i></a>
        <a href="include/process.php?logout" class="btn text-white" title="Log out"><i class="fa fa-power-off"></i></a>
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
