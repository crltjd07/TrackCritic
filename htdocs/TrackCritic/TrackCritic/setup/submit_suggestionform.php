<?php
include('../setup/config/db_connect.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate required fields
    if (empty($_POST['rating']) || empty($_POST['email']) || empty($_POST['comment'])) {
        echo "<script>
            alert('Please fill in all required fields.');
            window.history.back();
        </script>";
        exit();
    }

    $rating = intval($_POST['rating']);
    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);
    
    // Validate rating range
    if ($rating < 1 || $rating > 5) {
        echo "<script>
            alert('Please provide a valid rating (1-5).');
            window.history.back();
        </script>";
        exit();
    }
    
    $userId = isset($_SESSION['UserID']) ? $_SESSION['UserID'] : null;

    $stmt = $conn->prepare("INSERT INTO feedback (UserID, Email, Rating, Comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $userId, $email, $rating, $comment);

    if ($stmt->execute()) {
        echo "<script>
            alert('Thank you for your feedback!'); 
            window.location.href = '../HOMEPAGE/trackCriticHome.php';
        </script>";
        $stmt->close();
        $conn->close();
        exit();
    } else {
        echo "<script>
            alert('Error submitting feedback. Please try again.');
            window.history.back();
        </script>";
    }
    
    $stmt->close();
    $conn->close();
}
?>