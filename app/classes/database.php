<?php


namespace App\classes;


class database
{
	public function dbcon(){
		$host = "localhost";
		$user = "root";
		$pass = "";
		$db = "oopblog";

		$link = mysqli_connect($host,$user,$pass,$db);
		return $link;

	}
}