<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
        <div class="container">
        <div class="box form-box">

        <?php
        include("php/config.php");

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $password = $_POST['password'];

        // Verify if email is unique
        $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

        if(mysqli_num_rows($verify_query) != 0) {
            echo "<div class='message'>
                        <p>This email is used, try another one</p>
                </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
        } 
        else {
        $query = "INSERT INTO users (Username, Email, Age, Password) VALUES ('$username', '$email', '$age', '$password')";
        if(mysqli_query($con, $query)) {
            echo "<div class='message'>
                        <p>Registration completed!</p>
                   </div> <br>";
            echo "<a href='index.php'><button class='btn'>Login Now</button>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    }
} else {
        ?>

            <header>Sign Up</header>
            <form action="" method="post">
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
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="field">

                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>

                <div class="links">
                    Already a member? <a href="index.php">Sign In Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
        </div>
</body>
</html>