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

                $sql = "SELECT * FROM events WHERE startdate='$start' AND enddate='$end'";
                $result = mysqli_query($conn, $sql);

                if(!$result->num_rows > 0){
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
                }else{
                    echo 'Existing Event';
                }


            }
            // elseif($action == 'savePart'){
            //     $event_id = $eventData['eventData']['event_id'];
            //     $title = $eventData['eventData']['title'];
            //     $start = $eventData['eventData']['start'];
            //     $end = $eventData['eventData']['end'];
            //     $allday = $eventData['eventData']['allDay'];
            //     $desc = $eventData['eventData']['desc'];

            //     echo $start;
            //     echo $end;

            //     exit(); 
            //     $sql = "SELECT event_id FROM events WHERE event_id='$event_id'";
            //     $result = mysqli_query($conn, $sql);

            //     if ($result->num_rows > 0) {
            //         echo 'Existing event';
            //     }else{
            //         $conn->query("INSERT INTO events (event_id, title, startdate, enddate, allday, description) 
            //         VALUES('$event_id' ,'$title', '$start', '$end', '$allday', '$desc')") or die($conn->error);
            //         $inserted_id = $conn->insert_id;
            //         $response = array(
            //             'id' => $inserted_id,
            //             'event_id' => $event_id,
            //             'title' => $title,
            //             'start' => $start,
            //             'end' => $end,
            //             'allday' => $allday,
            //             'desc' => $desc
            //         );

            //         $json_response = json_encode($response);
            //         echo $json_response;

            //     }

            // }
            elseif($action == 'update'){
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
            // echo "Bad Request";
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

    // ADD PART
    if (isset($_POST['addPart'])) {
        $part_name = $_POST['part_name'];
        $desc = $_POST['desc'];
        $gv_people = $_POST['gv_people'];
        $volunteer = $_POST['volunteer'];
        $from = $_POST['from'];
        $to = $_POST['to'];

        $main_id = $_POST['main_id'];
        $main_title = $_POST['main_title'];
        $main_start = $_POST['main_start'];
        $main_end = $_POST['main_end'];
        $main_allday = $_POST['main_allday'];
        $main_desc = $_POST['main_desc'];

        date_default_timezone_set('UTC');

        $main_start_utc = strtotime($main_end . ' UTC');

        $utc_offset = '+08:00'; 
        
        $start = date('Y-m-d\TH:i:s', strtotime($from . ' ' . $utc_offset, $main_start_utc)) . '.000Z';
        $end = date('Y-m-d\TH:i:s', strtotime($to . ' ' . $utc_offset, $main_start_utc)) . '.000Z';

        if (!empty($part_name) && !empty($from) && !empty($to)) {

            $conn->query("INSERT INTO events (event_id, title, startdate, enddate, allday, description) 
            VALUES('$main_id' ,'$part_name', '$start', '$end', '', '$desc')") or die($conn->error);

            $url = 'event_plan.php?id=' . urlencode($main_id) .
            '&allday=' . urlencode($main_allday) .
            '&title=' . urlencode($main_title) .
            '&start=' . urlencode($main_start) .
            '&end=' . urlencode($main_end) .
            '&desc=' . urlencode($main_desc);

            $_SESSION['status'] = 'Add Part Successfully Saved';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../' . $url);
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../event_plan.php');
            exit();
        }
    }

    
    // ADD TICKET
    if (isset($_POST['addTicketPart'])) {
        $ticket_title = $_POST['ticket_title'];
        $ticket_desc = $_POST['ticket_desc'];
        $ticket_type = 'Event Part';

        $main_id = $_POST['main_id'];
        $main_event_id = $_POST['main_event_id'];
        $main_title = $_POST['main_title'];
        $main_start = $_POST['main_start'];
        $main_end = $_POST['main_end'];
        $main_allday = $_POST['main_allday'];
        $main_desc = $_POST['main_desc'];

        if (!empty($ticket_title)) {

            $conn->query("INSERT INTO tickets (event_id, start, end, ticket_title, ticket_desc, ticket_type) 
            VALUES('$main_id' ,'$main_start', '$main_end', '$ticket_title', '$ticket_desc', '$ticket_type')") or die($conn->error);

            $url = 'event_plan.php?id=' . urlencode($main_id) .
            '&event_id=' . urlencode($main_event_id) .
            '&allday=' . urlencode($main_allday) .
            '&title=' . urlencode($main_title) .
            '&start=' . urlencode($main_start) .
            '&end=' . urlencode($main_end) .
            '&desc=' . urlencode($main_desc);

            $_SESSION['status'] = 'Ticket Successfully Saved';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../' . $url);
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../event_plan.php');
            exit();
        }
    }

    if (isset($_POST['addTicketSponsor'])) {
        $ticket_title = $_POST['ticket_title'];
        $ticket_desc = $_POST['ticket_desc'];
        $ticket_type = 'Sponsor';

        $main_id = $_POST['main_id'];
        $main_event_id = $_POST['main_event_id'];
        $main_title = $_POST['main_title'];
        $main_start = $_POST['main_start'];
        $main_end = $_POST['main_end'];
        $main_allday = $_POST['main_allday'];
        $main_desc = $_POST['main_desc'];

        if (!empty($ticket_title)) {

            $conn->query("INSERT INTO tickets (event_id, start, end, ticket_title, ticket_desc, ticket_type) 
            VALUES('$main_id' ,'$main_start', '$main_end', '$ticket_title', '$ticket_desc', '$ticket_type')") or die($conn->error);

            $url = 'event_plan.php?id=' . urlencode($main_id) .
            '&event_id=' . urlencode($main_event_id) .
            '&allday=' . urlencode($main_allday) .
            '&title=' . urlencode($main_title) .
            '&start=' . urlencode($main_start) .
            '&end=' . urlencode($main_end) .
            '&desc=' . urlencode($main_desc);

            $_SESSION['status'] = 'Ticket Successfully Saved';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../' . $url);
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../event_plan.php');
            exit();
        }
    }

    if (isset($_POST['addTicketEvent'])) {
        $ticket_title = $_POST['ticket_title'];
        $ticket_desc = $_POST['ticket_desc'];
        $ticket_type = 'Event';

        $main_id = $_POST['main_id'];
        $main_event_id = $_POST['main_event_id'];
        $main_title = $_POST['main_title'];
        $main_start = $_POST['main_start'];
        $main_end = $_POST['main_end'];
        $main_allday = $_POST['main_allday'];
        $main_desc = $_POST['main_desc'];

        if (!empty($ticket_title)) {

            $conn->query("INSERT INTO tickets (event_id, start, end, ticket_title, ticket_desc, ticket_type) 
            VALUES('$main_id' ,'$main_start', '$main_end', '$ticket_title', '$ticket_desc', '$ticket_type')") or die($conn->error);

            $url = 'event_plan.php?id=' . urlencode($main_id) .
            '&event_id=' . urlencode($main_event_id) .
            '&allday=' . urlencode($main_allday) .
            '&title=' . urlencode($main_title) .
            '&start=' . urlencode($main_start) .
            '&end=' . urlencode($main_end) .
            '&desc=' . urlencode($main_desc);

            $_SESSION['status'] = 'Ticket Successfully Saved';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../' . $url);
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../event_plan.php');
            exit();
        }
    }

    // DELETE TICKET
    if (isset($_POST['delTicket'])) {
        $id = $_POST['ticket_id'];

        $main_id = $_POST['main_id'];
        $main_event_id = $_POST['main_event_id'];
        $main_title = $_POST['main_title'];
        $main_start = $_POST['main_start'];
        $main_end = $_POST['main_end'];
        $main_allday = $_POST['main_allday'];
        $main_desc = $_POST['main_desc'];

        if (!empty($id)) {

            $conn->query("DELETE FROM tickets WHERE id='$id'") or die($conn->error);

            $url = 'event_plan.php?id=' . urlencode($main_id) .
            '&event_id=' . urlencode($main_event_id) .
            '&allday=' . urlencode($main_allday) .
            '&title=' . urlencode($main_title) .
            '&start=' . urlencode($main_start) .
            '&end=' . urlencode($main_end) .
            '&desc=' . urlencode($main_desc);

            $_SESSION['status'] = 'Ticket Successfully Deleted';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../' . $url);
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../event_plan.php');
            exit();
        }
    }

    // ADD GUEST / SPONSORS
    if (isset($_POST['addGS'])) {
        
        $type = $_POST['type'];
        $gs_name = $_POST['gs_name'];
        $position = $_POST['position'];
        $company = $_POST['company'];

        $sql = "SELECT * FROM guest_sponsors WHERE type='$type' AND name='$gs_name' AND position='$position' AND company='$company'";
        $result = mysqli_query($conn, $sql);

        if(!$result->num_rows > 0){
            if (!empty($gs_name)) {

                $conn->query("INSERT INTO guest_sponsors (name, type, position, company, status) 
                VALUES('$gs_name' ,'$type', '$position', '$company', 'New')") or die($conn->error);
    
                $_SESSION['status'] = 'Successfully Added';
                $_SESSION['status_icon'] = 'success';
                header('Location: ../guest_sponsors.php');
            } else {
                $_SESSION['status'] = 'An Error Occurred!';
                $_SESSION['status_icon'] = 'error';
                header('Location: ../guest_sponsors.php');
                exit();
            }
        }else{
            $_SESSION['status'] = 'Guest / Sponsors Already Existing!';
            $_SESSION['status_icon'] = 'warning';
            header('location:../guest_sponsors.php');
        }
    
    }

    // ADD SPONSORS
    if (isset($_POST['addSponsor'])) {
        $sponsor_id = $_POST['sponsor_id'];
        $sponsor = $_POST['sponsor'];
        // $part_id = $_POST['part_id'];

        $main_id = $_POST['main_id'];
        $main_event_id = $_POST['main_event_id'];
        $main_title = $_POST['main_title'];
        $main_start = $_POST['main_start'];
        $main_end = $_POST['main_end'];
        $main_allday = $_POST['main_allday'];
        $main_desc = $_POST['main_desc'];

        if (!empty($main_id)) {
            $result = $conn->query("SELECT sponsors_id, sponsors FROM events WHERE id = $main_id");
            $row = $result->fetch_assoc();
            $currentSponsors_id = $row['sponsors_id'];
            $currentSponsors = $row['sponsors'];

            $url = 'event_plan.php?id=' . urlencode($main_id) .
            '&event_id=' . urlencode($part_id) .
            '&allday=' . urlencode($main_allday) .
            '&title=' . urlencode($main_title) .
            '&start=' . urlencode($main_start) .
            '&end=' . urlencode($main_end) .
            '&desc=' . urlencode($main_desc);

            if (strpos($currentSponsors_id, $sponsor_id) !== false) {
                $_SESSION['status'] = 'Sponsor already existing';
                $_SESSION['status_icon'] = 'warning';
                header('Location: ../'. $url);
                exit();
            }

            if ($currentSponsors && $currentSponsors_id) {
                $updatedSponsors_id = $currentSponsors_id . ', ' . $sponsor_id;
                $updatedSponsors = $currentSponsors . ', ' . $sponsor;
            } else {
                $updatedSponsors_id = $sponsor_id;
                $updatedSponsors = $sponsor;
            }

            $conn->query("UPDATE events SET sponsors_id = '$updatedSponsors_id', sponsors = '$updatedSponsors' WHERE id = $main_id") or die($conn->error);

            $_SESSION['status'] = 'Successfully Added Sponsor';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../' . $url);
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../event_plan.php');
            exit();
        }
    }

    // DELETE SPONSORS
    if (isset($_POST['delSponsor'])) {
        $sponsor_id = $_POST['sponsor_id'];
        $sponsor = $_POST['sponsor'];
    
        $main_id = $_POST['main_id'];
        $main_event_id = $_POST['main_event_id'];
        $main_title = $_POST['main_title'];
        $main_start = $_POST['main_start'];
        $main_end = $_POST['main_end'];
        $main_allday = $_POST['main_allday'];
        $main_desc = $_POST['main_desc'];
    
        if (!empty($main_id)) {
            $result = $conn->query("SELECT sponsors_id, sponsors FROM events WHERE id = $main_id");
            $row = $result->fetch_assoc();
            $currentSponsors_id = $row['sponsors_id'];
            $currentSponsors = $row['sponsors'];
    
            $url = 'event_plan.php?id=' . urlencode($main_id) .
                '&event_id=' . urlencode($part_id) .
                '&allday=' . urlencode($main_allday) .
                '&title=' . urlencode($main_title) .
                '&start=' . urlencode($main_start) .
                '&end=' . urlencode($main_end) .
                '&desc=' . urlencode($main_desc);
    

            $currentSponsorIds = explode(',', $currentSponsors_id);
            $currentSponsorsNames = explode(',', $currentSponsors);
    
            $key = array_search($sponsor_id, $currentSponsorIds);
    
            if ($key !== false) {
                unset($currentSponsorIds[$key]);
                unset($currentSponsorsNames[$key]);
            }
    
            $updatedSponsors_id = implode(',', $currentSponsorIds);
            $updatedSponsors = implode(',', $currentSponsorsNames);
    
 
            $conn->query("UPDATE events SET sponsors_id = '$updatedSponsors_id', sponsors = '$updatedSponsors' WHERE id = $main_id") or die($conn->error);
    
            $_SESSION['status'] = 'Successfully Removed Sponsor';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../' . $url);
            exit();
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../event_plan.php');
            exit();
        }
    }
    
    // ADD DURATION
    if (isset($_POST['addDuration'])) {
        $id = $_POST['id'];
        $duration = $_POST['duration'];
        $current_end = $_POST['current_end'];

        $main_id = $_POST['main_id'];
        $main_event_id = $_POST['main_event_id'];
        $main_title = $_POST['main_title'];
        $main_start = $_POST['main_start'];
        $main_end = $_POST['main_end'];
        $main_allday = $_POST['main_allday'];
        $main_desc = $_POST['main_desc'];

        $current_end_date = new DateTime($current_end);
        $current_end_date->modify("+ $duration hours");
        $new_end_date = $current_end_date->format('Y-m-d\TH:i:s.000\Z');

        if (!empty($id)) {

            $conn->query("UPDATE events SET enddate = '$new_end_date' WHERE id = $id") or die($conn->error);

            $url = 'event_plan.php?id=' . urlencode($main_id) .
            '&event_id=' . urlencode($main_event_id) .
            '&allday=' . urlencode($main_allday) .
            '&title=' . urlencode($main_title) .
            '&start=' . urlencode($main_start) .
            '&end=' . urlencode($main_end) .
            '&desc=' . urlencode($main_desc);

            $_SESSION['status'] = 'Add Duration Successfully Saved';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../' . $url);
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../event_plan.php');
            exit();
        }
    }

    if (isset($_POST['delPart'])) {
        $id = $_POST['id'];

        $main_id = $_POST['main_id'];
        $main_event_id = $_POST['main_event_id'];
        $main_title = $_POST['main_title'];
        $main_start = $_POST['main_start'];
        $main_end = $_POST['main_end'];
        $main_allday = $_POST['main_allday'];
        $main_desc = $_POST['main_desc'];

        if (!empty($id)) {

            $conn->query("DELETE FROM events WHERE id='$id'") or die($conn->error);

            $url = 'event_plan.php?id=' . urlencode($main_id) .
            '&event_id=' . urlencode($main_event_id) .
            '&allday=' . urlencode($main_allday) .
            '&title=' . urlencode($main_title) .
            '&start=' . urlencode($main_start) .
            '&end=' . urlencode($main_end) .
            '&desc=' . urlencode($main_desc);

            $_SESSION['status'] = 'Part Event Successfully Deleted';
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