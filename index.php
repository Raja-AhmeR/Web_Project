<?php
    include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/project-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <title>Library Management System</title>
    <link rel="shortcut icon" href="img/LMS logo small.jpg">
</head>
<body>
    <nav class="navbar fixed-top">
        <div class="container">
            <a class="navbar-logo" href="index.php"><img src="img/LMS logo small.jpg" alt="Logo" width="75%" height="75%"></a>
            <ul class="navbar-nav">
                <li class="nav-item active"><a class="nav-link" href="index.php"><i class="fa fa-fw fa-home"></i>&nbsp;Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact"><i class="fa fa-fw fa-envelope"></i>&nbsp;Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="#about"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;About</a></li>
                <li class="nav-item"><a class="nav-link" href="#help"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;Help</a></li>
                <li class="nav-item topnav-right" id="account-btn-1">
                    <a class="nav-link" href="login.php"><button class="btn nav-btn">Sign In</button></a>
                </li>
                <li class="nav-item" id="account-btn-2">
                    <a class="nav-link" href="register.php"><button class="btn nav-btn">Register</button></a>
                </li>
            </ul>

        </div>
    </nav>
    <header class="jumbotron">
        <div class="jumbotron-row">
            <div class="container">
                <h3>The only thing that you absolutely have to know, is the location of the library.</h3>
                <p>When in doubt, go to the library</p>
            </div>
        </div>
        <div class="jumbotron-btn">
            <a href="#information" type="button" class=""> Read More</a>
        </div>
    </header>

    <div class="container body">
        <div class="container-header">
            <span><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp; Quick access from any device </span>
            <span><i class="fa fa-user" aria-hidden="true"></i>&nbsp; 24/7 Support</span>
            <span><i class="fa fa-smile-o" aria-hidden="true"></i>&nbsp; Customer happiness gurantee</span>
        </div>
        <div class="container-btn-1">
            <span>
                <a href="login.php" id="btn-student" class="btn redirect-btn">Read Books</a>
            </span>
            <span>
                <a href="login.php" id="btn-librarian" class="btn redirect-btn">Librarian</a>
            </span>
            <span>
                <a href="login.php" id="btn-librarian" class="btn redirect-btn">Request Book</a>
            </span>
        </div>
        
        <div id="information" class="info-tab">
            <div class="info-tab-1">
                <h3>Information</h3>
                <p>
                    This is information about Using website. Watch this video to understand the working of our website. All functions are available in the video section. Click on the video to learn more and discover more information about our website. <br>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi explicabo quibusdam autem officiis quidem deserunt doloremque qui, ipsa sunt eaque saepe, quae nobis necessitatibus accusamus sapiente. Quam quidem sit sapiente! <br>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae laudantium inventore magni eos doloribus ut, impedit repudiandae! Ab, ipsa laborum!
                </p>
            </div>
            <div class="info-tab-2">
                <video controls autoplay>
                    <source src="video/Sakura.mp4" type="video/mp4">
                </video>
            </div>
        </div>

        <div class="book-tab">
            <h2>Choose Your Books</h2>
            <div class="search-box" id="search-book">
                <form method="post" action="#">
                    <input type="search" class="search-bar" placeholder="Search Book Name Here." name="search" id="search">
                    <a type="submit" class="btn" id="search-btn">&nbsp; <i class="fa fa-search" aria-hidden="true"></i></a>
                </form>
            </div>
        </div>

        <?php    // Search Book Functionality
            if (isset($_POST['search'])) {
                $search = $_POST['search'];

                $sql = "Select * from books where bookname = '".$search."' OR authorname = '".$search."' ";
                $result = $conn->query($sql);

                echo '<div class="book-tab">';
                echo '<div class="book-box">';
                echo "<div class='box'>"; 
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    
                    echo '<img src = "' . $row['bookimg'] . '"' . 'alt=" ' . $row['bookname'] . '"/>' . '<h3>Book Name: <i>' . $row['bookname'] . '</i>' . '</h3> <h3>Author Name: <i>' . $row['authorname']. '</i>';
                }
                else {
                    echo "<h3>No Book Found.!</h3>";
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        ?>

        <?php
            $sql = "SELECT * FROM `books`";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                
                echo '<div class="book-box">';
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="box">';
                    echo '<img src = "' . $row['bookimg'] . '"' . 'alt=" ' . $row['bookname'] . '"/>' . '<h5>Book Name: <strong class="book-author-heading">' . $row['bookname'] . '</strong></h5>' . '<h5> Author Name: <strong class="book-author-heading">' . $row['authorname'] . '</strong></h5>';
                    echo '</div>';

                }
                echo "</div>";
                
            }
        ?>

        

        <div class="feedback" id="contact">
            <div class="header">
                <h2>Get in Touch</h2>
                <p>Feel free to drop us a line to contact us</p>
            </div>
            <div class="feedback-grid">
                <div class="f-row-1">
                    <h2>Feel Free to Contact Us</h2>
                    <p>Hello Everyone! Have a great day :) I'm here to help you. If you want to know something or you have any suggestions then please mail us. Thank You.</p>
                    <div class="feedback-info-tab">
                        <h4><img height="30px" src="img/Location.PNG" alt="">&nbsp;Islamabad</h4>
                    </div>
                    <div class="feedback-info-tab">
                        <h4><img height="30px" src="img/Mail.PNG" alt="">&nbsp;librarymanagement@gmail.com</h4>
                    </div>
                    <div class="feedback-info-tab">
                        <h4><img height="30px" src="img/Internet.PNG" alt="">&nbsp;www.librarymanagement.com</h4>
                    </div>
                    
                </div>
                <div class="f-row-2">
                    <form class="form-row" id="help" action="#">
                        <label for="name">Name*</label> <br>
                        <input class="txt-input" type="text" name="name" id="name"> <br>
                        <label for="email">Email*</label> <br>
                        <input class="txt-input" type="email" name="email" id="email"> <br>
                        <label for="message">Message*</label> <br>
                        <textarea name="message" id="message" cols="30" rows="10"></textarea> <br>
                        <input type="checkbox" name="check" id="check" class="chk">
                        <label for="check" class="chk">Are you sure</label> <br>
                        <button>Send</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="about-tab" id="about">
            <h2>About Us</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam reiciendis neque repudiandae temporibus at eius quos ipsa quam blanditiis, tempore atque eos accusamus, nisi possimus, unde saepe est debitis velit corporis impedit. Nihil atque sapiente nam, expedita dolorum animi, repellat repudiandae fugit quis laborum, ipsum deleniti culpa mollitia odit non tempora veritatis doloribus a facere sit? Dolor architecto consectetur odit!
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quisquam, animi, a sint nam in dolor enim, aperiam perferendis aspernatur debitis soluta autem minus. Accusantium reprehenderit non omnis sequi eos.
            </p>
        </div>
    </div>

    <?php
        include("footer.php");
    ?>
</body>
</html>