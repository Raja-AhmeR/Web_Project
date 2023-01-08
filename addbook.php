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
                <li class="nav-item active"><a class="nav-link" href="librarian.php"><i class="fa fa-fw fa-user"></i>&nbsp;Dashboard</a></li>
                <li class="nav-item active"><a class="nav-link" href="index.php"><i class="fa fa-fw fa-home"></i>&nbsp;Home</a></li>
                <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-fw fa-envelope"></i>&nbsp;Contact</a></li>
                <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;About</a></li>
                <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;Help</a></li>
                <li class="nav-item topnav-right" id="account-btn-1">
                    <a class="nav-link" href="logout.php"><button class="btn nav-btn">Log Out</button></a>
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
    </header>

    <div class="container main-container body">
        <div class="container-header">
            <span><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp; Quick access from any device </span>
            <span><i class="fa fa-user" aria-hidden="true"></i>&nbsp; 24/7 Support</span>
            <span><i class="fa fa-smile-o" aria-hidden="true"></i>&nbsp; Customer happiness gurantee</span>
        </div>

        <div class="search-box" id="search-book">
            <form method="post" action="#">
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
                    
                    echo '<img src = "' . $row['bookimg'] . '"' . 'alt=" ' . $row['bookname'] . '"/>' . '<h3>Book Name: ' . $row['bookname'] . '</h3> <h3>Author Name: ' . $row['authorname'] . '</h3>' . '<a href="' . $row['book'] . '"><h5>Click here to download book</h5></a>';
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

        <div class="add-book-tab">
            <form method="post" action="addbook.php" enctype="multipart/form-data">
                <label for="bookName">Enter Book Name</label> <br>
                <input class="border-input" type="text" name="bookName" id="bookName" required> <br>
                <label for="bookAuthor">Enter Book Author Name</label> <br>
                <input class="border-input" type="text" name="bookAuthor" id="bookAuthor" required> <br>
                <label for="bookImage">Upload Book Image</label> <br>
                <input type="file" accept=".png, .jpeg, .jpg" name="bookImage" id="bookImage" required> <br>
                <label for="book">Upload Book</label> <br>
                <input type="file" accept=".pdf" name="book" id="book" required> <br>
                <button type="submit">Add Book</button> <br>
            </form>
            <button><a href="librarian.php">Back to Dashboard</a></button>

            <?php
                if (isset($_POST['bookName']) && isset($_POST['bookAuthor']) && isset($_FILES['bookImage']) && $_FILES['book']) {
                    $bookName = $_POST['bookName'];
                    $bookAuthor = $_POST['bookAuthor'];
                    
                    function add_book($bookName, $bookAuthor, $conn) {
                        $imglocation = "books/img/" . $_FILES['bookImage']['name'];
                        move_uploaded_file($_FILES['bookImage']['tmp_name'], $imglocation);
                        $booklocation = "books/"  . $_FILES['book']['name'];
                        move_uploaded_file($_FILES['book']['tmp_name'], $booklocation);
                        $sql = "INSERT INTO `books`(`bookname`, `authorname`, `bookimg`, `book`) VALUES ('".$bookName."','".$bookAuthor."','".$imglocation."','".$booklocation."')";

                        if ($conn->query($sql) === TRUE)
                        {
                            echo "<h3>Book Added Successfully..!</h3>";
                        }
                        else 
                        {
                            echo "<br>Error: " .$sql. "<br>" .$conn->error;
                        }
                    }

                    add_book($bookName, $bookAuthor, $conn);
                    

                }

                // if (isset($_POST['bookName']) && isset($_POST['bookAuthor']) && isset($_POST['bookImage']) )
                // {
                //     $bookName = $_POST['bookName'];
                //     $bookAuthor = $_POST['bookAuthor'];
                //     $bookImage = $_POST['bookImage'];

                //     $sql = "INSERT INTO `books`(`bookname`, `authorname`, `bookimg`) VALUES ('".$bookName."','".$bookAuthor."','".$bookImage."')";

                //     if ($conn->query($sql) === TRUE)
                //     {
                //         echo "<h3>Book Added Successfully..!</h3>";
                //     }
                //     else 
                //     {
                //         echo "Error: " .$sql. "<br>" .$conn->error;
                //     }
                // }
            ?>

        </div>

    </div>
    
    <?php
        include("footer.php");
    ?>
</body>
</html>