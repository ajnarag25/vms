<?php  
    include('../functions/connection.php');
    session_start();
    if (!isset($_SESSION['volunteer'])) {
        header("Location: ../index.php");
    }
?>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<link href="../assets/logo.png" rel="icon">
<link href="../css/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/custom_style.css">
<link rel="stylesheet" type="text/css" href="../css/datatable.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&family=Sofia+Sans:wght@400&display=swap"
    rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<link rel="stylesheet"
    href="https://unpkg.com/bs-brain@2.0.3/components/calendars/calendar-1/assets/css/calendar-1.css">