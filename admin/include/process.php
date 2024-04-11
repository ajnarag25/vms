<?php 
    include('connection.php');
    session_start();

    // LOGOUT
    if (isset($_GET['logout'])) {
        session_destroy();
        header('location: ../index.php');
    }   

    // AJAX REQUEST EVENTS
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

                $conn->query("INSERT INTO events (title, startdate, enddate, allday, description) 
                VALUES('$title', '$start', '$end', '$allday', '')") or die($conn->error);

                $inserted_id = $conn->insert_id;

                $response = array(
                    'id' => $inserted_id,
                    'title' => $title,
                    'start' => $start,
                    'end' => $end,
                    'allday' => $allday
                );

                $json_response = json_encode($response);
                echo $json_response;

            }elseif($action == 'update'){
                $id = $eventData['eventData']['updtId'];
                $title = $eventData['eventData']['title'];
                $start = $eventData['eventData']['start'];
                $end = $eventData['eventData']['end'];
                $allday = $eventData['eventData']['allDay'];

                $conn->query("UPDATE events SET  title = '$title', startdate = '$start',
                enddate = '$end', allday = '$allday' WHERE id =". $id) or die($conn->error);

                echo 'Updated Successfully';
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

    // SAVE EVENT
    if (isset($_POST['save_event'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $allday = $_POST['allday'];
        $desc = $_POST['desc'];

        if (!empty($id)) {

            $conn->query("UPDATE events SET  title = '$title', startdate = '$start',
            enddate = '$end', allday = '$allday', description = '$desc' WHERE id =" . $id) or die($conn->error);
        
            $_SESSION['status'] = 'Successfully Saved';
            $_SESSION['status_icon'] = 'success';
            header('location:../set_event.php');
        } else {
            $_SESSION['status'] = 'An Error Occured!';
            $_SESSION['status_icon'] = 'error';
            header('location:../event_plan.php');
        }
    }


?>