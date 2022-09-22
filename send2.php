<?php
    if (isset($_POST['name']) && isset($_POST['comment']))
    {
        include 'db_conn3.php';

        $name = $_POST['name'];
        $comment = $_POST['comment'];

        $sql = "INSERT INTO comments(name, comment) VALUES('$name', '$comment')";

        $res = mysqli_query($conn, $sql);

        header("Location: viewBlog.php");
    }
    else
    {
        header("Location: addComment.php");
    }
?>