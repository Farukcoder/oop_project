<?php


namespace App\classes;
use App\classes\database;

class login
{
	public  function  logincheck($data){
		$username = $data['username'];
		$password = md5($data['password']);

		$sql="SELECT * FROM `users` WHERE username = '$username' AND password='$password' ";

		$result = mysqli_query(database::dbcon(),$sql);

		if ($result){
			if(mysqli_num_rows($result)==1){
				$row = mysqli_fetch_assoc($result);
//				echo '<pre>';
//				print_r($row);
//				exit();
				session_start();
				$_SESSION['user_id']= $row['id'];
				$_SESSION['username']= $row['username'];
				$_SESSION['name']= $row['name'];
				$login_success=$_SESSION['massage']= "Successfully login..!!";
				return $login_success;
				header("location:index.php");

			}else{
				$login_error = $_SESSION['massage'] = "Username or password invalid!!";
				return $login_error;
			}
		}else{
			die();
		}
	}
}