<?php
    session_start();
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
                    <a class="nav-link" href="signIn.php"><button class="btn nav-btn">Sign In</button></a>
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
            <a type="button" class=""> Read More</a>
        </div>
    </header>

    <div class="container">
        <div class="sign-in-form">
            <div class="sign-in-row-1">
                <h3>Welcome</h3>
                <p>Sign In to continue access</p>
            </div>
            <div class="sign-in-row-2">
                <h3>Sign In</h3>
                <form method="post" class="" action="#">
                    <label for="emailAddress">Email</label> <br>
                    <input class="txt-input" type="email" name="emailAddress" id="emailAddress" required> <br>
                    <label for="password">Password</label> <br>
                    <input class="txt-input" type="password" name="password" id="password" required> <br>
                    <br>
                    <button type="submit">Continue</button> <br>
                    <p>or</p>
                    <div>
                        <button><a href="register.php">Register</a></button>
                    </div>
                </form>
                <?php
                    if (isset($_POST['emailAddress']) && isset($_POST['password'])) 
                    {
                        $email = $_POST['emailAddress'];
                        $password = md5($_POST['password']);
                        
                        $sql = "SELECT * FROM `users` WHERE email = '".$email."' AND password = '".$password."'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            
                            $_SESSION['firstName'] = $row['first name'];
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['emailAddress'] = $row['email'];
                            $_SESSION['type'] = $row['type'];

                            if ($row['type'] == 1){
                                header("location:librarian.php");
                                $_SESSION['firstName'];
                            }
                            else {
                                header("location:user.php");
                                $_SESSION['firstName'];
                            }
                        }
                        else 
                        {
                            echo "<h4>Email Id or Password or Type is incorrect</h4>";
                        }
                    }

                    
                ?>
            </div>
        </div>


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