<?php
include ('config/db_connect.php');
session_start();

// Validate input fields
if (empty($_POST['emailUsernameInput']) || empty($_POST['passwordInput'])) {
    echo "<script>
        alert('Please fill in all fields.');
        window.history.back();
    </script>";
    exit();
}

$emailUsernameInput = trim($_POST['emailUsernameInput']);
$passwordInput = $_POST['passwordInput'];

if (!isset($_SESSION['UserID'])) {
    $stmt = $conn->prepare("SELECT UserID, UserPassword FROM trackcriticuser WHERE (Username = ? OR Email = ?)");
    $stmt->bind_param("ss", $emailUsernameInput, $emailUsernameInput);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($UserID, $UserPassword);
        $stmt->fetch();
        
        if (password_verify($passwordInput, $UserPassword)) {
            $_SESSION['UserID'] = $UserID;
            
            echo "<script>
                window.location.href = '../PROFILE/trackCriticProfile.php';
            </script>";
            $stmt->close();
            $conn->close();
            exit();
        } else {
            echo "<script>
                alert('Invalid credentials. Please try again.');
                window.history.back();
            </script>";
            $stmt->close();
            $conn->close();
            exit();
        }
    } else {
        echo "<script>
            alert('Invalid credentials. Please try again.');
            window.history.back();
        </script>";
        $stmt->close();
        $conn->close();
        exit();
    }
} else {
    echo "<script>
        window.location.href = '../PROFILE/trackCriticProfile.php';
    </script>";
    exit();
}
?>