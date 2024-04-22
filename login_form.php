<?php
include_once 'classes/db1.php'; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Sanchanala 2k20</title>
    <title></title>
    <style>
        span.error {
            color: red;
        }
    </style>
    <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
</head>

<body>
    <?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->
    <div class="content"><!--body content holder-->
        <div class="container">
            <div class="col-md-6 col-md-offset-3">

                <form method="POST"><!--form-->

                    <!--username field-->
                    <label>UserName:</label><br>
                    <input type="text" name="name" class="form-control" required><br>


                    <label>Password</label><br>
                    <input type="password" name="password" class="form-control" required><br>
                    <button type="submit" name="update" class="btn btn-default">Login</button>
                </form>
            </div><!--col md 6 div-->
        </div><!--container div-->
    </div><!--content div-->
    <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
</body>

</html>
<?php
include_once 'classes/db1.php';

if (isset($_POST["update"])) {
    $myusername = $_POST['name'];
    $mypassword = $_POST['password'];

    // Perform SQL injection prevention
    $myusername = mysqli_real_escape_string($conn, $myusername);
    $mypassword = mysqli_real_escape_string($conn, $mypassword);

    // Retrieve user credentials from the database
    $sql = "SELECT * FROM users WHERE username = '$myusername' AND password = '$mypassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, login successful
        echo "<script>
        alert('Login Successful');
        window.location.href='adminPage.php';
        </script>";
    } else {
        // No matching user found, login failed
        echo "<script>
        alert('Invalid credentials');
        window.location.href='login_form.php';
        </script>";
    }
}
?>