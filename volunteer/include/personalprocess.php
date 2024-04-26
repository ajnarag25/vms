<?php
include('connection.php');
include('currentdatetime.php');

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

            $conn->query("INSERT INTO personal_agenda (title, startdate, enddate, allday) 
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
            $conn->query("DELETE FROM personal_agenda WHERE id='$id'") or die($conn->error);
            echo 'Deleted Successfully';
        }
    } else {
        http_response_code(400);
        echo "Bad Request";
    }
}
