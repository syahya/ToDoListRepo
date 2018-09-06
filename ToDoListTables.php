<?php

$con=mysqli_connect('localhost','root','');

mysqli_query($con,"CREATE DATABASE TODOLIST");

mysqli_select_db($con,"CREATE DATABASE TODOLIST");

$mysql="CREATE TABLE USERS (USERNAME varchar(100) PRIMARY KEY, PASSWORD varchar(100))";
mysqli_query($con,$mysql);

$mysql2="CREATE TABLE LIST (LISTID int NOT NULL AUTO_INCREMENT, NAME varchar(100), PRIMARY KEY(LISTID), USERNAME varchar(100), FOREIGN KEY(USERNAME) REFERENCES USERS(USERNAME)";

mysqli_query($con,$mysql2);


$sql = "INSERT INTO USERS (USERNAME, PASSWORD) VALUES ('suaad', '12345'), ('student', '6789')";
mysqli_query($con,$sql); 

mysqli_close($con);
?>