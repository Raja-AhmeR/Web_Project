<?php
    include("db.php");
    session_start();
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
            <a class="navbar-logo" href="user.php"><img src="img/LMS logo small.jpg" alt="Logo" width="75%" height="75%"></a>
            <ul class="navbar-nav">
                <li class="nav-item active"><a class="nav-link" href="user.php"><i class="fa fa-fw fa-home"></i>&nbsp;Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact"><i class="fa fa-fw fa-envelope"></i>&nbsp;Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="#about"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;About</a></li>
                <li class="nav-item"><a class="nav-link" href="#help"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;Help</a></li>
                <?php 
                    if (!isset($_SESSION['firstName'])) 
                    {
                        die("
                        <li class='nav-item topnav-right' id='account-btn-1'>
                            <a class='nav-link' href='login.php'><button class='btn nav-btn'>Sign In</button></a>
                        </li>
                        <li class='nav-item' id='account-btn-2'>
                            <a class='nav-link' href='register.php'><button class='btn nav-btn'>Register</button></a>
                        </li>
                        <br><hr> &nbsp; Please Log In to Continue");
                    } 
                ?>

                <li class="nav-item topnav-right" id="account-btn-1">
                    <a class="nav-link" href="logout.php"><button class="btn nav-btn">Log Out</button></a>
                </li>
            </ul>

        </div>
    </nav>

    <header class="jumbotron">
        <div class="jumbotron-row">
            <div class="container">
                <h3>Welcome <?php echo $_SESSION['firstName']; ?> !</h3><br>
                <h3>The only thing that you absolutely have to know, is the location of the library.</h3>
                <p>When in doubt, go to the library</p>
            </div>
        </div>
        <div class="jumbotron-btn">
            <a href="#search-book" type="button" class=""> Read More</a>
        </div>
    </header>

    <div class="container body">
        <div class="container-header">
            <span><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp; Quick access from any device </span>
            <span><i class="fa fa-user" aria-hidden="true"></i>&nbsp; 24/7 Support</span>
            <span><i class="fa fa-smile-o" aria-hidden="true"></i>&nbsp; Customer happiness gurantee</span>
        </div>
            <div class="feedback-grid">
            <div class="f-row-1 request-book-form">
                <h2>Ask For A Book</h2>
                <p>Hello Everyone! Have a great day :) I'm here to help you. If you want to get any book that is not uploaded then please fill this form. We will upload that book. Thank You.</p>
            </div>
            <div class="f-row-2 request-book-form">
                <form class="form-row" action="#" method="post">
                    <label for="name">Name*</label> <br>
                    <input class="txt-input" type="text" name="name" id="name"> <br>
                    <label for="email">Email*</label> <br>
                    <input class="txt-input" type="email" name="email" id="email"> <br>
                    <label for="bookName">Book Name*</label> <br>
                    <input class="txt-input" type="text" name="bookName" id="bookName"> <br>
                    <label for="authorName">Author Name*</label> <br>
                    <input class="txt-input" type="text" name="authorName" id="authorName"> <br>
                    <button>Send Request</button>
            <?php
                if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['bookName']) && isset($_POST['authorName']))
                {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $bookName = $_POST['bookName'];
                    $authorName = $_POST['authorName'];

                    $sql = " INSERT INTO `request`(`name`, `email`, `bookname`, `authorname`) VALUES ('". $name ."','". $email ."','". $bookName ."','". $authorName ."') ";

                    if ($conn->query($sql) === TRUE)
                    {
                        echo "<h3>Request Sent Successfully..!</h3>";
                    }
                    else 
                    {
                        echo "<br>Error: " .$sql. "<br>" .$conn->error;
                    }
                }
            ?>
                </form>
            </div>


        </div>
    </div>

    <?php
        include("footer.php");
    ?>
</body>
</html>