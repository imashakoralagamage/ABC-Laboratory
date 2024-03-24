<?php
// Include configuration file
@include 'config.php';

session_start();// Start session


// Database class for handling database operations
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "abc";
    private $connection;

    // Constructor to establish database connection
    public function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database) or die('Connection failed');
    }

    // Function to insert data into the database
    public function insertData($title, $fname, $lname, $number, $email, $country, $address, $inquiry) {
        $sql = "INSERT INTO contact (title, fname, lname, number, email, country, address, inquiry) 
                VALUES ('$title', '$fname', '$lname', '$number', '$email', '$country', '$address', '$inquiry')";
        return $this->connection->query($sql);
    }

    // Destructor to close database connection
    public function __destruct() {
        $this->connection->close();
    }
}

// Process form submission
if(isset($_POST['submit'])) {
    $db = new Database();

    // Sanitize input data
    $title = htmlspecialchars($_POST['title']);
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $number = htmlspecialchars($_POST['number']);
    $email = htmlspecialchars($_POST['email']);
    $country = htmlspecialchars($_POST['country']);
    $address = htmlspecialchars($_POST['address']);
    $inquiry = htmlspecialchars($_POST['inquiry']);

    // Insert data into the database
    $result = $db->insertData($title, $fname, $lname, $number, $email, $country, $address, $inquiry);
    if($result) {
        echo "Data inserted successfully!";
    } else {
        echo "Error inserting data.";
    }
}
?>
