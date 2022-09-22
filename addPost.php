<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email']))
{


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="alternative stylesheet" href="styleAddPost.css">
    <script defer src="addPost.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section class="screen">
        <nav>
            <header>
                <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
            </header>
            <div class="navLinks">
                <ul>
                    <li><a href="viewBlogAdmin.php">BLOG</a></li>
                    <li><a href="addPost.php">ADD POST</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
        </nav>
        <div class="smallContainer">
            <div class="card">
                <div class="SmallerBox">
                    <div class="mainCard">
                        <form action="send.php" method="post">
                            <h2>Add Blog</h2>
                            <input type="text" name="title" class="input-box" id="title" placeholder="Title">
                            <textarea name="blog" class="input-boxText" id="text" placeholder="Enter your text here"></textarea>                           
                            <button type="submit" class="submit-btn" id="postMessage">Post</button>
                            <button type="reset" class="submit-btn" id="clearMessage">Clear</button>
                        </form>
                    </div>
                </div>
            </div>
         </div>
        <div>
            <footer class="contactDetails">
                <h4>Contact Me</h4>
                <a href="https://www.linkedin.com/in/josephdacosta">
                <i class="fa fa-linkedin fa-2x"></i></a>
                <a href="https://github.com/JDC05">
                <i class="fa fa-github fa-2x"></i></a>
            </footer>
        </div>
        <div>
            <footer class="personalContactDetails">
                <p>Personal Email: email@gmail.com</p>
                <p>Phone Number: +44 123456789</p>
            </footer>
        </div>
        <div>
            <footer class="copyRight">
                <p style="color: white;"><em>Copyright &copy; 2022 Mr Joseph Da Costa</em></p>
            </footer>
        </div>
    </section> 
</body>
</html>

<?php

}else{
    header("Location: login.html");
    exit();
}

?>
