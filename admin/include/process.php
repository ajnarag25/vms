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
            if($action == 'saveEvent'){
                $event_id = $eventData['eventData']['event_id'];
                $title = $eventData['eventData']['title'];
                $start = $eventData['eventData']['start'];
                $end = $eventData['eventData']['end'];
                $allday = $eventData['eventData']['allDay'];

                $conn->query("INSERT INTO events (event_id, title, startdate, enddate, allday, description) 
                VALUES('$event_id' ,'$title', '$start', '$end', '$allday', '')") or die($conn->error);

                $inserted_id = $conn->insert_id;

                $response = array(
                    'id' => $inserted_id,
                    'event_id' => $event_id,
                    'title' => $title,
                    'start' => $start,
                    'end' => $end,
                    'allday' => $allday
                );

                $json_response = json_encode($response);
                echo $json_response;

            }elseif($action == 'savePart'){
                $event_id = $eventData['eventData']['event_id'];
                $title = $eventData['eventData']['title'];
                $start = $eventData['eventData']['start'];
                $end = $eventData['eventData']['end'];
                $allday = $eventData['eventData']['allDay'];

                $sql = "SELECT event_id FROM events WHERE event_id='$event_id'";
                $result = mysqli_query($conn, $sql);

                if ($result->num_rows > 0) {
                    echo 'Existing event';
                }else{
                    $conn->query("INSERT INTO events (event_id, title, startdate, enddate, allday, description) 
                    VALUES('$event_id' ,'$title', '$start', '$end', '$allday', '')") or die($conn->error);
                    $inserted_id = $conn->insert_id;
                    $response = array(
                        'id' => $inserted_id,
                        'event_id' => $event_id,
                        'title' => $title,
                        'start' => $start,
                        'end' => $end,
                        'allday' => $allday
                    );

                    $json_response = json_encode($response);
                    echo $json_response;

                }

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
        $event_id = $_POST['event_id'];
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $allday = $_POST['allday'];
        $desc = $_POST['desc'];

        if (!empty($id)) {
            $sql = "UPDATE events SET title = ?, startdate = ?, enddate = ?, allday = ?, description = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $title, $start, $end, $allday, $desc, $id);
            $stmt->execute();
            $stmt->close();

            $url = 'event_plan.php?id=' . urlencode($id) .
                    '&event_id=' . urlencode($event_id) .
                    '&allday=' . urlencode($allday) .
                    '&title=' . urlencode($title) .
                    '&start=' . urlencode($start) .
                    '&end=' . urlencode($end) .
                    '&desc=' . urlencode($desc);

            $_SESSION['status'] = 'Successfully Saved';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../' . $url);
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../event_plan.php');
            exit();
        }
    }


?>