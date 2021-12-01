<?php

session_start();



$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'laravel');

$name = $_POST['user'];
$id = $_POST['idnumber'];
$dates = $_POST['date'];
$pass = $_POST['password'];

$s = "select * from usertable where name = '$name'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
echo'Username already exist, Try Another One';

}else{
$reg= "insert into usertable(name, idnumber, date, password) values ('$name' , '$id' , '$dates' , '$pass')";
mysqli_query($con, $reg);
header('location:home.php');
}