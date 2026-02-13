<?php
/* DATABASE CONNECTION AND SESSION INITIALIZATION */
include('../setup/config/db_connect.php');
session_start();

/* AUTHENTICATION CHECK - REDIRECT IF USER NOT LOGGED IN */
if (!isset($_SESSION['UserID'])) {
    header("Location: trackCriticPoll.php?msg=login");
    exit();
}

/* PROCESS POLL VOTE SUBMISSION */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /* GET USER DATA FROM SESSION AND FORM SUBMISSION */
    $user_id = $_SESSION['UserID'];
    $poll_id = intval($_POST['poll_id']);
    $rating = intval($_POST['rating']);

    /* VALIDATE INPUT DATA - CHECK FOR VALID POLL ID AND RATING RANGE */
    if ($poll_id <= 0 || $rating < 0 || $rating > 10) {
        header("Location: trackCriticPoll.php?msg=invalid");
        exit();
    }

    /* PREVENT DUPLICATE VOTES - CHECK IF USER ALREADY VOTED ON THIS POLL */
    $check = $conn->prepare("SELECT * FROM poll_votes WHERE poll_id = ? AND user_id = ?");
    $check->bind_param("ii", $poll_id, $user_id);
    $check->execute();
    $check->store_result();

    /* REDIRECT IF USER HAS ALREADY VOTED */
    if ($check->num_rows > 0) {
        $check->close();
        header("Location: trackCriticPoll.php?msg=duplicate");
        exit();
    }
    $check->close();

    /* INSERT NEW VOTE INTO DATABASE */
    $stmt = $conn->prepare("INSERT INTO poll_votes (poll_id, user_id, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $poll_id, $user_id, $rating);

    /* CHECK IF VOTE WAS SUCCESSFULLY INSERTED */
    if ($stmt->execute()) {
        $stmt->close();
        /* REDIRECT TO POLL PAGE WITH SUCCESS MESSAGE */
        header("Location: trackCriticPoll.php?msg=success");
        exit();
    } else {
        $stmt->close();
        /* REDIRECT TO POLL PAGE WITH ERROR MESSAGE */
        header("Location: trackCriticPoll.php?msg=error");
        exit();
    }
}
/* DEFAULT REDIRECT TO POLL PAGE IF NO POST REQUEST */
header("Location: trackCriticPoll.php");
exit();
?>