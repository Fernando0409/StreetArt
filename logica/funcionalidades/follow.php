<?php
    require_once '../root.php';
    session_start();

    $userLink = $_SESSION['userLink'];
    $username = $_SESSION['userLogin'];

    if(!empty($userLink)){
        $sql = "SELECT * FROM follows WHERE username = '{$username}' && username_follow = '{$userLink}' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $result1 = mysqli_fetch_assoc($result);
        if($result1){
            header("location: ../../perfil.php");
        }else{
            $QUERY = "INSERT INTO follows(username, status, username_follow) VALUES('$username', '1', '$userLink'}')";
            mysqli_query($conn, $query);
        }
    }