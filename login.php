<?php
    include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
</head>
<body>
	<div class="header">
		<h1> Login </h1>
		
	</div> 
	<?php
	    if(@$_GET['Empty']==true){
	 ?>
	    <div class="alert-light text-danger"><?php echo $_GET['Empty']?></div>
	<?php
	    }
	?>
	<?php
	    if(@$_GET['Invalid']==true){
	 ?>
	    <div class="alert-light text-danger"><?php echo $_GET['Invalid']?></div>
	<?php
	    }
	?>
	<form action="login.php" method="post">
		<table>
			<tr>
				<td> Email</td>
				<td><input type="text" name="Email"></td>
			</tr>
			<tr>
				<td> Password</td>
				<td><input type="password" name="Password"></td>
			</tr>
			<tr>
				<td><button class="btn btn-success" name="Login"> Login</button></td>
			</tr>
		</table>
	</form>
	<?php
		if(isset($_POST['Login']))
		{
			if(empty($_POST['Email'])||empty($_POST['Password'])){
				 echo"Please enter proper login credentials";
			 }
			else{
				$query="select * from Customer where Email ='".$_POST['Email']."' and Password='".$_POST['Password']."' ";
				$result=mysqli_query($con, $query);
				if(mysqli_fetch_assoc($result)){
					$_SESSION['user']=$_POST['Email'];
					header("location: home.php");
					exit();
				}
				else{
					header("location:login.php?Invalid=Invalid username or password.");
				}
			
			} 
		}
	?>

</body>
</html>