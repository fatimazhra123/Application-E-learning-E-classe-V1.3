<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_classe_db";
// Create connection
$connect = mysqli_connect($servername, $username, $password,$dbname);
echo"connected";
$remember = $_POST['remember'] ?? "";
if (isset($_POST['login'])){
	if(empty($_POST['Email']) || empty($_POST['Password'])){
	
		$_SESSION["message_error"] = "Please fill in this field.";
		header("location: index.php");
		
	}else 
    {
		
		$Email = $_POST['Email'];
		$Password= $_POST['Password'];
		$req = "SELECT * FROM comptes WHERE Email='$Email' and  Password='$Password'";
		$comptes = mysqli_query($connect,$req);
		$res = mysqli_fetch_assoc($comptes);	
			if($res){
				$_SESSION['USERNAME'] = $res['USERNAME'];
				if($remember === 'on'){
					setcookie("Email", $_POST['Email'],time() + 3600);
					setcookie("Password", $_POST['Password'],time() + 3600);
				}else{
					setcookie("Email");
					setcookie("Password");
				}
				header("location:dashboard.php");
                
			}else
			{
				$_SESSION["message_error"] = "Email or Password incorrecte";
				header("location:index.php");
			}
	}
}

 