<?php
include('connection.php');
include('currentdatetime.php');

if (isset($_GET['logout'])) {
    // data for logout session

    $logout_time = $_SESSION['login_time'];
    $volunteer_id = $_SESSION['id'];
    $username = $_SESSION['username'];

    $selectData = "SELECT * FROM volunteer_logtime WHERE logout_time='' AND volunteer_id ='$volunteer_id' AND username ='$username'";
    $logout = mysqli_query($conn, $selectData);
    $getData = mysqli_fetch_array($logout);
    if ($getData != null) {
        $update_sql = "UPDATE volunteer_logtime SET logout_time='$logout_time' WHERE logout_time='' AND volunteer_id ='$volunteer_id' AND username ='$username'";
        $conn->query($update_sql) or die($conn->error);
        session_destroy();
        header('location: ../index.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $postData = file_get_contents('php://input');
    $eventData = json_decode($postData, true);

    if ($eventData) {
        $action = $eventData['action'];
        if ($action == 'save') {
            $title = $eventData['eventData']['title'];
            $start = $eventData['eventData']['start'];
            $end = $eventData['eventData']['end'];
            $allday = $eventData['eventData']['allDay'];

            $conn->query("INSERT INTO events (title, startdate, enddate, allday) 
                VALUES('$title', '$start', '$end', '$allday')") or die($conn->error);

            echo "Saved Successfully";
        } elseif ($action == 'update') {
            $id = $eventData['eventData']['updtId'];
            $title = $eventData['eventData']['title'];
            $start = $eventData['eventData']['start'];
            $end = $eventData['eventData']['end'];
            $allday = $eventData['eventData']['allDay'];

            $conn->query("UPDATE events SET  title = '$title', startdate = '$start',
                enddate = '$end', allday = '$allday' WHERE id =" . $id) or die($conn->error);

            echo 'Updated Successfully';
        } else {
            $id = $eventData['eventData']['delId'];
            $conn->query("DELETE FROM events WHERE id='$id'") or die($conn->error);
            echo 'Deleted Successfully';
        }
    } else {
        http_response_code(400);
        echo "Bad Request";
    }
}
