<?php
$conn = new mysqli("localhost","root","","DIA-MON_DB");
if(!$conn)
{
	die("connection failed".mysqli_connect_error());
}