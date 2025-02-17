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
    $volunteer_id = $_POST['ask_id'];
    $ask_event_id = $_POST['ask_event_id'];
    $ticket_title = $_POST['ask_title'];
    $ticket_desc = $_POST['ask_details'];

    if (!empty($ticket_title)) {

        $conn->query("INSERT INTO tickets (event_id, start, end, ticket_title, ticket_desc, ticket_type, ticket_event, ticket_admin, ticket_deadline, ticket_priority, ticket_volunteers_id, ticket_status, ticket_comments, ticket_instructions, target_time, file_uploaded) 
        VALUES('$ask_event_id' ,'', '', '$ticket_title', '$ticket_desc', 'Ask Ticket', '', 'Volunteer', '', '', '$volunteer_id', '', '', '', '', '')") or die($conn->error);

        $_SESSION['status'] = 'Your ticket successfully sent';
        $_SESSION['status_icon'] = 'success';
        header('Location: ../team_dashboard.php');
    } else {
        $_SESSION['status'] = 'An Error Occurred!';
        $_SESSION['status_icon'] = 'error';
        header('Location: ../team_dashboard.php');
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

// ADD TARGET TIME
if (isset($_POST['target_submit'])) {
    $target_id = $_POST['target_id'];
    $target_time = $_POST['target_time'];

    if (!empty($target_id)) {
        $conn->query("UPDATE tickets SET target_time = '$target_time' WHERE id = '$target_id'") or die($conn->error);
        $_SESSION['status'] = 'Successfully saved your target time';
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

// UPLOAD FILE
if (isset($_POST['file_submit'])) {
    $file_id = $_POST['file_id'];
    $file_name = $_POST['file_name'];

    $target_dir = "../Files/";
    $file_upload = $_FILES["file_upload"]["name"];

    if (!empty($file_id)) {
        $target_file_name = $target_dir.  basename($_FILES["file_upload"]["name"]);
        move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file_name);
        $conn->query("UPDATE tickets SET file_uploaded = '$target_file_name' WHERE id = '$file_id'") or die($conn->error);
        $_SESSION['status'] = 'Successfully uploaded your file';
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

// ADD COMMENT - TEAM DASHBOARD
if (isset($_POST['add_comment'])) {
    $ticket_id = $_POST['ticket_id'];
    $comment = $_POST['comment'];

    if (!empty($ticket_id)) {
        $conn->query("INSERT INTO comments (ticket_id, comment, account_type) 
        VALUES('$ticket_id', '$comment', 'Volunteer')") or die($conn->error);
        $_SESSION['status'] = 'Your Comment Successfully Sent';
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

// ADD COMMENT - TICKET PANEL
if (isset($_POST['add_comment_panel'])) {
    $ticket_id = $_POST['ticket_id'];
    $comment = $_POST['comment'];

    if (!empty($ticket_id)) {
        $conn->query("INSERT INTO comments (ticket_id, comment, account_type) 
        VALUES('$ticket_id', '$comment', 'Volunteer')") or die($conn->error);
        $_SESSION['status'] = 'Your Comment Successfully Sent';
        $_SESSION['status_icon'] = 'success';
        header('Location: ../ticket_panel.php');
        exit();
    } else {
        $_SESSION['status'] = 'An Error Occurred!';
        $_SESSION['status_icon'] = 'error';
        header('Location: ../ticket_panel.php');
        exit();
    }   

}

// ASK SUBMISSION - TICKET PANEL
if (isset($_POST['ask_submit_panel'])) {
    $volunteer_id = $_POST['ask_id'];
    $ask_event_id = $_POST['ask_event_id'];
    $ticket_title = $_POST['ask_title'];
    $ticket_desc = $_POST['ask_details'];

    if (!empty($ticket_title)) {

        $conn->query("INSERT INTO tickets (event_id, start, end, ticket_title, ticket_desc, ticket_type, ticket_event, ticket_admin, ticket_deadline, ticket_priority, ticket_volunteers_id, ticket_status, ticket_comments, ticket_instructions, target_time, file_uploaded) 
        VALUES('$ask_event_id' ,'', '', '$ticket_title', '$ticket_desc', 'Ask Ticket', '', 'Volunteer', '', '', '$volunteer_id', '', '', '', '', '')") or die($conn->error);

        $_SESSION['status'] = 'Your ticket successfully sent';
        $_SESSION['status_icon'] = 'success';
        header('Location: ../ticket_panel.php');
    } else {
        $_SESSION['status'] = 'An Error Occurred!';
        $_SESSION['status_icon'] = 'error';
        header('Location: ../ticket_panel.php');
        exit();
    }
}

