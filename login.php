<?php

session_start();
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password']))
{
    $uname = $_POST['uname'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$uname' AND password = '$pass'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows ($result) === 1) 
    {
        $row = mysqli_fetch_assoc($result);

        if($row['email'] === "joseph@gmail.com" && $row['password'] === "joseph123")
        {
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];

            header("Location: addPost.php");
            exit();
        }
        else if($row['email'] === $uname && $row['password'] === $pass)
        {
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];

            header("Location: addComment.php");
            exit();
        }
        else
        {
            header("Location: login.html");
            exit();
        }
    }
    else
    {
        header("Location: login.html?WrongEmailOrPassword!");
        exit();
    }
}
else
{
    header("Location: login.html");
    exit();
}

?>