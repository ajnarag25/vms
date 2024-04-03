<?php
    include('connection.php');
    session_start();

    // REGISTRATION
    if (isset($_POST['register'])) {
        $user = $_POST['username'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $pass1 = $_POST['password'];
        $pass2 = $_POST['repassword'];

        $sql = "SELECT * FROM accounts WHERE username='$user' AND email='$email'";
        $result = mysqli_query($conn, $sql);

        if ($pass1 != $pass2){
            $_SESSION['status'] = 'Password does not match!';
            $_SESSION['status_icon'] = 'error';
            header('location:../register.php');
        }elseif(strlen($pass1) <= 8){
            $_SESSION['status'] = 'Password Must Contain At Least 8 Characters!';
            $_SESSION['status_icon'] = 'error';
            header('location:../register.php');
        }else{
            if (!$result->num_rows > 0) {
                $conn->query("INSERT INTO accounts (username, email, contact, password) 
                VALUES('$user', '$email', '$contact', '".password_hash($pass1, PASSWORD_DEFAULT)."')") or die($conn->error);

                $_SESSION['status'] = 'Successfully Created the Account';
                $_SESSION['status_icon'] = 'success';
                header('location:../index.php');
            }else{
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

        $login ="SELECT * FROM accounts WHERE username='$user'";
        $check = mysqli_query($conn, $login);
        $getData = mysqli_fetch_array($check);

        if ($getData != null){
            if (password_verify($pass, $getData['password'])){
                $_SESSION['volunteer'] = $getData;
                unset($_SESSION['status']);
                header('location:../volunteer/index.php');
            }else{
                $_SESSION['status'] = 'Invalid Password';
                $_SESSION['status_icon'] = 'error';
                header('location:../index.php');
            }
        }else{
            $_SESSION['status'] = 'Invalid Credentials';
            $_SESSION['status_icon'] = 'error';
            header('location:../index.php');
        }
       
    }

?>