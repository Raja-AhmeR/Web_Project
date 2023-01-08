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

    <div class="container body">
        <div class="container-header">
            <span><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp; Quick access from any device </span>
            <span><i class="fa fa-user" aria-hidden="true"></i>&nbsp; 24/7 Support</span>
            <span><i class="fa fa-smile-o" aria-hidden="true"></i>&nbsp; Customer happiness gurantee</span>
        </div>
        <div class="records">
            <h2>Track All Reports Here</h2>
            
            <?php
                if(!empty($_SESSION['message'])){
                    echo  $_SESSION['message'];

                    $_SESSION['message'] = "";
                }
            ?>
            
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th>Access</th>
                </tr>

                <!-- <tr> -->
                    <?php
                        $sql = " Select * from request";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc())
                        {
                            echo "<tr><td> ". $row['id'] . "</td>" ;
                            echo "<td> ". $row['name'] . "</td>" ;
                            echo "<td> ". $row['email'] . "</td>" ;
                            echo "<td> ". $row['bookname'] . "</td>" ;
                            echo "<td> ". $row['authorname'] . "</td>" ;
                            
                            echo "<td> <button type='submit'><a href='update.php?status=1&&id=". $row['id'] . "'>Available</a></button>" ;
                            echo "<button type='submit'><a href='update.php?status=0&&id=". $row['id'] . "'>Not Available</a></button></td>" ;
                            
                    ?>
                    
                    <!-- <td></td>
                    <td><td>
                    <td></td>
                    <td></td> -->
                    
                <?php echo "</tr>"; } ?>
                

                

            </table>

            <div>

            </div>

        </div>
    </div>


    <?php
        include("footer.php");
    ?>
</body>
</html>