<?php
include 'functions.php';

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    deleteTask($taskId);
}

header("Location: index.php");
exit();
?>
