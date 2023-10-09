<?php

declare(strict_types=1);

function get_username(object $pdo, string $username) {
    $query = "SELECT username from users where username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function ger_email(object $pdo, string $email) {
    $query = "SELECT username from users where email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $username,string $email,string $pwd) {
    $query = "INSERT INTO users (username, email, pwd) VALUES (:username,:email,:pwd);";
    $stmt = $pdo->prepare($query);

    $option = [ 'cost' => 12]; // For password encryption. Ideal cost is 10-12. More than that make the page slow
    $hashedpwd = password_hash($pwd, PASSWORD_BCRYPT, $option);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pwd", $hashedpwd);
    $stmt->execute();
}