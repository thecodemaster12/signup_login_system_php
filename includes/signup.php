<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    try {
        require_once './dbcon.php';
        require_once './signup_model.php';
        require_once './signup_view.php'; // Changeable - Removed
        require_once './signup_contrl.php';

//        Error Handlers
        $errors = [];

        if (is_input_empty($username, $email, $pwd)) {
            $errors["empty_input"] = "Fill all the fields";
        }
        if (is_email_invalid($email)){
            $errors["invalidate_email"] = "Invalidate Email Used";
        }
        if (is_username_taken($pdo, $username)){
            $errors["username_taken"] = "This username already taken";
        }
        if (is_email_register($pdo, $email)) {
            $errors["email_used"] = "This email already used";
        }

        require_once './config_session.php';

        if ($errors){
            $_SESSION["errors_signup"] = $errors;
            $signData = [
                'username' => $username,
                'email' => $email
            ];
            $_SESSION["signup_data"] = $signData;
            header("location: ../index.php");
            die();
        }
        create_user( $pdo,  $username, $email, $pwd);
        header("location: ../index.php?signup=success");
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query Failed ".$e->getMessage());
    }

} else{
    header('Location: ../index.php'); //Chane This
    die();
}