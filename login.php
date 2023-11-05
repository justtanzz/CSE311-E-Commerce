<?php
session_start();
include("connection.php");
if(isset($_POST['submit-btn'])) {

    $filter_email = filter_var($_POST['email']);
    $email = mysqli_real_escape_string($conn, $filter_email);

    $filter_password = filter_var($_POST['password']);
    $password = mysqli_real_escape_string($conn, $filter_password);


    $query = "SELECT * FROM customer WHERE Email = '$email' and Password = '$password'";

    $select_user = mysqli_query($conn, $query) or die('query failed');


    if(mysqli_num_rows($select_user)>0) {
        $row = mysqli_fetch_assoc($select_user);
        $_SESSION['cid'] = $row['CustomerID'];
        $_SESSION['fname'] = $row['F_name'];
        $_SESSION['lname'] = $row['L_name'];
        $_SESSION['dob'] = $row['DOB'];
        $_SESSION['email'] = $row['Email'];
        $_SESSION['phone'] = $row['PhnNo'];
        header('location:home.php');
    }
    else {
		$_SESSION['cid'] = 0;
        $message[] = 'incorrect email or password';
    }
	session_commit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" rel="stylesheet">
</head>

<body>
    <div class="login-box">
        <h2>E-commerce Database Login Page</h2>
        <?php
            if(isset($message)) {
                foreach($message as $message) {
                    echo '
                    <div class="message" style="
                        text-align: center;
                        font-size: 15px;
                        text-transform: capitalize;
                    ">
                            <span> '.$message.' </span>
                            <span class="icon" onclick="this.parentElement.remove()"> <i class="fa-regular fa-circle-xmark"></i> </span>
                        </div>
                    ';
                }
            }

        ?>
        <form action="login.php" method="post">
            <div class="textbox">
                <input type="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="textbox">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <input type="submit" name="submit-btn"  class="btn" value="Login">
        </form>
    </div>
</body>

</html>

</body>
</html>
