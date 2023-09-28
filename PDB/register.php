<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">

        <?php 
            include("php/config.php");
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $password = $_POST['password'];

            // verify email

            $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

            if(mysqli_num_rows($verify_query) !=0){
                echo "<div class='message'>
                            <p>This email is already used, Please try another email.</p>
                            </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='button'>Go back</button>";
                    
            }

            else {
                mysqli_query($con,"INSERT into users(Username, Email, Age, Password)VALUES('$username','$email', '$age', '$password')") or die("Error Occured.");

                echo "<div class='message'>
                            <p>Registered Successfully!</p>
                            </div> <br>";
                echo "<a href='index.php'><button class='button'>Login</button>";
            }

            } else {
        ?>
            <header>Register</header>
            <form action=" " method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" required>
                </div>

                <div class="field input">
                    <label for="username">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                
                <div class="field">
                    <input type="submit" class="button" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already have an account? <a href="index.php">Login.</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>