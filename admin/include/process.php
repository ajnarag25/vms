<?php 
    include('connection.php');
    session_start();
    error_reporting(0);

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
        $vl_tag = $_POST['vltag'];
        $volunteer = $_POST['volunteer'];
        $from = $_POST['from'];
        $to = $_POST['to'];

        $parts = explode(" ", $gv_people);

        $ids = $parts[0]; 
        $types = $parts[1];
        $names = $parts[2];

        $vl_ids = array();
        $vl_names = array();
        foreach ($vl_tag as $item) {
            $parts = explode(" ", $item, 2);
            $vl_ids[] = $parts[0];
            $vl_names[] = $parts[1];
        }
        
        $vl_idsString = implode(", ", $vl_ids);
        $vl_namesString = implode(", ", $vl_names);

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

        $url = 'event_plan.php?id=' . urlencode($main_id) .
        '&allday=' . urlencode($main_allday) .
        '&title=' . urlencode($main_title) .
        '&start=' . urlencode($main_start) .
        '&end=' . urlencode($main_end) .
        '&desc=' . urlencode($main_desc);

        if (!empty($part_name) && !empty($from) && !empty($to)) {

            if($types == 'volunteer'){
                $conn->query("INSERT INTO events (event_id, title, startdate, enddate, allday, description, volunteer, volunteer_id, volunteer_tag, volunteer_tag_id) 
                VALUES('$main_id' ,'$part_name', '$start', '$end', '', '$desc', '$names', '$ids', '$vl_namesString', '$vl_idsString')") or die($conn->error);

                $_SESSION['status'] = 'Add Part Successfully Saved';
                $_SESSION['status_icon'] = 'success';
                header('Location: ../' . $url);
            }else{
                $conn->query("INSERT INTO events (event_id, title, startdate, enddate, allday, description, guests, guests_id, volunteer_tag, volunteer_tag_id) 
                VALUES('$main_id' ,'$part_name', '$start', '$end', '', '$desc', '$names', '$ids', '$vl_namesString', '$vl_idsString')") or die($conn->error);
                
                $_SESSION['status'] = 'Add Part Successfully Saved';
                $_SESSION['status_icon'] = 'success';
                header('Location: ../' . $url);
            }
 
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../event_plan.php');
            exit();
        }
    }

    
    // ADD TICKET
    // PART
    if (isset($_POST['addTicketPart'])) {
        $ticket_title = $_POST['ticket_title'];
        $ticket_desc = $_POST['ticket_desc'];

        $ticket_admin = $_POST['ticket_admin'];
        $ticket_type = $_POST['ticket_type'];
        $volunteer_ids = $_POST['volunteer_id'];
        $partBtn = $_POST['partBtn'];
        $ticket_deadline = $_POST['ticket_deadline'];

        if($volunteer_ids){
            $volunteer_ids_str = implode(', ', $volunteer_ids);
        }else{
            $volunteer_ids_str = ' ';
        }
        
        $main_id = $_POST['main_id'];
        $main_event_id = $_POST['main_event_id'];
        $main_title = $_POST['main_title'];
        $main_start = $_POST['main_start'];
        $main_end = $_POST['main_end'];
        $main_allday = $_POST['main_allday'];
        $main_desc = $_POST['main_desc'];

        if (!empty($ticket_title)) {

            $conn->query("INSERT INTO tickets (event_id, start, end, ticket_title, ticket_desc, ticket_type, ticket_event, ticket_admin, ticket_deadline, ticket_priority, ticket_volunteers_id, ticket_status, ticket_comments, ticket_instructions, target_time, file_uploaded) 
            VALUES('$main_id' ,'$main_start', '$main_end', '$ticket_title', '$ticket_desc', '$ticket_type', '$main_title', '$ticket_admin', '$ticket_deadline', '$partBtn', '$volunteer_ids_str', 'Your-ticket', '', '', '', '')") or die($conn->error);

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

    // SPONSORS
    if (isset($_POST['addTicketSponsor'])) {
        $ticket_title = $_POST['ticket_title'];
        $ticket_desc = $_POST['ticket_desc'];

        $ticket_admin = $_POST['ticket_admin'];
        $ticket_type = $_POST['ticket_type'];
        $volunteer_ids = $_POST['volunteer_id'];
        $sponsorBtn = $_POST['sponsorBtn'];
        $ticket_deadline = $_POST['ticket_deadline'];

        if($volunteer_ids){
            $volunteer_ids_str = implode(', ', $volunteer_ids);
        }else{
            $volunteer_ids_str = ' ';
        }
        
        $main_id = $_POST['main_id'];
        $main_event_id = $_POST['main_event_id'];
        $main_title = $_POST['main_title'];
        $main_start = $_POST['main_start'];
        $main_end = $_POST['main_end'];
        $main_allday = $_POST['main_allday'];
        $main_desc = $_POST['main_desc'];

        if (!empty($ticket_title)) {

            $conn->query("INSERT INTO tickets (event_id, start, end, ticket_title, ticket_desc, ticket_type, ticket_event, ticket_admin, ticket_deadline, ticket_priority, ticket_volunteers_id, ticket_status, ticket_comments, ticket_instructions, target_time, file_uploaded) 
            VALUES('$main_id' ,'$main_start', '$main_end', '$ticket_title', '$ticket_desc', '$ticket_type', '$main_title', '$ticket_admin', '$ticket_deadline', '$sponsorBtn', '$volunteer_ids_str', 'Your-ticket', '', '', '', '')") or die($conn->error);

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

    // EVENT
    if (isset($_POST['addTicketEvent'])) {
        $ticket_title = $_POST['ticket_title'];
        $ticket_desc = $_POST['ticket_desc'];

        $ticket_admin = $_POST['ticket_admin'];
        $ticket_type = $_POST['ticket_type'];
        $volunteer_ids = $_POST['volunteer_id'];
        $eventBtn = $_POST['eventBtn'];
        $ticket_deadline = $_POST['ticket_deadline'];

        if($volunteer_ids){
            $volunteer_ids_str = implode(', ', $volunteer_ids);
        }else{
            $volunteer_ids_str = ' ';
        }
        
        $main_id = $_POST['main_id'];
        $main_event_id = $_POST['main_event_id'];
        $main_title = $_POST['main_title'];
        $main_start = $_POST['main_start'];
        $main_end = $_POST['main_end'];
        $main_allday = $_POST['main_allday'];
        $main_desc = $_POST['main_desc'];

        if (!empty($ticket_title)) {

            $conn->query("INSERT INTO tickets (event_id, start, end, ticket_title, ticket_desc, ticket_type, ticket_event, ticket_admin, ticket_deadline, ticket_priority, ticket_volunteers_id, ticket_status, ticket_comments, ticket_instructions, target_time, file_uploaded) 
            VALUES('$main_id' ,'$main_start', '$main_end', '$ticket_title', '$ticket_desc', '$ticket_type', '$main_title', '$ticket_admin', '$ticket_deadline', '$eventBtn', '$volunteer_ids_str', 'Your-ticket', '', '', '', '')") or die($conn->error);

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

    // ACCOUNTS
    if (isset($_POST['addTicketAccount'])) {
        $ticket_title = $_POST['ticket_title'];
        $ticket_desc = $_POST['ticket_desc'];

        $ticket_admin = $_POST['ticket_admin'];
        $ticket_type = $_POST['ticket_type'];
        $volunteer_ids = $_POST['volunteer_id'];
        $partBtn = $_POST['partBtn'];
        $ticket_deadline = $_POST['ticket_deadline'];

        if($volunteer_ids){
            $volunteer_ids_str = implode(', ', $volunteer_ids);
        }else{
            $volunteer_ids_str = ' ';
        }
        

        if (!empty($ticket_title)) {

            $conn->query("INSERT INTO tickets (event_id, start, end, ticket_title, ticket_desc, ticket_type, ticket_event, ticket_admin, ticket_deadline, ticket_priority, ticket_volunteers_id, ticket_status, ticket_comments, ticket_instructions, target_time, file_uploaded) 
            VALUES(' ' ,' ', ' ', '$ticket_title', '$ticket_desc', '$ticket_type', ' ', '$ticket_admin', '$ticket_deadline', '$partBtn', '$volunteer_ids_str', 'Your-ticket', '', '', '', '')") or die($conn->error);

            $_SESSION['status'] = 'Ticket Successfully Saved';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../accounts.php');
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../accounts.php');
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

    // DELETE PART
    if (isset($_POST['delPart'])) {
        $id = $_POST['part_id'];

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

    // CHANGE ACCOUNT TYPE
    if (isset($_POST['accType'])) {
        $id = $_POST['acc_id'];
        $type = $_POST['acc_type'];
        
        $result = $conn->query("SELECT type FROM accounts WHERE id = $id");
        if ($result) {
            $row = $result->fetch_assoc();
            $currentType = $row['type'];

            if ($currentType == $type) {
                $_SESSION['status'] = 'No changes made. Account type is already set to ' . $type;
                $_SESSION['status_icon'] = 'info';
                header('Location: ../accounts.php');
                exit();
            } else {
                if (!empty($id)) {
                    $conn->query("UPDATE accounts SET type = '$type' WHERE id = $id") or die($conn->error);
                    $_SESSION['status'] = 'Successfully changed account type to ' . $type;
                    $_SESSION['status_icon'] = 'success';
                    header('Location: ../accounts.php');
                    exit();
                } else {
                    $_SESSION['status'] = 'An Error Occurred!';
                    $_SESSION['status_icon'] = 'error';
                    header('Location: ../accounts.php');
                    exit();
                }
            }
        } else {
            $_SESSION['status'] = 'An Error Occurred while fetching account details!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../accounts.php');
            exit();
        }
    }

    // CHANGE ACCOUNT STATUS
    if (isset($_POST['accStat'])) {
        $id = $_POST['acc_id'];
        $stat = $_POST['acc_stats'];

        $result = $conn->query("SELECT status FROM accounts WHERE id = $id");
        if ($result) {
            $row = $result->fetch_assoc();
            $currentStat = $row['status'];

            if ($currentStat == $stat) {
                $_SESSION['status'] = 'No changes made. Account status is already set to ' . $stat;
                $_SESSION['status_icon'] = 'info';
                header('Location: ../accounts.php');
                exit();
            } else {
                if (!empty($id)) {
                    $conn->query("UPDATE accounts SET status = '$stat' WHERE id = $id") or die($conn->error);
                    $_SESSION['status'] = 'Successfully changed account status to ' . $stat;
                    $_SESSION['status_icon'] = 'success';
                    header('Location: ../accounts.php');
                    exit();
                } else {
                    $_SESSION['status'] = 'An Error Occurred!';
                    $_SESSION['status_icon'] = 'error';
                    header('Location: ../accounts.php');
                    exit();
                }
            }
        } else {
            $_SESSION['status'] = 'An Error Occurred while fetching account details!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../accounts.php');
            exit();
        }
    }

    // REMOVE ACCOUNT
    if (isset($_POST['removeAcc'])) {
        $id = $_POST['id'];

        if (!empty($id)) {

            $conn->query("DELETE FROM accounts WHERE id='$id'") or die($conn->error);

            $_SESSION['status'] = 'Successfully Removed the Account';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../accounts.php');
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../accounts.php');
            exit();
        }
    }

    // ADD CATEGORY
    if (isset($_POST['add_category'])) {
        
        $category = $_POST['category'];

        $sql = "SELECT * FROM skill_tag WHERE category = '$category' AND category_id = 0";
        $result = mysqli_query($conn, $sql);

        if(!$result->num_rows > 0){
   
            $conn->query("INSERT INTO skill_tag (category, category_id, tag_name) 
            VALUES('$category', 0, ' ')") or die($conn->error);

            $_SESSION['status'] = 'Successfully Added';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../skill_tag.php');
           
        }else{
            $_SESSION['status'] = 'Category Already Existing!';
            $_SESSION['status_icon'] = 'warning';
            header('location:../skill_tag.php');
        }
    
    }

    // ADD TAG
    if (isset($_POST['add_tag'])) {
    
        $tag = $_POST['tag'];
        $category = $_POST['category'];
        $category_id = $_POST['category_id'];

        $sql = "SELECT * FROM skill_tag WHERE tag_name = '$tag' AND category = '$category' ";
        $result = mysqli_query($conn, $sql);

        if(!$result->num_rows > 0){
    
            $conn->query("INSERT INTO skill_tag (category, category_id, tag_name) 
            VALUES('$category', '$category_id', '$tag')") or die($conn->error);

            $_SESSION['status'] = 'Successfully Added';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../skill_tag.php');
            
        }else{
            $_SESSION['status'] = 'Tag Already Existing!';
            $_SESSION['status_icon'] = 'warning';
            header('location:../skill_tag.php');
        }
    
    }
    
    // DELETE CATEGORY
    if (isset($_POST['del_category'])) {
        $category_id = $_POST['category_id'];

        if (!empty($category_id)) {

            $conn->query("DELETE FROM skill_tag WHERE id='$category_id'") or die($conn->error);
            $conn->query("DELETE FROM skill_tag WHERE category_id='$category_id'") or die($conn->error);

            $_SESSION['status'] = 'Successfully Deleted the Category';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../skill_tag.php');
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../skill_tag.php');
            exit();
        }
    }

    // REMOVE TAG
    if (isset($_POST['del_tag'])) {
        $tag_id = $_POST['tag_id'];

        if (!empty($tag_id)) {

            $conn->query("DELETE FROM skill_tag WHERE id='$tag_id'") or die($conn->error);

            $_SESSION['status'] = 'Successfully Removed the Skill Tag';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../skill_tag.php');
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../skill_tag.php');
            exit();
        }
    }
    
    // UPDATE PRIORITY LEVEL
    if (isset($_POST['update_priority'])) {
        $priority_id = $_POST['priority_id'];
        $updtLevel = $_POST['updtBtn'];

        $main_id = $_POST['main_id'];
        $main_event_id = $_POST['main_event_id'];
        $main_title = $_POST['main_title'];
        $main_start = $_POST['main_start'];
        $main_end = $_POST['main_end'];
        $main_allday = $_POST['main_allday'];
        $main_desc = $_POST['main_desc'];

        $url = 'event_plan.php?id=' . urlencode($main_id) .
        '&event_id=' . urlencode($main_event_id) .
        '&allday=' . urlencode($main_allday) .
        '&title=' . urlencode($main_title) .
        '&start=' . urlencode($main_start) .
        '&end=' . urlencode($main_end) .
        '&desc=' . urlencode($main_desc);
        
        $result = $conn->query("SELECT * FROM tickets WHERE id = '$priority_id'");
        if ($result) {
            $row = $result->fetch_assoc();
            $currentLevel = $row['ticket_priority'];
            
            if ($currentLevel == $updtLevel) {
                $_SESSION['status'] = 'No changes made. Priority level is already set to ' . $updtLevel;
                $_SESSION['status_icon'] = 'info';
                header('Location: ../'. $url);
                exit();
            } else {
                if (!empty($priority_id)) {
                    $conn->query("UPDATE tickets SET ticket_priority = '$updtLevel' WHERE id = $priority_id") or die($conn->error);
                    $_SESSION['status'] = 'Successfully updated the priority level to ' . $updtLevel;
                    $_SESSION['status_icon'] = 'success';
                    header('Location: ../'. $url);
                    exit();
                } else {
                    $_SESSION['status'] = 'An Error Occurred!';
                    $_SESSION['status_icon'] = 'error';
                    header('Location: ../'. $url);
                    exit();
                }
            }
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../'. $url);
            exit();
        }

    }

    // ADD VOLUNTEERS
    if (isset($_POST['addVolunteers'])) {
        $vl_id = $_POST['vl_id'];
        $volunteer_ids = isset($_POST['volunteer_id']) ? $_POST['volunteer_id'] : [];

        $main_id = $_POST['main_id'];
        $main_event_id = $_POST['main_event_id'];
        $main_title = $_POST['main_title'];
        $main_start = $_POST['main_start'];
        $main_end = $_POST['main_end'];
        $main_allday = $_POST['main_allday'];
        $main_desc = $_POST['main_desc'];

        $url = 'event_plan.php?id=' . urlencode($main_id) .
        '&event_id=' . urlencode($main_event_id) .
        '&allday=' . urlencode($main_allday) .
        '&title=' . urlencode($main_title) .
        '&start=' . urlencode($main_start) .
        '&end=' . urlencode($main_end) .
        '&desc=' . urlencode($main_desc);

        if (!empty($volunteer_ids)) {
            $volunteer_ids_str = implode(', ', $volunteer_ids);
        } else {
            $_SESSION['status'] = 'No Volunteers Added';
            $_SESSION['status_icon'] = 'info';
            header('Location: ../'. $url);
            exit();
        }

        if ($vl_id) {
            $existingVolunteersQuery = $conn->query("SELECT ticket_volunteers_id FROM tickets WHERE id = '$vl_id'");
            $existingVolunteersRow = $existingVolunteersQuery->fetch_assoc();
            $existingVolunteerStr = $existingVolunteersRow['ticket_volunteers_id'];

            if (!empty($existingVolunteerStr)) {
                $volunteerStr = $existingVolunteerStr . ', ' . $volunteer_ids_str;
            } else {
                $volunteerStr = $volunteer_ids_str;
            }

            $conn->query("UPDATE tickets SET ticket_volunteers_id = '$volunteerStr' WHERE id = '$vl_id'") or die($conn->error);
            $_SESSION['status'] = 'Successfully Added Volunteer/s';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../'. $url);
            exit();
        } else {
            $_SESSION['status'] = 'No Volunteers Added';
            $_SESSION['status_icon'] = 'info';
            header('Location: ../'. $url);
            exit();
        }
    }
    
    // UPDATE STATUS
    if (isset($_POST['update_status'])) {
        $status_id = $_POST['status_id'];
        $stat = $_POST['stat'];

        $main_id = $_POST['main_id'];
        $main_event_id = $_POST['main_event_id'];
        $main_title = $_POST['main_title'];
        $main_start = $_POST['main_start'];
        $main_end = $_POST['main_end'];
        $main_allday = $_POST['main_allday'];
        $main_desc = $_POST['main_desc'];

        $url = 'event_plan.php?id=' . urlencode($main_id) .
        '&event_id=' . urlencode($main_event_id) .
        '&allday=' . urlencode($main_allday) .
        '&title=' . urlencode($main_title) .
        '&start=' . urlencode($main_start) .
        '&end=' . urlencode($main_end) .
        '&desc=' . urlencode($main_desc);
        
        $result = $conn->query("SELECT * FROM tickets WHERE id = '$status_id'");
        if ($result) {
            $row = $result->fetch_assoc();
            $currentStat = $row['ticket_status'];
            
            if ($currentStat == $stat) {
                $_SESSION['status'] = 'No changes made. Ticket Status is already set to ' . $stat;
                $_SESSION['status_icon'] = 'info';
                header('Location: ../'. $url);
                exit();
            } else {
                if (!empty($status_id)) {
                    $conn->query("UPDATE tickets SET ticket_status = '$stat' WHERE id = $status_id") or die($conn->error);
                    $_SESSION['status'] = 'Successfully updated the ticket status to ' . $stat;
                    $_SESSION['status_icon'] = 'success';
                    header('Location: ../'. $url);
                    exit();
                } else {
                    $_SESSION['status'] = 'An Error Occurred!';
                    $_SESSION['status_icon'] = 'error';
                    header('Location: ../'. $url);
                    exit();
                }
            }
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../'. $url);
            exit();
        }

    }

    // ADD INSTRUCTIONS
    if (isset($_POST['addInstructions'])) {
        $instructions_id = $_POST['instructions_id'];

        $instructions = array();
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'instruction_') === 0) {
                $instructions[] = $value;
            }
        }

        $newInstructionStr = implode(', ', $instructions);

        $existingInstructionsQuery = $conn->query("SELECT ticket_instructions FROM tickets WHERE id = '$instructions_id'");
        $existingInstructionsRow = $existingInstructionsQuery->fetch_assoc();
        $existingInstructionStr = $existingInstructionsRow['ticket_instructions'];

        if (!empty($existingInstructionStr)) {
            $instructionStr = $existingInstructionStr . ', ' . $newInstructionStr;
        } else {
            $instructionStr = $newInstructionStr;
        }

        $main_id = $_POST['main_id'];
        $main_event_id = $_POST['main_event_id'];
        $main_title = $_POST['main_title'];
        $main_start = $_POST['main_start'];
        $main_end = $_POST['main_end'];
        $main_allday = $_POST['main_allday'];
        $main_desc = $_POST['main_desc'];

        $url = 'event_plan.php?id=' . urlencode($main_id) .
        '&event_id=' . urlencode($main_event_id) .
        '&allday=' . urlencode($main_allday) .
        '&title=' . urlencode($main_title) .
        '&start=' . urlencode($main_start) .
        '&end=' . urlencode($main_end) .
        '&desc=' . urlencode($main_desc);

        $conn->query("UPDATE tickets SET ticket_instructions = '$instructionStr' WHERE id = '$instructions_id'") or die($conn->error);
        $_SESSION['status'] = 'Successfully Added the Instruction/s';
        $_SESSION['status_icon'] = 'success';
        header('Location: ../'. $url);
        exit();
    }

    // UPDATE EMAIL
    if (isset($_POST['update_email'])) {
        $update_id = $_POST['update_id'];
        $email = $_POST['updt_email'];


        $result = $conn->query("SELECT * FROM accounts WHERE id = '$update_id'");
        if ($result) {
            $row = $result->fetch_assoc();
            $currentEmail = $row['email'];
            
            if ($currentEmail == $email) {
                $_SESSION['status'] = 'No changes made';
                $_SESSION['status_icon'] = 'info';
                header('Location: ../my_account.php');
                exit();
            } else {
                if (!empty($update_id)) {
                    $conn->query("UPDATE accounts SET email = '$email' WHERE id = $update_id") or die($conn->error);
                    $_SESSION['status'] = 'Successfully updated your email';
                    $_SESSION['status_icon'] = 'success';
                    header('Location: ../my_account.php');
                    exit();
                } else {
                    $_SESSION['status'] = 'An Error Occurred!';
                    $_SESSION['status_icon'] = 'error';
                    header('Location: ../my_account.php');
                    exit();
                }
            }
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../my_account.php');
            exit();
        }

    }

    // UPDATE CONTACT
    if (isset($_POST['update_contact'])) {
        $update_id = $_POST['update_id'];
        $contact = $_POST['contact'];

        $result = $conn->query("SELECT * FROM accounts WHERE id = '$update_id'");
        if ($result) {
            $row = $result->fetch_assoc();
            $currentContact = $row['contact'];
            
            if ($currentContact == $contact) {
                $_SESSION['status'] = 'No changes made';
                $_SESSION['status_icon'] = 'info';
                header('Location: ../my_account.php');
                exit();
            } else {
                if (!empty($update_id)) {
                    $conn->query("UPDATE accounts SET contact = '$contact' WHERE id = $update_id") or die($conn->error);
                    $_SESSION['status'] = 'Successfully updated your contact number';
                    $_SESSION['status_icon'] = 'success';
                    header('Location: ../my_account.php');
                    exit();
                } else {
                    $_SESSION['status'] = 'An Error Occurred!';
                    $_SESSION['status_icon'] = 'error';
                    header('Location: ../my_account.php');
                    exit();
                }
            }
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../my_account.php');
            exit();
        }

    }

    // ADD SKILLS
    if (isset($_POST['addSkills'])) {
        $vid = $_POST['vl_id'];
        $vuser = $_POST['vl_user'];
        $sid = $_POST['skill_id'];
        $skill_ids = $_POST['skills_ids'];
        $skill_tags = $_POST['skills_values'];
        
        $ids_string = $skill_ids[0];
        $ids_array = explode(',', $ids_string);
        
        $tags_string = $skill_tags[0];
        $tags_array = explode(',', $tags_string);
        
        if (empty($tags_string)) {
            $_SESSION['status'] = 'No Skills Added';
            $_SESSION['status_icon'] = 'info';
            header('Location: ../my_account.php');
            exit();
        }elseif($vid != '' && $sid != ''){
            foreach ($ids_array as $index => $id) {
                $tag = $tags_array[$index];
        
                $conn->query("INSERT INTO volunteer_skills (category_id, tag_name, volunteer_id, username) 
                VALUES('$sid', '$tag', '$vid', '$vuser')") or die($conn->error);
            }
        
            $_SESSION['status'] = 'Successfully added your skills';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../my_account.php');
            exit();
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../my_account.php');
            exit();
        }

    }

    // REMOVE SKILLS
    if (isset($_POST['remSkills'])) {
        $remId = $_POST['remId'];

        if ($remId != '') {
            $conn->query("DELETE FROM volunteer_skills WHERE id='$remId'") or die($conn->error);
            $_SESSION['status'] = 'Successfully deleted your skill';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../my_account.php');
            exit();
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../my_account.php');
            exit();
        }

    }


    // CREATE ANNOUNCEMENT
    if (isset($_POST['createAnnouncement'])) {
        $title = $_POST['title'];
        $subject = $_POST['subject'];
        $details = $_POST['details'];

        $sql = "SELECT * FROM announcements WHERE title='$title' AND subject='$subject' AND details='$details'";
        $result = mysqli_query($conn, $sql);

        if ($title != '' && $subject != '' && $details !='') {
            if(!$result->num_rows > 0){
                $conn->query("INSERT INTO announcements (title, subject, links, details) 
                VALUES('$title', '$subject', '', '$details')") or die($conn->error);
                $_SESSION['status'] = 'Successfully Created the Announcement';
                $_SESSION['status_icon'] = 'success';
                header('Location: ../index.php');
                exit();
            }else{
                $_SESSION['status'] = 'Announcement Already Exists';
                $_SESSION['status_icon'] = 'warning';
                header('location:../index.php');
            }
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../index.php');
            exit();
        }

    }
    
    // UPDATE PRIORITY LEVEL - TEAM DASHBOARD
    if (isset($_POST['update_priority_team'])) {
        $priority_id = $_POST['priority_id'];
        $updtLevel = $_POST['updtBtn'];

        $result = $conn->query("SELECT * FROM tickets WHERE id = '$priority_id'");
        if ($result) {
            $row = $result->fetch_assoc();
            $currentLevel = $row['ticket_priority'];
            
            if ($currentLevel == $updtLevel) {
                $_SESSION['status'] = 'No changes made. Priority level is already set to ' . $updtLevel;
                $_SESSION['status_icon'] = 'info';
                header('Location: ../team_dashboard.php');
                exit();
            } else {
                if (!empty($priority_id)) {
                    $conn->query("UPDATE tickets SET ticket_priority = '$updtLevel' WHERE id = $priority_id") or die($conn->error);
                    $_SESSION['status'] = 'Successfully updated the priority level to ' . $updtLevel;
                    $_SESSION['status_icon'] = 'success';
                    header('Location: ../team_dashboard.php');
                    exit();
                } else {
                    $_SESSION['status'] = 'An Error Occurred!';
                    $_SESSION['status_icon'] = 'error';
                    header('Location: ../team_dashboard.php');
                    exit();
                }
            }
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../team_dashboard.php');
            exit();
        }
    }

    // UPDATE STATUS - TEAM DASHBOARD
    if (isset($_POST['update_status_team'])) {
        $status_id = $_POST['status_id'];
        $stat = $_POST['stat'];
        
        $result = $conn->query("SELECT * FROM tickets WHERE id = '$status_id'");
        if ($result) {
            $row = $result->fetch_assoc();
            $currentStat = $row['ticket_status'];
            
            if ($currentStat == $stat) {
                $_SESSION['status'] = 'No changes made. Ticket Status is already set to ' . $stat;
                $_SESSION['status_icon'] = 'info';
                header('Location: ../team_dashboard.php');
                exit();
            } else {
                if (!empty($status_id)) {
                    $conn->query("UPDATE tickets SET ticket_status = '$stat' WHERE id = $status_id") or die($conn->error);
                    $_SESSION['status'] = 'Successfully updated the ticket status to ' . $stat;
                    $_SESSION['status_icon'] = 'success';
                    header('Location: ../team_dashboard.php');
                    exit();
                } else {
                    $_SESSION['status'] = 'An Error Occurred!';
                    $_SESSION['status_icon'] = 'error';
                    header('Location: ../team_dashboard.php');
                    exit();
                }
            }
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'error';
            header('Location: ../team_dashboard.php');
            exit();
        }

    }

    // ADD INSTRUCTIONS - TEAM DASHBOARD
    if (isset($_POST['addInstructions_team'])) {
        $instructions_id = $_POST['instructions_id'];

        $instructions = array();
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'instruction_') === 0) {
                $instructions[] = $value;
            }
        }

        $newInstructionStr = implode(', ', $instructions);

        $existingInstructionsQuery = $conn->query("SELECT ticket_instructions FROM tickets WHERE id = '$instructions_id'");
        $existingInstructionsRow = $existingInstructionsQuery->fetch_assoc();
        $existingInstructionStr = $existingInstructionsRow['ticket_instructions'];

        if (!empty($existingInstructionStr)) {
            $instructionStr = $existingInstructionStr . ', ' . $newInstructionStr;
        } else {
            $instructionStr = $newInstructionStr;
        }

        $conn->query("UPDATE tickets SET ticket_instructions = '$instructionStr' WHERE id = '$instructions_id'") or die($conn->error);
        $_SESSION['status'] = 'Successfully Added the Instruction/s';
        $_SESSION['status_icon'] = 'success';
        header('Location: ../team_dashboard.php');
        exit();
    }

    // ADD VOLUNTEERS - TEAM DASHBOARD
    if (isset($_POST['addVolunteers_team'])) {
        $vl_id = $_POST['vl_id'];
        $volunteer_ids = isset($_POST['volunteer_id']) ? $_POST['volunteer_id'] : [];

        if (!empty($volunteer_ids)) {
            $volunteer_ids_str = implode(', ', $volunteer_ids);
        } else {
            $_SESSION['status'] = 'No Volunteers Added';
            $_SESSION['status_icon'] = 'info';
            header('Location: ../team_dashboard.php');
            exit();
        }

        if ($vl_id) {
            $existingVolunteersQuery = $conn->query("SELECT ticket_volunteers_id FROM tickets WHERE id = '$vl_id'");
            $existingVolunteersRow = $existingVolunteersQuery->fetch_assoc();
            $existingVolunteerStr = $existingVolunteersRow['ticket_volunteers_id'];

            if (!empty($existingVolunteerStr)) {
                $volunteerStr = $existingVolunteerStr . ', ' . $volunteer_ids_str;
            } else {
                $volunteerStr = $volunteer_ids_str;
            }

            $conn->query("UPDATE tickets SET ticket_volunteers_id = '$volunteerStr' WHERE id = '$vl_id'") or die($conn->error);
            $_SESSION['status'] = 'Successfully Added Volunteer/s';
            $_SESSION['status_icon'] = 'success';
            header('Location: ../team_dashboard.php');
            exit();
        } else {
            $_SESSION['status'] = 'No Volunteers Added';
            $_SESSION['status_icon'] = 'info';
            header('Location: ../team_dashboard.php');
            exit();
        }
    }
?>