<?php
include('../setup/config/db_connect.php');
session_start();

// UPDATE LAST SESSION TIMESTAMP IF USER IS LOGGED IN
if (isset($_SESSION['UserID'])) {
    $stmt = $conn->prepare("UPDATE trackcriticuser SET lastsession = NOW() WHERE UserID = ?");
    $stmt->bind_param("i", $_SESSION['UserID']);
    $stmt->execute();
    $stmt->close();   
}

// UNSET ALL SESSION VARIABLES
session_unset();

// DESTROY SESSION COMPLETELY
session_destroy();

// REDIRECT TO HOMEPAGE USING JAVASCRIPT
echo "<script>
    window.location.href = '../HOMEPAGE/trackCriticHome.php';
</script>";

// EXIT TO STOP FURTHER EXECUTION
exit();
?>