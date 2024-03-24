<?php
$firstname = $_POST["firstname"];
$middlename = $_POST["middlename"];
$lastname = $_POST["lastname"];
$course = $_POST["course"];
$gender = $_POST["gender"];
$country_code = $_POST["country_code"];
$Phone = $_POST["Phone"];
$address = $_POST["address"];
$email = $_POST["email"];
$password = $_POST["password"];

$conn = new mysqli('localhost','root','','test');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration (firstname, middlename, lastname, course, 
    gender, country_code, phone, address, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssisss", $firstname, $middlename, $lastname, $course, $gender, $country_code,
     $phone, $address, $email, $password);
    
    $execval = $stmt->execute();
    if ($execval) {
        echo "Registration successfully...";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
