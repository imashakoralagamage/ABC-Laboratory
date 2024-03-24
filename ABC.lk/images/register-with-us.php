
<?php
@include 'config.php';
session_start();

$db = new mysqli("localhost", "root","","abc") or die('connection failed');
if(isset($_POST['submit'])){

   $title = ($_POST['title']);
   $name = ($_POST['name']);
   $number = ($_POST['number']);
   $email = ($_POST['email']);
   $country = ($_POST['country']);
   $address = $_POST['address'];
   $inquiry = ($_POST['inquiry']);

   $sql = "INSERT INTO register (title, name, number, email, country,address,inquiry) 
    VALUES('$title','$name', '$number', '$email','$country','$address','$inquiry')";
    $results = mysqli_query($db,$sql);
}
?>

