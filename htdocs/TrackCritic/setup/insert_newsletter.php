<?php
include ('../setup/config/db_connect.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = trim($_POST['email']);

    $check = $conn->prepare("SELECT SubscriberID FROM newslettersubscriber WHERE Email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "<script>window.location.href = '../NEWSLETTER/trackCriticNewsletter.php';</script>";
        $check->close();
        exit();
    } else {
        $stmt = $conn->prepare("INSERT INTO newslettersubscriber (Email) VALUES (?)");
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            echo "<script>
                alert('Thank you for subscribing to our newsletter! Click OK to close dialog box.');
                window.top.location.reload();
            </script>";
        }
        $stmt->close();
    }
    $check->close();
}
?>