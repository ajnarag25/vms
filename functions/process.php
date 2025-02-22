<?php
include('connection.php');
include('currentdatetime.php');

// REGISTRATION
if (isset($_POST['register'])) {
    $fname = $_POST['firstname'];
    $mname = $_POST['middlename'];
    $lname = $_POST['lastname'];
    $name = $_POST['name'];
    $user = $_POST['username'];
    $emails = $_POST['email'];
    $contact = $_POST['contact'];
    $pass1 = $_POST['password'];
    $pass2 = $_POST['repassword'];

    $sql = "SELECT * FROM accounts WHERE username='$user' AND email='$emails'";
    $result = mysqli_query($conn, $sql);

    if ($pass1 != $pass2) {
        $_SESSION['status'] = 'Password does not match!';
        $_SESSION['status_icon'] = 'error';
        header('location:../register.php');
    } elseif (strlen($pass1) <= 8) {
        $_SESSION['status'] = 'Password Must Contain At Least 8 Characters!';
        $_SESSION['status_icon'] = 'error';
        header('location:../register.php');
    } else {
        if (!$result->num_rows > 0) {
            $setOTP = rand(0000, 9999);

            $insertQuery = "INSERT INTO accounts (firstname, middlename, lastname, name, username, email, contact, password, status, otp, type) 
                                VALUES ('$fname', '$mname', '$lname', '$name', '$user', '$emails', '$contact', '" . password_hash($pass1, PASSWORD_DEFAULT) . "', 'Unverified', '$setOTP', 'volunteer')";
            $conn->query($insertQuery) or die($conn->error);

            $get_id = $conn->insert_id;
            include('../otp_email.php');

            $_SESSION['status'] = 'Successfully Created your Account';
            $_SESSION['status_icon'] = 'success';
            header('location:../index.php');
        } else {
            $_SESSION['status'] = 'Account Already Exists';
            $_SESSION['status_icon'] = 'warning';
            header('location:../register.php');
        }
    }
}

// LOGIN
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $login = "SELECT * FROM accounts WHERE username='$user' ";
    $check = mysqli_query($conn, $login);
    $getData = mysqli_fetch_array($check);

    if ($getData != null) {
        if (password_verify($pass, $getData['password']) and $getData['status'] == 'Verified' and $getData['type'] == 'volunteer') {
            $_SESSION['volunteer'] = $getData;
            unset($_SESSION['status']);

            // preparation code for session
            $_SESSION['id'] = $getData['id'];
            $_SESSION['username'] = $getData['username'];

            // preparation of data for database
            $login_time = $_SESSION['login_time'];
            $volunteer_id = $_SESSION['id'];
            $username = $_SESSION['username'];

            // sql for putting session login_time with volunteer id and username into database
            $getlogin = "INSERT INTO volunteer_logtime (volunteer_id, login_time, username) 
                                VALUES ('$volunteer_id ', '$login_time' , '$username')";
            $conn->query($getlogin) or die($conn->error);
            header('location:../volunteer/index.php');
        } elseif (password_verify($pass, $getData['password']) and $getData['status'] == 'On Process' and $getData['type'] == 'volunteer') {
            $_SESSION['status'] = 'Please wait for the verification of your account.';
            $_SESSION['status_icon'] = 'info';
            header('location:../index.php');
        } 
        elseif (password_verify($pass, $getData['password']) and $getData['status'] == 'Declined' and $getData['type'] == 'volunteer') {
            $_SESSION['status'] = 'Your account has been declined.';
            $_SESSION['status_icon'] = 'error';
            header('location:../index.php');
        } 
         elseif (password_verify($pass, $getData['password']) and $getData['status'] == 'Verified' and $getData['type'] == 'admin') {
            $_SESSION['admin'] = $getData;
            unset($_SESSION['status']);
            header('location:../admin/index.php');
        } elseif (password_verify($pass, $getData['password']) and $getData['status'] == 'Verified' and $getData['type'] == 'superadmin') {
            $_SESSION['superadmin'] = $getData;
            unset($_SESSION['status']);
            header('location:../admin/index.php');
        } else {
            $_SESSION['status'] = 'Invalid Password / Unverified Account';
            $_SESSION['status_icon'] = 'error';
            header('location:../index.php');
        }
    } else {
        $_SESSION['status'] = 'Invalid Credentials';
        $_SESSION['status_icon'] = 'error';
        header('location:../index.php');
    }
}

// VERIFY ACCOUNT
if (isset($_POST['verify'])) {
    $id = $_POST['id'];
    $otp = $_POST['otp'];

    $sql = "SELECT * FROM accounts WHERE otp='$otp'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);

    if ($check != 0 and $id != '') {
        $conn->query("UPDATE accounts SET status = 'On Process' WHERE id = $id") or die($conn->error);
        $_SESSION['status'] = 'Successfully Activated your Account and please wait for the verification of your account.';
        $_SESSION['status_icon'] = 'success';
        header('location:../index.php');
    } else {
        $_SESSION['status'] = 'Wrong OTP Number';
        $_SESSION['status_icon'] = 'error';
        header('location:../otp.php?id=' . $id);
    }
}