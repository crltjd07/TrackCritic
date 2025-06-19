<?php
include('../setup/config/db_connect.php');
session_start();

function getCountryId($conn, $countryName) {
    $stmt = $conn->prepare("SELECT CountryID FROM listofcountries WHERE CountryName = ?");
    $stmt->bind_param("s", $countryName);
    $stmt->execute();
    $stmt->bind_result($countryId);
    
    if ($stmt->fetch()) {
        $stmt->close();
        return $countryId;
    }
    $stmt->close();
    return null; // Return null if country not found
}

// Add validation for required fields
if (empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['username'])) {
    echo "<script>
        alert('Please fill in all required fields.');
        window.history.back();
    </script>";
    exit();
}

$lastName = trim($_POST['last_name']);
$givenName = trim($_POST['given_name']);
$middleName = trim($_POST['middle_name']);
$extName = trim($_POST['ext_name']);
$email = trim($_POST['email']);
$username = trim($_POST['username']);
$password = $_POST['user_password'];
$confirmPassword = $_POST['confirm_password'];
$dob = $_POST['date_of_birth'];
$countryName = $_POST['country_of_birth'];

// Validate password match
if ($password !== $confirmPassword) {
    echo "<script>
        alert('Passwords do not match.');
        window.history.back();
    </script>";
    exit();
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$countryId = getCountryId($conn, $countryName);

if ($countryId === null) {
    echo "<script>
        alert('Invalid country selected.');
        window.history.back();
    </script>";
    exit();
}

$stmt = $conn->prepare("SELECT UserID FROM trackcriticuser WHERE (GivenName = ? AND LastName = ? AND MiddleName = ? AND ExtName = ?) OR (Email = ? OR Username = ?)");
$stmt->bind_param("ssssss", $givenName, $lastName, $middleName, $extName, $email, $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "<script>
        alert('A user with the same name or email already exists. Please provide different information or log in to your account.');
        window.history.back();
    </script>";
    $stmt->close();
    exit();
}

$stmt = $conn->prepare("INSERT INTO trackcriticuser (LastName, GivenName, MiddleName, ExtName, Email, Username, UserPassword, DateOfBirth, CountryID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssi", $lastName, $givenName, $middleName, $extName, $email, $username, $hashedPassword, $dob, $countryId);

if ($stmt->execute()) {
    echo '<script>
        alert("Registration successful! Redirecting to login page.");
        window.location.href = "../LOGIN/trackCriticLogIn.php";
    </script>';
    exit();
}

$stmt->close();
$conn->close();
?>