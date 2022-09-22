<?php

    if (isset($_POST['title']) && isset($_POST['blog']))
    {
        include 'db_conn2.php';

        $title = $_POST['title'];
        $blog = $_POST['blog'];

        $sql = "INSERT INTO blogs(title, blog) VALUES('$title', '$blog')";

        $res = mysqli_query($conn, $sql);

        header("Location: viewBlogAdmin.php");
    }
    else
    {
        header("Location: addPost.php");
    }
?>