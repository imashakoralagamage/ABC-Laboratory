<?php
@include 'config.php';
session_start();

$db = new mysqli("localhost", "root","","abc") or die('connection failed');
if(isset($_POST['submit'])){

    $title=$_POST['title'];
    $patient_name=$_POST['patient_name'];
    $nic=$_POST['nic'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $nationality=$_POST['nationality'];    
    
    $sql = "INSERT INTO appointment (title, patient_name, nic, mobile, email,nationality) 
    VALUES('$title','$patient_name', '$nic', '$mobile','$email','$nationality')";
    $results = mysqli_query($db,$sql);
}
?>
