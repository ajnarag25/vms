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

        echo $postData;
      

        exit();

        if($eventData){
            $title = $eventData['title'];
            $start = $eventData['start'];
            $end = $eventData['end'];
            $allday = $eventData['allDay'];

            $conn->query("INSERT INTO events (title, startdate, enddate, allday) 
            VALUES('$title', '$start', '$end', '$allday')") or die($conn->error);

            echo "Saved Successfully";
        }else{
            http_response_code(400);
            echo "Bad Request";
        }
        
    }   


?>