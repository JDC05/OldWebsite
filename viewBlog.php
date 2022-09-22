<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="alternative stylesheet" href="styleBlog.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section class="screen">
        <form action="" method="GET">
            <div id="right">
                <article>
                    <div class="smallContainer">
                        <div class="card">
                            <div class="SmallerBox">
                                <div class="mainCard">
                                    <form>
                                        <h2>FILTER BY MONTHS</h2>
                                        <select name="search" value="<?php if(isset($_GET['search'])) {echo $_GET['search'];}?>">
                                            <option value="ALL">ALL</option>
                                            <option value="01">Janurary</option>
                                            <option value="02">Feburary</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                        <button type="submit">CLICK</button>                           
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <article>
                    <h1>Comments</h1>               
                    <?php
                        echo "<hr>";

                        $conn = mysqli_connect("localhost", "root", "", "addcomment_db");
                        $sql = "SELECT * FROM comments";
                        $result = $conn->query($sql);

                        $rows = $result->fetch_all(MYSQLI_ASSOC);

                        foreach ($rows as $row)
                        {
                            echo "<br>";
                            echo "<header><h1>",$row["name"],"</h1></header>";
                            echo "<p>",$row["comment"],"</p>";                        
                        }
                    ?>                
                </article>
            </div>
            <aside>
                <article>
                    <?php
                        $conn = mysqli_connect("localhost", "root", "", "addPost_db");
                        $sql = "SELECT * FROM blogs";
                        $result = $conn->query($sql);

                        $rows = $result->fetch_all(MYSQLI_ASSOC);

                        $length = count($rows);

                        for($i=0; $i<$length; $i++)
                        {
                            for($j=0; $j<($length-1-$i); $j++)
                            {
                                if($rows[$j]['dateTime'] < $rows[$j+1]['dateTime'])
                                {
                                    $temp = $rows[$j];
                                    $rows[$j] = $rows[$j+1];
                                    $rows[$j+1] = $temp;
                                }
                            }
                        };

                        if(isset($_GET['search']))
                        {
                            if($_GET['search'] === "ALL")
                            {
                                foreach ($rows as $row)
                                {
                                    echo "<p>",$row["dateTime"],"</p>";
                                    echo "<header><h1>",$row["title"],"</h1></header>";
                                    echo "<p>",$row["blog"],"</p>";
                                    echo "<br><hr><br>";
                                }
                            }

                            $filtervalues = $_GET['search']; 
                            $sql = "SELECT * FROM blogs WHERE CONCAT(dateTime) LIKE '%-$filtervalues-%'";
                            $result = mysqli_query($conn, $sql);

                            $rows = $result->fetch_all(MYSQLI_ASSOC);

                            $length = count($rows);

                            for($i=0; $i<$length; $i++)
                            {
                                for($j=0; $j<($length-1-$i); $j++)
                                {
                                    if($rows[$j]['dateTime'] < $rows[$j+1]['dateTime'])
                                    {
                                        $temp = $rows[$j];
                                        $rows[$j] = $rows[$j+1];
                                        $rows[$j+1] = $temp;
                                    }
                                }
                            };

                            foreach($rows as $row)
                            {
                                echo "<p>",$row["dateTime"],"</p>";
                                echo "<header><h1>",$row["title"],"</h1></header>";
                                echo "<p>",$row["blog"],"</p>";
                                echo "<br><hr><br>";
                            }
                        }
                        else
                        {
                            foreach ($rows as $row)
                            {
                                echo "<p>",$row["dateTime"],"</p>";
                                echo "<header><h1>",$row["title"],"</h1></header>";
                                echo "<p>",$row["blog"],"</p>";
                                echo "<br><hr><br>";
                            }
                        }                       
                    ?>               
                </article>
            </aside>
        </form>        
        <nav>
            <div class="navLinks">
                <ul>
                    <li><a href="home.html">HOME</a></li>
                    <li><a href="aboutMe.html">ABOUT ME</a></li>
                    <li><a href="portfolio.html">PORTFOLIO</a></li>
                    <li><a href="viewBlog.php">BLOG</a></li>
                    <li><a href="login.html">LOGIN</a></li>
                </ul>
            </div>
        </nav>
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

