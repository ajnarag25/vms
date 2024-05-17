<?php
include('connection.php');
include('currentdatetime.php');

if (isset($_GET['logout'])) {
    // data for logout session

    $logout_time = $_SESSION['login_time'];
    $volunteer_id = $_SESSION['id'];
    $username = $_SESSION['username'];
    // sql for saving the current logout time to the database volunteer_logtime
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

// ASK SUBMISSION
if (isset($_POST['ask_submit'])) {
    $ticket_title = $_POST['ask_title'];
    $ticket_desc = $_POST['ask_details'];

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

        $conn->query("INSERT INTO tickets (event_id, start, end, ticket_title, ticket_desc, ticket_type, ticket_event, ticket_admin, ticket_deadline, ticket_priority, ticket_volunteers_id, ticket_status, ticket_comments, ticket_instructions) 
        VALUES(' ' ,' ', ' ', '$ticket_title', '$ticket_desc', '$ticket_type', ' ', '$ticket_admin', '$ticket_deadline', '$partBtn', '$volunteer_ids_str', 'Your-ticket', '', '')") or die($conn->error);

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


// SUBMIT TICKET
if (isset($_POST['submit_ticket'])) {
    $submit_id = $_POST['submit_id'];

    if (!empty($submit_id)) {
        $conn->query("UPDATE tickets SET ticket_status = 'In-Review' WHERE id = $submit_id") or die($conn->error);
        $_SESSION['status'] = 'Successfully submitted your ticket';
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
