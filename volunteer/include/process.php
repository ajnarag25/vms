<?php 
    include('connection.php');
    session_start();

    if (isset($_GET['logout'])) {
        session_destroy();
        header('location: ../index.php');
    }   

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $postData = file_get_contents('php://input');
        $eventData = json_decode($postData, true);

        if($eventData){
            $action = $eventData['action'];
            if($action == 'save'){
                $title = $eventData['eventData']['title'];
                $start = $eventData['eventData']['start'];
                $end = $eventData['eventData']['end'];
                $allday = $eventData['eventData']['allDay'];

                $conn->query("INSERT INTO events (title, startdate, enddate, allday) 
                VALUES('$title', '$start', '$end', '$allday')") or die($conn->error);

                echo "Saved Successfully";
            }else{
                $id = $eventData['eventData']['delId'];
                $conn->query("DELETE FROM events WHERE id='$id'") or die($conn->error);
                echo 'Deleted Successfully';
            }
            
        }else{
            http_response_code(400);
            echo "Bad Request";
        }
        
    }   


?>