<?php
include 'functions.php';

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    
    if (deleteTask($taskId)) {
        // Task deletion was successful
        header("Location: index.php");
        exit();
    } else {
        // Task deletion failed
        echo "Error deleting task.";
    }
} else {
    // No task ID provided
    echo "Task ID not specified.";
}
?>
