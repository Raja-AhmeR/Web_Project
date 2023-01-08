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
<body>
    <nav class="navbar fixed-top">
        <div class="container">
            <a class="navbar-logo" href="index.php"><img src="img/LMS logo small.jpg" alt="Logo" width="75%" height="75%"></a>
            <ul class="navbar-nav">
                <li class="nav-item active"><a class="nav-link" href="librarian.php"><i class="fa fa-fw fa-user"></i>&nbsp;Dashboard</a></li>
                <li class="nav-item active"><a class="nav-link" href="index.php"><i class="fa fa-fw fa-home"></i>&nbsp;Home</a></li>
                <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-fw fa-envelope"></i>&nbsp;Contact</a></li>
                <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;About</a></li>
                <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;Help</a></li>

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

    <div class="container main-container body">
        <div class="container-header">
            <span><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp; Quick access from any device </span>
            <span><i class="fa fa-user" aria-hidden="true"></i>&nbsp; 24/7 Support</span>
            <span><i class="fa fa-smile-o" aria-hidden="true"></i>&nbsp; Customer happiness gurantee</span>
        </div>
        <div class="padding-space"></div>
        </div>
        
        <div class="search-box" id="search-book">
            <form method="post" action="librarian.php">
                <input type="search" class="search-bar" placeholder="Search Book Name Here." name="search" id="search">
                <a type="submit" class="btn" id="search-btn">&nbsp; <i class="fa fa-search" aria-hidden="true"></i></a>
            </form>
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
                    
                    echo '<img src = "' . $row['bookimg'] . '"' . 'alt=" ' . $row['bookname'] . '"/>' . '<h3>Book Name: ' . $row['bookname'] . '</h3> <h3>Author Name: ' . $row['authorname'] . '</h3>' . '<a href="' . $row['book'] . '"><h5>Click here to download book</h5></a><br>';
                }
                else {
                    echo "<h3>No Book Found.!</h3>";
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        ?>

    <br>

        <div class="main-buttons">
            <button class="" type="submit"><a href="addbook.php"><i class="fa fa-plus" aria-hidden="true"></i>
            &nbsp; Add Book</a></button>
            <button class="" type="submit"><a href="trackrequests.php"><i class="fa fa-envelope-open-o" aria-hidden="true"></i>
            &nbsp; Track Requests</a></button>
        </div>

        
        <div class="book-tab">
            <h2>Available Books</h2>
        </div>
        <?php
            $sql = "SELECT * FROM `books`";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                
                echo '<div class="book-box">';
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="box">';
                    echo '<img src = "' . $row['bookimg'] . '"' . 'alt=" ' . $row['bookname'] . '"/>' . '<h5>Book Name: <strong class="book-author-heading">' . $row['bookname'] . '</strong></h5>' . '<h5> Author Name: <strong class="book-author-heading">' . $row['authorname'] . '</strong></h5>' . '<a href="' . $row['book'] . '"><h5>Click here to download book</h5></a>';

                    echo '<a class="edit-delete-icon-btn" href="editbook.php?id=' . $row["id"]. '"><button class="librarian-btn"><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Edit</button></a> <a class="edit-delete-icon-btn" href="deletebook.php?id=' . $row["id"]. '"><button class="librarian-btn"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</button></a>';
                    echo '</div>';

                }
                echo "</div>";
                
            }
        ?>
            
        <!-- <div class="book-box">
            <div class="box">
                <img src="img/history.jfif" alt="History Books">
                <h5>History</h5>
                <h5>Author</h5>
            </div>
            <div class="box">
                <img src="img/science.jfif" alt="Science Books">
                <h5>Science</h5>
            </div>
            <div class="box">
                <img src="img/computer.jfif" alt="Information Technology">
                <h5>Information Technology</h5>
            </div>
            
        </div>
        <div class="book-box">
            <div class="box">
                <img src="img/history.jfif" alt="History Books">
                <h5>History</h5>
            </div>
            <div class="box">
                <img src="img/science.jfif" alt="Science Books">
                <h5>Science</h5>
            </div>
            <div class="box">
                <img src="img/computer.jfif" alt="Information Technology">
                <h5>Information Technology</h5>
            </div>
            
        </div>
        <div class="book-box">
            <div class="box">
                <img src="img/history.jfif" alt="History Books">
                <h5>History</h5>
            </div>
            <div class="box">
                <img src="img/science.jfif" alt="Science Books">
                <h5>Science</h5>
            </div>
            <div class="box">
                <img src="img/computer.jfif" alt="Information Technology">
                <h5>Information Technology</h5>
            </div>
            
        </div> -->


    </div>
        
    <?php
        include("footer.php");
    ?>
</body>
</html>