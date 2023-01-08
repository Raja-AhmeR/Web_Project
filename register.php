<?php
    include('db.php');
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
                <li class="nav-item"><a class="nav-link"><i class="fa fa-fw fa-envelope"></i>&nbsp;Contact</a></li>
                <li class="nav-item"><a class="nav-link"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;About</a></li>
                <li class="nav-item"><a class="nav-link"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;Help</a></li>
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
            <a type="button" class=""> Read More</a>
        </div>
    </header>
    
    <div class="container">
        <div class="register-form">
            <div class="grid-tab-1">
                <h3>Welcome</h3>
                <p>Register to continue access</p>
            </div>
            <div class="grid-tab-2">
                <h3>Register</h3>
                <form method="post" action="#">
                    <label for="firstName">First Name</label><br>
                    <input class="border-input txt-input" type="text" name="firstName" id="firstName" required><br>
                    <label for="lastName">Last Name</label><br>
                    <input class="border-input txt-input" type="text" name="lastName" id="lastName" required><br>
                    <label for="emailAddress">Email</label><br>
                    <input class="border-input txt-input" type="email" name="emailAddress" id="emailAddress" required><br>
                    <label for="password">Password</label><br>
                    <input class="border-input txt-input" type="password" name="password" id="password" required><br>
                    <label for="User">User</label>
                    <input class="check" type="radio" name="type" id="User" value="0" required> 
                    <label for="Admin">Admin</label>
                    <input class="check" type="radio" name="type" id="Admin" value="1" required>
                    <br>
                    <button type="submit">Register</button><br>
                </form>
            </div>
        </div>

        <?php
            if (
                isset($_POST['firstName']) &&
                isset($_POST['lastName']) &&
                isset($_POST['emailAddress']) &&
                isset($_POST['password']) &&
                isset($_POST['type'])
            ) {
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['emailAddress'];
                $password = md5($_POST['password']);
                $type = $_POST['type'];

                // if($sql = "SELECT email FROM `users` WHERE email='".$email."'" === TRUE) 
                // {
                //     echo "Email Already Taken..!";
                // }
                // else {
                // }
                
                $sql = "INSERT INTO `users`(`first name`, `last name`, `email`, `password`, `type`) VALUES ('".$firstName."','".$lastName."','".$email."','".$password."',".$type.")";

                if ($conn->query($sql) === True) {
                    echo "Account Created Successfully";
                    header("location:login.php");
                }
                else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                
            }


            
        ?>

    </div>

    <?php
        include("footer.php");
    ?>
</body>
</html>